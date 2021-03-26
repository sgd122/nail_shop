<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/shop/couponzoneform.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/magnific-popup/magnific-popup.min.css" type="text/css" media="screen">',0);
?>

<style>
.admin-shop-couponzoneform .table-form-thumb-img {position:relative;float:left;width:150px}
.admin-shop-couponzoneform .table-form-thumb .coupon-img {width:120px;height:auto;border:1px solid #d5d5d5;padding:3px}
.admin-shop-couponzoneform .table-form-thumb .no-coupon-img {width:120px;height:auto;min-height:80px;border:1px dashed #d5d5d5;padding:5px}
.admin-shop-couponzoneform .table-form-thumb-file {position:relative;float:left;width:300px}
</style>

<div class="admin-shop-couponzoneform">
    <form name="fcouponzoneform" method="post" action="<?php echo $action_url1; ?>" onsubmit="return form_check(this);" enctype="multipart/form-data" class="eyoom-form">
    <input type="hidden" name="w" value="<?php echo $w; ?>">
    <input type="hidden" name="cz_id" value="<?php echo $cz_id; ?>">
    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">

    <div class="adm-headline">
        <h3>쿠폰존 쿠폰관리 - <?php echo $html_title; ?></h3>
    </div>

    <div class="adm-table-form-wrap margin-bottom-30">
        <header><strong><i class="fas fa-caret-right"></i> 쿠폰 설정</strong></header>
        <div class="table-list-eb">
            <?php if (!G5_IS_MOBILE) { ?>
            <div class="table-responsive">
            <?php } ?>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">발행쿠폰타입</label>
                        </th>
                        <td>
                            <label for="cz_type" class="select form-width-250px">
                               <select name="cz_type" id="cz_type">
                                    <option value="0"<?php echo get_selected('0', $cp['cz_type']); ?>>다운로드쿠폰</option>
                                    <option value="1"<?php echo get_selected('1', $cp['cz_type']); ?>>포인트쿠폰</option>
                               </select>
                               <i></i>
                            </label>
                            <div class="note"><strong>Note:</strong> 발행 쿠폰의 타입을 설정합니다.<br>포인트쿠폰은 회원의 포인트를 쿠폰으로 교환하는 쿠폰이며 다운로드 쿠폰은 회원이 다운로드하여 사용할 수 있는 쿠폰입니다.</div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">쿠폰이름</label>
                        </th>
                        <td>
                            <label for="cz_subject" class="input form-width-250px">
                                <input type="text" name="cz_subject" value="<?php echo get_text($cp['cz_subject']); ?>" id="cz_subject" required>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cz_start" class="label">사용시작일</label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <i class="icon-append far fa-calendar-alt"></i>
                                <input type="text" name="cz_start" value="<?php echo stripslashes($cp['cz_start']); ?>" id="cz_start" required>
                            </label>
                            <div class="note"><strong>Note:</strong> 입력 예: <?php echo date('Y-m-d'); ?> </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cz_end" class="label">사용종료일</label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <i class="icon-append far fa-calendar-alt"></i>
                                <input type="text" name="cz_end" value="<?php echo stripslashes($cp['cz_end']); ?>" id="cz_end" required>
                            </label>
                            <div class="note"><strong>Note:</strong> 입력 예: <?php echo date('Y-m-d'); ?> </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cz_point" class="label">쿠폰교환 포인트</label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <input type="text" name="cz_point" value="<?php echo get_text($cp['cz_point']); ?>" id="cz_point">
                            </label>
                            <div class="note"><strong>Note:</strong> 쿠폰으로 교환할 회원의 포인트를 지정합니다. 쿠폰 다운로드 때 설정한 값만큼 회원의 포인트를 차감합니다.</div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cz_period" class="label">쿠폰사용기한</label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <i class="icon-append">일</i>
                                <input type="text" name="cz_period" value="<?php echo stripslashes($cp['cz_period']); ?>" id="cz_period" required>
                            </label>
                            <div class="note"><strong>Note:</strong> 쿠폰 다운로드 후 사용할 수 있는 기간을 설정합니다.</div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cp_img" class="label">쿠폰이미지</label>
                        </th>
                        <td>
                            <div class="table-form-thumb">
                                <div class="table-form-thumb-img">
                                    <?php if (is_file($cpimg) && $cp['cz_id']) { ?>
                                    <div class="coupon-img">
                                        <img class="img-responsive" src="<?php echo G5_DATA_URL; ?>/coupon/<?php echo $cp['cz_file']; ?>" width="<?php echo $width; ?>">
                                    </div>
                                    <?php } else { ?>
                                    <div class="no-coupon-img"></div>
                                    <?php } ?>
                                </div>
                                <div class="table-form-thumb-file">
                                    <label class="input input-file form-width-300px">
                                        <div class="button"><input type="file" name="cp_img" id="cp_img" onchange="this.parentNode.nextSibling.value = this.value">이미지 업로드</div><input type="text" readonly="">
                                    </label>
                                    <?php if (is_file($cpimg) && $cp['cz_id']) { ?>
                                    <label class="checkbox"><input type="checkbox" name="cp_img_del" id="cp_img_del" value="1"><i></i>삭제</label>
                                    <a class="couponzone-thumb-btn btn-e btn-e-xs btn-e-default" href="<?php echo G5_DATA_URL; ?>/coupon/<?php echo $cp['cz_file']; ?>">확대보기</a>
                                    <?php } ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">발급쿠폰종류</label>
                        </th>
                        <td>
                            <label for="cp_method" class="select form-width-250px">
                               <select name="cp_method" id="cp_method">
                                    <option value="0"<?php echo get_selected('0', $cp['cp_method']); ?>>개별상품할인</option>
                                    <option value="1"<?php echo get_selected('1', $cp['cp_method']); ?>>카테고리할인</option>
                                    <option value="2"<?php echo get_selected('2', $cp['cp_method']); ?>>주문금액할인</option>
                                    <option value="3"<?php echo get_selected('3', $cp['cp_method']); ?>>배송비할인</option>
                               </select><i></i>
                            </label>
                        </td>
                    </tr>
                    <tr id="tr_cp_target">
                        <th class="table-form-th">
                            <label for="cp_target" class="label"><?php echo $cp_target_label; ?></label>
                        </th>
                        <td>
                            <label class="input input-button form-width-250px">
                                <input type="text" name="cp_target" id="cp_target" value="<?php echo stripslashes($cp['cp_target']); ?>" required>
                                <div class="button"><input type="button" id="sch_target"><i class="fas fa-search"></i> <span id="sch_text"><?php echo $cp_target_btn; ?></span></div>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cp_type" class="label">할인금액타입</label>
                        </th>
                        <td>
                            <label class="select form-width-250px">
                               <select name="cp_type" id="cp_type">
                                    <option value="0"<?php echo get_selected('0', $cp['cp_type']); ?>>정액할인(원)</option>
                                    <option value="1"<?php echo get_selected('1', $cp['cp_type']); ?>>정률할인(%)</option>
                               </select><i></i>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cp_price" class="label"><?php echo $cp['cp_type'] ? '할인비율' : '할인금액'; ?></label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <i id="cp_price_unit" class="icon-append"><?php echo $cp['cp_type'] ? '%' : '원'; ?></i>
                                <input type="text" name="cp_price" value="<?php echo stripslashes($cp['cp_price']); ?>" id="cp_price" required>
                            </label>
                        </td>
                    </tr>
                    <tr id="tr_cp_trunc">
                        <th class="table-form-th">
                            <label for="cp_trunc" class="label">절사금액</label>
                        </th>
                        <td>
                            <label class="select form-width-250px">
                                <select name="cp_trunc" id="cp_trunc">
                                    <option value="1"<?php echo get_selected('1', $cp['cp_trunc']); ?>>1원단위</option>
                                    <option value="10"<?php echo get_selected('10', $cp['cp_trunc']); ?>>10원단위</option>
                                    <option value="100"<?php echo get_selected('100', $cp['cp_trunc']); ?>>100원단위</option>
                                    <option value="1000"<?php echo get_selected('1000', $cp['cp_trunc']); ?>>1,000원단위</option>
                               </select><i></i>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cp_minimum" class="label">최소주문금액</label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <i class="icon-append">원</i>
                                <input type="text" name="cp_minimum" value="<?php echo stripslashes($cp['cp_minimum']); ?>" id="cp_minimum">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-form-th">
                            <label for="cp_maximum" class="label">최대할인금액</label>
                        </th>
                        <td>
                            <label class="input form-width-250px">
                                <i class="icon-append">원</i>
                                <input type="text" name="cp_maximum" value="<?php echo stripslashes($cp['cp_maximum']); ?>" id="cp_maximum">
                            </label>
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

<div class="modal fade admin-iframe-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="modalLabel" class="modal-title"><strong><i class="fas fa-ellipsis-v color-grey"></i> <span id="modal-title"></span></strong></h4>
            </div>
            <div class="modal-body">
                <iframe id="modal-iframe" width="100%" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn-e btn-e-lg btn-e-dark" type="button"><i class="fas fa-times"></i> 닫기</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/magnific-popup/magnific-popup.min.js"></script>
<script>
function eb_modal(href) {
    <?php if (!(G5_IS_MOBILE || $wmode)) { ?>
    $('.admin-iframe-modal').modal('show').on('hidden.bs.modal', function () {
        $("#modal-iframe").attr("src", "");
        $('html').css({overflow: ''});
    });
    $('.admin-iframe-modal').modal('show').on('shown.bs.modal', function () {
        $("#modal-iframe").attr("src", href);
        $('#modal-iframe').height(parseInt($(window).height() * 0.85));
        $('html').css({overflow: 'hidden'});
    });
    <?php } ?>
    return false;
}

window.closeModal = function(url){
    $('.admin-iframe-modal').modal('hide');
};

$(document).ready(function() {
    $('.couponzone-thumb-btn').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });
});

