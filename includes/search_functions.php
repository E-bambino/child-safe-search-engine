<?php
// function to check if parent already exists in the database
function logSearch($conn, $searchRequest, $child, $parent, $isSafe)
{
    if ($isSafe === true) {
        $status = "Allowed";
    } else {
        $status = "Blocked";
    }
    $sql = "INSERT INTO searchLogs (searchRequest, child, parent, status) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /index.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssss", $searchRequest, $child, $parent, $status);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    exit();
}

// function to check if parent already exists in the database
function getParent($conn, $child)
{
    $sql = "SELECT * FROM children WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $child);

    mysqli_stmt_execute($stmt);

    $parentresults = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($parentresults)) {
        if ($row["parent"]) {
            return $row["parent"];
        } else {
            echo "parent not found using ths wuery";
        };
    } else {
        echo "parent Not Found";
    }
    mysqli_stmt_close($stmt);
}

// function to check if parent already exists in the database
function getParentEmail($conn, $parent)
{
    $sql = "SELECT * FROM parents WHERE username=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $parent);

    mysqli_stmt_execute($stmt);

    $parentresults = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($parentresults)) {
        if ($row["email"]) {
            return $row["email"];
        } else {
            echo "parent email not found using this query";
        };
    } else {
        echo "parent email Not Found";
    }
    mysqli_stmt_close($stmt);
}


function searchGoogle($query)
{
    $apiKey = "AIzaSyCGu31QIOekOwZVVYPp918I6x_91fYv4No";
    $cx = "61627c3dee58a462f";
    $url = "https://www.googleapis.com/customsearch/v1?q=" . urlencode($query) . "&cx=" . $cx . "&key=" . $apiKey;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    $results = json_decode($response, true);

    return $results;
}

function displaySearchResults($results)
{
    if (!isset($results['items'])) {
        echo "No results found.";
        return;
    }

    foreach ($results['items'] as $result) {
        echo "<div class='search-result'>";
        echo "<h3 class='title'><a href='" . $result['link'] . "'>" . $result['title'] . "</a></h3>";
        echo "<p class='snippet'>" . $result['snippet'] . "</p>";
        echo "</div>";
    }
}
