
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<!-- End Left Sidebar  -->
<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    <?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
     // $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
$mail->SMTPSecure = 'ssl';
$mail->Host = 'sitestarter2.xyz';
$mail->Port = 465;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "send@sitestarter2.xyz";
//Password to use for SMTP authentication
$mail->Password = "Cornellekacy45";
    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('send@sitestarter2.xyz', 'Happy Tails Movers Inc');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress($_POST['email'], 'Happy Tails Movers Inc');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['jkname'])) {
        $mail->Subject = 'Happy Tails Movers Inc';
        //Keep it simple - don't use HTML
        $mail->isHTML(true);
           $mail->AddEmbeddedImage('bar.png', 'logoimg', 'bar.png');
        $mail->AddEmbeddedImage('logo.png', 'logoimg1', 'logo.png');
            $jk = $_POST['jkname'];
            $jkt = $_POST['tracking'];
            $jktg = $_POST['gram'];
        $mail->Body = "
                 <img src=\"cid:logoimg1\" />
                    <h3><strong style='color: rgb(255,153,0);'>HELLO</strong> <strong style='text-transform: capitalize; color: rgb(255,153,0);'> $jk </strong></h3>
                    <p> $jktg </p>
                    <br>
                      <h3>Tracking No :  $jkt    </h3>  
                    <img src=\"cid:logoimg\" />
                    <br><br>
                    https://happytailsmovers.info/track.php
                    <br><br><br><br>
                    <P style='font-size: 11px;'>This invoice  is processed by Happy Tails Movers Logistics Inc.  1289 Franklin Street <br>
Greensboro AL ,USA . If you need more information, please contact info@happytailsmovers.info</P>
<P style='font-size: 11px;'>By using our  services, you agree to happytailsmovers.info  Privacy Notice and Conditions of Use.</P>
<P style='font-size: 11px;'>This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this message</P>
                        ";
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.'. $mail->ErrorInfo;
        } else {
            echo "<script>alert('Message Successfully Sent we will get back to you shortly');
            window.location.href = 'mail.php'</script>";
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>

        <!-- End Bread crumb -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row">
                <div class="col-md-3">
                 
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-title">

                        </div>
                        <div class="basic-form">
                            <div class="basic-form">
                                <form  method="post" >
                                    <label><b>Jk Name</b></label>
                                    <input type="text" name="jkname" class="form-control" placeholder="Jk Name" required="">
                                </div>
                                <div class="form-group">
                                    <label><b>Jk Email</b></label>
                                    <input type="email" name="email" class="form-control" placeholder="Jk Email" required="">
                                </div>
                                   <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="textarea_editor form-control" name="gram" rows="15" placeholder="Enter text ..." style="height:150px"></textarea>

                                </div>
                              
                                <div class="form-group">
                                    <label><b>Tracking Number</b></label>
                                    <input type="text" name="tracking" class="form-control" placeholder="Tracking Number" required="">
                                </div>
                                <button type="submit"class="btn btn-primary">Mail Tracking</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
         
        </div>
    </div>







    <!-- End PAge Content -->
    <?php include 'footer.php'; ?>