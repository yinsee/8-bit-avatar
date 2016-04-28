<?
ini_set('display_error',1);


if (!function_exists('imagetruecolortopalette')) die('No imagetruecolortopalette function');
if (isset($_FILES['photo']))
{
	if ($_FILES['photo']['error']===0)
		render();
	else
		die("<script>alert('bad upload');parent.cb();</script>");
	exit;
}
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
function inject(f)
{
	$('#results').prepend('<img src="'+f+'">');
}
function cb()
{
	$('#sbutton').attr('disabled',false).val('Render');
}
$(function() {
	$('#pixel').slider({min:2, max:16, value:4, slide:function(e,u){ $('input[name=pixel]').val(u.value); $(this).find('span').text(u.value); }});
	$('#colors').slider({min:2, max:256, value:16, slide:function(e,u){ $('input[name=colors]').val(u.value); $(this).find('span').text(u.value); }});
	$('input[type=number]').hide();
	
	$( "#red, #green, #blue" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 255,
		value: 127,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$( "#red" ).slider( "value", 255 );
	$( "#green" ).slider( "value", 140 );
	$( "#blue" ).slider( "value", 60 );
});

function hexFromRGB(r, g, b) {
	var hex = [
		r.toString( 16 ),
		g.toString( 16 ),
		b.toString( 16 )
	];
	$.each( hex, function( nr, val ) {
		if ( val.length === 1 ) {
			hex[ nr ] = "0" + val;
		}
	});
	return hex.join( "" ).toUpperCase();
}
function refreshSwatch() {
	var red = $( "#red" ).slider( "value" ),
		green = $( "#green" ).slider( "value" ),
		blue = $( "#blue" ).slider( "value" ),
		hex = hexFromRGB( red, green, blue );
	$( "#swatch" ).css( "background-color", "#" + hex );
	$('input[name=hrgb]').val(hex);
}
function ss() {
	$('#sbutton').attr('disabled',true).val('Rendering...');
}

</script>
</head>
<body>
	<header>
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOkAAAFDAgMAAACiqcFMAAAACVBMVEUhISHc3dxeXl78LUHOAAABbklEQVR4nO3YUW7EIAxF0Sytm5hNssoqtVwbMKTqVx66lkaaBB9+5gGZXJ9/19eF1bXtp7Dn2dauobCn2NmtNVbLhrtX/bPGallXVdkYVtfupGusqr3H5iexvcbq2Gpt9zPMOzxWx95jtex1nh+rYm1Xx55qbewvNicIe4ZtLdvow+rY9ckd+u7Batr92rcOrKb1tf1kx9Mbq2H9ncjO2v7ghdW09QyeHaym9bG+s7/K1sewGjZnwhNi1/G8bR+suo2yO9YZ6cjvyLAq1jtnHymxpGA17apyarC6tlr9/f32W1g9u9J59dvpHWNYJVvv7/62y2XuwSrZKhveHxKrasds9GI8t7FqdkxGWP/HPKYHq2RHlW18x55g65mw6vbuqFR1cmP1bNb+xB32KVfYt1vrm+fKZzhW1/arf06Gl/Vg1az39ndG6YVVtbG/r5wVVsfGnZyOvcZq2LkjJwarbKtf/9PVOh/Y99uqXm6/AdmjN8YrIxarAAAAAElFTkSuQmCC">
	8-bit Avatar Maker
	</header>
	<p align=center>Create a retro 8-bit avatar image from your uploaded picture. Best use with a close-up shot of your face!</p>
	<div id="content">
		<iframe width=1 height=1 frameborder="0" name="_ifsubmit"></iframe>
		<form method="post" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" target="_ifsubmit" onsubmit="ss()">
		<table>
		<tr><td nowrap>Pick Image</td><td><input type=file name="photo" onchange="ss();form.submit();"></td></tr>
		<tr><td>Pixelate</td><td><div id="pixel"><span>4</span></div><input name=pixel type=number value=4></td></tr>
		<tr><td>Colors</td><td><div id="colors"><span>16</span></div><input name=colors type=number value=16></td></tr>
		<tr><td nowrap>Color Hue<input type=checkbox name=hue></td><td>
			<input type=hidden name=hrgb value="">
			<div id=red></div>
			<div id=green></div>
			<div id=blue></div>
			<div id=swatch></div>
		</td></tr>
		<tr><td>Effects</td><td><input type=checkbox name=invert value="1"> Invert <input type=checkbox name=sharpen value="1"> Sharpen <input type=checkbox name=gaussian value="1"> Smooth</td></tr>
		<tr><td colspan="2" align="center"><input type=submit id=sbutton value="Render"></td></tr>
		</table>
		<br>
		<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>

<!-- AddThis Button END -->
		</form>
	</div>
	<div id="results"></div>
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

function render()
{
	$img = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
	if (!$img) $img = imagecreatefrompng($_FILES['photo']['tmp_name']);
	if (!$img) $img = imagecreatefromgif($_FILES['photo']['tmp_name']);
	if (!$img) die("<script>alert('invalid image format');parent.cb();</script>");
	
	// special filters
	if (isset($_REQUEST['hue'])) imagefilter($img, IMG_FILTER_COLORIZE, hexdec(substr($_REQUEST['hrgb'], 0, 2)), hexdec(substr($_REQUEST['hrgb'], 2, 2)), hexdec(substr($_REQUEST['hrgb'], 4, 2)));
	if (isset($_REQUEST['invert'])) imagefilter($img, IMG_FILTER_NEGATE);
	if (isset($_REQUEST['sharpen'])) imagefilter($img, IMG_FILTER_SMOOTH, -9);
	if (isset($_REQUEST['gaussian'])) imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR);
	
	// pixelate it
	$w = imagesx($img);
	$h = imagesy($img);
	if ($w>500 || $h>500) die("<script>alert('image too large, max 500x500');parent.cb();</script>");
	$step = intval($_REQUEST['pixel']);
	$step2 = $step-1;
	// resample to 5x5 pixels
	for($y=0;$y<$h;$y+=$step)
	{
		for($x=0;$x<$w;$x+=$step)
		{
			$col = imagecolorat2($img,$x,$y,$step);
			imagefilledrectangle($img,$x,$y,$x+$step2,$y+$step2,$col);
		}
	}
	
	// color reduction
	imagetruecolortopalette($img,false,intval($_REQUEST['colors']));
	
	// keep
	session_start();
	$fn = "/tmp/".session_id().'_'.time();
	imagepng($img,$fn);
	
	// output inline
	print "<script>parent.cb();parent.inject('";
	print "data:image/png;base64,";
	print base64_encode(file_get_contents($fn));
	print "');</script>";
	unlink($fn);
}

function imagecolorat2($img,$x,$y,$step)
{
	$w = imagesx($img);
	$h = imagesy($img);
	
	$rgb = imagecolorat($img,min($w,$x),min($h,$y));
	$r = ($rgb >> 16) & 0xFF;
	$g = ($rgb >> 8) & 0xFF;
	$b = $rgb & 0xFF;


	$rgb = imagecolorat($img,min($w,$x+$step-1),min($h,$y));
	$r += ($rgb >> 16) & 0xFF;
	$g += ($rgb >> 8) & 0xFF;
	$b += $rgb & 0xFF;

	$rgb = imagecolorat($img,min($w,$x),min($h,$y+$step-1));
	$r += ($rgb >> 16) & 0xFF;
	$g += ($rgb >> 8) & 0xFF;
	$b += $rgb & 0xFF;
	
	$rgb = imagecolorat($img,min($w,$x+$step-1),min($h,$y+$step-1));
	$r += ($rgb >> 16) & 0xFF;
	$g += ($rgb >> 8) & 0xFF;
	$b += $rgb & 0xFF;
	
	$r/=4;
	$g/=4;
	$b/=4;
	
	return ($r<<16 | $g<<8 | $b);
}

?>
