<?php
$conn = new mysqli('localhost', 'projec6', 'password', 'posts');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (isset($_POST['Submit'])) {
    $image = $_FILES['file']['name'];

    $temp_name = $_FILES['file']['tmp_name'];
    $expensions = array("jpeg", "jpg", "png", "gif");
    $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    $file_size = $_FILES['file']['size'];
    $fileNameNew = uniqid('', true) . "." . $file_ext;
    $img_dir = "./uploads/" . $fileNameNew;

    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    if (empty($errors) === true) {
        move_uploaded_file($temp_name, $img_dir);
    }

    $email = $_POST["email"];
    $content = $_POST["content"];
    $sql = "INSERT INTO posts(email, content, img_dir) VALUES('$email', '$content', '$img_dir')";

    $result = mysqli_query($conn, $sql);
    if (false === $result) {
        printf("error: %s\n", mysqli_error($conn));
    }
}


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
    <div class="column1">
        <h2>Your Answer</h2>
        <div class="columncontent">
            <form action="posts.php" method="POST" enctype="multipart/form-data">
                <p> Email </p>
                <input type="text" name="email">
                <div class="answer">
                    <textarea rows="10" name="content"></textarea>
                    <input type="submit" name="Submit">
                    <input type="file" name="file" id="file">
                    <input type="reset" value="Reset">
                </div>
            </form>
        </div>

        <a href="index.php">[ Index ]</a>
    </div>
    </div>
</body>

</html>