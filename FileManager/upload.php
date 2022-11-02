<?php
//get current file path to code
$getCurrentPath = getcwd();

$uploadFolder = "/uploads/";

//create an array of allowed files
$allowedFileTypes = ['png', 'jpg', 'jpeg', 'txt', 'doc', 'mp3', 'wav', 'mp4', 'mkv', 'avi' ];

//capture file data wit global 
$fileName = $_FILES['file']['name'];//returns the file name
$fileType = $_FILES['file']['type'];//returns the file type
$fileSize = $_FILES['file']['size'];//returns size in bytes
$fileTemp = $_FILES['file']['tmp_name'];//returns temporal file in server


// $fileExtension = strtolower( $fileName );//string to lowecase

//strtolower - turns string to lowercase because the file types are in lowercase
//explode() - turns string to array using a seperator 
//end() - returns the last element of an array. will always be the file extension
$filter = explode( '.', $fileName );
$str = end( $filter );
$fileExtension = strtolower( $str );

//upload directory - this is where we want to upload the file to and the name we want
$uploadPath = $getCurrentPath.$uploadFolder.$fileName;

//form submission

//way 1
// if( isset ($_POST['submit']) ){  

// }

//way 2 - post means som1 is posting somtn to the server
if(  $_SERVER["REQUEST_METHOD"] == "POST" ){

    //if you also want to check for filesize

    // if( $fileSize > 30000  ){
    //     echo("file too large");
    //     return;
    // }else{
    //     //dumps info about a var 
    // //checkl file extensions
    // if( in_array($fileExtension, $allowedFileTypes)){
    //     //upload the file 
    //     $upload = move_uploaded_file($fileTemp, $uploadPath);
    //     echo("file type is valid");

    //     //check if file has been uploaded
    //     if($upload){
    //         echo("file has been uploaded");
    //     }else{
    //         echo("error upload failed");
    //     }
    // }}

    //dumps info about a var 
    //checkl file extensions
    if( in_array($fileExtension, $allowedFileTypes)){
        //upload the file 
        $upload = move_uploaded_file($fileTemp, $uploadPath);
        // echo("file type is valid");

        //check if file has been uploaded
        if($upload){
            echo("file has been uploaded");
        }else{
            echo("error upload failed");
        }
    }
 }

//dupms information about a variable
//var-dump prints from string to array to objects to numbers
//echo and print does only strings
// var_dump($getCurrentPath);

?>