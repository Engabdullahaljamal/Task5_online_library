@extends('layouts.app')

@section('content')
<h1 style="color:rgb(0, 71, 251);text-align:center">Online Library Dashboard</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
              
            
            </div>
           
        </div>
        <a class="mt-4" style="color:green;text-decoration:none;text-align:center;background-color:silver" href="{{route('super_category.create')}}"> create super category</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th style="color:blue" scope="col">EDIT</th>
                    <th style="color:red" scope="col">DELETE</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($super_categories  as $super_category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$super_category->name}}</td> 
                    <td><a href="{{route('super_category.edit',$super_category->id)}}"> Edit</a></td> 
                    <td>
                        <form action="{{route('super_category.destroy',$super_category->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <input  style="color:red" type="submit" value="delete"></form>

                
                </tr>
    
                @endforeach
            </tbody>
        </table>
        <a class="mt-4" style="color:green;text-decoration:none;text-align:center;background-color:silver" href="{{route('category.create')}}"> create  subcategory</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">SUPER CATEGORY NAME</th>
                    <th style="color:blue" scope="col">EDIT</th>
                    <th style="color:red" scope="col">DELETE</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td> 
                    <td>{{$category->super_category->name}}</td> 
                    
                    <td><a href="{{route('category.edit',$category->id)}}"> Edit</a></td> 
                    <td>
                        <form action="{{route('category.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <input  style="color:red" type="submit" value="delete"></form>

                
                </tr>
    
                @endforeach
            </tbody>
        </table>
        <a class="mt-4" style="color:green;text-decoration:none;text-align:center;background-color:silver" href="{{route('book.create')}}"> create book</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">BOOK NAME</th>
                    <th scope="col"> AUTHOR NAME</th>
                    <th scope="col"> CATEGORY NAME</th>
                    <th scope="col"> SUPER CATEGORY NAME</th>
                    <th scope="col">RATE FROM 5</th>
                    <th style="color:blue" scope="col">EDIT</th>
                    <th style="color:red" scope="col">DELETE</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)                
                <tr>
                    
                    <td>{{$loop->iteration}}</td>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->book_author_name}}</td>
                    <td>{{$book->category->name}}</td>
                    <td>{{$book->category->super_category->name}}</td> 
                    <td>{{$book->rate}}</td> 
                    <td><a href="{{route('book.edit',$book->id)}}"> Edit</a></td> 
                    <td>
                        <form action="{{route('book.destroy',$book->id)}}" method="POST">
                            @csrf
                            @method('delete')
                        <input  style="color:red" type="submit" value="delete"></form>

                
                </tr>
    
                @endforeach
            </tbody>
        </table>
       
    </div>

</div>
@endsection
