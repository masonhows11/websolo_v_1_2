<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ config('app.name') }}</title>
    <style>
        body{
            background:#F7F7F7;
        }
        .container{
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .mail-header h2{
            text-align: center;
        }
        .mail-body .h2{
            text-align: center;
            padding: 10px auto;
        }
        .mail-body{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .mail-body div p{
            text-align: center;
        }
        .mail-footer p{
            text-align: center;
        }
        .mail-body , .mail-footer{
            border: 2px solid #DFE3EE;
            border-radius: 5px;
        }
        .mail-body , .mail-footer {
            margin:10px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="mail-header">
            <h2>ایمیل فعال سازی حساب کاربری</h2>
        </div>

        <div class="mail-body">
            <div>
                <p><span>{{ $user->name }}</span><span> :  کاربر عزیز </span></p>
            </div>
            <div>
                <p><span> {{ $code  }}</span><span> : کد فعال سازی </span></p>
            </div>
        </div>

        <div class="mail-footer">
            <p>{{ config('app.name') }}</p>
        </div>

    </div>
</body>
</html>
