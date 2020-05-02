<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{url('/assets/css/style.css')}}">
    <style></style>
</head>

<style>

</style>

<body class="login">
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN PASIEN</h2>
                <div class="underline-title"></div>
            </div>
        </div>

        <form action="{{url('/pasien/login/action')}}" method="post" class="form">
        {{csrf_field()}}
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input id="email" class="form-content" type="email" placeholder="Enter Email" name="email"
                    autocomplete="on" required>

                <label for="password"><b>Password</b></label>
                <input id="password" class="form-content" type="password" placeholder="Enter Password" name="password"
                    autocomplete="on" required>

            </div>

            <input id="login-btn" type="submit" name="submit" value="LOGIN" />

            <a href="/pasien/register" id="register">Klik disini untuk mendaftar</a>

    </div>



    </form>

    </div>
</body>

</html>
