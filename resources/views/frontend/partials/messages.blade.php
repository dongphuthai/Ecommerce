@if ( Session::has('success') )
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="alert alert-success alert-dismissible" role="alert">
					<strong>{{ Session::get('success') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
			</div>
		</div>
	</div>
@endif

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="alert alert-danger alert-dismissible" role="alert">
					<strong>{{ Session::get('error') }}</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
				</div>
			</div>
		</div>
	</div>
@endif