 @extends('emails.layouts.master')




@section('content')
       <div class="container">
        <div class="header">
            سعید مارکت
        </div>
        <div class="content">
            <p>کاربر گرامی،</p>
            <p>کد تایید شما برای ورود به سایت:</p>
            <div class="otp-code">{!! $details['body'] !!}</div>
            <p>این کد تا 5 دقیقه معتبر است. لطفاً آن را با کسی به اشتراک نگذارید.</p>
        </div>
        <div class="footer">
            © 2025 سعید مارکت | همه حقوق محفوظ است
        </div>
    </div>
@endsection






