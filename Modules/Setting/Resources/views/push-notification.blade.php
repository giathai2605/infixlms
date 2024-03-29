@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}
    <section class="mb-40 student-details">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row pt-20">
                        <div class="main-title pl-3 pt-10">
                            <h3 class="mb-30">{{__('setting.Push Notification')}} </h3>
                        </div>
                    </div>

                    <form class="form-horizontal" action="{{route('setting.pushNotification')}}" method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        <div class="white-box">

                            <div class="col-md-12 p-0">

                                <div class="row mb-30">
                                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{ __('common.Title') }}</label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="title" required
                                                           value="">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{ __('common.Details') }}</label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           required
                                                           name="details"
                                                           value="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="row justify-content-center">

                                            @if(session()->has('message-success'))
                                                <p class=" text-success">
                                                    {{ session()->get('message-success') }}
                                                </p>
                                            @elseif(session()->has('message-danger'))
                                                <p class=" text-danger">
                                                    {{ session()->get('message-danger') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-40">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                    >
                                        <i class="ti-check"></i>
                                        {{__('common.Update')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

@endpush
