<?php
require_once 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$admin = "noreply8mail@gmail.com";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'noreply8mail@gmail.com';
$mail->Password = 'hppjwkkyyjruaytf';
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true);
$mail->Port = 465;
$mail->From = 'noreply8mail@gmail.com';
$mail->FromName = 'Salems I.T.';
$mail->AddAddress('enquiry@salemsit.org.in', 'Salems I.T.');

header('Content-Type: application/json');

$fname = $_POST['name'];
$mailid = $_POST['email'];
$phone = $_POST['phone'];
$experience = $_POST['experience'];

$formcontent = '
<!DOCTYPE html>
<html lang="en" style="color: gray;">
<head>
<meta charset="UTF-8">
<title>Client Details</title>
</head>
<body style="color: black;font-family:roboto" >
  <table align="center" cellpadding="0" cellspacing="0"   width="600" border-collapse="collapse">
      <tr>
        <td >
          <table  align="center" color="#3333333"  cellpadding="0" cellspacing="0"  bgcolor="#f2f2f2" width="100%" >
            <tr>
              <td>
                <table align="center"  cellpadding="0" cellspacing="0"  width="360" style="padding-top:50px;padding-bottom:50px;"> 
                  <tr>
                    <td align="right" style="padding:10px 0px">Name </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">' . $fname . '</td>              
                  </tr>
                  <tr>
                    <td align="right" style="padding:10px 0px">Email </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">' . $mailid . '</td>
                  </tr> 
                  <tr>
                    <td align="right" style="padding:10px 0px">Phone </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">' . $phone . '</td>
                  </tr> 
                  <tr>
                    <td align="right" style="padding:10px 0px">Total Experience </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">' . $experience . '</td>
                  </tr>                    
                </table>
              </td>
            </tr>                
          </table>
        </td>
      </tr>
    </table>    
  </div>
</body>
</html>
';

$subject = 'New Enquiry has been registered';
$altbody = 'This is the body in plain text for non-HTML mail clients';
$mail->Subject = $subject;
$mail->Body    = $formcontent;
$mail->AltBody = $altbody;

if (!$mail->Send()) {
    header('Location: data-science-advanced-bootcamp.html');
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
} else {
    header('Location: data-science-advanced-bootcamp_ty.html');
}
?>
