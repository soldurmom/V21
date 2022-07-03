<?php
namespace Temp;

class Templates{
    public $file; // $file = 'filename'
    public function __construct($file){
        $this -> file = $file;
    }
    public function renderTemplate($childFile,array $var){
        $content = file_get_contents($this->file);
        $insContent = file_get_contents($childFile);
        $content = str_replace('@content',$insContent,$content);
        foreach ($var as $key => $value){
            $content = str_replace($key,$value,$content);
        }
        return $content;
    }
}

//            $file = new Templates('public/layout.php');
//            echo $file -> renderTemplate('public/home.php',['@pageTitle' => 'Home']);