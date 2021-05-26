<?php


$fs = new \PFC\Editor\Sources($_POST['root']);

    $base = $_POST['root'];
    $path = urldecode($_POST['path']);
    $expl = explode('/', $path);
 
if($fs->fileExists($path))
  {
    $text = $fs->getFileContents($path);

    //check string strict for encoding out of list of supported encodings

        $enc = mb_detect_encoding($text, mb_list_encodings(), true);

  		//overwrite ASCII	 

        
        if ($enc===false)
        {
            $enc = "UNKWN";
            $textToSend = $text;
            $saveToOpen = false;
        }
        elseif ($enc!=="UTF-8")
        {
            //$text = mb_convert_encoding($text, 'UTF-8', $enc);
                 /*  
               if(function_exists('incov'))
               {
                 $text = incov($enc,'UTF-8',$text);       
               }
               else {
                 */
                 $textToSend = \ForceUTF8\Encoding::fixUTF8(
                   \ForceUTF8\Encoding::toUTF8($text)
                 );
          	
          		$test = mb_convert_encoding($textToSend, $enc,'UTF-8');
          
          		if($test!=$text)
                  $saveToOpen = false;
          		else
                  $saveToOpen = true;
               //}
        }
        else
        {
        	$textToSend = $text;
            $saveToOpen = true;
        }
  
        if( $enc === 'ASCII' && mb_check_encoding($text,'UTF-8')) {
           $enc = 'UTF-8';    
        }   

    $json = new \stdClass();
    $json->succ = 'yes';
    $json->name = end($expl);
    $json->path = $path;
    $json->id = $base.'_'.str_replace('.','_',str_replace('/', '_', $path));
    $json->code = $textToSend;
    $json->base = $base;    
    $json->lu = $fs->getLastModificationTime($path);    
    $json->encoding = $enc;
    $json->saveToOpen = $saveToOpen ? 'yes' : 'no';
            
 }  
 else {
    $json = new \stdClass();
    $json->succ = 'no';
    $json->msg = 'File dont exists';
 }   

 echo json_encode($json);