<?php
new DescompFile();

class DescompFile
{

    function __construct(){

        $compFile = $_REQUEST['file'];
        $compFile = 'xml_nfe.zip';

        $ext = strtolower(substr($compFile,-4));

        if ($ext == '.rar') 
            $this->descompactRAR($compFile);
        if($ext == '.zip')
            $this->descompactZIP($compFile);
        
        
    }

    function descompactRAR($compFile){

        $rar = new RarArchive();
        $files = $rar->open($compFile);
        if ($files == true) {
            print 'true';
            $zip->extractTo('xmlAnexos/');
            $zip->close();
         #   print_r( $zip->extract($compFile));
        }else{
            print 'false';
        }

    }

    function descompactZIP($compFile){
       // print $path = pathinfo(realpath($compFile), PATHINFO_DIRNAME);

        
        $zip = new ZipArchive();
        $files = $zip->open($compFile);
        if ($files == true) {
            print 'true';
            $zip->extractTo('xmlAnexos/');
            $zip->close();
         #   print_r( $zip->extract($compFile));
        }else{
            print 'false';
        }

    }
    
}


?>