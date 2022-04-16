
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6  mt-3  ">
                <div class="card " style="width: 38rem;">
                 
                    <img class="card-img-top img-thumbnail" src="{{asset('storage/post/'.$place->image)}}" alt="Card image cap">
                    <div class="card-body overflow-auto" style="height:400px">
                      <h5 class="card-title">   <span class="badge badge-warning">Author Name: </span> {{$place->user->name}}</h5>
                      
                      <div class="mb-1 text-muted small"> {{$place->created_at->diffforhumans()}}</div>
                      <h5 class="card-title badge badge-pill badge-info">{{$place->title}}</h5>
                      <p class="card-text overflow-auto">{!! $place->description !!}</p>
                 
                    </div>
                  </div>
        
                  <div class="card mt-5 " style="width: 38rem;">
                  
                    <div class="card-body overflow-auto">
                      যেভাবে যাবেন 
                      <p class="card-title t overflow-auto ">{{$place->going}}  </p> <hr>
                      কোথায় থাকবেন
                      <p class="card-title t overflow-auto">{{$place->stay}}</p><hr>
                      কোথায় খাবেন 
                      <p class="card-title t overflow-auto">  {{$place->eat}}</p><hr>
                     
                 
                    </div>
                  </div>
                  
                  
        
               
            </div>
        
        
            <div class="col-md-4 offset-1  mt-3 ">
                <div class="jj">
            <span class="badge badge-primary"><h3>কিছু দর্শনীয় স্থানের ছবি </h3>  </span> <br>
        
           </div>
                @foreach ($place_image as  $p)
                <img class="img-fluid img" alt="Thumbnail [200x250]" src="{{asset('storage/photos/'.$p->photos)}}" style="width: 300px; height: 300px;">
                @endforeach
                    </div>
        
                
                  
                 </div>
        
        </div>
        <div class="modal_footer ml-auto mr-auto">
          <button type="button" class="btn btn-danger badge badge-pill" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>