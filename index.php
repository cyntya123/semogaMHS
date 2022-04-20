<?php
///link dinamis
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'home':
            include "home.php";
            break;
        case 'login':
            include "login.php";
            break;
        case 'attendance':
            include "attendance.php";
            break;
        case 'logbook':
            include "logbook.php";
            break;
        case 'feedback':
            include "feedback.php";
            break;
        case 'registration':
            include "registration.php";
            break;
        case 'finalreport':
            include "finalreport.php";
            break;
        case 'formkerjasama':
            include "formkerjasama.php";
            break;
        case 'formnonkerjasama':
            include "formnonkerjasama.php";
            break;
        case 'information':
            include "information.php";
            break;
        case 'vattendance':
            include "vattendance.php";
            break;
        case 'vlogbook':
            include "vlogbook.php";
            break;
        default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
    }
} else {
    include "home.php";
}
