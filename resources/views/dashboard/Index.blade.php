@extends('layouts.dashboard.dashboard_layout')
@section('title', 'Dashboard')
@push('css')
@endpush


@section('content')


<!-- Container-fluid starts-->
<div class="container-fluid dashboard-default-sec">
    <div class="row mb-3" style="height:200px">
        <div class="col-8">
            <div class="p-6 h-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-teal-800 dark:text-white">Welcome {name}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    You have done 72% 🤩 more sales today.</br>
                    Check your new raising badge in your profile.
                </p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Check your profile page
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="p-6 h-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h3 class="text-4xl text-gray-400"><i class="fa-solid fa-user"></i></i></h3>
                <p class="mb-2 font-semibold tracking-tight text-gray-400 dark:text-white">User</p>
                <h5 class="mb-3 text-2xl font-bold text-teal-800 dark:text-gray-400">$12,628</h5>
                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                    See more
                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="col-2">
            <div class="p-6 h-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h3 class="text-4xl text-gray-400"><i class="fa-solid fa-eye"></i></h3>
                <p class="mb-2 font-semibold tracking-tight text-gray-400 dark:text-white">View</p>
                <h5 class="mb-3 text-2xl font-bold text-teal-800 dark:text-gray-400">12,628</h5>
                <a href="#" class="inline-flex items-center text-blue-600 hover:underline">
                    See more
                    <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <div class="p-6 h-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-teal-800 dark:text-white">Top 5 Movie</h5>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Bonnie Green
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $3467
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Michael Gough
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $67
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Thomas Lean
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $2367
                            </div>
                        </div>
                    </li>
                    <li class="pt-3 pb-0 sm:pt-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Lana Byrd
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $367
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-6">
            <div class="p-6 h-full bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-teal-800 dark:text-white">Top 5 Providers</h5>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Bonnie Green
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $3467
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Michael Gough
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $67
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Thomas Lean
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $2367
                            </div>
                        </div>
                    </li>
                    <li class="pt-3 pb-0 sm:pt-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Neil image">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Lana Byrd
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                $367
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row mb-3" style="height:200px">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Quick Action</h5>
                </div>
                <div class="card-body">
                    <p class="text-center">
                        <a href="{{ route('dashboard.movie.create_genre') }}" class="btn btn-sm btn-success">
                            Create Genre
                        </a>
                        <a href="{{ route('dashboard.movie.create_movie') }}" class="btn btn-sm btn-success">
                            Create New Movie
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

<!-- Container-fluid Ends-->
@push('scripts')
{{-- <script>
     Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
</script> --}}
@endpush