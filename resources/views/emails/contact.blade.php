<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
</head>
<body>
<h2>Mail from E-shopper</h2>
<h3>Name: {{$mail->name}}</h3>
<p>Email: {{$mail->email}}</p>
<p><strong>Subject :</strong> {{$mail->subject}}</p>
<p>
    <strong>Message :</strong>
    {{$mail->message}}
</p>
</body>
</html>
