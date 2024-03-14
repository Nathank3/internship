<?php
include('session-admin.php');
include('connect.php');



// Include the rest of your HTML code, including the footer
include('adminmenu.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: #F0F0F0;
        }

        h2 {
            margin-left: 55px;
            text-align: center; /* Center the heading text */
        }

        form {
            text-align: center; /* Center the form content */
        }

        textarea {
            margin-top: 10px;
            width: 500px;
            height: 200px; /* Adjust the height as needed */
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
            border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
            border-image: none;
            border-radius: 6px 6px 6px 6px;
            border-style: none solid solid none;
            border-width: medium 1px 1px medium;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
            color: #555555;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 1em;
            line-height: 1.4em;
            padding: 5px 8px;
            transition: background-color 0.2s ease 0s;
        }

        textarea:focus {
            background: none repeat scroll 0 0 #FFFFFF;
            outline-width: 0;
        }

        .btn-submit {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h2>Enter Your Post Here</h2>
    <form action="Updates.php" method="POST">
        <textarea placeholder="Type your Updates, announcements, or posts here" rows="20" name="posts" id="comment_text" cols="40" class="ui-autocomplete-input" required role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
        <br>
        <button type="submit" class="btn btn-success btn-submit">SUBMIT</button>
    </form>


<br><br>
     <div class="container mt-5">
     <h2>Manage Announcements </h2> <!-- Add a container for better styling and responsiveness -->
        <table class="table mx-auto" style="text-align: center; width: 70%;">
            <thead class="table-dark">
                <tr>
                    <th>Date Posted</th>
                    <th>Posts</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM updates ORDER BY DATE DESC";
                $query = $conn->prepare($sql);
                $query->execute();
                $fetch = $query->fetchAll();

                foreach ($fetch as $key => $value) { ?>
                    <tr>
                        <td><?php echo $value['Date'] ?></td>
                        <td><?php echo $value['posts'] ?></td>
                        
                        <td>
                            <form action="delete_post.php" method="post">
                        <input type="hidden" name="delete_post" value="<?php echo $value['uid']; ?>">
                        <button type="submit" class="btn btn-danger">Delete Post</button>
                        </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php include 'footer.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the entered post from the form
    $posts = $_POST['posts'];

    $stmt = $conn->prepare("INSERT INTO updates (posts) VALUES (?)");
    $stmt->bindParam(1, $posts);
    
    if ($stmt->execute()) {
        echo '<script>
                Swal.fire({
                    title: "Congratulations!",
                    text: " Post Updated.",
                    icon: "success",
                    confirmButtonText: "OK"
                });
              </script>';
    } else {
        echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Error in Posting.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
              </script>';
    }
}

 ?>