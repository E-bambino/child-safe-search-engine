<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (session_status() === PHP_SESSION_NONE) session_start();

require "db_conn.inc.php";
require "search_functions.php";
require "email_config.inc.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchRequest = $_POST["q"];
    $child = $_SESSION['childUsername'];
    $parent = getParent($conn, $child);
    $parentEmail = getParentEmail($conn, $parent);

    $isSafe = true;
    $searchRequestArray = explode(" ", $searchRequest);
    $bannedPath = "./banned.txt";

    // Read the content of the file into a string variable
    $bannedContent = file_get_contents($bannedPath);

    // Split the file content into an array of words
    $bannedArray = explode(',', $bannedContent);
    // Check if the word 'banana' is in the array

    foreach ($searchRequestArray as $word) {
        if (in_array($word, $bannedArray)) {
            $isSafe = false;
            $bannedWord = $word;
            break;
        }
    }

    if ($isSafe === false) {
        $recipient = $parentEmail;
        $subject = "Blocked Search";
        $body = "<p>Your child hass searched for a banned word ";
        $body .= "<h3>$word</h3> in the phrase $searchRequest<p><br>";


        if (sendEmail($recipient, $subject, $body)) {
            $_SESSION['alertSent'] = "Parent has been alerted successfully";
        } else {
            echo ("Email not sent");
        }

        $_SESSION['alertBannedSearch'] = "You have tried to search for an innapropriate word";
        
        // redirect page to awareness
        logSearch($conn, $searchRequest, $child, $parent, $isSafe);

        header("location: ../index.php");

        exit();
    } else {
        $searchResults = searchGoogle($searchRequest);
        displaySearchResults($searchResults);
    }

    logSearch($conn, $searchRequest, $child, $parent, $isSafe);
} else {
    echo "search not submitted";
}
