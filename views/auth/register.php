<?php require 'templates/header.php'; ?>

<div class="form-container">
            <div class="form-title">
                <h1>Inscription</h1>
            </div>
            <div class="success"><?php echo isset($success)? $success : "" ?></div>
            <div class="fail"><?php echo isset($fail)? $fail : "" ?></div>
            <div class="form-register">
                <form method="post" id="register">
                    <div class="form-row flex gap-5">
                        <input type="text" class="flex-1" name="first_name" id="firstname" placeholder="Your firstname...">
                        <input type="text" class="flex-1" name="last_name" id="lastname" placeholder="Your lastname...">
                    </div>
                    <div class="error-name flex gap-10 jcsb">
                        <div class="form-error error-firstname">
                        </div>
                        <div class="form-error error-lastname">
                        </div>
                    </div>
                    <div class="form-row flex">
                        <input type="email" class="flex-1" name="email" id="email" placeholder="Your email...">
                    </div>
                    <div class="form-error error-email">
                    </div>
                    <div class="form-row flex">
                        <input type="number" class="flex-1" name="phone" id="phone" placeholder="Your phone...">
                    </div>
                    <div class="form-error error-phone">
                    </div>
                    <div class="form-row flex relative">
                        <input type="password" class="flex-1" name="password" autocomplete="on" id="password" placeholder="Your password...">
                        <i class="fa-regular absolute icon-password fa-eye-slash"></i>
                    </div>
                    <div class="form-error error-password">
                    </div>
    
                    <div class="form-row flex relative">
                        <input type="password" class="flex-1" name="confirm_password" autocomplete="on" id="confirm-password"
                            placeholder="Confirm your password...">
                        <i class="fa-regular absolute icon-password fa-eye-slash"></i>
                    </div>
                    <div class="form-error error-confirmPassword">
                    </div>
                    <div class="form-button flex">
                        <button class="btn-submit flex-1" id="btn-submit" style="cursor: not-allowed ;" disabled>Register</button>
                    </div>
                </form>
            </div>
            <div class="register-message message">
                Vous avez un compte? si oui, alors <a href="/?route=login">cliquez ici</a> pour vous connecter.
            </div>
</div>

<?php require 'templates/footer.php'; ?>