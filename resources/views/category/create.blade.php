<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('category.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="category name">
        <select name="super_category_id" id="" >
            @foreach($super_categories as $super_category)
            <option value="{{$super_category->id}}">{{$super_category->name}}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

</body>
</html>