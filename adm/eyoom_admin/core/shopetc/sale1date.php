<?php
/**
 * @file    /adm/eyoom_admin/core/shopetc/sale1date.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

$sub_menu = "500110";

auth_check_menu($auth, $sub_menu, "r");

$fr_date = isset($_REQUEST['fr_date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['fr_date']) : '';
$to_date = isset($_REQUEST['to_date']) ? preg_replace('/[^0-9 :_\-]/i', '', $_REQUEST['to_date']) : '';

$fr_date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $fr_date);
$to_date = preg_replace("/([0-9]{4})([0-9]{2})([0-9]{2})/", "\\1-\\2-\\3", $to_date);

$sql = " select od_id,
            SUBSTRING(od_time,1,10) as od_date,
            od_settle_case,
            od_receipt_price,
            od_receipt_point,
            od_cart_price,
            od_cancel_price,
            od_misu,
            (od_cart_price + od_send_cost + od_send_cost2) as orderprice,
            (od_cart_coupon + od_coupon + od_send_coupon) as couponprice
       from {$g5['g5_shop_order_table']}
      where SUBSTRING(od_time,1,10) between '$fr_date' and '$to_date'
      order by od_time desc ";
$result = sql_query($sql);

$save = array('ordercount'=>0, 'orderprice'=>0, 'ordercancel'=>0, 'ordercoupon'=>0, 'receiptbank'=>0, 'receiptvbank'=>0, 'receiptiche'=>0, 'receipthp'=>0, 'receiptcard'=>0, 'receiptpoint'=>0, 'misu'=>0, 'receipteasy'=>0);
$tot = array('ordercount'=>0, 'orderprice'=>0, 'ordercancel'=>0, 'ordercoupon'=>0, 'receiptbank'=>0, 'receiptvbank'=>0, 'receiptiche'=>0, 'receipthp'=>0, 'receiptcard'=>0, 'receiptpoint'=>0, 'misu'=>0, 'receipteasy'=>0);

for ($i=0; $row=sql_fetch_array($result); $i++) {
    $date = $row['od_date'];
    $sale_data[$date][$i] = $row;
}

if (!$sale_data) $sale_data = array();

$i=0;
$list = array();
foreach($sale_data as $od_date => $data) {
    $sale_info = get_sale_info($data);

    $list[$i]['od_date'] = $od_date;
    $list[$i]['save'] = $sale_info['save'];
    $list[$i]['count'] = $sale_info['count'];
    $i++;
}
$cnt = count((array)$list);

function get_sale_info($row_array) {
    global $tot;
    foreach($row_array as $k => $row) {
        $save['orderprice']    += $row['orderprice'];
        $save['ordercancel']   += $row['od_cancel_price'];
        $save['ordercoupon']   += $row['couponprice'];
        if($row['od_settle_case'] == '?????????')
            $save['receiptbank']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '????????????')
            $save['receiptvbank']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '????????????')
            $save['receiptiche']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '?????????')
            $save['receipthp']   += $row['od_receipt_price'];
        if($row['od_settle_case'] == '????????????')
            $save['receiptcard']   += $row['od_receipt_price'];
        $save['receiptpoint']  += $row['od_receipt_point'];
        $save['misu']          += $row['od_misu'];

        $tot['ordercount']++;
        $tot['orderprice']     += $row['orderprice'];
        $tot['ordercancel']    += $row['od_cancel_price'];
        $tot['ordercoupon']    += $row['couponprice'];
        if($row['od_settle_case'] == '?????????')
            $tot['receiptbank']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '????????????')
            $tot['receiptvbank']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '????????????')
            $tot['receiptiche']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '?????????')
            $tot['receipthp']    += $row['od_receipt_price'];
        if($row['od_settle_case'] == '????????????')
            $tot['receiptcard']    += $row['od_receipt_price'];
        $tot['receiptpoint']  += $row['od_receipt_point'];
        $tot['misu']           += $row['od_misu'];

        if(in_array($row['od_settle_case'], array('????????????', 'KAKAOPAY', 'lpay', 'inicis_payco', 'inicis_kakaopay', '????????????'))) {
            $save['receipteasy'] += $row['od_receipt_price'];
            $tot['receipteasy'] += $row['od_receipt_price'];
        }
    }
    
    $output['save'] = $save;
    $output['count'] = count((array)$row_array);

    return $output;
}