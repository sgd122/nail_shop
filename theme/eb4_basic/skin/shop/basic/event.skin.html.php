<?php
/**
 * skin file : /theme/THEME_NAME/skin/shop/basic/event.skin.html.php
 */
if (!defined('_EYOOM_')) exit;
?>

<style>
.shop-list-sort-wrap {position:relative}
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
@media (max-width:991px) {
    .shop-list-sort-wrap .tab-scroll-category {margin-bottom:20px}
}
<?php } ?>
</style>

<div id="fakeloader"></div>

<div class="shop-event">
    <?php /* 이벤트 헤더 이미지 */ ?>
    <?php if (file_exists($himg)) { ?>
    <div id="sev_himg" class="sev_img"><img src="<?php echo G5_DATA_URL.'/event/'.$ev_id.'_h'; ?>" alt=""></div>
    <?php } ?>

    <?php /* 상단 HTML */ ?>
    <div id="sev_hhtml" class="margin-bottom-20"><?php echo conv_content($ev['ev_head_html'], 1); ?></div>

    <div class="shop-list-sort-wrap">
        <?php include $sort_skin; ?>
        <?php include $sub_skin; ?>
    </div>

    <?php echo $ev_list; ?>

    <?php /* 페이지 */ ?>
    <?php echo eb_paging($eyoom['paging_skin']);?>

    <?php /* 하단 HTML */ ?>
    <div id="sev_thtml"><?php echo conv_content($ev['ev_tail_html'], 1); ?></div>

    <?php /* 이벤트 테일 이미지 */ ?>
    <?php if (file_exists($timg)) { ?>
    <div id="sev_timg" class="sev_img"><img src="<?php echo G5_DATA_URL.'/event/'.$ev_id.'_t'; ?>" alt=""></div>
    <?php } ?>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/fakeLoader/fakeLoader.min.js"></script>
<script>
$('#fakeloader').fakeLoader({
    timeToHide:3000,
    zIndex:"11",
    spinner:"spinner6",
    bgColor:"#f4f4f4",
});

$(window).load(function(){
    $('#fakeloader').fadeOut(300);
});

var itemlist_ca_id = "<?php echo $ca_id; ?>";

$.fn.listType = function(type) {
    var $el = this.find(".item-list");
    var count = $el.size();
    if(count < 1)
        return;

    var cl = this.attr("class");
    if(cl && !this.data("class")) {
        this.data("class", cl);
    }

    $("button.product-type-btn span").removeClass("product-type-on").html("");

    if(type == "gallery") {
        this.removeClass("product-type-gallery");
        if(this.data("class")) {
            this.attr("class", this.data("class"));
        }

        $("button.product-type-gallery-btn span").addClass("product-type-on").html("<b class=\"sound_only\"> 선택됨</b>");
    } else {
        if(this.data("class")) {
            this.removeAttr("class");
        }
        this.addClass("product-type-list");

        $("button.product-type-list-btn span").addClass("product-type-on").html("<b class=\"sound_only\"> 선택됨</b>");
    }

    set_cookie("ck_itemlist"+itemlist_ca_id+"_type", type, 1, g5_cookie_domain);
}

$(function() {
    if(itemlist_type = get_cookie("ck_itemlist"+itemlist_ca_id+"_type")) {
        $("#product_list").listType(itemlist_type);
    }

    $("button.product-type-btn").on("click", function() {
        if($(this).hasClass("product-type-gallery-btn")) {
            $("#product_list").listType("gallery");
        } else {
            $("#product_list").listType("list");
        }
    });
});
</script>