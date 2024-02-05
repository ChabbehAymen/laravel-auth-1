<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="<?php //echo resource_path('css/dashbord.css')
                                        ?>"> -->
    <style>
        table {
            border-collapse: collapse;
        }

        table thead {
            background-color: #ccc;
        }

        table td {
            border: 2px solid #979797;
            text-align: center;
            min-width: 9.5rem;
            font-size: 0.8rem;
        }

        table tbody {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body class="p-5">
    <div class="w-100 d-flex justify-content-center mt-5">
    <h1 class="mb-4">DashBoard</h1>
    </div>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>Name</td>
                <td>Last Name</td>
                <td>Birth Date</td>
                <td>Email</td>
                <td>User Name</td>
                <td>Last Session</td>
                <td>Password</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['last_name']}}</td>
                <td>{{$user['birth_date']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['user_name']}}</td>
                <td>{{$user['last_session']}}</td>
                <td>{{$user['password']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-100 d-flex justify-content-center mt-5">
    <a href="<?php echo route('logout'); ?>" class="btn btn-primary">Logout</a>
    </div>
</body>

</html>
