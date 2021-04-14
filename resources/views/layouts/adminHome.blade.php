@extends('layouts.admin')

@push('css')
<style>
	.ruang-a {
		position: absolute;
		top: 700px;
		left: 145px;
	}
	.map-1 .ruang-b {
		position: absolute;
		top: 11px;
		left: 48px;
	}

	.map-1 .ruang-c {
		position: absolute;
		top: 135px;
		left: 260px;
	}

	.ruang-d {
		position: absolute;
		top: 732px;
		left: 420px;
	}

	.ruang-e {
		position: absolute;
		top: 272px;
		left: 932px;
	}

	.ruang-f {
		position: absolute;
		top: 136px;
		left: 396px;
	}

	.map-1 .ruang-g {
		position: absolute;
		top: 196px;
		left: 1197px;
	}

	.map-1 .ruang-h {
		position: absolute;
		top: 863px;
		left: 453px;
	}

	.map-2 .ruang-b {
		position: absolute;
		top: 280px;
		left: 48px;
	}

	.map-2 .ruang-c {
		position: absolute;
		top: 135px;
		left: 260px;
	}

	.map-2 .ruang-g {
		position: absolute;
		top: 508px;
		left: 1197px;
	}

	.map-2 .ict {
		position: absolute;
		top: 950px;
		left: 270px;
	}
	
	.lapang {
		position: absolute;
		top: 265px;
		left: 400px;
	}

	.lapang .btn {
		background-color: orange;
	}

	.lobby {
		position: absolute;
		top: 960px;
		left: 300px;
	}

	.eskul {
		position: absolute;
		top: 732px;
		left: 1197px;
	}

	.btn-room {
		text-decoration: none;
		text-align: center;
		background-color: #7b7ff6;
		color: #f0f0f0;
		font-weight: 500;
		border-radius: 0;
	}

	.btn-room:hover {
		opacity: 0.8;
		color: white;
	}
	.lantai-act {
		display: none;
	}

	.modal-backdrop {
		background-color: transparent;
	}

    /* Edit */
    .img-maps {
        margin-left: -20px;
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
