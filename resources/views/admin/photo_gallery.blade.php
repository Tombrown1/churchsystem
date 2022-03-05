@section('title', 'Photo Gallery')
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
                                 <h2>Photo Gallery</h2>
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
                                    <button class="btn btn-success dropdown-toggle btn-md float-right" type="button" data-toggle="dropdown" >More Action</button>
                                    <div class="dropdown-menu arrow"> 
                                       <a type="button" class="dropdown-item btn btn-primary " data-toggle="modal" data-target="#gallerycat"> Category                                        
                                       </a>
                                       <a type="button" class="dropdown-item btn btn-primary " data-toggle="modal" data-target="#gallery"> Create Gallery                                      
                                       </a>
                                    </div>
                                 </div>

                                 <div class="table_section padding_infor_info">
                                             <div class="table-responsive-sm">
                                                <table class="table">
                                                   <thead>
                                                      <tr>
                                                         <th>S/N</th>
                                                         <th>Title</th>
                                                         <th>Post By</th>
                                                         <th>Category</th>
                                                         <th>Image</th>
                                                         <th>Date Created</th>
                                                         <th colspan="2">Action</th>                                            
                                                      </tr>
                                                   </thead>                                       
                                                   <tbody>
                                                      @foreach($gallerys as $gallery)
                                                      <tr>
                                                         <td>{{$loop->index +1}}</td>
                                                         <td>{{$gallery->image_name}}</td>
                                                         <td>{{$gallery->user->name}}</td>
                                                         <td>{{App\Models\GalleryCategory::find($gallery->gallery_cat_id)->name}}</td>
                                                         <td><img src="{{asset($gallery->image)}}" height="50px" width="50px" alt=""></td>
                                                         <td>{{$gallery->created_at}}</td>
                                                          <td>
                                                         <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#editgallery{{$gallery->id}}"> Edit </a>
                                                         </td>
                                                         <td><a href="#" class="btn btn-success">View</a></td>
                                                       </tr>

                                                        <!-- The Modal For Edit of Gallery Creation-->
                                                   <div class="modal fade" id="editgallery{{$gallery->id}}">
                                                         <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                               <!-- Modal Header -->
                                                               <div class="modal-header">
                                                                  <h4 class="modal-title">Add New Images</h4>
                                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                               </div>
                                                               <!-- Modal body -->
                                                               <div class="modal-body">
                                                                  <form action="{{route('update.gallery',['id'=>$gallery->id])}}" method="POST" enctype="multipart/form-data">
                                                                     @csrf 
                                                                     <input type="hidden" name="user_id" value="{{$gallery->User_id}}">
                                                                     <input type="hidden" name="old_image" value="{{$gallery->image}}">
                                                                     <div class="input-group mb-3">
                                                                        <div class="input-group mb-3">
                                                                           <div class="input-group-prepend">
                                                                              <span class="input-group-text">Category</span>
                                                                           </div>
                                                                        

                                                                           <select name="gallery_cat_id" id="" class="form-control">
                                                                              <option value="{{$gallery->gallery_cat_id}}">{{App\Models\GalleryCategory::find($gallery->gallery_cat_id)->name}}</option>   
                                                                              @foreach($gallery_cat as $cate)               
                                                                              <option value="{{$cate->id}}">{{$cate->name}}</option> 
                                                                              @endforeach                 
                                                                           </select>
                                                                        
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                           <div class="input-group-prepend">
                                                                              <span class="input-group-text" id="basic-addon3">Image Name</span>
                                                                           </div>
                                                                           <input type="text" name="image_name" value="{{$gallery->image_name}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                           <div class="input-group-prepend">
                                                                              <span class="input-group-text" id="basic-addon3">Image</span>
                                                                           </div>
                                                                           <input type="file" name="image" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <img src="{{asset($gallery->image)}}" height="100px" width="100px" alt="">
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
                                                      <!-- model popup begins here -->

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
                     <h4 class="modal-title">Add New Images</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form action="{{route('save.gallery.image')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="input-group mb-3">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Category</span>
                              </div>
                             

                              <select name="gallery_cat_id" id="" class="form-control">
                                 <option >Select Category</option>   
                                 @foreach($gallery_cat as $cate)               
                                 <option value="{{$cate->id}}">{{$cate->name}}</option> 
                                 @endforeach                 
                              </select>
                             
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Image Name</span>
                              </div>
                              <input type="text" name="image_name" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
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
         <!-- model popup begins here -->

         <!-- The Modal For Announcement  Creation-->
               <!-- The Modal For Announcement Category Creation-->
         <div class="modal fade" id="gallerycat">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Image Category</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form action="{{route('photo.category')}}" method="POST">
                        @csrf 
                        <div class="input-group mb-3">  
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Name</span>
                              </div>
                              <input type="text" name="name" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>   
                           <label for="">Message Description</label>
                           <div class="input-group mb-3">
                             
                              <div class="input-group-prepend">
                                 <!-- <span class="input-group-text">Message Description</span> -->
                              </div>
                              <textarea class="form-control"  name="description" aria-label="With textarea"></textarea>
                           </div>
                        </div>                     
                        <!-- Modal footer -->
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-info" >Add Category</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close<button>                     
                        </div>
                     </form> 
                  </div>
               </div>                        
            </div>            
         </div>
   
         <!-- end model popup -->
         
          

   

@endsection