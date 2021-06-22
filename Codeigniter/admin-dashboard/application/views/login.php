<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo base_url(); ?>User_login/login" id="user_login">
                        <h1>Login Form</h1>
                        <div class="notification"></div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Log In</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="<?php echo base_url(); ?>User_login/create_account" id="create_account">
                        <h1>Create Account</h1>
                        <div class="notification"></div>
                        <div>
                            <input type="text" class="form-control" placeholder="Full Name" name="name" required />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" name="email" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('form').submit(function(e) {
        e.preventDefault();
        var form_id = $(this).attr('id');
        var submit_button_text = $('form#' + form_id + ' input[type = "submit"]').val();
        $.ajax({
            url: $(this).attr('action'),
            data: new FormData($('form#' + form_id)[0]),
            type: 'POST',
            dataType: 'JSON',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('form#' + form_id + ' button[type = "submit"]').append(' <i class="fa fa-spinner fa-spin"></i>');
                $('form#' + form_id + ' input[type = "submit"]').val('Sending...');
                $('form#' + form_id + ' button[type = "submit"]').attr('disabled', 'true');
                $('form#' + form_id + ' input[type = "submit"]').attr('disabled', 'true');
            },
            success: function(data) {
                $('form#' + form_id + ' button[type = "submit"] .fa-spinner').remove();
                $('form#' + form_id + ' input[type = "submit"]').val(submit_button_text);
                $('form#' + form_id + ' button[type = "submit"]').removeAttr('disabled', 'false');
                $('form#' + form_id + ' input[type = "submit"]').removeAttr('disabled', 'false');

                $('form#' + form_id + ' .notification').html('<div id="message" class="alert ' + data.class + ' alert-dismissible">' + data.message);

                if (data.class == 'alert-success') {
                    $('form#' + form_id)[0].reset();
                }

                if (typeof data.redirect !== 'undefined' && data.redirect !== null) {
                    window.location.href = '<?php echo base_url(); ?>' + data.redirect;
                }
            }
        })
    })
</script>

</html>