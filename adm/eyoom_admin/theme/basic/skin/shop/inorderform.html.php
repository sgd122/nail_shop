<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/config/inorderform.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid-theme.min.css" type="text/css" media="screen">',0);
?>

<style>
.admin-shop-inorderform .table-list-eb {background:#fff}
.admin-shop-inorderform .table-list-eb img {display:block;width:100% \9;max-width:100%;height:auto}
.admin-shop-inorderform .checkbox-lineheight .checkbox {line-height:16px}
.admin-shop-inorderform .checkbox-lineheight .checkbox i {top:0;line-height:26px}
.admin-shop-inorderform .inorderform-btns .btn-e {margin-bottom:3px}
.admin-shop-inorderform .alert-padding-trans {padding:3px 10px 4px}
.admin-shop-inorderform .inorderform-box {position:relative;border:1px solid #d5d5d5;padding:10px;background:#fff}
@media screen and (max-width: 600px){
    .admin-shop-inorderform .inorderform-box .col {margin-bottom:5px}
}
.admin-shop-inorderform .inorderform-box .row {padding:5px}
.admin-shop-inorderform .inorderform-box .row .col-3 {font-weight:bold}
.admin-shop-inorderform .inorderform-box .row .col-4 {font-weight:bold}
.admin-shop-inorderform .od_test_caution {color:#E52700}
@media (min-width: 1100px) {
    .pg-anchor-in.tab-e2 .nav-tabs li a {font-size:14px;font-weight:bold;padding:8px 17px}
    .pg-anchor-in.tab-e2 .nav-tabs li.active a {z-index:1;border:1px solid #000;border-top:1px solid #DE2600;color:#DE2600}
    .pg-anchor-in.tab-e2 .tab-bottom-line {position:relative;display:block;height:1px;background:#000;margin-bottom:20px}
}
@media (max-width: 1099px) {
    .pg-anchor-in {position:relative;overflow:hidden;margin-bottom:20px;border:1px solid #757575}
    .pg-anchor-in.tab-e2 .nav-tabs li {width:33.33333%;margin:0}
    .pg-anchor-in.tab-e2 .nav-tabs li a {font-size:11px;padding:6px 0;text-align:center;border-bottom:1px solid #d5d5d5;margin-right:0;font-weight:bold;background:#fff}
    .pg-anchor-in.tab-e2 .nav-tabs li.active a {border:0;border-bottom:1px solid #d5d5d5 !important;color:#DE2600;background:#fff1f0}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(1) a {border-right:1px solid #d5d5d5;border-bottom:0 !important}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(2) a {border-right:1px solid #d5d5d5;border-bottom:0 !important}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(3) a {border-bottom:0 !important}
    .pg-anchor-in.tab-e2 .tab-bottom-line {display:none}
}
</style>

<div class="admin-shop-inorderform">
    <div class="adm-headline">
        <h3>???????????? ??????</h3>
    </div>

    <div id="anc_sodr_list">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_sodr_list'); ?>
        </div>

        <p>
            ???????????? <strong><?php echo substr($od['dt_time'],0,16); ?> (<?php echo get_yoil($od['dt_time']); ?>)</strong><span class="margin-left-5 margin-right-5 color-light-grey">|</span>???????????? <strong><?php echo number_format($order_price); ?></strong>???
        </p>

        <div class="table-list-eb">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="width-100px">???????????????</th>
                            <th class="width-200px">?????????</th>
                            <th class="width-200px">????????????</th>
                            <th class="width-50px">??????</th>
                            <th class="width-50px">??????</th>
                            <th>?????????</th>
                            <th>??????</th>
                            <th class="width-50px">??????</th>
                            <th class="width-50px">?????????</th>
                            <th class="width-50px">?????????</th>
                            <th class="width-50px">?????????<br>??????</th>
                            <th class="width-50px">??????<br>??????</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=0; $i<count((array)$list); $i++) { ?>
                        <?php foreach ($list[$i]['opt'] as $j => $opt) { ?>
                        <tr>
                            <?php if ($j == 0) { ?>
                            <td rowspan="<?php echo count((array)$list[$i]['opt']); ?>">
                                <a href="<?php echo $list[$i]['href']; ?>" target="_blank"><?php echo $list[$i]['image']; ?></a>
                            </td>
                            <td rowspan="<?php echo count((array)$list[$i]['opt']); ?>">
                                <a href="<?php echo $list[$i]['href']; ?>" target="_blank"><strong><?php echo stripslashes($row['it_name']); ?></strong></a><br>
                                <?php if($od['od_tax_flag'] && $row['ct_notax']) echo '[???????????????]'; ?>
                            </td>
                            <?php } ?>
                            <td><?php echo $opt['ct_option']; ?></td>
                            <td><?php echo $opt['ct_status']; ?></td>
                            <td class="text-right"><?php echo number_format($opt['ct_qty']); ?></td>
                            <td class="text-right"><?php echo number_format($opt['opt_price']); ?></td>
                            <td class="text-right"><?php echo number_format($opt['ct_price']); ?></td>
                            <td class="text-right"><?php echo number_format($opt['opt_cp_price']); ?></td>
                            <td class="text-right"><?php echo number_format($opt['ct_point']); ?></td>
                            <td class="text-center"><?php echo number_format($opt['ct_send_cost']); ?></td>
                            <td><?php echo get_yn($opt['ct_point_use']); ?></td>
                            <td><?php echo get_yn($opt['ct_stock_use']); ?></td>
                        </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="margin-bottom-30"></div>

    <form name="frmorderform" method="post" action="<?php echo $action_url1; ?>" onsubmit="return form_submit(this);" class="eyoom-form">
    <input type="hidden" name="od_id" value="<?php echo $od_id; ?>">
    <input type="hidden" name="sst" value="<?php echo $sst; ?>">
    <input type="hidden" name="sod" value="<?php echo $sod; ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl; ?>">
    <input type="hidden" name="stx" value="<?php echo $stx; ?>">
    <input type="hidden" name="page" value="<?php echo $page; ?>">

    <div id="anc_sodr_orderer">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_sodr_orderer'); ?>
        </div>

        <p class="color-red"><strong>????????? <?php echo display_price($amount['misu']); ?></strong></p>

        <div id="order-info"></div>
        <div class="margin-bottom-20"></div>

        <div class="text-center margin-top-30 margin-bottom-30">
            <input type="submit" value="?????? ??????" class="btn-e btn-e-lg btn-e-red">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=inorderlist&qstr=<?php echo $qstr; ?>" id="btn_list" class="btn-e btn-e-lg btn-e-dark">????????????</a>
        </div>
    </div>
    <div class="margin-bottom-30"></div>

    <?php if (is_array($tmps)) { ?>
    <div class="headline">
        <h4><strong>???????????? ?????? ??????</strong></h4>
    </div>
    <div class="margin-bottom-30"></div>

    <div>
        <p>???????????? ????????? ?????? ????????? ???????????? ?????? ??????????????? ?????? ???????????? ?????? ?????? ????????? ????????? ?????????.</p>

        <div class="table-list-eb">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <?php foreach ($inilog as $ilog) { ?>
                    <tr>
                        <th class="width-100px">????????????</th>
                        <td><?php echo $ilog['oid']; ?></td>
                    </tr>
                    <tr>
                        <th>?????? TID</th>
                        <td><?php echo $ilog['p_tid']; ?></td>
                    </tr>
                    <tr>
                        <th>?????? MID</th>
                        <td><?php echo $ilog['p_mid'] . $ilog['test_str']; ?></td>
                    </tr>
                    <tr>
                        <th>?????? ??????</th>
                        <td><?php echo $ilog['p_date']; ?></td>
                    </tr>
                    <tr>
                        <th>?????? ??????</th>
                        <td><?php echo $ilog['p_method']; ?></td>
                    </tr>
                    <tr>
                        <th>?????? ??????</th>
                        <td><?php echo $ilog['p_amount']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="margin-bottom-30"></div>
    <?php } ?>

    <div id="anc_sodr_taker">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_sodr_taker'); ?>
        </div>

        <div class="admin-shop-orderform">
            <form class="eyoom-form">
            <div class="inorderform-box">
                <div class="row">
                    <div class="col col-6">
                        <h4><strong class="color-purple">???????????? ???</strong></h4>
                        <div class="margin-bottom-10"></div>

                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>??????</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_name']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>????????????</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_tel']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>?????????</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_hp']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>??????</div>
                            <div class="col col-9">
                                <span><?php echo $data['od_zip']; ?></span>
                                <span><?php echo get_text($data['od_addr1']); ?></span>
                                <span><?php echo get_text($data['od_addr2']); ?></span>
                                <span><?php echo get_text($data['od_addr3']); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>E-mail</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_email']); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col col-6">
                        <h4><strong class="color-purple">???????????? ???</strong></h4>
                        <div class="margin-bottom-10"></div>

                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>??????</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_b_name']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>????????????</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_b_tel']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>?????????</div>
                            <div class="col col-9">
                                <?php echo get_text($data['od_b_hp']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3"><span class="sound_only">???????????? ??? </span>??????</div>
                            <div class="col col-9">
                                <span><?php echo $data['od_b_zip']; ?></span>
                                <span><?php echo get_text($data['od_b_addr1']); ?></span>
                                <span><?php echo get_text($data['od_b_addr2']); ?></span>
                                <span><?php echo get_text($data['od_b_addr3']); ?></span>
                            </div>
                        </div>
                        <?php if ($default['de_hope_date_use']) { ?>
                        <div class="row">
                            <div class="col col-3">?????? ?????????</div>
                            <div class="col col-9">
                                <?php echo $data['od_hope_date']; ?> (<?php echo get_yoil($data['od_hope_date']); ?>)
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col col-3">?????? ?????????</div>
                            <div class="col col-9">
                                <?php if ($data['od_memo']) echo get_text($data['od_memo'], 1);else echo "??????";?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center margin-top-30 margin-bottom-30">
            <input type="submit" value="?????? ??????" class="btn-e btn-e-lg btn-e-red">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=shop&pid=inorderlist&<?php echo $qstr; ?>" id="btn_list" class="btn-e btn-e-lg btn-e-dark">????????????</a>
        </div>

        </form>
    </div>
</div>

<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/jsgrid/jsgrid.min.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/js/jsgrid.js"></script>

<script>
$('.pg-anchor a').on('click', function(e) {
    e.stopPropagation();
    var scrollTopSpace;
    if (window.innerWidth >= 1100) {
        scrollTopSpace = 70;
    } else {
        scrollTopSpace = 70;
    }
    var tabLink = $(this).attr('href');
    var offset = $(tabLink).offset().top;
    $('html, body').animate({scrollTop : offset - scrollTopSpace}, 500);
    return false;
});

!function () {
    var db = {
        deleteItem: function (deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1)
        },
        insertItem: function (insertingClient) {
            this.clients.push(insertingClient)
        },
        loadData  : function (filter) {
            return $.grep(this.clients, function (client) {
                return !(filter.No && !(client.No.indexOf(filter.No) > -1) || filter.??????????????? && !(client.???????????????.indexOf(filter.???????????????) > -1) || filter.?????? && !(client.??????.indexOf(filter.??????) > -1) || filter.???????????? && !(client.????????????.indexOf(filter.????????????) > -1) || filter.????????? && !(client.?????????.indexOf(filter.?????????) > -1) || filter.??? && !(client.???.indexOf(filter.???) > -1) || filter.????????? && !(client.?????????.indexOf(filter.?????????) > -1) || filter.?????? && !(client.??????.indexOf(filter.??????) > -1) || filter.????????? && !(client.?????????.indexOf(filter.?????????) > -1) )
            })
        },
        updateItem: function (updatingClient) {}
    };
    window.db    = db,
    db.clients   = [
        {
            ????????????: "<?php echo $od['od_id']; ?>",
            ????????????: "<?php echo $s_receipt_way; ?>",
            ????????????: "<?php echo display_price($amount['order']); ?>",
            ?????????: "<?php echo display_price($od_send_cost + $od_send_cost2); ?>",
            ???????????????: "<?php echo display_point($od_temp_point); ?>",
            ????????????: "<?php echo number_format($amount['receipt']); ?>???",
            ??????: "<?php echo display_price($amount['coupon']); ?>",
            ????????????: "<?php echo number_format($amount['cancel']); ?>???",
        },
    ]
}();

$(document).ready(function() {
    $("#order-info").jsGrid({
        filtering      : false,
        editing        : false,
        sorting        : false,
        paging         : true,
        autoload       : true,
        controller     : db,
        deleteConfirm  : "????????? ?????????????????????????\n?????? ????????? ???????????? ???????????? ????????????.",
        pageButtonCount: 5,
        pageSize       : <?php echo $config['cf_page_rows']; ?>,
        width          : "100%",
        height         : "auto",
        fields         : [
            { name: "????????????", type: "text", width: 120 },
            { name: "????????????", type: "text", width: 80 },
            { name: "????????????", type: "number", width: 100 },
            { name: "?????????", type: "number", width: 80 },
            { name: "???????????????", type: "number", width: 100 },
            { name: "????????????", type: "number", width: 100 },
            { name: "??????", type: "number", width: 100 },
            { name: "????????????", type: "number", width: 100 },
            //{ type: "control" }
        ]
    })

});

function form_submit(f) {
    if (!confirm("?????? ????????? ????????? ???????????? ??????????????? ?????????????????????????")) {
        return false;
    }

    return true;
}

function del_confirm() {
    if(confirm("???????????? ?????????????????????????")) {
        return true;
    } else {
        return false;
    }
}
</script>