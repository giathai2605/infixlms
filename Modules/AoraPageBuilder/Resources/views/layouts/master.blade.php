<!DOCTYPE html>
<html dir="{{ isRtl() ? 'rtl' : '' }}" class="{{ isRtl() ? 'rtl' : '' }}" lang="en" itemscope itemtype="{{ url('/') }}">

<head>
    @laravelPWA
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{Settings('site_title')}}"/>
    <meta property="og:description" content="{{Settings('footer_about_description')}}"/>
    <meta property="og:image" content=" @yield('og_image')"/>

    <meta name="title" content="{{Settings('site_title')}} | {{$row->title}}">
    <meta name="description" content="{{Settings('meta_description')}}">
    <meta name="keywords" content="{{Settings('meta_keywords')}}">

    <title>{{Settings('site_title')}} | {{$row->title}}</title>

    <link rel="stylesheet" href="{{ asset('public/backend/css/themify-icons.css') }}{{ assetVersion() }}"/>

    @if(isRtl())
        <link rel="stylesheet"
              href="{{ asset('Modules/AoraPageBuilder/Resources/assets/css/bootstrap.rtl.min.css') }}{{ assetVersion() }}"
              data-type="aoraeditor-style"/>
    @else
        <link rel="stylesheet"
              href="{{ asset('Modules/AoraPageBuilder/Resources/assets/css/bootstrap.min.css') }}{{ assetVersion() }}"
              data-type="aoraeditor-style"/>
    @endif


    <link rel="stylesheet" href="{{ asset('Modules/AoraPageBuilder/Resources/assets/css/fontawesome.css') }}"
          data-type="aoraeditor-style"/>

    <link rel="stylesheet" href="{{ asset('Modules/AoraPageBuilder/Resources/assets/css/aoraeditor.css') }}"
          data-type="aoraeditor-style"/>
    <link rel="stylesheet" href="{{ asset('Modules/AoraPageBuilder/Resources/assets/css/aoraeditor-components.css') }}"
          data-type="aoraeditor-style"/>


    <link rel="stylesheet" type="text/css" data-type="aoraeditor-style"
          href="{{ asset('Modules/AoraPageBuilder/Resources/assets/css/style.css') }}">

    {{--    <link rel="stylesheet" type="text/css" data-type="aoraeditor-style" --}}
    {{--          href="{{asset('Modules/AoraPageBuilder/Resources/assets/css')}}/style1.css"> --}}
    @php
        $currentTheme =currentTheme();
