@extends('layouts.home.home_layout')
@section('title', 'Top Popular')
@push('css')
@endpush


@section('content')
    <style>
        input:focus,
        textarea:focus {
            outline: none;
        }

        .form-control:focus {
            border-color: inherit;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    </style>

    <div class="discovery-recs discovery-recs-2">
        <div class="container">
            <div class="discovery-recs-right">
                <div class="brand">
                    <div class="brand-item">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="brand-item">
                        <img src="img/icon.webp" alt="" />
                    </div>
                    <div class="brand-item">
                        <img src="img/icon.webp" alt="" />
                    </div>
                    <div class="brand-item">
                        <img src="img/icon.webp" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sort sort-popular">
        <div class="container">
            <div class="filterBtn">
                <i class="fa-solid fa-filter"></i>
            </div>
            <div class="top list-top">
                <a class="filter-done">
                    <div>
                        <div class="list-all">
                            <div class="top">
                                <div class="title">Filters</div>
                                <div class="reset done">
                                    <i class="fa-solid fa-check"></i>
                                    Done
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="providerBtn">
                        <div class="title-popular">
                            Provider
                            <i class="fa-solid fa-sort-down"></i>
                        </div>
                        <div class="list-all list-provider">
                            <div class="top">
                                <div class="title">Providers</div>
                                <button class="reset">
                                    <i class="fa-solid fa-check"></i>
                                    <span>OK</span>
                                </button>
                                <button class="reset">
                                    <i class="fa-solid fa-xmark"></i>
                                    <span>RESET</span>
                                </button>
                            </div>
                            <div class="center">
                                <div class="list">
                                    @foreach ($providers as $provider)
                                        <input class="item" type="checkbox" name="provider" value={{ $provider->name }}>

                                        <i class="fa-solid fa-check"></i>
                                        {{ $provider->name }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="yearBtn">
                        <div class="title-popular">
                            Release year
                            <i class="fa-solid fa-sort-down"></i>
                        </div>
                        <div class="list-all list-year">
                            <div class="top">
                                <div class="title">Release year</div>
                                <div class="reset" onclick="resetSlider()">
                                    <i class="fa-solid fa-xmark"></i>
                                    <p>RESET</p>
                                </div>
                            </div>
                            <div class="center">
                                <div class="range">
                                    <p><span id="demo"></span></p>
                                    <label for="">1900</label>
                                    <input type="range" min="1900" max="2023" value="2023" class="slider"
                                        id="myRange" />
                                    <label for="">2023</label>
                                </div>
                                <div class="list">
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        This Year
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        Last Year
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="genreBtn">
                        <div class="title-popular">
                            Genre
                            <i class="fa-solid fa-sort-down"></i>
                        </div>
                        <div class="list-all list-genre">
                            <div class="top">
                                <div class="title">Genre</div>
                                <div class="reset">
                                    <i class="fa-solid fa-xmark"></i>
                                    <p>RESET</p>
                                </div>
                            </div>
                            <div class="center">
                                <div class="list">
                                    @foreach ($genres as $genre)
                                        <div class="item">
                                            <i class="fa-solid fa-check"></i>
                                            {{ $genre->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="priceBtn">
                        <div class="title-popular">
                            Price
                            <i class="fa-solid fa-sort-down"></i>
                        </div>
                        <div class="list-all list-price">
                            <div class="top">
                                <div class="title">Types</div>
                                <div class="reset reset-price">
                                    <i class="fa-solid fa-xmark"></i>
                                    <p>RESET</p>
                                </div>
                            </div>
                            <div class="center">
                                <div class="list list-prices">
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        Free
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        Ads
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        Subscription
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        Buy
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        Rent
                                    </div>
                                </div>
                            </div>
                            <div class="top">
                                <div class="title">Quality</div>
                                <div class="reset reset-quality">
                                    <i class="fa-solid fa-xmark"></i>
                                    <p>RESET</p>
                                </div>
                            </div>
                            <div class="center">
                                <div class="list list-qualities">
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        SD
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        HD
                                    </div>
                                    <div class="item">
                                        <i class="fa-solid fa-check"></i>
                                        4K
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a>
                    <div class="countryBtn">
                        <div class="title-popular">
                            Production country
                            <i class="fa-solid fa-sort-down"></i>
                        </div>
                        <div class="list-all list-country">
                            <div class="top">
                                <div class="title">Production country</div>
                                <div class="reset">
                                    <i class="fa-solid fa-xmark"></i>
                                    <p>RESET</p>
                                </div>
                            </div>
                            <div class="center">
                                <div class="list">
                                    @foreach ($providerCountries as $country)
                                        <div class="item">
                                            <i class="fa-solid fa-check"></i>
                                            {{ $country }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="m-form__group" style="width: 500px; margin-left:20px">
                    <div class="input-group">
                        <input type="text" class="form-control bg-dark text-white" style="border: none;"
                            name="name" id="name" value="{{ request()->query('name') }}">
                        <input type="submit" class="btn btn-secondary" value="Search">
                    </div>
                </div>

            </div>
            <div class="bottom">21540 titles</div>
        </div>
    </div>

    <div class="titles">
        <div class="container">
            <div class="popular">
                <div class="card-slider">
                    @foreach ($movies as $movie)
                    <div class="card">
                            <div class="image">
                                <img src={{ $movie->poster_url }} alt="" />
                            </div>
                            <div class="hover">
                                <div class="content">
                                    <a href="chitiet.html" class="info">
                                        <img src="img/icon (1).webp" alt="" />
                                        <span>Watch TV</span>
                                    </a>
                                </div>
                                <ul>
                                    <li>
                                        <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        @endforeach
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image">
                            <img src="img/guardians-of-the-galaxy-vol-3.webp" alt="" />
                        </div>
                        <div class="hover">
                            <div class="content">
                                <a href="chitiet.html" class="info">
                                    <img src="img/icon (1).webp" alt="" />
                                    <span>Watch TV</span>
                                </a>
                            </div>
                            <ul>
                                <li>
                                    <a class="book"><i class="fa-solid fa-bookmark"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

<!-- Container-fluid Ends-->
@push('scripts')
    <script>
        var arr = [];
        $(".providerBtn .item").change(function() {
            arr = $('[name="provider"]:checked').map(function(){
                return $(this).val()
             }).get();
            console.log(arr)
            $.ajax({
                url: "{{ route('home.movie.filter_popular') }}",
                method: 'POST',
                dataType: "json",
                data: {
                    provider: arr,
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
                    console.log(result);

                },
                error: function(e) {
                    console.log(e)
                }
            });
        });
    </script>
@endpush
