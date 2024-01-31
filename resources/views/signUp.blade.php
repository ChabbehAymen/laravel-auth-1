<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sign Up</title>
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
    <h1 class="text-light">Sign Up</h1>
    <div class="signup-form">
        <form action="{{url('/signing-up')}}" method="post" class="d-flex flex-column justify-content-center align-items-center gap-1 bg-white p-4 rounded-2 ">
            @csrf
            <input type="text" name="name" placeholder="Your Name" class="border-1 border-primary rounded-1 p-1"/><br />
            <input type="text" name="last_name" placeholder="Last Name" class="border-1 border-primary rounded-1 p-1"/><br />
            <input type="date" name="birth_date" class="w-100 border-1 border-primary rounded-1 p-1"/><br />
            <input type="email" name="email" placeholder="Enter an Email Address" class="border-1 border-primary rounded-1 p-1"/><br />
            <input type="text" name="user_name" placeholder="Enter a User Name" class="border-1 border-primary rounded-1 p-1"/><br />
            <input type="text" name="password" placeholder="Password" class="border-1 border-primary rounded-1 p-1"/><br />
            <input type="text" name="confirm_password" placeholder="Confirm Password" class="border-1 border-primary rounded-1 p-1"/><br />
            <input type="submit" value="Register" class="border-1 border-primary rounded-1 ps-2 pe-2 bg-transparent" />

        </form>
    </div>
</body>

</html>