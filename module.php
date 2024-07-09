<?php
include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

$select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
$select_likes->execute([$user_id]);
$total_likes = $select_likes->rowCount();

$select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
$select_comments->execute([$user_id]);
$total_comments = $select_comments->rowCount();

$select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
$select_bookmark->execute([$user_id]);
$total_bookmarked = $select_bookmark->rowCount();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'components/user_header.php'; ?>

    <section class="module">
        <div class="container">
            <h1>Available Modules</h1>

            <?php
            $sql = "SELECT * FROM content WHERE status = 'active'"; // Removed the tutor_id condition since it's not available in this file
            $result = $conn->prepare($sql);
            $result->execute();

            if ($result !== false && $result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";

                    if (isset($row['pdf']) && !empty($row['pdf'])) {
                        echo "<a href='" . $row['pdf'] . "'>Download File</a>";
                    } else {
                        echo "<p>No file available for download.</p>";
                    }

                    echo "</div>";
                }
            } else {
                echo "<p>No modules found.</p>";
            }
            ?>

        </div>
    </section>

    <!-- footer section starts  -->
    <?php include 'components/footer.php'; ?>
    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>
