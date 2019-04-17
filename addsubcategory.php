<div id="sub_category" class="uk-flex-top" uk-modal>
  <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

    <button class="uk-modal-close-default" type="button" uk-close></button>
    <div class="uk-padding">
      <h3>إدخال منطقة فرعية جديدة </h3>
      <form class="uk-grid-small" method="post" uk-grid>


        <div class="uk-width-1-1">
          <input class="uk-input" name="areass" type="text" placeholder="إسم المنطقة الفرعية">
        </div>
<?php
          $section_id = $_GET['i'];
          if(isset($_POST['buttonarea'])){
             if(!empty($_POST['areass']) && !empty($section_id)){
                    $msss = mysqli_query($mu2,"SELECT * FROM areas WHERE name='".myf1($_POST['areass'])."' AND section_id='".$section_id."'");
                 $rtse = mysqli_fetch_assoc($msss);
                 if(empty($rtse['id'])){
                     
                   $ms = mysqli_query($mu2,"INSERT INTO areas(name,section_id) VALUES ('".myf1($_POST['areass'])."','".$section_id."')");
                        
                if(isset($ms)){
             header("Location: area.php?n=".$_GET['n']."&i=".$_GET['i']);
                }
                 }
             }
          } 
          
          if(isset($_POST['buttondearea'])){
             if(!empty($_POST['areass']) && !empty($section_id)){
                   $msa = mysqli_query($mu2,"DELETE FROM areas WHERE name='".myf1($_POST['areass'])."' AND section_id='".$section_id."'");
                        
                if(isset($msa)){
header("Location: area.php?n=".$_GET['n']."&i=".$_GET['i']);
                }
             }
          } 
          ?>


        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="buttonarea" value="تأكيد"/>

        </div>
        <div class="uk-width-1-2">
          <input class="uk-button uk-button-default uk-width-expand" type="submit" name="buttondearea" value="حذف"/>

        </div>

      </form>
    </div>

  </div>
</div>
