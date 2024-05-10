<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('book.store')}}" method="POST">
        @csrf
        <input type="text" name="book_name" placeholder="book name">
        <input type="text" name="book_author_name" placeholder="author name">
        <select name="category_id" id="" >
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}} {{$category->super_category->name}}</option>
            @endforeach
           
        </select>
        <select name="rate" id="" >

            <option value="1">rate the book</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

           
        </select>
        <input type="submit">
    </form>

</body>
</html>