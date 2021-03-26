<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/shop/itemuseform.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;
?>

<style>
.admin-shop-itemuseform .input-fake {padding:4px 10px;border:1px solid #d5d5d5;margin-bottom:10px}
.admin-shop-itemuseform .input-fake .info-photo {display:inline-block;width:26px;height:26px;margin-right:2px;border:1px solid #e5e5e5;padding:1px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.admin-shop-itemuseform .input-fake .info-photo img {width:100%;height:auto;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.admin-shop-itemuseform .input-fake .info-photo .info-icon {width:22px;height:22px;font-size:12px;line-height:22px;text-align:center;background:#959595;color:#fff;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:inline-block;white-space:nowrap;vertical-align:baseline;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
</style>

<div class="admin-shop-itemuseform">
    <form name="fitemuseform" method="post" action="<?php echo $action_url1; ?>" onsubmit="return fitemuseform_submit(this);" class="eyoom-form">
    <input type="hidden" name="w" value="<?php echo $w; ?>">
    <input type="hidden" name="is_id" value="<?php echo $is_id; ?>">
    <input type="hidden" name="sca" value="<?php echo $sca; ?>">
    <input type="hidden" name="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" value="<?php echo $sod; ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">

    <div class="adm-headline">
        <h3>사용후기 수정</h3>
    </div>

    <div class="adm-table-form-wrap margin-bottom-30">
        <header><strong><i class="fas fa-caret-right"></i> 상품문의 내역</strong></header>
        <fieldset>
            <div class="cont-text-bg">
                <p class="bg-info font-size-12 margin-bottom-0">
                    <i class="fas fa-info-circle"></i> 상품에 대한 문의에 답변하실 수 있습니다. 상품 문의 내용의 수정도 가능합니다.
                </p>
            </div>
        </fieldset>

        <div class="table-list-eb">
            <?php if (!G5_IS_MOBILE) { ?>
            <div class="table-responsive">
            <?php } ?>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">상품명</label>
                        </th>
                        <td>
                            <a href="<?php echo shop_item_url($is['it_id']); ?>"><?php echo $is['it_name']; ?></a>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">이름</label>
                        </th>
                        <td>
                            <div class="input-fake">
                                <?php if($mb_photo) { ?>
                                <span class="info-photo"><?php echo $mb_photo ?></span>
                                <?php } else { ?>
                                <span class="info-icon"><i class="fas fa-user"></i></span>
                                <?php } ?>
                                <span class="info-name"><?php echo $name; ?></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">평점</label>
                        </th>
                        <td>
                            <div class="margin-bottom-10">
                                <img src="../../../../../../shop/img/s_star<?php echo $is['is_score']; ?>.png" width="100"> (<?php echo $is['is_score']; ?> 점)
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="is_subject">제목</label>
                        </th>
                        <td>
                            <label class="input">
                                <input type="text" name="is_subject" id="is_subject" value="<?php echo get_text($is['is_subject']); ?>" required>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">내용</label>
                        </th>
                        <td>
                            <label for="is_content" class="textarea">
                                <?php echo editor_html('is_content', get_text(html_purifier($is['is_content']), 0)); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="is_reply_subject">답변 제목</label>
                        </th>
                        <td>
                            <label class="input">
                                <input type="text" name="is_reply_subject" id="is_reply_subject" value="<?php echo get_text($is['is_reply_subject']); ?>">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">내용</label>
                        </th>
                        <td>
                            <label for="is_reply_content" class="textarea">
                                <?php echo editor_html('is_reply_content', get_text(html_purifier($is['is_reply_content']), 0)); ?>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">확인</label>
                        </th>
                        <td>
                            <div class="inline-group">
                                <label for="is_confirm_yes" class="radio"><input type="radio" name="is_confirm" value="1" id="is_confirm_yes" <?php echo $is_confirm_yes; ?>><i></i> 예</label>
                                <label for="is_confirm_no" class="radio"><input type="radio" name="is_confirm" value="0" id="is_confirm_no" <?php echo $is_confirm_no; ?>><i></i> 아니오</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php if (!G5_IS_MOBILE) { ?>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php echo $frm_submit; // 버튼 ?>

    </form>
</div>

<script>
function fitemuseform_submit(f)
{
    <?php echo get_editor_js('is_content'); ?>
    <?php echo get_editor_js('is_reply_content'); ?>
    return true;
}
</script>
