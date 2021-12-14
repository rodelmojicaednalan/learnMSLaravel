{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional Styles --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/fontawesome/fontawesome.min.css') }}"  media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/fontawesome/brands.min.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/fontawesome/solid.min.css') }}" media="all">
@endsection

{{-- Content --}}
@section('content')

<section>
    <div class="container contact-container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Contact Us</h1>
                <!-- <p>Lorem ipsum donor si amet.</p> -->
            </div>
        </div>
        <div class="row white-box">
            <div class="col-md-9">
                <h3 class="orca-text">ORCA</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon-text">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.7414 25.3847L12.7414 25.3847C12.5691 25.1928 10.3904 22.7481 8.25787 19.5562C7.1916 17.9602 6.14354 16.1873 5.36353 14.4234C4.58078 12.6533 4.08398 10.9275 4.08398 9.41616C4.08398 4.50023 8.08421 0.5 13.0002 0.5C17.9161 0.5 21.9163 4.50022 21.9164 9.41616C21.9164 10.9275 21.4196 12.6533 20.6369 14.4234C19.8569 16.1873 18.8088 17.9602 17.7425 19.5562C15.61 22.7481 13.4313 25.1928 13.259 25.3847L13.259 25.3847C13.1211 25.5383 12.8795 25.5385 12.7414 25.3847ZM7.76271 9.41616C7.76271 12.3046 10.1118 14.6537 13.0002 14.6537C15.8886 14.6537 18.2376 12.3046 18.2376 9.41621C18.2376 6.52779 15.8886 4.17868 13.0002 4.17868C10.1118 4.17868 7.76271 6.52773 7.76271 9.41616Z" stroke="#FF3840"/>
                            </svg>

                            <span>We are located at:<br>
                                12 Hoy Fatt Road #04-01,<br>
                                 Singapore 159506
                            Company Registration Number</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon-text">
                            <a href="tel:+65 6338 1755">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.65265 18.6125C8.41435 21.9138 11.7388 24.5131 15.5333 26.3523C16.978 27.0369 18.91 27.8491 21.0625 27.9884C21.196 27.9942 21.3236 28 21.457 28C22.9017 28 24.0621 27.501 25.0078 26.4741C25.0136 26.4683 25.0252 26.4567 25.031 26.4451C25.3675 26.039 25.7505 25.6734 26.1508 25.2847C26.4235 25.0236 26.702 24.7509 26.9689 24.4724C28.2047 23.1844 28.2047 21.5483 26.9572 20.3009L23.4703 16.8139C22.8785 16.1989 22.1707 15.874 21.428 15.874C20.6854 15.874 19.9718 16.1989 19.3626 16.8081L17.2855 18.8852C17.094 18.775 16.8967 18.6763 16.7111 18.5835C16.479 18.4675 16.2643 18.3572 16.0729 18.2354C14.1814 17.0344 12.4641 15.4679 10.8221 13.4546C9.99247 12.4045 9.43549 11.5226 9.04676 10.6233C9.59214 10.1301 10.1027 9.61376 10.5959 9.10899C10.7699 8.92913 10.9498 8.74927 11.1296 8.56942C11.7563 7.94281 12.0928 7.21757 12.0928 6.48073C12.0928 5.74389 11.7621 5.01865 11.1296 4.39204L9.40068 2.66308C9.19761 2.46001 9.00615 2.26274 8.80888 2.05968C8.42596 1.66515 8.02563 1.25901 7.6311 0.893494C7.0335 0.307501 6.33147 0 5.58883 0C4.85198 0 4.14415 0.307501 3.52335 0.899296L1.35343 3.06921C0.564374 3.85827 0.117627 4.81558 0.0247968 5.92375C-0.0854394 7.3104 0.169845 8.78409 0.831262 10.5653C1.8466 13.3212 3.3783 15.8798 5.65265 18.6125ZM1.44046 6.04559C1.51009 5.27393 1.80598 4.62992 2.36297 4.07294L4.52128 1.91463C4.85779 1.58972 5.22911 1.42147 5.58883 1.42147C5.94274 1.42147 6.30246 1.58972 6.63317 1.92623C7.0219 2.28595 7.38742 2.66307 7.78195 3.06341C7.97921 3.26647 8.18228 3.46954 8.38535 3.67841L10.1143 5.40738C10.474 5.76709 10.6597 6.13262 10.6597 6.49233C10.6597 6.85205 10.474 7.21757 10.1143 7.57729C9.93445 7.75715 9.75459 7.94281 9.57474 8.12267C9.03516 8.66805 8.53039 9.18442 7.97341 9.67758C7.96181 9.68918 7.956 9.69499 7.9444 9.70659C7.46284 10.1881 7.53827 10.6465 7.6543 10.9946C7.66011 11.012 7.66591 11.0236 7.67171 11.041C8.11846 12.1144 8.73926 13.1355 9.70818 14.3539C11.4488 16.5006 13.2822 18.1658 15.3012 19.448C15.5507 19.6104 15.8176 19.7381 16.0671 19.8657C16.2991 19.9818 16.5138 20.092 16.7053 20.2138C16.7285 20.2254 16.7459 20.237 16.7691 20.2487C16.9606 20.3473 17.1462 20.3937 17.3319 20.3937C17.796 20.3937 18.0977 20.0978 18.1964 19.9992L20.3663 17.8293C20.7028 17.4927 21.0683 17.3129 21.428 17.3129C21.869 17.3129 22.2287 17.5856 22.455 17.8293L25.9535 21.322C26.6497 22.0182 26.6439 22.7725 25.9361 23.5093C25.6924 23.7704 25.4372 24.0199 25.1645 24.281C24.7583 24.6755 24.3348 25.0816 23.9519 25.54C23.2846 26.2594 22.4898 26.5959 21.4628 26.5959C21.3642 26.5959 21.2598 26.5901 21.1611 26.5843C19.2581 26.4625 17.4885 25.7199 16.1599 25.0874C12.5511 23.3411 9.38327 20.8637 6.75501 17.719C4.5909 15.114 3.13462 12.6888 2.1715 10.0895C1.57391 8.49399 1.34763 7.21177 1.44046 6.04559Z" fill="#FF3840"/>
                                    </svg>


                                <span>+65 6338 1755</span>
                            </a>

                        </div>
                        <div class="icon-text">
                            <a href="mailto:enquiries@orcasg.com">
                               <svg width="27" height="19" viewBox="0 0 27 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.6154 0.5H1.38465C0.623057 0.5 0 1.12306 0 1.88459V17.1154C0 17.8769 0.623057 18.5 1.38465 18.5H25.6154C26.3769 18.5 27.0001 17.877 27.0001 17.1154V1.88459C27 1.12306 26.3769 0.5 25.6154 0.5ZM25.0958 1.53839L14.2965 9.6385C14.1023 9.78626 13.8043 9.8787 13.4999 9.87733C13.1957 9.8787 12.8977 9.78626 12.7034 9.6385L1.90419 1.53839H25.0958ZM19.3271 10.173L25.2118 17.4422C25.2177 17.4495 25.2249 17.4551 25.2312 17.4616H1.76882C1.77504 17.4547 1.78232 17.4495 1.78822 17.4422L7.67285 10.173C7.85315 9.95005 7.81898 9.62326 7.59565 9.44254C7.37274 9.26224 7.04595 9.29641 6.86559 9.51937L1.03845 16.7177V2.18745L12.0807 10.4692C12.4958 10.7783 13.0008 10.9144 13.4999 10.9157C13.9983 10.9147 14.5037 10.7786 14.9191 10.4692L25.9613 2.18745V16.7176L20.1344 9.51937C19.954 9.29646 19.6269 9.26219 19.4043 9.44254C19.181 9.62284 19.1467 9.95005 19.3271 10.173Z" fill="#FF3840"/>
                            </svg>
                            <span>enquiries@orcasg.com</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <img src="{{ asset('frontend/images/orca-logo.png') }}" alt="" />
            </div>
        </div>
        <div class="row forms-map">
            <div class="col-md-6 form-wrapper">
                <!-- <form> -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Type your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Type your email">
                    </div>
                    <!-- error msg ui
                    <div class="form-group has-error">
                    <label for="email" class="text-danger">Email Address</label>
                    <input type="email" class="form-control is-invalid" id="email" placeholder="Type your email">  
                    <small id="emailHelp" class="text-danger">
                    This field is required.
                    </small> 
                    </div>
                    -->
                    <div class="form-group">
                        <label for="nature-of-enquiry">Nature of Enquiry</label>
                        <select class="selectmenu" id="nature-of-enquiry" class="form-control"> 
                            <option>Select</option>
                            <option>Parent/Student</option>
                            <option>School/Content Provider</option>
                            <option>Teacher/Trainer</option>
                            <option>Others</option>
                        </select>
                        
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Type your message..."></textarea>
                    </div>
                    <div class="form-submit text-center">
                        <button type="submit" class="btn btn-red btn-wide" data-toggle="modal" data-target="#contact-success-overlay">Send Message</button>
                    </div>
                <!-- </form> -->
            </div>
            <div class="col-md-6 map-wrapper">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.809723566849!2d103.80978721527745!3d1.2883355990603396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da1b8a605c23d1%3A0x6eaa1b16118c2a2a!2sBryton%20House!5e0!3m2!1sen!2smm!4v1628073420546!5m2!1sen!2smm" width="100%" height="766" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- Modal Contact Sucess -->
<div class="modal fade" id="contact-success-overlay" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Your message has been sent.</h2>
            </div>
            <div class="modal-body nicescroll text-center">
                <img src="{{ asset('frontend/images/icon-success.png') }}" alt="icon" width="157">
                <div class="text-wrapper"><p>Please check your email address for further notice.</p></div>
                <button class="btn btn-red btn-full" data-toggle="modal"
                data-dismiss="modal">
                Okay
                </button>
            </div>

        </div>
    </div>
</div>
@endsection
