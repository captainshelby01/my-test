<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { width: 80%; margin: auto; padding: 20px; border: 1px solid #eee; }
        .header { background: #000; color: #fff; padding: 20px; text-align: center; }
        .footer { font-size: 12px; color: #777; margin-top: 20px; }
        .red { color: #dc2626; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>FDP <span style="color: #dc2626;">DIGITALS</span></h1>
        </div>
        <p>Hi <strong>{{ $name }}</strong>,</p>
        <p>Thank you for reaching out to us regarding <span class="red">{{ $service }}</span>.</p>
        <p>Our team has received your message and we are currently reviewing your requirements. One of our experts will contact you within the next 24 hours.</p>
        <p>In the meantime, feel free to reply to this email if you have any urgent questions.</p>
        <p>Best Regards,<br><strong>FDP Digitals Team</strong></p>
        <div class="footer">
            &copy; 2026 FDP Digitals | Lagos, Nigeria
        </div>
    </div>
</body>
</html>