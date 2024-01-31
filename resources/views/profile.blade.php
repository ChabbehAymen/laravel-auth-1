<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$user['name']}} Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
  <a href="<?php session()->flush();echo route('login'); ?>" class="position-absolute top-0 end-0 m-4 btn btn-primary">Logout</a>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" class="d-flex flex-column gap-2">
        @csrf
        <div class="w-100 d-flex justify-content-center gap-1 fs-4">
        <input type="text" name="last_name" value="{{$user['last_name']}}" class="border-0" style="width: 25%;"> 
        <input type="text" name="name" value="{{$user['name']}}" class="border-0" style="width: 25%;">
        </div>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{$user['last_session']}}</h6>
        <p class="card-text m-0">{{$user['email']}}</p>
        <p class="card-text m-0">{{$user['user_name']}}</p>
        <input type="date" name="birth_date" value="{{$user['birth_date']}}" class="border-0"><br>
        <input type="text" name="password" value="{{$user['password']}}" class="border-0">
        <div class="w-100 d-flex justify-content-center">
          <input type="submit" value="Change Data" class="bg-transparent border-1">
        </div>
      </form>
    </div>
</body>

</html>