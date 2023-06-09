<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .form-container{
            width: 30vw;
            /* height: 100vh; */
        }
        .buttons{
            display: flex;
            justify-content: center;
            margin-top: 3vh;
        }
        .error_display{
            padding: 0.5em 0.7em;
            border-radius: 0.2em;
            width: 30vw;
            background:  #ffb3b3;
            text:  #330000;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="text-center">Log In</h2>
        <form action="/module1/login" method="post" class="mt-5">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">

            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">

            <div class="buttons">
                <button class="btn btn-primary px-4" type="submit" name="submit">Sign In</button>
            </div>
        </form>
        <!-- <p class="text-center mt-3">New User? <a href="index.php">Sign Up</a></p> -->
    </div>
</body>
</html>