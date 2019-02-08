<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/6/2019
 * Time: 9:11 PM
 */
?>
<script>switchClass("login");</script>

<div class="container">
    <form name="registerForm" class="form-horizontal" role="form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return validate()">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Login</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="you@example.com" required autofocus>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="email-error">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle" id="password-error">
                            <?php if(isset($error)){
                                echo $error;
                                unset($error);
                            } ?>
                        </span>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Login</button>

            </div>
        </div>
    </form>
    <p>Don't have a login? <b><a href="<?php echo ROOT_URL; ?>user/register">Register Here!</a></b></p>
</div>