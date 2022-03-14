<?php

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

if (empty($_POST['limbs'])) {
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
$power3=in_array('s4',$_POST['capabilities']) ? '1' : '0';
if (empty($_POST['agree'])) {
    print('Вы не согласились с условиями контракта!<br/>');
    $errors = TRUE;
}
$agree = 'agree';

if ($errors) {
    exit();
}
$user='u46878';
$pass='2251704';
$bd = new PDO("mysql:host=localhost;dbname=u46878",$user,$pass,array(PDO::ATTR_PERSISTENT => true));

try{
    $stmt = $bd->prepare("INSERT INTO application SET name = ?,email=?,bio=?,dateofbirth =?,gender=?,limbs=?,power1=?,power2=?,power3=?,power4=?");
    $stmt -> execute(array($_POST['names'],$_POST['email'],$_POST['bio'],$_POST['dayofbirth'],$gender,$limbs,$power1,$power2,$power3,$power4));
}
catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
}
header('Location: index.html');
?>