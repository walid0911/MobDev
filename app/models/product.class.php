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
    public function getAllMarks()
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
        $mark = $xml->xpath("//c:products/c:product[not(c:mark = preceding:: c:mark)]/c:mark");
        return $mark;
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

    public function getProductsByFilter($POST, $filterBy) {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");
    }
}