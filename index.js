var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var filaDoDia = [];

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});

app.get('/guiche', function(req, res){
  res.sendFile(__dirname + '/guiche.html');
});

io.on('connection', function(socket){

  socket.on('painelCrea', function(msg){

    // console.log(">>>>");
    // filaDoDia.push(msg);
    io.emit('painelCrea', msg);

    // filaDoDia.push(msg)

    // if(filaDoDia.length > 1){
    //   filaDoDia.forEach(function(el){
    //     io.emit('anteriores', el);
    //   });
    // }




  });

});



http.listen(3000, function(){
  console.log('listening on *:3000');
});
