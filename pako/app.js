var pako = require('pako');
 
// var test = '123123123123123123123123123123123123123123123123';
 
// var binaryString =  pako.deflate(test);

// var b =  Buffer.from(binaryString);
// var s = b.toString('base64');


var zlib = require('zlib');
zlib.inflateRaw(Buffer.from("MzQyNiQFAQA=", "base64"), function(err, buffer) {
    if (!err) {
      console.log(buffer.toString());
    }
  });






//  s = Buffer.from(s, 'base64')

//  var restored = pako.inflate( s.toString('binary'));

//  console.log(restored.toString());

// console.log(s);


// var atob = require('atob');

// var b64Data     = 'eJxTMjQyJgkpAQD16Aml';

// // Decode base64 (convert ascii to binary)
// var strData  = atob(b64Data);

// strData = Buffer.from(strData,'binary')

// var data  = pako.inflate(strData, { to: 'string' });

// console.log(data);



// var test ='123123123123123123123123123123123123123123123123';
// var binaryString = pako.deflate(JSON.stringify(test), { to: 'string' });
// console.log(Buffer.from(binaryString,'binary').toString('base64'))

// var restored = JSON.parse(pako.inflate(binaryString, { to: 'string' }));

// console.log('restored.my: ' + restored.my);


//   // 转换前
//   console.log(e.data);
//   // 开始转换
//   var blob = e.data;
//   var reader = new FileReader();
//   reader.readAsBinaryString(blob);
//   reader.onload = function (evt) {
//     var data = pako.inflate(evt.target.result, { to: 'string' })
//     // 转换后
//     console.log(JSON.parse(data))
//   };