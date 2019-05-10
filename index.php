<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";
if(!empty($_GET['we'])){
    session_destroy();
    header("Location: index.php");
}
 ?>
<section>
  <div class="uk-flex uk-flex-middle uk-flex-center">
<div class="uk-card uk-card-default uk-padding">
<h3> تسجيل الدخول </h3>
<form class="" method="post">
  <div class="uk-margin">
           <label for=""> إسم المستخدم </label>
           <input class="uk-input" type="text" name="username" placeholder="إسم المستخدم">
       </div>
       <div class="uk-margin">
                <label for=""> كلمة السر </label>
                <input class="uk-input" type="password" name="pass" placeholder="كلمة السر">
            </div>
            <div class="uk-margin">
              <input class="uk-button uk-button-default" name="log" type="submit" value="تسجيل الدخول"/>
<!--              <button class="uk-button uk-button-default" type="button" > خروج </button>-->
            </div>
<?php
    if(isset($_POST['log'])){
        if(!empty($_POST['username']) && !empty($_POST['pass'])){
                  $hu = mysqli_query($mu2,"SELECT * FROM worker WHERE name='".myf1($_POST['username'])."' AND passwd='".myf1($_POST['pass'])."'");
                         $uh=mysqli_fetch_assoc($hu);
            if(!empty($uh['id'])){
                $_SESSION['name'] = myf1($_POST['username']);
                $_SESSION['pass'] = myf1($_POST['pass']);
                $_SESSION['didi'] = myf1($uh['id']);
                $_SESSION['ta2_admin'] = myf2($uh['ta2_admin']);
                header("Location: district.php");
            }
        }
    }
    ?>
</form>
</div>
  </div>
</section>
<?php include'footer.php'; ?>
