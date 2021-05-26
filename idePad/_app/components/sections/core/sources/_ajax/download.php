<?php

namespace idePad\Component\Ajax\sections\core\sources;

use PFC\Editor\Component\AjaxController;

class download extends AjaxController
{           
   public function indexAction() 
   { 
       
   
        @set_time_limit(0);

        $root = filter_input(INPUT_GET,'root');
        $path = filter_input(INPUT_GET,'path');

        $fs = new \PFC\Editor\Sources($root);

        if($fs->fileExists($path) && !$fs->isDir($path))
        {
          $fs->readFile($path);
        }
        elseif($fs->fileExists($path))
        {
           //pack to zip
          //serve
        }
        else
        {
          echo "NOT EXISTiNG FLESYSTEM PATH {$root} {$path}";  
        }
        exit; 

   }

}
