<?php
/**
 * skin file : /theme/THEME_NAME/skin/mypage/basic/respond.skin.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/sweetalert/sweetalert.min.css" type="text/css" media="screen">',0);
?>

<style>
.respond-list .respond-search-box {position:relative;margin-bottom:20px}
.respond-search-box .respond-search-input input {height:42px;background:#f8f8f8;font-size:13px;font-weight:bold;border-radius:3px !important}
.respond-search-box .respond-search-input .icon-prepend {background-color:transparent;width:42px;height:40px;line-height:40px;border:0;color:#959595;font-size:14px}
.respond-search-box .input-button .button {height:40px;line-height:40px;background:#fff;padding:0 30px;font-size:13px;border-radius:0 3px 3px 0 !important}
.respond-list .eyoom-form .checkbox {margin-bottom:0}
.respond-list .eyoom-form .checkbox i {top:2px}
.respond-list .table-list-eb .table thead > tr > th {border-bottom:1px solid #959595;text-align:center;padding:10px 5px}
.respond-list .table-list-eb .table tbody > tr > td {border-top:1px solid #ededed;padding:8px 5px}
.respond-list .table-list-eb thead {border-top:2px solid #757575;border-bottom:1px solid #959595}
.respond-list .table-list-eb th {color:#000;font-weight:bold;white-space:nowrap;font-size:13px}
.respond-list .table-list-eb .table tbody > tr {background:#fffbf3}
.respond-list .table-list-eb .table tbody > tr.resopnd-chked {opacity:0.5;background:#f2f2f2}
.respond-list .table-list-eb .td-photo {display:inline-block;width:26px;height:26px;margin-right:2px;border:1px solid #e5e5e5;padding:1px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.respond-list .table-list-eb .td-photo img {width:100%;height:auto;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.respond-list .table-list-eb .td-photo .respond-user-icon {width:22px;height:22px;font-size:14px;line-height:22px;text-align:center;background:#959595;color:#fff;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:inline-block;white-space:nowrap;vertical-align:baseline;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.respond-list .table-list-eb .td-mention {width:300px;margin-bottom:5px}
.respond-list .table-list-eb .td-subject {width:300px;color:#959595;padding-left:31px}
.respond-list .table-list-eb .td-chked .read {color:#000}
.respond-list .table-list-eb .td-chked .noread {color:#FF2900}
.respond-list .table-list-eb .respond-del-btn {color:#fff;text-decoration:none}
.respond-list .table-list-eb .td-mobile td {border-top:1px solid #e5e5e5;padding:5px 5px !important;font-size:11px;color:#959595;background:#fbfbfb}
.respond-list .table-list-eb .td-mobile td span {margin-right:5px}
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // ????????? ?????? ??????????????? ?>
@media (max-width: 1199px) {
    .respond-list .table-list-eb .td-mention {width:240px}
    .respond-list .table-list-eb .td-subject {width:240px}
}
@media (max-width: 767px) {
    .respond-list .table-list-eb .td-width {width:inherit}
}
<?php } ?>
</style>

<?php
/**
 * ????????? ??????
 */
include_once($eyoom_skin_path['mypage'] . '/tabmenu.skin.html.php');
?>

