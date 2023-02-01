<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <title>Backend Ticketing</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="{{asset('public/resource/js/feather-icons.min.js')}}"></script>
</head>

<body>
    @include('backend.css')
    <div class="loading" id="loader"></div>
    <div class="head text-center">
        <img src="{{asset('public/resource/img/footer-logo.png')}}" class="head-img">
    </div>
    @yield('content')
    <div class="foot">
        <img src="{{asset('public/resource/img/footer.jpg')}}" class="foot-img">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script>
        $(window).on('load', function () {
            $('#loader').delay(450).fadeOut('slow');
        });
    
        $(document).ready(function(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#cbd a").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function(){
            $("#search2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".tbbd tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function(){
            $(".searchx").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".tbbd tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        
        function loadingon(){
            $('#loader').show();
        }
        function loadingoff(){
            $('#loader').hide();
        }
        function loadingon2(){
            $('.loading2').show();
        }
        function loadingoff2(){
            $('.loading2').hide();
        }
    </script>

</body>

</html>