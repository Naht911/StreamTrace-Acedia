@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Movie')



@push('css')
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush
@section('content')


     <!-- Container-fluid starts-->
     <div class="container-fluid dashboard-default-sec">
        <div class="row">
             <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
             <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
             <style>
                  .thumb {
                       margin: 0px 0px 0 0;
                       width: 200px;
                       border: 1px solid #000;
                       /* padding: 2px; */
                       border-radius: 10px;
                       margin: 5px;
                  }

                  .bar {
                       background-color: rgba(36, 105, 92, 0.9) !important;

                  }
             </style>
             <!-- Default Textbox start-->

             <div class="col-xl-12 box-col-12 des-xl-100 top-dealer-sec">
                  <div class="card">
                       <div class="card-header pb-0">
                            <div class="text-center">
                                 <h4>Thêm Admin</h4>
                            </div>
                       </div>
                       <form class="form theme-form" method="POST" id="create_pin" enctype="multipart/form-data">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <div class="card-body">
                                 <div class="row">
                                      <div class="col-md-12 col-sm-12">
                                           <div class="mb-3">
                                                <label class="form-label">Danh Mục</label>
                                                <select class="form-control form-control-lg list-category" multiple="multiple" name="category[]" id="category">
                                                     {{-- @foreach ($categorys as $category)
                                                          <option value="{{ xoadau($category->name) }}">{{ $category->name }}</option>
                                                     @endforeach --}}
                                                </select>
                                           </div>
                                      </div>
                                      <div class="col-md-6 col-sm-12">
                                           <div class="mb-3">
                                                <label class="form-label" for="name">Nhập tên admin</label>
                                                <input class="form-control form-control-lg" id="name"name="name" type="text" placeholder="Tên admin">
                                           </div>
                                      </div>
                                      <div class="col-md-6 col-sm-12">
                                           <div class="mb-3">
                                                <label class="form-label" for="zalo">Số Zalo</label>
                                                <input class="form-control form-control-lg" id="zalo" name="zalo" type="text" placeholder="Số zalo">
                                           </div>
                                      </div>
                                      <div class="col-md-6 col-sm-12">
                                           <div class="mb-3">
                                                <label class="form-label" for="id_fb">Id Facebook</label>
                                                <input class="form-control form-control-lg" id="id_fb" name="id_fb" type="text" placeholder="Id Facebook">
                                           </div>
                                      </div>
                                      <div class="col-md-6 col-sm-12">
                                           <div class="mb-3">
                                                <label class="form-label" for="insurance">Số tiền bảo hiểm</label>
                                                <input class="form-control form-control-lg" id="insurance" name="insurance" type="number" placeholder="Số tiền bảo hiểm">
                                           </div>
                                      </div>
                                      <div class="col-md-12 col-sm-12">
                                           <div class="mb-3">
                                                <label class="form-label" for="website">Website:</label>
                                                <p><small>(Bao gồm "<span class="text-danger">https://</span>")</small></p>
                                                <input class="form-control form-control-lg" id="website" name="website" type="url" placeholder="Link web">
                                           </div>
                                      </div>
                                      <div class="col-md-12 col-sm-12">

                                           <div class="mb-3">
                                                <label class="form-label" for="file-input">Avatar Admin</label>
                                                <input class="form-control form-control-lg" type="file" id="file-input" name="avatar" multiple>
                                                <p></p>
                                                <div class="alert alert-primary" id="thumb-output"></div>
                                           </div>
                                      </div>
                                      <div class="col-md-12 col-sm-12">

                                           <div class="mb-3">
                                                <label class="form-label" for="file-input">Nội dung bài viết:</label>
                                                <textarea id="editor1" name="editor1" cols="30" rows="10"></textarea>
                                                {{-- <textarea class="form-control form-control-lg" name="content" id="content" cols="30" rows="5" placeholder="Nội dung bài viết"></textarea> --}}
                                           </div>
                                      </div>
                                 </div>


                            </div>

                            <div class="card-footer text-end">
                                 <div class="col-md-12 col-sm-12">
                                      <div class="mb-3">
                                           <div class="progress">
                                                <div class="progress-bar bar" role="progressbar" aria-valuenow="0" aria-valuetext="0" aria-valuemin="0" aria-valuemax="100">
                                                     <span id="progress_inside"></span>
                                                </div>
                                           </div>
                                      </div>
                                 </div>
                                 {{-- <button class="btn btn-primary" type="button" onclick="xacnhan()">Xác Nhận Nội Dung</button> --}}
                                 <button class="btn btn-primary" type="submit" id="submit">Thêm</button>
                                 <input class="btn btn-light" type="reset" value="Xoá Trắng">
                                 <a href="{{ route('dashboard') }}" class="btn btn-danger">Trở lại</a>
                            </div>
                       </form>
                  </div>
             </div>
             <style>
                  .img-thumb-temp {
                       /* width: 100%;
                                                                                                                                                                                                 height: 100%; */
                       object-fit: cover;
                       display: inline;
                       /* position: absolute; */
                  }

                  /* nằm đè lên ảnh */
                  .badge-custom {
                       position: absolute;
                       top: 5px;
                       right: 0px;
                       /* transform: rotate(45deg); */
                       transform-origin: 100% 0;
                       /* opacity: 0.5; */
                       border: none !important;
                  }

                  .card-img {
                       display: inline-block !important;
                       background: none !important;
                       border: none !important;
                  }
             </style>
             <script>
                  $.ajaxSetup({
                       headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                  });
             </script>
             <script>
                  function xacnhan() {
                       var name = $('#name').val();
                       var zalo = $('#zalo').val();
                       var id_fb = $('#id_fb').val();
                       var insurance = $('#insurance').val();
                       var category = $('#category').val();
                       var content = CKEDITOR.instances.editor1.getData();
                       var avatar = $('#file-input').val();
                       if (name == '' || zalo == '' || id_fb == '' || insurance == '' || category == '' || content == '' || avatar == '') {
                            alert('Vui lòng nhập đầy đủ thông tin');
                       } else {
                            $('#submit').removeAttr('disabled');
                       }
                  }

                  $(document).ready(function() {
                       $('#file-input').on('change', function() { //on file input change
                            if (window.File && window.FileReader && window.FileList && window.Blob) {
                                 $('#thumb-output').html(''); //clear html of output element
                                 var data = $(this)[0].files; //this file data
                                 $.each(data, function(index, file) { //loop though each file
                                      if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                                           var fRead = new FileReader(); //new filereader
                                           fRead.onload = (function(file) { //trigger function on successful read
                                                return function(e) {
                                                     var div = `
                                                          <div class="card card-img" style="width: 200px;">
                                                              {{--  <button class="badge badge-danger badge-custom" onclick="delete_img('img_${index}')">Xoá <i class="fa fa-times"></i></button> --}}
                                                               <img src="${e.target.result}" class="thumb" id="img_${index}">
                                                          </div>`;
                                                     //    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).attr('id', "img_" +
                                                     //    index); //create image element
                                                     $('#thumb-output').append(div); //append image to output element
                                                };
                                           })(file);
                                           fRead.readAsDataURL(file); //URL representing the file's data.
                                      }
                                 });
                            } else {
                                 alert("Trình duyệt không hỗ trợ xem trước ảnh"); //if File API is absent
                            }
                       });

                  });
                  $(document).ready(function() {
                       //based on: http://stackoverflow.com/a/9622978
                       $('#create_pin').on('submit', function(e) {
                            e.preventDefault();
                            var form = e.target;
                            var data = new FormData(form);
                            var content = CKEDITOR.instances.editor1.getData();
                            data.append('content', content);
                            var bar = $('.bar');
                            var percent = $('.percent');
                            var status = $('#status');
                            $("#submit").text("Đợi tý...");
                            $('#submit').prop('disabled', true);
                            $.ajax({
                                 xhr: function() {
                                      var xhr = new window.XMLHttpRequest();
                                      xhr.upload.addEventListener("progress", function(evt) {
                                           if (evt.lengthComputable) {
                                                var percentComplete = evt.loaded / evt.total;
                                                percentComplete = parseInt(percentComplete * 100);
                                                var percentVal = percentComplete + '%';
                                                var percenttext = percentComplete;
                                                bar.width(percentVal);

                                                if (percentComplete === 100) {

                                                     setTimeout(function() {
                                                          bar.width(0);
                                                     }, 1000);
                                                     percentVal = 0 + '%';
                                                     percenttext = 0;
                                                };
                                                $("#progress_inside").text(percenttext + '% Complete');
                                           }
                                      }, false);
                                      return xhr;
                                 },
                                 url: "{{ route('dashboard.movie.store') }}",
                                 method: "POST",
                                 processData: false,
                                 contentType: false,
                                 dataType: 'json',
                                 data: data,
                                 processData: false,
                                 success: function(data) {
                                      $("#submit").text("Thêm");
                                      $('#submit').prop('disabled', false);
                                      // console.log(data);
                                      if (data.status_code == 0) {
                                           swal("Xong !", data.message, "success");
                                           $('#create_pin')[0].reset();
                                           $('#thumb-output img').remove();
                                           //  $('#submit').prop('disabled', true);
                                           setTimeout(function() {
                                                location.reload();
                                           }, 1000);
                                      } else if (data.code == 2) {
                                           swal("Lỗi!", data.message, "error");
                                           //  window.location.assign('/login');
                                      } else {
                                           swal("Lỗi!", data.message, "error");
                                      }
                                 },
                                 error: function(data) {
                                      $("#submit").text("Thêm");
                                      $('#submit').prop('disabled', false);
                                      swal("Lỗi!", "Lỗi bất ngờ, vui lòng thử lại sau!", "error");

                                 }

                            })
                       })
                  })
             </script>

        </div>
   </div>




@endsection

@push('scripts')


<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/sweet-alert/app.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>


<script>
    // Default ckeditor
    CKEDITOR.replace('editor1', {
         height: 300,
         // removePlugins: ['Heading'],
         // toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'link'],

    });
</script>

@endpush
