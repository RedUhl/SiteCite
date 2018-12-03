<?php
// $connection = new mysqli($hn, $un, $pw, $db);
// if ($_SERVER['REQUEST_METHOD']=='POST') {
//     $username=$_POST['username'];
//     $password=$_POST['password'];
//     if (isset($_POST['remember'])) {
//         $remember = "on";
//     } else {
//         $remember = "off";
//     }
//     //count_field_val doesn't exist, calls and checks if value exists can replace with token check
//     if (count_field_val($pdo, "users", "username", $username)>0) {
//         $user_data = return_field_data($pdo, "users", "username", $username);
//         if ($user_data['active']==1) {
//             if (password_verify($password, $user_data['password'])) {
//                 set_msg("Logged in successfully", "success");
//                 $_SESSION['username']=$username;
//                 if ($remember="on") {
//                     setcookie("username", $username, time()+86400);
//                 }
//                 redirect("home.php");
//             } else {
//                 set_msg("Password is invalid");
//             }
//         } else {
//             set_msg("User '{$username}' found but has not been activated");
//         }
//     } else {
//         set_msg("User '{$username}' does not exist");
//     }
// } else {
//     $username="";
//     $password="";
// }
?>




<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <style>
        body{
            font-family: 'Roboto', sans-serif;
            background-color: #ffff;
        }
        .main-section{

            margin: 0 auto;
            margin-top: 230px;
            padding: 0;
        }
        .modal-content{
            background-color: #660000;
            opacity: .95;
            padding: 0 18px;
            padding-bottom: 20px;
            box-shadow: 0px 0px 3px #848484;
        }
        .user-img{
            margin-top: -50px;
            margin-bottom: 35px;

        }
        .user-img img{
            height: 100px;
            width: 100px;
            border: none;
        }
        .form-group{
            margin-bottom: 25px;
        }
        .form-group input{
            height: 42px;
            border-radius" 5px;
            border: 0;
            font-size: 18px;
            padding-left: 54px;
        }
        .form-group::before{
            font-family: 'Font Awesome\ 5 Free';
            content: "\f007";
            position: absolute;
            font-size: 22px;
            color: #555e60;
            left: 28px;
            padding-top: 4px;
        }
        .form-group:last-of-type::before{
            content: "\f023";
        }
        button{
            width:40%;
            margin: 5px 0 25px;
        }
        .btn{
            background-color: #afe2ff
            color: #fff;
            font-size: 19px;
            padding: 7px 14px;
            border-radius: 5px;
            border-bottom: 4px solid #71f6ff;
        }
        .btn:hover, .btn:focus{
            background-color: #2face0;
            border-bottom: 4px solid #afe2ff!important;}
        
        .svg-inline--fa{
            font-size: 20px;
            margin-right: 7px;
        }
        
    </style>
</head>
<body>
    <div class="modal-dialog text-center">
        <div class ="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/_free-icons_png_1042_190293.png">
                </div>
                <form action="home.php" method="post" class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i>Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>