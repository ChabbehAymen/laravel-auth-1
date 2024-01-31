<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Bp11</title>
</head>
<style>
    body {
        height: 100vh;
        margin: 0;
        background-image: url("https://img.freepik.com/premium-vector/abstract-polygonal-backgrounds-black-tone_99087-44.jpg?size=626&ext=jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>

<body class="d-flex flex-column justify-content-center align-items-center gap-4">
    <a href="<?php echo route('signUp'); ?>" class="position-absolute top-0 end-0 me-4 mt-4 text-decoration-none text-light"> Don't have an Acount?<b class="text-decoration-underline"> Register Know!</b></a>
    <h1 class="text-light">Login</h1>
    <form action="{{url('/login')}}" method="post" class="d-flex flex-column justify-content-center align-items-center gap-1 bg-white p-4 rounded-3">
        @csrf
        <input type="text" name="userName_email" placeholder="User Name or Email" class="border-1 border-primary rounded-1 p-1"><br>
        <input type="text" name="password" placeholder="Password" class="border-1 border-primary rounded-1 p-1"><br>
        <input type="submit" name="login" value="LOGIN" class="border-1 border-primary rounded-1 ps-2 pe-2 bg-transparent">
    </form>
</body>

</html>