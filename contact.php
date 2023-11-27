<?php 
require_once('config.php');

$form_sent = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['name']) && isset($_POST['number'])
    && isset($_POST['email']) && isset($_POST['subject'])
    && isset($_POST['message'])) {

        $full_name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $number = htmlspecialchars($_POST['number']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);
        $date_day = date('Y-m-d');
        $_date_time = date('H:i:s');
        $is_archived = 0;

        $sql = "INSERT INTO contact (name, email, phone, email_subject, email_description, date, date_time, is_archived) VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $full_name, $email, $number, $subject, $message, $date_day, $is_archived);
        $stmt->execute();

        $form_sent = true;
        $notification = 'Form sent successfully!';

        $stmt->close();
    } 
}

echo $blade->run('contact', ['form_sent' => $form_sent, 'notification' => $notification]);

?>