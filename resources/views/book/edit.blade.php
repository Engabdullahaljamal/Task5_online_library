<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- --}}
    <form action=" {{route('book.update',$book->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="book_name" placeholder="book name" value={{$book->book_name}}>
        <input type="text" name="book_author_name" placeholder="author name" . value={{$book->book_author_name}}>
        <select name="category_id" id="" >
            <option value="{{$book->category->id}}">{{$book->category->name}} {{$book->category->super_category->name}}</option>
            @foreach($categories as $category)
            @if($category->id != $book->category->id)
            <option value="{{$category->id}}">{{$category->name}} {{$category->super_category->name}}</option>
            @endif
            @endforeach
        </select>
        <select name="rate" id=""  >

            <option>{{$book->rate}}</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

            <input type="submit" value="update">
    
</body>
</html>