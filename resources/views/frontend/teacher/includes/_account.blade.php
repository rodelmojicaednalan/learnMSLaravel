<!-- Paymet Section -->
<!-- Modal Add Account -->
<div class="modal fade" id="add-account-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Add Account</h2>
				</div>
			</div>
			<div class="modal-body nicescroll">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="add-bank">Bank</label>
							<select id="add-bank" class="selectmenu">
								<option>Bank</option>
								<option>DBS Bank</option>
								<option>Bank Central Asia</option>
								<option>Bank of Singapore</option>
							</select>
						</div>
						<div class="form-group">
							<label for="add-bank-number">Bank Number</label>
							<input type="text" name="" id="bank-number" class="form-control" placeholder="Type number">
						</div>
						<div class="form-group">
							<label for="add-account-name">Account Name</label>
							<input type="text" name="" id="account-name" class="form-control" placeholder="Type name">
						</div>
						<div class="form-group mt-75">
							<button class="btn btn-red btn-full" id="" data-toggle="modal" data-target="" data-dismiss="modal">Save</button>
							<div class="text-center delete-bank-wrapper">
								<a href="#" class="delete-bank">Delete bank</a>
							</div>
                      	</div>


					</div>
				</div>

			</div>

		</div>
	</div>
</div>

<!-- Modal Edit Account -->
<div class="modal fade" id="edit-account-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Edit Account</h2>
				</div>
			</div>
			<div class="modal-body nicescroll">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="edit-bank">Bank</label>
							<select id="edit-bank" class="selectmenu">
								<option>Bank</option>
								<option selected="">DBS Bank</option>
								<option>Bank Central Asia</option>
								<option>Bank of Singapore</option>
							</select>
						</div>
						<div class="form-group">
							<label for="edit-bank-number">Bank Number</label>
							<input type="text" name="" id="edit-bank-number" class="form-control" placeholder="Type number" value="************2312">
						</div>
						<div class="form-group">
							<label for="edit-account-name">Account Name</label>
							<input type="text" name="" id="edit-account-name" class="form-control" placeholder="Type name" value="Claeret Xiao">
						</div>
						<div class="form-group mt-75">
							<button class="btn btn-red btn-full" id="" data-toggle="modal" data-target="" data-dismiss="modal">Save</button>
							<div class="text-center delete-bank-wrapper">
								<a href="#" class="delete-bank">Delete bank</a>
							</div>
                      	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Withdraw Account -->
<div class="modal fade" id="withdraw-overlay" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<a href="javascript:void(0);" class="back" data-toggle="modal"
					data-dismiss="modal"><img src="{{ asset('frontend/images/icon-back.png') }}" alt="icon" /></a>
					<h2 class="modal-title">Withdrawal</h2>
				</div>
			</div>
			<div class="modal-body nicescroll">
				<div class="row amount-wrapper">
					<div class="form-group col-md-6 col-xs-6 col-sm-12">
						<label for="amount">Amount</label>
						<div class="price-input-group">
							<span class="prefix red">$</span>
							<input class="form-control red" id="amount" name="" type="number" placeholder="" value ="" onkeydown="return event.keyCode !== 69" value="12.52">
						</div>
					</div>
					<div class="btn-wrapper col-md-6 col-xs-6 col-sm-12">
						<button class="btn btn-red ml-0" data-value="10">$10</button>
						<button class="btn btn-red" data-value="100">$100</button>
						<button class="btn btn-red" data-value="200">$200</button>
						<button class="btn btn-red" data-value="300">$300</button>
					</div>
				</div>
				<div class="form-group select-bank-account">
					<small>Please select your bank account:</small>
					<table class="table-default">
						<thead class="border-bottom">
							<tr>
								<th>Bank Name</th>
								<th>Bank Number</th>
								<th class="text-right">Account Name</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="pretty p-default p-round">
										<input type="radio" id="" value="" name="bank">
										<div class="state"><i class="icon icon-check"></i>
											<label class="checkbox-label">DBS Bank</label>
										</div>
									</div>
								</td>
								<td>
									123-4-5678
								</td>
								<td class="text-right">Claeret Xiao</td>
							</tr>
							<tr>
								<td>
									<div class="pretty p-default p-round">
										<input type="radio" id="" value="" name="bank">
										<div class="state"><i class="icon icon-check"></i>
											<label class="checkbox-label">Bank Central Asia</label>
										</div>
									</div>
								</td>
								<td>
									123-4-5678
								</td>
								<td class="text-right">Claeret Xiao</td>
							</tr>
							<tr>
								<td>
									<div class="pretty p-default p-round">
										<input type="radio" id="" value="" name="bank">
										<div class="state"><i class="icon icon-check"></i>
											<label class="checkbox-label">Bank of Singapore</label>
										</div>
									</div>
								</td>
								<td>
									123-4-5678
								</td>
								<td class="text-right">Claeret Xiao</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="text-center btn-wrapper">
					<button class="btn btn-red btn-full" data-toggle="modal" data-dismiss="modal" data-target="#verification-account-overlay">Continue</button>
				</div>
			</div>
		</div>
	</div>
</div>
