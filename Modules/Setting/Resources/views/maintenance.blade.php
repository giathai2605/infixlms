@extends('backend.master')

@section('mainContent')
    {!! generateBreadcrumb() !!}

    <section class="mb-20 student-details">
        <div class="container-fluid p-0">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row ">
                        <div class="main-title pl-3 pt-10">
                            <h3 class="mb-30">{{__('setting.Maintenance')}} {{__('setting.Setting')}}</h3>
                        </div>
                    </div>

                    <form class="form-horizontal" action="{{route('setting.maintenance')}}" method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        <div class="white-box">

                            <div class="col-md-12 p-0">

                                <div class="row mb-30">
                                    <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{ __('common.Title') }}</label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="maintenance_title"
                                                           value="{{$maintenance_title}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label"
                                                           for="">{{ __('common.Sub Title') }}  </label>
                                                    <input class="primary_input_field" placeholder="-" type="text"
                                                           name="maintenance_sub_title"
                                                           value="{{$maintenance_sub_title}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 mb-25">
                                                <x-upload-file
                                                    name="maintenance_banner"
                                                    type="image"
                                                    media_id="{{$maintenance_banner->value_media?->media_id}}"
                                                    label="{{ __('frontendmanage.Maintenance Page Banner') }}"
                                                />
                                            </div>


                                            <div class="col-xl-6 dripCheck">
                                                <div class="primary_input mb-25">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label class="primary_input_label"
                                                                   for="    "> {{__('setting.Maintenance')}} {{__('common.Mode')}}</label>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="yes">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="yes"
                                                                               name="maintenance_status"
                                                                               {{$maintenance_status==1?'checked':''}}
                                                                               value="1">
                                                                        <span
                                                                            class="checkmark mr-2"></span> {{__('common.Yes')}}
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4 mb-25">
                                                                    <label class="primary_checkbox d-flex mr-12"
                                                                           for="no">
                                                                        <input type="radio"
                                                                               class="common-radio "
                                                                               id="no"
                                                                               name="maintenance_status"
                                                                               value="0" {{$maintenance_status!=1?'checked':''}}>
                                                                        <span
                                                                            class="checkmark mr-2"></span> {{__('common.No')}}
                                                                    </label>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
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
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".imagePreview1").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $(".imgInput1").change(function () {

            readURL1(this);
        });
    </script>
@endpush
