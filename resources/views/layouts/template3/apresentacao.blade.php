@extends('layouts.template3')
@push('script')

@endpush
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<!--<div class="breadcumb-area bg-img" style="background-image: url({{asset('template_igreja/template-escuro/img/bg-img/bg-4.jpg')}});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6">
                <div class="breadcumb-text">
                    <h2>Visões e valores</h2>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Ministries Area Start ##### -->
<section class="ministries-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto">
                    <h3>Sobre nós</h3>
                    <p>{{$igreja->texto_apresentativo}}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mx-auto">
                    <h3>Ministros</h3>
                </div>
            </div>

            <!-- Single Ministry Area -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-ministry mb-100">
                    <img src="{{asset('template_igreja/template-escuro/img/bg-img/m3.jpg')}}" alt="">
                    <div class="ministry-content">
                        <h6>Couples’s Ministry</h6>
                    </div>
                </div>
            </div>

            <!-- Single Ministry Area -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-ministry mb-100">
                    <img src="{{asset('template_igreja/template-escuro/img/bg-img/m4.jpg')}}" alt="">
                    <div class="ministry-content">
                        <h6>Family’s Ministry</h6>
                    </div>
                </div>
            </div>

            <!-- Single Ministry Area -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-ministry mb-100">
                    <img src="{{asset('template_igreja/template-escuro/img/bg-img/m5.jpg')}}" alt="">
                    <div class="ministry-content">
                        <h6>Single’s Ministry</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ##### Ministries Area End ##### -->
@endsection