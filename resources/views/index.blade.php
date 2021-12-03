@extends('frontend.app')

@push('css')

<style>
	/*search box css start here*/
.search-sec{
    padding: 2rem;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}

.title h1{
	color: red
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
        /* top: -114px; */
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}
</style>
	
@endpush

@section('content')


<div class="container">
	<div class="container">
		<div class="row pt-1 pb-1">
			<div class="col-lg-12">
			
			     <h2 class="text-center">See The Unseen Banladesh</h2>
				{{-- <h6 class="text-center">awesome responsive image slider with a search bar</h6>  --}}
		</div>
	</div>
	<section>
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="https://pbs.twimg.com/media/EGHYvttU4AAYKb7?format=jpg&name=large" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="https://pbs.twimg.com/media/EGHYvtkUcAAuc8T?format=jpg&name=large" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item">
					<img src="https://pbs.twimg.com/media/EGHYvtjU0AAO8w1?format=jpg&name=large" class="d-block w-100" alt="...">
				</div>
				<!--https://upload.wikimedia.org/wikipedia/commons/8/8d/Yarra_Night_Panorama%2C_Melbourne_-_Feb_2005.jpg-->
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		
	</section>
	<br><br><br>

	<section class="search-sec">
	
		<div class="container">
			<form action="{{route('search')}}" method="get" novalidate="novalidate">
				<div class="row">
					<div class="col-lg-8 offset-3">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 p-0">
								<select name="Division" class="form-control search-slt" id="exampleFormControlSelect1">
									<option>বিভাগ বাছাই করুন</option>
									@foreach ($divisions as $div)
									<option value="{{$div->id}}">{{$div->bn_name}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 p-0">
								<select name="District" class="form-control search-slt" id="exampleFormControlSelect1">
									<option>জেলা বাছাই করুন
									</option>
								
								</select>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 p-0">
								<button type="submit" class="btn btn-danger wrn-btn">Search</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	
</div>

@push('js')
<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="Division"]').on('change', function() {
		
			var DivisionId = $(this).val();
			if(DivisionId) {
				$.ajax({
					url: '/myform/ajax/'+DivisionId,
					type: "GET",
					dataType: "json",
					success:function(data){
						console.log(data);
						$('select[name="District"]').empty();
						$.each(data, function(key, value) {
							// $('select[name="District"]').append('<option value="'+ value +'">'+ value +'</option>'); // if we need only value
							$('select[name="District"]').append('<option value="'+ key +'">'+ value +'</option>');
						});
					}
				});
			}else{
				$('select[name="District"]').empty();
			}
		});
	});
</script>
@endpush
@endsection