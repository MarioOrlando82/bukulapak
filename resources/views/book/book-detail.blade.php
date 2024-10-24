@extends('layouts/admin-layout');

@section('title', 'book detail');

@section('content')

<h1>Ini adalah halaman book detail</h1>
<h3>Nanti bisa sekalian tunjukkin relasi-relasi misalnya kalau ada yang beli dkk</h3>

<div>
    <div>{{$bookDetail}}</div>
</div>


@endsection