<div class="respond-list">
    <div class="headline-short">
        <h4><strong>????????????</strong></h4>
    </div>
    <form name="frespond" method="get" class="eyoom-form">
    <div class="respond-search-box">
        <div class="row">
            <section class="col col-3">
                <label for="read" class="sound_only">????????????</label>
                <label class="select">
                    <select name="read" id="read" class="form-control" onchange="this.form.submit();">
                        <option value="">????????????|??????</option>
                        <option value="y" <?php if ($read == 'y') { ?>selected<?php } ?>>??????</option>
                        <option value="n" <?php if ($read == 'n') { ?>selected<?php } ?>>????????????</option>
                    </select>
                    <i></i>
                </label>
            </section>
            <section class="col col-3">
                <label class="select">
                    <select name="type" id="type" class="form-control" onchange="this.form.submit();">
                        <option value="">?????????|??????</option>
                        <option value="reply" <?php if ($type == 'reply') { ?>selected<?php } ?>>??????</option>
                        <option value="cmt" <?php if ($type == 'cmt') { ?>selected<?php } ?>>??????</option>
                        <option value="cmt_re" <?php if ($type == 'cmt_re') { ?>selected<?php } ?>>?????????</option>
                    </select>
                    <i></i>
                </label>
            </section>
            <section class="col col-3">
                <label class="select">
                    <select name="sfl" id="sfl" class="form-control" onchange="this.form.submit();">
                        <option value="">????????????</option>
                        <option value="id" <?php if ($sfl == 'id') { ?>selected<?php } ?>>?????????</option>
                        <option value="nick" <?php if ($sfl == 'nick') { ?>selected<?php } ?>>?????????</option>
                    </select>
                    <i></i>
                </label>
            </section>
            <div class="clearfix"></div>
            <section class="col col-12 margin-bottom-0">
                <label for="stx" class="sound_only">?????????<strong class="sound_only"> ??????</strong></label>
                <div class="input input-button respond-search-input">
                    <i class="icon-prepend fa fa-search"></i>
                    <input type="text" name="stx" value="<?php echo $stx; ?>" id="stx" required>
                    <div class="button"><input type="submit" value="??????">??????</div>
                </div>
            </section>
        </div>
    </div>
    </form>
    <div class="margin-bottom-10"></div>

    <form name="frespondlist" method="post" action="#" onsubmit="return frespond_submit(this);" class="eyoom-form">
    <input type="hidden" name="act"      value="">
    <input type="hidden" name="chk"      value="<?php echo $chk; ?>">
    <input type="hidden" name="type"     value="<?php echo $type; ?>">
    <input type="hidden" name="mb_id"    value="<?php echo $mb_id; ?>">
    <input type="hidden" name="page"     value="<?php echo $page; ?>">
    <input type="hidden" name="pressed"  value="">

    <div class="table-list-eb margin-bottom-20">
        <div class="board-list-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <?php if ($is_member) { ?>
                        <th>
                            <label for="all_chk" class="sound_only">?????? ??????</label>
                            <label class="checkbox">
                                <input type="checkbox" id="all_chk"><i></i>
                            </label>
                        </th>
                        <?php } ?>
                        <th>??? <span class="color-red"><?php echo $total_count; ?></span>?????? ????????????</th>
                        <th class="hidden-xs">??????</th>
                        <th class="hidden-xs">??????</th>
                        <th class="hidden-xs">??????</th>
                        <th class="hidden-xs">??????</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i<count((array)$respond); $i++) { ?>
                    <tr <?php if ( $respond[$i]['chk'] == 1) { ?>class="resopnd-chked"<?php } ?>>
                        <?php if ($is_member) { ?>
                        <td class="td-chk">
                            <label for="chk_bn_id_<?php echo $i; ?>" class="sound_only"><?php echo $respond[$i]['num']; ?>???</label>
                            <label class="checkbox">
                                <input type="checkbox" name="rid[]" value="<?php echo $respond[$i]['rid']; ?>" id="chk_bn_id_<?php echo $i; ?>"><i></i>
                            </label>
                        </td>
                        <?php } ?>
                        <td class="td-width">
                            <a href="<?php echo $respond[$i]['href']; ?>">
                                <div class="td-mention ellipsis">
                                    <span class="td-photo"><?php if ($respond[$i]['mb_photo']) { echo $respond[$i]['mb_photo']; }  else { ?><span class="respond-user-icon"><i class="fa fa-user"></i></span><?php } ?></span> <?php echo $respond[$i]['mention']; ?>
                                </div>
                                <div class="td-subject ellipsis">
                                    <?php echo stripslashes($respond[$i]['wr_subject']); ?>
                                </div>
                            </a>
                        </td>
                        <td class="text-center hidden-xs"><?php echo $respond[$i]['datetime']; ?></td>
                        <td class="td-chked text-center hidden-xs">
                            <?php if ($respond[$i]['chk'] == 1) { ?>
                            <span class="read">??????</span>
                            <?php }  else { ?>
                            <strong class="noread">?????????</strong>
                            <?php } ?>
                        </td>
                        <td class="text-center hidden-xs"><?php echo $respond[$i]['type']; ?></td>
                        <td class="text-center hidden-xs"><a href="<?php echo $respond[$i]['delete']; ?>" class="alone-del-btn btn-e btn-e-xs btn-e-dark respond-del-btn">??????</a></td>
                    </tr>
                    <tr class="td-mobile visible-xs"><?php /* 767px ??????????????? ?????? */ ?>
                        <td colspan="4">
                            <span><i class="fa fa-clock-o"></i> <?php echo $respond[$i]['datetime']; ?></span>
                            <span class="td-chked">
                                <?php if ($respond[$i]['chk'] == 1) { ?>
                                <strong class="read">??????</strong>
                                <?php }  else { ?>
                                <strong class="noread">?????????</strong>
                                <?php } ?>
                            </span>
                            <span>[<?php echo $respond[$i]['type']; ?>]</span>
                            <span class="pull-right"><a href="<?php echo $respond[$i]['delete']; ?>" class="alone-del-btn">??????</a></span>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if (count((array)$respond) == 0) { ?>
                    <tr><td colspan="6" class="text-center font-size-13 color-grey"><i class="fa fa-exclamation-circle"></i> ?????? ????????? ????????????.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if ($is_member) { ?>
    <button class="btn-e btn-e-dark" type="submit" onclick="document.pressed=this.value" value="????????????">????????????</button>
    <button class="btn-e btn-e-dark" type="button" onclick="delete_all();">????????????</button>
    <button class="btn-e btn-e-dark" type="button" onclick="check_read();">????????????</button>
    <?php } ?>
    </form>
</div>

<?php /* ????????? */ ?>
<?php echo eb_paging($eyoom['paging_skin']);?>

<?php if ($is_member) { ?>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/sweetalert/sweetalert.min.js"></script>
<script>
$(function(){
    $('#all_chk').click(function(){
        $('[name="rid[]"]').attr('checked', this.checked);
    });
});

function frespond_submit(f) {
    f.pressed.value = document.pressed;
    f.act.value = 'chkdel';
    var cnt = 0;
    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "rid[]" && f.elements[i].checked)
            cnt++;
    }
    if (!cnt) {
        swal({
            html: true,
            title: "??????!",
            text: "<strong class='color-red'>" + document.pressed + "</strong> ??? ???????????? ?????? ?????? ???????????????.",
            confirmButtonColor: "#FF4848",
            type: "error",
            confirmButtonText: "??????"
        });
        return false;
    }
    swal({
        html: true,
        title: "????????????",
        text: "????????? ???????????? ????????? ?????? <strong class='color-red'>" + document.pressed + "</strong> ???????????????????<br>?????? ????????? ????????? ????????? ??? ????????????.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FDAB29",
        confirmButtonText: "??????",
        cancelButtonText: "??????",
        closeOnConfirm: true,
        closeOnCancel: true
    },
    function(){
        f.action = "./respond_chk.php";
        f.submit();
        return true;
    });
    return false;
}

function delete_all() {
    var f = document.frespondlist;
    f.act.value = 'alldel';
    swal({
        title: "?????? ??????",
        text: "???????????? ????????? ?????? ?????????????????????????",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FDAB29",
        confirmButtonText: "?????? ??????",
        cancelButtonText: "??????",
        closeOnConfirm: true,
        closeOnCancel: true
    },
    function(isConfirm){
        if (isConfirm) {
            f.action = "./respond_chk.php";
            f.submit();
            return true;
        } else {
            return false;
        }
    });
}

function check_read() {
    var f = document.frespondlist;
    f.act.value = 'chkread';
    var cnt = 0;
    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "rid[]" && f.elements[i].checked)
            cnt++;
    }
    if (!cnt) {
        swal({
            title: "??????!",
            text: "???????????? ?????? ?????? ???????????????.",
            confirmButtonColor: "#FF4848",
            type: "error",
            confirmButtonText: "??????"
        });
        return false;
    }
    swal({
        title: "?????? ??????",
        text: "????????? ??????????????? ??????????????? ?????????????????????????",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FDAB29",
        confirmButtonText: "??????",
        cancelButtonText: "??????",
        closeOnConfirm: true,
        closeOnCancel: true
    },
    function(isConfirm){
        if (isConfirm) {
            f.action = "./respond_chk.php";
            f.submit();
            return true;
        } else {
            return false;
        }
    });
}

$(function() {
    $('.alone-del-btn').click(function(e){
        e.preventDefault();
        var linkURL = $(this).attr("href");
        respond_delete_link(linkURL);
    });
    function respond_delete_link(linkURL) {
        swal({
            title: "???????????? ??????",
            text: "????????? ??? ??????????????? ?????????????????????????",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FDAB29",
            confirmButtonText: "??????",
            cancelButtonText: "??????",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(){
            window.location.href = linkURL;
        });
    }
});
</script>
<?php } ?>

<?php echo $write_pages; ?>