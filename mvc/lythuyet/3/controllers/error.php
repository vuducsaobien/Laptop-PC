<?php

class Errror extends Controller{

    public function __construct(){
        echo '<h3>This is an Error</h3>';
    }

    public function index(){
        echo '<h3>' . __METHOD__ . '</h3>';
    }
    
}

