@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Add Genre')



@push('css')
@endpush
@section('content')


     <!-- Container-fluid starts-->
     <div class="container-fluid dashboard-default-sec">
          <div class="row">
               <div class="card">
                    <div class="card-header pb-0">
                         <h5>Add Genre</h5>
                    </div>
                    <div class="card-body">
                         <form>
                              <div class="row g-3">
                                   <div class="col-md-12">
                                        <label class="form-label" for="validationDefault01">Name</label>
                                        <input class="form-control" id="validationDefault01" type="text" placeholder="Genre name" required="" onkeyup="gen_slug(this)">
                                   </div>

                                   <div class="col-md-12 mb-3">
                                        <label class="form-label" for="slug">Slug</label>
                                        <div class="input-group">
                                             <span class="input-group-text" id="inputGroupPrepend2">url</span>
                                             <input class="form-control" id="slug" name="slug"  type="text" placeholder="Genre slug" aria-describedby="inputGroupPrepend2" required="">
                                        </div>
                                   </div>
                              </div>

                              <button class="btn btn-primary" type="submit">Submit form</button>
                         </form>
                    </div>
               </div>
          </div>

     </div>
     </div>




@endsection

@push('scripts')
     <script>

     </script>
@endpush
