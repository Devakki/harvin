@extends('layouts.app')

@push('meta-tags')

    <title>Green Places | Erase Your Company Footprint</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, About Us">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Green Places | Erase Your Company Footprint" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">

@endpush

@section('content')
<div class="basic-breadcrumb-area bg-opacity bg-1 ptb-100">
    <div class="container">
        <div class="basic-breadcrumb text-left">
            <h3 class="">About us</h3>
            <ol class="breadcrumb text-xs">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">about</a></li>
                <li class="active">about</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb area -->
<!-- about-area start -->
<div class="about-area pt-90 pb-60">
    <div class="container">
        <div class="area-title text-center">
            <h2>Welcome to <span>Medifine</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-30">
                <div class="features-box border-box text-center">
                    <i class="fa fa-ambulance" aria-hidden="true"></i>
                    <h3>easy appointments</h3>
                    <p>Behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <a class="btn" href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="features-box border-box text-center">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    <h3>Best Doctor</h3>
                    <p>Behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <a class="btn" href="#">Learn More</a>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="features-box border-box text-center">
                    <i class="fa fa-medkit" aria-hidden="true"></i>
                    <h3>High Quality Service</h3>
                    <p>Behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <a class="btn" href="#">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-area end -->
<div class="basic-skill-area pb-70">
    <div class="container">
        <div class="area-title text-center">
            <h2>Our expertise</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <!-- PROGRESS BAR -->
                <h6 class="progress-title">Success Rate <span class="pull-right"><span>80</span>%</span></h6>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                </div>
                <!-- END PROGRESS BAR -->

                <!-- PROGRESS BAR -->
                <h6 class="progress-title">Disease Curability <span class="pull-right"><span>60</span>%</span></h6>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                </div>
                <!-- END PROGRESS BAR -->

                <!-- PROGRESS BAR -->
                <h6 class="progress-title">Cases Solved <span class="pull-right"><span>75</span>%</span></h6>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="75" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                </div>
                <!-- END PROGRESS BAR -->
            </div>
            <div class="col-sm-6">
                <!-- PROGRESS BAR -->
                <h6 class="progress-title">Blood Bank <span class="pull-right"><span>80</span>%</span></h6>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="80" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                </div>
                <!-- END PROGRESS BAR -->

                <!-- PROGRESS BAR -->
                <h6 class="progress-title">Happy patients <span class="pull-right"><span>60</span>%</span></h6>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="60" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                </div>
                <!-- END PROGRESS BAR -->

                <!-- PROGRESS BAR -->
                <h6 class="progress-title">Cases Solved <span class="pull-right"><span>75</span>%</span></h6>
                <div class="progress">
                    <div class="progress-bar" aria-valuenow="75" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                </div>
                <!-- END PROGRESS BAR -->
            </div>
        </div>
    </div>
</div>
<div class="basic-counter-area theme-overlay bg-1 fix">
    <div class="counter-box">
        <div class="counter-icon">
            <i class="fa fa-smile-o"></i>
        </div>
        <div class="counter-text">
            <h3 class="counter-number">650</h3>
            <h4>Happy smiles</h4>
        </div>
    </div>
    <div class="counter-box">
        <div class="counter-icon">
            <i class="fa fa-calendar"></i>
        </div>
        <div class="counter-text">
            <h3 class="counter-number">20</h3>
            <h4>Years of experience</h4>
        </div>
    </div>
    <div class="counter-box">
        <div class="counter-icon">
            <i class="fa fa-car" aria-hidden="true"></i>
        </div>
        <div class="counter-text">
            <h3 class="counter-number">1200</h3>
            <h4>Emergency Vehicles</h4>
        </div>
    </div>
    <div class="counter-box">
        <div class="counter-icon">
            <i class="fa fa-h-square" aria-hidden="true"></i>
        </div>
        <div class="counter-text">
            <h3 class="counter-number">11</h3>
            <h4>Clinics</h4>
        </div>
    </div>
