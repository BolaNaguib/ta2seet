<?php 
session_start();
ob_start();
include'header.php'; 

require_once "connect/confi.php";
require_once "connect/secri.php";

if(empty($_SESSION['didi']) || empty($_GET['i'])){
    header("Location: index.php");
}

$mss = mysqli_query($mu2,"SELECT * FROM users WHERE id='".myf2($_GET['i'])."'");
               $nuu=1;
                $mmu = mysqli_fetch_assoc($mss);
                   
                     $mss5 = mysqli_query($mu2,"SELECT * FROM areas WHERE id='".myf2($_GET['i'])."'");
             $m122mu = mysqli_fetch_assoc($mss5);
       
            $mss35 = mysqli_query($mu2,"SELECT * FROM sections WHERE id='".myf2($mmu['section'])."'");
             $m1232mu = mysqli_fetch_assoc($mss35);
                    
                     $s835 = mysqli_query($mu2,"SELECT * FROM el2st WHERE user_id='".myf1($mmu['id'])."'");
             $m89mu = mysqli_fetch_assoc($s835);
                    
               
                    
         function mydate($y1,$m1,$d1,$y2,$m2,$d2){
    $arat=array();
    if($y1==$y2){
        if($m2==$m1){
           if($d1<$d2){
                while($d1<=$d2){
                    array_push($arat,"%$y1%$m2%$d1%");
                $d1++;
            }
           }
        }else if($m2>$m1){
            $total1 = $m2 - $m1;
        if($total1==1){
            $total_d = (31 - $d1) + $d2+$d1;
//            echo $total_d."<br>"; 
            while($m1<=$m2){
                 while($d1<=$total_d){
               if($d1<=31){
                    array_push($arat,"%$y1%$m1%$d1%");
               }else if($d1==32){
                 $d1=0;
                   $total_d -= 31; 
                   $m1++;
               }
                $d1++;
            }
                $m1++;
            }
        
        }else if($total1>1){
               $total_d = (( 31 * $total1) - $d1) + $d2+$d1;
//            echo $total_d."<br>"; 
            while($m1<=$m2){
                 while($d1<=$total_d){
               if($d1<=31){
                    array_push($arat,"%$y1%$m1%$d1%<br>");
               }else if($d1==32){
                 $d1=0;
                   $total_d -= 31; 
                   $m1++;
               }
                $d1++;
            }
                $m1++;
            }
        }
                
            }
        }
    return $arat;
    }
    
    function myda($art){
        $num=0;
        while($num<count($art)){
//            $str = $art[$num];
            $art[$num] = str_replace(": 1 :",": 01 :",$art[$num]);
            $art[$num] = str_replace(": 2 :",": 02 :",$art[$num]);
            $art[$num] = str_replace(": 3 :",": 03 :",$art[$num]);
            $art[$num] = str_replace(": 4 :",": 04 :",$art[$num]);
            $art[$num] = str_replace(": 5 :",": 05 :",$art[$num]);
            $art[$num] = str_replace(": 6 :",": 06 :",$art[$num]);
            $art[$num] = str_replace(": 7 :",": 07 :",$art[$num]);
            $art[$num] = str_replace(": 8 :",": 08 :",$art[$num]);
            $art[$num] = str_replace(": 9 :",": 09 :",$art[$num]);

               $art[$num] = str_replace(": 1%",": 01%",$art[$num]);
            $art[$num] = str_replace(": 2%",": 02%",$art[$num]);
            $art[$num] = str_replace(": 3%",": 03%",$art[$num]);
            $art[$num] = str_replace(": 4%",": 04%",$art[$num]);
            $art[$num] = str_replace(": 5%",": 05%",$art[$num]);
            $art[$num] = str_replace(": 6%",": 06%",$art[$num]);
            $art[$num] = str_replace(": 7%",": 07%",$art[$num]);
            $art[$num] = str_replace(": 8%",": 08%",$art[$num]);
            $art[$num] = str_replace(": 9%",": 09%",$art[$num]);
            
             $art[$num] = str_replace("%1%","%01%",$art[$num]);
            $art[$num] = str_replace("%2%","%02%",$art[$num]);
            $art[$num] = str_replace("%3%","%03%",$art[$num]);
            $art[$num] = str_replace("%4%","%04%",$art[$num]);
            $art[$num] = str_replace("%5%","%05%",$art[$num]);
            $art[$num] = str_replace("%6%","%06%",$art[$num]);
            $art[$num] = str_replace("%7%","%07%",$art[$num]);
            $art[$num] = str_replace("%8%","%08%",$art[$num]);
            $art[$num] = str_replace("%9%","%09%",$art[$num]);

               $art[$num] = str_replace("%1%","%01%",$art[$num]);
            $art[$num] = str_replace("%2%","%02%",$art[$num]);
            $art[$num] = str_replace("%3%","%03%",$art[$num]);
            $art[$num] = str_replace("%4%","%04%",$art[$num]);
            $art[$num] = str_replace("%5%","%05%",$art[$num]);
            $art[$num] = str_replace("%6%","%06%",$art[$num]);
            $art[$num] = str_replace("%7%","%07%",$art[$num]);
            $art[$num] = str_replace("%8%","%08%",$art[$num]);
            $art[$num] = str_replace("%9%","%09%",$art[$num]);
            
            
            $num++;
        }
        return $art;
    }


