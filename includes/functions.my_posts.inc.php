<?php

/**
 * Gets jobs posted by a recrutier
 *
 * @param mysqli $conn connection to the database
 * @param string $recruiterID id of the recruiter
 *
 * @return mysqli_result
 */
function get_jobs_posted_by_id($conn, $recruiterID) {
    $query = "SELECT * FROM recruiter_posts WHERE rID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../controllers/my_posts.php?error=stmt_error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $_SESSION['recruiterID']);
    mysqli_stmt_execute($stmt);

    return mysqli_stmt_get_result($stmt);
}

/**
 * Converts an array to a string based on the provided delimiter
 *
 * @param array $array the array to be processed
 * @param string $delimiter the delimiter to be used
 * @return string
 */
function arrayToString($array, $delimiter) {
    $result = "";

    foreach ($array as $value) {
        $result .= $value;
        $result .= $delimiter;
    }
    return $result;
}
