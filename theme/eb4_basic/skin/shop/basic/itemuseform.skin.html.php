<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/itemuseform.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/bootstrap/css/bootstrap.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/fontawesome5/css/fontawesome-all.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/eyoom-form/css/eyoom-form.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/common.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/style.css" type="text/css" media="screen">',0);
?>

<style>
.shop-product-use-write {position:relative;overflow:hidden;padding:0 5px}
.shop-product-use-write .win-title {position:relative;margin:0 0 20px;font-size:16px;height:50px;line-height:30px;padding:10px;background:#555;color:#fff;margin-bottom:30px}
.shop-product-use-write .win-close-btn {position:absolute;top:10px;right:10px;width:30px;height:30px;line-height:30px;text-align:center;margin:0;padding:0;border:0;background:none;color:#fff}
.shop-product-use-write .radio {width:60px}
.shop-product-use-write .write-edit-wrap #is_content {display:block;box-sizing:border-box;-moz-box-sizing:border-box;width:100%;min-height:200px;padding:6px 10px;outline:none;border-width:1px;border-style:solid;border-radius:0;background:#FFF;color:#353535;appearance:normal;-moz-appearance:none;-webkit-appearance:none;resize:vertical}
/* Smart Editor */
.cke_sc {margin-bottom:10px !important}
.btn_cke_sc {padding:0 10px}
.cke_sc_def {padding:10px;margin-bottom:10px;margin-top:10px;background:#fbfbfb}
.cke_sc_def button {padding:3px 15px;background:#555555;color:#fff;border:none}
<?php if (G5_IS_MOBILE) { ?>
.shop-product-use-write {padding:20px 15px}
<?php } ?>
</style>

<?php /* ---------- 사용후기 쓰기 시작 ---------- */ ?>
<div class="shop-product-use-write">
    <h1 class="win-title">
        사용후기 쓰기
        <?php if (G5_IS_MOBILE) { ?>
        <button type="button" onclick="self.close();" class="win-close-btn"><i class="fas fa-times"></i></button>
        <?php } ?>
    </h1>

    <form name="fitemuse" method="post" action="<?php echo G5_SHOP_URL; ?>/itemuseformupdate.php" onsubmit="return fitemuse_submit(this);" autocomplete="off" class="eyoom-form">
    <input type="hidden" name="w" value="<?php echo $w; ?>">
    <input type="hidden" name="it_id" value="<?php echo $it_id; ?>">
    <input type="hidden" name="is_id" value="<?php echo $is_id; ?>">

    <div class="product-use-write">
        <div class="margin-bottom-20">
            <label for="is_subject" class="sound_only">제목<strong> 필수</strong></label>
            <label class="input required-mark">
                <input type="text" name="is_subject" value="<?php echo get_text($use['is_subject']); ?>" id="is_subject" required maxlength="250" placeholder="제목">
            </label>
        </div>
        <div class="margin-bottom-20">
            <strong class="sound_only">내용</strong>
            <div class="write-edit-wrap">
                <?php echo $editor_html; ?>
            </div>
        </div>
        <div class="margin-bottom-30">
            <span class="sound_only">평점</span>
            <ul class="list-unstyled">
                <li>
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="is_score" value="5" id="is_score5" <?php echo ($is_score==5)?'checked="checked"':''; ?>><i></i>매우만족
                        </label>
                        <img src="<?php echo G5_URL; ?>/shop/img/s_star5.png" alt="매우만족" width="100">
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="is_score" value="4" id="is_score4" <?php echo ($is_score==4)?'checked="checked"':''; ?>><i></i>만족
                        </label>
                        <img src="<?php echo G5_URL; ?>/shop/img/s_star4.png" alt="만족" width="100">
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="is_score" value="3" id="is_score3" <?php echo ($is_score==3)?'checked="checked"':''; ?>><i></i>보통
                        </label>
                        <img src="<?php echo G5_URL; ?>/shop/img/s_star3.png" alt="보통" width="100">
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="is_score" value="2" id="is_score2" <?php echo ($is_score==2)?'checked="checked"':''; ?>><i></i>불만
                        </label>
                        <img src="<?php echo G5_URL; ?>/shop/img/s_star2.png" alt="불만" width="100">
                    </div>
                    <div class="clearfix"></div>
                </li>
                <li>
                    <div class="inline-group">
                        <label class="radio">
                            <input type="radio" name="is_score" value="1" id="is_score1" <?php echo ($is_score==1)?'checked="checked"':''; ?>><i></i>매우불만
                        </label>
                        <img src="<?php echo G5_URL; ?>/shop/img/s_star1.png" alt="매우불만" width="100">
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
        </div>

        <div class="text-center">
            <input type="submit" value="작성완료" class="btn-e btn-e-xlg btn-e-red">
            <?php if (G5_IS_MOBILE) { ?>
            <button type="button" onclick="self.close();" class="btn-e btn-e-xlg btn-e-dark">닫기</button>
            <?php } ?>
        </div>
    </div>

    </form>
</div>

<script type="text/javascript">
function fitemuse_submit(f) {
    <?php echo $editor_js; ?>

    return true;
}

$(function(){
    $("input, textarea, select, button, i, div.note-editing-area, span.select2-selection, .calendar-time, ul.tag-editor, div.asSpinner-control").on({ 'touchstart' : function() {
        zoomDisable();
    }});
    $("input, textarea, select, button, i, div.note-editing-area, span.select2-selection, .calendar-time, ul.tag-editor, div.asSpinner-control").on({ 'touchend' : function() {
        setTimeout(zoomEnable, 500);
    }});
    function zoomDisable() {
        $('head meta[name=viewport]').remove();
        $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">');
    }
    function zoomEnable() {
        $('head meta[name=viewport]').remove();
        $('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1">');
    }
});
</script>
<?php /* ---------- 사용후기 쓰기 끝 ---------- */ ?>