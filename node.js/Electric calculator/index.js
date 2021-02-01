const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/amps', (req , res) => {
    console.log(req.body);
    var n1 = req.body.set1;
    var n2 = req.body.set2;
    var amps;
    amps = n1/n2;
    console.log("lod",amps)
    res.send('Current = ' + amps.toFixed(2) + 'A');
})
api.post('/kw', (req , res) => {
    console.log(req.body);
    var a = req.body.set1;
    var b = req.body.set2;
    var kw
    kw = (a*b)/1000;
    res.send('Power = ' + kw.toFixed(2) + "kW");
})
api.post('/kva', (req , res) => {
    console.log(req.body);
    var a = req.body.set1;
    var b = req.body.set2;
    var kva;
    kva = (a*b)/1000;
    va = a*b;
    res.send({kva : kva.toFixed(2),va : va});
})
api.post('/volts', (req , res) => {
    console.log(req.body);
    var n1 = req.body.set1;
    var n2 = req.body.set2;
    var vol;
    vol = n2/n1;
    res.send('Voltage = ' + vol.toFixed(2) + 'V');
})
api.post('/watt', (req , res) => {
    console.log(req.body);
    var n1 = req.body.set1;
    var n2 = req.body.set2;
    var watt;
    watt = n2*n1;
    res.send('Power = ' + watt + 'W');
})
api.post('/joules', (req , res) => {
    console.log(req.body);
    var n1 = req.body.set1;
    var n2 = req.body.set2;
    var jol;
    jol= n2*n1;
    res.send('Energy = ' + jol + 'J');
})
api.post('/mah', (req , res) => {
    console.log(req.body);
    var n1 = req.body.set1;
    var n2 = req.body.set2;
    var mah;
    mah= n2*n1*1000;
    res.send(n1 + 'A running for' + n2 +' hours = ' + mah + ' milliampere-hours');
})
api.post('/Wh', (req , res) => {
    console.log(req.body);
    var a = req.body.set1;
    var b = req.body.set2;
    var wh
    wh = a*b;
    res.send('Energy consumption in watt-hour = ' + wh + "Wh");
})