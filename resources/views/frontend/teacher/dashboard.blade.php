{{-- Extends layout --}}
@extends('frontend.layout.app')

{{-- Additional styles for this specific page --}}
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/jquery.timepicker.css') }}" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/vendor/datatables.min.css') }}" media="all" />
@endsection

{{-- Content --}}
@section('content')

<!-- Start dashboard -->
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">

					<nav id="nav-tab-dashboard" class="col-md-12 col-sm-12 col-xs-12"><!-- Start nav tab -->
						<div class="nav nav-tabs" role="tablist">
							<a class="nav-item nav-link active" id="nav-classes-tab" data-toggle="tab" href="#nav-classes" role="tab" aria-controls="nav-classes" aria-selected="true">Classes</a>
							<!-- <a class="nav-item nav-link" id="nav-assignment-tab" data-toggle="tab" href="#nav-assignment" role="tab" aria-controls="nav-assignment" aria-selected="true">Assignment</a> -->
							<a class="nav-item nav-link" id="nav-payment-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-payment" aria-selected="false">Payment</a>
						</div>
					</nav><!-- End nav tab -->



					<div class="tab-content col-md-12" id="nav-tabContent"><!-- Start tab content -->

						<div class="tab-pane show active" id="nav-classes" role="tabpanel" aria-labelledby="nav-classes-tab"><!-- Start tab pane -->
							<div class="row create-class-wraper">
								<div class="col-md-12 text-right">
									<a href="javascript:void(0)" data-toggle="modal" data-target="#select-class-type-overlay" >
										<button class="btn btn-red btn-wide create-class">
											<i class="fa fa-plus"></i> Add new programme 
										</button>
									</a>
								</div>
							</div>
							<div class="row filters-wrapper">
								<div class="col-md-3 pr-md-35">
									<ul class="filter-classes">
										<li class="active">
											<a href="#" class="parent-item"><span>Active Programmes</span><i class="fas fa-angle-down rotate-icon"></i></a>
											<ul class="sub-items">
												<li>
													<a href="#active-pre-recorded" id="reset-pre-recorded-list" class="active">Pre-Recorded</a>
												</li>
												<li>
													<a href="#active-live-class" id="reset-live-class-list">Live Class</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#" class="parent-item"><span>Draft Programmes</span><i class="fas fa-angle-down rotate-icon"></i></a>
											<ul class="sub-items">
												<li>
													<a href="#draft-pre-recorded" id="reset_draft_pre_recorded">Pre-Recorded</a>
												</li>
												<li>
													<a href="#draft-live-class" id="reset_draft_live_classes">Live Class</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#subscribed-curriculum" class="parent-item">Subscribed<br>Curriculum</a>
										</li>
									</ul><!-- End filter classes -->
								</div><!-- End col-md-3 -->

								<div class="col-md-9">
									<!-- if Empty class show this and dont show classes-filter and class-item -->
									<!-- <div class="row empty-class">
										<div class="col-md-12 full-width-bg rounded-corner" style="background-image: url('{{ asset('frontend/images/empty-class.png') }}');">
											<div class="filter-gray">
												<div class="container">
													<div class="row align-items-center">

														<div class="col-md-12">
															<h2>Best Class in here!</h2>
															<h5>Find what fascinates you as you explore the curriculum</h5>
														</div>
													</div>
													<a href="{{ url('classes') }}"><button class="btn btn-red">Get Started Now</button></a>
												</div>

											</div>
										</div>
									</div> -->
									<!-- at subscribed-curriculum if Empty curriculum show this and dont show classes-filter and class-item -->
									<!-- <div class="row empty-class">
										<div class="col-md-12 full-width-bg rounded-corner" style="background-image: url('{{ asset('frontend/images/empty-class.png') }}');">
											<div class="filter-gray">
												<div class="container">
													<div class="row align-items-center">

														<div class="col-md-12">
															<h2>Best Curriculum in here!</h2>
															<h5>Find what fascinates you as you explore the curriculum</h5>
														</div>
													</div>
													<a href="{{ url('curriculum') }}"><button class="btn btn-red">Get Started Now</button></a>
												</div>

											</div>
										</div>
									</div> -->
									<div class="row align-items-center classes-filter">
										<div class="col-6">
											<h5>List of Programmes</h5>
										</div>
										<div class="col-6">
											<div class="dropdown text-right dropdown-style-1">
												<a class="dropdown-toggle" href="#" role="button" id="sortby" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Sort by
												</a>

												<div class="dropdown-menu" aria-labelledby="sortby">
													<a class="dropdown-item" href="#">Newest</a>
													<a class="dropdown-item" href="#">Oldest</a>
												</div>
											</div>
										</div>
										<div class="col-12">
											<hr>
										</div>
									</div><!-- End row -->

									<div class="row">
										<div class="col-md-12">

											<div id="active-pre-recorded" class="active filter-content"><!-- Start active-pre-recorded -->

                                                {{-- Generate Pre Recorded Class listing here --}}

											</div><!-- End Active Pre recorded Results-->

											<div id="active-live-class" class="filter-content"><!-- Start Active Live Class Results -->

												{{-- Generate Live Class listing here --}}

											</div><!-- End Active Live Class Results -->

											<div id="draft-pre-recorded" class="filter-content"><!-- Start draft pre recorded Results -->
												
												{{-- generate draft pre recorded listing here --}}

											</div><!-- End draft pre recorded Results -->

											<div id="draft-live-class" class="filter-content"><!-- Start Draft Live Class Results -->

												{{-- generate draft live class listing here --}}

											</div><!-- End Draft Live Class Results -->

											<div id="subscribed-curriculum" class="filter-content"><!-- Start Subscribe curriculum Results -->

												<div class="class-item"><!-- Start class item -->
													<div class="row position-relative">
														<div class="col-md-9">
															<h6>Drawing Shapes Level 1</h6>
															<div class="row">
																<div class="col-md-12">
																	<div class="row">
																		<div class="col-md-5 col-sm-12 text-wrapper">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>

																		</div>
																		<div class="col-md-7 item-wrapper">
																			<div class="item">
																				<label>
																					File Type:
																				</label>
																				<span>PDF</span>
																			</div>
																			<div class="item">
																				<label>
																					File Size:
																				</label>
																				<span>
																					300kb
																				</span>
																			</div>
																			<div class="item">
																				<label>
																					Creator:
																				</label>
																				<span>
																					<b>School Name</b>
																				</span>
																			</div>
																			<div class="item">
																				<label>
																					Price:
																				</label>
																				<span><b>$23,52</b></span>
																			</div><!-- End item -->
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-md-3 col-sm-12 image-wrapper d-flex">
															<img src="{{ asset('frontend/images/icon-pdf.png') }}" width="118" height="118">
														</div>

													</div>
													<div class="row">
														<div class="col-md-12 btn-wrapper">
															<a href="#">
																<button class="btn btn-red">
																	Download
																</button>
															</a>
														</div>
													</div>
												</div><!-- End class item -->

												<div class="class-item"><!-- Start class item -->
													<div class="row position-relative">
														<div class="col-md-9">
															<h6>Drawing Shapes Level 1</h6>
															<div class="row">
																<div class="col-md-12">
																	<div class="row">
																		<div class="col-md-5 col-sm-12 text-wrapper">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>

																		</div>
																		<div class="col-md-7 item-wrapper">
																			<div class="item">
																				<label>
																					Watched videos:
																				</label>
																				<div class="dropdown dropdown-style-2 video-dropdown-wrapper">
																					<a class="dropdown-toggle" href="#" role="button" id="video-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																						5/8
																					</a>
																					<div class="dropdown-menu" aria-labelledby="video-dropdown">

																						<div class="left-wrapper">
																							<h5>Title</h5>
																						</div>
																						<div class="right-wrapper">
																							<h5>Duration</h5>
																						</div>

																						<hr>
																						<a class="dropdown-item video-item">
																							<div class="left-wrapper">
																								<img src="{{ asset('frontend/images/icon-play.png') }}" class="rounded-circle" width="20">
																								<h6 class="title">Lesson 1 : Introduction to drawing</h6>
																							</div>
																							<div class="right-wrapper red">
																								40 min
																							</div>
																						</a>
																						<a class="dropdown-item video-item">
																							<div class="left-wrapper">
																								<img src="{{ asset('frontend/images/icon-play.png') }}" class="rounded-circle" width="20">
																								<h6 class="title">Lesson 2 : Drawing shapes</h6>
																							</div>
																							<div class="right-wrapper red">
																								60 min
																							</div>
																						</a>
																						<a class="dropdown-item video-item">
																							<div class="left-wrapper">
																								<img src="{{ asset('frontend/images/icon-play.png') }}" class="rounded-circle" width="20">
																								<h6 class="title">Lesson 3 : Drawing lines</h6>
																							</div>
																							<div class="right-wrapper red">
																								40 min
																							</div>
																						</a>
																						<a class="dropdown-item video-item">
																							<div class="left-wrapper">
																								<img src="{{ asset('frontend/images/icon-play.png') }}" class="rounded-circle" width="20">
																								<h6 class="title">Lesson 4 : Drawing patterns</h6>
																							</div>
																							<div class="right-wrapper red">
																								40 min
																							</div>
																						</a>
																						<a class="dropdown-item video-item mb-0"><!-- last item -->
																							<div class="left-wrapper">
																								<img src="{{ asset('frontend/images/icon-play.png') }}" class="rounded-circle" width="20">
																								<h6 class="title">Lesson 4 : Drawing patterns</h6>
																							</div>
																							<div class="right-wrapper red">
																								40 min
																							</div>
																						</a>
																					</div>
																				</div>
																			</div>
																			<div class="item">
																				<label>
																					Duration:
																				</label>
																				<span>
																					8 hrs 20 min
																				</span>
																			</div>
																			<div class="item">
																				<label>
																					Creator:
																				</label>
																				<span>
																					<b>School Name</b>
																				</span>
																			</div>
																			<div class="item">
																				<label>
																					Price:
																				</label>
																				<span><b>$23,52</b></span>
																			</div><!-- End item -->
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-md-3 col-sm-12 image-wrapper d-flex">
															<div class="image-bg" style="background-image: url('{{ asset('frontend/images/product-1.png') }}');">
																<i class="fa fa-play"></i>
															</div>

														</div>

													</div>
													<div class="row">
														<div class="col-md-12 btn-wrapper">
															<a href="curriculum-pre-recorded">
																<button class="btn btn-red">
																	Start Learn
																</button>
															</a>
														</div>
													</div>
												</div><!-- End class item -->


												<div class="class-item"><!-- Start class item -->
													<div class="row position-relative">
														<div class="col-md-9">
															<h6>Drawing Shapes Level 1</h6>
															<div class="row">
																<div class="col-md-12">
																	<div class="row">
																		<div class="col-md-5 col-sm-12 text-wrapper">
																			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>

																		</div>
																		<div class="col-md-7 item-wrapper">
																			<div class="item">
																				<label>
																					File Type:
																				</label>
																				<span>Doc</span>
																			</div>
																			<div class="item">
																				<label>
																					File Size:
																				</label>
																				<span>
																					300kb
																				</span>
																			</div>
																			<div class="item">
																				<label>
																					Creator:
																				</label>
																				<span>
																					<b>School Name</b>
																				</span>
																			</div>
																			<div class="item">
																				<label>
																					Price:
																				</label>
																				<span><b>$23,52</b></span>
																			</div><!-- End item -->
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-md-3 col-sm-12 image-wrapper d-flex">
															<img src="{{ asset('frontend/images/icon-doc.png') }}" width="118" height="118">

														</div>

													</div>
													<div class="row">
														<div class="col-md-12 btn-wrapper">
															<a href="#">
																<button class="btn btn-red">
																	Download
																</button>
															</a>
														</div>
													</div>
												</div><!-- End class item -->

											</div><!-- End Draft Live Class Results -->
										</div><!-- End col -->
									</div><!-- End row -->

								</div><!-- End col 9 -->

							</div><!-- End row -->
						</div><!-- End tab pane -->

						<!-- Start tab pane -->
						<!-- <div class="tab-pane" id="nav-assignment" role="tabpanel" aria-labelledby="nav-assignment-tab">
							assignment
						</div> -->
						<!-- End tab pane -->

						<!-- Start tab pane -->
						<div class="tab-pane" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
							<div class="spacer">
							</div>
							<div class="row filters-wrapper">
								<div class="col-md-3 pr-md-35">
									<ul class="filter-payment">
										<li class="active">
											<a href="#wallet" class="parent-item">Wallet</a>
										</li>
										<li>
											<a href="#transaction-history" class="parent-item">Transaction History</a>
										</li>
									</ul><!-- End filter classes -->
								</div><!-- End col-md-3 -->
								<div class="col-md-9">
									<div class="filter-content active" id="wallet">
										<h5>Overview</h5>
										<hr>
										<div class="table-border">
											<div class="row align-items-center wallet-detail">
												<div class="col-md-6 balance-wrapper">
													<label>Balance Details</label>
													<h2>$1235.456</h2>
												</div>
												<div class="col income-wrapper">
													<div class="income-img">
														<img src="{{ asset('frontend/images/icon-down.png') }}" width="23" height="25" alt="icon" />
													</div>
													<div class="item-detail">
														<label>Income</label>
														<h3>$123.456</h3>
													</div>
												</div>
												<div class="col expense-wrapper">
													<div class="expense-img">
														<img src="{{ asset('frontend/images/icon-up.png') }}" width="23" height="25" alt="icon" />
													</div>
													<div class="item-detail">
														<label>Expense</label>
														<h3>$123.456</h3>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button class="btn btn-red btn-wide" data-toggle="modal" data-target="#withdraw-overlay">
														Withdraw
													</button>
												</div>
											</div>
											<div class="table-scrollx">
												<table width="100%" class="table-default">
													<thead class="border-bottom">
														<tr>
															<th colspan="2" style="width: 30%">Bank Account</th>
															<th style="width: 25%">Bank Number</th>
															<th style="width: 25%">Account Name</th>
															<th class="text-right" style="width: 20%">
																<button class="btn btn-red btn-wide" id="add-account" data-toggle="modal" data-target="#add-account-overlay">Add Account <i class="fa fa-plus"></i></button></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1.</td>
															<td>DBS Bank</td>
															<td>************2312</td>
															<td>Claeret Xiao</td>
															<td class="text-right"><a href="javascript:void(0)" class="red text-decoration-underline" data-toggle="modal" data-target="#edit-account-overlay">Edit</a></td>
														</tr>
														<tr>
															<td>2.</td>
															<td>Bank Central Asia (BCA)</td>
															<td>************2312</td>
															<td>Claeret Xiao</td>
															<td class="text-right"><a href="javascript:void(0)" class="red text-decoration-underline" data-toggle="modal" data-target="#edit-account-overlay">Edit</a></td>
														</tr>
														<tr>
															<td>3.</td>
															<td>Bank of Singapore</td>
															<td>************2312</td>
															<td>Claeret Xiao</td>
															<td class="text-right"><a href="javascript:void(0)" class="red text-decoration-underline" data-toggle="modal" data-target="#edit-account-overlay">Edit</a></td>
														</tr>
														<tr>
															<td>4.</td>
															<td>DBS Bank</td>
															<td>************2312</td>
															<td>Claeret Xiao</td>
															<td class="text-right"><a href="javascript:void(0)" class="red text-decoration-underline" data-toggle="modal" data-target="#edit-account-overlay">Edit</a></td>
														</tr>
														<tr>
															<td>5.</td>
															<td>Bank Central Asia (BCA)</td>
															<td>************2312</td>
															<td>Claeret Xiao</td>
															<td class="text-right"><a href="javascript:void(0)" class="red text-decoration-underline" data-toggle="modal" data-target="#edit-account-overlay">Edit</a></td>
														</tr>
														<tr>
															<td>6.</td>
															<td>Bank of Singapore</td>
															<td>************2312</td>
															<td>Claeret Xiao</td>
															<td class="text-right"><a href="#" class="red text-decoration-underline">Edit</a></td>
														</tr>
													</tbody>

												</table>
											</div>
										</div>
									</div>
									<div class="filter-content" id="transaction-history">
										<div class="row">
											<div class="col-md-6">
												<div class="data__table_filter"><!-- Search filter -->
													<div class="form-filter">
														<input type="text" id="search-input" placeholder="Search class, date, transaction id...">
														<div class="search-icon"></div>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="dropdown text-right dropdown-style-1" id="sortby-id"><!-- Dropdown filter -->
													<a class="dropdown-toggle" href="#" role="button" id="sortby-payment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Sort by
													</a>
													<div class="dropdown-menu" aria-labelledby="sortby-payment">
														<a class="dropdown-item" href="javascript:void(0)" onclick="
														sort(0,'desc')">Newest</a>
														<a class="dropdown-item" href="javascript:void(0)" onclick="sort(0,'asc')">Oldest</a>
													</div>
												</div>
											</div>
										</div><!-- End row -->
										<hr>
										<div class="table-border">
											<table id="datafilter__payment" class="display"  style="width:100%"><!-- Start DataTable -->
												<thead>
													<tr>
														<th>#ID</th>
														<th class="date-th">Date</th>
														<th>Status</th>
														<th>Customer</th>
														<th>Purchased Item</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#1234</td>
														<td>07/07/2021</td>
														<td>
															<span class="refunded">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="6.5" cy="6.5" r="6" stroke="#1E80DB"/><path d="M5.68299 8.99891C7.92396 8.9989 12.4059 4.38329 4.5625 4.84496" stroke="#1E80DB"/><path d="M7.36146 3L4 4.8462L6.80121 6.23085" stroke="#1E80DB"/></svg>
																Refunded
															</span>
															</td>
														<td>Claeret Xiao</td>
														<td><a href="#">Art & Craft - Pre-School</a></td>
														<td>$90.00</td>
													</tr>
													<tr>
														<td>#1235</td>
														<td>07/07/2021</td>
														<td>
															<span class="paid">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6.07143L5.95652 8L9 5" stroke="#1EDB30" stroke-width="1.2"/><circle cx="6.5" cy="6.5" r="5.9" stroke="#1EDB30" stroke-width="1.2"/></svg>
																Paid
															</span>
															</td>
														<td>Indra Greduard</td>
														<td><a href="#">Art & Craft - Pre-School</a></td>
														<td>$66.00</td>
													</tr>
													<tr>
														<td>#1236</td>
														<td>07/07/2021</td>
														<td>
															<span class="canceled">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M4.63854 8.38445L8.99859 4.34255" stroke="#FF3840" stroke-width="1.2"/>
																<path d="M8.71165 8.68654L4.66392 4.31346" stroke="#FF3840" stroke-width="1.2"/>
																<circle cx="6.5" cy="6.5" r="5.9" stroke="#FF3840" stroke-width="1.2"/></svg>
																Canceled
															</span>
														</td>
														<td>Claeret Xiao</td>
														<td><a href="">Art & Craft - Pre-School</a></td>
														<td>$77.00</td>
													</tr>
													<tr>
														<td>#1237</td>
														<td>08/07/2021</td>
														<td>
															<span class="refunded">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="6.5" cy="6.5" r="6" stroke="#1E80DB"/><path d="M5.68299 8.99891C7.92396 8.9989 12.4059 4.38329 4.5625 4.84496" stroke="#1E80DB"/><path d="M7.36146 3L4 4.8462L6.80121 6.23085" stroke="#1E80DB"/></svg>
																Refunded
															</span>
															</td>
														<td>Claeret Xiao</td>
														<td><a href="#">Art & Craft - Pre-School</a></td>
														<td>$90.00</td>
													</tr>
													<tr>
														<td>#1238</td>
														<td>08/07/2021</td>
														<td>
															<span class="paid">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6.07143L5.95652 8L9 5" stroke="#1EDB30" stroke-width="1.2"/><circle cx="6.5" cy="6.5" r="5.9" stroke="#1EDB30" stroke-width="1.2"/></svg>
																Paid
															</span>
															</td>
														<td>Aye Mon</td>
														<td><a href="#">Drawing</a></td>
														<td>$66.00</td>
													</tr>
													<tr>
														<td>#1239</td>
														<td>09/07/2021</td>
														<td>
															<span class="canceled">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M4.63854 8.38445L8.99859 4.34255" stroke="#FF3840" stroke-width="1.2"/>
																<path d="M8.71165 8.68654L4.66392 4.31346" stroke="#FF3840" stroke-width="1.2"/>
																<circle cx="6.5" cy="6.5" r="5.9" stroke="#FF3840" stroke-width="1.2"/></svg>
																Canceled
															</span>
														</td>
														<td>Claeret Xiao</td>
														<td><a href="">Art & Craft - Pre-School</a></td>
														<td>$65.00</td>
													</tr>
													<tr>
														<td>#1240</td>
														<td>10/07/2021</td>
														<td>
															<span class="refunded">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="6.5" cy="6.5" r="6" stroke="#1E80DB"/><path d="M5.68299 8.99891C7.92396 8.9989 12.4059 4.38329 4.5625 4.84496" stroke="#1E80DB"/><path d="M7.36146 3L4 4.8462L6.80121 6.23085" stroke="#1E80DB"/></svg>
																Refunded
															</span>
															</td>
														<td>Claeret Xiao</td>
														<td><a href="#">Art & Craft - Pre-School</a></td>
														<td>$90.00</td>
													</tr>
													<tr>
														<td>#1241</td>
														<td>11/07/2021</td>
														<td>
															<span class="paid">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6.07143L5.95652 8L9 5" stroke="#1EDB30" stroke-width="1.2"/><circle cx="6.5" cy="6.5" r="5.9" stroke="#1EDB30" stroke-width="1.2"/></svg>
																Paid
															</span>
															</td>
														<td>Aye Mon</td>
														<td><a href="#">Drawing</a></td>
														<td>$66.00</td>
													</tr>
													<tr>
														<td>#1242</td>
														<td>11/07/2021</td>
														<td>
															<span class="canceled">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M4.63854 8.38445L8.99859 4.34255" stroke="#FF3840" stroke-width="1.2"/>
																<path d="M8.71165 8.68654L4.66392 4.31346" stroke="#FF3840" stroke-width="1.2"/>
																<circle cx="6.5" cy="6.5" r="5.9" stroke="#FF3840" stroke-width="1.2"/></svg>
																Canceled
															</span>
														</td>
														<td>Claeret Xiao</td>
														<td><a href="">Art & Craft - Pre-School</a></td>
														<td>$65.00</td>
													</tr>
													<tr>
														<td>#1243</td>
														<td>11/07/2021</td>
														<td>
															<span class="canceled">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M4.63854 8.38445L8.99859 4.34255" stroke="#FF3840" stroke-width="1.2"/>
																<path d="M8.71165 8.68654L4.66392 4.31346" stroke="#FF3840" stroke-width="1.2"/>
																<circle cx="6.5" cy="6.5" r="5.9" stroke="#FF3840" stroke-width="1.2"/></svg>
																Canceled
															</span>
														</td>
														<td>Claeret Xiao</td>
														<td><a href="">Art & Craft - Pre-School</a></td>
														<td>$65.00</td>
													</tr>
													<tr>
														<td>#1244</td>
														<td>11/07/2021</td>
														<td>
															<span class="refunded">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="6.5" cy="6.5" r="6" stroke="#1E80DB"/><path d="M5.68299 8.99891C7.92396 8.9989 12.4059 4.38329 4.5625 4.84496" stroke="#1E80DB"/><path d="M7.36146 3L4 4.8462L6.80121 6.23085" stroke="#1E80DB"/></svg>
																Refunded
															</span>
															</td>
														<td>Claeret Xiao</td>
														<td><a href="#">Art & Craft - Pre-School</a></td>
														<td>$90.00</td>
													</tr>
													<tr>
														<td>#1245</td>
														<td>11/07/2021</td>
														<td>
															<span class="paid">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6.07143L5.95652 8L9 5" stroke="#1EDB30" stroke-width="1.2"/><circle cx="6.5" cy="6.5" r="5.9" stroke="#1EDB30" stroke-width="1.2"/></svg>
																Paid
															</span>
															</td>
														<td>Aye Mon</td>
														<td><a href="#">Drawing</a></td>
														<td>$66.00</td>
													</tr>
													<tr>
														<td>#1246</td>
														<td>11/07/2021</td>
														<td>
															<span class="canceled">
																<svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M4.63854 8.38445L8.99859 4.34255" stroke="#FF3840" stroke-width="1.2"/>
																<path d="M8.71165 8.68654L4.66392 4.31346" stroke="#FF3840" stroke-width="1.2"/>
																<circle cx="6.5" cy="6.5" r="5.9" stroke="#FF3840" stroke-width="1.2"/></svg>
																Canceled
															</span>
														</td>
														<td>Claeret Xiao</td>
														<td><a href="">Art & Craft - Pre-School</a></td>
														<td>$65.00</td>
													</tr>
												</tbody>
											</table><!-- End DataTable -->
										</div><!-- End table border -->
									</div><!-- End Filter transation history content -->
								</div>
							</div><!-- End row -->
						</div>
						<!-- End tab pane -->


					</div><!-- End tab content -->

				</div><!-- End row -->


			</div><!-- End col -->
		</div><!-- End row -->
	</div><!-- End container -->
</section><!-- End section -->

{{-- Overlay files --}}
@include('frontend.teacher.includes.overlay')

<!-- End dashboard -->
@endsection

{{-- Additional scripts for this specific page --}}
@section('scripts')
<script type="text/javascript" src="{{ asset('frontend/js/vendor/jquery.timepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/vendor/dataTables.dateTime.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/class-filter.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/custom-filter-dashboard.js') }}"></script>
@endsection
