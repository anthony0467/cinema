<?php 

namespace Controller;
//  accéder à la classe Connect située dans le namespace "Model" 

class HomeController {

    public function getHomepage(){
  
        require "view/homepage.php";
    }
}


?>