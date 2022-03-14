<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SignUp</title>    

    <!-- Bootstrap core CSS -->
    <link href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="text-center container">
<!--   <script>window.location.href.includes('pages/pages')&&location.replace('/'); </script> -->
<main class="form-signin">
  <form action="pages/user" method="post">
    <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
    <div class="form-floating">
    <input type="text" class="form-control" name="username" id="floatingInput" placeholder="First name">
    <label for="floatingInput">User name</label>
    </div>
    <div class="form-floating">
    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
     <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating">
    <input type="password" class="form-control" name="password2" id="floatingPassword" placeholder="Re-enter Password">
    <label for="floatingPassword">Re-enter Password</label>
    </div>
    <?php include('errors.php');?>
    <button class="w-100 btn btn-lg btn-primary" name="signup" type="submit">Sign Up</button>
    </form>
    <?php if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = [];?>
      <a class="w-100 btn btn-lg btn-primary mt-3 mb-3" href="signin" >Sign In</a>
    <?php }?>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p> 
</main> 
</body>
</html>