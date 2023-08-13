@extends('layouts.home.home_layout')
@section('title', 'My Profile')
@push('css')
     <style>
          #profile {
               height: 100%;
          }
     </style>
@endpush


@section('content')
     <!-- SETTING -->
     <div class="setting-account full-height" id="profile">
          <div class="container wrapper">
               <header>Personal page</header>
               <input type="radio" name="slider" checked id="setting-1" />
               <input type="radio" name="slider" id="setting-2" />
               <input type="radio" name="slider" id="setting-3" />
               <nav class="mb-2">
                    <label for="setting-1" class="setting-1">Accounts and Settings</label>
                    <label for="setting-2" class="setting-2">Service purchased</label>
                    <!-- <div class="slider"></div> -->
               </nav>
               @if (session('error'))
                    <div class="alert alert-danger">
                         {{ session('error') }}
                    </div>
               @endif
               @if (session('success'))
                    <div class="alert alert-success">
                         {{ session('success') }}
                    </div>
               @endif
               <div class="setting">

                    <div class="content content-1">
                         <div class="content-1-1">
                              <div class="title">Account information</div>
                              <div class="content-1-2">
                                   <div class="content-setting">
                                        <div class="content-acc">
                                             <div class="title">User Name:</div>
                                             <span>{{ $user->name }}</span>
                                        </div>
                                        <div class="setting-acc show-modal-name" onclick="change_name('{{ $user->name }}')">Change</div>
                                   </div>

                                   <div class="content-setting">
                                        <div class="content-acc">
                                             <div class="title">Email:</div>
                                             <span> {{ $user->email }}</span>
                                        </div>
                                   </div>

                                   <div class="content-setting">
                                        <div class="content-acc">
                                             <div class="title">Password:</div>
                                             <span class="setting-acc" onclick="change_pass()">Change your Password</span>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>

                    <div class="content content-2">
                         {{-- <button class="create">Create</button> --}}
                         <div class="content-1-1-2">
                              <table>
                                   <tr>
                                        <th>#</th>
                                        <th>Provider</th>
                                        <th>Custom name</th>
                                        <th>Subscription URL</th>
                                        <th>Renewal date</th>
                                        <th>Amount</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                   </tr>

                                   @foreach ($subscriptions as $subscription)
                                        <tr>
                                             <td>{{ $loop->index + 1 }}</td>
                                             <td>
                                                  @if ($subscription->streamingServiceProvider != null)
                                                       <img src="{{ asset($subscription->streamingServiceProvider->logo) }}" width="50px" height="50px">
                                                  @else
                                                       <span>No logo</span>
                                                  @endif

                                             </td>
                                             <td>{{ $subscription->custom_name }}</td>
                                             <td>{{ $subscription->subscription_url }}</td>
                                             <td>{{ $subscription->expiration_date ? $subscription->expiration_date->format("Y-m-d") : null }}</td>
                                             <td>
                                                  {{ $subscription->price }}
                                                  {{ $subscription->typePrice ? '(' . $subscription->typePrice->name . ')' : null }}
                                             </td>
                                             <td>{{ $subscription->note }}</td>
                                             <td>
                                                  <div>
                                                       <a class="btn btn-sm btn-info" href="{{ route('profile.edit_subscription', $subscription->id ) }}">Edit</a>
                                                       <a class="btn btn-sm btn-danger">Delete</a>
                                                  </div>
                                             </td>
                                        </tr>
                                   @endforeach

                                   </tr>
                              </table>
                         </div>
                         <div class="container bg-dark rounded p-3">
                              <h4 class="mt-3 text-center">Add a Subscription or a film that you had bought</h4>
                              <form action="#" method="post" id="add_subscription">
                                   @csrf
                                   <div class="form-group">
                                        <label for="custom_name">Custom name (option)</label>
                                        <input type="text" class="form-control" placeholder="Custom name" name="custom_name" />
                                        <small> <i>Movie name or your username at the streaming provider</i></small>
                                   </div>
                                   <div class="form-goup">
                                        <label for="provider_id">Provider</label>
                                        <select name="provider_id" id="provider_id" class="form-control">
                                             <option value="">Other</option>
                                             @foreach ($providers as $provider)
                                                  <option value="{{ $provider->id }}">
                                                       {{ $provider->name }}
                                                  </option>
                                             @endforeach
                                        </select>
                                   </div>
                                   <div class="form-goup">
                                        <label for="subscription_url">URL (option)</label>
                                        <input type="text" class="form-control" placeholder="URL" name="subscription_url" id="subscription_url" />
                                        <small> URL of the movie or the streaming provider that don't contain at the selection above</small>
                                   </div>
                                   <div class="form-goup">
                                        <label for="subscription_date">Start at (option)</label>
                                        <input name="subscription_date" id="subscription_date" type="date" onchange="setMinExDate()" class="form-control" />
                                   </div>
                                   <div class="form-goup">
                                        <label for="expiration_date">End at (option)</label>
                                        <input name="expiration_date" id="expiration_date" type="date" class="form-control" />
                                        <small>This field will be <b class="text-danger">REQUIRED</b> if you choose to create a reminder</small>
                                   </div>
                                   <div class="form-goup">
                                        <label for="is_reminder">
                                             <input type="checkbox" name="is_reminder" id="is_reminder" value="1" />
                                             Remind me to renew this subscription via my email
                                        </label>

                                   </div>
                                   <div class="form-goup">
                                        <label for="amount">Price</label>
                                        <input type="text" class="form-control" placeholder="price" id="price" name="price" />
                                   </div>
                                   <div class="form-goup">
                                        <label for="currency">Type</label>
                                        <select name="type_price" id="type_price" class="form-control">
                                             @foreach ($type_price as $type)
                                                  <option value="{{ $type->id }}">
                                                       {{ $type->name }}
                                                  </option>
                                             @endforeach

                                        </select>
                                   </div>
                                   <div class="form-goup">
                                        <label for="note">Note (option)</label>
                                        <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                                   </div>
                                   <hr>
                                   <div class="form-goup">
                                        <button class="btn btn-primary" id="submit">Add</button>
                                   </div>
                              </form>
                         </div>

                    </div>
               </div>
          </div>
     </div>




     </div>
