<?php
include '../components/connect.php';

if (isset($_COOKIE['tutor_id'])) {
   $tutor_id = $_COOKIE['tutor_id'];
} else {
   $tutor_id = '';
   header('location:login.php');
}

if (isset($_POST['delete_module'])) {
   $delete_id = $_POST['module_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);
   $verify_module = $conn->prepare("SELECT * FROM `contents` WHERE id = ? LIMIT 1");
   $verify_module->execute([$delete_id]);
   if ($verify_module->rowCount() > 0) {
      $fetch_module = $verify_module->fetch(PDO::FETCH_ASSOC);
      $delete_module = $conn->prepare("DELETE FROM `contents` WHERE id = ?");
      $delete_module->execute([$delete_id]);
      unlink('../uploaded_files/' . $fetch_module['video']); // Remove the file from the uploaded_files directory
      $message[] = 'Module deleted!';
   } else {
      $message[] = 'Module already deleted!';
   }
}

if (isset($_POST['submit'])) {
   $id = unique_id();
   $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
   $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
   $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

   $video = filter_var($_FILES['video']['name'], FILTER_SANITIZE_STRING);
   $video_ext = pathinfo($video, PATHINFO_EXTENSION);
   $rename_video = unique_id() . '.' . $video_ext;
   $video_tmp_name = $_FILES['video']['tmp_name'];
   $video_folder = '../uploaded_files/' . $rename_video;

   $add_module = $conn->prepare("INSERT INTO `contents`(id, tutor_id, title, description, video, status) VALUES(?,?,?,?,?,?)");
   $add_module->execute([$id, $tutor_id, $title, $description, $rename_video, $status]);
   move_uploaded_file($video_tmp_name, $video_folder);
   $message[] = 'New module uploaded!';

   header('location: module.php'); // Redirect to module.php after successful upload
}

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
   
<section class="modules">

   <h1 class="heading">Your modules</h1>

   <div class="box-container">

   <div class="box" style="text-align: center;">
      <h3 class="title" style="margin-bottom: .5rem;">Create new module</h3>
      <a href="add_module.php" class="btn">Add module</a>
   </div>

   <?php
      $select_modules = $conn->prepare("SELECT * FROM `contents` WHERE tutor_id = ? ORDER BY date DESC");
      $select_modules->execute([$tutor_id]);

      if ($select_modules->rowCount() > 0) {
         while ($fetch_module = $select_modules->fetch(PDO::FETCH_ASSOC)) {
   ?>

   <div class="box">
      <div class="flex">
         <div><i class="fas fa-dot-circle" style="<?php if ($fetch_module['status'] == 'active') { echo 'color:limegreen'; } else { echo 'color:red'; } ?>"></i><span style="<?php if ($fetch_module['status'] == 'active') { echo 'color:limegreen'; } else { echo 'color:red'; } ?>"><?= $fetch_module['status']; ?></span></div>
      </div>
      <h3 class="title"><?= $fetch_module['title']; ?></h3>
      <p class="description"><?= $fetch_module['description']; ?></p>
      <a href="../uploaded_files/<?= $fetch_module['video']; ?>" target="_blank" class="btn">View Video</a>
      <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this module?');">
         <input type="hidden" name="module_id" value="<?= $fetch_module['id']; ?>">
         <button type="submit" name="delete_module" class="btn">Delete</button>
      </form>
   </div>

   <?php
         }

         // Display success message if uploaded content is available
         if (isset($message)) {
            foreach ($message as $msg) {
               echo '<p>' . $msg . '</p>';
            }
         }
      } else {
         echo '<p>No modules found.</p>';
      }
   ?>

   </div>

   <h1 class="heading">Grading</h1>

<div class="box-container">

<div class="box" style="text-align: center;">
<h3 class="title" style="margin-bottom: .5rem;">Input Grades Here</h3>
   <a href="grades.php" class="btn">Grading</a>
</div>

</section>



<?php include '../components/footer.php'; ?>

<script src="../js/admin_script.js"></script>

</body>
</html>