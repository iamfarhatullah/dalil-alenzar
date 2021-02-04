<?php

if (isset($_POST['submitMessage'])) {
	
	$visitorName = $_POST['visitorName'];
	$visitorPhone = $_POST['visitorPhone'];
	$visitorEmail = $_POST['visitorEmail'];
	$visitorMessage = $_POST['visitorMessage'];

	$to = "farhatullah6683@gmail.com";

	$subject = "Visitor`s Message From: ".$visitorName." Email: ".$visitorEmail." Phone: ".$visitorPhone;
	$txt = $visitorMessage;
	
	if (mail($to,$subject,$txt)) {
		header("location: ../contact/?msg=sent");
	}else{
		header("location: ../contact/?error=notSent");
	}
	
}

?>