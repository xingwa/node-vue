var server = require('http').createServer();
var io = require('socket.io')(server);
var btoa = require('btoa');
var zlib = require('zlib');

function stringToArrayBuffer(string) {
  const arrayBuffer = new ArrayBuffer(string.length);
  const arrayBufferView = new Uint8Array(arrayBuffer);
  for (let i = 0; i < string.length; i++) {
    arrayBufferView[i] = string.charCodeAt(i);
  }
  return arrayBuffer;
}

function arrayBufferToString(buffer) {
  return String.fromCharCode.apply(null, new Uint8Array(buffer));
}


io.on('connection', function (socket) {
  socket.binaryType = 'arraybuffer';
  console.log('连接到我了', socket.id)
  setInterval(() => {

    let result = zlib.gzipSync(stringToArrayBuffer(encodeURIComponent('message123123123123123123123123123123123123123123' + '成都:' + new Date().getTime())));
    // console.log(result);
     socket.emit('event', result);
   // socket.emit('event', stringToArrayBuffer(encodeURIComponent('message123123123123123123123123123123123123123123' + '成都:' + new Date().getTime())));
    // socket.emit('event', encodeURIComponent('message' + '成都:' + new Date().getTime()));
  }, 1000);

  socket.on('event', function (data) {
    console.log(decodeURIComponent(Buffer.from(data).toString()))
    console.log(data)
  });
  //   socket.on('disconnect', function(){
  //      console.log('disconnect')
  //   });
});
server.listen(3000);



// var u8 = new Uint8Array([65, 66, 67, 68]);
// var b64encoded = btoa(String.fromCharCode.apply(null, u8));
// console.log(b64encoded)

// c#解析
// byte[] myByteArray = Convert.FromBase64String("QUJDRA==");
// Console.Write(Encoding.Default.GetString(myByteArray));
// Console.ReadKey();

// #java解析
// Decoder decoder = Base64.getDecoder();
// byte[] decode = decoder.decode("QUJDRA==".getBytes());
// byte[] b = decode; 
// String str= new String (b);
// System.out.println(str);
