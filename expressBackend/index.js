var express = require('express');
var app = express();
var jwt = require('jwt-simple');
//change first parameter of Buffer.from to match laravel server jwt secret exclude the 'base64:'
var secret = Buffer.from('FClidjjWPImBqjptbZWc4XCtq9F0P7PUBnBBLTpf6ew=', 'base64')

app.get('/', function(req, res){
   res.send("Hello world!");
});

app.post('/decode/:token', function(req, res){
  var decoded = jwt.decode(req.params.token, secret);
   res.send(decoded);
});

app.listen(3000,function () {
  console.log('app listening on port 3000!')
});
