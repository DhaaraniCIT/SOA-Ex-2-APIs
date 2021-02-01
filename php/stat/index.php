<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".linear").hide();
            $(".deviation").show();
            $("#sel2").change(function(){
                var selectedCountry = $(this).children("option:selected").val();
                if(selectedCountry == 2){
                    $(".linear").show();
                    $(".deviation").hide();
                }
                else{
                    $(".linear").hide();
                    $(".deviation").show();
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        
          <h1 class="text-center">Statistics Calculator</h1>
          <select class="form-control mb-3" id="sel2" name="sellist2">
            <option value="1">Standard Deviation & Variance</option>
            <option value="2">Linear Regression</option>
          </select>
          <h3 class="mb-3 deviation">Standard Deviation & Variance</h3>
          <h3 class="mb-3 linear">Linear Regression</h3>
          <form method="post">
            <div class="row mb-3 deviation">
              <div class="col">
                <label for="">Set1</label>
                <input type="textarea" class="form-control" id="sd" required name="set" pattern="/^[0-9]+$/">
              </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block " name="sdb">Calculate</button>
              </div>
            </div>
            </form>
            <form method="post">
            <div class="row mb-3 linear">
                
                <div class="col">
                  <label for="">Set1</label>
                  <input type="textarea" class="form-control" id="val1" required name="set1" pattern="/^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">$set2</label>
                    <input type="textarea" class="form-control" id="val2" required name="set2" pattern="/^[0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block" name="lrb">Calculate</button>
                </div>
              </div>
        </form>
        <?php

            function linearRegression($set1,$set2){
              // $set1 = $set1;
              $set2 = $set2;
              $length1 = 0;
              $length2 = 0;
              $arrset1 = [];
              $arrset2 = [];
              $meanX = 0;
              $meanX2 = 0;
              $meanY = 0;
              $a = 0;
              $b = 0;
              $xy = 0;
              $sumxy = 0;
              $x2 = 0;
              $sumx2 = 0;
              for($i=0 ;$set1[$i]!="";$i++){
                  
                  if($set1[$i] != ','){
                      $meanX += (int)$set1[$i];
                      $x2 = (int)$set1[$i]*(int)$set1[$i];
                      $sumx2 += $x2;
                      $arrset1[$length1++] = (int)$set1[$i];
                  } 
              }
              $meanX2 = $meanX * $meanX;
              for($i=0 ;$set2[$i]!="";$i++){
                  
                  if($set2[$i] != ','){
                      $meanY += (int)$set2[$i];
                      $arrset2[$length2++] = (int)$set2[$i];
                  }
              }
              for($i=0,$j=0;$i<$length1,$j<$length2;$i++,$j++){
                  $xy = $arrset1[$i]*$arrset2[$j];
                  $sumxy += $xy;
              }
              //console.log("answers",$meanX,$meanY,$meanX2,$sumx2,$sumxy);
              $sumxy = $length1 * $sumxy;
              $X = $meanY * $meanX;
              $meanXY = $length1 * $meanX2;
              $bnum = $sumxy - $X;
              $bdeno = $meanXY - $meanX2;
              $b = $bnum / $bdeno;
              $a1 = $b*$meanX;
              $adiff = $meanY - $a1;
              $a = $adiff / $length1;
              echo"<h1>Result</h1><p>y = " . number_format($a,3,'.','') . "+" . number_format($b,3,'.','') . "x</p>";
            }
            function standardDeviation($set){
              $length1 = 0;
              $mean = 0;
              $sumofdiff = 0;
              $diff = 0;
              $pow =0; 
              $sd = 0;
              $vari =0;
              $arrset1 = [];
              for($i=0 ;$set[$i]!="";$i++){
                  if($set[$i] != ','){
                          $mean += (int)$set[$i];
                          $arrset1[$length1++] = (int)$set[$i];
                  } 
              }
              //console.log("meab",mean)
              $mean /= $length1;
              for($i=0;$i<$length1;$i++){
                  $diff = $arrset1[$i] - $mean;
                  $pow = $diff * $diff;  
                  $sumofdiff += $pow;
              }
              $vari = $sumofdiff/$length1;
              $sd = squareroot($vari);
              echo "<h1>Result</h1><p>Standard Deviation : " . $sd . "</p><p>Variation : " . $vari . "</p>";
          }
          
          function squareroot($number) {
              $lo = 0;
              $hi = $number;
              while($lo <= $hi) {
                   $mid = ($lo + $hi) / 2;
                   $mid = $mid|0;
                   if($mid * $mid > $number) $hi = $mid - 1;
                   else $lo = $mid + 1;
              }
              return $hi;
          }
          
            extract($_POST);
            if(isset($lrb))
            {
                linearRegression("$set1","$set2");
            }
            else if(isset($sdb)){
                standardDeviation("$set");
            }
            else
        ?>
    </div> 
</body>
</html>