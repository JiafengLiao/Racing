<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 
?>


<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body class="home">
<script language="javascript" type="text/javascript">
<!--
var obj;
var oReq = new XMLHttpRequest(); //New request object
oReq.onload = function() {
obj = JSON.parse(this.responseText);
console.log(obj[0]);
document.write("<title>Display progress</title>");
document.write("<h1>Display children progress</h1>");
document.write("<table border=1>");
document.write("<tr><td>SessionID</td><td>Question</td><td>Answer</td><td>User Input</td><td>Accuracy</td><td>Total Question</td>");
for (var i=0; i< obj[0].length; i++) {
	var arrQues = (obj[0][i].question.replace(/p/g, '+')).replace(/,/g, '<br/>');
	var arrAnswer = obj[0][i].answer.replace(/,/g, '<br/>');
	var arrUA = obj[0][i].uAnswer.replace(/,/g, '<br/>');
  	document.write("<tr><td>" + obj[0][i].sessionID + "</td>");
  	document.write("<td>" + arrQues + "</td>");
  	document.write("<td>" + arrAnswer + "</td>");
  	document.write("<td>" + arrUA + "</td>");
  	document.write("<td>" + obj[0][i].accuracy +' %' + "</td>");
  	document.write("<td>" + obj[0][i].totalQues + "</td></tr>");
}
document.write("</table>");
};
oReq.open("get", "gateway.php?job=loadChildTab", true);
oReq.send();

//-->
</script>
</body>
</html>