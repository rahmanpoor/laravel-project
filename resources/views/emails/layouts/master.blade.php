<!doctype html>
<html lang="fa" dir="rtl">
<head>

    @include('emails.layouts.head-tag')
    @yield('head-tag')

</head>
<body>




    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
    <!-- end main one col -->




</body>
</html>
