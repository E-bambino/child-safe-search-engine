<?php
if (!isset($_SESSION['parentId'])) {
    header("location: /index.php");
    exit();
}
require_once 'includes/header.php';
require "includes/get_search_logs.inc.php";
?>

<main class="container-fluid">
    <h2><?php echo "$parent's Children"; ?></h2>

    <section class="my-3 container-fluid">
        <form action="search_contact.php" method="get" accept-charset="utf-8">
            <div class="row row-cols-lg-2 row-cols-sm-1 row-cols-md-2 g-2 my-2">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="reg_no" placeholder="Enter Registration Number">
                        <label for="username">Enter Registration Number</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit" name="submit">
                Search
            </button>
        </form>
    </section>

    <section class="container-fluid">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th scope="col">Child</th>
                    <th scope="col">Request</th>
                    <th scope="col">Time</th>
                </tr>
                <?php
                foreach ($parentInfo as $key => $value) {
                    echo "$key";
                }

                ?>
                <tr>
                    <td><?php echo $key; ?></td>
                </tr>
                <tr>
                    <td><?php echo $value; ?></td>
                </tr>
                <tr>
                    <td><?php echo $userMobilePhone; ?></td>
                </tr>

            </tbody>
        </table>
    </section>

</main>

<?php
include_once 'includes/footer.php';
?>