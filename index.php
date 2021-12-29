<?php
$conn = new mysqli('localhost', 'projec6', 'password', 'posts');
if (!$conn) {
    echo "failed to connect" . $conn->connect_error;
}

$sql = 'SELECT * FROM posts ORDER BY created_at';

$result = mysqli_query($conn, $sql);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="css/style.css">
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
        <li><a href="#"> Main Forum </a></li>
        <li><a href="Accounts/login.html"> Login </a></li>
        <li><a href="Accounts/signup.html"> Sign Up </a></li>
        <li><a href="Posts/index.php"> Questions </a></li>
        <li><a href="aboutus.html"> About Us </a></li>
        <li><a href="contactus.html"> Contact Us </a></li>
    </ul>
    <div class="imageheader">
        <img src="images/forum.jpg" alt="Main Forum">
    </div>
    <div class="container">
        <div class="column1">
            <h2>Forum Details</h2>
            <div class="columncontent">
                <p>This forum is to share your experiences with programming and the goal is to educate all who read
                    the discussions. </p>
            </div>
        </div>
        <div class="column1">
            <h2>Questions</h2>
            <div class="columncontent">
                <?php foreach ($posts as $post) { ?>
                    <div class="user">
                        <h3> <?php echo htmlspecialchars($post['email']); ?></h3>
                        <?php if ($post['img_dir'] != './uploads/') { ?>
                            <figure class="thumbnail">
                                <img src="<?php echo "./Posts/" . substr($post['img_dir'], 1); ?>" alt="<?php echo "./Posts/uploads" . substr($post['img_dir'], 1); ?>">
                                <figcaption class="popup">
                                    <a href="#">
                                        <img src="<?php echo "./Posts/" . substr($post['img_dir'], 1); ?>" alt="thumbnail">
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
        <div class="column1">
            <h2>Askers</h2>
            <div class="columncontent">
                <?php foreach ($posts as $post) { ?>
                    <div class="user">
                        <br>
                        <h3><?php echo htmlspecialchars($post['email']); ?></h3>
                        <br>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="questioncontainer">
        <div class="column1">
            <h2>Customization</h2>
            <div class="columncontent">
                <button id="dark-mode-toggle" class="dark-mode-toggle">Light/Dark</button>
                <br>
                <p> and choose your accent color...</p>
                <input type="color" class="colorInput" id="colorInput">
                <br>
                <button id="colorButton" onclick="changeColor()">Click to apply.</button>
                <br>
            </div>
        </div>
    </div>
    <script src="./js/darkmode.js"></script>
    <script src="./js/colorchange.js"></script>
</body>

</html>