@if (session()->has('success'))

<style>
.alertMe {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
}

.alertMe.success {background-color: #04AA6D;}
.alertMe.info {background-color: #2196F3;}
.alertMe.warning {background-color: #ff9800;}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

<div class="alertMe alert-success" role="alert">
    <span class="closebtn">&times;</span>  
    {{ session('success' )}}
</div>

<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
@endif