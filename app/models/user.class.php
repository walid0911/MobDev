<?php

class user
{
    private $error = "";

    public function signUp($POST)
    {
        $data = array();
        $data['username'] = trim($POST['username']);
        $data['firstName'] = trim($POST['firstName']);
        $data['lastName'] = trim($POST['lastName']);
        $data['email'] = trim($POST['email']);
        $data['phone'] = trim($POST['phone']);
        $data['password'] = trim($POST['password']);

        // validate data
        $this->dataValidation($data);

        // Check if email already exists in users.xml file
        $user = $this->getUserByEmail($data['email']);
        if($user != null)
        {
            $this->error .= "That email is already in use <br>";
        }

        // Check if username already exists in users.xml file
        $user = $this->getUserByUserName($data['username']);
        if($user != null)
        {
            $this->error .= "That username is already in use <br>";
        }

        // save user to xml file
        if($this->error == "")
        {
            $this->insertUser("customer", $data['username'], $data['firstName'],$data['lastName'],
                            $data['email'], hash("sha1",$data['password']), $data['phone']);

            $_SESSION["success"] = "Registration Successful";

            header("Location: login");
            die;
        }

        $_SESSION['error'] = $this->error;

    }

    public function login($POST)
    {
        $data = array();

        $data['email'] = $POST["email"];
        $data['password'] = hash("sha1",$POST["password"]);

        $this->dataValidation($data);

        if($this->error == "")
        {
            // check if email exists
            $user = $this->getUserByEmail($data['email']);
            if($user != false && (string)$user->password == $data['password'])
            {

                $_SESSION['userID'] = (string)$user->userID;
                header("Location: home");
            }
            else
                $this->error .= "Wrong email or password <br>";
        }

        $_SESSION['error'] = $this->error;
    }

    /**
     *
     */
    public function logout()
    {
        if(isset($_SESSION['userID']))
        {
            unset($_SESSION['userID']);
            header("Location: home");
            die;
        }
    }


    /**
     *
     *
     * @return false|mixed|SimpleXMLElement returns SimpleXMLElement user object if the user is connected, else returns false
     */
    public function checkLogin()
    {
        if(isset($_SESSION['userID']))
        {
            $arr['id'] = $_SESSION['userID'];

            $user = $this->getUserById($arr['id']);
            if($user != false)
            {
                return $user;
            }
        }
        return false;
    }


