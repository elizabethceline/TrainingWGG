<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="public/js/sweetalert2.all.js"></script>

  <style>
    body {
      height: 100vh;
      background-color: rgb(144, 173, 161);
      font-family: cursive;
      background-image: url('https://i.pinimg.com/originals/ed/01/e5/ed01e56e76275954c73cdc389ac09032.jpg');
      background-size: cover;
      background-position: center;
    }

    .box {
      height: 485px;
      width: 300px;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      padding: 30px 30px;
      background-color: rgb(233, 228, 216);
      border-radius: 40px;
    }

    input[type=text],
    input[type=password] {
      width: 96%;
      padding: 10px;
      margin-top: 12px;
      display: inline-block;
      border: 2px solid rgb(56, 124, 59);
      background-color: rgb(249, 248, 244);
      border-radius: 5px;
      box-sizing: border-box;
      text-align: center;
    }

    input[type=radio]+label {
      margin: 0 55px 0 0;
    }

    button {
      height: 35px;
      width: 65px;
      background-color: rgb(56, 111, 72);
      border-radius: 5px;
      color: rgb(255, 255, 247);
      font-size: 10pt;
    }

    button:hover {
      background-color: grey;
    }

    p {
      color: grey;
      text-align: left;
      font-size: 10pt;
      padding: 5px;
    }

    #header {
      font-size: 20pt;
      color: rgb(49, 77, 57);
      font-weight: bolder;
      letter-spacing: 3px;
      text-align: center;
    }

    #signup {
      color: black;
      text-align: center;
      font-size: 10pt;
      margin-top: 8px;
    }
  </style>
</head>

<body>
  <?php 
    
    $error = session()->has('error_val');
    $error_val = session()->getFlashdata('error_val');
    ?>

<?php if (session()->has('msg_error')) : ?>
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: 'Username/password Anda salah.'
            })
        </script>

    <?php endif ?>
    <div class="box text-center">
      <form method="post">
        <p id="header">LOG IN</p>
        <hr>
        <input type="text" value="<?=old('nrp')?>" placeholder="NRP" name="nrp" id="nrp" required>
        <p>We'll never share your username with anyone else.</p>
        <input type="radio" class="form-check-input" id="user" name="status" value="User" required>
        <label for="user">User</label>
        <input type="radio" class="form-check-input" id="admin" name="status" value="Admin" required>
        <label for="admin">Admin</label><br>
        <input type="password" value="<?=old('password')?>" placeholder="Password" name="password" id="password" required>
        <p>must be 8-20 characters</p>
        <button type="submit">Sign In</button>
        <p id="signup">You don't have an account? <br><a href="<?=site_url('login/signup')?>">Sign Up</a> first!</p>
      </form>
    </div>
</body>

</html>