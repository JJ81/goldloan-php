<?php

require_once('../../../autoload.php');
require_once('../../../commons/config.php');
require_once('../../../commons/utils.php');
require_once('../../../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT . '/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo(ROOT . '/', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

if(empty($_POST['id'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/faq/list.php', '잘못된 접근입니다.');
    exit;
}

$id=getDataByPost('id');
$title=getDataByPost('title');
$date=getDataByPost('date');
if($date == null){
    $date=getToday('Y-m-d H:i:s');
}

// html 관련 처리가 필요할 것 같다 공격방지처리
$html = $_POST["ir1"];

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$admin_id=$_SESSION['user_id'];

$query = "update `cms_board_faq` set `title`='$title', `created_dt`='$date', `contents`='$html' where `id`=$id;";
$result = $db->update($query);

$db=null;


Redirect('/admin/notice/view.php?id='.$id);


?>