<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin</title>    
<link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
</link>
</head>
<body class="text-center container">    
<main class="form-signin">
  <form action="check" method="post">
    <h1 class="h3 mb-3 fw-normal">Sign In</h1>
    <div class="form-floating">
      <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <?php include 'errors.php'?>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="signin">Sign in</button>
  </form>
  <?php if (isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
        ?>
      <a class="w-100 btn btn-lg btn-primary mt-3" href="signup" type="submit" name="againsignup">Sign up</a>
  <?php }?>
    <p class="mt-5 mb-3 text-muted">&copy; CEDCOSS Technologies</p>
</main>
</body>
</html>