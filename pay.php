<?php 
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";
if(empty($_GET['i']) || empty($_GET['n'])){
    header("Location: index.php");
}else {
            $users = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['ii'])."'");
        $info_users = mysqli_fetch_assoc($users);
}

?>
<div class="uk-flex-top" >

    <div class="uk-padding">
      <h3> دفع قسط </h3>
      <form class="uk-grid-small" method="post" uk-grid>
<!--
        <div class="uk-width-1-2@s">
          <input class="uk-input" type="text" placeholder="التاريخ">
        </div>
-->
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" value="<?php echo myf2($info_users['name']); ?>" placeholder="إسم العميل">
        </div>
        <div class="uk-width-1-1@s">
          <input class="uk-input" type="text" name="price" placeholder="المبلغ">
        </div>


        <div class="uk-width-1-1">
          <input class="uk-input" type="textarea" name="notes" placeholder="ملاحظات">
        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="pay" value="تأكيد"/>

        </div>
      <?php
          if(isset($_POST['pay'])){
              if(!empty($_POST['price']) && !empty($_POST['notes'])){
                   $date_today = date("Y : m : d");
          $upas = mysqli_query($mu2,"INSERT INTO pays(client_id,price,notes,el2st_or_cash,date_today) VALUES ('".$_GET['ii']."','".myf1($_POST['price'])."','".myf1($_POST['notes'])."','".myf1("2st")."','".myf1($date_today)."')");

                  if(isset($upas)){
                     header("Location: clients.php?i=".$_GET['i']."&n=".$_GET['n']);
                  }
              }
          }
          
          ?>

      </form>
    </div>

</div>
<?php include'footer.php'; ?>
