<?php

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (session_status() === PHP_SESSION_NONE) session_start();

require "db_conn.inc.php";
require "search_logs_functions.inc.php";


$parent = $_SESSION['parentUsername'];
$childName = "All";
$statusName = "";
$phraseName = "";
$searchLogs = getAllSearchLogs($conn, $parent);


if (isset($_GET["submit"])) {
    $child = $_GET["childSelect"];
    $status = $_GET["statusSelect"];
    $phraseInput = $_GET["phraseInput"];

    if ($phraseInput !== "") {
        $phraseName = $phraseInput;
        $phrase = "%" . $phraseInput . "%";
        $searchLogs = searchAllSearchLogs($conn, $parent, $phrase);

        if ($child !== "all") {
            $childInfo = getChild($conn, $child);
            $childName = $childInfo["full_name"] . "'s";
            $searchLogs = searchChildSearchLogs($conn, $parent, $child, $phrase);

            if ($status !== "all") {
                $statusName = $status;
                $searchLogs = searchChildSearchLogsByStatus($conn, $parent, $child, $status, $phrase);
            }
        } else {
            if ($status !== "all") {
                $statusName = $status;
                $searchLogs = searchSearchLogsByStatus($conn, $parent, $status, $phrase);
            }
        }
    } else {
        if ($child !== "all") {
            $childInfo = getChild($conn, $child);
            $childName = $childInfo["full_name"] . "'s";
            $searchLogs = getChildSearchLogs($conn, $parent, $child);
            if ($status !== "all") {
                $statusName = $status;
                $searchLogs = getChildSearchLogsByStatus($conn, $parent, $child, $status);
            }
        } else {
            if ($status !== "all") {
                $statusName = $status;
                $searchLogs = getSearchLogsByStatus($conn, $parent, $status);
            }
        }
    }
}

$myChildren = getMyChildren($conn, $parent);
