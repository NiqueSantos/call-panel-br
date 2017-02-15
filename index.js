var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var filaDoDia = [];

app.get('/', function(req, res){
  res.sendFile(__dirname + '/index_layout.html');
});

app.get('/guiche', function(req, res){
  res.sendFile(__dirname + '/guiche.html');
});


io.on('connection', function(socket){

  socket.on('painelCrea', function(msg){

    filaDoDia.unshift(msg);
    io.emit('painelCrea', filaDoDia);

    if(filaDoDia.length > 4){
      filaDoDia.pop();
    }

  });


});



http.listen(3000, function(){
  console.log('listening on *:3000');
});
