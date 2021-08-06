@extends('layouts.app')

@push('meta-tags')

    <title>Harvin Pharma Company</title>
    <meta name="description" content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable.">
    <meta name="keywords" content="{{ env('APP_NAME') }}, Home">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="Harvin Pharma Company" />
    <meta property="og:description"  content="We believe being a green workplace is an ROI Positive decision for small businesses, but many don’t do it because of the false perception that it’s hard, complicated, and unprofitable." />
    <meta property="og:image"        content="{{ asset('images/green_places_logo_png.png') }}" />
    <meta property="og:image:type"   content="image/png">

@endpush


@section('content')

		<!-- slider-area start -->
		<div class="slider-area">
			<div class="slider-active owl-carousel">
                @foreach($credibility_brands as $index => $credibility_brand )
				<div class="single-silder height-vh hero-slide " style="background-image: url('{{ $credibility_brand->thumb_image_full_path }}')">
					<div class="container">
						<div class="display-table">
							<div class="table-cell">
								<div class="slider-text text-animation">
									<h2>Get your free Health treatment</h2>
									<p>It has survived not only five centuries, but also the leap <br /> into electronic typesetting, remaining</p>
									<a class="btn" href="#">Learn More</a>
									<a class="btn btn-black" href="#">Appointment</a>
								</div>
							</div>
						</div>
					</div>
				</div>
                @endforeach

			</div>
		</div>
		<!-- slider-area end -->

		<!-- about-area start -->
		<div class="about-area pt-90 pb-60">
			<div class="container">
				<div class="area-title text-center">
					<h2>Welcome to <span>HARVIN PHARMACEUTICALS</span></h2>
					<p>Established as a Proprietor firm in the year 2018, we “Harvin Pharmaceuticals” are a leading Manufacturer of a wide range of Medicated Soap, Pharmaceuticals Lotions, Dusting Powder, etc. Situated in Ahmedabad (Gujarat, India), we have constructed a wide and well functional infrastructural unit that plays an important role in the growth of our company. We offer these products at reasonable rates and deliver these within the promised time-frame. In addition to this, we are also involved in offering best-in-class PCD Pharma Franchise and Pharmaceutical Third Party Manufacturing to our esteemed clients. Under the headship of “Mr. Sanjay Bhalgamadiya” (Marketing Executive), we have gained a huge clientele across the nation.

                        </p>
				</div>

			</div>
		</div>
		<!-- about-area end -->
		<!-- department-area start -->
		<div class="department-area theme-bg pt-90 pb-50">
			<div class="container">
				<div class="area-title text-center text-white">
					<h2>Why Us?</h2>
					<p>We are widely recognized in this sector due to our premium quality and trendy apparels,which we provide in several colors and designs. Due to the following unique reasons, we are able to carve a niche in this field:</p>
				</div>

				<div class="row">
					<div class="col-md-4 col-sm-4 mb-40">
						<div class="department-box text-center">
							<div class="icon-box">
								<i class="fa fa-medkit"></i>
							</div>
							<div class="dep-text">
								<h3>Attractive product range</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 mb-40">
						<div class="department-box text-center">
							<div class="icon-box">
								<i class="fa fa-heartbeat"></i>
							</div>
							<div class="dep-text">
								<h3>Affordable price structure</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 mb-40">
						<div class="department-box text-center">
							<div class="icon-box">
								<i class="fa fa-user-md"></i>
							</div>
							<div class="dep-text">
								<h3>Positive records</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 mb-40">
						<div class="department-box text-center">
							<div class="icon-box">
								<i class="fa fa-stethoscope"></i>
							</div>
							<div class="dep-text">
								<h3>Transparent dealings</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 mb-40">
						<div class="department-box text-center">
							<div class="icon-box">
								<i class="fa fa-stethoscope"></i>
							</div>
							<div class="dep-text">
								<h3>Prompt delivery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 mb-40">
						<div class="department-box text-center">
							<div class="icon-box">
								<i class="fa fa-plus-square"></i>
							</div>
							<div class="dep-text">
								<h3>Well-equipped warehouse</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- department-area end -->
		<!-- team-area start -->
        <div class="product-area pt-90 pb-60">
			<div class="container">
				<div class="row mb-30">
					<div class="area-title text-center">
                        <h2>Latest Products</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
                    </div>
				</div>
				<div class="row">
                    @foreach($blogcategory as $index => $blogcategory)
					<div class="col-md-3 col-sm-4 mb-10">
						<div class="product-box">
							<div class="product-img">
								<a href="product-details.html"><img src="{{ $blogcategory->thumb_image_full_path }}" alt="" /></a>
							</div>
							<div class="product-content text-center">
								<h3 class="product-title"><a href="product-details.html">{{ $blogcategory->name }}</a></h3>
								<div class="product-price">
									<p>{{ $blogcategory->short_description }}</p>
								</div>
							</div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>
		</div>
		<div class="latest-news-area gray-bg pt-90 pb-60">
			<div class="container">
				<div class="area-title text-center">
					<h2>Latest News</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
				</div>
				<div class="row">

					<div class="col-sm-6 col-md-4 col-lg-4">
						<article class="post format-image bg-white">
							<div class="post-preview">
								<a href="#"><img src="" alt=""></a>
							</div>
							<div class="post-content">
								<h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
								<ul class="post-meta">
									<li>October 24, 2017</li>
									<li>By <a href="#">basictheme</a></li>
								</ul>
								<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
								<a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
							</div>
						</article>
					</div>

					<div class="col-sm-6 col-md-4 col-lg-4">
						<article class="post format-image bg-white">
							<div class="post-preview">
								<a href="#"><img src="img/blog/2.jpg" alt=""></a>
							</div>
							<div class="post-content">
								<h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
								<ul class="post-meta">
									<li>October 24, 2017</li>
									<li>By <a href="#">basictheme</a></li>
								</ul>
								<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
								<a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
							</div>
						</article>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4 hidden-sm">
						<article class="post format-image bg-white">
							<div class="post-preview">
								<a href="#"><img src="img/blog/3.jpg" alt=""></a>
							</div>
							<div class="post-content">
								<h2 class="post-title"><a href="#">Diet Charts to help you</a></h2>
								<ul class="post-meta">
									<li>October 24, 2017</li>
									<li>By <a href="#">basictheme</a></li>
								</ul>
								<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
								<a href="#" class="btn btn-lg btn-link btn-base">Read more ›</a>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		<!-- team-area end -->
		<!-- appointment-area start -->
		<div class="appointment-area bg-2">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-6 no-gutter">
						<div class="quick-appointment-form">
							<h3>Inquiry</h3>
							<p class="text-muted">Behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
							<br/>
							<form action="#">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Your First Name">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Your Last Name">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Your Phone Number">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input class="form-control" type="email" placeholder="Your Email ID">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input class="form-control date-select" type="text" placeholder="Your Date of Birth">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<select>
												<option>Select Appointment Slot</option>
												<option>9:00 p.m. - 12:00 p.m.</option>
												<option>12:00 p.m. - 4:00 p.m.</option>
												<option>4:00 p.m. - 8:00 p.m.</option>
											</select>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
										</div>
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-black" type="submit"><i class="fa fa-paper-plane"></i> Book Appointment</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- appointment-area end -->


		<!-- video-area end -->
		<!-- latest-news-area start -->

		<!-- latest-news-area end -->
		<!-- clients-area start -->
		<div class="clients-area ptb-40">
			<div class="container">
				<div class="row">
					<div class="clients-active owl-carousel">
                        @foreach($organization as $index => $organization )
						<div class="col-sm-12">
							<div class="basic-clients">
								<a href="#"><img src="{{ $organization->thumb_image_full_path }}" alt="" /></a>
							</div>
						</div>
                        @endforeach

					</div>
				</div>
			</div>
		</div>
@endsection

