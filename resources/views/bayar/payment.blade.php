@extends('layout.main')
@section('content')
<a href="{{url('/pesanan/anda')}}" class="btn btn-danger">Kembali</a>
<div class="card mt-3">
	<div class="card-header">
		Bayar Dengan Payment
	</div>
	<div class="table-responsive">
		<div class="card-body">
			<div class="row">


				<div class="col-md-6 mb-4">
					<button class="btn btn-primary" id="pay-button">Pay!</button>
				</div>


				
				<!--<div class="col-md-6 mb-4">
					<img src="{{url('template/img/pay.png')}}" class="rounded mx-auto d-block" alt="..." style="max-width: 400px; margin-top: -100px;">
				</div>-->
			</div>


			<form action="{{url('/payment/getwey/'.$data->id)}}" id="payment-form" method="POST">
				@csrf
				<input type="hidden" name="status_transaksi" value="2">
				<input type="hidden" name="json" id="json_callback" value="">
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">
	var payButton = document.getElementById('pay-button');
	payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
		window.snap.pay('{{$snapToken}}', {
			onSuccess: function(result){
				send_response_to_form(result)
				alert("payment success!"); console.log(result);
			},
			onPending: function(result){
				send_response_to_form(result)
				alert("wating your payment!"); console.log(result);
			},
			onError: function(result){
				send_response_to_form(result)
				alert("payment failed!"); console.log(result);
			},
			onClose: function(){
				send_response_to_form(result)
				alert('you closed the popup without finishing the payment');
			}
		})
	});
	function send_response_to_form(result){
		document.getElementById('json_callback').value = JSON.stringify(result);
		$('#payment-form').submit();
	}
</script>
@endsection