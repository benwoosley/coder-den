<?php
$conn = new mysqli('localhost', 'projec6', 'password', 'posts');

if (!$conn) {
    echo "failed to connect" . $conn->connect_error;
}


if (!empty($_POST['email'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "SELECT * FROM posts WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {

    $sql = 'SELECT * FROM posts ORDER BY created_at';

    $result = mysqli_query($conn, $sql);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/darkmode.js" async></script>
    <script src="../js/colorchange.js" async></script>
</head>

<body>
    <header>
        <h1>Coder's Den</h1>
    </header>
    <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script>
        $(function() {
            $("#nav").hide();
            $("#menuBtn").on("click", function() {
                $("#nav").slideDown(500);
            });
            $("#menuBtn").on("dblclick", function() {
                $("#nav").slideUp(300);
            });
        });
    </script>
    <button id="menuBtn">Menu</button>
    <ul id="nav">
        <li><a href="../index.php"> Main Forum </a></li>
        <li><a href="../Accounts/login.html"> Login </a></li>
        <li><a href="../Accounts/signup.html"> Sign Up </a></li>
        <li><a href="index.php"> Questions </a></li>
        <li><a href="../aboutus.html"> About Us </a></li>
        <li><a href="../contactus.html"> Contact Us </a></li>
    </ul>



    <div class="container">
        <div class="column1">
            <h2>Search</h2>
            <div class="columncontent">
                <br>
                <form action="index.php" method="POST">
                    <p> Email (Empty for all)</p>
                    <input type="text" name="email">
                    <input type="submit" name="Submit">
                </form>
                <br>
            </div>
        </div>
        <div class="column1">
            <h2>Posts</h2>
            <?php foreach ($posts as $post) { ?>
                <div class="columncontent">
                    <h3> <?php echo htmlspecialchars($post['email']); ?></h3>
                    <?php if ($post['img_dir'] != './uploads/') { ?>
                        <figure class="thumbnail">
                            <img src="<?php echo htmlspecialchars($post['img_dir']); ?>" alt="no image">
                            <figcaption class="popup">
                                <a href="#">
                                    <img src="<?php echo htmlspecialchars($post['img_dir']); ?>" alt="thumbnail">
                                    <p>Full Image</p>
                                </a>
                            </figcaption>
                        </figure>
                    <?php } ?>
                    <div><?php echo htmlspecialchars($post['content']); ?></div>
                    <div>
                        <h4>Created at:<h4> <?php echo htmlspecialchars($post['created_at']); ?>
                    </div>
                </div>
            <?php }  ?>
        </div>
    </div>

    <a href="posts.php">[ Posts ]</a>

</body>

</html>