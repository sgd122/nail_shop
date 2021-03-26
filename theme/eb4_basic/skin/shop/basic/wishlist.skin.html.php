<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/wishlist.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
.shop-wishlist .wishlist-container {margin-left:-10px;margin-right:-10px}
.shop-wishlist .wishlist-box {position:relative;width:25%}
.shop-wishlist .wishlist-box-pd {padding:10px}
.shop-wishlist .wishlist-box-in {position:relative;border:1px solid #dadada;padding:10px;background:#fff}
.shop-wishlist .wishlist-box .wishlist-img {margin-bottom:15px}
.shop-wishlist .wishlist-box .wishlist-img img {display:block;width:100% \9;max-width:100%;height:auto}
.shop-wishlist .wishlist-info {position:relative}
.shop-wishlist .wishlist-desc h5 {position:relative;overflow:hidden;height:42px;margin:0 0 5px;font-size:15px;line-height:1.5}
.shop-wishlist .wishlist-desc .wishlist-desc-date {font-size:12px;color:#757575}
.shop-wishlist .wishlist-desc .wishlist-desc-date i {color:#b5b5b5}
.shop-wishlist .wishlist-bottom {position:relative;height:30px;background:#f2f2f2;padding:0 5px;margin-top:10px}
.shop-wishlist .wishlist-bottom .wishlist-check {line-height:30px}
.shop-wishlist .wishlist-bottom .wishlist-check .checkbox i {top:7px}
.shop-wishlist .wishlist-bottom .wishlist-del-btn {position:absolute;top:0;right:0;width:30px;height:30px;line-height:30px;text-align:center;color:#fff;background:#4B4B4D}
.shop-wishlist .wishlist-bottom .wishlist-del-btn:hover {background:#2B2B2E}
.shop-wishlist .wishlist-act-btn {margin-top:30px;text-align:center}
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
@media (max-width:991px) {
    .shop-wishlist .wishlist-box {width:33.33333%}
}
@media (max-width:767px) {
    .shop-wishlist .wishlist-container {margin-left:-5px;margin-right:-5px}
    .shop-wishlist .wishlist-box {width:50%}
    .shop-wishlist .wishlist-box-pd {padding:5px}
    .shop-wishlist .wishlist-desc h5 {font-size:13px;height:38px}
}
<?php } ?>
</style>

<?php /* ---------- 위시리스트 시작 ---------- */ ?>
<div id="fakeloader"></div>

<div class="shop-wishlist">
    <form name="fwishlist" method="post" action="<?php echo G5_SHOP_URL; ?>/cartupdate.php">
    <input type="hidden" name="act" value="multi">
    <input type="hidden" name="sw_direct" value="">
    <input type="hidden" name="prog" value="wish">

    <div class="wishlist-container">
        <?php for ($i=0; $i<count((array)$list); $i++) { ?>
        <div class="wishlist-box">
            <div class="wishlist-box-pd">
                <div class="wishlist-box-in">
                    <div class="wishlist-img"><a href="<?php echo shop_item_url($list[$i]['it_id']); ?>"><?php echo $list[$i]['image']; ?></a></div>
                    <div class="wishlist-info">
                        <div class="wishlist-desc">
                            <a href="<?php echo shop_item_url($list[$i]['it_id']); ?>" class="info_link">
                                <h5><strong><?php echo stripslashes($list[$i]['it_name']); ?></strong></h5>
                            </a>
                            <div class="wishlist-desc-date">
                                <i class="far fa-clock"></i> <?php echo $list[$i]['wi_time']; ?>
                            </div>
                        </div>
                        <div class="wishlist-bottom">
                            <div class="wishlist-check eyoom-form">
                                <?php if(is_soldout($list[$i]['it_id'])) { // 품절검사 ?>
                                <span class="font-size-12 color-red">품절</span>
                                <?php } else { //품절이 아니면 체크할수 있도록한다 ?>
                                <label for="chk_it_id_<?php echo $i; ?>" class="sound_only"><?php echo $list[$i]['it_name']; ?></label>
                                <label class="checkbox">
                                    <input type="checkbox" name="chk_it_id[<?php echo $i; ?>]" value="1" id="chk_it_id_<?php echo $i; ?>" onclick="out_cd_check(this, '<?php echo $out_cd; ?>');"><i></i>
                                </label>
                                <?php } ?>
                                <input type="hidden" name="it_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['it_id']; ?>">
                                <input type="hidden" name="io_type[<?php echo $list[$i]['it_id']; ?>][0]" value="0">
                                <input type="hidden" name="io_id[<?php echo $list[$i]['it_id']; ?>][0]" value="">
                                <input type="hidden" name="io_value[<?php echo $list[$i]['it_id']; ?>][0]" value="<?php echo $list[$i]['it_name']; ?>">
                                <input type="hidden" name="ct_qty[<?php echo $list[$i]['it_id']; ?>][0]" value="1">
                            </div>
                            <a href="<?php echo G5_SHOP_URL; ?>/wishupdate.php?w=d&amp;wi_id=<?php echo $list[$i]['wi_id']; ?>" class="wishlist-del-btn"><i class="fas fa-trash" aria-hidden="true"></i><span class="sound_only">삭제</span></a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if (count((array)$list)==0) {?>
        <p class="text-center font-size-14 color-grey margin-top-20"><i class="fa fa-exclamation-circle"></i> 보관함이 비었습니다.</p>
        <?php } ?>
    </div>

    <div class="wishlist-act-btn">
        <button type="submit" class="btn-e btn-e-brd btn-e-xxlg btn-e-default" onclick="return fwishlist_check(document.fwishlist,'');"><i class="fas fa-shopping-cart" aria-hidden="true"></i> 장바구니 담기</button>
        <button type="submit" class="btn-e btn-e-xxlg btn-e-red" onclick="return fwishlist_check(document.fwishlist,'direct_buy');"><i class="fas fa-credit-card" aria-hidden="true"></i> 주문하기</button>
    </div>
    </form>
</div>
<?php /* ---------- 위시리스트 끝 ---------- */ ?>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/fakeLoader/fakeLoader.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/masonry/masonry.pkgd.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script>
$('#fakeloader').fakeLoader({
    timeToHide:3000,
    zIndex:"11",
    spinner:"spinner6",
    bgColor:"#fff",
});

$(window).load(function(){
    $('#fakeloader').fadeOut(300);
});

$(document).ready(function(){
    var $container = $('.wishlist-container');
    $container.imagesLoaded(function() {
        $container.masonry({
            columnWidth: '.wishlist-box',
            itemSelector: '.wishlist-box'
        });
    });
});

function out_cd_check(fld, out_cd) {
    if (out_cd == 'no'){
        alert("옵션이 있는 상품입니다.\n\n상품을 클릭하여 상품페이지에서 옵션을 선택한 후 주문하십시오.");
        fld.checked = false;
        return;
    }

    if (out_cd == 'tel_inq'){
        alert("이 상품은 전화로 문의해 주십시오.\n\n장바구니에 담아 구입하실 수 없습니다.");
        fld.checked = false;
        return;
    }
}

function fwishlist_check(f, act) {
    var k = 0;
    var length = f.elements.length;

    for(i=0; i<length; i++) {
        if (f.elements[i].checked) {
            k++;
        }
    }

    if(k == 0) {
        alert("상품을 하나 이상 체크 하십시오");
        return false;
    }

    if (act == "direct_buy") {
        f.sw_direct.value = 1;
    } else {
        f.sw_direct.value = 0;
    }

    return true;
}
</script>