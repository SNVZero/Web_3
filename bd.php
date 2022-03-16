<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
header('Content-Type: text/html; charset=UTF-8');


$errors=FALSE;
if(empty($_POST['names'])){
    print('Введите Имя.<br/>');
    $errors=TRUE;
}
if(empty($_POST['email'])){
    print('Введите почту.<br/>');
    $errors=TRUE;
}

if (empty($_POST['dayofbirth'])) {
    print('Введите дату своего рождения.<br/>');
    $errors = TRUE;
}


if(empty($_POST['gender'])){
    print('Укажите пол.<br/>');
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

if (!empty($_POST['limbs'])) {
    print('Укажите количество конечностей.<br/>');
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
    print('Укажите хоть одну суперспособность.<br/>');
    $errors = TRUE;
}
$power1=in_array('s1',$_POST['capabilities']) ? '1' : '0';
$power2=in_array('s2',$_POST['capabilities']) ? '1' : '0';
$power3=in_array('s3',$_POST['capabilities']) ? '1' : '0';
$power4=in_array('s4',$_POST['capabilities']) ? '1' : '0';

if (empty($_POST['bio'])){
    print('Напишите краткую биографию.<br/>');
    $errors= TRUE;
}



$user='u46878';
$pass='2251704';
$db = new PDO("mysql:host=localhost;dbname=u46878",$user,$pass,array(PDO::ATTR_PERSISTENT => true));

    $stmt = $db->prepare("INSERT INTO application SET name = ?,mail=?,bio=?,date =?,gender=?,libs=?,noclip=?,immortal=?,fly=?,lasers=?");
    $stmt -> execute(array($_POST['names'],$_POST['email'],$_POST['bio'],$_POST['dayofbirth'],$gender,$limbs,$power2,$power1,$power3,$power4));
if( $stmt -> execute(array($_POST['names'],$_POST['email'],$_POST['bio'],$_POST['dayofbirth'],$gender,$limbs,$power2,$power1,$power3,$power4));){
    $massage="Данные успешно сохранены";
}else{
    $massage="Ошибка";
}

$response=['massage'=>$massage];
header('Content-typy: application/json');
echo json_encode($response);
?>