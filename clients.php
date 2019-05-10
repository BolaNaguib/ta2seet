<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_GET['i']) || empty($_GET['n']) || empty($_SESSION['didi'])){
    header("Location: index.php");
}else {
     $m8s5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($_GET['i'])."' AND name='".$_GET['n']."'");
             $m18mu = mysqli_fetch_assoc($m8s5);
    if(empty($m18mu['name'])){
           header("Location: index.php");
    }else {
             $m8105 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($m18mu['section_id'])."'");
             $m1810u = mysqli_fetch_assoc($m8105);
        
        $area = myf2($m18mu['name']);
        $area_id = myf1($m18mu['id']);
        
        $section = myf2($m1810u['name']);
        $section_id = myf1($m1810u['id']);
    }
}
   $nummber_user =0;
 
            $misi = mysqli_query($mu2,"SELECT * FROM users WHERE area='".$_GET['i']."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber_user += 1;
                
            }
    ?>
<section>
  <div class="" uk-grid>
    <div class="uk-width-1-2">
      <h3> المنظقة الرئيسية <b> <?php echo $section; ?> </b></h3>

    </div>
    <div class="uk-width-1-2">
      <h3> المنطقة الفرعية <b> <?php echo $area; ?> </b></h3>

    </div>
         <div class="uk-width-1-2">
      <h3> <b> <?php echo '<a href="reports.php?i='.$area_id.'"> تقارير  </a>'; ?> </b></h3>

    </div>
          <div class="uk-width-4-5">
              <form method="post">
              <input class="uk-button uk-button-defaul" type="submit" name="but" uk-toggle value="إضافة مستخدم"/>
                  <div class="uk-width-1-2">
      <h3><b> <?php echo $nummber_user; ?> </b> مستخدمين </h3>

    </div> 
              <?php
                  if(isset($_POST['but'])){
                      header("Location: addnewclient.php?n=".$_GET['n']."&i=".$_GET['i']);
                  }
                  
                  ?>
              </form>
       
    </div>
  </div>
<br>
    <form method="post">

  <div class="" uk-grid>

    <div class="uk-width-1-5">
      <b> إظهار البيانات  </b>
    </div>
    <div class="uk-width-4-5">
      <input class="uk-width-expand" onkeydown="mycsh()" name="wasdasdasd" id="wasdasdasd" type="text" />
    </div>
  </div>

</form>

<section>

  <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>الإسم</th>
            <th>المنطقة</th>
            <th>المبلغ</th>
 
            <th>دفع قسط</th>
            <th>حذف</th>

          </tr>
        </thead>
        <tbody id="pb2">
        
            <?php
             $nuu=0;
     
             $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($_GET['i'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);
       
            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($m122mu['section_id'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);
               
             $mss = mysqli_query($mu2,"SELECT * FROM users WHERE area='".$_GET['i']."' AND section='".$m122mu['section_id']."' ORDER BY id DESC");
               $nuu=1;
                while($mmu = mysqli_fetch_assoc($mss)){
                    
                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);
                    $nnus=0;
                     
          $nummber =0;
          $nummber2 =0;
          $nummber3 =0;
            $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."' AND kind=''");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber += intval(myf2($uuis['total']));
                
            }
             $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."' AND kind='".myf1("2st_pay")."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber2 += intval(myf2($uuis['price']));
                
            }
            $misi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."' AND kind='".myf1("2st_mortag3")."'");
            while($uuis = mysqli_fetch_assoc($misi)){
                $nummber3 += intval(myf2($uuis['price']));
                
            }
          $ttoal = $nummber - ($nummber2+$nummber3);
         
                       echo '
            
          <tr class="table__row">
            <td>'.$nuu.'</td>
            <td><a href="clientpage.php?i='.myf1($mmu['id']).'"> '.myf2($mmu['name']).' </a></td>
            <td> '.myf2($m122mu['name']).' </td>
            <td>'.$ttoal.'</td>

            ';
                    
            
                  if($ttoal>0){
                    echo '<td><a class="uk-button uk-button-default" name="button" href="pay.php?ii='.myf1($mmu['id']).'&i='.$_GET['i'].'&n='.$_GET['n'].'" uk-toggle=""> دفع القسط</a></td>
                     <td><a class="uk-button uk-button-default" name="button" href="addnewclient.php?de='.myf1($mmu['id']).'&i='.$_GET['i'].'&n='.$_GET['n'].'" uk-toggle=""> حذف</a></td>
          </tr>
            ';
                  }else {
                       echo ' <td></td><td><a class="uk-button uk-button-default" name="button" href="addnewclient.php?de='.myf1($mmu['id']).'&i='.$_GET['i'].'&n='.$_GET['n'].'" uk-toggle=""> حذف</a></td></tr>';
                  }
               
           
                    
                    $nuu++;
                }
            
            
            ?>
         
        </tbody>
      </table>
    </div>
  </div>
</section>
    <script type="application/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script type="application/javascript">
    function mycsh(){
        var ses = document.getElementById("wasdasdasd").value;
     
        $(function(){
            $("#pb2").load("connect/aja.php?a="+"<?php echo $area_id; ?>"+"&s="+"<?php echo $section_id; ?>"+"&u="+ses);
        })
    }
    </script>
<?php include'footer.php'; ?>
