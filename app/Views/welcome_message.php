<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="public/js/sweetalert2.all.js"></script>
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

        .home {
            margin-top: 230px;
            text-align: center;
            font-size: 70pt;
            font-family: cursive;
            font-weight: bolder;
            text-shadow: 6px 4px 2px #627b86;
            letter-spacing: 20px;
            color: beige;
            animation: fadeIn 3s;
            -webkit-animation: fadeIn 3s;
            -moz-animation: fadeIn 3s;
            -o-animation: fadeIn 3s;
            -ms-animation: fadeIn 3s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-o-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>

</head>

<body>
    <?php if (session()->has('msg_success')) : ?>
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil login'
            })
        </script>

    <?php endif ?>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin">List Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('login')?>">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <h1 class="home">WELCOME</h1>
        </div>
    </div>
</body>

</html>