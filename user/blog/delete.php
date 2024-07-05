<?php include('../../master/conn.php'); 
    include('../auth/middleware/auth.php');

$id = $_GET['id'];

$result = $conn->query("DELETE FROM blogs WHERE id = '$id'");

if ($result === TRUE) {
    $_SESSION['alert'] = 'Your Blog has been deleted.🗑️';
    header('Location: http://localhost/blogspot/user/blog/index.php');
} else {
    echo('<script>alert("Error.😒😒")</script>');
}