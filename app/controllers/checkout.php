<?php

class Checkout extends Controller
{

    // index methode displays the view of the current logged in profile
    public function index()
    {
        $data = array();
        $data['page_title'] = "Shoipping Cart";

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
            $this->view("checkout", $data);
        }
        else // if user not logged in, redirect to home
        {
            header("Location: ". ROOT);
        }
    }

    // Insert product in cart
    public function add_to_cart() {
        $data = array();
        $data['page_title'] = "Shoipping Cart";

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;

            //insert items into cart with Session Variable 'cart'
            if(!isset($_SESSION['counter']))
            {
                $_SESSION['counter'] = 0;
                $_SESSION['total'] = 0;
                $_SESSION['cart'] = array();
            }
            if(isset($_GET['id']) && $_GET['id'] != "")
            {
                $productModel = $this->load_model("product");
                $product = $productModel->getProductById($_GET['id']);
                $cartItem = array(
                    (string) $product->productID[0][0],
                    (string) $product->mark[0][0],
                    (string) $product->model[0][0],
                    (int) $product->price[0][0]
                );
                $_SESSION['cart'][$_SESSION['counter']] = array($cartItem, (int) $_GET['quantity']);
                $_SESSION['total'] += (int) $product->price[0][0] * (int) $_GET['quantity'];
                $_SESSION['counter']++;
            }
            header("Location: ". ROOT . "checkout");
        }
        else // if user not logged in, redirect to home
        {
            header("Location: ". ROOT);
        }
    }

    /**
     * Function used to generate facture as pdf.
     * it creates a new xml file user.xml from the logged-in user informations
     * then runs the java program given the user.xml file,
     * the java program applies the xsl transformation to the user.xml file and generates a pdf.
     * after the pdf is downloaded by the user,
     * the generated files( user.xml and customerCard.pdf ) are automatically deleted
     * and the user is redirected to his profile.
     */
    public function generateFacture() {

        //Create temporary user.xml that contains the user informations:
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null)
        {
            $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><factures xmlns=\"https://www.w3schools.com\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:schemaLocation=\"https://www.w3schools.com factures.xsd\"></factures>");

            $facture = $xml->addChild('facture');
            $facture->addChild('factureID', rand(1,10000));
            $facture->addChild('userID',$user->userID );
            $username = $facture->addChild('userName');
            $username->addChild('userFirstName',$user->firstName);
            $username->addChild('userLastName',$user->lastName);
            $facture->addChild('userPhone',$user->phone);
            $facture->addChild("date", date('Y-m-d h:i:sa'));
            $products = $facture->addChild('products');
            foreach ($_SESSION['cart'] as $item) {
                $product = $products->addChild('product');
                $product->addChild('description', $item[0][1] . " " . $item[0][2]);
                $product->addChild('quantity', $item[1]);
                $product->addChild('unitPrice', $item[0][3]);
                $product->addChild('allPrice', ($item[0][3] * $item[1]));
            }
            $facture->addChild('totalPrice', $_SESSION['total']);
            $xmlFile = ROOT_LOC . 'app/pdfGEN/src/main/resources/factures.xml';
            file_put_contents($xmlFile, $xml->asXML());


            generatePDF('factures.xml', 'factures.xsl', 'facture.pdf');

            // redirect to profile:
            emptyCart();
            header("Location: checkout");
        }
        else // if user not connected --> he can't download a customerCard
        {
            header("Location: ". ROOT);
        }
    }
}