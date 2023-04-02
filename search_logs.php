<?php
require_once 'includes/header.php';
if (!isset($_SESSION['parentId'])) {
    header("location: /index.php");
    exit();
}

require "includes/search_logs.inc.php";
?>

<main class="container-fluid">
    <h2 class="text-center"><?php echo "$childName $statusName"; ?> Search Logs
        <?php if ($phraseName !== "") : ?>
            <span>with </span><span class="text-danger">'<?php echo "$phraseName" ?>'</span>
        <?php endif ?>
    </h2>
    <section class="my-3 container-fluid">
        <form action="search_logs.php" method="get">
            <div class="input-group mb-3">
                <label class="input-group-text" for="childSelect">
                    Child:
                </label>
                <select class="form-select" id="childSelect" name="childSelect">
                    <option selected value="all">All</option>
                    <?php foreach ($myChildren as $myChild) : ?>
                        <option value="<?php echo $myChild["username"] ?>">
                            <?php echo $myChild["full_name"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label class="input-group-text" for="statusSelect">
                    Status:
                </label>
                <select class="form-select" id="statusSelect" name="statusSelect">
                    <option selected value="all">All</option>
                    <option value="Allowed">Allowed</option>
                    <option value="Blocked">Blocked</option>
                </select>
                <input class="form-control" type="text" name="phraseInput" id="phraseInput" placeholder="Search word">
                <button class="btn btn-outline-dark" type="submit" name="submit">Show</button>
            </div>
        </form>
    </section>

    <section class="container-fluid">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="col">Child</th>
                    <th scope="col">Request</th>
                    <th scope="col">Status</th>
                    <th scope="col">Time</th>
                </tr>
                <?php foreach ($searchLogs as $row) : ?>
                    <?php if ($row["status"] === "Blocked") : ?>
                        <tr class="table-dark">
                        <?php else : ?>
                        <tr>
                        <?php endif ?>
                        <td><?php echo $row["child"] ?></td>
                        <td><?php echo $row["searchRequest"] ?></td>
                        <td><?php echo $row["status"] ?></td>
                        <td>
                            <?php
                            $formattedDate = formatDate($row["searched_at"]);
                            echo $formattedDate;
                            ?>
                        </td>
                        </tr>
                    <?php endforeach; ?>

            </tbody>
        </table>
    </section>

</main>

<?php
include_once 'includes/footer.php';
?>