<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body {
                font-family: verdana;
                background-color: #ddd;
                font-size: 12px;
            }
            #container {
                border: 1px solid #aaa;
                border-radius: 5px;
                background-color: #fff;
                margin: 40px auto;
                width: 600px;
                padding: 20px
            }
            h1 {
                font-size: 24px;
                font-weight: normal;
                border-bottom: 1px solid #aaa;
                margin-top: 0;
            }
            h2 {
                font-size: 20px;
            }
            th, td {
                font-size: 12px;
            }
            th {
                padding-right: 10px;
                text-align: right;
                vertical-align: middle;
                font-weight: normal;
            }
        </style>
    </head>

    <body>
        <div id="container">
            <?php
            if(isset($_POST['email'])) {
             
                // EDIT THE 2 LINES BELOW AS REQUIRED
             
                $email_to = "info@milalaserclinic.com";
             
                $email_subject = "Contact Form Submission from Mila Laser Clinic";
                 
             
                function died($error) {
             
                    // your error code can go here
             
                    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
             
                    echo "These errors appear below.<br /><br />";
             
                    echo $error."<br /><br />";
             
                    echo "<a href='contact.php#contact-forms'>Please go back and fix these errors.</a><br /><br />";
					
             
                    die();
             
                }
             
                 
             
                // validation expected data exists
             
                if(!isset($_POST['name']) ||
             
                    !isset($_POST['email']) ||
             
                    !isset($_POST['comments'])) {
             
                    died('We are sorry, but there appears to be a problem with the form you submitted.');       
             
                }
             
                 
             
                $name = $_POST['name']; // required
             
                $email_from = $_POST['email']; // required
             
                $comments = $_POST['comments']; // required
             
                 
             
                $error_message = "";
             
                $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
             
              if(!preg_match($email_exp,$email_from)) {
             
                $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
             
              }
             
                $string_exp = "/^[A-Za-z .'-]+$/";
             
              if(!preg_match($string_exp,$name)) {
             
                $error_message .= 'The Name you entered does not appear to be valid.<br />';
             
              }
             
              if(strlen($comments) < 2) {
             
                $error_message .= 'The Comments you entered do not appear to be valid.<br />';
             
              }
             
              if(strlen($error_message) > 0) {
             
                died($error_message);
             
              }
             
                $email_message = "Form details below.\n\n";
             
                 
             
                function clean_string($string) {
             
                  $bad = array("content-type","bcc:","to:","cc:","href");
             
                  return str_replace($bad,"",$string);
             
                }
             
                 
             
                $email_message .= "Name: ".clean_string($name)."\n";
             
                $email_message .= "Email: ".clean_string($email_from)."\n";
             
                $email_message .= "Comments: ".clean_string($comments)."\n";
             
                 
             
                 
             
            // create email headers
             
            $headers = 'From: '.$email_from."\r\n".
             
            'Reply-To: '.$email_from."\r\n" .
             
            'X-Mailer: PHP/' . phpversion();
             
            @mail($email_to, $email_subject, $email_message, $headers);  
             
            ?>
             
             
             
            <!-- include your own success html here -->
             
             
             
            <a href="index.php">Thank you for contacting us. We will be in touch with you very soon.<br/><br/>
            < Go Back to Mila Laser Clinic Site
            </a>
            
             
             
             
            <?php
             
            }
             
            ?>
            
             </div>
    </body>
</html>