</div>
<!-- team-area start -->
<div class="team-area pt-90 pb-60 ">
    <div class="container">
        <div class="area-title text-center">
            <h2>Our Doctors</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="team-item">
                    <div class="team-item-image">
                        <img src="img/team/1.png" alt="team member">
                        <div class="team-item-detail">
                            <h5 class="team-item-title">Whats Up!</h5>
                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                            <div class="team-social-icon">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                                <a href="#"><i class="ion-social-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-item-name"><a href="#">Bardiman Smith</a></h4>
                        <span class="team-item-role">Managing Director</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="team-item">
                    <div class="team-item-image">
                        <img src="img/team/2.png" alt="team member">
                        <div class="team-item-detail">
                            <h5 class="team-item-title">Whats Up!</h5>
                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                            <div class="team-social-icon">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                                <a href="#"><i class="ion-social-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-item-name"><a href="#">Everett Holder</a></h4>
                        <span class="team-item-role">Head Of Department</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="team-item">
                    <div class="team-item-image">
                        <img src="img/team/3.png" alt="team member">
                        <div class="team-item-detail">
                            <h5 class="team-item-title">Whats Up!</h5>
                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                            <div class="team-social-icon">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                                <a href="#"><i class="ion-social-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-item-name"><a href="#">Mike Hendricks</a></h4>
                        <span class="team-item-role">Senior Gynae</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="team-item">
                    <div class="team-item-image">
                        <img src="img/team/1.png" alt="team member">
                        <div class="team-item-detail">
                            <h5 class="team-item-title">Whats Up!</h5>
                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</p>
                            <div class="team-social-icon">
                                <a href="#"><i class="ion-social-facebook"></i></a>
                                <a href="#"><i class="ion-social-googleplus"></i></a>
                                <a href="#"><i class="ion-social-instagram"></i></a>
                                <a href="#"><i class="ion-social-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="team-info">
                        <h4 class="team-item-name"><a href="#">Roberto Blackwell</a></h4>
                        <span class="team-item-role">Dental Specialist </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- team-area start -->
<div class="suggestions-area gray-bg pt-90 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-30">
                <div class="area-title2">
                    <h2>Suggestions</h2>
                    <p>Top tips from doctors</p>
                </div>

              <!-- Nav tabs -->
              <div class="tabs-menu">
                <ul class="custom-tab" role="tablist">
                    <li role="presentation" class="active"><a href="#home-tab"  role="tab" data-toggle="tab">Teeth</a></li>
                    <li role="presentation"><a href="#oral-exam"  role="tab" data-toggle="tab">Cardio</a></li>
                    <li role="presentation"><a href="#neurology"  role="tab" data-toggle="tab">Neurology</a></li>
                    <li role="presentation"><a href="#settings"  role="tab" data-toggle="tab">Pregnacy</a></li>
                </ul>
              </div>

              <!-- Tab panes -->
              <div class="tab-content suggestions">
                <div role="tabpanel" class="tab-pane fade in active" id="home-tab">
                    <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><br>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <a href="#" class="btn border small">Read More</a>
                    </div>

                    <div class="image">
                        <img src="img/team/profile-1.jpg" alt="">
                        <p class="name">Milan Markovic</p>
                        <p class="spec">General Dentist</p>
                    </div>

                    <span class="clearfix"></span>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="oral-exam">
                    <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><br>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <a href="#" class="btn border small">Read More</a>
                    </div>

                    <div class="image">
                        <img src="img/team/profile-2.jpg" alt="">
                        <p class="name">Milan Markovic</p>
                        <p class="spec">General Dentist</p>
                    </div>

                    <span class="clearfix"></span>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="neurology">
                    <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><br>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <a href="#" class="btn border small">Read More</a>
                    </div>

                    <div class="image">
                        <img src="img/team/profile-3.jpg" alt="">
                        <p class="name">Milan Markovic</p>
                        <p class="spec">General Dentist</p>
                    </div>

                    <span class="clearfix"></span>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><br>
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <a href="#" class="btn border small">Read More</a>
                    </div>

                    <div class="image">
                        <img src="img/team/profile-1.jpg" alt="">
                        <p class="name">Milan Markovic</p>
                        <p class="spec">General Dentist</p>
                    </div>

                    <span class="clearfix"></span>
                </div>
                </div>
            </div>
            <div class="col-md-5 mb-30">
                <div class="area-title2">
                    <h2>FAQ</h2>
                    <p>Fast answers questions</p>
                </div>

                 <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-heartbeat" aria-hidden="true"></i>Cardio health</a>
                          </h4>
                        </div>

                        <div id="collapse1" class="panel-collapse collapse in">
                          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                          minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                          commodo consequat.</div>
                        </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-medkit" aria-hidden="true"></i>Teeth whitening</a>
                          </h4>
                        </div>

                        <div id="collapse2" class="panel-collapse collapse">
                          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                          minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                          commodo consequat.</div>
                        </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-user-md" aria-hidden="true"></i>Oral exams</a>
                          </h4>
                        </div>

                        <div id="collapse3" class="panel-collapse collapse">
                          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                          minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                          commodo consequat.</div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class="fa fa-user-md" aria-hidden="true"></i>Dental exams</a>
                          </h4>
                        </div>

                        <div id="collapse4" class="panel-collapse collapse">
                          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                          minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                          commodo consequat.</div>
                        </div>
                      </div>

                  </div>
            </div>
        </div>
    </div>
</div>
<!-- clients-area start -->
<div class="clients-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="clients-active owl-carousel">
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-1.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-2.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-3.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-4.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-5.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-6.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-1.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="basic-clients">
                        <a href="#"><img src="img/clients/client-2.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')


@endpush
