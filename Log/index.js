const express = require('express');
const bodyParser = require('body-parser');

const api = express();
api.use(express.static(__dirname));
api.use(bodyParser.json());

api.listen(3000, () => {
  console.log('API up and running!');
});

api.post('/log', (req, res) => {
    console.log(req.body);
    var n = 1000.0
    var x = req.body.set1;
    var logs = n * ((x ** (1/n)) - 1)
    if(logs < 0){
        log = 0;
    }
    else {
        log = n*((logs ** (1/n))-1)
    }
    var antilog = 10**x
    res.send({ln:logs,antilog:antilog,log:log}); 
});