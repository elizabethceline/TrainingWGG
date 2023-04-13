<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
      height: 460px;
      width: 300px;
      left: 50%;
      top: 50%;
      position: absolute;
      transform: translate(-50%, -50%);
      padding: 30px 30px;
      background-color: rgb(233, 228, 216);
      border-radius: 40px;
    }

    .invalid-feedback {
        font-size: 10pt;
        margin-top: -20px;
        text-align: left;
        margin-left: 5px;
    }

    #nrp {
      width: 96%;
      padding: 10px;
      margin-top: 5px;
      display: inline-block;
      border: 2px solid rgb(56, 124, 59);
      background-color: rgb(249, 248, 244);
      border-radius: 5px;
      box-sizing: border-box;
      text-align: center;
    }

    #password {
      width: 96%;
      padding: 10px;
      margin-top: -15px;
      display: inline-block;
      border: 2px solid rgb(56, 124, 59);
      background-color: rgb(249, 248, 244);
      border-radius: 5px;
      box-sizing: border-box;
      text-align: center;
    }

    #tombol {
      height: 45px;
      width: 75px;
      background-color: rgb(56, 111, 72);
      border-radius: 5px;
      color: rgb(255, 255, 247);
      font-size: 10pt;
      margin-top: -15px;
    }

    #tombol:hover {
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

    #login {
        color: black;
        text-align: center;
        font-size: 12pt;
        margin-top: 8px;
    }

  </style>
</head>

<body>
    <div class="container my-5">
        <?php 
            $error = session()->has('error_val');
            $error_val = session()->getFlashdata('error_val');

            if (session()->has('msg_success'))
            echo '<div class="alert alert-success">'.session()->getFlashdata('msg_success').'</div>';
        ?>

        <div class="row justify-content-center">
            <div class="box text-center">
                <form method="post">
                    <p id="header">SIGN UP</p>
                    <hr>
                    <input type="text" value="<?=old('nrp')?>"name="nrp" id="nrp" placeholder="NRP" class="form-control<?=$error && !empty($error_val['nrp']) ?' is-invalid' : ''?>" required><br/>
                    <p>must be 9 characters</p>

                        
                    <?php if ($error && isset($error_val['nrp'])): ?>
                        <div class="invalid-feedback">
                            <?=$error_val['nrp']?>
                        </div>
                    <?php endif ?>
                        
                    <br/>

                    <input type="password" value="<?=old('password')?>" name="password" id="password" placeholder="Password" class="form-control<?=$error && !empty($error_val['password']) ?' is-invalid' : ''?>" required><br/>
                    <p>must be 8-20 characters</p>

                    <?php if ($error && isset($error_val['password'])): ?>
                        <div class="invalid-feedback">
                            <?=$error_val['password']?>
                        </div>
                    <?php endif ?>
                    <br/>
                    <button class="btn" name="submit" value="ya" id="tombol">Sign Up</button>
                    <p id="login">Kembali ke halaman <br><a href="<?=site_url('login')?>">Login</a></p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>