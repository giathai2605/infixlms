<div class="row">
    <div class="col-12">
        <div class="quiz-slider owl-carousel">

            @if(isset($result))
                @foreach($result as $quiz)
                    <div class="quiz-item w-100 mt-0">
                        <a href="{{courseDetailsUrl(@$quiz->id,@$quiz->type,@$quiz->slug)}}">
                            <div class="quiz-item-img">
                                <img src="{{ getCourseImage($quiz->thumbnail) }}" alt="{{$quiz->title}}">
                            </div>
                        </a>
                        <div class="quiz-item-lession d-grid">

                            <p class="fw-bold flex-grow-1 text-center">
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.95269 0.252197C3.57759 0.252197 1.64545 2.15549 1.58775 4.52473V4.63427H0.320312L2.2407 6.71496L4.10765 4.63427H2.67992V4.52473C2.73709 2.75983 4.18032 1.34812 5.95269 1.34812C7.76194 1.34812 9.22867 2.81967 9.22867 4.63427C9.22867 6.44887 7.76194 7.92042 5.95269 7.92042C5.25511 7.92083 4.57581 7.69739 4.01468 7.28296L3.26341 8.0866C4.03018 8.68926 4.97743 9.01637 5.95269 9.01527C8.3652 9.01527 10.3203 7.05427 10.3203 4.63427C10.3203 2.21427 8.3652 0.252197 5.95269 0.252197ZM5.41836 1.9626V4.63427C5.41897 4.77586 5.4752 4.91153 5.57492 5.01204L7.28478 6.72191C7.436 6.62413 7.57866 6.51406 7.7053 6.38635L6.48702 5.1686V1.9626H5.41836Z"
                                        fill="currentColor"/>
                                </svg>
                                @php
                                    $duration =0;

                                      $type =$quiz->quiz->question_time_type;
                                      if ($type==0){
                                          $duration = $quiz->quiz->question_time*$quiz->quiz->total_questions;
                                      }else{
                                          $duration = $quiz->quiz->question_time;

                                      }
                                @endphp
                                {{MinuteFormat($duration)}}
                            </p>
                            <p class="fw-bold flex-grow-1 text-center">
                                <svg width="10" height="11" viewBox="0 0 10 11" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.33333 9.56435C8.33333 9.6953 8.22667 9.80244 8.09524 9.80244H5.36562C5.22886 10.0648 5.05562 10.3052 4.85257 10.5167H8.09524C8.62095 10.5167 9.04762 10.0901 9.04762 9.56435V4.72054C9.04762 4.46816 8.94714 4.22578 8.76857 4.04721L5.99286 1.27197C5.98571 1.26485 5.97767 1.25867 5.96967 1.25254C5.96371 1.248 5.95786 1.24349 5.95238 1.23863C5.91857 1.20816 5.88524 1.17816 5.8481 1.15292C5.83605 1.1448 5.8229 1.13839 5.80976 1.132C5.80214 1.12828 5.79452 1.12457 5.78714 1.12054C5.77919 1.11606 5.77129 1.11148 5.76333 1.10689C5.73752 1.09195 5.71162 1.07696 5.68429 1.0653C5.59048 1.02625 5.48952 1.00673 5.38714 0.999587C5.37776 0.998987 5.36848 0.99772 5.35914 0.996449C5.34624 0.994687 5.33329 0.99292 5.32 0.99292H2.38095C1.85524 0.99292 1.42857 1.41959 1.42857 1.9453V5.51587C1.65437 5.42168 1.89371 5.35349 2.14286 5.31502V1.9453C2.14286 1.81435 2.24952 1.70721 2.38095 1.70721H5.2381V3.85006C5.2381 4.37578 5.66476 4.80244 6.19048 4.80244H8.33333V9.56435ZM5.95238 2.24102L7.79905 4.08816H6.19048C6.05905 4.08816 5.95238 3.98102 5.95238 3.85006V2.24102ZM0 8.37387C0 9.82035 1.17259 10.9929 2.61905 10.9929C4.06551 10.9929 5.2381 9.82035 5.2381 8.37387C5.2381 6.9274 4.06551 5.75482 2.61905 5.75482C1.17259 5.75482 0 6.9274 0 8.37387ZM2.2619 9.92149C2.2619 9.72425 2.4218 9.56435 2.61905 9.56435C2.81629 9.56435 2.97619 9.72425 2.97619 9.92149C2.97619 10.1187 2.81629 10.2786 2.61905 10.2786C2.4218 10.2786 2.2619 10.1187 2.2619 9.92149ZM1.66667 7.65959C1.66667 7.13359 2.09306 6.70721 2.61905 6.70721C3.14503 6.70721 3.57143 7.13359 3.57143 7.65959C3.57143 8.00744 3.47058 8.2023 3.2124 8.47287L3.08665 8.60125L3.03144 8.66078C2.89646 8.8123 2.85714 8.91168 2.85714 9.08816C2.85714 9.21963 2.75054 9.32625 2.61905 9.32625C2.48755 9.32625 2.38095 9.21963 2.38095 9.08816C2.38095 8.7403 2.4818 8.54544 2.73998 8.27487L2.86573 8.14649L2.92094 8.08697C3.05592 7.93544 3.09524 7.83606 3.09524 7.65959C3.09524 7.39659 2.88204 7.1834 2.61905 7.1834C2.35606 7.1834 2.14286 7.39659 2.14286 7.65959C2.14286 7.79106 2.03626 7.89768 1.90476 7.89768C1.77327 7.89768 1.66667 7.79106 1.66667 7.65959Z"
                                        fill="currentColor"/>
                                </svg>
                                {{$quiz->quiz->total_questions}}  {{__('frontend.Questions')}}
                            </p>
                            <p class="fw-bold flex-grow-1 text-center">
                                <svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.37499 2.49291C1.89174 2.49291 1.49999 2.88466 1.49999 3.36791V3.86791C1.49999 4.35115 1.89174 4.7429 2.37499 4.7429H5.12497C5.60822 4.7429 5.99997 4.35115 5.99997 3.86791V3.36791C5.99997 2.88466 5.60822 2.49291 5.12497 2.49291H2.37499ZM2.24999 3.36791C2.24999 3.29887 2.30595 3.24291 2.37499 3.24291H5.12497C5.19402 3.24291 5.24997 3.29887 5.24997 3.36791V3.86791C5.24997 3.93694 5.19402 3.99291 5.12497 3.99291H2.37499C2.30595 3.99291 2.24999 3.93694 2.24999 3.86791V3.36791ZM3.74998 5.3679C3.4048 5.3679 3.12498 5.6477 3.12498 5.9929C3.12498 6.33809 3.4048 6.61789 3.74998 6.61789C4.09518 6.61789 4.37498 6.33809 4.37498 5.9929C4.37498 5.6477 4.09518 5.3679 3.74998 5.3679ZM3.12498 7.74289C3.12498 7.39769 3.4048 7.11789 3.74998 7.11789C4.09518 7.11789 4.37498 7.39769 4.37498 7.74289C4.37498 8.08808 4.09518 8.36788 3.74998 8.36788C3.4048 8.36788 3.12498 8.08808 3.12498 7.74289ZM1.99999 5.3679C1.65481 5.3679 1.37499 5.6477 1.37499 5.9929C1.37499 6.33809 1.65481 6.61789 1.99999 6.61789C2.34517 6.61789 2.62499 6.33809 2.62499 5.9929C2.62499 5.6477 2.34517 5.3679 1.99999 5.3679ZM1.37499 7.74289C1.37499 7.39769 1.65481 7.11789 1.99999 7.11789C2.34517 7.11789 2.62499 7.39769 2.62499 7.74289C2.62499 8.08808 2.34517 8.36788 1.99999 8.36788C1.65481 8.36788 1.37499 8.08808 1.37499 7.74289ZM5.49997 5.3679C5.15477 5.3679 4.87498 5.6477 4.87498 5.9929C4.87498 6.33809 5.15477 6.61789 5.49997 6.61789C5.84517 6.61789 6.12497 6.33809 6.12497 5.9929C6.12497 5.6477 5.84517 5.3679 5.49997 5.3679ZM4.87498 7.74289C4.87498 7.39769 5.15477 7.11789 5.49997 7.11789C5.84517 7.11789 6.12497 7.39769 6.12497 7.74289C6.12497 8.08808 5.84517 8.36788 5.49997 8.36788C5.15477 8.36788 4.87498 8.08808 4.87498 7.74289ZM1.56854 0.99292C0.702262 0.99292 0 1.69518 0 2.56146V8.17433C0 9.04063 0.702262 9.74288 1.56854 9.74288H5.93142C6.79772 9.74288 7.49996 9.04063 7.49996 8.17433V2.56146C7.49996 1.69518 6.79772 0.99292 5.93142 0.99292H1.56854ZM0.749996 2.56146C0.749996 2.10939 1.11647 1.74292 1.56854 1.74292H5.93142C6.38347 1.74292 6.74997 2.10939 6.74997 2.56146V8.17433C6.74997 8.62638 6.38347 8.99288 5.93142 8.99288H1.56854C1.11647 8.99288 0.749996 8.62638 0.749996 8.17433V2.56146ZM1.40038 10.2362C1.62669 10.6849 2.09169 10.9929 2.62887 10.9929H6.12492C7.57461 10.9929 8.74986 9.81768 8.74991 8.36793L8.74996 3.61791C8.74996 3.08073 8.44196 2.61549 7.99286 2.38921C7.99756 2.44602 7.99991 2.50349 7.99991 2.5615V3.61087L7.99996 3.6179L7.99991 8.17438V8.18583V8.36793C7.99986 9.40348 7.16042 10.2429 6.12492 10.2429H5.93757H5.93137H1.56851C1.51191 10.2429 1.45584 10.2406 1.40038 10.2362Z"
                                        fill="currentColor"/>
                                </svg>
                                {{$quiz->quiz->total_marks}} {{__('quiz.Marks')}}
                            </p>

                        </div>
                        <div class="quiz-item-content">
                            <span class="quiz-item-content-meta fw-500 mb-1">

                                {{$quiz->quiz->category->name}} - <span>{{__('quiz.Quiz')}}</span>

                            </span>
                            <a class="quiz-item-title" data-bs-toggle="tooltip" data-bs-placement="bottom"
                               title="{{$quiz->title}}"
                               href="{{courseDetailsUrl(@$quiz->id,@$quiz->type,@$quiz->slug)}}">
                                <h4 class="currentColor mb-0">{{$quiz->title}}</h4>
                            </a>
                            <div class="quiz-item-price d-flex flex-wrap align-items-center justify-content-between">
                                @if(auth()->check() && $quiz->isLoginUserEnrolled)
                                    <a href="{{courseDetailsUrl(@$quiz->id,@$quiz->type,@$quiz->slug)}}"
                                       class="theme-btn">
                                        {{__('courses.Get Started')}}
                                    </a>
                                @else
                                    <a href="{{route('buyNow',[@$quiz->id])}}"
                                       class="theme-btn">
                                        {{__('frontend.Buy Now')}}
                                    </a>
                                @endif
                                <span>
                                    @if(showEcommerce())
                                        @if (@$quiz->discount_price!=null)
                                            <del class="me-1">        {{getPriceFormat($quiz->price)}}</del>
                                        @endif
                                        <strong class="fw-bold d-inline-block">
                                            @if (@$quiz->discount_price!=null)
                                                {{getPriceFormat($quiz->discount_price)}}
                                            @else
                                                {{getPriceFormat($quiz->price)}}
                                            @endif
                                        </strong>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        if ($.isFunction($.fn.lazy)) {
            $('.lazy').lazy();
        }

        (function () {
            'use strict'
            jQuery(document).ready(function () {
                const navLeft =
                    '<svg width="23" height="19" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8.3125 0.625244L0.499998 8.43778V10.6253L8.3125 18.4378L10.5313 16.2503L5.40625 11.094H22.8125V7.96903H5.40625L10.5625 2.81275L8.3125 0.625244Z" fill="currentColor"/></svg>';
                const navRight =
                    '<svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.1875 17.8125L23 9.99996V7.81245L15.1875 -8.7738e-05L12.9687 2.18742L18.0937 7.3437H0.6875L0.6875 10.4687H18.0937L12.9375 15.625L15.1875 17.8125Z" fill="currentColor"/></svg>'
                const rtl = $("html").attr("dir");
                $('.quiz-slider').owlCarousel({
                    nav: false,
                    rtl: rtl === 'rtl',
                    navText: [navLeft, navRight],
                    dots: true,
                    lazyLoad: true,
                    autoplay: true,
                    autoplayHoverPause: true,
                    loop: true,
                    margin: 24,
                    responsive: {
                        0: {
                            items: 1
                        },
                        480: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        922: {
                            items: 3
                        },
                        1200: {
                            items: 3
                        }
                    }
                });
            });
        })();

    </script>
</div>
