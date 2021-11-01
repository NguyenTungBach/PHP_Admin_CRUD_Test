<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p><strong>Email: </strong>{{$dataContact['nameEmail']}}</p>
    <p><strong>Name: </strong>{{$dataContact['nameSend']}}</p>
    <p><strong>Subject: </strong>{{$dataContact['subject']}}</p>
    <br>
    <h2>Message</h2>
    {{$dataContact['message']}}
</body>
</html>
