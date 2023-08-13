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
                                        <div class="setting-acc show-modal-name" onclick="toggleName()">Change</div>
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
                                             <span class="setting-acc" onclick="togglePassword()">Change your Password</span>
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
                                        {{ $subscription->typePrice }} <br>
                                        <tr>
                                             <td>{{ $loop->index + 1 }}</td>
                                             <td><img src="{{ $subscription->streamingServiceProvider->logo }}" alt="" width="50px" height="50px"></td>
                                             <td>{{ $subscription->custom_name }}</td>
                                             <td>{{ $subscription->subscription_url }}</td>
                                             <td>{{ $subscription->expiration_date }}</td>
                                             <td>
                                                  {{ $subscription->price }}
                                                  {{ $subscription->typePrice ? '(' . $subscription->typePrice->name . ')' : null }}
                                             </td>
                                             <td>{{ $subscription->note }}</td>
                                             <td>
                                                  <div>
                                                       <button class="edit">Edit</button>
                                                       <button class="delete">Delete</button>
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
                                        <input type="text" class="form-control" placeholder="Custom name" />
                                        <small> <i>Movie name or your username at the streaming provider</i></small>
                                   </div>
                                   <div class="form-goup">
                                        <label for="custom_url">Provider</label>
                                        <select name="streaming_service_provider_id" id="streaming_service_provider_id" class="form-control">
                                             <option value="">Other</option>
                                             @foreach ($providers as $provider)
                                                  <option value="{{ $provider->id }}">
                                                       {{ $provider->name }}
                                                  </option>
                                             @endforeach
                                        </select>
                                   </div>
                                   <div class="form-goup">
                                        <label for="custom_url">URL (option)</label>
                                        <input type="text" class="form-control" placeholder="URL" />
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
                                        <input type="text" class="form-control" placeholder="price" />
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
                                        <label for="note">Note</label>
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
     <!-- SETTING --end -->

     <!-- MODAL -->
     <div id="popup-setting-name">
          <h2>Update name</h2>
          <form method="POST" action="{{ route('change-name') }}">
               @csrf
               <div class="form-group">
                    <input type="text" id="new_name" name="new_name" value="{{ Auth::user()->name }}" required />
                    <label for="username" class="form-label">Name</label>
               </div>
               <div class="button-movie">
                    <button type="submit" class="button">Save</button>
                    <button type="button" class="button" onclick="toggleName()">Skip</button>
               </div>
          </form>
     </div>

     <div id="popup-setting-password">
          <h2>Change password</h2>
          <form id="changePasswordForm" action="{{ route('change-password') }}" method="POST">
               @csrf
               <div class="form-group">
                    <input id="current_password" name="current_password" type="password" class="form-control" required />
                    <label for="current_password" class="form-label">Current Password</label>
                    <div class="error-message" style="color: red;" id="current_password_error"></div>
               </div>
               <div class="form-group">
                    <input id="new_password" name="new_password" type="password" class="form-control" required />
                    <label for="new_password" class="form-label">New Password</label>
                    <div class="error-message" style="color: red;" id="new_password_error"></div>
               </div>
               <div class="form-group">
                    <input id="confirm_new_password" name="confirm_new_password" type="password" class="form-control" required />
                    <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                    <div class="error-message" style="color: red;" id="confirm_new_password_error"></div>
               </div>
               <div class="button-movie">
                    <button class="button" id="passwordButton">Save</button>
                    <button class="button" onclick="togglePassword()">Skip</button>
               </div>
          </form>
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
                         url: "",
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
                                   text: 'Provider is being added',
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
@endpush