    /**
     * Function uses a Xpath expression on the users.xml document to return the user with the given email,
     * if the user with the given email doesn't exist, it returns false
     * @param $email
     * @return 'SimpleXMLElement object or False(null)'
     */
    public function getUserByEmail($email)
    {
        $xml = simplexml_load_file('../app/xml/users/users.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $user = $xml->xpath("//c:users//c:user[c:email = '{$email}' ]");
        $user = array_shift($user);
        return $user;
    }

    public function getUserByUserName($username)
    {
        $xml = simplexml_load_file('../app/xml/users/users.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $user = $xml->xpath("//c:users//c:user[c:username = '{$username}']");
        $user = array_shift($user);
        return $user;
    }

    public function getUserById($id)
    {
        $xml = simplexml_load_file('../app/xml/users/users.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $user = $xml->xpath("//c:users//c:user[c:userID = '{$id}']");
        $user = array_shift($user);
        return $user;
    }

    /**
     * Add user to xml document users.xml
     *
     * @param user_informations
     * @return void
     */
    public function insertUser($rank, $username, $firstName, $lastName, $email, $password, $phone)
    {
        $xml = simplexml_load_file('../app/xml/users/users.xml');

        $maxID = $this->getMaxID();
        $user = $xml->addChild('user');
        $user->addAttribute('rank', $rank);
        $user->addChild('userID', $maxID+1);
        $user->addChild('username', $username);
        $user->addChild('firstName', $firstName);
        $user->addChild('lastName', $lastName);
        $user->addChild('email', $email);
        $user->addChild('password', $password);
        $user->addChild('phone', $phone);
        $user->addChild("createdAt",date("Y-m-d") . "T" . date("h:i:s"));
        $image = $user->addChild('img');
        $image->addAttribute('src', 'userDefault.png');
        file_put_contents('../app/xml/users/users.xml', $xml->asXML());

        // To insert in tree format not one line. Nicely formats output with indentation and extra space
        $xml = '../app/xml/users/users.xml';
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->load($xml);
        $dom->save($xml);

    }

    /**
     * function takes userID and data(new user data) and updates the user information if existed
     */
    public function updateUser($id, $data)
    {
        $currUser = $this->getUserById($id);

        // show($data);
        // If there is a change in userData
        if($currUser != null
            && ($data['firstName'] != (string)$currUser->firstName
            || $data['lastName'] != (string)$currUser->lastName
            || $data['email'] != (string)$currUser->email
            || $data['username'] != (string)$currUser->username
            || $data['phone'] != (string)$currUser->phone)
            || (isset($_FILES['img']) && $_FILES['img']['name'] != "")
            )
        {

            if ($this->dataValidation($data))
            {
                // If the new email already existed
                $tmpUser = $this->getUserByEmail($data['email']);
                if ($tmpUser != null && (string)$tmpUser->email != (string)$currUser->email)
                {
                    $this->error .= "That email is already in use! <br>";
                }
                // If the new username already existed
                $tmpUser = $this->getUserByUserName($data['username']);
                if ($tmpUser != null && (string)$tmpUser->username != (string)$currUser->username) {
                    $this->error .= "That username is already in use! <br>";
                }

                if ($this->error == "") {
                    $xml = simplexml_load_file('../app/xml/users/users.xml');
                    $xml->registerXPathNamespace('c', 'https://www.w3schools.com');
                    $user = $xml->xpath("//c:users//c:user[c:userID = '{$id}']");
                    $user[0]->firstName = $data['firstName'];
                    $user[0]->lastName = $data['lastName'];
                    $user[0]->username = $data['username'];
                    $user[0]->email = $data['email'];
                    $user[0]->phone = $data['phone'];


                    //show(ROOT_LOC . 'public/uploads');

                    // Img
                    if (isset($_FILES['img']) && $_FILES['img']['name'] != "") {
                        $file = $_FILES['img']['name'];
                        $target_dir = ROOT_LOC . "public/uploads/";
                        $path = pathinfo($file);
                        $ext = $path['extension'];
                        $img = 'user' . $currUser->userID;
                        $temp_name = $_FILES['img']['tmp_name'];
                        $path_filename_ext = $target_dir . $img . "." . $ext;

                        unlink(ROOT_LOC . "public/uploads/" . $currUser->img->Attributes());
                        move_uploaded_file($temp_name, $path_filename_ext);
                        $user[0]->img->attributes()[0] = 'user' . $currUser->userID . '.'.$ext;
                    }

                    // Save xml changes
                    $xml->asXml('../app/xml/users/users.xml');

                    $_SESSION['success'] = "Profile Updated!";
                    header("Location: " . ROOT . "profile");
                    die;
                }
            }
        }
        else
        {
            $_SESSION["alert"] = "Nothing to change :(";
        }

        $_SESSION['error'] = $this->error;

    }

    /**
     * function used in id auto-incrementing when adding users
     * we want to get the maxID, so we can add a new user with id = maxID+1
     */
    public function getMaxID()
    {
        $xml = simplexml_load_file('../app/xml/users/users.xml');
        $xml->registerXPathNamespace('c', 'https://www.w3schools.com');
        $allIDs = $xml->xpath("//c:users/c:user/c:userID");
        $maxID = $allIDs[$xml->count()-1];
        return $maxID;
    }

    // Validate data for signUp and Login
    public function dataValidation($data)
    {
        $result = true;
        if(isset($data['firstName']) && !preg_match("/^[a-zA-Z\s]+$/", $data['firstName'])) {
            $this->error .= "Please enter a valid first name <br>";
            $result = false;
        }
        if(isset($data['lastName']) && !preg_match("/^[a-zA-Z\s]+$/", $data['lastName'])) {
            $this->error .= "Please enter a valid last name <br>";
            $result = false;
        }
        if(isset($data['phone']) && !preg_match("/^[0-9]{9}$/", $data['phone'])) {
            $this->error .= "Please enter a valid phone number <br>";
            $result = false;
        }
        $regEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if(isset($data['email']) && !preg_match($regEmail, $data['email']))
        {
            $this->error .= "Please enter a valid email <br>";
            $result = false;
        }
        if(isset($data['password']) && strlen($data['password']) < 4) {
            $this->error .= "Password must be atleast 4 characters long <br>";
            $result = false;
        }

        if(isset($data['newPass']) && strlen($data['newPass']) < 4) {
            $this->error .= "Password must be atleast 4 characters long <br>";
            $result = false;
        }

        if(isset($data['img']) && $data['img'] != '') {
            $file = $_FILES['img']['name'];
            $path = pathinfo($file);
            $ext = $path['extension'];
            $size = $_FILES['img']['size'];
            if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png')
            {
                $this->error .= "File uploaded must be an image of type .jpg, .jpeg, .png <br>";
                $result = false;

            }
            if($size > 10000000)
            {
                $this->error .= "Size of the uploaded file must not exceed 10MB <br>";
                $result = false;
            }
        }


        return $result;
    }


}