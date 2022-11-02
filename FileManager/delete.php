<?php
//check for form submission
//if whatever method of the form is post then it runs the prog
if(  $_SERVER["REQUEST_METHOD"] == "POST" ){

    $file_name = $_POST["file_name"];
    //unlink is the function that deletes a file and it take a param of file path

    if(unlink("uploads/$file_name")){
        echo("file has been deleted");
    }else{
        echo("Error file not found");

    }

 }

?>