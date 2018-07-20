<?php
/**********  仅测试程序 **********/

$dir = '../../../Uploads/user-image/'.date('Y-m-d').'/';  //图片存储路径
$savePicName = $_GET['uid'].'-'.time();  //图片存储名称

if(!is_dir($dir)){
    if(false === mkdir($dir, 0777, true)){
        $rs['status'] = 1;
        $rs['picUrl'] = "目录 {$dir} 创建失败！";
        die(json_encode($rs));
    }
}


$file_src = $dir.$savePicName."_src.jpg";
$filename162 = $dir.$savePicName."_162.jpg";
$filename48 = $dir.$savePicName."_48.jpg";
$filename20 = $dir.$savePicName."_20.jpg";

//$src=base64_decode($_POST['pic']);
$pic1=base64_decode($_POST['pic1']);   
/*$pic2=base64_decode($_POST['pic2']);
$pic3=base64_decode($_POST['pic3']);

if($src) {
	file_put_contents($file_src,$src);
}*/

file_put_contents($filename162,$pic1);
/*file_put_contents($filename48,$pic2);
file_put_contents($filename20,$pic3);*/

$rs['status'] = 1;
$rs['picUrl'] = str_replace('../../..', '', $filename162);

print json_encode($rs);

?>
