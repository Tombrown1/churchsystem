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
                                       
                                    </table>
                                 </div>
                              </div>






                   </div>
        </div>
@endsection