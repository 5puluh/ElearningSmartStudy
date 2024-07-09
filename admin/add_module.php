<?php
include '../components/connect.php';

if (isset($_COOKIE['tutor_id'])) {
    $tutor_id = $_COOKIE['tutor_id'];
} else {
    $tutor_id = '';
    header('location:login.php');
}

if (isset($_POST['submit'])) {
    $id = unique_id();
    $status = $_POST['status'];
    $status = filter_var($status, FILTER_SANITIZE_STRING);
    $title = $_POST['title'];
    $title = filter_var($title, FILTER_SANITIZE_STRING);
    $description = $_POST['description'];
    $description = filter_var($description, FILTER_SANITIZE_STRING);

    $pdf = $_FILES['pdf']['name'];
    $pdf = filter_var($pdf, FILTER_SANITIZE_STRING);
    $pdf_ext = pathinfo($pdf, PATHINFO_EXTENSION);
    $rename_pdf = unique_id() . '.' . $pdf_ext;
    $pdf_tmp_name = $_FILES['pdf']['tmp_name'];
    $pdf_folder = '../uploaded_files/' . $rename_pdf;

    $add_playlist = $conn->prepare("INSERT INTO `content` (id, tutor_id, title, description, pdf, status, file_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $add_playlist->execute([$id, $tutor_id, $title, $description, $rename_pdf, $status, $pdf_folder]);
    move_uploaded_file($pdf_tmp_name, $pdf_folder);
    $message[] = 'New Module uploaded!';

    setcookie('tutor_id', $tutor_id, time() + (86400 * 30), '/'); // Set the tutor_id cookie for 30 days
}

// Fetch modules from the content table
$fetch_modules = $conn->prepare("SELECT * FROM content");
$fetch_modules->execute();
$modules = $fetch_modules->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

    <?php include '../components/admin_header.php'; ?>

    <section class="video-form">

        <h1 class="heading">Upload module</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <p>Module status <span>*</span></p>
            <select name="status" class="box" required>
                <option value="" selected disabled>-- Select status</option>
                <option value="active">Active</option>
                <option value="deactive">Deactive</option>
            </select>
            <p>Module title <span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="enter module title" class="box">
            <p>Module description <span>*</span></p>
            <textarea name="description" class="box" required placeholder="write description" maxlength="1000" cols="30" rows="10"></textarea>
            <p>Select PDF <span>*</span></p>
            <input type="file" name="pdf" accept="application/pdf" required class="box">
            <input type="submit" value="Upload Module" name="submit" class="btn">
        </form>

    </section>

    <?php include '../components/footer.php'; ?>

    <script src="../js/admin_script.js"></script>

</body>

</html>