?>
<section>
  <b> إظهار البيانات  </b>
<form method="post">
    
      <span> من </span>
  <input class="uk-input uk-width-auto" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="fromdate" placeholder="ميعاد القسط">
  <span> إلى </span>
  <input class="uk-input uk-width-auto" type="date" data-uk-datepicker="{format:'DD.MM.YYYY'}" name="todate" placeholder="ميعاد القسط">

<input type="submit" class="uk-button uk-button-default" type="submit" name="search" value="بحث"/>
    </form>
      <div class="uk-width-1-2">
      <h3>  <?php echo '<a href="reports_m.php?i='.$_GET['i'].'"> تقارير مفصلة  </a>'; ?> </h3>

    </div>
<?php
    if(isset($_POST['search'])){
           $date_fd = "";
              $date_fm = "";
              $date_fy = "";
      $date_td = "";
              $date_tm = "";
              $date_ty = "";
        
echo '    <div class="uk-margin">
    <b>من :</b><span>'.$_POST['fromdate'].'</span>
    <b>الي :</b><span>'.$_POST['todate'].'</span>
    
    
    </div>';
              $nu=0;
                        //2019-04-02
                     $texdate = myf2($_POST['fromdate']); 
                while($nu<strlen($texdate)){
                    if($nu<4){
                      $date_fy .= $texdate[$nu];
                    }else if($nu>4 && $nu<7){
                        $date_fm .= $texdate[$nu];
                    }else if($nu>7){
                        $date_fd .= $texdate[$nu];
                    }
                    $nu++;
                }
                  $nu=0;
                        //2019 : 04 : 02
                     $texdate = myf2($_POST['todate']); 
                while($nu<strlen($texdate)){
                    if($nu<4){
                      $date_ty .= $texdate[$nu];
                    }else if($nu>4 && $nu<7){
                        $date_tm .= $texdate[$nu];
                    }else if($nu>7){
                        $date_td .= $texdate[$nu];
                    }
                    $nu++;
                    
                }
       
        $total_m = $date_tm - $date_fm;
        $total_y = $date_ty - $date_fy;

        
        $aee = mydate($date_fy,$date_fm,$date_fd,$date_ty,$date_tm,$date_td);
$arr = myda($aee);
        $nnswuww = 0;
        $back = 0;
        $el2st = 0;
        $cash = 0;
        while($nnswuww<count($arr)){
           
          $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE date_today LIKE '".myf1($arr[$nnswuww])."' AND kind!='' OR date_today LIKE '".myf1($arr[$nnswuww])."' AND kind!='".myf1('cash')."' ORDER BY id DESC");
            
             while($m8wmu = mysqli_fetch_assoc($s835wa)){
                 
                 $s835wa_u = mysqli_query($mu2,"SELECT * FROM users WHERE  id='".myf2($m8wmu['user_id'])."' AND area='".$_GET['i']."'");
             $m8wmu_u = mysqli_fetch_assoc($s835wa_u);
                 
                 if(!empty($m8wmu_u['id'])){
                     if($m8wmu['kind']==myf1("2st_pay")){
                         $el2st+=myf2($m8wmu["price"]);
                     }else if($m8wmu['kind']==myf1("cash_pay")){
                         $cash+=myf2($m8wmu["price"]);
                     }else if($m8wmu['kind']==myf1("cash_mortag3")){
                         $back+=myf2($m8wmu["price"]);
                          
                     }else if($m8wmu['kind']==myf1("2st_mortag3")){
                         $back+=myf2($m8wmu["price"]);
                     } 
                 }
                 
             }
            $nnswuww++;
        }
    
       $tos = ($el2st + $cash ) - $back;
        
        echo '
         <div class="uk-margin">
    <b>تم دفع للقسط :</b><span>'.$el2st.'</span>
    <b>تم دفع للكاش :</b><span>'.$cash.'</span>
    <b>مرتجعات :</b><span>'.$back.'</span>
    
    <b>الباقي :</b><span>'.$tos.'</span>

  </div>
    
        
        ';
        echo '
          <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>إسم المنتج</th>
            <th>الإسم</th>
            <th>المبلغ</th>
            <th>ملحوظة</th>
            <th>النوع</th>
            <th>التاريخ</th>
          </tr>
        </thead>
          
        <tbody>
        ';
         
        
$nnswuww = 0;
        $back = 0;
        $el2st = 0;
        $cash = 0;
        $tex="";
        $nmnus=0;
        while($nnswuww<count($arr)){
             
          $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE date_today LIKE '".myf1($arr[$nnswuww])."' AND kind!=''");
            
             while($m8wmu = mysqli_fetch_assoc($s835wa)){
                 
                 $s835wa_u = mysqli_query($mu2,"SELECT * FROM users WHERE  id='".myf2($m8wmu['user_id'])."' AND area='".$_GET['i']."'");
             $m8wmu_u = mysqli_fetch_assoc($s835wa_u);
                 
                 
                 if(!empty($m8wmu_u['id'])){
                    
                     if($m8wmu['kind'] == myf1("2st_pay")){
                   $tex="دفع قسط";
                            $nmnus++;
                             echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }else if($m8wmu['kind'] == myf1("cash_pay")){
                         $tex="دفع كاش";
                            $nmnus++;
                       echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }else if($m8wmu['kind'] == myf1("cash_mortag3")){
                        $tex="مرتجع كاش";
                            $nmnus++;
                            echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }else if($m8wmu['kind'] == myf1("2st_mortag3")){
                           $tex="مرتجع قسط";
                            $nmnus++;
                         echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }
                    
                               
                     
                 }
                 
             }
            $nnswuww++;
        }
    
            
        
          
           echo '
                </tbody>
      </table>
    </div>
  </div>';
        
    
    
    }else {
          $back = 0;
        $el2st = 0;
        $cash = 0;
        $tex="";
        $nmnus=0;
    
              $date_today = date("%Y : m : d%");
        $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE date_today LIKE '".myf1($date_today)."' AND kind!='' OR date_today LIKE '".myf1($date_today)."' AND kind!='".myf1('cash')."' ORDER BY id DESC");
            
             while($m8wmu = mysqli_fetch_assoc($s835wa)){
                 
                 $s835wa_u = mysqli_query($mu2,"SELECT * FROM users WHERE  id='".myf2($m8wmu['user_id'])."' AND area='".$_GET['i']."'");
             $m8wmu_u = mysqli_fetch_assoc($s835wa_u);
                 
                 if(!empty($m8wmu_u['id'])){
                     if($m8wmu['kind']==myf1("2st_pay")){
                         $el2st+=myf2($m8wmu["price"]);
                     }else if($m8wmu['kind']==myf1("cash_pay")){
                         $cash+=myf2($m8wmu["price"]);
                     }else if($m8wmu['kind']==myf1("cash_mortag3")){
                         $back+=myf2($m8wmu["price"]);
                          
                     }else if($m8wmu['kind']==myf1("2st_mortag3")){
                         $back+=myf2($m8wmu["price"]);
                     } 
                 }
                 
             }
            $nnswuww++;
        }
    
       $tos = ($el2st + $cash ) - $back;
        
        echo '
         <div class="uk-margin">
    <b>تم دفع للقسط :</b><span>'.$el2st.'</span>
    <b>تم دفع للكاش :</b><span>'.$cash.'</span>
    <b>مرتجعات :</b><span>'.$back.'</span>
    
    <b>الباقي :</b><span>'.$tos.'</span>

  </div>
    
        
        ';
        echo '
          <div class="" uk-grid>
    <div class="uk-width-1-1">
      <table class="uk-table  uk-table-justify uk-table-divider">
        <thead>
          <tr>
            <th>م</th>
            <th>إسم المنتج</th>
            <th>الإسم</th>
            <th>المبلغ</th>
            <th>ملحوظة</th>
            <th>النوع</th>
            <th>التاريخ</th>
          </tr>
        </thead>
          
        <tbody>
        ';
         
        
