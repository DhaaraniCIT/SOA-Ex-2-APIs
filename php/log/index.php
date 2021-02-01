<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form method=post>
          <h1 class="text-center">log</h1>
            <div class="row mb-3">
              <div class="col">
                <label for="">value</label>
                <input type="text" class="form-control" id="val" required name="val" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
              </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block" name="log">Calculate</button>
              </div>
            </div>
        </form>
        <?php

            function logs($val){
                $x = $val;
                $n = 1000.0;
                $log = $n * (($x ** (1/$n)) - 1);
                if($log < 0){
                    $logof = 0;
                }
                else{
                    $logof = $n * (($log ** (1/$n)) - 1);
                }
                $anti = 10 ** $val;

                echo'ln : ' . number_format($log,3,'.','') . '<br>Antilog : ' . number_format($anti,3,'.','') . '<br>Log(log) : ' . number_format($logof,3,'.','');
            }
            echo"<h1>Result</h1>";
            extract($_POST);
            if(isset($log))
            {
                logs("$val");
            }
        ?>
    </div> 
</body>
</html>