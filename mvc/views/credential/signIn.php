<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/signIn.css">

</head>

<body>
<div class="containerAll">
        <div class="container">
            <h1>SIGN IN FORM</h1>
            <div class="content">
                <div class="left"></div>
                <div class="right">
                    <form action="./PostSignIn" method="POST">
                    <div id="notify"><?php if(isset($data["notify"])) echo $data["notify"]; ?></div>
                        <p>Email</p>
                        <input type="text" placeholder="Email" name="email" id="email">
                        <p id="checkUsername"></p>
                        <p>Password</p>
                        <div class="inputPassword">
                            <input type="password" id="password" name="password" placeholder="Password">
                            <div id="toggle" onclick="show()"></div>
                        </div>
                        <div class="sign">
                            <input type="submit" value="Sign In" name="sbSignIn">
                            <a href="./signup"><input type="button" value="Logup" onclick=""></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var password = document.getElementById('password');
        var toggle = document.getElementById('toggle');

        function show() {
            if (password.type === 'password') {
                password.setAttribute('type', 'text');
                toggle.classList.add('hide');
            } else {
                password.setAttribute('type', 'password');
                toggle.classList.remove('hide');
            }
        }
        //var text = document.getElementById('errors');
        //text.innerHTML += `<li> 123456</li>`

        // for (let index = 0; index < error.length; index++) {
        //     const element = error[index];
        //     text.innerHTML += `<li>${element} 123456</li>`
        // }
    </script>
    <style>
        .container::before {
            background-image: url("../public/image/credential/signInBackground.jpg");
        }

        .container .content .left {
            background-image: url("../public/image/credential/signInAvatar.jpg");
        }

        .container .content .right input[type="text"],
        .container .content .right input[type="password"] {
            border-bottom: 3px solid #ff4d4d;
        }

        .container .content .right .sign input[type="submit"],
        .container .content .right .sign input[type="button"] {
            background-color: #ff4d4d;
        }
    </style>
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <script src="../public/js/main.js"></script> -->
</body>

</html>