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
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="#" class="navbar-brand">The<b>BlogGers</b></a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-nav action-buttons ml-auto">
<?php if (empty($_SESSION['user']) && empty($_SESSION['email'])) { ?>
<a href="signin" class="btn btn-primary nav-item nav-link mr-3">Login</a>
<?php } else { ?>
<a href="dashboard" class="nav-item nav-link">Dashboard</a>
<a href="signout" class="nav-item nav-link mr-3">Logout</a>
<?php } ?>
</div>
</div>
</nav>
<div class="container">
<div id='htm' class="row">
  <?php
    foreach ($data as $value) {
        ?>
            <div class="card d-inline-block" style="width: 15rem;margin:1rem;">
            <img class="card-img-top" style="height:10rem;" 
            src="https://cdn.dribbble.com/users/108186/screenshots/2990366/forest.jpg?compress=1&resize=400x300" 
            alt="Card image cap">
                <div class="card-body">
                <form action="actionHome" method="post">
                        <h5 class="card-title" name='title'>TITLE: <?php echo $value->title; ?></h5>
                        <p>writer: <small><?php echo $value->user_name; ?></small></p>
                        <h6 class="fw-bold">
                            <small>Date And Time</small>
                            <p class="text-danger"><?php echo $value->time_and_date; ?></p>
                        </h6>
                        <button value="<?php echo $value->blog_id; ?>"
                        name='more' class="btn btn-success">More</button>
                    </form>
                </div>
            </div>
    <?php }?>
</div>
</div>
</body>
</html>