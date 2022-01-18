<?php

class product
{
    private $error = "";


    /**
     * @return SimpleXMLElement contains all products or false if there's no product
     */
    public function getAllProducts()
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        return $xml;
    }

    /**
     *  returns SimpleXmlElements representing the distinct marks available
     *  @return array SimpleXmlElement or false
     */
    public function getAllBrands()
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $brand = $xml->xpath("//c:products/c:product[not(c:mark = preceding:: c:mark)]/c:mark");
        return $brand;
    }


    /**
     *  returns SimpleXmlElements representing the product of the given id
     * @return array SimpleXmlElement or false
     */
    public function getProductById($id)
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $product = $xml->xpath("//c:products/c:product[c:productID ='{$id}']");
        $product = array_shift($product);
        return $product;
    }

    /**
     *  returns array of SimpleXmlElements containing all the products of the specified category
     * @return array array of SimpleXmlElements
     */
    public function getProductsByCategory($category)
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $products = $xml->xpath("//c:products/c:product[c:type = '{$category}']");
        return $products;
    }


    /**
     * get n Random products by category, if the number of products of the specific category
     * is less than n, then return number of products
     *
     * @param $category : wanted category
     * @param $n : number of products wanted in that specific category
     *@return array  array of SimpleXmlObjects products, empty array if no product was found
     */
    public function get_n_ProductsByCategory($category, $n)
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $products = $xml->xpath("//c:products/c:product[c:type = '{$category}']");
        $NbrProducts = min(count($products), $n);


        // Simple algorithm to construct array of random elements from another array
        // get random $n element from $products array and put them in the new array
        $Random_n_Products = array();
        for($i=0; $i<$NbrProducts; $i++)
        {
            $rand_index = array_rand($products);
            $Random_n_Products[$i] = $products[$rand_index];
            unset($products[$rand_index]);
        }
        
        return $Random_n_Products;
    }

    public function getProductsByFilter($GET) {
        isset($GET['type']) ? $typeCount = count($GET['type']) : $typeCount = 0;
        isset($GET['brand']) ? $brandCount = count($GET['brand']) : $brandCount = 0;
        $xPathQuery = "//c:products/c:product[(c:price >= {$GET['minPrice']} and c:price <= {$GET['maxPrice']})";

        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");

        if ($typeCount != 0 && $GET['type'][0] != "all") {
            $xPathQuery .= " and (";
            foreach ($GET['type'] as $type) {
                $xPathQuery .= " c:type = '{$type}' or";
            }
            $xPathQuery .= " c:type = '{$GET['type'][0]}')";
        }

        if ($brandCount != 0 and $GET['brand'][0] != "all") {
            $xPathQuery .= " and (";
            foreach ($GET['brand'] as $brand) {
                $xPathQuery .= " c:mark = '{$brand}' or";
            }
            $xPathQuery .= " c:mark = '{$GET['brand'][0]}')";
        }

        $xPathQuery .= " ]";
        $products = $xml->xpath($xPathQuery);
        return $products;
    }


    public function addProduct($post)
    {
        $info = $post;

        $file = $_FILES['img']['name'];
        $target_dir = ROOT_LOC . "public/uploads/";
        $path = pathinfo($file);
        $ext = $path['extension'];
        $img = 'product' . $this->getMaxID()+1;
        $temp_name = $_FILES['img']['tmp_name'];
        $path_filename_ext = $target_dir . $img . "." . $ext;
        move_uploaded_file($temp_name, $path_filename_ext);
        $info['img'] = $img . '.' . $ext;
        $this->insertProduct($info);

        $_SESSION['success'] = "Product added!";
        header("Location: " . ROOT . "admin/products");
        die;
    }

    public function insertProduct($info)
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');

        $maxID = $this->getMaxID();
        $produit = $xml->addChild('product');
        $produit->addChild('productID', $maxID+1);
        $produit->addChild('type', $info['type']);
        $produit->addChild('mark', $info['mark']);
        $produit->addChild('model', $info['model']);
        $produit->addChild('cpu', $info['cpu']);
        $produit->addChild('ram', $info['ram']);
        $produit->addChild('storage', $info['storage']);
        $produit->addChild('gpu', $info['gpu']);
        $produit->addChild('size', $info['size']);
        $produit->addChild('camera', $info['camera']);
        $produit->addChild('price', $info['price']);
        $produit->addChild('description', $info['description']);
        $image = $produit->addChild('img');
        $image->addAttribute('src', $info['img']);
        file_put_contents('../app/xml/products/products.xml', $xml->asXML());

        // To insert in tree format not one line. Nicely formats output with indentation and extra space
        $xml = '../app/xml/products/products.xml';
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->load($xml);
        $dom->save($xml);
    }

    public function getMaxID()
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', 'https://www.w3schools.com');
        $allIDs = $xml->xpath("//c:products/c:product/c:productID");
        $maxID = $allIDs[$xml->count()-1];
        return $maxID;
    }

    public function validateData($data)
    {
    }
}