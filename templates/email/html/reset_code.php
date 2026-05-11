<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        .box {
            max-width: 420px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #fff;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 16px;
        }
        .code {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 4px;
            background: #f3f3f3;
            padding: 12px;
            text-align: center;
            border-radius: 6px;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="box">
    <div class="title">Your Password Reset Code</div>

    <p>Hello <?= h($name) ?>,</p>

    <p>Use the code below to reset your password:</p>

    <div class="code"><?= h($code) ?></div>

    <p>This code expires in 1 hour.</p>

    <p>You can also verify using this link:</p>

    <p><a href="<?= h($verifyLink) ?>"><?= h($verifyLink) ?></a></p>


    <div class="footer">
        If you didn’t request this, you can ignore this email.
    </div>
</div>
</body>
</html>
