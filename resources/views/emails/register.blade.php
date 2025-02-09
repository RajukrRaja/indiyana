@component('mail::message')
# Welcome, {{ $user->name }}!  

Thank you for joining **{{ config('app.name') }}**. We're excited to have you on board!  

To complete your registration, please verify your email address by clicking the button below:  

@component('mail::button', ['url' => route('verify', $user->remember_token)])
Verify My Email
@endcomponent  

If you didn’t sign up for an account with us, please ignore this email.  

---  

If you have any questions or need assistance, feel free to reach out to our support team.  

Best regards,  
**The {{ config('app.name') }} Team**
@endcomponent
