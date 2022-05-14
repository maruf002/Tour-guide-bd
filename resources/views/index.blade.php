@extends('frontend.app')

@push('css')

<style>

body{
	/* background-image: url("storage/img/background.png"); */
}
	
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



body,html{
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    /* background: #cbf5f2f5 !important; */
    }

    .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #fbe411;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: rgb(234, 45, 108);
    border: 0;
    outline: 0;
    background: none;
    width: 350px;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 550px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    text-decoration:none;
    }

	.aboutus-title {
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    margin: 0 0 19px;
    padding: 0 0 8px;
    position: relative;
    text-transform: uppercase;
    color: #000;
}
.aboutus-title::after {
    background: #fdb801 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 2px;
    left: 0;
    position: absolute;
    width: 54px;
}
.aboutus-text {
    color: #606060;
    font-size: 10px;
    line-height: 22px;
    /* margin: 0 0 35px; */
}

.card-footer{
	width: 305px;
	margin-left: 50px;

}

</style>
	
@endpush

@section('content')


<div class="container">
	<div class="container">
		<div class="row pt-1 pb-1 mb-4">
			<div class="col-lg-12">
			
			     <h2 class="text-center">See The Unseen Banladesh</h2>
				 <div class="container h-100 " >
					<div class="d-flex justify-content-center h-100">
					  <div class="searchbar">
						<input class="search_input" id="input" type="text" name="name" placeholder="দর্শনীয় স্থানের নাম অনুসন্ধান করুন...">
						<a href="#" class="search_icon btn btn-info" id="search"><i class="fas fa-search"></i></a>
						
						{{-- <a hidden href="#" class="search_icon btn btn-info" id="search"><i class="fas fa-search"></i></a> --}}
						
					  </div>
					  <div id="clear" style="margin-top: 35px"></div>
					</div>
				  </div>
				
			</div>
	</div>

	<div id="timelineDiv"></div>
	<section>
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="{{asset('storage/sliders/' . 'one.jpg')}}" class="d-block w-100" alt="..."style="height: 500px" >
				</div>
				<div class="carousel-item">
					<img src="{{asset('storage/sliders/' . 'two.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
				</div>
				<div class="carousel-item">
					<img src="{{asset('storage/sliders/' . 'three.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
				</div>
				<div class="carousel-item">
					<img src="{{asset('storage/sliders/' . 'four.jpg')}}" class="d-block w-100" alt="..." style="height: 500px">
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
			<form action="{{route('search')}}"  method="get" novalidate="novalidate">
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
								<button type="submit" class="btn btn-danger wrn-btn">অনুসন্ধান</button>
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
			<h3><span class="badge bg-secondary"> সর্বশেষ সংযোজন</span></h3>
		  </button>
		</h2>
		<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
		  <div class="accordion-body">
		
			<div class="row">
				@foreach($place as $key => $pl)
		
					 <div class="col-md-4 mt-5">
						 
						<div class="card flex-md-row mb-4 shadow-sm h-md-250 border border-warning" style="height:200px">
		
				  
						   <div class="card-body d-flex flex-column align-items-start">
							  <strong class="d-inline-block mb-2 text-primary">{{Str::limit($pl->title,18)}}</strong>
							  <h6 class="mb-0">
		
								<span class="badge badge-warning">Author Name: </span> {{$pl->user->name}}
							   
								  
							  </h6>
		
							 
							  <div class="mb-1 text-muted small"> {{$pl->created_at->diffforhumans()}}</div>
							  <p class="card-text mb-auto">  {{Str::limit(strip_tags($pl->description),15) }} 
							</p>
							  {{-- <a class="btn btn-sm" role="button" href="{{route('place.detailes',$pl->id)}}">Continue reading</a> --}}
							  <button class="btn btn-outline-warning btn-sm" onclick="event.preventDefault(); loadmodal({{$pl->id}})"><h1 class="badge badge-pill badge-info"> বিস্তারিত জানুন </h1></button>
						   </div>
						   <img class="crd-img-right flex-auto d-none d-lg-block rounded-circle" alt="Thumbnail [200x250]" src="{{asset('storage/post/'.$pl->image)}}" style="width: 100px; height: 100px; padding:5px;">
					 
						
						</div>
				
					 </div>	
			
				@endforeach
			</a> 
			</div>
		  </div>
		</div>
	  </div>
  
	
</div>

<div class="container">
	<div class="about-us mt-3">
		<h2 class="aboutus-title">আমাদের সম্পর্কে জানুন</h2>
	</div>
	<div class="card-deck">
		<div class="card">
		  <img src="{{asset('storage/profile/' . 'pranto.jpeg')}}" class="card-img-top" alt="..." style="height: 250px;width:300px;margin-left:50px">
		  <div class="card-body" style="margin-left:60px">
			<h5 class="card-title">আদনান রহমান প্রান্ত</h5>
			<p class="card-text badge badge-success badge-pill" style="font-size: 12px;font-weight:900;color:white">prantorahaman99@gmail.com</p>
		  </div>
		  <div class="card-footer">
			<small class="text-muted" style="margin-left: 60px">Department of CSE</small>
		  </div>
		</div>
		<div class="card">
		  <img src="{{asset('storage/profile/' . 'tahsan.jpeg')}}" class="card-img-top" style="height: 250px;width:300px;margin-left:50px" alt="...">
		  
		    <div class="card-body" style="margin-left: 60px">
				<h5 class="card-title">তাহসান হোসেন</h5>
				<p class="card-text badge badge-success badge-pill" style="font-size: 12px;font-weight:900;color:white">tahsan15-2175@diu.edu.bd</p>
			  </div>

			  <div class="card-footer">
				<small class="text-muted" style="margin-left: 60px">Department of CSE</small>
			  </div>
	
		</div>
		<div class="card">
		  <img src="{{asset('storage/profile/' . 'emon.jpeg')}}" class="card-img-top" style="height: 250px;width:300px;margin-left:50px" alt="...">
		  <div class="card-body" style="margin-left: 60px">
			<h5 class="card-title">ইমন মিনা</h5>
			<p class="card-text badge badge-success badge-pill" style="font-size: 12px;font-weight:900;color:white">emon15-2175@diu.edu.bd</p>
		  </div>
		  <div class="card-footer">
			<small class="text-muted" style="margin-left: 60px">Department of CSE</small>
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

		$("#search").click(function(){
			var name = $("#input").val();
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				type: "POST",
				url: '{{ route('livesearch') }}',
				data:{'search':name},
				// dataType: "html",
				success: function(html) {
					$("#clear").empty();
					$('#timelineDiv').empty().html(html);
					$('#clear').append('<a href="#" class="search_icon btn btn-danger" id="search_clear"><i class="fas fa-x"></i></a>');
					$("#search_clear").click(function(){
						$('.search_live').hide();
						$('#search_clear').hide();
					});
						
				}
			});

	});

	// $("#search_clear").click(function(){
			
	// 	console.log('h');
		

	// });



</script>
@endpush
@endsection