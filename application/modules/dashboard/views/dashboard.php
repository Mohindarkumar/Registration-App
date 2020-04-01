<?php 
$path = 'http://localhost/Registration-App/userimage/';
if($this->session->userdata('name'))
{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Dashboard</title>
  </head>
  <body>
    <div class="container-fluid">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg static-top">
          <div class="container">
            <a class="navbar-brand" href="#">
                  <img src="<?php echo $path.$this->session->userdata('profileimage'); ?>" alt="" class="rounded-circle" width="30" height="30">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="<?php echo site_url('login/logout') ?>">Logout</a>
                </li>                
              </ul>
            </div>
          </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
          <h1 class="mt-4">Welcome to <?php echo $this->session->userdata('name'); ?></p>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
  </body>
</html>

<?php } else{
    redirect(site_url('login/index'));
} ?>