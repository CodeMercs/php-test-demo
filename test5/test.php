<!DOCTYPE html>
<html>
	<head>
		<title>Test DB</title>
	</head>
	<body>
	<script type="text/javascript">
		function showUser(str) {
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else { 
				if (window.XMLHttpRequest) {
					// code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else {
					// code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET","second.php?q="+str,true);
				xmlhttp.send();
			}
		}
	</script>
	<form>
		<select name="users" onchange="showUser(this.value)">
			<option value="">Select</option>
			<option value="Engineering">Engineering</option>
			<option value="Law">Law</option>
			<option value="Math">Math</option>
		</select>
	</form>
	<div id="txtHint"><b>Student info will be listed here...</b></div>
	<br />
	<br />
	<br />
	Name : <input type="text" id="name" value="Law">
			<input type ="submit" id="name-submit" >
			<div id="name-data"></div>
	<br />


	<script src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript">

		$(function(){
			$('#name-submit').on('click', function(){
				var name = $('input#name').val();
				if($.trim(name)!= ''){
					$.post('name.php', {name: name}, function(data){
						//alert(data);
						$('div#name-data').html(data);
					});
				}
			});
		});
	</script>

	</body>
</html>





