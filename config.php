<?php 
    $rootPath = '';
    $language = 'sr';  
    $contentLang = 'Serbian';
    $pagedir = $_SERVER['HTTP_HOST'] === "localhost" ? "/czvu" : "";

    function active($currect_lang){
        $language = 'sr';
        if($currect_lang == $language){
            echo 'active'; 
        } 
    };

    function activePage($currect_page){
        $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
        $url = end($url_array);  
        if($currect_page == $url){
            echo 'active'; //class name in css 
        } 
      }
?>