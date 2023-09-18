<?php
include 'db_connect.php';
$msg="";
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
	$firstname=mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname=mysqli_real_escape_string($con,$_POST['lastname']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$subject=mysqli_real_escape_string($con,$_POST['subject']);
	$message=mysqli_real_escape_string($con,$_POST['message']);
	
	mysqli_query($con,"INSERT INTO contact(firstname, lastname, email, subject, message) VALUES('$firstname', '$lastname', '$email','$subject','$message')");
	$msg="Thanks message";
	
	$html="<table>
                <tr>
                    <td>Name</td> <td>$firstname $lastname</td>
                </tr>
                <tr>
                    <td>Email</td><td>$email</td>
                    </tr>
                <tr>
                    <td>Subject</td><td>$subject</td>
                </tr>
                <tr>
                    <td>Message</td><td>$message</td>
                </tr>
            </table>";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=465;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="justinlomodcorpuz0626@gmail.com";
	$mail->Password="JustinCorpuz_11";
	$mail->SetFrom("justinlomodcorpuz0626@gmail.com");
	$mail->addAddress("justinlomodcorpuz0626@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		
	}else{
		
	}
	echo $msg;
}
?>