<?php
include('session-admin.php');
include('connect.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'delete_post' parameter is set in the POST data
    if (isset($_POST['delete_post'])) {
        // Retrieve the post ID from the POST data
        $postID = $_POST['delete_post'];

        // Prepare and execute the DELETE query
        $stmt = $conn->prepare("DELETE FROM updates WHERE uid = ?");
        $stmt->bindParam(1, $postID);

        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
        alert('Post Deleted');
        window.location.href = 'Updates.php';
      </script>";    
        } 
        else {
           echo "<script type='text/javascript'>alert('Error ');</script>";
        }
    }
}

?>
