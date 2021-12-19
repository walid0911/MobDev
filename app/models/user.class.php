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
                            $data['email'], $data['password'], $data['phone']);

            header("Location: " . ROOT . "login");
            die;
        }

        $_SESSION['error'] = $this->error;

    }

    // Validate data for signUp
    public function dataValidation($data)
    {
        $result = true;
        if(!preg_match("/^[a-zA-Z]+$/", $data['firstName'])) {
            $this->error .= "Please enter a valid first name <br>";
            $result = false;
        }
        if(!preg_match("/^[a-zA-Z]+$/", $data['lastName'])) {
            $this->error .= "Please enter a valid last name <br>";
            $result = false;
        }
        if(!preg_match("/^[0-9]{10}$/", $data['phone'])) {
            $this->error .= "Please enter a valid phone number <br>";
            $result = false;
        }
        if(!preg_match("/^[0-9a-zA-Z_.?]+@[a-zA-Z_.?].+[a-z]+$/", $data['email']))
        {
            $this->error .= "Please enter a valid email <br>";
            $result = false;
        }
        if(strlen($data['password']) < 4) {
            $this->error .= "Password must be atleast 4 characters long <br>";
            $result = false;
        }

        return $result;
    }

    public function login($POST)
    {

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
        $image = $user->addChild('img');
        $image->addAttribute('src', 'null');
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
     * function used in id auto-incrementing when adding users
     * we want to get the maxID, so we can add a new user with id = maxID+1
     */
    public function getMaxID()
    {
        $xml = simplexml_load_file('../app/xml/users/users.xml');
        $xml->registerXPathNamespace('c', 'https://www.w3schools.com');
        $maxID = $xml->xpath("//c:users/c:user/c:userID");
        $maxID = $maxID[$xml->count()-1];
        return $maxID;
    }




}