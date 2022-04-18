<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    </style>
    <title>Document</title>
    @include('includes.appStyle')
</head>
<body>
    <div class="container">

<table class="table table-striped" >
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Updated At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$categories->id}}</td>
            <td><a href="{{URL('show')."/$categories->id"}}">{{$categories->name}}</a></td>
            <td>{{$categories->slug}}</td>
            <td>{{$categories->updated_at}}</td>
        </tr>
    </tbody>

    </table>
</div>
</body>
</html>
