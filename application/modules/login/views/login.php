<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <title>Login</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header">
                    <h4>Login Form!</h4>

                    <?php if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger float-right">
                            <?php echo $this->session->flashdata('error'); ?>                            
                        </div>                        
                    <?php } ?>
                </div><br>
                <form action="<?php echo site_url('login/userCheck'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-4">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" id="email"><br>

                            <?php if (form_error('email')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo form_error('email'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="password"><br>

                            <?php if (form_error('password')) { ?>
                                <div class="alert alert-danger">
                                    <?php echo form_error('password'); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>                   

                    <div class="form-row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-success mt-3 col-4 float-right" id="register">Login</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
  </body>
</html>