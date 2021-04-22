@extends('layouts.admin')
@section('title', 'Denah Sekolah')
@section('maps', 'active')

@push('css')
<style type="text/css">
.img-maps {
    margin-top: -20px;
    margin-left: -5px;
}
.section-header {
    overflow: auto;
}
</style>
@endpush

@section('content')
    @include('index')
@endsection

@push('js')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('.btn-room').click(function(e) {
			console.log($(this).attr('data-id'));
			var ruanganid = $(this).attr('data-id')
			// console.log($(this).attr('data-id'));
			// let id = $(this).attr('data-id')
            // alert("hiii");
			$.ajax({
				url: `/room/${ruanganid}/show`,
				method: "GET",
				success: function(data){
					console.log(data)
					$('#modalroom').find('.modal-body').html(data);
					//$('#modalroom').html(Response);
					$('#modalroom').modal('show');
				},
				error:function (error) {
					console.log(error)
				}
			})
        });
    });
</script>
