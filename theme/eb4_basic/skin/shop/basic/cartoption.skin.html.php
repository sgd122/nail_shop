<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/cartoption.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/sweetalert/sweetalert.min.css" type="text/css" media="screen">',0);
?>

<style>
.shop-option {position:relative;padding:5px}
.shop-option .option-box {border:1px solid #d5d5d5;background:#f2f2f2;padding:10px;margin-bottom:20px}
.shop-option .option-act-btn {text-align:center}
.shop-option .option-act-btn .btn-e {width:250px;padding:12px 10px}
#sit_opt_added {margin:0;padding:0;border-bottom:0;border-top:1px solid #e9e9e9;background:#fff;list-style:none}
#sit_opt_added li {padding:15px 0;padding-right:220px;border:0 none;border-bottom:1px solid #e9e9e9;position:relative;background:none;margin:0}
#sit_opt_added li .opt_name {line-height:20px;font-weight:bold}
#sit_opt_added li .opt_count {position:absolute;top:50%;right:0;margin-top:-15px}
#sit_opt_added button {float:left;width:30px;height:30px;border:1px solid #cdcdcd;background:#fff;color:#666;font-size:12px}
#sit_opt_added button:hover {color:#000}
#sit_opt_added .num_input {float:left;border:0;height:30px;border-top:1px solid #e4e4e4;border-bottom:1px solid #e4e4e4;text-align:center}
#sit_opt_added .sit_opt_del {position:relative;border:0;font-size:15px}
#sit_opt_added .sit_opt_del:hover {color:#be334a}
#sit_opt_added .sit_opt_prc {display:inline-block;float:left;width:100px;padding:0 3px;text-align:right;line-height:30px;font-size:1.183em;font-weight:bold}
#mod_option_frm #sit_sel_option {margin:0 0 20px}
#mod_option_frm #sit_tot_price {display:block;float:none;margin:0 0 20px;text-align:right;font-size:15px;color:#757575}
#mod_option_frm #sit_tot_price strong {color:#FF4848;font-size:19px;margin-left:10px}
<?php if (G5_IS_MOBILE) { ?>
.shop-option {padding:15px}
#sit_opt_added li .opt_name {min-width:250px;font-size:14px;font-weight:bold}
#sit_opt_added li .opt_count {position:relative;top:inherit;right:inherit;margin-top:5px;min-width:250px}
#sit_opt_added li .opt_count .sit_opt_del {position:absolute;top:0;right:-20px}
#mod_option_frm #sit_sel_option ul {background:#fff;border-top:1px solid #e9e9e9}
<?php } ?>
</style>

<?php /* ---------- 장바구니 옵션 시작 ---------- */ ?>
<div class="shop-option">
    <form name="foption" method="post" action="<?php echo G5_SHOP_URL; ?>/cartupdate.php" onsubmit="return formcheck(this);" class="eyoom-form">
    <input type="hidden" name="act" value="optionmod">
    <input type="hidden" name="it_id[]" value="<?php echo $it['it_id']; ?>">
    <input type="hidden" id="it_price" value="<?php echo $row2['ct_price']; ?>">
    <input type="hidden" name="ct_send_cost" value="<?php echo $row2['ct_send_cost']; ?>">
    <input type="hidden" name="sw_direct">
    <?php
    if(defined('G5_THEME_USE_OPTIONS_TRTD') && G5_THEME_USE_OPTIONS_TRTD){
        $option_1 = get_item_options($it['it_id'], $it['it_option_subject'], '');
    } else {
        // 선택 옵션 ( 기존의 tr td 태그로 가져오려면 'div' 를 '' 로 바꾸거나 또는 지워주세요 )
        $option_1 = get_item_options($it['it_id'], $it['it_option_subject'], 'div');
    }
    if($option_1) {
    ?>
    <h5><strong>선택옵션</strong></h5>
    <div class="option-box">
        <?php echo $option_1; // 선택옵션 ?>
    </div>
    <?php } ?>

    <?php
    if(defined('G5_THEME_USE_OPTIONS_TRTD') && G5_THEME_USE_OPTIONS_TRTD){
        $option_2 = get_item_supply($it['it_id'], $it['it_supply_subject'], '');
    } else {
        // 추가 옵션 ( 기존의 tr td 태그로 가져오려면 'div' 를 '' 로 바꾸거나 또는 지워주세요 )
        $option_2 = get_item_supply($it['it_id'], $it['it_supply_subject'], 'div');
    }
    if($option_2) {
    ?>
    <h5><strong>추가옵션</strong></h5>
    <div class="option-box">
        <?php echo $option_2; // 추가옵션 ?>
    </div>
    <?php } ?>

    <div id="sit_sel_option">
        <ul id="sit_opt_added">
            <?php
            for($i=0; $row=sql_fetch_array($result); $i++) {
                if(!$row['io_id'])
                    $it_stock_qty = get_it_stock_qty($row['it_id']);
                else
                    $it_stock_qty = get_option_stock_qty($row['it_id'], $row['io_id'], $row['io_type']);

                if($row['io_price'] < 0)
                    $io_price = '('.number_format($row['io_price']).'원)';
                else
                    $io_price = '(+'.number_format($row['io_price']).'원)';

                $cls = 'opt';
                if($row['io_type'])
                    $cls = 'spl';
            ?>
            <li class="sit_<?php echo $cls; ?>_list">
                <input type="hidden" name="io_type[<?php echo $it['it_id']; ?>][]" value="<?php echo $row['io_type']; ?>">
                <input type="hidden" name="io_id[<?php echo $it['it_id']; ?>][]" value="<?php echo $row['io_id']; ?>">
                <input type="hidden" name="io_value[<?php echo $it['it_id']; ?>][]" value="<?php echo $row['ct_option']; ?>">
                <input type="hidden" class="io_price" value="<?php echo $row['io_price']; ?>">
                <input type="hidden" class="io_stock" value="<?php echo $it_stock_qty; ?>">
                <div class="opt_name">
                    <span class="sit_opt_subj"><?php echo $row['ct_option']; ?></span>
                </div>
                <div class="opt_count">
                    <button type="button" class="sit_qty_minus btn_frmline"><i class="fas fa-minus" aria-hidden="true"></i><span class="sound_only">감소</span></button>
                    <label for="ct_qty_<?php echo $i; ?>" class="sound_only">수량</label>
                    <input type="text" name="ct_qty[<?php echo $it['it_id']; ?>][]" value="<?php echo $row['ct_qty']; ?>" id="ct_qty_<?php echo $i; ?>" class="num_input" size="5">
                    <button type="button" class="sit_qty_plus btn_frmline"><i class="fas fa-plus" aria-hidden="true"></i><span class="sound_only">증가</span></button>
                    <span class="sit_opt_prc"><?php echo $io_price; ?></span>
                    <button type="button" class="sit_opt_del"><i class="fas fa-times" aria-hidden="true"></i><span class="sound_only">삭제</span></button>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>

    <div id="sit_tot_price"></div>

    <div class="option-act-btn">
        <input type="submit" value="확인" class="btn-e btn-e-xxlg btn-e-red">
    </div>
    </form>
</div>
<?php /* ---------- 장바구니 옵션 끝 ---------- */ ?>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/sweetalert/sweetalert.min.js"></script>
<script>
$(document).ready(function(){
	$(".shop-option .it_option, .shop-option .it_supply").wrap('<label class="select" />');
	$(".shop-option .it_option, .shop-option .it_supply").after('<i></i>');
});

function formcheck(f) {
    var val, io_type, result = true;
    var sum_qty = 0;
    var min_qty = parseInt(<?php echo $it['it_buy_min_qty']; ?>);
    var max_qty = parseInt(<?php echo $it['it_buy_max_qty']; ?>);
    var $el_type = $("input[name^=io_type]");

    $("input[name^=ct_qty]").each(function(index) {
        val = $(this).val();

        if(val.length < 1) {
	        swal({
	            title: "중요!",
	            text: "수량을 입력해 주십시오.",
	            confirmButtonColor: "#FF4848",
	            type: "error",
	            confirmButtonText: "확인"
	        });
            result = false;
            return false;
        }

        if(val.replace(/[0-9]/g, "").length > 0) {
	        swal({
	            title: "중요!",
	            text: "수량은 숫자로 입력해 주십시오.",
	            confirmButtonColor: "#FF4848",
	            type: "error",
	            confirmButtonText: "확인"
	        });
            result = false;
            return false;
        }

        if(parseInt(val.replace(/[^0-9]/g, "")) < 1) {
	        swal({
	            title: "중요!",
	            text: "수량은 1이상 입력해 주십시오.",
	            confirmButtonColor: "#FF4848",
	            type: "error",
	            confirmButtonText: "확인"
	        });
            result = false;
            return false;
        }

        io_type = $el_type.eq(index).val();
        if(io_type == "0")
            sum_qty += parseInt(val);
    });

    if(!result) {
        return false;
    }

    if(min_qty > 0 && sum_qty < min_qty) {
        swal({
            title: "알림!",
            text: "선택옵션 개수 총합 " + number_format(String(min_qty)) + "개 이상 주문해 주십시오.",
            confirmButtonColor: "#FDAB29",
            type: "warning",
            confirmButtonText: "확인"
        });
        return false;
    }

    if(max_qty > 0 && sum_qty > max_qty) {
        swal({
            title: "알림!",
            text: "선택옵션 개수 총합 " + number_format(String(max_qty)) + "개 이하로 주문해 주십시오.",
            confirmButtonColor: "#FDAB29",
            type: "warning",
            confirmButtonText: "확인"
        });
        return false;
    }

    return true;
}

$("input, textarea, select").on({ 'touchstart' : function() {
	zoomDisable();
}});
$("input, textarea, select").on({ 'touchend' : function() {
	setTimeout(zoomEnable, 500);
}});
function zoomDisable(){
	$('head meta[name=viewport]').remove();
	$('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">');
}
function zoomEnable(){
	$('head meta[name=viewport]').remove();
	$('head').prepend('<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=1">');
}
</script>