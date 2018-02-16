<?php

    //Message Variable
    $msg = '';
    $msgClass = '';

    //Submit
    if(filter_has_var(INPUT_POST, 'submit')){
        //Get Form Data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $order = $_POST['order'];
        $message = $_POST['message'];
        
        //Check Required Field
        if(!empty($name) && !empty($email) && !empty($order) && !empty($message)){
            //Proceed
            if(filter_var($email, FILTER_VALIDATE_EMAIL)=== false){
                //Failed
                $msg = 'Please use a valid email';
                $msgClass = 'alert-danger';
            } else {
                //Proceed
                $toEmail = 'johnmichaelaytona@gmail.com';
                $subject = 'Order Request From '.$name;
                $body = '<h2>Contact Request </h2>
                <h4>Name<h4><p>'.$name.'</p>
                <h4>Email<h4><p>'.$email.'</p>
                <h4>Order<h4><p>'.$order.'</p>
                <h4>Mesesage<h4><p>'.$message.'</p>
                ';
                
                //Email Headers
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-Type:text/html; charset=UTF-8" ."\r\n";
                
                //Additional Headers(from)
                $headers .= "From: ". $name."<". $email. ">". "\r\n";
                
                if(mail($toEmail, $subject, $body, $headers)){
                    //Email Sent
                    $msg = 'Your email has been sent';
                    $msgClass = 'alert-success';
                } else {
                    $msg = 'Your email was not sent';
                    $msgClass = 'alert-danger';
                }
                
            }
        } else {
            //Failed
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
       
        
    }
?>


    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Request Form</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Cookie|Dancing+Script" rel="stylesheet">
    </head>

    <body>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="assets/logo2.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php #home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php #section-events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php #section-catering">Catering</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php #section-gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php #section-about">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Offers</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="request-page.php">Request Order</a>
                            <a class="dropdown-item" href="package-page.php">Packages</a>
                            <a class="dropdown-item" href="design-page.php">Designs</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container">
            <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>">
                <?php echo $msg; ?>
            </div>
            <?php endif; ?>

            <h1>Request Order</h1>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="formGroupName">Full Name</label>
                    <input type="text" name="name" class="form-control" id="nameID" placeholder="Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupOrder">Email</label>
                    <input type="text" name="email" class="form-control" id="emailID" placeholder="Email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupOrder">Order Package</label>
                    <input type="text" name="order" class="form-control" id="orderID" placeholder="Order" value="<?php echo isset($_POST['order']) ? $order : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupPackage">Message</label>
                    <textarea type="text" name="message" class="form-control" id="messageID"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
        </div>


        <footer class="footer bg-inverse">
            <div class="footer-bg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="footer-img-wrapper">
                            <br>
                            <p class="text-center">Aytona Events & Catering Copyright &copy; 2017</p>
                            <a href="https://www.facebook.com/aytonaeventsandcatering/" target="_blank"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square fa-3x" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>
