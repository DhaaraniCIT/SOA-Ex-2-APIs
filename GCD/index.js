const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/gcd', (req , res) => {
    console.log(req.body);
    var n1 = req.body.set1;
    var n2 = req.body.set2;
    var gcd;
    var lcm;
    for(var i=1; i <= n1 && i <= n2; ++i)
    {
        // Checks if i is factor of both integers
        if(n1%i==0 && n2%i==0)
            gcd = i;
    }
    lcm = (n1*n2)/gcd;
    res.send({GCD : gcd , LCM : lcm});
})
api.post('/rootn', (req , res) => {
    console.log(req.body);
    var k=1;
    var incre = 0.01;
    var ans;
    a = req.body.set1;
    b = req.body.set2;
    for(var i=1; i<=a; i = i+incre)
    {
        for(var j=0;j<b;j++)
        {
            k=k*i;
        }
        if(a<k)
        {
            ans = i-incre;
            res.send(ans.toFixed(2));
            break;
        }
        else
            k=1;
    }
})