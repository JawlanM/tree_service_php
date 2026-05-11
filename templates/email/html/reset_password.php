<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        .container {
            max-width: 480px;
            margin: auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #ffffff;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
        }
        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 16px;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 12px 18px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title">Reset your password</div>

    <p>Hello <?= h($name) ?>,</p>

    <p>You requested to reset your password. Use the button below to continue:</p>

    <p>
        <a class="button" href="<?= h($resetUrl) ?>">Reset Password</a>
    </p>

    <p>If the button doesn’t work, copy and paste this link:</p>
    <p><?= h($resetUrl) ?></p>

    <div class="footer">
        If you didn’t request this, you can safely ignore this email.
    </div>
</div>
</body>
</html>
