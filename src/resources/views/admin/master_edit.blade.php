@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_main.css') }}">
@endsection

@section('content')
<div class='mypage'>
    <div class=''>
        <h3>店舗代表者の作成</h3>
        <div class='reserve_card'>
            <form class='master_creation' method='post' action='create_master'>
            @csrf
            <div class='name_input'>
                <input name='name' type='text' placeholder='Name', value="{{old('name')}}">
            </div>
            <div class='userid_input'>
                <input name='userid' type='text' placeholder='Master ID', value="{{old('name')}}">
            </div>
            <div class='password_input'>
                <input name='password' type='password' placeholder='Password'>
            </div>
        </div>
        <div class='button'>
            <button type='submit'>店舗代表者作成</button></form>
        </div>
        <h3>登録中の店舗代表者</h3>
        <table>
        <tr><th>master_id</th><th>代表者名</th><th>担当店舗</th></tr>
        @foreach($masters as $master)
        <tr>
            <td>{{$master['userid']}}</td>
            <td>{{$master['name']}}</td>
            <td>{{$master['shop_id']}}</td>
        </tr>
        @endforeach
        </table>
    </div>
    @if (Auth::guard('administrators')->check())
        <div>管理者 {{ Auth::guard('administrators')->user()->userid }}でログイン中</div>
    @endif
    <div>
        <form class='form' action='/logout' method='post'>
            @csrf
        <button class="logout_button" type='submit'><a>Logout</a></button></form>
    </div>
</div>
@endsection