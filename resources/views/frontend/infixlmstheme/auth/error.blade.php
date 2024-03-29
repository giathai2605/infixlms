<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset(Settings('favicon') )}}{{assetVersion()}}" type="image/png"/>
    <title>404</title>
    <link rel="stylesheet" href="{{asset('public/backend/')}}/vendors/css/bootstrap.css{{assetVersion()}}"/>
    <link rel="stylesheet" href="{{asset('public/backend/')}}/vendors/css/themify-icons.css{{assetVersion()}}"/>
    <link rel="stylesheet" href="{{asset('public/backend/')}}/css/style.css{{assetVersion()}}"/>
</head>
<body class="error admin">

<!--================ Start Login Area =================-->
<section class="login-area error-404">
    <div class="container">
        <div class="row login-height justify-content-center align-items-center">
            <div class="col-lg-5 col-md-8">
                <div class="text-center">
                    <div class="logo-container">
                        <a href="#">
                            <img src="{{asset('public/backend/img/404_Error.png')}}" alt="" width="100%">
                        </a>
                    </div>
                    <div class="content mt-30">
                        <h1 class="text-light">ooops!</h1>
                        <p>The Page You Looking for is not found.</p>
                    </div>

                    <div class="form-group mt-50 mb-30">
                        <a href="{{url('/login')}}" class="primary-btn fix-gr-bg">
                            Back To Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Start End Login Area =================-->


<script src="{{asset('public/backend/')}}/vendors/js/jquery-3.5.1.min.js"></script>
{{--    <script src="{{asset('public/backend/')}}/vendors/js/jquery-3.2.1.min.js"></script>--}}
<script src="{{asset('public/backend/')}}/vendors/js/popper.js"></script>
<script src="{{asset('public/backend/')}}/vendors/js/bootstrap.min.js"></script>
<script>
    $('.primary-btn').on('click', function (e) {
        // Remove any old one
        $('.ripple').remove();

        // Setup
        var primaryBtnPosX = $(this).offset().left,
            primaryBtnPosY = $(this).offset().top,
            primaryBtnWidth = $(this).width(),
            primaryBtnHeight = $(this).height();

        // Add the element
        $(this).prepend("<span class='ripple'></span>");

        // Make it round!
        if (primaryBtnWidth >= primaryBtnHeight) {
            primaryBtnHeight = primaryBtnWidth;
        } else {
            primaryBtnWidth = primaryBtnHeight;
        }

        // Get the center of the element
        var x = e.pageX - primaryBtnPosX - primaryBtnWidth / 2;
        var y = e.pageY - primaryBtnPosY - primaryBtnHeight / 2;

        // Add the ripples CSS and start the animation
        $('.ripple')
            .css({
                width: primaryBtnWidth,
                height: primaryBtnHeight,
                top: y + 'px',
                left: x + 'px'
            })
            .addClass('rippleEffect');
    });
</script>
</body>
</html>
