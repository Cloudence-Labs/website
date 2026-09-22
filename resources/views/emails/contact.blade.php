<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Website enquiry</title>
</head>
<body style="margin:0;padding:32px 16px;background:#FAFAF8;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif;color:#141414;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">
    <tr><td style="padding:0 0 20px;font-size:22px;font-weight:700;letter-spacing:-0.02em;">Cloud<span style="color:#F08033;">ence</span></td></tr>
    <tr><td style="background:#FFFFFF;border:1px solid #E6E4DF;border-radius:18px;padding:28px;">
      <p style="margin:0 0 6px;font-size:11px;letter-spacing:0.18em;text-transform:uppercase;font-weight:700;color:#5F6168;">New website enquiry</p>
      <h1 style="margin:0 0 22px;font-size:22px;line-height:1.25;letter-spacing:-0.02em;">{{ $data['name'] }}</h1>

      <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:14.5px;line-height:1.6;">
        <tr><td style="padding:4px 18px 4px 0;color:#5F6168;white-space:nowrap;">Email</td><td style="padding:4px 0;"><a href="mailto:{{ $data['email'] }}" style="color:#141414;">{{ $data['email'] }}</a></td></tr>
        @if (!empty($data['phone']))
          <tr><td style="padding:4px 18px 4px 0;color:#5F6168;">Phone</td><td style="padding:4px 0;"><a href="tel:{{ preg_replace('/\s+/', '', $data['phone']) }}" style="color:#141414;">{{ $data['phone'] }}</a></td></tr>
        @endif
        @if (!empty($data['organisation']))
          <tr><td style="padding:4px 18px 4px 0;color:#5F6168;">Organisation</td><td style="padding:4px 0;">{{ $data['organisation'] }}</td></tr>
        @endif
        @if (!empty($data['service']))
          <tr><td style="padding:4px 18px 4px 0;color:#5F6168;">Interested in</td><td style="padding:4px 0;">{{ $data['service'] }}</td></tr>
        @endif
      </table>

      <p style="margin:22px 0 6px;font-size:11px;letter-spacing:0.18em;text-transform:uppercase;font-weight:700;color:#5F6168;">Message</p>
      <p style="margin:0;font-size:15px;line-height:1.65;white-space:pre-line;">{{ $data['message'] }}</p>
    </td></tr>
    <tr><td style="padding:18px 4px 0;font-size:12px;color:#5F6168;">Sent from the contact form on {{ config('app.url') }}. Reply to this email to respond directly.</td></tr>
  </table>
</body>
</html>
