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
               <header class="text-center">Edit Subscription</header>


               <div class="container">
                    <div class="row gx-3">

                         <div class="bg-dark rounded p-3">
                              {{-- <h4 class="mt-3 text-center">Add a Subscription or a film that you had bought</h4> --}}
                              <form action="#" method="post" id="add_subscription">
                                   @csrf
                                   <div class="form-group">
                                        <label for="custom_name" class="mb-2 mt-1">Custom name (option)</label>
                                        <input type="text" class="form-control" placeholder="Custom name" name="custom_name" value="{{ $subscription->custom_name }}" />
                                        <small> <i>Movie name or your username at the streaming provider</i></small>
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="provider_id" class="mb-2 mt-1">Provider</label>
                                        <select name="provider_id" id="provider_id" class="form-control">
                                             <option value="">Other</option>
                                             @foreach ($providers as $provider)
                                                  <option value="{{ $provider->id }}" {{ $subscription->streaming_service_id == $provider->id ? 'selected' : '' }}>{{ $provider->name }}</option>
                                             @endforeach
                                        </select>
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="subscription_url" class="mb-2 mt-1">URL (option)</label>
                                        <input type="text" class="form-control" placeholder="URL" name="subscription_url" value="{{ $subscription->subscription_url }}" />
                                        <small> URL of the movie or the streaming provider that don't contain at the selection above</small>
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="subscription_date" class="mb-2 mt-1">Start at (option)</label>
                                        <input name="subscription_date" id="subscription_date" type="date" onchange="setMinExDate()" class="form-control"
                                             value="{{ $subscription->subscription_date ? $subscription->subscription_date->format('Y-m-d') : null }}" />
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="expiration_date" class="mb-2 mt-1">End at (option)</label>
                                        <input name="expiration_date" id="expiration_date" type="date" class="form-control"
                                             value="{{ $subscription->expiration_date ? $subscription->expiration_date->format('Y-m-d') : null }}" />
                                        <small>This field will be <b class="text-danger">REQUIRED</b> if you choose to create a reminder</small>
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="is_reminder" class="mb-2 mt-1">
                                             <input type="checkbox" name="is_reminder" id="is_reminder" value="1" {{ $subscription->is_remind ? 'checked' : '' }} />
                                             Remind me to renew this subscription via my email
                                        </label>

                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="amount" class="mb-2 mt-1">Price</label>
                                        <input type="number" class="form-control" placeholder="Price" name="amount" value="{{ $subscription->amount }}" />
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="currency" class="mb-2 mt-1">Type</label>
                                        <select name="type_price" id="type_price" class="form-control">
                                             @foreach ($type_price as $type)
                                                  <option value="{{ $type->id }}" {{ $subscription->type_price_id  == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                             @endforeach

                                        </select>
                                   </div>
                                   <div class="form-goup mt-3">
                                        <label for="note" class="mb-2 mt-1">Note (option)</label>
                                        <textarea name="note" id="note" cols="30" rows="5" class="form-control">{{ $subscription->note }}</textarea>
                                   </div>
                                   <hr>
                                   <div class="form-goup mt-3" class="mb-2 mt-1">
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
          <form method="POST" action="{{ route('profile.update_name') }}">
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
          <form id="changePasswordForm" action="{{ route('profile.update_password') }}" method="POST">
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
                         url: "{{ route('profile.update_subscription') }}",
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
@endpush
