<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".Amps").show();
            $(".kw").hide();
            $(".kva").hide();
            $(".volts").hide();
            $(".watt").hide();
            $(".joules").hide();
            $(".mah").hide();
            $(".Wh").hide();
            $("#sel2").change(function(){
                var selectedCountry = $(this).children("option:selected").val();
                if(selectedCountry == 1){
                  $(".Amps").show();
                  $(".kw").hide();
                  $(".kva").hide();
                  $(".volts").hide();
                  $(".watt").hide();
                  $(".joules").hide();
                  $(".mah").hide();
                  $(".Wh").hide();
                }
                else if(selectedCountry == 2){
                  $(".Amps").hide();
                  $(".kw").show();
                  $(".kva").hide();
                  $(".volts").hide();
                  $(".watt").hide();
                  $(".joules").hide();
                  $(".mah").hide();
                  $(".Wh").hide();
                }
                else if(selectedCountry == 3){
                  $(".Amps").hide();
                  $(".kw").hide();
                  $(".kva").show();
                  $(".volts").hide();
                  $(".watt").hide();
                  $(".joules").hide();
                  $(".mah").hide();
                  $(".Wh").hide();
                }
                else if(selectedCountry == 4){
                  $(".Amps").hide();
                  $(".kw").hide();
                  $(".kva").hide();
                  $(".volts").show();
                  $(".watt").hide();
                  $(".joules").hide();
                  $(".mah").hide();
                  $(".Wh").hide();
                }
                else if(selectedCountry == 5){
                  $(".Amps").hide();
                  $(".kw").hide();
                  $(".kva").hide();
                  $(".volts").hide();
                  $(".watt").show();
                  $(".joules").hide();
                  $(".mah").hide();
                  $(".Wh").hide();
                }
                else if(selectedCountry == 6){
                  $(".Amps").hide();
                  $(".kw").hide();
                  $(".kva").hide();
                  $(".volts").hide();
                  $(".watt").hide();
                  $(".joules").show();
                  $(".mah").hide();
                  $(".Wh").hide();
                }
                else if(selectedCountry == 7){
                  $(".Amps").hide();
                  $(".kw").hide();
                  $(".kva").hide();
                  $(".volts").hide();
                  $(".watt").hide();
                  $(".joules").hide();
                  $(".mah").show();
                  $(".Wh").hide();
                }
                else{
                  $(".Amps").hide();
                  $(".kw").hide();
                  $(".kva").hide();
                  $(".volts").hide();
                  $(".watt").hide();
                  $(".joules").hide();
                  $(".mah").hide();
                  $(".Wh").show();
                }
            });
            $('.Ampsbtn').click(function(){
                var set1 = document.getElementById('sd').value;
                var set2 = document.getElementById('sd1').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/amps');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    //var result = JSON.parse(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });

            })
            $('.kwbtn').click(function(){
                var set1 = document.getElementById('val1').value;
                var set2 = document.getElementById('val2').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/kw');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2 }));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
                
            })
            $('.kvabtn').click(function(){
                var set1 = document.getElementById('val3').value;
                var set2 = document.getElementById('val4').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/kva');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    var result = JSON.parse(req.responseText)
                    document.getElementById("result").innerHTML = "Supply = " + result.kva + "kVA<br>Supply = " + result.va + "VA";
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
                
            })
            $('.voltsbtn').click(function(){
                var set1 = document.getElementById('val5').value;
                var set2 = document.getElementById('val6').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/volts');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
            })
            $('.wattbtn').click(function(){
                var set1 = document.getElementById('val7').value;
                var set2 = document.getElementById('val8').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/watt');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
            })
            $('.joulesbtn').click(function(){
                var set1 = document.getElementById('val9').value;
                var set2 = document.getElementById('val10').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/joules');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
            })
            $('.mahbtn').click(function(){
                var set1 = document.getElementById('val11').value;
                var set2 = document.getElementById('val14').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/mah');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 ,set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
            })
            $('.whbtn').click(function(){
                var set1 = document.getElementById('val12').value;
                var set2 = document.getElementById('val13').value;
                var req = new XMLHttpRequest();
                req.open('POST', '/Wh');
                req.setRequestHeader('Content-Type', 'application/json');
                req.send(JSON.stringify({ set1 : set1 , set2 : set2}));
                req.addEventListener('load', () => {
                    console.log(req.responseText);
                    document.getElementById("result").innerHTML = req.responseText;
                });
                
                req.addEventListener('error', () => {
                    console.log('Shit, something bad happened.');
                    console.log(e);
                });
            })
        });
    </script>
