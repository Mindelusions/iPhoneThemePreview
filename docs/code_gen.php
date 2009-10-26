<?php 

if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

include_once(ABSPATH . 'include/theme.class.php');

if (!isset($_GET[t])) {
	$t = "";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Theme Code Generator</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		 <script type="text/javascript" charset="utf-8">
			var old = ["Text", "Calendar", "Photos", "Camera", "YouTube", "Stocks", "Maps", "Weather", "Clock", "Calculator", "Notes", "Settings", "iTunes", "App Store", "Contacts", "Phone", "Mail", "Safari", "iPod"];
			var exists = {};
			$.each(old, function() {
				exists[this] = 1;
			});
		 	var css_tmpl = '#iphone .${class}{background:url(themes/${icon}) center center no-repeat;}\n#dock .${class}{background:url(themes/${icon}) center 10px no-repeat;}\n\n';
		 	var mu_tmpl = '<div class="ico ${class}">${class}</div>';
		 	
			function getIcons() {
				var css = "#screen{background-image:url(themes/"+ $("#t").val() +"/Wallpaper.png);}\n\n";
				var mu = "";
				var url = "code_gen.php?t=" + $("#t").val();
				$.getJSON(url, function(data,status) {
					console.log("RESP: ", data);
					var file, icon, class;
					$.each(data, function() {
						file = this;
						class = file.split(".",1);
						icon = $("#t").val() + "/Icons/" + file;
						css += css_tmpl.replace(/\${class}/gi, class).replace(/\${icon}/gi, icon) + "<br/>";
						
						if (!exists[class]) {
							mu += mu_tmpl.replace(/\${class}/gi, class) + "\n";
						}
					});
					$("#css").html(css);
					$("#mu").text(mu);
					$("#result").css("display","block");
				});
			}
			
			$(function() {
				$("#btn_g").click(function() {
					getIcons();
				});
			});
		</script> 
	</head>
<body>

	<label for="t">Theme Name:</label>
	<input type="text" id="t" name="t" value="" />
	<button id="btn_g">Get Code</button><br/>
	
	<div id="result" style="margin-top:25px;display:none;">
		<textarea rows="20" cols="100" id="css"></textarea><br/>
		<textarea rows="20" cols="100" id="mu"></textarea>
	</div>

</body>
</html>

<?php

} else {
	$t = $_GET[t];
	$theme = new theme($t);
	echo json_encode($theme->icons);
}
?>
