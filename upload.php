<?php echo '';
function generateRandomString($length = 16)
{return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);}
$rand = generateRandomString();
$target_dir = "uploads/";
$target_file = $target_dir .$rand . '/' . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($imageFileType != "py" ) {echo "Sorry, this file is not a python file.  ";$uploadOk = 0;}
if ($uploadOk == 0) {echo "the file was not uploaded.";}
else {mkdir("E:\wamp64\www\uploads/" . $rand , 0777, true);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been compiled!";}
else {echo "Sorry, there was an error compiling your file.";}}

$testpy = basename( $_FILES["fileToUpload"]["name"]);
$testexe = $testpy;
$testexe = str_replace("py", "exe", $testexe);
if ($uploadOk != 0) {shell_exec("pyinstaller --distpath E:\wamp64\www\uploads/" . $rand . '/' . " --onefile E:\wamp64\www\uploads/" . $rand . '/' . $testpy);}
if ($uploadOk != 0) {echo '
<style>body {background-color: #778899;}</style>
<h2>Thank you for using Python2exe.com</h2>
<a href="'."uploads/". $rand . '/' .$testexe.'">'.$testexe.'</a>';}?>
