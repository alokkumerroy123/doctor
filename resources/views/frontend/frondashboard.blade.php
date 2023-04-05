@extends('layouts.frontend')
@section('main')
  
  <!-- About Start -->
  {{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title mb-4">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                    <h1 class="display-5 mb-0">The World's Best Dental Clinic That You Can Trust</h1>
                </div>
                <h4 class="text-body fst-italic mb-4">Diam dolor diam ipsum sit. Clita erat ipsum et lorem stet no lorem sit clita duo justo magna dolore</h4>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet</p>
                <div class="row g-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                        <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Award Winning</h5>
                        <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Professional Staff</h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                        <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>24/7 Opened</h5>
                        <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Fair Prices</h5>
                    </div>
                </div>
                <a href="appointment.html" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Make Appointment</a>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('assets/frontend/img/about.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- About End -->
   <!-- Banner Start -->
   <div class="container-fluid banner mb-5">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-primary d-flex flex-column p-3" style="height: 380px;">
                    <form action="{{route('filter_doctor')}}" method="POST">
                        @csrf
                    <h3 class="text-white mb-3">Search A Best Doctor  Near You</h3>
                    <div class="date mb-3" id="division" data-target-input="nearest">
                        <select name="division_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select Division---</option>
                        @foreach ($division as $item)
                            <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                        @endforeach
                    </select>
                       
                    </div>
                    <div class="date mb-3" id="division" data-target-input="nearest">
                        <select name="district_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select District---</option>
                        @foreach ($district as $item)
                            <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                        @endforeach
                    </select>
                       
                    </div>

                    <div class="date mb-3" id="upzila" data-target-input="nearest">
                        <select name="upzila_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select upzila---</option>
                        @foreach ($upzila as $item)
                            <option value="{{ $item->id }}">{{ $item->upzila_name }}</option>
                        @endforeach
                    </select>

                    </div>
                    <div class="date mb-3" id="name" data-target-input="nearest">
                       
                        <select name="specialist_id" class="form-control selectpicker" title="select speclist" required
                        id="specialist_id">
                        <option value="">---Select Speclist---</option>
                        @foreach ($specialist as $item)

                            <option value="{{ $item->id }}">{{ $item->specialist_name }}</option>
                        @endforeach
                    </select>
                    </div>
                   
                    <button class="btn btn-light" type="submit">Search Doctor</button>
                </div>
            </form>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-dark d-flex flex-column p-3" style="height: 380px;">
                    <form action="{{route('filter_digonostic')}}" method="POST">
                        @csrf
                    <h3 class="text-white mb-3">Search Best Diagnostic/Clinic  Near You</h3>
                    <div class="date mb-3" id="division" data-target-input="nearest">
                        <select name="division_id" class="form-control selectpicker" title="select division" required
                            id="division_id">
                            <option value="">---Select Division---</option>
                            @foreach ($division as $item)
                                <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="date mb-3" id="district" data-target-input="nearest">
                        <select name="district_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select District---</option>
                        @foreach ($district as $item)
                            <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="date mb-3" id="upzila" data-target-input="nearest">
                        <select name="upzila_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select upzila---</option>
                        @foreach ($upzila as $item)
                            <option value="{{ $item->id }}">{{ $item->upzila_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    {{-- <div class="date mb-3" id="name" data-target-input="nearest">
                        <select name="diagnostic_name" class="form-control" id="update_district">
                            <option value="">---Select Diagnostic---</option>
                            @foreach($diagnostic as $key=>$diagnostics)
                                <option>{{ $diagnostics->diagnostic_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <button class="btn btn-light" type="submit">Search Dagnostic</button>
                </div>
            </form>
            </div>


            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-secondary d-flex flex-column p-3" style="height: 380px;">
                    <form action="{{route('filter_blood')}}" method="POST">
                        @csrf
                    <h3 class="text-white mb-3">Find Blood Doner Near You</h3>
                    <div class="date mb-3" id="division" data-target-input="nearest">
                        <select name="division_id" class="form-control selectpicker" title="select division" required
                            id="division_id">
                            <option value="">---Select Division---</option>
                            @foreach ($division as $item)
                                <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="date mb-3" id="district" data-target-input="nearest">
                        <select name="district_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select District---</option>
                        @foreach ($district as $item)
                            <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="date mb-3" id="upzila" data-target-input="nearest">
                        <select name="upzila_id" class="form-control selectpicker" title="select division" required
                        id="district_id">
                        <option value="">---Select upzila---</option>
                        @foreach ($upzila as $item)
                            <option value="{{ $item->id }}">{{ $item->upzila_name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <button class="btn btn-light" type="submit">Search Dagnostic</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- Banner Start -->

<!-- Appointment Start -->
<div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Dental Clinic You Can Trust</h1>
                    <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Make Appointment</h1>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Select A Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 2</option>
                                    <option value="3">Service 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;">
                                    <option selected>Select Doctor</option>
                                    <option value="1">Doctor 1</option>
                                    <option value="2">Doctor 2</option>
                                    <option value="3">Doctor 3</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time1" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Appointment Time" data-target="#time1" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->



<!-- Service Start -->
{{-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5 mb-5">
            <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                    <img class="position-absolute w-100 h-100" src="{{asset('assets/frontend/img/before.jpg')}}" style="object-fit: cover;">
                    <img class="position-absolute w-100 h-100" src="{{asset('assets/frontend/img/after.jpg')}}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title mb-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                    <h1 class="display-5 mb-0">We Offer The Best Quality Dental Services</h1>
                </div>
                <div class="row g-5">
                    <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid" src="{{asset('assets/frontend/img/service-1.jpg')}}" alt="">
                        </div>
                        <div class="position-relative bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">Cosmetic Dentistry</h5>
                        </div>
                    </div>
                    <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.9s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid" src="{{asset('assets/frontend/img/service-2.jpg')}}" alt="">
                        </div>
                        <div class="position-relative bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">Dental Implants</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-7">
                <div class="row g-5">
                    <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.3s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid" src="{{asset('assets/frontend/img/service-3.jpg')}}" alt="">
                        </div>
                        <div class="position-relative bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">Dental Bridges</h5>
                        </div>
                    </div>
                    <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid" src="{{('assets/frontend/img/service-4.jpg')}}" alt="">
                        </div>
                        <div class="position-relative bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">Teeth Whitening</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 service-item wow zoomIn" data-wow-delay="0.9s">
                <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                    <h3 class="text-white mb-3">Make Appointment</h3>
                    <p class="text-white mb-3">Clita ipsum magna kasd rebum at ipsum amet dolor justo dolor est magna stet eirmod</p>
                    <h2 class="text-white mb-0">+012 345 6789</h2>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Service End -->


<!-- Offer Start -->
{{-- <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                <div class="offer-text text-center rounded p-5">
                    <h1 class="display-5 text-white">Save 30% On Your First Dental Checkup</h1>
                    <p class="text-white mb-4">Eirmod sed tempor lorem ut dolores sit kasd ipsum. Dolor ea et dolore et at sea ea at dolor justo ipsum duo rebum sea. Eos vero eos vero ea et dolore eirmod diam duo lorem magna sit dolore sed et.</p>
                    <a href="appointment.html" class="btn btn-dark py-3 px-5 me-3">Appointment</a>
                    <a href="" class="btn btn-light py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                <div class="section-title bg-light rounded h-100 p-5">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Dentist</h5>
                    <h1 class="display-6 mb-4">Meet Our Certified & Experienced Doctor</h1>
                    <a href="appointment.html" class="btn btn-primary py-3 px-5">Appointment</a>
                </div>
            </div>
            @foreach($doctor as $doctors)
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="position-relative rounded-top" style="z-index: 1;">
                        <img class="img-fluid rounded-top w-100" src="{{ asset('uploads/doctors/' . $doctors->photo) }}" alt="">
                        {{-- <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>  --}}
                    </div>
                    <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                        <h4 class="mb-2">{{$doctors->doctor_name}}</h4>
                        <p class="text-primary mb-0">{{$doctors->specialist_name}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="position-relative rounded-top" style="z-index: 1;">
                     
                        <img class="img-fluid rounded-top w-100" src="{{ asset('uploads/doctors/' . $doctors->photo) }}" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    
                    </div>
                    <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                        <h4 class="mb-2">Dr. John Doe</h4>
                        <p class="text-primary mb-0">Implant Surgeon</p>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="position-relative rounded-top" style="z-index: 1;">
                        <img class="img-fluid rounded-top w-100" src="{{asset('assets/frontend/img/team-3.jpg')}}" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                        <h4 class="mb-2">Dr. John Doe</h4>
                        <p class="text-primary mb-0">Implant Surgeon</p>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <div class="position-relative rounded-top" style="z-index: 1;">
                        <img class="img-fluid rounded-top w-100" src="{{asset('assets/frontend/img/team-4.jpg')}}" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                        <h4 class="mb-2">Dr. John Doe</h4>
                        <p class="text-primary mb-0">Implant Surgeon</p>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="position-relative rounded-top" style="z-index: 1;">
                        <img class="img-fluid rounded-top w-100" src="{{asset('assets/frontend/img/team-5.jpg')}}" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                        <h4 class="mb-2">Dr. John Doe</h4>
                        <p class="text-primary mb-0">Implant Surgeon</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- Team End -->


<!-- Newsletter Start -->
<div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
    <div class="container">
        <div class="bg-primary p-5">
            <form class="mx-auto" style="max-width: 600px;">
                <div class="input-group">
                    <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                    <button class="btn btn-dark px-4">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Newsletter End -->

<div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
    <div class="container pt-5">
        <div class="row g-5 pt-4">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                    <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Popular Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                    <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                    <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>info@example.com</p>
                <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Follow Us</h3>
                <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    // $(document).ready(function() {
    //     $('#division_id').change(function() {
    //         var selectedOption = $(this).val();
            
    //         if (selectedOption) {
    //             $.ajax({
    //                 url: '/get_district_list/' + selectedOption,
    //                 type: 'GET',
    //                 dataType: 'json',
    //                 success: function(data) {
    //                     // $('#second-select').empty();
    //                     // $('#second-select').append('<option value="">Select an option</option>');
    //                     // $.each(data, function(index, value) {
    //                     //     $('#second-select').append('<option value="' + value.value + '">' + value.label + '</option>');
    //                     // });
    //                     console.log(data)
    //                 }
    //             });
    //         } else {
    //             $('#second-select').empty();
    //             $('#second-select').append('<option value="">Select an option</option>');
    //         }
    //     });
    // });

    $(document).ready(function() {
        $('#myButton').click(function() {
            $('#myDiv').toggle();
        });
    });
</script>