@section('title', 'Announcement')
@extends('layouts.admin_master')

@section('admin')
<!-- Display Error Message When not created -->

      @if($errors->any())
         <div class="alert alert-danger">
            <p><strong>Opps Something went wrong</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
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
                              <h2>Announcememnt</h2>
                           </div>
                        </div>
                     </div>

                      <!-- Display Success Message after created -->
            @if(Session::has('message'))
               <div class="alert alert-success {{ Session::get('alert-class', 'alert-success')}} alert-dismissible fade show">
                     {{ Session::get('message') }}

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
                                    <a type="button" class="dropdown-item btn btn-primary " data-toggle="modal" data-target="#myCategory"> Category                                        
                                    </a>
                                    <a type="button" class="dropdown-item btn btn-primary " data-toggle="modal" data-target="#announcement">Post Announcement                                        
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
                                             <th>Announcement</th>
                                             <th>Category</th>
                                             <th>Banner</th>
                                             <th>Date Created</th>
                                             <th colspan="2">Action</th>                                            
                                          </tr>
                                       </thead>                                       
                                       <tbody>
                                          @foreach($announcement as $announce)
                                          <tr>
                                             <td>{{$loop->index +1}}</td>
                                             <td>{{$announce->title}}</td>
                                             <td>{{$announce->message}}</td>
                                             <td>
                                                @if($announce->announce_cat != null)
                                                {{App\Models\AnnoucementCategory::find($announce->annouce_cat_id)->name}}
                                                @else
                                                @endif
                                             </td>
                                             <td>
                                                <img src="{{asset('/storage/'.$announce->image)}}" height="50" width="50" alt="">
                                             </td>
                                             <td>
                                             @if($announce->user != null)
                                                {{App\Models\User::find($announce->user_id)->name}}
                                                @else
                                                @endif
                                             </td>
                                             <td>{{$announce->created_at->isoFormat('D dddd, Y')}}</td>
                                             <td><a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editannounce{{$announce->id}}">Edit</a></td>
                                             <td><a href="{{route('view.announcement', ['id' => $announce->id])}}" type="button" class="btn btn-success">View</a></td>                                             
                                           </tr>
                        <!-- The  Modal For Edot Announcement-->
         <div class="modal fade" id="editannounce{{$announce->id}}">
            <div class="modal-dialog modal-md">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Edit Announcement {{$announce->id}}</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form action="{{route('edit.announce', ['id'=>$announce->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf                         
                        <input type="hidden" name="user_id" value="{{$announce->user_id}}">
                        <div class="input-group mb-3">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Category</span>
                              </div>
                             
                              <select name="annouce_cat_id" id="" class="form-control">
                                 <option value="{{$announce->annouce_cat_id}}" >{{App\Models\AnnoucementCategory::find($announce->annouce_cat_id)->name}}</option>
                                  @foreach($announce_cat as $cat)
                                 <option value="{{$cat->id}}">{{$cat->name}}</option>      @endforeach                            
                              </select>
                             
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Title</span>
                              </div>
                              <input type="text" name="title" value="{{$announce->title}}" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>

                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <!-- <span class="input-group-text">Message Description</span> -->
                              </div>
                              <textarea class="form-control" name="message" value="" placeholder="Message Description" aria-label="With textarea">{{$announce->message}}</textarea>
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Image</span>
                              </div>
                              <input type="file" name="image" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           <div class="form-group">
                              <img src="{{asset('/storage/'.$announce->image)}}" height="100px" width="100px" alt="">
                              
                           </div>
                           
                        </div>                     
                         <!-- Modal footer -->
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-info" >Save Announcement</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                     
                        </div> 
                     </form>                     
                  </div>            
               </div>
             </div>
         </div>
         <!-- End Edit Announcement model popup begins here -->

                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        

        <!-- model popup begins here -->
        <!-- The Modal For Announcement Category Creation-->
         <div class="modal fade" id="announcement">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Post Announcement</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form action="{{route('create.announce')}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="input-group mb-3">
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Category</span>
                              </div>
                             
                              <select name="cat_id" id="" class="form-control">
                                 <option>Choose Category</option>
                                  @foreach($announce_cat as $cat)
                                 <option value="{{$cat->id}}">{{$cat->name}}</option>      @endforeach                            
                              </select>
                             
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Title</span>
                              </div>
                              <input type="text" name="title" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon3">Image</span>
                              </div>
                              <input type="file" name="image" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                           </div>
                           <label for="">Message Description</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <!-- <span class="input-group-text">Message Description</span> -->
                              </div>
                              <textarea class="form-control" rows="5" name="message" aria-label="With textarea"></textarea>
                           </div>
                        </div>                     
                         <!-- Modal footer -->
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-info" >Post Announcement</button>
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
         <div class="modal fade" id="myCategory">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                     <h4 class="modal-title">Create Category</h4>
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                     <form action="{{route('create.cat')}}" method="POST">
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
                              <textarea class="form-control" rows="5" name="description" aria-label="With textarea"></textarea>
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
         <!-- end model popup -->








         @endsection