@endsection

<!-- Container-fluid Ends-->
@push('scripts')
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script>
          function setMinExDate() {
               $('#expiration_date').value = "";
               var subscription_date = $('#subscription_date').val();
               $('#expiration_date').attr('min', subscription_date);
          }
          //doc ready
          $(document).ready(function() {

               $('#add_subscription').on('submit', function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    $.ajax({
                         url: "{{ route('profile.store_subscription') }}",
                         type: "POST",
                         data: formData,
                         cache: false,
                         contentType: false,
                         processData: false,
                         beforeSend: function() {
                              $('#submit').attr('disabled', 'disabled');
                              $('#submit').html('Please wait...');
                              Swal.fire({
                                   title: 'Please Wait !',
                                   text: 'Subscription is being added',
                                   allowOutsideClick: false,
                                   showCancelButton: false,
                                   showConfirmButton: false,
                                   willOpen: () => {
                                        Swal.showLoading();
                                   },
                              });
                         },
                         success: function(response) {
                              if (response.status == 1) {

                                   Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: response.message,
                                        showConfirmButton: true,
                                        timer: 1500
                                   });
                                   $('#submit').removeAttr('disabled');
                                   $('#submit').html('Save');
                                   $('#create_pin')[0].reset();
                                   $('#add_subscription').trigger('reset');
                                   //reload page after 2s
                                   setTimeout(function() {
                                        location.reload();
                                   }, 2000);


                              } else {
                                   Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.message,
                                   });
                                   $('#submit').removeAttr('disabled');
                                   $('#submit').html('Save');
                              }
                         },
                         error: function(xhr, ajaxOptions, thrownError) {
                              console.log(xhr);
                              Swal.fire({
                                   icon: 'error',
                                   title: 'Oops...',
                                   text: 'Something went wrong! Please try again later.',
                              });
                              $('#submit').removeAttr('disabled');
                              $('#submit').html('Save');
                         }
                    });
               });


          });
     </script>
     <script>
        function change_name(name){
            //dùng sweetalert2 để hiện form nhập tên mới
            Swal.fire({
                title: 'Change name',
                input: 'text',
                inputValue: name,
                showCancelButton: true,
                confirmButtonText: 'Save',
                showLoaderOnConfirm: true,
                preConfirm: (new_name) => {
                    //gửi ajax để update tên mới
                    $.ajax({
                        url: "{{ route('profile.update_name') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "new_name": new_name
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: true,
                                    timer: 1500
                                });
                                //reload page after 2s
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log(xhr);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again later.',
                            });
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            });

        }
        function change_pass(){
            //dùng sweetalert2 để hiện form nhập tên mới
            Swal.fire({
                title: 'Change password',
                html:
                    '<input id="swal-input1" class="swal2-input" placeholder="Old password" type="password">' +
                    '<input id="swal-input2" class="swal2-input" placeholder="New password" type="password">' +
                    '<input id="swal-input3" class="swal2-input" placeholder="Confirm new password" type="password">'+
                    '<span class="text-danger" id="error"></span>',
                focusConfirm: false,
                preConfirm: () => {
                    const old_pass = Swal.getPopup().querySelector('#swal-input1').value
                    const new_pass = Swal.getPopup().querySelector('#swal-input2').value
                    const confirm_new_pass = Swal.getPopup().querySelector('#swal-input3').value
                    if (!old_pass || !new_pass || !confirm_new_pass) {
                        Swal.showValidationMessage(`Please enter all fields`)
                    }
                    if(new_pass != confirm_new_pass){
                        Swal.showValidationMessage(`New password and confirm new password must be the same`)
                    }
                    //check validate, Password must be at least 8 characters, at least 1 uppercase letter, 1 lowercase letter and 1 number.
                    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
                    if(!regex.test(new_pass)){
                        Swal.showValidationMessage(`Password must be at least 8 characters, at least 1 uppercase letter, 1 lowercase letter and 1 number.`)
                    }
                    return { old_pass: old_pass, new_pass: new_pass, confirm_new_pass: confirm_new_pass }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    //gửi ajax để update tên mới
                    $.ajax({
                        url: "{{ route('profile.update_password') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "old_pass": result.value.old_pass,
                            "new_pass": result.value.new_pass,
                            "confirm_new_pass": result.value.confirm_new_pass
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message,
                                    showConfirmButton: true,
                                    timer: 1500
                                });
                                //reload page after 2s
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: response.message,
                                });
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            console.log(xhr);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again later.',
                            });
                        }
                    });
                }})
        }
     </script>
@endpush
