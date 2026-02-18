<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; }
        .header { background: #000; color: #fff; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .footer { font-size: 12px; color: #999; text-align: center; margin-top: 20px; }
        .highlight { color: #dc2626; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin:0; text-transform: uppercase; font-style: italic;">FDP <span style="color:#dc2626;">Digitals</span></h1>
        </div>
        <div class="content">
            <p>Hello <strong>{{ $name }}</strong>,</p>
            <p>Thank you for reaching out to us regarding <span class="highlight">{{ $service }}</span>.</p>
            <p>This is a confirmation that we have received your message. One of our strategy experts will review your details and get back to you within 24 hours.</p>
            <p>In the meantime, feel free to check out our latest case studies on our website.</p>
            <p>Best regards,<br><strong>The FDP Digitals Team</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} FDP Digitals. All rights reserved.
        </div>
    </div>
</body>
</html>