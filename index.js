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

// unshift/push - add an element to the beginning/end of an array
// shift/pop - remove and return the first/last element of and array

io.on('connection', function(socket){

  socket.on('painelCrea', function(msg){


    filaDoDia.unshift(msg);
    io.emit('painelCrea', filaDoDia);

    // filaDoDia.forEach(function(el){
    //   if(msg === el){
    //     console.log(el);
    //   }
    // });

    // if(filaDoDia.length > 1){
    //   io.emit('anteriores', filaDoDia);
    // }

    if(filaDoDia.length > 4){
      filaDoDia.pop();
    }

  });


});



http.listen(3000, function(){
  console.log('listening on *:3000');
});
