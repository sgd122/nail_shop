<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/sms/install.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;
?>

<form name="hidden_form" method="post" action="<?php echo $action_url; ?>">
<input type="hidden" name="setup">
</form>

<?php
//SMS 설정 정보 테이블이 있는지 검사한다.
if( isset($g5['sms5_config_table']) && sql_query(" DESCRIBE {$g5['sms5_config_table']} ", false)) {
    if(!$setup){
        echo '<script>
            var answer = confirm("이미 SMS5가 설치되어 있습니다.새로 설치 할 경우 DB 자료가 망실됩니다. 새로 설치하시겠습니까?");
            if (answer){
                document.hidden_form.setup.value = "1";
                document.hidden_form.submit();
            } else {
                history.back();
            }
            </script>
        ';
        exit;
    }
}
?>

<div class="adm-headline">
    <h3><?php echo $g5['title']; ?></h3>
</div>

<div id="sms5_install">
    <ol>
        <li>SMS5 설치가 시작되었습니다.</li>
        <li id="sms5_job_01">전체 테이블 생성중</li>
        <li id="sms5_job_02">DB설정 중</li>
        <li id="sms5_job_03"></li>
    </ol>

    <p class="margin-top-30 margin-bottom-30"><button type="button" id="sms5_btn_next" disabled class="btn-e btn-e-lg btn-e-red" onclick="location.href='<?php echo G5_ADMIN_URL; ?>/?dir=sms&pid=config';">SMS 기본설정</button></p>

</div>

<?php
flush(); usleep(50000);

// 테이블 생성 ------------------------------------
$file = implode("", file(G5_ADMIN_PATH . "/sms_admin/sms5.sql"));
eval("\$file = \"$file\";");

$f = explode(";", $file);
for ($i=0; $i<count($f); $i++) {
    if (trim($f[$i]) == "") continue;
	$f[$i] = get_db_create_replace($f[$i]);
    sql_query($f[$i]) or die(mysqli_error());
}
// 테이블 생성 ------------------------------------

echo "<script>document.getElementById('sms5_job_01').innerHTML='전체 테이블 생성 완료';</script>";
flush(); usleep(50000);

$read_point = -1;
$write_point = 5;
$comment_point = 1;
$download_point = -20;

//-------------------------------------------------------------------------------------------------
// config 테이블 설정
$sql = " insert into {$g5['sms5_book_group_table']} set bg_name='미분류'";
sql_query($sql) or die(mysqli_error() . "<p>" . $sql);

echo "<script>document.getElementById('sms5_job_02').innerHTML='DB설정 완료';</script>";
flush(); usleep(50000);
//-------------------------------------------------------------------------------------------------

echo "<script>document.getElementById('sms5_job_03').innerHTML='SMS 기본 설정 변경 후 사용하세요.';</script>";
flush(); usleep(50000);
?>

<script>document.getElementById('sms5_btn_next').disabled = false;</script>
<script>document.getElementById('sms5_btn_next').focus();</script>