$(function() {
    <?php if(!$cp['cz_type']) { ?>
    $("#tr_cz_point").hide();
    <?php } ?>
    <?php if($cp['cp_method'] == 2 || $cp['cp_method'] == 3) { ?>
    $("#tr_cp_target").hide();
    $("#tr_cp_target").find("input").attr("required", false);
    <?php } ?>
    <?php if($cp['cp_type'] != 1) { ?>
    $("#tr_cp_maximum").hide();
    $("#tr_cp_trunc").hide();
    <?php } ?>
    $("#cz_type").change(function() {
        if($(this).val() == "1") {
            $("#tr_cz_point").find("input").attr("required", true);
            $("#tr_cz_point").show();
        } else {
            $("#tr_cz_point").find("input").attr("required", false);
            $("#tr_cz_point").hide();
        }
    });
    $("#cp_method").change(function() {
        var cp_method = $(this).val();
        change_method(cp_method);
    });

    $("#cp_type").change(function() {
        var cp_type = $(this).val();
        change_type(cp_type);
    });

    $("#sch_target").click(function() {
        var cp_method = $("#cp_method").val();
        var url = "<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=coupontarget&wmode=1&sch_target=";

        if(cp_method == "0") {
            eb_modal(url+'0');
            $('#modal-title').text('쿠폰적용 상품검색');
        } else if(cp_method == "1") {
            eb_modal(url+'1');
            $('#modal-title').text('쿠폰적용 분류검색');
        } else {
            return false;
        }
    });
});

