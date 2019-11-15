<!DOCTYPE html>
<html class="no-js" lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="employee">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
    <!-- Thư viện css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <title> @yield('title') </title>
</head>

<body>
    @include('master.header')
    <div class="container">
        <div class="row mt-3 text-center justify-content-center">
            @yield('content')
        </div>
    </div>
    @include('master.footer')

    <!-- Thư viện js -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>