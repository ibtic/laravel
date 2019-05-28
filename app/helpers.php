<?php

if (!function_exists('cryptageID')) {
   /**
    * @param int $id
    * @return int $id

    */    function cryptageID($id)

    {        
           $id=$id+(15750*3);

   	       return $id;
    }
}

if (!function_exists('decryptageID')) {
   /**
    * @param int $id
    * @return int $id

    */    function decryptageID($id)

    {        
           $id=$id-(15750*3);

   	       return $id;
    }
}