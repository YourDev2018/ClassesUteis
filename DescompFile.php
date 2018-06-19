<?php
new DescompFile();

class DescompFile
{

    function __construct(){

        $compFile = $_REQUEST['file'];
        $compFile = 'xmlAnexos.zip';

        $ext = strtolower(substr($compFile,-4));

        if ($ext == '.rar') 
            $this->descompactRAR($compFile);
        if($ext == '.zip')
            $this->descompactZIP($compFile);
        
        
    }

    function descompactRAR($compFile){

        $rar = new RarArchive();
        $files = $rar->open($compFile);
        print_r($files);

    }

    function descompactZIP($compFile){
        
        $zip = new ZipArchive();
        $files = $zip->open($compFile);
        if ($files == true) {
        //    $zip->extractTo('http://localhost/yourdev/ClassesUteis/','teste.xml');
           print_r( $zip->extract($compFile));
        }


    }
    
}


?>