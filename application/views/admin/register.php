<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>SIPL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="">
                                    <span> <img src="assets/images/logo-light.jpg" alt="" height="50"></span>
                                </a>
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your own account, it takes less than a minute</p>
                            </div>
                            <div class="text-center w-75 m-auto">
                            <div class="alert alert-danger" style="display:none">
                            </div>

                            <?php echo form_open('register/insert', array('id' => 'form', 'role' => 'form'));?>
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" name="email" required placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" required id="password" name="password" placeholder="Enter your password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup" checked>
                                        <label class="custom-control-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
                                    </div>
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block btn-submit" type="submit"> Sign Up </button>
                                </div>

                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign up using</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Already have account? <a href="<?=base_url('/')?>" class="text-muted font-weight-medium ml-1">Sign In</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt">
        2016 - 2019 &copy;<a href="#" class="text-muted">SIPL</a>
    </footer>

    <script type="text/javascript">

        $(document).ready(function() {

          $(".btn-submit").click(function(e){
              e.preventDefault();
              $.ajax({
                 
                  url: $(this).closest('form').attr('action'),

                  type:$(this).closest('form').attr('method'),

                  data: $("#form").serialize(),

                  dataType: "json",
                  success: function(data) {
                      if(data.error){

                        $(".alert-danger").css('display','block');

                        $(".alert-danger").html(data.error);

                      }else if(data.code=='201'){
                         $(".alert-danger").css('display','block');

                        $(".alert-danger").html(data.message);
                      }else{
                        $(".alert-danger").css('display','none');
                        window.location.href = "<?php echo site_url('dashboard'); ?>";
                      }

                  }

              });

          }); 

        });

        </script>

</body>


</html>
