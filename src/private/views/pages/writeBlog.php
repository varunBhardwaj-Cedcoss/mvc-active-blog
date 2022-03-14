<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard Template · Bootstrap v5.1</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
  <!-- Custom styles for this template -->
  <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>
<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
<button class="navbar-toggler position-absolute d-md-none collapsed" 
type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" 
aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="debug.php">Sign out</a>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
        <ul class="nav flex-column">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="dashboard">
<span data-feather="home"></span>
Dashboard
</a>
</li>
<?php
if ($_SESSION['role']=='Admin') {?>
  <li class="nav-item">
<a class="nav-link" href="blogs">
  <span data-feather="shopping-cart"></span>
  Blogs
</a>
  </li>
<?php } else {?>
<li class="nav-item">
<a class="nav-link" href="userBlogs">
<span data-feather="file"></span>
Blogs
</a>
<?php }?>
  </li>
  <?php
    if ($_SESSION['role']=='Admin') {?>
  <li class="nav-item">
<a class="nav-link" href="users">
  <span data-feather="shopping-cart"></span>
  Users
</a>
  </li>
    <?php }?>
  <li class="nav-item">
<a class="nav-link" href="home">
  <span data-feather="file"></span>
  Home Page
</a>
  </li>
</ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <?php if (isset($_POST['edit'])) {?>
            <h1 class="h2">Update Blog</h1>
            <?php } else {?>
              <h1 class="h2">Add Blog</h1>
            <?php }?>
          <?php include('errors.php'); ?>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        <form action="<?php if (isset($_POST['edit'])) {
            ?>actionBlog<?php
                      } else {
                            ?>addBlog<?php
                      }?>" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Blog Title</label>
            <input type="text" name="title" value="
            <?php
            if (!empty($data)) {
                foreach ($data as $obj) {
                    echo $obj->title;
                }
            } ?>" class="form-control" id="inputEmail4">
          </div>
          <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Blog Content</label>
            <textarea type="text" name="content" value="
            <?php
            if (!empty($data)) {
                foreach ($data as $obj) {
                    echo $obj->content;
                }
            } ?>" class="form-control" id="inputEmail4">
            <?php
            if (!empty($data)) {
                foreach ($data as $obj) {
                    echo $obj->content;
                }
            } ?>
            </textarea>
          </div>
          <div class="col-12">
            <?php if (isset($_POST['edit'])) {?>
              <button type="submit" name="update" value="
                <?php
                if (!empty($data)) {
                    foreach ($data as $obj) {
                        echo $obj->blog_id;
                    }
                } ?>" class="btn btn-primary">Update Blog</button>
            <?php } else {?>
              <button type="submit" name="add" class="btn btn-primary">Add Blog</button>
            <?php }?>
          </div>
        </form>
      </main>
    </div>
  </div>
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>