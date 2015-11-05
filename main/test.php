<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: 오후 9:44
 */

include ("./model/template.php");

$template = new Template();

$template->load('./common/common_data.php');
$template->load('./model/sign_in.php');
$template->load('./model/sign_up.php');
$template->load('./model/search.php');
$template->load('./model/song_list.php');

$POST['id'] = $_POST['id'];
$POST['password'] = $_POST['password'];
$template->setData('id', $POST['id']);
$template->setData('password',$POST['password']);

$template->load('./testview.php');

/*
include_once './common/common_data.php';
include_once './model/sign_in.php';
include_once './model/sign_up.php';
include_once './model/search.php';
include_once './model/song_list.php';

function pt($arr, $count){
    for ($i = 0 ; $i < $count ; $i++){
        echo $arr[$i]['곡 명']."&nbsp&nbsp&nbsp".$arr[$i]['앨범']."&nbsp&nbsp&nbsp".$arr[$i]['아티스트']."&nbsp&nbsp&nbsp".$arr[$i]['장르']."&nbsp&nbsp&nbsp".$arr[$i]['발매 일'];
        echo "<BR>";
    }
}

$arr = all_song_list();
$count = count($arr);
pt($arr, $count);
echo "<BR><BR><BR><BR>";

$arr = top_100();
$count = count($arr);
pt($arr, $count);

echo "<BR><BR><BR><BR>";
$arr = categorize_gerne('pop');
$count = count($arr);

pt($arr, $count);
echo "<BR><BR><BR><BR>";

$arr = search('100');
$count = count($arr);
pt($arr, $count);
echo "<BR><BR><BR><BR>";
*/


?>


