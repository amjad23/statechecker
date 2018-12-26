<!DOCTYPE html>
<html>
<body>

<button type="button" onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
  var x = document.getElementById("message").value;
  document.getElementById("demo").innerHTML = x;
}
</script>

</body>
</html>