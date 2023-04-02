<?php
include_once 'includes/header.php';
if (!isset($_SESSION['childId'])) {
    header("location: /index.php");
    exit();
}
?>

<main>
    <h1>
        Search Results
    </h1>
    <form class="d-flex" role="search" action="/search_results.php" method="post">
        <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit" value="Search">Search</button>
    </form>

</main>
<?php
require_once "includes/search.inc.php";
?>
<?php
include_once 'includes/footer.php';
?>