const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/standard_deviation', (req, res) => {
    console.log(req.body);
    var set1 = req.body.set1;
    console.log("set1",set1);
    //var arrset1 = req.body.set1;
    var length1 = 0;
    var mean = 0;
    var sumofdiff = 0;
    var diff = 0;
    var pow =0; 
    var sd = 0;
    var vari =0;
    arrset1 = [];
    for(var i=0 ;set1[i]!==undefined;i++){
        if(set1[i] != ','){
                mean += parseInt(set1[i]);
                arrset1[length1++] = parseInt(set1[i]);
        } 
    }
    console.log("meab",mean)
    mean /= length1;
    console.log("meahb",mean)
    for(var i=0;i<length1;i++){
        diff = arrset1[i] - mean;
        pow = diff * diff;  
        sumofdiff +=pow;
    }
    vari = sumofdiff/length1;
    sd = squareroot(vari);
    console.log("vari",vari,sd);
    res.send({Variance : vari , StandardDeviation : sd});
  

});

function squareroot(number) {
    var lo = 0, hi = number;
    while(lo <= hi) {
         var mid = (lo + hi) / 2;
         mid = mid|0;
         if(mid * mid > number) hi = mid - 1;
         else lo = mid + 1;
    }
    return hi;
}

api.post('/linearReg', (req, res) => {
    console.log(req.body);
    var set1 = req.body.set1;
    var set2 = req.body.set2;
    var length1 = 0;
    var length2 = 0;
    var arrset1 = [];
    var arrset2 = [];
    var meanX = 0;
    var meanX2 = 0;
    var meanY = 0;
    var a = 0;
    var b = 0;
    var xy = 0;
    var sumxy = 0;
    var x2 = 0;
    var sumx2 = 0;
    for(var i=0 ;set1[i]!==undefined;i++){
        
        if(set1[i] != ','){
            meanX += parseInt(set1[i]);
            x2 = parseInt(set1[i])*parseInt(set1[i]);
            sumx2 += x2;
            arrset1[length1++] = parseInt(set1[i]);
        } 
    }
    meanX2 = meanX * meanX;
    for(var i=0 ;set2[i]!==undefined;i++){
        
        if(set2[i] != ','){
            meanY += parseInt(set2[i]);
            arrset2[length2++] = parseInt(set2[i]);
        }
    }
    for(var i=0,j=0;i<length1,j<length2;i++,j++){
        xy = arrset1[i]*arrset2[j];
        sumxy += xy;
    }
    console.log("answers",meanX,meanY,meanX2,sumx2,sumxy);
    sumxy = length1 * sumxy;
    var X = meanY * meanX;
    meanXY = length1 * meanX2;
    bnum = sumxy - X;
    bdeno = meanXY - meanX2;
    b = bnum / bdeno;
    var a1 = b*meanX
    var adiff = meanY - a1;
    a = adiff / length1;
    console.log("B",b,a); 
  res.send({b:b,a:a});
  

});
