<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Orig | Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>assets/img1/favicon.ico">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url();?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url();?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">




        <!-- Sign In Start -->


        <div class="container-fluid" style="background-image: url('<?= base_url();?>assets/img1/gallery/login10.jpg'); background-size: cover; background-position: center;">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;" >
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3 ">
                    <div class="d-flex align-items-center justify-content-center mb-3">
                    <form action="<?= base_url(); ?>index.php/admin" method="post">
                        <div class="text-center"> <!-- Center content -->
                            <h3 class="text-primary"><i class="fa fa-user me-2" style="color: maroon;"></i></h3>
                            <h3 style="color: maroon;">Sign In</h3>
                        </div>
                    
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="user_email" placeholder="name@example.com" required />
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" name="user_password" placeholder="Password" required />
                    <label for="floatingPassword">Password</label>
                </div>

                        
                        <button style= " background-color: maroon;" type="submit" name="login_btn" class="btn btn-primary py-3 w-100 mb-4" >Sign In</button>
                        
                        
                        <p class="text-center mb-0">Visit <a href="<?= base_url();?>index.php/home"style= " color: maroon;">Orig VetCare</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
    

    
</body>

</html>