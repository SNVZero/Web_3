<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');


$errors=FALSE;
if(empty($_POST['names'])){

    $errors=TRUE;
}
if(empty($_POST['email'])){

    $errors=TRUE;
}

if (empty($_POST['dayofbirth'])) {

    $errors = TRUE;
}


if(empty($_POST['gender'])){

    $errors=TRUE;
}

switch($_POST['gender']) {
    case 'm': {
        $gender='m';
        break;
    }
    case 'f':{
        $gender='f';
        break;
    }
};

if (empty($_POST['limbs'])) {
    $errors = TRUE;
}

switch($_POST['limbs']) {
    case '2': {
        $limbs='2';
        break;
    }
    case '4':{
        $limbs='4';
        break;
    }
    case '8':{
        $limbs='8';
        break;
    }
    case '16':{
        $limbs='16';
        break;
    }
};

if (empty($_POST['capabilities'])) {

    $errors = TRUE;
}
$power1=in_array('s1',$_POST['capabilities']) ? '1' : '0';
$power2=in_array('s2',$_POST['capabilities']) ? '1' : '0';
$power3=in_array('s3',$_POST['capabilities']) ? '1' : '0';
$power4=in_array('s4',$_POST['capabilities']) ? '1' : '0';

if (empty($_POST['bio'])){

    $errors= TRUE;
}

if($power1 == 1){
    $powers1 = 'immortal';
}else{
    $powers1 = 'no spell';
}

if($power2 == 1){
    $powers2 = 'noclip';
}else{
    $powers2 = 'no spell';
}

if($power3 == 1){
    $powers3 = 'flying';
}else{
    $powers3 = 'no spell';
}

if($power4 == 1){
    $powers4 = 'lazer';
}else{
    $powers4 = 'no spell';
}


$user='u46878';
$pass='2251704';
$db = new PDO("mysql:host=localhost;dbname=u46878",$user,$pass,array(PDO::ATTR_PERSISTENT => true));

    $stmt = $db->prepare("INSERT INTO application SET name = ?,mail=?,bio=?,date =?,gender=?,limbs=?,ability_1=?,ability_2=?,ability_3=?,ability_4=?");

if( $stmt -> execute(array($_POST['names'],$_POST['email'],$_POST['bio'],$_POST['dayofbirth'],$gender,$limbs,$powers1,$powers2,$powers3,$powers4))){
    $massage="Данные успешно сохранены";
}else{
    $massage="Ошибка";
}

$response=['massage'=>$massage];
header('Content-typy: application/json');
echo json_encode($response);
?>