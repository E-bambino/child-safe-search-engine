<?php

require "includes/db_conn.inc.php";

$parent = $_SESSION['parentUsername'];

// function to get the contact info for a user
function getParentInfo($conn, $parent)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $parent);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $parentInfo = mysqli_fetch_assoc($resultData);

    mysqli_stmt_close($stmt);

    return $parentInfo;
}


$parentInfo = getParentInfo($conn, $parent);
