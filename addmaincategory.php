<div id="new_category" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3>إدخال منطقة رئيسية جديدة </h3>
      <form class="uk-grid-small" method="post" uk-grid>


        <div class="uk-width-1-1">
          <input class="uk-input" name="mai" type="text" placeholder="إسم المنطقة الرئيسية">
        </div>
<?php
          if(isset($_POST['buttonssceru'])){
             if(!empty($_POST['mai'])){
                   $mss = mysqli_query($mu2,"SELECT * FROM sections WHERE name='".myf1($_POST['mai'])."'");
                 $rte = mysqli_fetch_assoc($mss);
                 if(empty($rte['id'])){
                   $ms = mysqli_query($mu2,"INSERT INTO sections(name) VALUES ('".myf1($_POST['mai'])."')");
                 
                if(isset($ms)){
                   header("Location: district.php");
                }
                 }
             }
          } 
          
          if(isset($_POST['buttondelcusec'])){
             if(!empty($_POST['mai'])){
                   $msa = mysqli_query($mu2,"DELETE FROM sections WHERE name='".myf1($_POST['mai'])."'");
                        
                if(isset($msa)){
                    header("Location: district.php");
                }
             }
          } 
          ?>

        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="buttonssceru" value="تأكيد"/>

        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="buttondelcusec" value="حذف"/>

        </div>

      </form>
    </div>

  </div>
</div>
