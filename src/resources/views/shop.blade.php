@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
<div class='search_table'>
    <select type='text' id='area_input' onChange='AreaSearch()'>
        <option value="All areas">All areas</option>
        @foreach($areas as $area)
        <option value='{{$area->name}}'>{{ $area->name }}</option>
        @endforeach
    </select>
    <select type='text' id='genre_input' onChange='GenreSearch()'>
        <option value="All genres">All genres</option>
        @foreach($genres as $genre)
        <option value='{{$genre->name}}'>{{ $genre->name }}</option>
        @endforeach
    </select>
    <input type='text' id ='word_search' placeholder='Search...' class='search_box' onkeydown='WordSearch()'>
    </input>
</div>
<div class="shop_table" id='shop_table'>
    @foreach($shops as $shop)
        <div class='shop_card'>
            <div class='shop_image'>
                <img src= '{{ asset("{$shop->photo}") }}'>
            </div>
            <div class='shop_info'>
                <h3 class='shop_name'>{{ $shop['name'] }}</h3>
                <p class='shop_area'>#{{ $shop['area']['name'] }}</p>
                <p class='shop_genre'>#{{ $shop['genre']['name'] }}</p>
            </div>
            <div class='function'>
                <div>
                    <a class='to_detail_comment' href='/detail/{{ $shop["id"] }}'>詳しくみる</a>
                </div>
                <div class='favorite'>
                @if(Auth::check())
                    @if(in_array($shop['id'], $favorite_shop))
                        <form method='post' action='/del'>
                                @csrf
                                <input type='hidden' name='favorite_shop' value="{{ $shop['id'] }}" >
                                <input type='image' src='{{ asset("storage/unfavorite.png") }}' alt='del_favorite'>
                        </form>
                    @else
                        <form class='add_favorite' method='post' action='/add'>
                                @csrf
                                <input type='hidden' name='favorite_shop' value="{{ $shop['id'] }}">
                                <input type='image' src='{{ asset("storage/favorite.png") }}' alt='add_favorite'>
                        </form>
                    @endif
                @else
                    <input type='image' src='{{ asset("storage/favorite.png") }}' alt='add_favorite'>
                @endif
                </div>
            </div>
        </div>
    @endforeach
</div>



<script>
function AreaSearch() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('area_input');
    filter = input.value;
    table = document.getElementById("shop_table");
    contents = table.getElementsByClassName('shop_area');
    div = document.getElementsByClassName('shop_card');

    if(filter=='All areas'){
        for (i=0; i<contents.length; i++){
            div[i].style.display = "";
        }
    }else{
    for (i=0; i<contents.length; i++) {
        t  = contents[i].textContent.slice(1,4);
        if (t.indexOf(filter) > -1) {
            div[i].style.display = "";
            } else {
            div[i].style.display = "none";
            }
        }
    }
}

function GenreSearch() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('genre_input');
    filter = input.value;
    table = document.getElementById("shop_table");
    contents = table.getElementsByClassName('shop_genre');
    div = document.getElementsByClassName('shop_card');

    if(filter=='All genres'){
        for (i=0; i<contents.length; i++){
            div[i].style.display = "";
        }
    }else{
    for (i=0; i<contents.length; i++) {
        t  = contents[i].textContent.slice(1,6);
        if (t.indexOf(filter) > -1) {
            div[i].style.display = "";
            } else {
            div[i].style.display = "none";
        }
    }
    }
}

function WordSearch() {
    if (event.key === 'Enter'){
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('word_search');
    filter = input.value;
    table = document.getElementById("shop_table");
    contents = table.getElementsByClassName('shop_name');
    div = document.getElementsByClassName('shop_card');

    for (i = 0; i < contents.length; i++) {
        t = contents[i].textContent;
        if (t.indexOf(filter) > -1) {
            div[i].style.display = "";
            } else {
            div[i].style.display = "none";
            }
        }
    }
}



</script >

@endsection