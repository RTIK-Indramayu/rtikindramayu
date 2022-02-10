<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer

if (isset($_POST['submit'])) {

    $mail = new PHPMailer(true);
            
    $pengirim = $_POST['pengirim'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];
         
    // Server settings
    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output*/
    $mail->SMTPDebug = false;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = 'moh.ramdani22@gmail.com'; // YOUR gmail email
    $mail->Password = '089619000501'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('moh.ramdani22@gmail.com');
    $mail->addAddress('moh.ramdani22@gmail.com', 'moh.ramdani22@gmail.com');
    $mail->addReplyTo('moh.ramdani22@gmail.com', 'moh.ramdani22@gmail.com'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = 'RTIK Mail Report!! . . '.($subjek);
    // $mail->AddEmbeddedImage($newImage, "my-attach", $newImage);
    $mail->Body = 'Email/phone dari : '.($pengirim).'     '.($pesan);
    $mail->AltBody = 'Email/phone dari : '.($pengirim).'     '.($pesan);
    /*$mail->AddAttachment($newImage);*/
    $mail->send();
    
    
    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "<script>alert('Email Berhasil Terkirim, Kami akan segera menanggapinya.');
             location.href='';
            </script>";

     }

}

?>
 
 
<!-- Page Content -->
<div class="container">
    
        <div class="row  justify-content-center align-items-center">
            <div class="col-sm-5 border border-transparent shadow-lg mt-4 px-5 py-3 ">
                <div class="form-wrap">
				    <h3 class="text-center"><i class="py-3 fas fa-envelope fa-2x text-secondary"> Mail</i> </h3>
                        <form name="contact-us" role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                            
                            <div class="form-group">
                                <label for="email" class="sr-only">Nama</label>
                                <input type="text" name="nama" id="pengirim" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">Email</label>
                                <input type="email" name="email" id="subjek" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="pesan" id="pesan" cols="50" rows="6" placeholder="Tulis pesan Anda..."></textarea>
                            </div>

                            <button type="submit" name="submit" id="btn-login" class="btn btn-secondary btn-lg btn-block mb-3" value="Send">Kirim</button>
                        </form>
                </div>
            </div> <!-- /.col-sm-5 -->
        </div> <!-- /.row -->


<br>    
<hr>
</div> <!-- /.container -->

<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbwTbJT0T3LpnvNuYBWRFVruWYF_QI6GSb8oKgP87OJp-JK_YxXX2IXIJZi0E0dEwHKc/exec'
  const form = document.forms['contact-us']

  form.addEventListener('submit', e => {
    e.preventDefault()
    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => console.log('Success!', response))
      .catch(error => console.error('Error!', error.message))
  })
</script>

<?php include "includes/footer.php";?>

