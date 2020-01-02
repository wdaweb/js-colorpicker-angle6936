<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css" />

  <style>

      body{
          margin: 13% 38% ;
        
      }
    #circle {
      width: 300px;
      height: 300px;
      border-radius:999em;
      margin-bottom: 30px;
      text-align: center;
      font-size: 30px;
      line-height: 300px;
      text-transform: uppercase;
      color: white;
    }
    input[type="range"]{
  -webkit-appearance: none;
  border-radius:2px;
  width:200px;
  height:3px;
  
  box-shadow:inset #ebb 0 0 5px;
  outline : none;
  transition:.1s;
}
input[type="range"]::-webkit-slider-thumb{
  -webkit-appearance: none;
  width:10px;
  height:10px;
  background:#f22;
  border-radius:50%;
  transition:.1s;
}

input[type="range"]::-webkit-slider-thumb:hover,
input[type="range"]::-webkit-slider-thumb:active{
  width:16px;
  height:16px;
}

</style>
</head>
<body>
  <div id="circle"></div>
  <div>
      <input type="button" value="R" onclick="number('r')">
      <input type="range"  min="0" max="255" id="rr" oninput="color('r',this)" class="btn btn btn-red">
    <br>
      <input type="button" value="G" onclick="number('g')">
      <input type="range" min="0" max="255" id="gg" oninput="color('g',this)">
    <br>
      <input type="button" value="B" onclick="number('b')">
      <input type="range" min="0" max="255" id="bb" oninput="color('b',this)">
    
  </div>
</body>
</html>
<script>

  //色碼


  
  function padLeft(str) {
    str = str.toString(16);
    return str.length >= 2 ? str : '0' + str;
  }
  function print_rgb() { 
    document.getElementById("circle").style.backgroundColor = "rgb(" + rgb.r + "," + rgb.g + "," + rgb.b + ")";
    document.getElementById("circle").style.color = "rgb(" + (255-rgb.r) + "," + (255-rgb.g) + "," + (255-rgb.b) + ")";
    document.getElementById("rr").value = rgb.r;
    document.getElementById("gg").value = rgb.g;
    document.getElementById("bb").value = rgb.b;
    document.getElementById("circle").innerHTML = "#" + padLeft(rgb.r) + padLeft(rgb.g) + padLeft(rgb.b);
  }
  function number(clr) {    
    do {
      newclr = prompt('輸入0~255', rgb[clr]);
    } while (!(0 <= newclr && newclr <= 255));
    rgb[clr] = (newclr == null) ? rgb[clr] : Number(newclr);
    print_rgb();
  }
  
  var rgb = { r: 0, g: 0, b: 0 }, run; 
  rgb.r = Math.floor((Math.random() * 256));
  rgb.g = Math.floor((Math.random() * 256));
  rgb.b = Math.floor((Math.random() * 256));
  print_rgb();
  function cont(select) {   
    run = setInterval(function () {
      switch (select) {
        case 'add':
          if (rgb.r < 255) rgb.r++;
          if (rgb.g < 255) rgb.g++;
          if (rgb.b < 255) rgb.b++;
          break;
        case 'sub':
          if (rgb.r > 0) rgb.r--;
          if (rgb.g > 0) rgb.g--;
          if (rgb.b > 0) rgb.b--;
          break;
        case 'rand':
          rgb.r = Math.floor((Math.random() * 256));
          rgb.g = Math.floor((Math.random() * 256));
          rgb.b = Math.floor((Math.random() * 256));
          break;
      }
      print_rgb();
    }, 30);
  }
  $(function(){
  var r = $('input');
  r.on('mouseenter',function(){
    var p = r.val();
    r.on('click',function(){
      p = r.val();
      bg(p);
    });
    r.on('mousemove',function(){
      p = r.val();
      bg(p);
    });
  });
  function bg(n){
      r.css({
        'background-image':'-webkit-linear-gradient(left ,#f22 0%,#f22 '+n+'%,#fff '+n+'%, #fff 100%)'
      });
  }
});
  function color(clr, obj) {
    rgb[clr] = Number(obj.value);
    print_rgb();
  }

  

         
</script>
      <script src="js/jquery-3.4.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script> 
