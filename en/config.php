<?php 
    $rootPath = '../';
    $language = "en";
    $contentLang = 'English';

    function active($currect_lang){
        $language = "en";
        if($currect_lang == $language){
            echo 'active'; 
        } 
      }
?>