<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
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

        th,
        td {
            text-align: center;
            font-size: 14pt;
        }

        .table {
            background-color: rgb(255, 255, 247);
            width: 1000px;
            margin-bottom: 50px;
            margin-top: 30px;
        }

        #edit {
            height: 40px;
            margin-top: 2px;
            background-color: rgb(56, 111, 72);
            border-radius: 5px;
            color: rgb(255, 255, 247);
            font-size: 10pt;
            padding: 9px;
        }

        #nonaktif {
            height: 40px;
            margin-top: 2px;
            background-color: rgb(56, 111, 72);
            border-radius: 5px;
            color: rgb(255, 255, 247);
            font-size: 10pt;
        }

        #aktif {
            height: 40px;
            margin-top: 2px;
            background-color: rgb(56, 111, 72);
            border-radius: 5px;
            color: rgb(255, 255, 247);
            font-size: 10pt;
        }

        #edit:hover {
          background-color: darkblue;
        }

        #nonaktif:hover {
          background-color: red;
        }

        
        #aktif:hover {
          background-color: blue;
        }

        #tombol-tambah {
            height: 60px;
            width: 200px;
            margin-top: 2px;
            background-color: white;
            border-radius: 5px;
            color: black;
            font-size: 14pt;
            padding: 15px;
            background-color: rgb(233, 228, 216);
        }

        #tombol-tambah:hover {
          background-color: lightseagreen;
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('login')?>">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="container my-5">
    <h1>Admin</h1>

    <?php if (session()->has('msg_success')) : ?>

      <div class="alert alert-success">
        <?= session()->getFlashdata('msg_success') ?>
      </div>

    <?php elseif (session()->has('msg_error')) : ?>

      <div class="alert alert-danger">
        <?= session()->getFlashdata('msg_error') ?>
      </div>

    <?php endif ?>

      <div class ="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NRP</th>
              <th scope="col">Nama</th>
              <th scope="col">Status</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php foreach ($data_admin as $admin) : ?>
              <tr>
                <td>-</td>
                <td><?= htmlspecialchars($admin->nrp) ?></td>
                <td><?= htmlspecialchars($admin->nama) ?></td>
                <td><?= htmlspecialchars($admin->status) ?></td>
                <td>
                    <?php if($admin->status == 'Aktif'): ?>
                      <?= form_open(site_url('admin/nonaktifkan')) ?>
                      <a href="<?= site_url('admin/sunting/' . $admin->nrp) ?>" class="btn btn-secondary btn-sm" id="edit">Edit</a>
                      <input type="hidden" name="nrp_nonaktif" value="<?= htmlspecialchars($admin->nrp) ?>">
                      <button type=submit name="nonaktifkan_data" value="ya" class="btn btn-danger btn-sm" id="nonaktif">Non-Aktifkan</button>
                      <?=form_close()?>

                    <?php else: ?>
                      <?= form_open(site_url('admin/aktifkan')) ?>
                      <a href="<?= site_url('admin/sunting/' . $admin->nrp) ?>" class="btn btn-secondary btn-sm" id="edit">Edit</a>
                      <input type="hidden" name="nrp_aktif" value="<?= htmlspecialchars($admin->nrp) ?>">
                      <button type=submit name="aktifkan_data" value="ya" class="btn btn-primary btn-sm" id="aktif">Aktifkan</button>
                      <?=form_close()?>
                    <?php endif; ?>

                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      
      <div class="box text-center">
        <a href="<?= site_url('admin/tambah/') ?>" class="btn btn-secondary btn-sm" id="tombol-tambah">Tambah Admin</a>
      </div>
  </div>
</body>

</html>