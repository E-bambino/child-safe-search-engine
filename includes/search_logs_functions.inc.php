<?php
// function to format date
function formatDate($dateString) {
    $date = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
    $formattedDate = $date->format('h:i a, jS F , Y');
    return $formattedDate;
}

// function to get the contact info for a user
function getAllSearchLogs($conn, $parent)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $parent);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

function getChildSearchLogs($conn, $parent, $child)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND child = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ss", $parent, $child);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}



// function to get the contact info for a user
function getMyChildren($conn, $parent)
{
    $sql = "SELECT * FROM children WHERE parent = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $parent);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

// function to get the contact info for a user
function getChild($conn, $child)
{
    $sql = "SELECT * FROM children WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $child);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $childInfo = $row = mysqli_fetch_assoc($resultData);

    mysqli_stmt_close($stmt);

    return $childInfo;
}

// function to get the contact info for a user
function getChildSearchLogsByStatus($conn, $parent, $child, $status)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND child = ? AND status = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sss", $parent, $child, $status);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

// function to get the contact info for a user
function getSearchLogsByStatus($conn, $parent, $status)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND status = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ss", $parent, $status);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

function searchChildSearchLogs($conn, $parent, $child, $phrase)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND child = ? AND searchRequest LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sss", $parent, $child, $phrase);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

// function to get the contact info for a user
function searchChildSearchLogsByStatus($conn, $parent, $child, $status, $phrase)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND child = ? AND status = ? AND searchRequest LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssss", $parent, $child, $status, $phrase);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

// function to get the contact info for a user
function searchSearchLogsByStatus($conn, $parent, $status, $phrase)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND status = ? AND searchRequest LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "sss", $parent, $status, $phrase);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}

// function to get the contact info for a user
function searchAllSearchLogs($conn, $parent, $phrase)
{
    $sql = "SELECT * FROM searchLogs WHERE parent = ? AND searchRequest LIKE ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ss", $parent, $phrase);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $searchLogs = [];
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($searchLogs, $row);
    }

    mysqli_stmt_close($stmt);

    return $searchLogs;
}
