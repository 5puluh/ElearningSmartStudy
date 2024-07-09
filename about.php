<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Why choose us?</h3>
         <p>Interactive Learning Experience: SmartStudy leverages advanced e-learning technologies to create an interactive and immersive learning environment. Through multimedia resources, interactive quizzes, and collaborative discussions, we ensure that our students remain actively engaged throughout their learning journey.</p>
         <a href="courses.html" class="inline-btn">Our courses</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+1k</h3>
            <span>Online courses</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+25k</h3>
            <span>Brilliants students</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+5k</h3>
            <span>Expert teachers</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <span>Job placement</span>
         </div>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading">Student's reviews</h1>

   <div class="box-container">

      <div class="box">
         <p>I can't recommend SmartStudy enough! The courses offered on their platform have been a game-changer for me. The instructors are incredibly knowledgeable and make complex concepts easy to understand. The interactive learning experience keeps me engaged, and the personalized support I receive is exceptional. Thanks to SmartStudy, I've been able to expand my skills and advance in my career.</p>
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>Sarah Thompson</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>SmartStudy has been an incredible resource for my academic journey. The courses are well-structured, and the course materials are comprehensive and easy to follow. The flexibility to learn at my own pace has been a game-changer, and the live classes have allowed me to interact with instructors and fellow students. The supportive learning community at SmartStudy has made my learning experience enjoyable and rewarding.</p>
         <div class="user">
            <img src="images/pic-3.jpg" alt="">
            <div>
               <h3>Mark Rodriguez</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>SmartStudy has exceeded my expectations in every way. The quality of the course materials is outstanding, and the instructors are passionate and dedicated. The interactive quizzes and assignments have helped me reinforce my understanding of the subject matter. The pricing is affordable, making it accessible for students like me. SmartStudy has truly made learning enjoyable and convenient.</p>
         <div class="user">
            <img src="images/pic-4.jpg" alt="">
            <div>
               <h3>Emily Chen</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>I'm incredibly grateful to have found SmartStudy. The platform offers a wide range of courses that cater to various interests and skill levels. The instructors are experts in their fields and deliver the content in an engaging and relatable manner. The constant innovation and use of advanced technologies make the learning experience immersive and enjoyable. SmartStudy has helped me develop new skills and broaden my horizons.</p>
         <div class="user">
            <img src="images/pic-5.jpg" alt="">
            <div>
               <h3>Alex Johnson</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>SmartStudy has been a lifesaver for me. The self-paced courses have allowed me to balance my studies with other commitments. The course materials are comprehensive, and the user-friendly interface makes navigation a breeze. The personalized support I receive from the instructors is invaluable. SmartStudy has made learning convenient, enjoyable, and effective.</p>
         <div class="user">
            <img src="images/pic-6.jpg" alt="">
            <div>
               <h3>Samantha Lee</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>SmartStudy has truly transformed the way I approach learning. The platform offers a diverse range of courses that cater to different interests and goals. The instructors are not only knowledgeable but also approachable and responsive to student queries. The competitive pricing makes it accessible for students like me. Thanks to SmartStudy, I've gained new skills and confidence in my abilities.</p>
         <div class="user">
            <img src="images/pic-7.jpg" alt="">
            <div>
               <h3>Michael Patel</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

   </div>

</section>

<!-- reviews section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>