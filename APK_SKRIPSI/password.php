<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Toggle</title>
    <style>
        body {
            background-color: #3A3B3C;
            margin: 0; /* Menghilangkan margin bawaan dari body */
        }

        .btn-primary {
            background-color: #5630AB;
            border: 1px solid #5630AB;
        }

        .btn-primary:hover {
            background-color: #140439;
            border: 2px solid white;
        }

        .form-group label {
            color: white;
        }

        .password-toggle {
            position: relative;
        }

        .password-input {
            padding-right: 30px; /* Menyediakan ruang untuk ikon mata */
        }

        .toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #5630AB;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Ubah Password</h1>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <?php if ($_POST) include 'aksi.php'?>
            <form method="post" action="?m=password&act=password_ubah">
                <div class="form-group password-toggle">
                    <label>Password Lama <span class="text-danger">*</span></label>
                    <input class="form-control password-input" type="password" name="pass1" id="pass1"/>
                    <span class="toggle-icon" onclick="togglePassword('pass1')">&#x1F441;</span>
                </div>
                <div class="form-group password-toggle">
                    <label>Password Baru <span class="text-danger">*</span></label>
                    <input class="form-control password-input" type="password" name="pass2" id="pass2"/>
                    <span class="toggle-icon" onclick="togglePassword('pass2')">&#x1F441;</span>
                </div>
                <div class="form-group password-toggle">
                    <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                    <input class="form-control password-input" type="password" name="pass3" id="pass3"/>
                    <span class="toggle-icon" onclick="togglePassword('pass3')">&#x1F441;</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var toggleIcon = document.querySelector(".toggle-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                // Ganti ikon mata ke ikon tertutup
                toggleIcon.innerHTML = "&#x1F440;";
            } else {
                passwordInput.type = "password";
                // Ganti ikon mata ke ikon terbuka
                toggleIcon.innerHTML = "&#x1F441;";
            }
        }
    </script>
</body>
</html>
