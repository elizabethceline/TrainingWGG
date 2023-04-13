<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <style>
         body {
            height: 100vh;
            /* background-color: rgb(144, 173, 161); */
            background-image: url('https://i.pinimg.com/originals/ed/01/e5/ed01e56e76275954c73cdc389ac09032.jpg');
            background-size: cover;
            background-attachment: fixed;
            font-family: cursive;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 99;
        }

        .navbar-toggler {
            background-color: white;
        }

        .navbar-nav {
            margin-left: 10px;
            padding: 20px;
            display: flex;
        }

        .nav-item {
            list-style: none;
            margin: 0 30px;
            transition: 0.5s;
        }

        .nav-link {
            display: block;
            position: relative;
            text-decoration: none;
            padding: 5px;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #fff;
            transition: 0.5s;
        }

        .nav-link:hover {
            transform: scale(1.5);
            color: beige;
        }

        h1 {
            text-align: center;
            font-size: 48pt;
            font-family: cursive;
            font-weight: bolder;
            text-shadow: 6px 4px 2px #627b86;
            letter-spacing: 20px;
            color: beige;
        }

        label {
            color: rgb(0, 0, 0);
            text-align: left;
            font-size: 16pt;
            padding-top: 7px;
            padding-left: 15px;
        }

        input[type=text]{
            position: relative;
            width: 96%;
            padding: 10px;
            display: inline-block;
            border: 2px solid rgb(56, 124, 59);
            background-color: rgb(249, 248, 244);
            border-radius: 5px;
            box-sizing: border-box;
            text-align: left;
        }

        .box {
            height: 355px;
            width: 900px;
            margin-top: 30px;
            padding: 40px 20px;
            background-color: rgb(233, 228, 216);
            border-radius: 40px;
        }

        #tambah {
            position: relative;
            height: 50px;
            width: 120px;
            margin-top: 25px;
            background-color: rgb(56, 111, 72);
            border-radius: 5px;
            color: rgb(255, 255, 247);
            font-size: 10pt;
        }

        #tambah:hover {
            background-color: grey;
        }
  </style>

</head>

<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('home')?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin')?>">List Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <div class="container my-5">
    <h1 id="subjudul">Tambah Admin</h1>   
  <?php 
  
  $error = session()->has('error_val');
  $error_val = session()->getFlashdata('error_val');
  if (session()->has('msg_success'))
    echo '<div class="alert alert-success">'.session()->getFlashdata('msg_success').'</div>';
  ?>

  <div class="row justify-content-center">
    <div class="box text-center">
        <form method="post">
            <label class="form-label">NRP</label>
            <input type="text" value="<?=old('nrp')?>"name="nrp" placeholder="Masukkan NRP" class="form-control<?=$error && !empty($error_val['nrp']) ?' is-invalid' : ''?>">

            <?php if ($error && isset($error_val['nrp'])): ?>

            <div class="invalid-feedback">
                <?=$error_val['nrp']?>
            </div>

            <?php endif ?>
            <br/>

            <label class="form-label">Nama</label>
            <input type="text" value="<?=old('nama')?>" name="nama" placeholder="Masukkan Nama" class="form-control<?=$error && !empty($error_val['nama']) ?' is-invalid' : ''?>"><br/>

            <?php if ($error && isset($error_val['nama'])): ?>
            <div class="invalid-feedback">
                <?=$error_val['nama']?>
            </div>
            <?php endif ?>
            <br/>

            <button class="btn btn-primary" name="submit" id = "tambah" value="ya">Tambah Admin</button>
        </form>
    </div>
  </div>
</div>
</body>
</html>