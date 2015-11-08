<?php
/**
 * Created by PhpStorm.
 * User: JongYoon
 * Date: 2015-11-04
 * Time: ���� 2:23
 */

/* 100 : 로그인
 * 110 : 가입
 * 2xx : 노래
 * 3xx : 뮤비
 * 9xx : 관리자
 *
 *
*/
echo "main<br>";



?>

<a href = "../view/main_view.php?func=100">100&nbsp로그인</a><br><br>

<a href = "../view/main_view.php?func=110">110&nbsp가입</a><br><br>

<a href = "../ctrl/main_ctrl.php?func=200&page=1">200&nbsptop100</a><br><br>

<a href = "../ctrl/main_ctrl.php?func=210&page=1">210&nbsp전체</a><br><br>