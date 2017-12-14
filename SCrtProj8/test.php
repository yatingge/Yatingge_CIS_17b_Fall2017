<?php

$password = "123";
$secrect = password_hash($password,PASSWORD_BCRYPT);

echo $secrect;


echo "<br>";

$secrect1 =password_hash($password,PASSWORD_BCRYPT);
echo $secrect1;

echo "<br>";

if(password_verify($password,$secrect)){
	echo "yes";
}

echo "<br>";

if(password_verify($password,$secrect1)){
	echo "yes";
}

?>