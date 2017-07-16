<?php
error_reporting(0);
date_default_timezone_set('Asia/Shanghai');
require_once("Phpmailer.class.php");
require_once("config.php");
$out_trade_no = date('Y-m-d h:i:s');
$mail = new Phpmailer();
$mail->IsSMTP(); 
$mail->CharSet = "utf-8";
$mail->Host = $Mailhost;
$mail->SMTPAuth = true;
$mail->Username = $MailUsername;
$mail->Password = $MailPassword;
$mail->From = $MailFrom;
$mail->FromName = $FromName;
$mail->AddAddress($MailTo,$FromName);

$mail->AddAddress($MailaTo,$FromName);
$mail->AddAddress($MailbTo,$FromName);

$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = "客户 ["."$_POST[phone]"."] ：提交了信息";
$mail->Body = "

<table width='600' border='1' bordercolordark='#FFFFFF' bordercolorlight='#CCCCCC' cellpadding='5' cellspacing='0'>
  <tr>
    <td width='200' bgcolor='#F7F7F7' align='center'>客户提交信息：</td>
    <td width='400'>&nbsp; 清宿便</td>
  </tr>
  <tr>  
    <td bgcolor='#F7F7F7' align='center'>手机号码：</td>
    <td>&nbsp; "."$_POST[phone]"."</td>
  </tr>
  <tr>
    <td bgcolor='#F7F7F7' align='center'>qq号：</td>
    <td>&nbsp; "."$_POST[qq]"."</td>
  </tr>
  <tr>
    <td bgcolor='#F7F7F7' align='center'>提交时间：</td>
    <td>&nbsp; "."$out_trade_no"."</td>
  </tr>
</table>";
if(!$mail->Send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
	 echo "
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
    $msg="您的信息提交成功，我们会尽快与您取得联系，祝您浏览愉快!";
    echo "<script>alert('$msg');self.location=document.referrer</script>";	
}
 ?>

