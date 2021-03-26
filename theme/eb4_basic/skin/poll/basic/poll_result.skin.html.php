<?php
/**
 * skin file : /theme/THEME_NAME/skin/poll/basic/poll_result.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/bootstrap/css/bootstrap.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/fontawesome5/css/fontawesome-all.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/eyoom-form/css/eyoom-form.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/sweetalert/sweetalert.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/common.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/style.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/custom.css" type="text/css" media="screen">',0);
?>

<style>
.poll-result {position:relative;overflow:hidden;padding:5px}
.poll-result .etc-list {border-bottom:1px solid #eaeaea;padding:10px 0}
.poll-result .etc-write {position:relative;background:#fbfbfb;border:1px solid #e5e5e5;padding:10px;margin-top:20px}
<?php if (G5_IS_MOBILE) { ?>
.poll-result {padding:20px 15px}
.poll-result .win-title {position:relative;margin:0 0 20px;font-size:18px;height:50px;line-height:30px;padding:10px;background:#555;color:#fff}
.poll-result .win-close-btn {position:absolute;top:10px;right:10px;width:30px;height:30px;line-height:30px;text-align:center;margin:0;padding:0;border:0;background:none;color:#fff;float:right}
<?php } ?>
</style>

<div class="poll-result">
    <?php if (G5_IS_MOBILE) { ?>
    <h4 class="win-title">
        <strong>투표 결과 보기</strong>
        <button type="button" onclick="window.close();" class="win-close-btn"><i class="fas fa-times"></i></button>
        <div class="clearfix"></div>
    </h4>
    <?php } ?>
    <h4 class="margin-bottom-20"><strong><?php echo $po_subject; ?></strong></h4>
    <div class="panel panel-dark">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fas fa-align-justify"></i> 투표결과</h4>
        </div>
        <div class="panel-body">
            <h6><strong class="color-red">전체 <?php echo $nf_total_po_cnt; ?>표</strong></h6>
            <div class="margin-hr-15"></div>
            <?php if (is_array($list) ) { ?>
            <?php foreach ($list as $key => $poitem ) { ?>
            <p><strong class="font-size-13"><?php echo $key; ?>. <?php echo $poitem['content']; ?></strong></p>
            <span class="progress-info-left"><strong class="color-red"><?php echo $poitem['cnt']; ?></strong> <strong>표</strong></span>
            <span class="progress-info-right"><?php echo number_format($poitem['rate'], 1); ?>%</span>
            <div class="progress progress-e progress-xxs progress-striped active">
                <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="<?php echo number_format($poitem['rate'], 1); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo number_format($poitem['rate'], 1); ?>%">
                </div>
            </div>
            <div class="margin-bottom-20"></div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
    <?php if ($is_etc) { ?>
    <div class="panel panel-dark">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fas fa-align-justify"></i> 기타의견</h4>
        </div>
        <div class="panel-body">
            <blockquote class="hero">
                <p><strong><?php echo $po_etc; ?></strong></p>
            </blockquote>
            <?php if (is_array($list2) ){ ?>
            <?php foreach ($list2 as $key => $poetc) { ?>
            <article class="etc-list">
                <span class="pull-left font-size-12"><strong><?php echo $poetc['pc_name']; ?></strong> 님의 의견</span>
                <span class="pull-right font-size-12 color-grey"><i class="far fa-clock"></i> <?php echo $poetc['datetime']; ?></span>
                <div class="clearfix"></div>
                <p class="margin-top-5"><?php echo $poetc['idea']; ?></p>
                <?php if ( $poetc['del'] ) { ?>
                <div class="text-right">
                    <?php echo $poetc['del']; ?><span class="btn-e btn-e-xs btn-e-dark">삭제</span></a>
                </div>
                <?php } ?>
            </article>
            <?php } ?>
            <?php } ?>
            <?php if ($member['mb_level'] >= $po['po_level']) { ?>
            <form name="fpollresult" action="<?php echo G5_BBS_URL; ?>/poll_etc_update.php" onsubmit="return fpollresult_submit(this);" method="post" autocomplete="off" class="eyoom-form">
            <input type="hidden" name="po_id" value="<?php echo $po_id; ?>">
            <input type="hidden" name="w" value="">
            <input type="hidden" name="skin_dir" value="<?php echo $skin_dir; ?>">
            <?php if ($is_member) { ?>
            <input type="hidden" name="pc_name" value="<?php echo cut_str($member['mb_nick'],255); ?>">
            <?php } ?>
            <div class="etc-write">
                <?php if ($is_guest) { ?>
                <section>
                    <label for="pc_name" class="label">이름<strong class="sound_only">필수</strong></label>
                    <label class="input required-mark">
                        <i class="icon-append fas fa-user"></i>
                        <input type="text" name="pc_name" id="pc_name" required size="10">
                    </label>
                </section>
                <?php } ?>
                <section>
                    <label for="pc_idea" class="label">의견<strong class="sound_only">필수</strong></label>
                    <label class="textarea textarea-resizable required-mark">
                        <textarea rows="3" type="text" id="pc_idea" name="pc_idea" required size="47" maxlength="100"></textarea>
                    </label>
                </section>
                <?php if ($is_guest) { ?>
                <section>
                    <label class="label">자동등록방지</label>
                    <div class="vc-captcha"><?php echo captcha_html(); ?></div>
                </section>
                <?php } ?>
                <div class="text-center margin-bottom-10 margin-top-20">
                    <input type="submit" class="btn-e btn-e-lg btn-e-red" value="의견남기기">
                </div>
            </div>
            </form>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
    <div class="panel panel-dark">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fas fa-align-justify"></i> 전체 투표결과 목록</h4>
        </div>
        <div class="panel-body">
            <ul>
                <?php if (is_array($list3) ) { ?>
                <?php foreach ($list3 as $key => $pores) { ?>
                <li><a href="<?php echo G5_BBS_URL; ?>/poll_result.php?po_id=<?php echo $pores['po_id']; ?>&amp;skin_dir=<?php echo $skin_dir; ?>"><span class="color-grey">[<?php echo $pores['date']; ?>]</span> <?php echo $pores['subject']; ?></a></li>
                <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php if (G5_IS_MOBILE) { ?>
    <div class="text-center margin-top-30 margin-bottom-30">
        <button class="btn-e btn-e-xlg btn-e-dark" type="button" onclick="window.close();">창닫기</button>
    </div>
    <?php } ?>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/sweetalert/sweetalert.min.js"></script>
<script>
$(function() {
    $(".poll_delete").click(function(e) {
        e.preventDefault();
        var linkURL = $(this).attr("href");
        etc_delete_link(linkURL);
    });
    function etc_delete_link(linkURL) {
        swal({
            title: "삭제",
            text: "해당 기타의견을 삭제하시겠습니까?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF9500",
            confirmButtonText: "삭제",
            cancelButtonText: "취소",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = linkURL;
        });
    }
});

function fpollresult_submit(f) {
    <?php if ($is_guest) { ?>
    chk_captcha_js();
    <?php } ?>

    return true;
}
</script>
<!--[if lt IE 9]>
    <script src="<?php echo EYOOM_THEME_URL; ?>/plugins/respond.min.js"></script>
    <script src="<?php echo EYOOM_THEME_URL; ?>/plugins/html5shiv.min.js"></script>
    <script src="<?php echo EYOOM_THEME_URL; ?>/plugins/eyoom-form/js/eyoom-form-ie8.js"></script>
<![endif]-->