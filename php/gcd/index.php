<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".deviation").show();
            $(".linear").hide();
            $(".linear1").hide();
                    $(".linear2").hide();
            $("#sel2").change(function(){
                var selectedCountry = $(this).children("option:selected").val();
                if(selectedCountry == 1){
                    $(".linear").hide();
                    $(".deviation").show();
                    $(".linear1").hide();
                    $(".linear2").hide();
                }
                else if(selectedCountry == 2){
                    $(".linear").show();
                    $(".deviation").hide();
                    $(".linear1").hide();
                    $(".linear2").hide();
                }
                else if(selectedCountry == 3){
                    $(".linear").hide();
                    $(".deviation").hide();
                    $(".linear1").show();
                    $(".linear2").hide();
                }
                else{
                    $(".linear").hide();
                    $(".deviation").hide();
                    $(".linear1").hide();
                    $(".linear2").show();
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        
          <h1 class="text-center">GCD,LCM,Roots</h1>
          <select class="form-control mb-3" id="sel2" name="sel2">
            <option value="1">GCD & LCM</option>
            <option value="2">Square Root</option>
            <option value="3">Cube Root</option>
            <option value="4">Nth Root</option>
          </select>
          <h3 class="mb-3 deviation">GCD & LCM</h3>
          <h3 class="mb-3 linear">Squre Root</h3>
          <h3 class="mb-3 linear1">Cube Root</h3>
          <h3 class="mb-3 linear2">Nth Root</h3>
          <form method="post">
            <div class="row mb-3 linear ">
              <div class="col">
                <label for="">Number</label>
                <input type="textarea" class="form-control" id="sd" required name="set" pattern=" /^[0-9]+$/">
              </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block " name="root2">Calculate</button>
              </div>
            </div>
            </form>
            <form method="post">
            <div class="row mb-3 deviation">
                
                <div class="col">
                  <label for="">Number1</label>
                  <input type="textarea" class="form-control" id="val1" required name="set1" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Number2</label>
                    <input type="textarea" class="form-control" id="val2" required name="set2" pattern=" /^[0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block" name="gcd">Calculate</button>
                </div>
              </div>
        </form>
        <form method="post">
            <div class="row mb-3 linear1">
                
                <div class="col">
                  <label for="">Number</label>
                  <input type="textarea" class="form-control" id="val1" required name="set3" pattern=" /^[0-9]+$/">
                </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block" name="root3">Calculate</button>
                </div>
              </div>
        </form>
        <form method="post">
            <div class="row mb-3 linear2">
                
                <div class="col">
                  <label for="">Number</label>
                  <input type="textarea" class="form-control" id="val1" required name="set4" >
                </div>
                <div class="col">
                    <label for="">Nth root</label>
                    <input type="textarea" class="form-control" id="val2" required name="set5">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block" name="nroot">Calculate</button>
                </div>
              </div>
        </form>
        <?php

            function root2($set){
              $lo = 0;
              $hi = $set;
              while($lo <= $hi) {
                   $mid = ($lo + $hi) / 2;
                   $mid = $mid|0;
                   if($mid * $mid > $set) $hi = $mid - 1;
                   else $lo = $mid + 1;
              }
                echo"<p>Squre root of " . $set . " : " . $hi . "</p>";
            }
            function root3($set3){
              nthroot($set3,3);
          }
          function nthroot($set4,$set5){
            $k=1;
            $incre = 0.01;

            for($i=1; $i<=$set4; $i = $i+$incre)
            {
                for($j=0;$j<$set5;$j++)
                {
                    $k=$k*$i;
                }
                if($set4<$k)
                {
                    echo $set5 . "th root of " . $set4 . " : " . number_format(($i-$incre),'2','.','');
                    break;
                }
                else
                    $k=1;
            }
            //echo"workedn";
        }
            function gcd($set1,$set2){
              for($i=1; $i <= $set1 && $i <= $set2; ++$i)
              {
                  // Checks if i is factor of both integers
                  if($set1%$i==0 && $set2%$i==0)
                      $gcd = $i;
              }
              $lcm = ($set1 * $set2) / $gcd;
              echo "GCD : " . $gcd . "<br>LCM : " . $lcm;
            }

            extract($_POST);
            echo "<h1> Result </h1>";
            if(isset($root2))
            {
                nthroot("$set",2);
            }
            else if(isset($gcd)){
                gcd("$set1","$set2");
            }
            elseif(isset($root3)){
              nthroot("$set3",3);
            }
            else if(isset($nroot)){
              nthroot("$set4","$set5");
            }
            else
        ?>
    </div> 
</body>
</html>