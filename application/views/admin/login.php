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
                                <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin
                                    panel.</p>
                            </div>
                            <div class="text-center w-75 m-auto">
                            <div class="alert alert-danger" style="display:none">
                            </div>
                           </div>
                         <?php echo form_open('login/check', array('id' => 'form', 'role' => 'form'));?>
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" id="" placeholder="Enter your email" name="email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                    <div id="error"></div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block btn-submit">Log In</button>
                                </div>

                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign in with</h5>
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
                            <p> <a href="#" class="text-muted ml-1">Forgot your password?</a></p>
                            <p class="text-muted">Don't have an account? <a href="<?=base_url()?>register" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
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
                        document.cookie = "user_id ="+data.data.id;
                        document.cookie = "name ="+data.data.first_name+" "+data.data.last_name;
                        document.cookie = "email ="+data.data.email;
                        <?php @$_SESSION['user_id']=$_COOKIE['user_id'];?>
                        <?php @$_SESSION['email']=$_COOKIE['email'];?>
                        <?php @$_SESSION['name']=$_COOKIE['name'];?>
                        window.location.href = "<?php echo site_url('dashboard'); ?>";

                      }

                  }

              });

          }); 

        });

        </script>

</body>


</html>
