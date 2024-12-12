<?php
if (!defined('SECURE_ACCESS')){
    die('Direct access not permitted');
}
include('templates/header.php') ?>

<div class="main-content login-panel">
        <div class="login-body">
            
                <div class="logo my-2 text-center">
                    <h2>Library</h2>
                    <hr>
                </div>

            <div class="bottom">
                <h3 class="panel-title">Login</h3>
                <?php if (isset($_SESSION['error'])) : ?>
                <div class="alert alert-danger text-center">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif ?>
                <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success text-center">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif ?>
                <form method="POST" action="/login">
                    <div class="input-group mb-25">
                        <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="username" 
                            name="username" 
                            value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?>">
                    </div>
                    <div class="input-group mb-20">
                        <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                        <input 
                            type="password" 
                            class="form-control rounded-end" 
                            placeholder="Password" name="password" 
                            value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?>">
                        <a role="button" class="password-show"><i class="fa-duotone fa-eye"></i></a>
                    </div>
                    <div class="d-flex justify-content-between mb-25">
                        <div class="form-check">
                        <p>Dont Have an Account <a href="/register">Create</a></p>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 login-btn">Sign in</button>
                </form>
            </div>
        </div>

        
<?php include('templates/footer.php') ?>