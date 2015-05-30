<?php
/**
 * Created by PhpStorm.
 * User: Adalberto
 * Date: 30/05/2015
 * Time: 16:10
 */

class ModelLoader {

    static function loadModel( $path ) {
        try {
            if(file_exists($path)) {
                $xml = simplexml_load_file($path);
                return $xml;
            }
            else {
                echo "cant load model at $path";
            }
        }
        catch(Exception $e) {
            echo "cant load model at $path";
            die();
        }

    }

    static function getXSI($node) {
        $namespaces = $node->getNamespaces(true);
        $xsi = $node->attributes($namespaces['xsi']);

        return $xsi;
    }
}

class ModelInstance {
    private static $instance;

    private $xml_model;

    public function __construct($xml_model) {
        $this->xml_model = $xml_model;
    }

   /* public function getInstance($xml_model) {
        if(!isset(self::$instance)) {
            $c = __CLASS__;
            $instance = new $c($xml_model);
        }

        return self::$instance;
    }*/

    /**
     * @return array of pages
     */
    public function getPages() {
        return $this->xml_model->pages;
    }

    /**
     * @return array of footers
     */
    private function getFooters() {
        return $this->xml_model->footers;
    }

    /**
     * @return array of headers
     */
    private function getHeaders() {
        return $this->xml_model->headers;
    }

    public function getPageContent($node) {
        return $node->content->innerContent;
    }

    public function getFooter($page) {
        $footer = $page['footer'];
        $footers = $this->getFooters();

        $ref = explode(".",$footer);
        $idx = intval($ref[1]);

        $footer = $footers[$idx];

        return $footer;
    }

    public function getHeader($page) {
        $header = $page['header'];
        $headers = $this->getHeaders();

        $ref = explode(".",$header);
        $idx = intval($ref[1]);

        $header = $headers[$idx];

        return $header;
    }
}