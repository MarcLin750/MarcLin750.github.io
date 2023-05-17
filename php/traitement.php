<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$db_host = 'localhost';
$dbname ="formulaire";
$db_user = 'root';
$db_pass = '';

// database connection
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

// new data 
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$msg = $_POST['msg'];

if($nom == ' '){
    $errmsg_arr[] = 'Vous devez introduire votre nom.';
    $errflag = true;
}

if($prenom == ' '){
    $errmsg_arr[] = 'Vous devez introduire votre prénom.';
    $errflag = true;
}

if($email == ' '){
    $errmsg_arr[] = 'Vous devez introduire votre e-mail.';
    $errflag = true;
}

if($tel == ' '){
    $errmsg_arr[] = 'Vous devez saisir votre numéro de téléphone.';
    $errflag = true;
}

if($msg == ' '){
    $errmsg_arr[] = 'Vous devez introduire votre message.';
    $errflag = true;
}

if($errflag){
    $_SESSION['ERRMSG_ARR'] =$errmsg_arr;
    session_write_close();
    header("location : ../Contact_error.html");
    exit();
}

// query
$sql = "INSERT INTO contact (nom,prenom,email,tel,msg) VALUES (:sas,:asasa,:asas,:sasa,:asafs)";
$q = $conn->prepare($sql);
$q->execute(array(':sas'=>$nom,'asasa'=>$prenom,':asas'=>$email,'sasa'=>$tel,':asafs'=>$message));
header("location: ../Contact_submit.html");

?>
