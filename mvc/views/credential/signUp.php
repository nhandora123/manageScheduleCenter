<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>SIGN UP FORM</h1>
        <div class="content">
            <div class="left"></div>
            <div class="right">
                <form action="./PostSignUp" method="POST">
                    <h3><?php 
                    if(isset($data["notify"]))
                    print_r($data["notify"])?></h3>
                    <p>Username</p>
                    <input type="text" placeholder="Email" name="email" id="email" required>
                    <div id="checkUsername"></div>
                    <p>Password</p>
                    <div class="inputPassword">
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <div id="toggle" onclick="show()"></div>
                    </div>

                    <p>Full Name</p>
                    <input type="text" placeholder="Full name" name="fullname" id="" required>
                    
                    <p>Develop Code</p>
                    <input type="text" placeholder="Develop code" name="developCode" id="" required>
                    <div class="radioPermission">
                        <div class="">
                            <label for="radioOperator">Operator</label>
                            <input type="radio" name="radioPermission" id="radioOperator" value="operator"><br>
                        </div>
                        <div class="">
                            <label for="radioTeacher">Teacher</label>
                            <input type="radio" name="radioPermission" id="radioTeacher" value="teacher"><br>
                        </div>
                    </div>
                    <div class="sign">
                        <input type="submit" id="submit" value="Sign Up" name ="sbSignUp">

                        <a href="../"><input type="button" value="Comeback"></a>
                    </div>
                </form>
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
    </script>

    <link rel="stylesheet" href="../public/css/signIn.css">
    <style>
        .container::before {
            background-image: url("../public/image/credential/signUpBackground.jpg");
        }

        .container .content .left {
            background-image: url("../public/image/credential/signUpAvatar.jpg");
        }

        .container .content .right input[type="text"],
        .container .content .right input[type="password"] {
            border-bottom: 3px solid rgb(41, 112, 206);
        }

        .container .content .right .sign input[type="submit"],
        .container .content .right .sign input[type="button"] {
            background-color: rgb(41, 112, 206);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../public/js/signUp.js"></script>
</body>

</html>