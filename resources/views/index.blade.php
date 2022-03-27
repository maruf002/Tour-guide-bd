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

.img{
    border-radius: 15px;
    margin-bottom:20px;
}

.t{
    height: 80px;
}

.jj{
    margin-left: 60px;
    margin-bottom: 20px;
}
hr{
   background-color: rgb(29, 221, 164);
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
					<img src="{{asset('storage/sliders/' . 'one.jpg')}}" class="d-block w-100" alt="..."style="height: 300px" >
				</div>
				<div class="carousel-item">
					<img src="{{asset('storage/sliders/' . 'two.jpg')}}" class="d-block w-100" alt="..." style="height: 300px">
				</div>
				<div class="carousel-item">
					<img src="{{asset('storage/sliders/' . 'three.jpg')}}" class="d-block w-100" alt="..." style="height: 300px">
				</div>
				<div class="carousel-item">
					<img src="{{asset('storage/sliders/' . 'four.jpg')}}" class="d-block w-100" alt="..." style="height: 300px">
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

<div class="container">
	<div class="accordion-item mt-5">
		<h2 class="accordion-header" id="headingOne">
		  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			<h3><span class="badge bg-secondary">Recently Added  Places</span></h3>
		  </button>
		</h2>
		<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		  <div class="accordion-body">
		
			<div class="row">
				@foreach($place as $key => $pl)
		
					 <div class="col-md-4 mt-5">
						 
						<div class="card flex-md-row mb-4 shadow-sm h-md-250" style="height:200px">
		
				  
						   <div class="card-body d-flex flex-column align-items-start">
							  <strong class="d-inline-block mb-2 text-primary">{{$pl->title}}</strong>
							  <h6 class="mb-0">
		
								<span class="badge badge-warning">Author Name: </span> {{$pl->user->name}}
							   
								  
							  </h6>
		
							 
							  <div class="mb-1 text-muted small"> {{$pl->created_at->diffforhumans()}}</div>
							  <p class="card-text mb-auto">  {{Str::limit(strip_tags($pl->description),15) }} 
							</p>
							  {{-- <a class="btn btn-sm" role="button" href="{{route('place.detailes',$pl->id)}}">Continue reading</a> --}}
							  <button class="btn btn-outline-warning btn-sm" onclick="event.preventDefault(); loadmodal({{$pl->id}})"><h1 class="badge badge-pill badge-info">Click to view</h1></button>
						   </div>
						   <img class="crd-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{asset('storage/post/'.$pl->image)}}" style="width: 100px; height: 100px;">
					 
						
						</div>
				
					 </div>
		
				
					
			
				@endforeach
			</a> 
			</div>
		  </div>
		</div>
	  </div>
  
	
</div>
<div id="modal_container"></div>
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

	function loadmodal(id){
		// alert('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('place-modal-details') }}",
                data: {id:id},
                dataType: 'html',
                success: function(data) {
                    $('#modal_container').html(data);
                    $('#modal_container .modal ').modal('show');
                }
            });
        }
</script>
@endpush
@endsection