//      $default =[
//          "/affiliate"
//];
//        if (in_array($row->slug,$default)){
//            $currentTheme ='infixlmstheme';
//
//        }
    @endphp
    @if ($currentTheme == 'infixlmstheme')
        <link rel="stylesheet"
              href="{{ asset('public/frontend/infixlmstheme') }}/css/fontawesome.css{{ assetVersion() }} "
              data-type="aoraeditor-style">

        <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme/css/app.css') . assetVersion() }}"
              data-type="aoraeditor-style">

        <link rel="stylesheet" type="text/css" data-type="aoraeditor-style"
              href="{{ asset('public/frontend/infixlmstheme/css/frontend_style.css') . assetVersion() }}">

        <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme/css/mega_menu.css') }}">

        {{-- <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme/css/sections/base.css') }}"
              data-type="aoraeditor-style"> --}}


        <link rel="stylesheet" href="{{ asset('public/css/preloader.css') }}"/>
        <link rel="stylesheet" href="{{ asset('public/frontend/infixlmstheme/css/custom.css') }}">

    @elseif($currentTheme=='edume')
        @if(isRtl())
            <link rel="stylesheet" href="{{ asset('public') }}/css/bootstrap.rtl.min.css">
        @else
            <link rel="stylesheet" href="{{ asset('public') }}/css/bootstrap.min.css">
        @endif
        <link rel="stylesheet" type="text/css" data-type="aoraeditor-style"
              href="{{ asset('public/frontend/infixlmstheme/css/frontend_style.css') . assetVersion() }}">

        <link rel="stylesheet" href="{{ asset('public/frontend/edume') }}/css/nice-select.css">
        <link rel="stylesheet" href="{{ asset('public/frontend/edume') }}/css/zeynep.min.css">
        {{--        <link rel="stylesheet" href="{{ asset('public/frontend/edume') }}/css/slick.css">--}}

        <link rel="stylesheet" href="{{ asset('public/frontend/edume') }}/css/slicknav.css">

        <link rel="stylesheet" href="{{ asset('public/frontend/edume') }}/css/style.css"/>
        <link rel="stylesheet" href="{{ asset('public/frontend/edume') }}/css/dynamic_page.css"/>

    @elseif($currentTheme=='kidslms')
        <link rel="stylesheet" href="{{themeAsset('css')}}/bootstrap.min.css">
        <link rel="stylesheet" href="{{themeAsset('plugins/magnific')}}/magnific-popup.css">
        <link rel="stylesheet" href="{{themeAsset('plugins/select2')}}/select2.min.css">
        <link rel="stylesheet" href="{{themeAsset('plugins/carousel')}}/owl.carousel.min.css">
        <link rel="stylesheet" href="{{themeAsset('css')}}/fontawesome.css">
        <link rel="stylesheet" href="{{themeAsset('css')}}/frontend_style.css">
    @endif

    <x-frontend-dynamic-style-color/>

    @yield('styles')
    <style>

    </style>
    <script src="{{ asset('public/js/common.js') }}"></script>

    <script type="text/javascript"
            src="{{ asset('public/frontend/infixlmstheme/js/jquery.lazy.min.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('public/css/preloader.css') }}"/>
    <x-analytics-tool/>

</head>

<body>
@include('preloader')
@if (str_contains(request()->url(), 'chat'))
    <link rel="stylesheet" href="{{ asset('public/backend/css/jquery-ui.css') }}{{ assetVersion() }}"/>
    <link rel="stylesheet" href="{{ asset('public/backend/vendors/select2/select2.css') }}{{ assetVersion() }}"/>
    <link rel="stylesheet" href="{{ asset('public/chat/css/style-student.css') }}{{ assetVersion() }}">
@endif

@if (auth()->check() && auth()->user()->role_id == 3 && !str_contains(request()->url(), 'chat'))
    <link rel="stylesheet" href="{{ asset('public/chat/css/notification.css') }}{{ assetVersion() }}">
@endif

@if (isModuleActive('WhatsappSupport'))
    <link rel="stylesheet" href="{{ asset('public/whatsapp-support/style.css') }}{{ assetVersion() }}">
@endif

<script>
    window.Laravel = {
        "baseUrl": '{{ url('/') }}' + '/',
        "current_path_without_domain": '{{ request()->path() }}',
        "csrfToken": '{{ csrf_token() }}',
    }
</script>


<script>
    window._locale = '{{ app()->getLocale() }}';
    window._translations = {!! $jsonLang??'' !!}
        window.jsLang = function (key, replace) {
        let translation = true

        let json_file = window._translations;
        translation = json_file[key]
            ? json_file[key]
            : key
        $.each(replace, (value, key) => {
            translation = translation.replace(':' + key, value)
        })
        return translation
    }
</script>


