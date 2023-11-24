<?php 
require_once('config.php');

$form_sent = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['name']) && isset($_POST['number'])
    && isset($_POST['email']) && isset($_POST['subject'])
    && isset($_POST['message'])) {
        $full_name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $date_day = date('Y-m-d');
        $_date_time = date('H:i:s');

        $sql = "INSERT INTO contact (name, email, phone, email_subject, email_description, date, date_time, is_archived) VALUES ('$full_name', '$number', '$email', '$subject', '$message', '$date_day', NOW(), 0)";

        $form_sent = true;
        $notification = 'Form sent successfully!';

        $conn->query($sql);
        $conn->close();

    } 
}

echo $blade->run('contact', ['form_sent' => $form_sent, 'notification' => $notification]);

?>