<?php   
Session::init();
global $db;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.css" type="text/css">
    <!-- My stylesheet-->
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" type="text/css">
    <title>Gavel</title>
    <style>
    /* .tt-hint,
        .cause {
            border: 2px solid #CCCCCC;
            border-radius: 8px 8px 8px 8px;
            font-size: 20px;
            height: 45px; 
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 100%;
        }
*/
        .tt-dropdown-menu {
            width: 100%;
            margin-top: 5px;
            padding: 8px 12px;
            background-color: #fff;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px 8px 8px 8px;
            font-size: 18px;
            color: #111;
            background-color: #F1F1F1;
        }
    </style>
    </style>
</head>

<body>
 
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="<?php echo URL; ?>public/img/Gavel-Logo.png" alt="Gavel_Logo" width="150px" height="61px"></a>
            </div>
            <!--<ul class="nav navbar-nav navbar-right menu">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-bars"></span>
                    <ul class="dropdown-menu">
                        <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
            </ul>-->
            </li>
            </ul>
        </div>
    </nav>
