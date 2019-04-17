<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_SESSION['didi'])){
    header("Location: index.php");
}

$mss = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
               $nuu=1;
                $mmu = mysqli_fetch_assoc($mss);
                   
                     $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($mmu['area'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);
       
            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($mmu['section'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);
                    
                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);
                    
               
                    
             

?>
<section>
  <b> إظهار البيانات  </b>
<!--
  <span> من </span>
  <input class="uk-input uk-width-auto" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="ميعاد القسط">
  <span> إلى </span>
  <input class="uk-input uk-width-auto" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" placeholder="ميعاد القسط">
-->

    
  <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>الإسم</th>
            <th>القسم</th>
            <th>المنطقة</th>
            <th>المبلغ</th>
            <th>ملحوظة</th>
            <th>رقم التليفون</th>
            <th>فترة التأخير</th>
          </tr>
        </thead>
          
        <tbody>
           
            
             <?php 
            $yyt = 0;
       
            $mii = mysqli_query($mu2,"SELECT * FROM users ORDER BY id DESC");
            while($uus = mysqli_fetch_assoc($mii)){
                     $total = 0;
            $total2 = 0;
            $total3 = 0;
            $total4 = 0;
                $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind=''");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                if(!empty($uus3w['total'])){
                    $total += myf2($uus3w['total']); 
                }else {
                    $total=0;
                }
                    
               
            }
                 $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind='".myf1("2st_pay")."'");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                if(!empty($uus3w['total'])){
                $total2 += myf2($uus3w['price']);
                }else {
                    $total2=0;
                }
            }
                 $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind='".myf1("2st_mortag3")."'");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                if(!empty($uus3w['total'])){
                $total3 += myf2($uus3w['price']);
                }else {
                    $total3=0;
                }

            }
                $ttoootal = intval($total) - (intval($total2)+intval($total3));
                if($ttoootal > 0 && $ttoootal!=0){
                        $m2wi = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind='".myf1("2st_pay")."' ORDER BY id DESC");
              $ssww = mysqli_fetch_assoc($m2wi);
      
                    $m88i = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($uus['section'])."'");
              $section = mysqli_fetch_assoc($m88i);
                  
                    
                          $db_pr = mysqli_query($mu2,"SELECT * FROM persmission WHERE worker_id='".$_SESSION['didi']."' AND section_id='".$uus['section']."'");
              $db_prs = mysqli_fetch_assoc($db_pr);
                
                if(!empty($db_prs['id']) || !empty($_SESSION['ta2_admin'])){
                    
                    
                     $m889i = mysqli_query($mu2,"SELECT * FROM areas WHERE section_id='".$uus['section']."' AND id='".myf2($uus['area'])."'");
              $area = mysqli_fetch_assoc($m889i);
                    
             $date_sd = "";
              $date_sm = "";
              $date_sy = "";
      $date_dd = date("d");
      $date_mm = date("m");
      $date_yy = date("Y");
      $calcuold=0;
      $calcutod=0;
              $nu=0;
                        //2019 : 03 : 02
                     $texdate = myf2($ssww['date_today']); 
                while($nu<strlen($texdate)){
                    if($nu<=3){
                      $date_sy .= $texdate[$nu];
                    }else if($nu>6 && $nu<9){
                        $date_sm .= $texdate[$nu];
                    }else if($nu>11){
                        $date_sd .= $texdate[$nu];
                    }
                    $nu++;
                }
                    if(!empty($ssww['id'])){
                         $calcuold += $date_sy * 365;
      $calcuold += $date_sm * 30;
      $calcuold += $date_sd;
                    }else {
                        $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind=''");
            $uus3w = mysqli_fetch_assoc($mi2is);
                        
                              $calcuold += myf2($uus3w['date_y']) * 365;
      $calcuold += myf2($uus3w['date_m']) * 30;
      $calcuold += myf2($uus3w['date_d']);
                    }
     
     
      $calcutod += $date_yy * 365;
      $calcutod += $date_mm * 30;
      $calcutod += $date_dd;
                    $ttotal = ($calcutod - $calcuold) - 30;
                    $ttotals = $total - ($total2 +$total3);
                $yyt++;
                  if($ttotal > 0){
                       $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind='' AND notes!=''");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                $notes = myf2($uus3w['notes']);
            }
                      $total22=0;
                      $total23=0;
                      $total24=0;
                         $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind=''");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                if(!empty($uus3w['total'])){
                $total22 += myf2($uus3w['total']);
                }else {
                    $total2=0;
                }
            }
                  
                $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind='".myf1("2st_pay")."'");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                if(!empty($uus3w['price'])){
                $total23 += myf2($uus3w['price']);
                }else {
                    $total2=0;
                }
            }
                 $mi2is = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($uus['id'])."' AND kind='".myf1("2st_mortag3")."'");
            while($uus3w = mysqli_fetch_assoc($mi2is)){
                if(!empty($uus3w['price'])){
                $total24 += myf2($uus3w['price']);
                }else {
                    $total3=0;
                }

            }
                  $as4=0;
                  $as4=$total22-($total23+$total24);
                      
            echo '
          
          <tr class="table__row">
            <td>'.$yyt.'</td>
            <td><a href="clientpage.php?i='.myf1($uus['id']).'"> '.myf2($uus['name']).' </a></td>
            <td><a href="area.php?n='.$section['name'].'&i='.myf1($section['id']).'"> '.myf2($section['name']).' </a></td>
            <td><a href="clients.php?n='.$area['name'].'&i='.myf1($area['id']).'"> '.myf2($area['name']).' </a></td>
            <td>'.$as4.'</td>
            <td> '.$notes.' </td>
            <td> '.myf2($uus['phone']).' </td>
            <td>'.$ttotal.' يوم</td>
     
          </tr>
            ';
            }
            }
            }
            }
            
            ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include'footer.php'; ?>
