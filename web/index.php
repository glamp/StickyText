<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StickyText - Text Cohesion Analyzer</title>
<style>
body{font-family:arial;}
/*h1{text-align:center;}*/
p{font-size:16px;}
.bold {font-weight: bold;}
.red {color: #FF0000;}
.yellow-background {background-color: Yellow;}
</style>
</head>

<body>
<h1>StickyText - Text Cohesion Analyzer</h1>

<p>
<h2>Input Essay:</h2>
<form action="index.php" method="post" name="myform">
<textarea name="mytext" rows="20" cols="80" style="font-family:arial;font-size:15px;"><?php 
if(isset($_POST['mytext'])) 
{ 
   echo htmlentities($_POST['mytext'], ENT_QUOTES); 
}
?></textarea>
<label><h2>Cohesion Highlighter Options</h2></label>
<label>Cohesion Metric: </label>
<input type="radio" name="metric" value="0" /> None
<input type="radio" name="metric" value="1" /> Word Overlap
<input type="radio" name="metric" value="2" checked=checked/> Freq Dist
<input type="radio" name="metric" value="3" /> WordNet
<br/>
<label>Measure Scale: </label>
<input type="radio" name="scale" value="1" checked=checked/> Local
<input type="radio" name="scale" value="2" /> Global
<br/>
<label>Good Pairs: </label>
<input type="radio" name="good" value="0" /> None
<input type="radio" name="good" value="1" /> 1
<input type="radio" name="good" value="2" checked=checked/> 2
<input type="radio" name="good" value="3" /> 3
<br/>
<label>Bad Pairs: </label>
<input type="radio" name="bad" value="0" /> None
<input type="radio" name="bad" value="1" /> 1
<input type="radio" name="bad" value="2" checked=checked/> 2
<input type="radio" name="bad" value="3" /> 3
<br/>
<br/>
<input type="submit" name="submit" value="Submit" style="width: 140px;font-size:25px" /> <br />
</form>
</p>
<hr>
<p>
<?php
	if (isset($_POST["mytext"])) {
		$url = 'http://umsi.yhathq.com/rongxin1989@gmail.com/models/StickyText/';
		$ch = curl_init($url);
		 
		$json = json_encode($_POST);

		$yhatuser = 'rongxin1989@gmail.com';
		$yhatapi = 'ff7bb725be9e4a32af286f464b316a23';

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_USERPWD, "$yhatuser:$yhatapi");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);

		// For debug only
		echo "<div>";
		echo $response;
		echo "</div>";

		if (isset($response['html_output'])) {
			echo $response['html_output'];
		}
	}
?>
</p>
<hr>
<p>
Download: <a href="file/rong-stickytext-psy808.pdf">Psych 808 Class Project Report</a><br/>
</P>
&copy; 2014&nbsp;Xin Rong, <a href="mailto:ronxin@umich.edu">ronxin@umich.edu</a><br/>
</body>
<script src="jquery-1.10.2.js"></script>
<script src="yhat.js"></script>
</html>
