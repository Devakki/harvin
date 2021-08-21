@extends('layouts.app')

@push('meta-tags')

    <title>{{ $blog->meta_title }}</title>
    <meta name="description" content="{{ $blog->meta_description }}">
    <meta name="keywords" content="{{ $blog->meta_keyword }}">

    <meta property="og:url"          content="{{ Request::url() }}" />
    <meta property="og:title"        content="{{ $blog->name }}" />
    <meta property="og:description"  content="{{ $blog->meta_description }}" />
    <meta name="image" property="og:image" content="{{ $blog->thumb_image_full_path }}" />
    <meta property="og:type" content="website" />
    <!-- <meta property="og:site_name" content="{{ env('APP_URL') }}"/> -->

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="{{ $blog->name }}" />
    <meta name="twitter:description" content="{{ $blog->meta_description }}" />
    <meta name="twitter:image" content="{{ $blog->thumb_image_full_path }}" />

@endpush

@section('content')
   <!-- breadcrumb area -->
		<div class="basic-breadcrumb-area bg-opacity bg-1 ptb-100">
			<div class="container">
				<div class="basic-breadcrumb text-center">
					<h3 class="">Product Details</h3>
					<ol class="breadcrumb text-xs">
						<li><a href="index.html">Home</a></li>
						<li><a href="#">Product</a></li>
						<li class="active">Details</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- breadcrumb area -->

		<!-- product-area start -->
		<div class="product-area divider-bottom ptb-90">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-12">
						<div class="large-product">
						  <!-- Nav tabs -->

						  <!-- Tab panes -->
						  <div class="tab-content large-img-content">
							<div role="tabpanel" class="tab-pane active" id="home"><img src="{{ $blog->thumb_image_full_path }}" alt="" /></div>

						  </div>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12">
						<div class="product-description mb-30">
							<h2 class="m-b-5">{{ $blog->name }}</h2>

						</div>

						<hr>
						<p>{{ $blog->short_description }}</p>

						<p>Tags: <a href="#" rel="tag">medicine</a>, <a rel="tag" href="#">baby</a></p>
						<hr>
						<!-- PRODUCT FORM -->
						<form method="post">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="sr-only">Quantity</label>
										<input type="number" class="form-control" step="1" min="1" value="1">
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label class="sr-only">Color</label>
										<select class="form-control">
											<option value="blue">Blue</option>
											<option value="red">Red</option>
											<option value="green">Green</option>
										</select>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label class="sr-only">Size</label>
										<select class="form-control">
											<option selected="selected" disabled>Size</option>
											<option value="xxs">xs</option>
											<option value="xs">s</option>
											<option value="s">m</option>
										</select>
									</div>
								</div>
							</div><!-- .row -->

							<div class="row">
								<div class="col-sm-6">
									<a class="btn btn-block btn-round btn-base">Add to cart</a>
								</div>
							</div><!-- .row -->
						</form>
					</div>
				</div>

				<div class="row mt-70">
					<div class="col-sm-12">

						<!-- TABS NAV-->
						<ul class="nav-text-tabs">
							<li class="active"><a href="#description" data-toggle="tab">Description</a></li>
							<li><a href="#data-sheet" data-toggle="tab">Data Sheet</a></li>
							<li><a href="#reviews" data-toggle="tab">Reviews (2)</a></li>
						</ul>
						<!-- END TABS NAV-->

						<!-- TAB CONTENT -->
						<div class="tab-content">

							<div id="description" class="tab-pane active">
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
								<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
							</div>

							<div id="data-sheet" class="tab-pane">
								<table class="table table-striped">
									<tbody>
										<tr>
											<th>Title</th>
											<th>Info</th>
										</tr>
										<tr>
											<td>Compositions</td>
											<td>medicine</td>
										</tr>
										<tr>
											<td>Size</td>
											<td>44, 46, 48</td>
										</tr>
										<tr>
											<td>Color</td>
											<td>Black</td>
										</tr>
										<tr>
											<td>Brand</td>
											<td>Somebrand</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div id="reviews" class="tab-pane">
								<!-- REVIEWS -->
								<div class="comments reviews">
									<div class="comment">
										<div class="comment-content">
											<h5><a href="#">Michael Thomas</a></h5>
											<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
											<span class="star-rating star-rating-4"></span>
										</div>
									</div>

									<div class="comment">
										<div class="comment-content">
											<h5><a href="#">Adam Hines</a></h5>
											<p>Nam adipiscing. Vestibulum eu odio. Vivamus laoreet. Nullam tincidunt adipiscing enim. Phasellus tempus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi mauris ac eros.</p>
											<span class="star-rating star-rating-4"></span>
										</div>
									</div>
								</div>
								<!-- END REVIEWS -->

								<!-- REVIEW FROM -->
								<form method="post">
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label class="sr-only" for="name">Name</label>
												<input type="text" id="name" class="form-control" name="name" placeholder="Name">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label class="sr-only" for="email">Name</label>
												<input type="text" id="email" class="form-control" name="email" placeholder="E-mail">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<select class="form-control">
													<option>Select one</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<textarea class="form-control" rows="4" placeholder="Review"></textarea>
											</div>
										</div>
										<div class="col-sm-12">
											<button type="submit" class="btn btn-round btn-base">Submit Review</button>
										</div>
									</div>
								</form>
								<!-- END REVIEW FROM -->
							</div>

						</div>
						<!-- END TAB CONTENT -->

					</div>
				</div><!-- .row -->
			</div>
		</div>
		<!-- product-area end -->
		<div class="related-product-area pt-90 pb-60">
			<div class="container">
				<div class="area-title text-center">
					<h2>Related Products</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi tempora veritatis nemo aut ea iusto eos est expedita, quas ab adipisci.</p>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-4 mb-30">
						<div class="product-box">
							<div class="product-img">
								<a href="product-details.html"><img src="img/product/1.jpg" alt="" /></a>
								<div class="sale-tag">
									<span>sale</span>
								</div>
								<div class="action-box">
									<a href="#"><i class="ion-bag"></i></a>
									<a href="#"><i class="ion-ios-search-strong"></i></a>
									<a href="#"><i class="ion-heart"></i></a>
								</div>
							</div>
							<div class="product-content text-center">
								<h3 class="product-title"><a href="product-details.html">Medi Product Title</a></h3>
								<div class="product-price">
									<span>$39</span>
									<span class="price-old">$50</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mb-30">
						<div class="product-box">
							<div class="product-img">
								<a href="product-details.html"><img src="img/product/2.jpg" alt="" /></a>
								<div class="action-box">
									<a href="#"><i class="ion-bag"></i></a>
									<a href="#"><i class="ion-ios-search-strong"></i></a>
									<a href="#"><i class="ion-heart"></i></a>
								</div>
							</div>
							<div class="product-content text-center">
								<h3 class="product-title"><a href="product-details.html">Medi Product Title</a></h3>
								<div class="product-price">
									<span>$50</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mb-30">
						<div class="product-box">
							<div class="product-img">
								<a href="product-details.html"><img src="img/product/3.jpg" alt="" /></a>
								<div class="action-box">
									<a href="#"><i class="ion-bag"></i></a>
									<a href="#"><i class="ion-ios-search-strong"></i></a>
									<a href="#"><i class="ion-heart"></i></a>
								</div>
							</div>
							<div class="product-content text-center">
								<h3 class="product-title"><a href="product-details.html">Medi Product Title</a></h3>
								<div class="product-price">
									<span>$39</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 mb-30">
						<div class="product-box">
							<div class="product-img">
								<a href="product-details.html"><img src="img/product/4.jpg" alt="" /></a>
								<div class="sale-tag">
									<span class="new">new</span>
								</div>
								<div class="action-box">
									<a href="#"><i class="ion-bag"></i></a>
									<a href="#"><i class="ion-ios-search-strong"></i></a>
									<a href="#"><i class="ion-heart"></i></a>
								</div>
							</div>
							<div class="product-content text-center">
								<h3 class="product-title"><a href="product-details.html">Medi Product Title</a></h3>
								<div class="product-price">
									<span>$55</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/writeIt/WriteIt.min.js')}}"></script>
<script>
    //social media popup
(function($){


  $.fn.customerPopup = function (e, intWidth, intHeight, blnResize) {


    e.preventDefault();


    intWidth = intWidth || '1000';
    intHeight = intHeight || '1000';
    strResize = (blnResize ? 'yes' : 'no');


    var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
        strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
        objWindow = window.open(this.attr('href'), strTitle, strParam).focus();

  }

  $(document).ready(function ($) {
    $('.customer.share').on("click", function(e) {
      $(this).customerPopup(e);
      window.location.reload();
    });
  });

}(jQuery));
</script>

@endpush
