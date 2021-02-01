<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trigonometry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Trigonometry</h1>
        <span>*Enter the value in cm</span>
        <form method=post>
            <div class="row mb-3 deviation">
                <div class="col">
                  <label for="">Hypotenuse</label>
                  <input type="number" class="form-control" id="val1" required name="set1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[1-0][0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Adjacent Side</label>
                    <input type="number" class="form-control" id="val2" required name="set2" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[1-0][0-9]+$/">
                </div>
                <div class="col">
                    <label for=""> Opposite Side</label>
                    <input type="number" class="form-control" id="val3" required name="set3" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[1-0][0-9]+$/">
                </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block gcd" name="gcd">Calculate</button>
                </div>
              </div>
        </form>
        <?php

        function trigonometry($set1,$set2,$set3){
            $sin = $set3/$set1;
            $cos = $set2/$set1;
            $tan = $sin/$cos;
            $sec = 1/$sin;
            $cosec = 1/$cos;
            $cot = 1/$tan;

            $sin2 = $sin*$sin;
            $cos2 = $cos*$cos;
            $tan2 = $tan*$tan;

            $desin = 1-$sin2;
            $desin = root2($desin);
            $arsin = 1/$desin;

            $decos = 1-$cos2;
            $decos = root2($decos);
            $arcos = 1/$decos;

            $detan = 1+$tan2;
            $artan = 1/$detan;
            echo "<h1>Result</h1><p>Sin : " . number_format($sin,3,'.','') . "<br>Cos : " . number_format($cos,3,'.','') . "<br>Tan : " . number_format($tan,3,'.','') . "<br>Sec : " . number_format($sec,3,'.','') . "<br>Cosec : " . number_format($cosec,3,'.','') . "<br>Cot : " . number_format($cot,3,'.','') . "<br>Arcsin : " . number_format($arsin,3,'.','') . "<br>Arccos : -" . number_format($arcos,3,'.','') . "<br>Arctan : " . number_format($artan,3,'.',''); 
        }

        function root2($set){
            $lo = 0;
            $hi = $set;
            while($lo <= $hi) {
                 $mid = ($lo + $hi) / 2;
                 $mid = $mid|0;
                 if($mid * $mid > $set) $hi = $mid - 1;
                 else $lo = $mid + 1;
            }
              return $hi;
          }
        extract($_POST);
        if(isset($gcd))
        {
            trigonometry("$set1","$set2","$set3");
        }
    ?>
    </div> 
</body>
</html>