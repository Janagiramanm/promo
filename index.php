<html>
<?php if (!isset($_SESSION)) { session_start(); } ?>
<head>
    <title>Pizzeria Locale</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <style>
.row.header {
    margin-top: 5%;
    padding: 2%;
}
.alert-danger, .alert-success{
    margin-top:10px;
}
.header a{
    margin:auto;
}


.main-content {
    margin: auto;
    margin-top: 10%;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    font-size: 26px;
    text-align: center;
    margin: auto;
}

</style>
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-xl-6 offset-xl-2 main-content">

                <div class="row header">
                    <a href="https://www.pizzerialocale.in/">
                      <img src="images/pizzeria-locale.png" />
                    </a>
                </div>
                <?php if($_SESSION['insert'] != 'success'){ ?>
                <form id="contact-form" method="post" action="sms.php" role="form">
                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="form_name">Name *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your Name" required="required"
                                        data-error="Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfCdIwaAAAAAG9XJrq4gQGTgeD2IT_b9zKSj-Eu" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="submit" class="btn btn-success btn-send" value="Send message">
                    </div>
                </form>
                <?php  }   if($_SESSION['user'] == 'exist'){ 
                     $_SESSION['user'] = '';
                    ?>
                            <div class="alert alert-danger" role="alert">
                                Opps This number is already used for the promo.
                            </div>
                <?php  } ?> 
            </div>
            <?php   if($_SESSION['insert'] == 'success'){ 
                                    
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                    Congratulation you have received 10% discount for Dine in. Check SMS for Promo Code 
                                    </div>
                                <?php
                                    $_SESSION['insert'] = '';
                                    $_SESSION['coupon'] = '';
                                    $_SESSION['expiry_date'] = '';
                            } ?>
          

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
</body>

</html>