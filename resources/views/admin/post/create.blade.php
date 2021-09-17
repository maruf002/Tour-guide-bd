@extends('backend.app')

@section('title', 'Tag')


@push('css')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
@endpush


@section('content')
<div class="container-fluid">
<form action="{{route('admin.post.store')}}" method="Post" enctype="multipart/form-data"> 
    @csrf
{{-- first row  --}}
 <div class="row clearfix">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   Add New Post
                </h2>
          
            </div>
            <div class="body">
           
                    
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="title" class="form-control" name="title">
                            <label class="form-label" >Post Title</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image">
                    </div>
                   

                
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                  অবস্থান বাছাই করুন
                </h2>
                <br>
                <select name="Division" class="form-control search-slt" id="exampleFormControlSelect1">
                    <option>বিভাগ বাছাই করুন</option>
                   @foreach ($divisions as $div) 
                   <option value="{{$div->id}}">{{$div->bn_name}}</option>
                   @endforeach
                </select>
               <br> <br>
                <select name="District" class="form-control search-slt" id="exampleFormControlSelect1">
                    <option>জেলা বাছাই করুন
                    </option>
                
                </select>
            </div>
            <div class="body">
            
              
                  
                {{-- <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.Post.store') }}">BACK</a> --}}
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                
            </div>
        </div>
    </div>
</div>

{{-- body part --}}

 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   Body
                </h2>
          
            </div>
            <div class="body">
           
              <textarea id="tinymce" name="body"></textarea>
                
            </div>
        </div>
    </div>

</div>
</form>
<!-- #END# Vertical Layout -->
</div>
    
@endsection


@push('js')





 <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
 <script>
    $(function () {
  

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 100,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL ='{{asset('assets/backend/plugins/tinymce')}}';
});


</script>  


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