</head>
<body>
    <div class="container">
        
          <h1 class="text-center">Electric Calculator</h1>
          <select class="form-control mb-3" id="sel2" name="sel2">
            <option value="1">Amps</option>
            <option value="2">Kilo Watt</option>
            <option value="3">KVA / VA</option>
            <option value="4">Volts</option>
            <option value="5">watt</option>
            <option value="6">joules</option>
            <option value="7">mAh</option>
            <option value="8">Wh</option>
          </select>
          <h3 class="mb-3 Amps">Amps</h3>
          <h3 class="mb-3 kw">Kilo Watt</h3>
          <h3 class="mb-3 kva">KVA / VA</h3>
          <h3 class="mb-3 volts">Volts</h3>
          <h3 class="mb-3 watt">watt</h3>
          <h3 class="mb-3 joules">joules</h3>
          <h3 class="mb-3 mah">mAh</h3>
          <h3 class="mb-3 Wh">Wh</h3>
          <form method=post>
            <div class="row mb-3 Amps">
              <div class="col">
                <label for="">Power</label>
                <input type=" number" class="form-control" id="sd" required name="set0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
              </div>
              <div class="col">
                <label for="">Voltage</label>
                <input type=" number" class="form-control" id="sd1" required name="set" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
              </div>
              <div class="col mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-block " name="Ampsbtn">Calculate</button>
              </div>
            </div>
            </form>
            <form method=post>
            <div class="row mb-3 kw">
                
                <div class="col">
                  <label for="">Current</label>
                  <input type=" number" class="form-control" id="val1" required name="set1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Voltage</label>
                    <input type=" number" class="form-control" id="val2" required name="set2" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="kwbtn">Calculate</button>
                </div>
              </div>
        </form>
        <form method=post>
            <div class="row mb-3 kva">
                
                <div class="col">
                  <label for="">Current</label>
                  <input type=" number" class="form-control" id="val3" required name="set3" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Voltage</label>
                    <input type=" number" class="form-control" id="val4" required name="val4" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="kvabtn">Calculate</button>
                </div>
              </div>
        </form>
        <form method=post>
            <div class="row mb-3 volts">
                
                <div class="col">
                  <label for="">Current</label>
                  <input type=" number" class="form-control" id="val5" required name="val5" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Power</label>
                    <input type=" number" class="form-control" id="val6" required name="val6" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="voltsbtn">Calculate</button>
                </div>
              </div>
        </form>
        <form method=post>
            <div class="row mb-3 watt">
                
                <div class="col">
                  <label for="">Current</label>
                  <input type=" number" class="form-control" id="val7" required name="val7" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Voltage</label>
                    <input type=" number" class="form-control" id="val8" required name="val8" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="wattbtn">Calculate</button>
                </div>
              </div>
        </form>
        <form method=post>
            <div class="row mb-3 joules">
                
                <div class="col">
                  <label for="">Power</label>
                  <input type=" number" class="form-control" id="val9" required name="val9" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">Seconds</label>
                    <input type=" number" class="form-control" id="val10" required name="val10" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[1-0][0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="joulesbtn">Calculate</button>
                </div>
              </div>
        </form>
        <form method=post>
            <div class="row mb-3 mah">
                
                <div class="col">
                  <label for="">Current</label>
                  <input type=" number" class="form-control" id="val11" required name="val11" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">hours</label>
                    <input type=" number" class="form-control" id="val14" required name="val14" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[1-0][0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="mahbtn">Calculate</button>
                </div>
              </div>
        </form>
        <form method=post>
            <div class="row mb-3 Wh">
                
                <div class="col">
                  <label for="">Power</label>
                  <input type=" number" class="form-control" id="val12" required name="val12" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[0-9]+$/">
                </div>
                <div class="col">
                    <label for="">hours</label>
                    <input type=" number" class="form-control" id="val13" required name="val13" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern=" /^[1-0][0-9]+$/">
                  </div>
                <div class="col mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-block " name="whbtn">Calculate</button>
                </div>
              </div>
        </form>
        <?php
        
        function amps($set,$set0) {
            $amps = $set0/$set;
            echo'Current = ' . number_format($amps,2,'.','') . 'A';
        }
        function kw($set1,$set2) {
            $kw = ($set1*$set2)/1000;
            echo'Power = ' . number_format($kw,2,'.','') . "kW";
        }
        function kva($val3,$val4) {
            $kva = ($val3*$val4)/1000;
            $va = $val3*$val4;
            echo 'Supply = ' . number_format($kva,2,'.','') .'kVA' . '<br>Supply = ' . $va .'VA';
        }
        function volt($val5,$val6) {
            $vol = $val6/$val5;
            echo'Voltage = ' . number_format($vol,2,'.','') . 'V';
        }
        function watt($val7,$val8) {
            $watt = $val7*$val8;
            echo'Power = ' . $watt . 'W';
        }
        function joules($val9,$val10) {
            $jol= $val9*$val10;
            echo'Energy = ' . $jol . 'J';
        }
        function mah($val11,$val14) {
            $mah= $val11*$val14*1000;
            echo $val11 . 'A running for' . $val14 . ' hours = ' . $mah . ' milliampere-hours';
        }
        function wh($val12,$val13) {
            $wh = $val12*$val13;
            echo'Energy consumption in watt-hour = ' . $wh . "Wh";
        }
        echo "<h1>Result</h1>";
        extract($_POST);
        if(isset($Ampsbtn))
        {
            amps("$set","$set0");
        }
        elseif(isset($kwbtn)){
            kw("$set1","$set2");
        }
        elseif(isset($kvabtn)){
            kva("$val3","$val4");
        }
        elseif(isset($voltsbtn)){
            volt("$val5","$val6");
        }
        elseif(isset($wattbtn)){
            watt("$val7","$val8");
        }
        elseif(isset($joulesbtn)){
            joules("$val9","$val10");
        }
        elseif(isset($mahbtn)){
            mah("$val11","$val14");            
        }
        elseif(isset($whbtn)){
            wh("$val12","$val13");
        }
        else
        ?>
    </div> 
</body>
</html>