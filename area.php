<?php 
session_start();
ob_start();
include 'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";
$_GET['i'] = str_replace("'","",$_GET['i']);
$_GET['n'] = str_replace("'","",$_GET['n']);

if(empty($_GET['i']) || empty($_GET['n']) || empty($_SESSION['didi'])){
    header("Location: index.php");
}
?>
<section>
  <div class="uk-text-center" uk-grid>
  <?php
      $ms = mysqli_query($mu2,"SELECT * FROM areas WHERE section_id='".$_GET['i']."' ORDER BY id DESC");
      while($ms2 = mysqli_fetch_assoc($ms)){
          $name = $ms2['name'];
          $id = $ms2['id'];
      echo '  <div class="uk-width-1-3">
      <a href="clients.php?n='.$name.'&i='.myf1($id).'">
        <div class="uk-card uk-card-default uk-padding uk-padding-large">
          <h1> '.myf2($name).' </h1>
        </div>
      </a>
    </div>
   ';
      }
      ?>
 
    <div class="uk-width-1-3">
      <a href="#sub_category" uk-toggle> 

        <div class="uk-card uk-card-default uk-padding uk-padding-large">
          <h1>
            إضافة منطقة جديدة
          </h1>
        </div>
      </a>
        
    </div>
  </div>
</section>
<?php 
ob_end_flush();
include'addsubcategory.php'; ?>
