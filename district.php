<?php 
session_start();
ob_start();
include'header.php';

require_once 'connect/secri.php';
require_once 'connect/confi.php';

if(empty($_SESSION['didi'])){
    header("Location: index.php");
}
?>
<section>
  <div class="uk-text-center" uk-grid>
<?php
      if(empty($_SESSION['ta2_admin'])){
         $hus = mysqli_query($mu2,"SELECT * FROM persmission WHERE worker_id='".$_SESSION['didi']."'");
      while($uhs=mysqli_fetch_assoc($hus)){
          
      $hu = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($uhs['section_id'])."'");
      $uh=mysqli_fetch_assoc($hu);
          $name = myf2($uh['name']);
          echo '
          <div class="uk-width-1-3 uk-first-column">
      <a href="area.php?n='.$uh['name'].'&i='.myf1($uh['id']).'">  <div class="uk-card uk-card-default uk-padding uk-padding-large">

                  <h1> '.$name.' </h1>


      </div></a>
    </div>
          ';
      } 
      }else {
 
      $hu = mysqli_query($mu2,"SELECT * FROM sections");
      while($uh=mysqli_fetch_assoc($hu)){
          $name = myf2($uh['name']);
          echo '
          <div class="uk-width-1-3 uk-first-column">
      <a href="area.php?n='.$uh['name'].'&i='.myf1($uh['id']).'">  <div class="uk-card uk-card-default uk-padding uk-padding-large">

                  <h1> '.$name.' </h1>


      </div></a>
    </div>
          ';
      
      }
      }
    
      if(!empty($_SESSION['ta2_admin'])){
    
          echo '
    
        <div class="uk-width-1-3">
      <a href="#new_category" uk-toggle> 

        <div class="uk-card uk-card-default uk-padding uk-padding-large">
          <h1>
            إضافة منطقة جديدة
          </h1>
        </div>
      </a>
      
          ';
      }
      
      ?>
  </div>
</section>
<?php include'addmaincategory.php'; ?>
