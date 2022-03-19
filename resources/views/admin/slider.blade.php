@section('title', 'Image Slider')
@extends('layouts.admin_master')

@section('admin')
<!-- Display error message when not created -->
    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Opps! Something went wrong</strong></p>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <!-- dashboard inner -->
      <div class="midde_cont">
                  <div class="container-fluid">
                        <div class="row column_title">
                           <div class="col-md-12">
                              <div class="page_title">
                                 <h2>Manage Image Slider</h2>
                              </div>
                           </div>
                        </div>

                        @if(Session::has('message'))
                           <div class="alert alert-success {{Session::get('alert-class', 'alert-success')}} alert-dismissible fade show">
                              {{Session::get('message') }}

                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hiddden="true">&times;</span>
                              </button>

                           </div>
                        @endif

                        <div class="col-md-12">
                              <div class="white_shd full margin_bottom_30">
                                 <div class="full graph_head">                          
                                    <button class="btn btn-primary  btn-md float-right" type="button" data-toggle="modal" data-target="#gallery">Create Slider</button>
                                    
                                 </div>

                                 <div class="table_section padding_infor_info">
                                             <div class="table-responsive-sm">
                                                <table class="table">
                                                   <thead>
                                                      <tr>
                                                         <th>S/N</th>
                                                         <th>Post By</th>
                                                         <th>Title</th>
                                                         <th>Description</th>
                                                         <th>Slider</th>
                                                         <th>Date Created</th>
                                                         <th colspan="2">Action</th>  
                                                      </tr>
                                                   </thead>                                       
                                                    <tbody>
                                                        @foreach($sliders as $slider)
                                                        <tr>
                                                            <td>{{$loop->index +1}}</td>
                                                            <td>{{$slider->user->name}}</td>
                                                            <td>{{$slider->title}}</td>
                                                            <td>{{$slider->description}}</td>
                                                            <td><img src="{{asset($slider->image)}}"height="50px" width="70px" alt=""></td>
                                                            <td>{{$slider->created_at->isoFormat('D MM Y')}}</td>
                                                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#slider{{$slider->id}}">Edit</a></td>
                                                            <td>
                                                               <form action="{{route('del.slide', ['id'=> $slider->id])}}" method="post">
                                                                  @csrf
                                                                  {{method_field('DELETE')}}
                                                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                                               </form>
                                                            </td>
                                                        </tr>
                                                      
            <!-- model popup begins here -->
        <!-- The Modal helps to edit slider image-->
        <div class="modal fade" id="slider{{$slider->id}}">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Edit Slide Image</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">                   
                    <form action="{{route('update.slider', ['id'=>$slider->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="input-group mb-3">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Title</span>
                              </div>  
                             <input type="text" name="title" value="{{$slider->title}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>                             
                           </div>

                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Description</span>
                              </div>
                              <input type="text" name="description" value="{{$slider->description}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Image</span>
                              </div>
                              <input type="file" name="image" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           <div class="input-group mb-3">
                               <img src="{{asset($slider->image)}}" width="80" height="60" alt="">
                           </div>
                           
                        </div>                     
                         <!-- Modal footer -->
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-info" >Save Image</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                        </div> 
                    </form> 
                  
                  </div>            
               </div>
             </div>
        </div>        
   
         <!-- end model popup -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                             </div>
                                 </div>
                              </div>
                        </div>
                  </div>
      </div>

    <!-- model popup begins here -->
        <!-- The Modal For Gallery Creation-->
        <div class="modal fade" id="gallery">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Add Slide Image</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">                   
                    <form action="{{route('save.slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="input-group mb-3">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Title</span>
                              </div>  
                             <input type="text" name="title" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>                             
                           </div>

                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Description</span>
                              </div>
                              <input type="text" name="description" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Image</span>
                              </div>
                              <input type="file" name="image" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           
                        </div>                     
                         <!-- Modal footer -->
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-info" >Save Image</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                        </div> 
                    </form> 
                  
                  </div>            
               </div>
             </div>
        </div>        
   
         <!-- end model popup -->
         
          

   

@endsection