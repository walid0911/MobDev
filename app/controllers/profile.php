<?php

class Profile extends Controller
{

    // index methode displays the view of the current logged in profile
    public function index()
    {
        $data = array();

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
            $data['page_title'] = $user->username;

            $this->view("profile", $data);
        }
        else // if user not logged in, redirect to home
        {
            header("Location: ". ROOT);
        }
    }


    /**
     * Function used to generate customer Card as pdf.
     * it creates a new xml file user.xml from the logged-in user informations
     * then runs the java program given the user.xml file,
     * the java program applies the xsl transformation to the user.xml file and generates a pdf.
     * after the pdf is downloaded by the user,
     * the generated files( user.xml and customerCard.pdf ) are automatically deleted
     * and the user is redirected to his profile.
     */
    public function customerCard()
    {

        //Create temporary user.xml that contains the user informations:
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null)
        {
            $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><user></user>");

            $xml->addAttribute('rank',$user->Attributes());
            $xml->addChild('userID',$user->userID );
            $xml->addChild('username',$user->username);
            $xml->addChild('firstName',$user->firstName);
            $xml->addChild('lastName',$user->lastName);
            $xml->addChild('email',$user->email);
            $xml->addChild('password',$user-> password);
            $xml->addChild('phone',$user->phone);
            $xml->addChild("createdAt", $user->createdAt);
            $image = $xml->addChild('img');
            $image->addAttribute('src', $user->img->Attributes());
            $xmlFile = '../app/controllers/pdfGEN/src/main/resources/user.xml';
            file_put_contents($xmlFile, $xml->asXML());



            // Building & running the java program
            $output = shell_exec("cd " . __DIR__ . "/pdfGEN 2>&1 && .\gradlew build 2>&1 && .\gradlew run 2>&1");
            $pdfFile = $_SERVER['DOCUMENT_ROOT'] . '/' . WEBSITE_TITLE . "/public/uploads/customerCard.pdf";

            $file_contents = file_get_contents($pdfFile);
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"customerCard.pdf\"");
            echo $file_contents;

            // Delete generated files from the server
            unlink($xmlFile);
            unlink($pdfFile);

            // redirect to profile:
            header("Location: profile");

        }
        else // if user not connected --> he can't download a customerCard
        {
            header("Location: ". ROOT);
        }
    }
}