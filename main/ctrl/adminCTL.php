<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-16
 * Time: 오전 10:54
 */



function adminCTL($func){
    include_once '../model/admin_func.php';
    include_once '../model/song_list.php';

    $sub = intval(($func%100)/10);
    $eachPageLimit = array(
        array(5,10),
        array(10,10),
        array(10,10),
        array(5,10)
    );

    $perPage = $eachPageLimit[$sub-1][0];
    $perBlock = $eachPageLimit[$sub-1][1];

    if($func%100 == 0){
        $func += 10;
        redirect_to_ctrl($func,null);
    }

    $currentPage = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

    if (isset($_POST['key_option'])) {
        $_SESSION['key_option'] = $_POST['key_option'];
    }
    else {
        $_SESSION['key_option'] = null;
    }
    /*
     * 910 회원 조회 - view
     * 911 회원 상세 - view
     * 912 회원 수정 - view
     * 913 회원 삭제
     *
     * 920 앨범 조회 - view
     * 921 앨범 상세 - view
     * 922 - view, 926 앨범 추가
     * 923 - view, 925 앨범 수정
     * 924 앨범 삭제
     *
     * 930 곡 조회 -> 앨범 상세
     * 931 곡 추가 - view
     * 932 곡 수정 - view
     * 933 곡 삭제
     */
    switch($func){

        case 910:{
            $arr = list_member($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['member_info'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            echo redirect_to_view($func,$_REQUEST['key']);
            break;
        }

        case 911:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target) {
                detail_info($target,$sub);
            }
            else{
                die("No Target");
            }
            break;
            echo redirect_to_view($func,null);
        }

        case 912:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;

            if(isset($_SESSION['pre_member_info']) && $_SESSION['pre_member_info']){
                $info['password'] = isset($_POST['password']) ? $_POST['password'] : null;
                $info['e_mail'] = isset($_POST['e_mail']) ? $_POST['e_mail'] : null;
                $info['nick'] = isset($_POST['nick']) ? $_POST['nick'] : null;
                $info['status'] = isset($_POST['status']) ? $_POST['status'] : null;
                modify_member($_SESSION['pre_member_info']['id'], $info) or die("Query Error - Modify member");
                $_SESSION['pre_member_info']=null;
                $func = 910;
                echo redirect_to_ctrl($func,null);
            }
            else{
                if($target){
                    $pre_info = member_info($target);
                    $_SESSION['pre_member_info'] = $pre_info;
                }
                else{
                    die("No Target");
                }
                $func = 912;
                echo redirect_to_view($func,null);
            }
            break;
        }


        case 913:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target){
                delete_member($target) or die("Query Error - Delete member");
            }
            else{
                die("No target");
            }
            $func =910;
            echo redirect_to_ctrl($func,null);
            break;
        }


        case 920:{
            $arr = list_album($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['list_album'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            echo redirect_to_view($func,$_REQUEST['key']);
            break;
        }

        case 921:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            $detail_album = detail_info($target, $sub);
            $_SESSION['detail_album'] = $detail_album;
            echo redirect_to_view($func,null);
            break;
        }

        case 922:{
            $info = artist_info();
            $_SESSION['artist_info'] = $info;
            $func = 922;
            echo redirect_to_view($func, null);
            break;
        }

        case 923:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;

            if($target){
                $pre_info = detail_info($target, $sub);

                $_SESSION['pre_album_info'] = $pre_info;
            }
            else{
                die("No Target");
            }
            echo redirect_to_view($func,null);
        }

        case 924:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target){
                delete_album($target);
            }
            else{
                die("No target");
            }
            $func = 920;
            echo redirect_to_ctrl($func,null);
            break;
        }

        //925
        case 925:{
            //$thumbMaxHeight = 5;
            //$fileMaxSize = 2000000;
            //$info['album_art'] =  isset($_FILES['album_art']) ? $_FILES['album_art'] : null;
            $info['album_code'] = isset($_SESSION['pre_album_info']['album_code']) ? $_SESSION['pre_album_info']['album_code'] : null;
            $info['album_art'] = isset($_POST['album_art']) ? $_POST['album_art'] : null;
            //$info['album_artS'] = isset($_POST['album_artS']) ? $_POST['album_artS'] : null;
            //$info['album_title'] = isset($_POST['album_title']) ? $_POST['album_title'] : null;
            $info['artist'] = isset($_POST['artist']) ? $_POST['artist'] : null;
            $info['artist_code'] = isset($_POST['artist_code']) ? $_POST['artist_code'] : null;
            $info['release_date'] = isset($_POST['release_date']) ? $_POST['release_date'] : null;
            if(count($_SESSION['pre_album_info']['title_info']) !=0){
                for ($index_i = 0; $index_i < count($_SESSION['pre_album_info']['title_info']); $index_i++) {
                    $info['title_code'][$index_i] = isset($_SESSION['pre_album_info']['title_info'][$index_i]['title_code']) ? $_SESSION['pre_album_info']['title_info'][$index_i]['title_code'] : null;
                    $info['title_name'][$index_i] = isset($_POST['title_name'][$index_i]) ? $_POST['title_name'][$index_i] : null;
                    $info['track_num'][$index_i] = isset($_POST['track_num'][$index_i]) ? $_POST['track_num'][$index_i] : null;
                    $info['album_code'][$index_i] = isset($info['album_code']) ? $info['album_code'] : null;
                    $info['genre'][$index_i] = isset($_POST['genre'][$index_i]) ? $_POST['genre'][$index_i] : null;
                }
            }

            modify_album($_SESSION['pre_album_info'][0]['album_code'], $info) or die("Query Error - Modify album");
            $_SESSION['pre_album_info']=null;
            unset( $_SESSION['pre_album_info']);
            $func = 920;
            echo redirect_to_ctrl($func,null);
        }

        case 926:{
            //fileInfo lib
            require_once '../common/plugin/getid3/getid3.php';


            $albumArtPath = "../art/";
            $thumbnailPath = "../art/artS/";
            $thumbnailMaxHeight = 100;
            $fileMaxSize = 2000000;
            $mp3Path = "d:/study/git/B_music/main/mp3/";
            $mp3PrePath = "../mp3/pre";

            $info['album_title'] = isset($_POST['album_title']) ? $_POST['album_title'] : null;
            $info['release_date'] = isset($_POST['release_date']) ? $_POST['release_date'] : null;
            $info['artist_code'] = isset($_POST['artist_code']) ? $_POST['artist_code'] : null;
            $info['title_name'] = isset($_POST['title_name']) ? $_POST['title_name'] : null;
            $info['track_num'] = isset($_POST['track_num']) ? $_POST['track_num'] : null;
            $info['genre'] = isset($_POST['genre']) ? $_POST['genre'] : null;
            $info['url'] = isset($_POST['url']) ? $_POST['url'] : null;
            $info['urlS'] = isset($_POST['urlS']) ? $_POST['urlS'] : null;
            $info['album_art'] = isset($_POST['album_art']) ? $_POST['album_art'] : null;
            $info['album_artS'] = isset($_POST['album_artS']) ? $_POST['album_artS'] : null;
            //print_r($_FILES);

            $add_result = add_album($info);
            if(!$add_result['result']){
                $func = 922;
                pop_message("Error while add new album");
                redirect_to_ctrl($func, null);
            }

            else{             
                $Acode = $add_result['Acode'];

                $upLoadImgInfo['name'] = isset($_FILES['album_art']['name']) ? ($_FILES['album_art']['name']) : null;
                $upLoadImgInfo['tmp_name'] = isset($_FILES['album_art']['tmp_name']) ? ($_FILES['album_art']['tmp_name']) : null;
                $upLoadImgInfo['type'] = isset($_FILES['album_art']['type']) ? ($_FILES['album_art']['type']) : null;
                $upLoadImgInfo['size'] = isset($_FILES['album_art']['size']) ? ($_FILES['album_art']['size']) : null;
                $upLoadImgInfo['error'] = isset($_FILES['album_art']['error']) ? ($_FILES['album_art']['error']) : null;
            }

            if( $upLoadImgInfo['name'] && $upLoadImgInfo['error'] == 0){
                $imgType = pathinfo($upLoadImgInfo['name'],PATHINFO_EXTENSION); //이미지 파일 확장자 추출

                $fileName = strval($Acode);
                $fileNameWithExt = $fileName.".".strval($imgType);
                $thumbnailWithExt = $fileName."_S".".".strval($imgType);

                $upload_result = singleFileUpload($upLoadImgInfo, $albumArtPath, $fileNameWithExt, $fileMaxSize);  // commonLIB.php 포함 함수
                //echo "==>".var_dump(iconv_get_encoding('all'))."<br>";

                if( $upload_result['uploadOk'] ){ // 업로드가 성공 했다면.
                    $info['album_art'] = $fileNameWithExt; // pfimage 값 설정

                    // 이미지 파일이 jpg, png, gif 포맷이면 썸네일 이미지 생성
                    if( $imgType == "jpg" || $imgType == "jpeg" || $imgType == "png" || $imgType == "gif"){
                        $src = $albumArtPath.strval($fileNameWithExt);
                        $thumbSrc = $thumbnailPath.strval($thumbnailWithExt);
                        makeThumbnailImage($src, $thumbSrc, $thumbnailMaxHeight, $imgType);

                        $info['album_artS'] = $thumbnailWithExt; // psimage 값 설정

                    }
                }
            }

            $update_result = updateThumbnail($info['album_art'], $info['album_artS'], $Acode);
            if(!$update_result){
                $func = 922;
                pop_message("Error while Update Thumbnail");
            }


            //mp3 upload
            else{
                //loop upload
                for($index_i = 0 ; count($info['track_num']) ; $index_i++){}
                $add_result = add_title($info, $Acode);
                if(!$add_result['result']){
                    $func = 922;
                    pop_message("Error while add title");
                    redirect_to_ctrl($func, null);
                }

                else{
                    $Acode = $add_result['Acode'];

                    $upLoadImgInfo['name'] = isset($_FILES['album_art']['name']) ? ($_FILES['album_art']['name']) : null;
                    $upLoadImgInfo['tmp_name'] = isset($_FILES['album_art']['tmp_name']) ? ($_FILES['album_art']['tmp_name']) : null;
                    $upLoadImgInfo['type'] = isset($_FILES['album_art']['type']) ? ($_FILES['album_art']['type']) : null;
                    $upLoadImgInfo['size'] = isset($_FILES['album_art']['size']) ? ($_FILES['album_art']['size']) : null;
                    $upLoadImgInfo['error'] = isset($_FILES['album_art']['error']) ? ($_FILES['album_art']['error']) : null;
                }

                if( $upLoadImgInfo['name'] && $upLoadImgInfo['error'] == 0){
                    $imgType = pathinfo($upLoadImgInfo['name'],PATHINFO_EXTENSION); //이미지 파일 확장자 추출

                    $fileName = strval($Acode);
                    $fileNameWithExt = $fileName.".".strval($imgType);
                    $thumbnailWithExt = $fileName."_S".".".strval($imgType);

                    $upload_result = singleFileUpload($upLoadImgInfo, $albumArtPath, $fileNameWithExt, $fileMaxSize);  // commonLIB.php 포함 함수
                    //echo "==>".var_dump(iconv_get_encoding('all'))."<br>";

                    if( $upload_result['uploadOk'] ){ // 업로드가 성공 했다면.
                        $info['album_art'] = $fileNameWithExt; // pfimage 값 설정

                        // 이미지 파일이 jpg, png, gif 포맷이면 썸네일 이미지 생성
                        if( $imgType == "jpg" || $imgType == "jpeg" || $imgType == "png" || $imgType == "gif"){
                            $src = $albumArtPath.strval($fileNameWithExt);
                            $thumbSrc = $thumbnailPath.strval($thumbnailWithExt);
                            makeThumbnailImage($src, $thumbSrc, $thumbnailMaxHeight, $imgType);

                            $info['album_artS'] = $thumbnailWithExt; // psimage 값 설정

                        }
                    }
                }

                $update_result = updateThumbnail($info['album_art'], $info['album_artS'], $Acode);
                if(!$update_result){
                    $func = 922;
                    pop_message("Error while Update Thumbnail");
                }

                //checks tags
                $getID3 = new getID3();
                $tags = $getID3->analyze($mp3Path);
                getid3_lib::CopyTagsToComments($tags);

                echo $tags['tags']['id3v2']['title'][0];  // title from ID3v2
                echo "<BR>";
                echo $tags['tags']['id3v2']['track_number'][0];  // title from ID3v2
                echo "<BR>";
                echo $tags['tags']['id3v2']['artist'][0];  // title from ID3v2
                echo "<BR>";
                echo $tags['tags']['id3v2']['genre'][0];  // title from ID3v2
                echo "<BR>";
                echo $tags['tags']['id3v2']['length'][0];  // title from ID3v2
                echo "<BR>";
                echo $tags['fileformat'];
                echo "<BR>";

            }

            echo redirect_to_view($func, null);
        }

        case 930:{
            $arr = list_title($currentPage, $perPage, $_REQUEST['key'], $_SESSION['key_option']);
            $_SESSION['list_title'] = $arr;
            $pageInfo = pageInfo($currentPage, $arr['count'],$perPage,$perBlock);
            $_SESSION['pageInfo'] = $pageInfo;
            echo redirect_to_view($func,null);
            break;
        }


        case 931:{

            echo redirect_to_view($func,null);
            break;
        }

        case 932:{
            echo redirect_to_view($func,null);
            break;
        }

        case 933:{
            $target = isset($_REQUEST['target']) ? $_REQUEST['target'] : null;
            if($target){
                delete_song($target);
            }
            else{
                die("No target");
            }
            $func = 930;
            echo redirect_to_ctrl($func,null);
            break;
        }
        default : {

        }
    }
    //$pageInfo = pageInfo($currentPage, $arr['count'], $perPage, $perBlock);
    //$_SESSION['pageInfo'] = $pageInfo;
}