$(document).ready(function(){
    $('#cz_start').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        onSelect: function(selectedDate){
            $('#cz_end').datepicker('option', 'minDate', selectedDate);
        }
    });
    $('#cz_end').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
        showMonthAfterYear: true,
        monthNames: ['년 1월','년 2월','년 3월','년 4월','년 5월','년 6월','년 7월','년 8월','년 9월','년 10월','년 11월','년 12월'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        onSelect: function(selectedDate){
            $('#cz_start').datepicker('option', 'maxDate', selectedDate);
        }
    });
});

function change_method(cp_method)
{
    if(cp_method == "0") {
        $("#sch_text").text("상품검색");
        $("#tr_cp_target").find("label.label").text("적용상품");
        $("#tr_cp_target").find("input").attr("required", true);
        $("#tr_cp_target").show();
    } else if(cp_method == "1") {
        $("#sch_text").text("분류검색");
        $("#tr_cp_target").find("label.label").text("적용분류");
        $("#tr_cp_target").find("input").attr("required", true);
        $("#tr_cp_target").show();
    } else {
        $("#tr_cp_target").hide();
        $("#tr_cp_target").find("input").attr("required", false);
    }
}

function change_type(cp_type)
{
    if(cp_type == "0") {
        $("#cp_price_unit").text("원");
        $("#cp_price_title").text("할인금액");
        $("#tr_cp_maximum").hide();
        $("#tr_cp_trunc").hide();
    } else {
        $("#cp_price_unit").text("%");
        $("#cp_price_title").text("할인비율");
        $("#tr_cp_maximum").show();
        $("#tr_cp_trunc").show();
    }
}

function form_check(f)
{
    var sel_type = f.cp_type;
    var cp_type = sel_type.options[sel_type.selectedIndex].value;
    var cp_price = f.cp_price.value;

    <?php if(!$cpimg_str) { ?>
    if(f.cp_img.value == "") {
        alert("쿠폰이미지를 업로드해 주십시오.");
        return false;
    }
    <?php } ?>

    if(isNaN(cp_price)) {
        if(cp_type == "1")
            alert("할인비율을 숫자로 입력해 주십시오.");
        else
            alert("할인금액을 숫자로 입력해 주십시오.");

        return false;
    }

    cp_price = parseInt(cp_price);

    if(cp_type == "1" && (cp_price < 1 || cp_price > 99)) {
        alert("할인비율을 1과 99 사이의 숫자로 입력해 주십시오.");
        return false;
    }

    return true;
}
</script>