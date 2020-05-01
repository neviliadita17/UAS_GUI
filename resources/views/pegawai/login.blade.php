<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{url('/css/admin_style.css')}}">
    
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

        <form method="post" class="form">
            <div class="container">
                <label for="username"><b>Username</b></label>
                <input id="username" class="form-content" type="text" placeholder="Enter Username" name="username"
                    autocomplete="on" required>

                <label for="psw"><b>Password</b></label>
                <input id="password" class="form-content" type="password" placeholder="Enter Password" name="password"
                    autocomplete="on" required>

            </div>

            <input id="submit-btn" type="submit" name="submit" value="LOGIN" />

            <a href="#" id="signup">Klik disini untuk mendaftar</a>

    </div>



    </form>

    </div>
</body>

</html>
