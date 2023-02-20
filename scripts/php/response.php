<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sended</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/response.css">
</head>

<body>
    <div id="content">
        <p>Email sended to: <?php echo $_POST["destiny"] ?></p>
        <p>Subject: <?php echo $_POST["subject"] ?></p>
        <button onclick="location.href='../../'" type="button">
         Go back</button>
    </div>

    <?php
    require '../../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_POST['sender'];
    $mail->Password = $_POST['password'];
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom($_POST['sender']);
    $mail->addAddress($_POST['destiny']);

    $mail->isHTML(true);

    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];

    $mail->send();

    echo 
    "
    <script>
        console.log('sus');
    </script>
    ";

    ?>

</body>

</html>