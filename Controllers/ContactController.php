<?php
require_once 'AppController.php';

class ContactController extends AppController {
    
    public function contact()
    {
        if ($this->isPost()) {
            if(isset($_POST['submit']))   {
                $mailFrom = $_POST['e-mail'];
                $subject = $_POST['subject'];
                $message = $_POST['msg-body--area'];

                $mailTo = "wallet.stats@onet.pl";
                $headers = "From: ".$mailFrom;

                mail($mailTo, $subject, $message, $headers);
                $this->render('contact', ['messages' => ['Your e-mail has been sent!']]);
                
            }
        }
        $this->render('contact');
    }
}
?>