<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 7:17
 */

/*if($_SESSION['id'] = 'admin'){
    $user = "b_admin";
    $password = "B!";
}
else{
    $user = "b_user";
    $password = "b!";
}
define("HOST", "jycom.asuscomm.com");
define("USER", $user);
define("PASSWORD", $password);
define("DB", "b_music");
define("PORT", 3306);*/


define("HOST", "jycom.asuscomm.com");
define("USER", "b_admin");
define("PASSWORD", "B!");
define("DB", "b_music");
define("PORT", 3306);


function DB_CONN(){
    $conn = mysqli_connect(HOST, USER, PASSWORD, DB, PORT);
    return $conn;
}

function returnValue($argQuery){
    $result = mysqli_query(DB_CONN(), $argQuery);
    while($row = mysqli_fetch_array($result)){
        $arrTemp[] = $row;
    }
    return $arrTemp;
}

function pageInfo($argPage, $cntRecord, $perPage, $perBlock){
    $page['numbOfData'] = $cntRecord;
    $page['totalP'] = ceil($page['numbOfData'] / $perPage);
    $page['currentPage'] = ($argPage <= $page['totalP']) ? $argPage : $argPage-1;
    //$page['currentPage'] = $argPage;
    $page['block'] = ceil($argPage / $perBlock);
    $page['cntBlock'] = ceil($page['totalP'] / $perBlock);
    $page['b_startP'] = (($page['block'] -1) * $perBlock) + 1;
    $page['b_endP'] = $page['b_startP'] + $perBlock -1;
    $page['perPage'] = $perPage;
    $page['perBlock'] = $perBlock;

    if($page['b_endP'] > $page['totalP']){
        $page['b_endP'] = $page['totalP'];
    }

    return $page;

}

function singleFileUpload($uploadFileInfo, $uploadPath, $saveFileName, $fileMaxSize){

    $targetDir = $uploadPath;
    $targetFile = $targetDir.basename($saveFileName);
    $imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);

    // 이미지 파일이 가짜 이미지 파일 인지 확인
    $check = getimagesize($uploadFileInfo["tmp_name"]);
    if($check != false) {
        $returnArr['msg'][0] = "File is an image - " . $check["mime"] . ".";
        $returnArr['uploadOk'] = 1;
    } else {
        $returnArr['msg'][0] = "File is not an image.";
        $returnArr['uploadOk'] = 0;
    }

    // 대상 파일이 이미 존재하고 있는지 확인
    if (file_exists($targetFile)) {
        $returnArr['msg'][1] = "Sorry, file already exists.";
        $returnArr['uploadOk'] = 0;
    }

    // 파일의 SIZE가 정해진 크기 이내에 있는지 확인
    if ($uploadFileInfo["size"] > $fileMaxSize) {
        $returnArr['msg'][2] = "Sorry, your file is too large.";
        $returnArr['uploadOk'] = 0;
    }

    // 이미지 파일 포맷이 jpg, jpeg, png, gif 인지 확인
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $returnArr['msg'][3] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $returnArr['uploadOk'] = 0;
    }

    // 위 모든 점검에 이상이 없는지 확인 후 파일 upload 실시
    if ($returnArr['uploadOk'] == 0) {
        $returnArr['msg'][4] = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($uploadFileInfo["tmp_name"], $targetFile)) {
            $returnArr['msg'][5] = "The file ". basename( $uploadFileInfo["name"]). " has been uploaded.";
        } else {
            $returnArr['msg'][5] = "Sorry, there was an error uploading your file.";
        }
    }

    return $returnArr;
}

function makeThumbnailImage($src, $thumbSrc, $maxHeight, $imgType) {

    // 이미지 소스 파일을 읽어 온다.
    if( $imgType == "jpg" || $imgType == "jpeg"){
        $sourceImage = imagecreatefromjpeg($src);
    }elseif ( $imgType == "png") {
        $sourceImage = imagecreatefrompng($src);
    }else{
        $sourceImage = imagecreatefromgif($src);
    }

    $width = imagesx($sourceImage);
    $height = imagesy($sourceImage);

    // 이미지 크기를 조정
    $maxWidth = floor($width * ($maxHeight / $height));

    // 버추얼 이미지를 생성
    $virtualImage = imagecreatetruecolor($maxWidth, $maxHeight);

    // 조정된 사이즈로 원본 이미지를 버추얼 이미지로 복사.
    imagecopyresampled($virtualImage, $sourceImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $width, $height);

    // 지정된 위치에 thumbnail 이미지 생성
    if( $imgType == "jpg" || $imgType == "jpeg"){
        imagejpeg($virtualImage, $thumbSrc);
    }elseif ( $imgType == "png") {
        imagepng($virtualImage, $thumbSrc);
    }else{
        imagegif($virtualImage, $thumbSrc);;
    }

}


function pop_message($argMessage){
    echo $argMessage;
    return "<script>alert('$argMessage')</script>";
}
function redirect_to_view($argFunc, $argKey){
//function redirect_to_view($argFunc, $argPage, $argKey){
    return "<script>location.replace('../view/main_view.php?func=$argFunc&key=$argKey')</script>";
}

function redirect_to_ctrl($argFunc, $argKey){
//function redirect_to_ctrl($argFunc, $argPage, $argKey){
    return "<script>location.replace('../ctrl/main_ctrl.php?func=$argFunc&key=$argKey')</script>";
}

function redirect_to_ctrlWithPage($argFunc, $argKey, $argPage){
//function redirect_to_ctrl($argFunc, $argPage, $argKey){
    return "<script>location.replace('../ctrl/main_ctrl.php?func=$argFunc&key=$argKey&page=$argPage')</script>";
}

function redirect_to_ctrlWithSongCode($argFunc, $argCode){
    return "<script>location.replace('../ctrl/main_ctrl.php?func=$argFunc&code=$argCode')</script>";
}
