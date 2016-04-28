<?
ini_set('display_error',0);


html();

function html()
{
?>
<!doctype html>
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
<meta name="google-site-verification" content="" /> 
<meta name="robots" content="index,follow" /> 
<meta name="keywords" content="8-bit,avatar,retro" /> 
<meta name="description" content="Create a retro 8-bit avatar image from your uploaded picture. Best use with a close-up shot of your face!" /> 
<link rel="shortcut icon" type="image/png" href="http://chimou.com/8-bit-avatar/favicon.png" />
<link rel="icon" type="image/png" href="http://chimou.com/8-bit-avatar/favicon.png" />
<meta property="og:title" content="8-bit Avatar Maker">
<meta property="og:url" content="http://chimou.com/8-bit-avatar/">
<meta property="og:image" content="http://chimou.com/8-bit-avatar/favicon.png">
<meta property="og:description" content="Create a retro 8-bit avatar image from your uploaded picture. Best use with a close-up shot of your face!">

<title>8-bit Avatar Maker</title> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css">
<link rel="stylesheet" href="screen.css" type="text/css" /> 
<script>
var t = 0;
$(function() {
	$('#gallery img').hover(function(){
		clearTimeout(t);
		$('#prev').css('top',$(this).offset().top).css('left',$(this).offset().left).show().html('<div><img src="'+this.src+'"></div>');
		t = setTimeout("$('#prev').hide();",5000);
	},function(){
		//--
	});
});
</script>
</head>
<body>
<div id=prev style="position:absolute;display:none;border:1px solid #ccc;box-shadow:0 0 20px rgba(0,0,0,0.5);"></div>
	<div id="topbar">
	<header>
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOkAAAFDAgMAAACiqcFMAAAACVBMVEUhISHc3dxeXl78LUHOAAABbklEQVR4nO3YUW7EIAxF0Sytm5hNssoqtVwbMKTqVx66lkaaBB9+5gGZXJ9/19eF1bXtp7Dn2dauobCn2NmtNVbLhrtX/bPGallXVdkYVtfupGusqr3H5iexvcbq2Gpt9zPMOzxWx95jtex1nh+rYm1Xx55qbewvNicIe4ZtLdvow+rY9ckd+u7Batr92rcOrKb1tf1kx9Mbq2H9ncjO2v7ghdW09QyeHaym9bG+s7/K1sewGjZnwhNi1/G8bR+suo2yO9YZ6cjvyLAq1jtnHymxpGA17apyarC6tlr9/f32W1g9u9J59dvpHWNYJVvv7/62y2XuwSrZKhveHxKrasds9GI8t7FqdkxGWP/HPKYHq2RHlW18x55g65mw6vbuqFR1cmP1bNb+xB32KVfYt1vrm+fKZzhW1/arf06Gl/Vg1az39ndG6YVVtbG/r5wVVsfGnZyOvcZq2LkjJwarbKtf/9PVOh/Y99uqXm6/AdmjN8YrIxarAAAAAElFTkSuQmCC">
	8-bit Avatar Gallery
	</header>
	<p align=center>Create a retro 8-bit avatar image from your uploaded picture. Best use with a close-up shot of your face!</p>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<!-- AddThis Button END -->
	</div>
	
	<div id="gallery">
<?
	foreach(glob("cache/*") as $fn)
	{
		print "<img src=\"$fn\">";
	}
?>	
	</div>
	<footer>Copyright &copy; 2011 yinsee@wsatp.com.</footer>
</body>
</html>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-19977817-15']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script type="text/javascript">
     var addthis_config = {
        data_ga_property: 'UA-19977817-15',
        data_ga_social : true
     };
</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=yinsee"></script>
<?
}

?>