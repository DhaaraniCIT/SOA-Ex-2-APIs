const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/trigonomentry', (req , res) => {
    console.log(req.body);
    var hypo = req.body.set1;
    var adj = req.body.set2;
    var opp = req.body.set3;

    var sine = opp/hypo;
    var cose = adj/hypo;
    var tane = sine/cose;
    var sece = 1/sine;
    var cosec = 1/cose;
    var cote = 1/tane;

    var sin2 = sine * sine;
    var cos2 = cose * cose;
    var tan2 = tane * tane;

    var desin = 1-sin2;
    var desin = squareroot(desin);
    var arsin = 1/desin;

    var decos = 1-cos2;
    var decos = squareroot(decos);
    var arcos = 1/decos;

    var detan = 1+tan2;
    var artan = 1/detan;
    res.send({sin : sine , cos : cose , tan : tane , sec : sece , cosec : cosec , cot : cote , arcsin : arsin , arccos : arcos , arctan : artan});
})
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