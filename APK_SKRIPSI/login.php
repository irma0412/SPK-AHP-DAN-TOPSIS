<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <title>LOGIN</title>
    <link href="assets/css/flatly-bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/navbar.css" rel="stylesheet" />

    <style>
        body:before {
            background-image: url("assets/img/bg.jpg");
            width: 100%;
            height: 100%;
            background-size: cover;
            content: "";
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
            display: block;
            filter: blur(2px);
        }

        .container {
            margin-top: 80px;
           
        }

        .panel {
            margin: 0 auto; /* Ini untuk centering */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 5px;
            position: relative;
        }


        .panel-heading {
            background-color: #008000;
            color: #fff;
            border-bottom: 1px solid #008000;
            text-align: center;
            padding: 20px 0;
        }
        .panel-heading img {
            width: 100px; /* Tambahkan properti ini */
            height: 100px; /* Tambahkan properti ini */
            border-radius: 100%;
            top: 0; /* Tambahkan properti ini */
            left: 0; /* Tambahkan properti ini */
            z-index: 0;
            transform: scale(1,1);
            transition-duration: 0.4s ;
            transition-property: transform;

        }

        .panel-title {
            font-weight: bold;
            font-size: 1.5em;
        }

        .panel-body {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .form-signin {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 0;
        }

        .form-group.password-toggle {
            position: relative;
        }

        .password-input {
            padding-right: 30px;
        }

        .toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #5630AB;
        }

        .btn-primary {
            background-color: #140439;
            border: 2px solid white;
            border-radius: 0;
        }

        .btn-primary:hover {
            background-color: #5630AB;
            border: 2px solid white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
    .panel {
        width: 90%;
        max-width: 90%; /* Ubah max-width untuk layar kecil */
        margin: 20px auto; /* Tambahkan margin atas dan bawah */
       
    }

    .panel-heading img {
        width: 80px; /* Ukuran logo lebih kecil */
        height: 80px;
    }

    .form-control {
        font-size: 16px; /* Ukuran font input lebih besar */
        padding: 10px; /* Ruang dalam input */
    }

    .btn-primary {
        font-size: 18px; /* Ukuran font tombol lebih besar */
    }
}

    </style>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <img src="assets/img/logo.jpeg" alt="Logo">
                    <h3 class="panel-title">Silahkan masuk</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_POST) include 'aksi.php'; ?>
                    <form class="form-box" action="?act=login" method="post">
                        <div class="form-group password-toggle">
                            <input type="text" class="form-control" placeholder="Username" name="user" autofocus autocomplete="off" />
                        </div>
                        <div class="form-group password-toggle">
                            <input type="password" class="form-control password-input" placeholder="Password" name="pass" id="passwordInput" />
                            <span class="toggle-icon" onclick="togglePassword('passwordInput')">&#x1F441;</span>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        var toggleIcon = document.querySelector(".toggle-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.innerHTML = "&#x1F440;"; // Closed eye icon
        } else {
            passwordInput.type = "password";
            toggleIcon.innerHTML = "&#x1F441;"; // Open eye icon
        }
    }
</script>
</html>
