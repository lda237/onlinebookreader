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
              <h4 class="modal-title" id="exampleModallable">Add reader</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <!-- Modal body -->

            <form action="/save_reader" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>reader title<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="title" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Author<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="autor" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <Label>Category: </Label>
                                   <select name="category_id" class="form-control" required>
                                     <option></option>
                                   @foreach($categories as $data)
                                   <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                   </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Price<span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="price" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="file">Choose Cover Page Image</label>
                                            <div class="profile-upload">
                                                {{-- <div class="upload-img">
                                                    <img id="previewimg" alt="" style="max-width: 130px;">
                                                </div> --}}
                                                <div class="upload-input">
                                                    <input type="file" name="image" class="form-controle" onchange="previewfile(this)" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="file">Choose a Reader</label>
                                            <div class="profile-upload">
                                                <div class="upload-input">
                                                    <input type="file" name="file" class="form-controle" onchange="previewfile(this)" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>description<span class="text-danger"></span></label>
                                            <textarea class="form-control" rows="5" cols="30" name="description" id="about_description"></textarea>
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
              <h4 class="modal-title" id="exampleModallable">Edit reader</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="edit_modal_Form" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('Patch')
                <!--<input type="text" id="edit_doctor_id">-->
                 <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>reader title<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                        <Label>Category: </Label>
 <select name="category_id" class="form-control" required>
 <option></option>
   @foreach($categories as $datas)
 <option value="{{$datas->id}}">{{$datas->name}}</option>
 @endforeach
</select>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="file">Choose a Reader</label>
                            <div class="profile-upload">
                                <div class="upload-input">
                                    <input type="file" name="file" class="form-controle" onchange="previewfile(this)" required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="file">Choose Cover Page Image</label>
                            <div class="profile-upload">
                                {{-- <div class="upload-img">
                                    <img id="previewimg" alt="" style="max-width: 130px;">
                                </div> --}}
                                <div class="upload-input">
                                    <input type="file" name="image" class="form-controle" onchange="previewfile(this)" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                 <div class="col-sm-12">
                        <div class="form-group">
                            <label>description<span class="text-danger"></span></label>
                            <textarea class="form-control" rows="3" cols="30" name="description" id="about_description"></textarea>
                        </div>
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
              <h4 class="modal-title" id="">Delete reader</h4>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <form id="delete_modal_Form" method="POST">
                          @csrf
                          @method('DELETE')

            <!-- Modal body -->
            <div class="text-center modal-body">
                <!--<input type="text" id="reader_id">-->
    {{-- <center><img src="{{asset('storage/sent.png')}}" alt="" width="50" height="46"></center> --}}
                            <h3>Are you sure want to delete this reader?</h3>
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
                    <h4> readers</h4>
                      <button type="button" class="float-right btn" data-toggle="modal" data-target="#addModal" style="background-color: #66c3ee; color:white"><i class="fa fa-plus"> Add reader</i></button>
    <br><br>
                  </div>
          <div class="card">
            <style>
            .w-10p{width:10% !important;}
table{
border-collapse:collapse;
table-layout:fixed
}
table td{
border:solid 1px #666666;
word-wrap:break-word
}
            .box{overflow-wrap: break-word;}
            </style>

            <div class="card-body" style=" text-align: center;">
               <div class="px-4 table-responsive">
               <table class="table table-primary table-hover" id="myTable">
                  <thead >
                  <th class="w-10p">No</th>
                   <th class="w-10p" style="display:none;">id</th>
                   <th class="w-10p">image</th>
                    <th class="w-10p">Name</th>
                    <th class="w-10p">Author</th>
                    <th class="w-10p">Price</th>
                    {{-- <th class="w-10p">Category</th> --}}
                    <th class="w-10p box">description</th>
                    <th class="w-10p">Action</th>
                  </thead>
                  <tbody>
                  @foreach($readers as $key=>$data)
                    <tr>
                    <td>{{++$key}}</td>
                    <td style="display:none;">{{$data->id}}</td>
                    <td> <img src="{{ asset('storage') }}/{{ $data->image }}" alt="Image" class="img-fluid" width="50" higth="50"> </td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->autor}}</td>
                    <td>{{$data->price}}</td>
                    {{-- <td>{{$data->category->name}}</td> --}}
                    <td><button type="button" class="float-right btn text-info" data-toggle="modal" data-target="#descriptionModal-{{ $data->id }}" >Description</button> </td>

                    <td>
                                          <div class="dropdown dropdown-action">
                                              <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                              <div class="dropdown-menu dropdown-menu-right">
                      {{-- <a class="text-white dropdown-item editbtn" style=" font-size: 16px; background-color: #66c3ee; color:white" href="javascript:void(0)">
                      <i class="fa fa-pencil m-r-5"></i> Edit</i>
                             </a> --}}

                             <a class="mt-2 text-white dropdown-item bg-danger deletebtn"style=" font-size: 16px" href="javascript:void(0)">
                           <i class="fa fa-trash-o m-r-5"></i> Delete
                             </a>
                             </a>
                                              </div>
                                          </div>
                                      </td>
                    </tr>
{{-- ************************************************************************************************ --}}
      <!-- The Modal description-->
      <div class="modal fade" id="descriptionModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #66c3ee; color:white">
              <h4 class="modal-title" id="exampleModallable">{{ $data->title }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <!-- Modal body -->
            <div class="container">
                <div class=" pt-10 mt-10 box">
                  {{-- <h1>Heading</h1> --}}
                  {{ $data->description }}
                </div>
              </div>
<!-- Modal footer -->
<div class="py-3 pl-2 text-white float-left" style="background-color: black">
    <h3>Auteur : {{ $data->autor }} </h3>
  </div>
          </div>
        </div>
      </div>
      <!--End The Modal description-->
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

    //taking the id of the reader send it to the routre to delete
    $('#myTable').on('click', '.deletebtn', function(){
     $tr = $(this).closest('tr');
     var reader = $tr.children('td').map(function(){
       return $(this).text();
     }).get();

    // console.log(reader);

     $('#reader_id').val(reader[1]);
     $('#delete_modal_Form').attr('action', '/delete_reader/'+reader[1]);
     $('#deletemodalpop').modal('show');

      });

    //taking the id of the reader send it to the routre to edit
      $('#myTable').on('click', '.editbtn', function(){
     $tr = $(this).closest('tr');
     var reader = $tr.children('td').map(function(){
       return $(this).text();
     }).get();

    // console.log(reader);

     $('#reader_id').val(reader[1]);
     $('#reader_image').val(reader[2]);
     $('#reader_name').val(reader[3]);
     $('#reader_role').val(reader[4]);
     $('#reader_description').val(reader[5]);
     $('#edit_modal_Form').attr('action', '/update_reader/'+reader[1]);
     $('#editmodalpop').modal('show');
    //  $('#closemodalpop').modal('close');

      });

    });

    </script>

    @endsection







