<?php require 'templates/header.php'; ?>



<div class="form-container">
            <div class="form-title">
                <h1>Connexion</h1>
            </div>
            <div class="success"><?php echo isset($success)? $success : "" ?></div>
            <div class="fail"><?php echo isset($fail)? $fail : "" ?></div>
            <div class="form-login">
                <form method="post" id="login">
                    <div class="form-row flex">
                        <input type="email" class="flex-1" name="email" id="email" placeholder="Your email...">
                    </div>
                    <div class="form-error error-email">
                    </div>
                    <div class="form-row flex relative">
                        <input type="password" class="flex-1" name="password" autocomplete="on" id="password"
                            placeholder="Your password...">
                        <i class="fa-regular absolute icon-password fa-eye-slash"></i>
                    </div>
                    <div class="form-error error-password">
                    </div>
                    <div class="form-button flex">
                        <button class="btn-submit flex-1" id="btn-submit" style="cursor: not-allowed ;" disabled>login</button>
                    </div>
                </form>
            </div>
            <div class="login-message message">
                Vous n'avez pas un compte? si oui, alors <a href="/?route=register">cliquez ici</a> pour vous connecter.
            </div>
        </div>





<?php require 'templates/footer.php'; ?>