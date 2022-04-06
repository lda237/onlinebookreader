@extends("layouts.admins")
    @section("content")
     @if(session('status'))
                <div class="text-center alert alert-success">
                    {{ session('status') }}
                </div>
                 @endif

    {{-- ************************************************************************************************ --}}
    <!-- The Modal ADD-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #66c3ee; color:white">
              <h4 class="modal-title" id="exampleModallable">Add category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <!-- Modal body -->

            <form action="/category_save" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            <div class="row">
                                    <div class="col-sm-6">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Category Name<span class="text-danger"></span></label>
                                                    <input class="form-control" name="name" id="about_description">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                 <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" >Save</button>
            </div>

            </div>
            </form>
          </div>
        </div>
      </div>
      <!--End The Modal ADD-->

    {{-- ************************************************************************************************ --}}
      <!-- The Modal Edit-->
      <div class="modal" id="editmodalpop" data-toggle="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #66c3ee; color:white">
              <h4 class="modal-title" id="exampleModallable">Edit category</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="edit_modal_Form" method="POST">
                          @csrf
                          @method('Patch')
                <!--<input type="text" id="edit_doctor_id">-->
                 <div class="row">

                                   <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="file">Image</label>
                                            <div class="profile-upload">
                                                {{-- <div class="upload-img">
                                                    <img id="previewimg" alt="" style="max-width: 130px;">
                                                </div> --}}
                                                <div class="upload-input">
                                                    <input type="file" name="file" class="form-controle" onchange="previewfile(this)">
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description<span class="text-danger"></span></label>
                                            <textarea class="form-control" rows="3" cols="30" name="description" id="about_description"></textarea>
                                        </div>
                                    </div>

                 </div>

                 <!-- Modal footer -->
            <div class="modal-footer">
               <button type="button"class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary ">Update</button>
            </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!--End The Modal Edit-->

    {{-- ************************************************************************************************ --}}
                                <!-- The delete Modal -->
     <div class="modal" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #66c3ee; color:white">
              <h4 class="modal-title" id="">Delete category</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <form id="delete_modal_Form" method="POST">
                          @csrf
                          @method('DELETE')

            <!-- Modal body -->
            <div class="text-center modal-body">
                <!--<input type="text" id="category_id">-->
    <center><img src="{{asset('storage/sent.png')}}" alt="" width="50" height="46"></center>
                            <h3>Are you sure want to delete this category?</h3>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
              <button type="submit" class='btn btn-danger'>Yes </button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <!-- end the delete Modal  -->

    {{-- ************************************************************************************************ --}}
    <div class="row ">
        <div class="col-md-12">
    <div  style=" text-align: center;">
                    <h4> categorys</h4>
                      <button type="button" class="float-right btn" data-toggle="modal" data-target="#addModal" style="background-color: #66c3ee; color:white"><i class="fa fa-plus"> Add category</i></button>
    <br><br>
                  </div>
          <div class="card">
            <style>
            .w-10p{width:10% !important;}
            </style>

            <div class="card-body" style=" text-align: center;">
               <div class="px-4 table-responsive">
               <table class="table table-primary table-hover" id="myTable">
                  <thead >
                  <th class="w-10p">No</th>
                   <th class="w-10p"  style="display:none;">id</th>
                    <th class="w-10p">Name</th>
                    <th class="w-10p">Action</th>
                  </thead>
                  <tbody >
                  @foreach($categories as $key=>$data)
                    <tr>
                    <td>{{++$key}}</td>
                    <td style="display:none;">{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>
                                          <div class="dropdown dropdown-action">
                                              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                              <div class="dropdown-menu dropdown-menu-right">

                             {{-- <a class="mt-2 text-white dropdown-item bg-danger deletebtn"style=" font-size: 16px" href="javascript:void(0)">
                           <i class="fa fa-trash-o m-r-5"></i> Delete
                             </a> --}}
                             </a>
                                              </div>
                                          </div>
                                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
     </div>

    {{-- ************************************************************************************************ --}}
    @endsection

    @section("scripts")

    <script>
    // function previewfile(input){
    // var file=$("input[type=file]").get(0).files[0];
    // if(file)
    // {
    // var reader = new FileReader();
    // reader.onload= function(){
    // $('#previewimg').attr("src",reader.result);
    // }
    // reader.readAsDataURL(file);
    // }
    // }

    $(document).ready( function () {

    //displaying the bootstrap modele table
    $('#myTable').DataTable();

    //taking the id of the category send it to the routre to delete
    $('#myTable').on('click', '.deletebtn', function(){
     $tr = $(this).closest('tr');
     var category = $tr.children('td').map(function(){
       return $(this).text();
     }).get();

    // console.log(category);

     $('#category_id').val(category[1]);
     $('#delete_modal_Form').attr('action', '/delete_category/'+category[1]);
     $('#deletemodalpop').modal('show');

      });

    //taking the id of the category send it to the routre to edit
      $('#myTable').on('click', '.editbtn', function(){
     $tr = $(this).closest('tr');
     var category = $tr.children('td').map(function(){
       return $(this).text();
     }).get();

    // console.log(category);

     $('#category_id').val(category[1]);
     $('#category_name').val(category[2]);
     $('#category_image').val(category[3]);
     $('#edit_modal_Form').attr('action', '/update_category/'+category[1]);
     $('#editmodalpop').modal('show');
    //  $('#closemodalpop').modal('close');

      });

    });

    </script>

    @endsection

