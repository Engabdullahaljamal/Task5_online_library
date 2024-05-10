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
    <form action=" {{route('category.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="category name" value={{$category->name}}>
        <select name="super_category_id" id="" >
            <option value="{{$category->super_category->id}}">{{$category->super_category->name}}</option> 
            @foreach($super_categories as $super_category)
            @if($super_category->id != $category->super_category->id)
            <option value="{{$super_category->id}}">{{$super_category->name}}</option>
            @endif
            @endforeach
        </select>
        <input type="submit" value="update">
</body>
</html>