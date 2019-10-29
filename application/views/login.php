<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
        <link rel="apple-touch-startup-image" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" href="images/apple-touch-startup-image-640x1096.png">
        <meta name="author" content="salatigaweb" />
        <meta name="description" content="Wedding Organizer Aplication" />
        <meta name="keywords" content="Wedding Organizer Aplication" />
        <title>Wedding Organizer</title>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?=base_url()?>assets/css/themes/default/jquery.mobile-1.4.5.css">
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/style.css" />
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/colors/yellow.css" />
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/css/swipebox.css" />
    </head>
    <body>
        <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.mobile-1.4.5.min.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/js/email.js"></script>
        <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.swipebox.js"></script>
        <script src="<?=base_url()?>assets/js/jquery.mobile-custom.js"></script>
        <style>
            .field-icon {
                float: right;
                margin-left: -25px;
                margin-top: -25px;
                position: relative;
                z-index: 2;
            }

            .container{
                padding-top:50px;
                margin: auto;
            }
        </style>

        <div data-role="page" id="login" class="secondarypage" data-theme="b">


            <div role="main" class="ui-content">

                <div class="content-block-login">
                    <div class="form_logo">
                        <center>
                            <br><br><br>
                            <img src="<?=base_url()?>assets/images/logo_mahkota.png" width="85%" style="margin: 0 auto">
                        </center>LOGIN</div>

                    <div class="loginform">
                        <?php
if (isset($message)) {
    ?>
                            <div style="color: red; text-align: center; width:100%; ">
                                <?=$message;?>
                            </div>

                            <?php
}
?>
                        <form id="formLogin" method="post" action="<?=base_url()?>Login/login">
                            <input type="text" name="username" value="" class="form_input required" placeholder="username" data-role="none" />
                            <input type="password" name="password" id="password-field" value="" class="form_input required" placeholder="password" data-role="none" />
                            <!--<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">dsds</span>-->
                            <!--<div class="forgot_pass"><a href="#" data-transition="slidedown">Forgot Password?</a></div>-->
                            <input type="submit" name="submit"  class="form_submit" id="submit" data-role="none" value="SIGN IN" style="background-color: #9f2b23" />
                        </form>

                    </div>


                </div>

            </div><!-- /content -->


        </div><!-- /page -->
        <script>
            $(function () {
                $("#alert").hide();
                var firstReload = localStorage.getItem('firstReload');
                if(firstReload == '1'){
                    localStorage.setItem('firstReload', 0);
                }
                localStorage.setItem('firstReload', 0);                
            });

            function loginForm() {
                localStorage.setItem('firstReload', 0);
                var formData = new FormData($("#formLogin")[0]);
                $('#formLogin').validate({
                    rules: {
                        username: "required",
                        password: "required"
                    },
                    messages: {
                        username: "Username harus di isi",
                        password: "Password  harus di isi"
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            url: "<?=base_url()?>Login/login",
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            dataType: "JSON",
                            success: function (data) {
                                if (data.code == "200") {
                                    alert(code);
                                    window.location.href = "<?=base_url()?>Dashboard";
                                } else {
                                    $("#alert").show();
                                    $("#alert").html(data.message);
                                }
                            }
                        });
                    }
                });
            }
        </script>
    </body>
</html>
