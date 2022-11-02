<?php

    //get current file path to code
    $getCurrentPath = getcwd()."/uploads/";
    $items = scandir($getCurrentPath);
    // var_dump($Items);

    //filter items and remove unwanted characters from the arrAY
    //we can do that with an inbuilt php mthd called array_filter

    function removeDots($var){
        return( $var != '.' && $var != '..' );
    }

    $filteredItems = array_filter( $items, 'removeDots' );

    // var_dump($filteredItems);

   
    //a loop to iterate over all filtered items and get their file extension and merge with filename in an associative array

    //create empty ARRay where value will be pushed
    // $finalArray = array();

    foreach($filteredItems as $item){

        //strtolower - turns string to lowercase because the file types are in lowercase
        //explode() - turns string to array using a seperator 
        //end() - returns the last element of an array. will always be the file extension

        $filter = explode( '.', $item );
        $str = end( $filter );
        $fileExtension = strtolower( $str );

        //push item to array 
        $finalArray[$item] = $fileExtension;

    }

    //function that reads the file line by line with the parameter file which will be declared in arg when calling it

    function readDoc($file){
        //open the file in read mode - inbuilt func with r for read mode w for write mode
        $doc = fopen($file, 'r');
        //create a text variable to hold the text body
        $text = "";

        //starting line 
        // for line number get var a = 1 which will start from line one and after each iteration it give lines 2, 3 etc 
        //fgets gets the first line so using line = fgets(doc) is iteration over other lines 

        $a = 1;
        while ($line = fgets($doc) ) {
            //code
            $text .= " $line <br> ";//u can remove the "a" it just returns line number. we use .= to concatenate and add to already existing text 
            $a++;
        }
        return $text; //return the text
    }

?>