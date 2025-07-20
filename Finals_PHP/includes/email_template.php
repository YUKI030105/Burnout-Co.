<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #e53935; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .button { 
            display: inline-block; 
            padding: 10px 20px; 
            background-color: #e53935; 
            color: white; 
            text-decoration: none; 
            border-radius: 4px; 
            margin: 20px 0;
        }
        .footer { margin-top: 20px; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Burnout Co.</h2>
        </div>
        <div class="content">
            <h3>Hi {{first_name}},</h3>
            <p>Thank you for registering with Burnout Co. Please verify your email address to complete your registration.</p>
            <a href="{{verification_link}}" class="button">Verify Email Address</a>
            <p>If you didn't create an account with Burnout Co., you can safely ignore this email.</p>
        </div>
        <div class="footer">
            <p>This email was sent as part of your Burnout Co. account registration.</p>
            <p>© <?php echo date('Y'); ?> Burnout Co. All rights reserved.</p>
        </div>
    </div>
</body>
</html>