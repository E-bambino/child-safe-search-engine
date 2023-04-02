<?php
require_once 'includes/header.php';
if (isset($_SESSION['resetSent'])) {
    echo $resetSentAlert;
    unset($_SESSION['resetSent']);
  }

?>

<main class="container-fluid">
    <h2>Reset Your Password</h2>
    <p>Email will be sent to reset your password</p>
    <form action="includes/reset-request.inc.php" method="post" accept-charset="utf-8">
        <div class="form-floating m-2">
            <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
            <label for="email">Enter Your Email</label>
        </div>
        <button class="btn btn-success" type="submit" name="reset-request-submit">Send Email</button>
    </form>
</main>

<?php
include_once 'includes/footer.php';
?>
