<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
<title>Document</title>
</head>
<body style="background-color:#ffe5b4">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="#" class="navbar-brand">The<b>BlogGers</b></a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
<div class="navbar-nav action-buttons ml-auto">
<?php if (empty($_SESSION['user']) && empty($_SESSION['email'])) { ?>
<a href="signin" class="btn btn-primary nav-item nav-link mr-3">Login</a>
<?php } else { ?>
<a href="dashboard" class="nav-item nav-link">Dashboard</a>
<a href="signout" class="nav-item nav-link mr-3">signout</a>
<?php } ?>
</div>
</div>
</nav>
<div class="container">
<div id='htm' class="row">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-dark mt-3"><?php echo $data->title; ?></h1>
            </div>
            <div class="col-md-12 text-danger">
            <?php echo "Time:" . $data->time_and_date; ?>
            </div>
            </div>
            <div class="row">
                <div class="col-sm-4 deflist">
                    <?php echo "Blogger: " . $data->user_name; ?>
                    </div>
                    <div class="col-md-12 text-center about">
                        <h3 class="text-muted mt-3">Description</h3>
                    </div>
                    <div class="col-md-12 text-center about">
                        <h4 class=" text-primary mt-3"><?php echo $data->content;?></h4>
                    </div>
                </div>
            </div>
</div>
</div>
</body>
</html>