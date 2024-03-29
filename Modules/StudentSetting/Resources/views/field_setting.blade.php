@extends('backend.master')
@push('styles')
    <link rel="stylesheet" href="{{asset('public/backend/css/student_list.css')}}"/>
@endpush
@php
    $table_name='users'
@endphp
@section('table')
    {{$table_name}}
@endsection

@section('mainContent')

    {!! generateBreadcrumb() !!}

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row justify-content-center mt-50">
                <div class="col-12">
                    <div class="box_header common_table_header">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{__('common.Registration Field Customization')}}</h3>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <form action="{{route('student.student_field_store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="">
                                        <div class="white_box_tittle list_header">
                                            <h4>{{__('common.Input Field Showing in Registration')}}</h4>
                                        </div>
                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.company') }}</p>
                                            <label class="switch_toggle" for="active_checkbox3">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox3" name="show_company"
                                                       value="1" {{ $field->show_company ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.gender') }}</p>
                                            <label class="switch_toggle" for="active_checkbox4">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox4" name="show_gender"
                                                       value="1" {{ $field->show_gender ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.student_type') }}</p>
                                            <label class="switch_toggle" for="active_checkbox5">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox5" name="show_student_type"
                                                       value="1" {{ $field->show_student_type ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.identification_number') }}</p>
                                            <label class="switch_toggle" for="active_checkbox6">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox6" name="show_identification_number"
                                                       value="1" {{ $field->show_identification_number ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.job_title') }}</p>
                                            <label class="switch_toggle" for="active_checkbox7">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox7" name="show_job_title"
                                                       value="1" {{ $field->show_job_title ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.Date of Birth') }}</p>
                                            <label class="switch_toggle" for="active_checkbox8">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox8" name="show_dob"
                                                       value="1" {{ $field->show_dob ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        {{--                                        <div class=" d-flex justify-content-between mb-3">--}}
                                        {{--                                            <p>{{ __('common.Name') }}</p>--}}
                                        {{--                                            <label class="switch_toggle" for="active_checkbox9">--}}
                                        {{--                                                <input type="checkbox" class="status_enable_disable"--}}
                                        {{--                                                       id="active_checkbox9" name="show_name"--}}
                                        {{--                                                       value="1" {{ $field->show_name ? 'checked' : '' }}>--}}
                                        {{--                                                <i class="slider round"></i>--}}
                                        {{--                                            </label>--}}
                                        {{--                                        </div>--}}


                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.Phone') }}</p>
                                            <label class="switch_toggle" for="active_checkbox10">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox10" name="show_phone"
                                                       value="1" {{ $field->show_phone ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="">
                                        <div class="white_box_tittle list_header">
                                            <h4>{{__('common.Required Field')}}</h4>
                                        </div>
                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.company') }}</p>
                                            <label class="switch_toggle" for="active_checkbox31">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox31" name="required_company"
                                                       value="1" {{ $field->required_company ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.gender') }}</p>
                                            <label class="switch_toggle" for="active_checkbox41">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox41" name="required_gender"
                                                       value="1" {{ $field->required_gender ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.student_type') }}</p>
                                            <label class="switch_toggle" for="active_checkbox51">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox51" name="required_student_type"
                                                       value="1" {{ $field->required_student_type ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.identification_number') }}</p>
                                            <label class="switch_toggle" for="active_checkbox61">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox61" name="required_identification_number"
                                                       value="1" {{ $field->required_identification_number ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.job_title') }}</p>
                                            <label class="switch_toggle" for="active_checkbox71">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox71" name="required_job_title"
                                                       value="1" {{ $field->required_job_title ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.Date of Birth') }}</p>
                                            <label class="switch_toggle" for="active_checkbox72d">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox72d" name="required_dob"
                                                       value="1" {{ $field->required_dob ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>

                                        {{--                                        <div class=" d-flex justify-content-between mb-3">--}}
                                        {{--                                            <p>{{ __('common.Name') }}</p>--}}
                                        {{--                                            <label class="switch_toggle" for="active_checkbox73d">--}}
                                        {{--                                                <input type="checkbox" class="status_enable_disable"--}}
                                        {{--                                                       id="active_checkbox73d" name="required_name"--}}
                                        {{--                                                       value="1" {{ $field->required_name ? 'checked' : '' }}>--}}
                                        {{--                                                <i class="slider round"></i>--}}
                                        {{--                                            </label>--}}
                                        {{--                                        </div>--}}


                                        <div class=" d-flex justify-content-between mb-3">
                                            <p>{{ __('common.Phone') }}</p>
                                            <label class="switch_toggle" for="active_checkbox74d">
                                                <input type="checkbox" class="status_enable_disable"
                                                       id="active_checkbox74d" name="required_phone"
                                                       value="1" {{ $field->required_phone ? 'checked' : '' }}>
                                                <i class="slider round"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="m-auto">
                                    <button type="submit"
                                            class="primary-btn radius_30px mr-10 fix-gr-bg mt-5">{{__('common.Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Add Modal Item_Details -->
            </div>
        </div>
    </section>

@endsection
