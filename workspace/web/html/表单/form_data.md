# 1. form_data
[参考](https://segmentfault.com/a/1190000006716454)

```html
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title> FormData Demo </title>
  <script src="js/jquery.min.js"></script>
  <script src="js/moo_min.js"></script>
 </head>

 <body>
    <form name="form1" id="form1">
        <p>name:<input type="text" name="name" ></p>
        <p>gender:<input type="radio" name="gender" value="1">male <input type="radio" name="gender" value="2">female</p>
        <p>photo:<input type="file" name="photo" id="photo"></p>
        <p><input type="button" name="b1" value="jquery提交" onclick="fsubmit()"></p>
        <p><input type="button" name="b1" value="mootools提交" onclick="fsubmit1()"></p>
        <p><input type="button" name="b1" value="js提交" onclick="fsubmit2()"></p>
    </form>
 </body>
 
<script type="text/javascript">
function fsubmit(){
	var data = new FormData($('#form1')[0]);
	$.ajax({
		url: 'form_data.php',
		type: 'POST',
		data: data,
		dataType: 'JSON',
		cache: false,
		processData: false,
		contentType: false
	}).done(function(ret){
		if(ret['isSuccess']){
			var result = '';
			result += 'name=' + ret['name'] + '<br>';
			result += 'gender=' + ret['gender'] + '<br>';
			result += '<img src="' + ret['photo']  + '" width="100">';
			$('#result').html(result);
		}else{
			alert('提交失敗');
		}
	});
	return false;
}
function fsubmit1(){
	//var data = new FormData($('form1'));
	var form = document.getElementById('form1');
	var formdata = new FormData(form);
	new Request({
		url: 'form_data.php',
		type: 'POST',
		data: formdata,
	}).send();
	return false;
}
function fsubmit2(){
	var myForm = document.getElementById("form1");
	var xhr= new XMLHttpRequest();
	xhr.open("POST", "form_data.php", true);
	xhr.onreadystatechange = function() {
		if (xhr.readyState === 4)
			if ((xhr.status >=200 && xhr.status < 300) || xhr.status == 304)
				alert(xhr.responseText);
	}
	xhr.send(new FormData(myForm));
}
</script>
</html>
```