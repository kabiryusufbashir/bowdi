<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="icon"  type="image/x-icon" href="{{ asset('images/favicon.ico')}}"/>
    <title>Borno Women Development Initiative (BOWDI)</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</head>

<body>
    <div class="md:grid grid-cols-12 gap-2">
        @yield('container')
    </div>
    <!-- Department  -->
    @include('includes.dept-front')
    <!-- Rank  -->
    @include('includes.rank-front')
    <!-- Staff  -->
    @include('includes.staff-front')
    <!-- Profile -->
    @include('includes.profile-front')

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>  
</body>
</html>