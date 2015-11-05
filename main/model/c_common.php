<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-05
 * Time: 오후 8:15
 */

class Template{


    private $data;
    /*
     * constructor
     */

    function __constructor(){

    }

    function load($argURL){
        include ($argURL);
    }

    function setData($argName, $argValue){
        $this->data[$argName] = htmlentities($argValue, ENT_QUOTES);
    }

    function getData($argName){
        if (isset($this->data[$argName])){
            return $this->data[$argName];
        }
        else{
            return 'Nothing Set on Data';
        }
    }
}

?>