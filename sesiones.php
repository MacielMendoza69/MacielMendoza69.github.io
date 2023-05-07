<?php 
$error;
if(!empty($_POST['nickname']) && !empty($_POST['txtpassword'])){
    $nickname = $_POST['nickname'];
    $password = $_POST['txtpassword'];
    if($nickname=="cliente" && $password=="123"){
        header("location: usuario.php");
    }else if($nickname=="Administrador" && $password=="asd"){
        header("location: admin.php");
    }else{
        $error= "Incorrecto";
        header("location: index.php?error=$error");
    }
}else{
    $error= "vacio";
    header("location: index.php?error=$error");
}
