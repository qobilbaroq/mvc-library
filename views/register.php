<?php
if (!defined('SECURE_ACCESS')) {
    die('Direct access not permitted');
}
// if (isset($_SESSION['is_login']) == false) {
//     header('location: /login');
// }

include('templates/header.php') ?>

<div class="main-content login-panel">
    <div class="login-body">
        <div class="logo my-2 text-center">
            <h2>Library</h2>
            <hr>
        </div>
        <div class="bottom">
            <h3 class="panel-title">Registration</h3>
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
            <form method="POST" action="/register">
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Full Name"
                        name="name"
                        value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : "" ?>"
                        required>
                </div>
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Username"
                        name="username"
                        value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : "" ?>"
                        required>
                </div>
                <div class="input-group mb-20">
                    <span class="input-group-text"><i class="fa-regular fa-lock"></i></span>
                    <input
                        type="password"
                        class="form-control rounded-end"
                        placeholder="Password"
                        name="password"
                        required>
                </div>
                <button class="btn btn-primary w-100 login-btn" type="submit">Sign up</button>
            </form>

            <div class="other-option">
                <p>Already Have an Account? <a href="/login">login</a></p>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php') ?>