$nnswuww = 0;
        $back = 0;
        $el2st = 0;
        $cash = 0;
        $tex="";
        $nmnus=0;

             
          $s835wa = mysqli_query($mu2,"SELECT * FROM el2st WHERE date_today LIKE '".myf1($date_today)."' AND kind!=''");
            
             while($m8wmu = mysqli_fetch_assoc($s835wa)){
                 
                 $s835wa_u = mysqli_query($mu2,"SELECT * FROM users WHERE  id='".myf2($m8wmu['user_id'])."' AND area='".$_GET['i']."'");
             $m8wmu_u = mysqli_fetch_assoc($s835wa_u);
                 
                 
                 if(!empty($m8wmu_u['id'])){
                    
                     if($m8wmu['kind'] == myf1("2st_pay")){
                   $tex="دفع قسط";
                            $nmnus++;
                             echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }else if($m8wmu['kind'] == myf1("cash_pay")){
                         $tex="دفع كاش";
                            $nmnus++;
                       echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }else if($m8wmu['kind'] == myf1("cash_mortag3")){
                        $tex="مرتجع كاش";
                            $nmnus++;
                            echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
                     }else if($m8wmu['kind'] == myf1("2st_mortag3")){
                           $tex="مرتجع قسط";
                            $nmnus++;
                         echo '
          
          <tr class="table__row">
            <td>'.$nmnus.'</td>
            <td>'.myf2($m8wmu['product_name']).'</td>
            
           
            <td>'.myf2($m8wmu_u['name']).'</td>
            <td>'.myf2($m8wmu['price']).'</td>
            <td> '.myf2($m8wmu['notes']).' </td>
            <td> '.$tex.' </td>
            <td> '.myf2($m8wmu['date_today']).' </td>
     
          </tr>
            ';
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
