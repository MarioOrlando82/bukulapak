@extends('layouts/admin-layout')

@section('title', 'Books')

@section('content')

<h1>You are at book list page</h1>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('status')}}!
        {{Session::get('message')}}
    </div>
@endif   

<div class="my-5 d-flex justify-content-between">
    <a href="book-add" class="btn btn-primary">Add Data</a>
    {{-- <a href="book-deleted" class="btn btn-info">Show Deleted Data</a> --}}
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookList as $bl)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$bl->title}}</td>
                <td>{{$bl->author}}</td>
                <td>{{$bl->price}}</td>
                <td>
                    <a href="book-detail/{{$bl->id}}">detail</a>
                    <a href="book-update/{{$bl->id}}">edit</a>
                    <a href="book-delete/{{$bl->id}}">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
