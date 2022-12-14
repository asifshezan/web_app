@extends('layouts.website')
@section('content')

@php
    $allresorts = App\Models\Resort::where('resort_status',1)->get();
@endphp

<div class="hero-wrap js-fullheight" style="background-image: url('{{asset('contents/website')}}/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
            <h2 class="subheading">Welcome to resort book</h2>
            <h1 class="mb-4">Book a resort for your vacation</h1>
        <p><a href="#" class="btn btn-primary">Learn more</a> <a href="#" class="btn btn-white">Contact us</a></p>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section ftco-book ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-4">

                    <form action="{{ route('booking_form') }}" method="POST" class="appointment-form">
                        @csrf
                        @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>{{ Session::get('success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                        <h3 class="mb-3">Book your Resort</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                <select name="resort_id" id="resort_id" class="form-control">
                                    <option selected disabled>Resorts Name</option>
                                    @foreach ($allresorts as $resorts)
                                    <option value="{{ $resorts['resort_id']}}">{{ $resorts['resort_name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="input-wrap">
                            <div class="icon"><span class="ion-md-calendar"></span></div>
                            <input type="date" name="booking_start_date" class="form-control" placeholder="Check-In">
                        </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="input-wrap">
                            <div class="icon"><span class="ion-md-calendar"></span></div>
                            <input type="date" name="booking_end_date" class="form-control" placeholder="Check-Out">
                        </div>
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <input type="text" name="booking_phone" class="form-control" placeholder="Phone number">
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <input type="email" name="booking_email" class="form-control" placeholder="Email">
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                        <button type="submit" value="Book Appartment Now" class="btn btn-primary py-3 px-4">Book Resort</button>
                    </div>
                            </div>
                        </div>
                  </form>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-section ftco-services">
      <div class="container">
          <div class="row">
            @foreach ($allresorts as  $resorts)
            <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                <div class="d-block services-wrap text-center">
                  <div class="img" style="background-image: url({{asset('uploads/resort/'.$resorts['resort_image'])}});"></div>
                  <div class="media-body py-4 px-3">
                    <h3 class="heading">{{ $resorts['resort_name'] }}</h3>
                    <p>{{ $resorts['resort_detail'] }}</p>
                    <p><a href="#" class="btn btn-primary">Read more</a></p>
                  </div>
                </div>
              </div>
            @endforeach
      </div>
      </div>
  </section>


  @endsection