@if (auth()->check() && auth()->user()->role_id == 3)
    <style>
        .admin-visitor-area {
            margin: 0 30px 30px 30px !important;
        }

        .dashboard_main_wrapper .main_content_iner.main_content_padding {
            padding-top: 50px !important;
        }

        .primary_input {
            height: 50px;
            border-radius: 0px;
            border: unset;
            font-family: "Jost", sans-serif;
            font-size: 14px;
            font-weight: 400;
            color: unset;
            padding: unset;
            width: 100%;
            @if($errors->any())
                                                                                          margin-bottom: 5px;
            @else
                                                                                          margin-bottom: 30px;
        @endif



        }

        .primary_input_field {
            border: 1px solid #ECEEF4;
            font-size: 14px;
            color: #415094;
            padding-left: 20px;
            height: 46px;
            border-radius: 30px;
            width: 100%;
            padding-right: 15px;
        }

        .primary_input_label {
            font-size: 12px;
            text-transform: uppercase;
            color: #828BB2;
            display: block;
            margin-bottom: 6px;
            font-weight: 400;
        }

        .chat_badge {
            color: #ffffff;
            border-radius: 20px;
            font-size: 10px;
            position: relative;
            left: -20px;
            top: -12px;
            padding: 0px 4px !important;
            max-width: 18px;
            max-height: 18px;
            box-shadow: none;
            background: #ed353b;
        }

        .chat-icon-size {
            font-size: 1.35em;
            color: #687083;
        }
    </style>
@endif

<input type="hidden" id="url" value="{{ url('/') }}">
<input type="hidden" name="lat" class="lat" value="{{ Settings('lat') }}">
<input type="hidden" name="lng" class="lng" value="{{ Settings('lng') }}">
<input type="hidden" name="zoom" class="zoom" value="{{ Settings('zoom_level') }}">
<input type="hidden" name="slider_transition_time" id="slider_transition_time"
       value="{{ Settings('slider_transition_time') ? Settings('slider_transition_time') : 5 }}">
<input type="hidden" name="base_url" class="base_url" value="{{ url('/') }}">
<input type="hidden" name="csrf_token" class="csrf_token" value="{{ csrf_token() }}">
@if (auth()->check())
    <input type="hidden" name="balance" class="user_balance" value="{{ auth()->user()->balance }}">
@endif
<input type="hidden" name="currency_symbol" class="currency_symbol" value="{{ Settings('currency_symbol') }}">
<input type="hidden" name="app_debug" class="app_debug" value="{{ env('APP_DEBUG') }}">
<div data-aoraeditor="html">
    @if(!Settings('mobile_app_only_mode'))
        @include(theme('partials._menu'))
    @endif
    <div id="content-area">
        @yield('content')
    </div>
    @if(!Settings('mobile_app_only_mode'))
        @include(theme('partials._footer'))
    @endif
</div>


<script type="text/javascript" src="{{ asset('Modules/AoraPageBuilder/Resources/assets/js/bootstrap.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('Modules/AoraPageBuilder/Resources/assets/js/jquery-ui.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('Modules/AoraPageBuilder/Resources/assets/js/ckeditor.js') }}"></script>
<script type="text/javascript"
        src="{{asset('Modules/AoraPageBuilder/Resources/assets/js/form-builder.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('Modules/AoraPageBuilder/Resources/assets/js/form-render.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('Modules/AoraPageBuilder/Resources/assets/js/aoraeditor.js') }}"></script>

<script type="text/javascript"
        src="{{ asset('Modules/AoraPageBuilder/Resources/assets/js/aoraeditor-components.js') }}"></script>


@yield('scripts')


<script type="text/javascript" data-aoraeditor="script">
    $(function () {
        // $('.dynamicData').each(function (i, obj) {
        //     aoraEditor.loadDynamicContent($(this));
        // });


    });
    // $(function () {
    //     if ($.isFunction($.fn.lazy)) {
    //         $('.lazy').lazy();
    //     }
    // });

    setTimeout(function () {
        $('.preloader').fadeOut('hide', function () {
            // $(this).remove();

        });
    }, 0);
</script>
</body>

<input type="hidden" name="lat" class="lat" value="{{Settings('lat') }}">
<input type="hidden" name="lng" class="lng" value="{{Settings('lng') }}">
<input type="hidden" name="zoom" class="zoom" value="{{Settings('zoom_level')}}">


</html>
