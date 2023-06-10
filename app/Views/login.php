<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
    <div class="container w-50 ">
        <main class="form-signin w-100 m-auto text-center">
            <form action="<?= base_url('/login') ?>" method="post">
                <h1 class="h3 mb-3 fw-normal">Login</h1>
                <?php
                if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo session()->getFlashdata('error') ?>
                    </div>
                <?php endif ?>
                <div class="form-floating">
                    <input type="username" class="form-control" id="floatingInput" placeholder="Username"
                        name="username">
                    <label for=" floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="name@gmail.com"
                        name="email">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                        name="password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div style="display: flex; padding-left:2px;">
                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                    <label for="showPassword" style="padding-left: 5px;">Show Password</label>
                </div>
                <button class="w-100 mt-2 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </main>
    </div>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("floatingPassword");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>