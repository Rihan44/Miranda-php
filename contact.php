<?php 
require_once('setup.php');
require_once('config.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name']) && isset($_POST['number'])
    && isset($_POST['email']) && isset($_POST['subject'])
    && isset($_POST['message'])) {
        $form_sent = true;
        $notification = 'Form sent!';
        // $conn->query($sql);
    } else {
        $form_sent = false;
    }
}

echo $blade->run('contact', ['form_sent' => $form_sent, 'notification' => $notification]);
$conn->close();
?>