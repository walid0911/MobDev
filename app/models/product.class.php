<?php

class product
{
    private $error = "";


    /**
     *
     * @return SimpleXMLElement contains all products or false if there's no product
     */
    public function getAllProducts()
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        return $xml;
    }

    /**
     *
     * @return array of SimpleXmlElements
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
     * @param $category, wanted category
     * @param $n, number of products wanted in that specific category
     *@return array of SimpleXmlObjects products, empty array if no product was found
     */
    public function get_n_ProductsByCategory($category, $n)
    {
        $xml = simplexml_load_file('../app/xml/products/products.xml');
        $xml->registerXPathNamespace('c', "https://www.w3schools.com");

        $products = $xml->xpath("//c:products/c:product[c:type = '{$category}']");

        $NbrProducts = min(count($products), $n);


        $i = 0;
        $Random_n_Products = array();

        for($i=0; $i<$NbrProducts; $i++)
        {
            $rand_index = array_rand($products);
            $Random_n_Products[$i] = $products[$rand_index];
            unset($products[$rand_index]);
        }
        
        return $Random_n_Products;
    }
}