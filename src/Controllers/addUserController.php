<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use App\School\Entities\User;

$username=$_POST['username'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$dni=$_POST['dni'];
$type=$_POST['type'];

function uuid() {
    return Uuid::uuid4()->toString();
}


$user = new User(
    $uuid = uuid(),
    $username,
    $lastname,
    $email,
    $pass,
    $dni,
    $type);
    
    
