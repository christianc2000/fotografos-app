<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subir</title>
</head>
<body>
    <form action="{{route('fotografia.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control my-2" type="file" id="foto" name="foto">

        <button class="btn btn-success" type="submit">OK</button>
    </form>
   
</body>
</html>