<?php
require_once 'includes/header.php';
if (isset($_SESSION['resetSent'])) {
    echo $resetSentAlert;
    unset($_SESSION['resetSent']);
}

?>

<main class="container-fluid">
    <h2>Reset Your Password</h2>

    <?php
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($validator)) {
        echo "We could not validate your request";
    } else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
    ?>

            <form action="includes/reset_password.inc.php" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
                <div class="form-floating input-group my-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" onkeyup="checkPasswordMatch()">
                    <label for="password">Enter your password</label>
                    <button class="btn btn-sm btn-dark" type="button" id="show-password-button" onclick="togglePasswordVisibility('password', this)">
                        <img src="/img/open_eye.svg" alt="">
                    </button>
                </div>
                <div class="form-floating input-group my-3">
                    <input type="password" class="form-control" name="password2" id="confirm-password" placeholder="Confirm Password" onkeyup="checkPasswordMatch()">
                    <label for="password2">Confirm Password</label>
                    <button class="btn btn-sm btn-dark" type="button" id="show-confirm-password-button" onclick="togglePasswordVisibility('confirm-password', this)">
                        <img src="/img/open_eye.svg" alt="">
                    </button>
                </div>
                <button class="btn btn-success" type="submit" name="submit" id="submit-button">Reset Password</button>
            </form>

    <?php
        }
    }

    ?>
</main>

<?php
include_once 'includes/footer.php';
?>