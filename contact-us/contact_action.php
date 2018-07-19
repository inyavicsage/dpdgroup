<?php

require '../tracking/funcs.php';

if (!areset(['name', 'email', 'phone', 'message'])) {
	header('Location: index.html?msg=Err1: An error occured. Please try again later.');
	exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$to = 'delivery@dpdgroupintl.com';
$subject = 'New mail from ' . $name;
$message = "Name: $name \r\n Email: $email \r\n Phone: $phone \r\n\r\n $message";

if (!mail($to, $subject, $message)) {
	$msg = 'Err1: An error occured. Please try again later.';
} else {
	$msg = 'Thank you for contacting us. Expect response soon.';
}

header('Location: index.html?msg=' . $msg);
exit();