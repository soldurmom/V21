<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://localhost/newSite/public/js/main.js"></script>
</head>
<body>
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Company name</h4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis iusto fugiat reprehenderit quo commodi doloremque assumenda libero ad perspiciatis, laudantium dicta, itaque odit id necessitatibus cum vel aperiam officia veniam.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Check out</h4>
          <ul class="list-unstyled">
            <li><a href="/newSite/" class="text-white">Catalog</a></li>
            <li><a href="/newSite/about" class="text-white">About</a></li>
            <li><a href="/newSite/album" class="text-white">Album</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong></strong>
      </a>
        <div>
        <div class="text-end" style="text-align: right;">
            <?php if(isset($_COOKIE['user'])):?>
            <button type="button" class="btn btn-outline-light me-2"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-right:10px;" onclick="document.location='http://localhost/newSite/cart'"><?=$_COOKIE['user']?></button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Registrate" data-whatever="@mdo" style="background-color:#007bff; border-color:#007bff; margin-right:10px;" onclick="document.location='http://localhost//newSite/logout'">logout</button>
            <?php else:?>
          <button type="button" class="btn btn-outline-light me-2"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="margin-right:10px;" onclick="document.location='http://localhost/newSite/login'">Login</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Registrate" data-whatever="@mdo" style="background-color:#007bff; border-color:#007bff; margin-right:10px;" onclick="document.location='http://localhost/newSite/register'">Sign-up</button>
            <?php endif;?>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        </div>
        </div>
    </div>
  </div>
</header>
<div class="container">
