<?php  
date_default_timezone_set('PRC');
error_reporting(0);
$connect = mysqli_connect('127.0.0.1','root','root','test');

if(mysqli_connect_errno($connect)) {
    echo mysqli_connect_error();die; 
}

function findAll($sql)
{
    global $connect;
    $data = []; 
    $result = mysqli_query($connect,$sql);
    if(!$result) {
    	return $data;
    }
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    	$data[] = $row;
    }
    return $data;
}
//图片上传
function upload() 
{

  	if ($_FILES["file"]["error"] > 0)
    {
    	return false;
    	return  $_FILES["file"]["error"];
   
    } 

   	if (file_exists("upload/" . $_FILES["file"]["name"]))
    {
    	return false;
       return $_FILES["file"]["name"] . " already exists";
    } 

    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);

    return "upload/" . $_FILES["file"]["name"];
      
    
    
 
}



