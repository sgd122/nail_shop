<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/theme/config_form.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;
?>

<style>
@media (min-width: 1100px) {
    .pg-anchor-in.tab-e2 .nav-tabs li a {font-size:14px;font-weight:bold;padding:8px 17px}
    .pg-anchor-in.tab-e2 .nav-tabs li.active a {z-index:1;border:1px solid #000;border-top:1px solid #DE2600;color:#DE2600}
    .pg-anchor-in.tab-e2 .tab-bottom-line {position:relative;display:block;height:1px;background:#000;margin-bottom:20px}
}
@media (max-width: 1099px) {
    .pg-anchor-in {position:relative;overflow:hidden;margin-bottom:20px;border:1px solid #757575}
    .pg-anchor-in.tab-e2 .nav-tabs li {width:33.33333%;margin:0}
    .pg-anchor-in.tab-e2 .nav-tabs li a {font-size:12px;padding:6px 0;text-align:center;border-bottom:1px solid #d5d5d5;margin-right:0;font-weight:bold;background:#fff}
    .pg-anchor-in.tab-e2 .nav-tabs li.active a {border:0;border-bottom:1px solid #d5d5d5 !important;color:#DE2600;background:#fff1f0}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(1) a {border-right:1px solid #d5d5d5}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(2) a {border-right:1px solid #d5d5d5}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(4) a {border-right:1px solid #d5d5d5;border-bottom:0 !important}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(5) a {border-right:1px solid #d5d5d5;border-bottom:0 !important}
    .pg-anchor-in.tab-e2 .nav-tabs li:nth-child(6) a {border-bottom:0 !important}
    .pg-anchor-in.tab-e2 .tab-bottom-line {display:none}
}
</style>

<div class="admin-config-form">
    <div class="adm-headline">
        <h3>테마환경설정</h3>
    </div>

    <?php include_once(EYOOM_ADMIN_THEME_PATH . '/skin/theme/theme_head.html.php'); ?>

    <form name="fconfig" method="post" action="<?php echo $action_url1; ?>" enctype="multipart/form-data" class="eyoom-form">
    <input type="hidden" name="theme" id="theme" value="<?php echo $this_theme; ?>">
    <input type="hidden" name="shop_theme" id="shop_theme" value="<?php echo $this_shop_theme; ?>">
    <input type="hidden" name="tm_key" id="tm_key" value="<?php echo $this_tminfo['tm_key']; ?>">
    <input type="hidden" name="cm_key" id="cm_key" value="">
    <input type="hidden" name="cm_salt" id="cm_salt" value="">

    <div id="anc_tcf_basic">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_tcf_basic'); ?>
        </div>
        <div class="adm-table-form-wrap margin-bottom-30">
            <header><strong><i class="fas fa-caret-right"></i> 기본설정</strong></header>

            <div class="table-list-eb">
                <?php if (!G5_IS_MOBILE) { ?>
                <div class="table-responsive">
                <?php } ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">테마유형</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="is_responsive1" class="radio"><input type="radio" name="is_responsive" id="is_responsive1" value="1" <?php echo $eyoom['is_responsive'] == '1' ? 'checked': '';?>><i></i> 반응형</label>
                                    <label for="is_responsive2" class="radio"><input type="radio" name="is_responsive" id="is_responsive2" value="0" <?php echo $eyoom['is_responsive'] == '0' ? 'checked': '';?>><i></i> 비반응형</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 테마를 반응형으로 할지 비반응형으로 할지 설정합니다.</div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">모바일 디바이스 모드</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_mobile_default_1" class="radio"><input type="radio" name="use_mobile_default" id="use_mobile_default_1" value="pc" <?php echo $eyoom['use_mobile_default'] == 'pc' || !$eyoom['use_mobile_default'] ? 'checked': '';?>><i></i> PC모드</label>
                                    <label for="use_mobile_default_2" class="radio"><input type="radio" name="use_mobile_default" id="use_mobile_default_2" value="mobile" <?php echo $eyoom['use_mobile_default'] == 'mobile' ? 'checked': '';?>><i></i> 모바일모드</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 테마유형이 비반응형욿 설정되어 있을 경우, 모바일 기본 모드를 설정하실 수 있습니다.</div>
                            </td>
                        </tr>
                        <?php if ($is_youngcart) { ?>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">쇼핑몰 기능 사용여부</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <label for="is_shop_theme1" class="radio"><input type="radio" name="is_shop_theme" id="is_shop_theme1" value="y" <?php echo $eyoom['is_shop_theme'] == 'y' ? 'checked': '';?>><i></i> 사용</label>
                                    <label for="is_shop_theme2" class="radio"><input type="radio" name="is_shop_theme" id="is_shop_theme2" value="n" <?php echo $eyoom['is_shop_theme'] == 'n' ? 'checked': '';?>><i></i> 사용안함</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 쇼핑몰테마의 쇼핑몰 기능을 사용할지 여부를 설정합니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">메인설정</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_shop_index_1" class="radio"><input type="radio" name="use_shop_index" id="use_shop_index_1" value="n" <?php echo $eyoom['use_shop_index'] == 'n' ? 'checked': '';?>><i></i> 커뮤니티 메인</label>
                                    <label for="use_shop_index_2" class="radio"><input type="radio" name="use_shop_index" id="use_shop_index_2" value="y" <?php echo $eyoom['use_shop_index'] == 'y' ? 'checked': '';?>><i></i> 쇼핑몰 메인</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 홈페이지 메인을 선택적으로 사용하실 수 있습니다.</div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">홈페이지 메인에 유형별상품 연동</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_shop_itemtype_1" class="radio"><input type="radio" name="use_shop_itemtype" id="use_shop_itemtype_1" value="y" <?php echo $eyoom['use_shop_itemtype'] == 'y' ? 'checked': '';?>><i></i> 네</label>
                                    <label for="use_shop_itemtype_2" class="radio"><input type="radio" name="use_shop_itemtype" id="use_shop_itemtype_2" value="n" <?php echo $eyoom['use_shop_itemtype'] == 'n' ? 'checked': '';?>><i></i> 아니오</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 홈페이지 메인에 쇼핑몰의 유형별 상품을 쇼핑몰 메인처럼 호출하실 수 있습니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">커뮤니티 레이아웃 쇼핑몰에 적용</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_layout_community_1" class="radio"><input type="radio" name="use_layout_community" id="use_layout_community_1" value="y" <?php echo $eyoom['use_layout_community'] == 'y' ? 'checked': '';?>><i></i> 적용</label>
                                    <label for="use_layout_community_2" class="radio"><input type="radio" name="use_layout_community" id="use_layout_community_2" value="n" <?php echo $eyoom['use_layout_community'] == 'n' ? 'checked': '';?>><i></i> 적용하지 않음</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 쇼핑몰 기능의 페이지에서 커뮤니티 레이아웃(메뉴구성 포함)을 사용합니다.</div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">쇼핑몰 메뉴</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_eyoom_shopmenu1" class="radio"><input type="radio" name="use_eyoom_shopmenu" id="use_eyoom_shopmenu1" value="y" <?php echo $eyoom['use_eyoom_shopmenu'] == 'y' ? 'checked': '';?>><i></i> 이윰메뉴 사용</label>
                                    <label for="use_eyoom_shopmenu2" class="radio"><input type="radio" name="use_eyoom_shopmenu" id="use_eyoom_shopmenu2" value="n" <?php echo $eyoom['use_eyoom_shopmenu'] == 'n' ? 'checked': '';?>><i></i> 그누메뉴 사용</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 쇼핑몰의 상단메뉴를 그누메뉴로 사용시, 쇼핑몰 카테고리분류를 메뉴로 사용하게 됩니다.</div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">커뮤니티 기능 사용여부</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="is_community_theme1" class="radio"><input type="radio" name="is_community_theme" id="is_community_theme1" value="y" <?php echo $eyoom['is_community_theme'] == 'y' ? 'checked': '';?>><i></i> 사용</label>
                                    <label for="is_community_theme2" class="radio"><input type="radio" name="is_community_theme" id="is_community_theme2" value="n" <?php echo $eyoom['is_community_theme'] == 'n' ? 'checked': '';?>><i></i> 미사용</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 사용할 경우, [타임라인, 관심게시판, 팔로잉글, 활동기록, 방문설정, 마이홈, 친구맺기,  방명록] 기능이 활성화됩니다.</div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">커뮤니티 메뉴 설정</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_eyoom_menu1" class="radio"><input type="radio" name="use_eyoom_menu" id="use_eyoom_menu1" value="y" <?php echo $eyoom['use_eyoom_menu'] == 'y' ? 'checked': '';?>><i></i> 이윰메뉴 사용</label>
                                    <label for="use_eyoom_menu2" class="radio"><input type="radio" name="use_eyoom_menu" id="use_eyoom_menu2" value="n" <?php echo $eyoom['use_eyoom_menu'] == 'n' ? 'checked': '';?>><i></i> 그누메뉴 사용</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 커뮤니티 홈페이지의 메뉴를 그누보드 기본 메뉴를 사용할지 이윰빌더의 메뉴를 사용할지 설정합니다.</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if (!G5_IS_MOBILE) { ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    <div id="anc_tcf_alias">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_tcf_alias'); ?>
        </div>
        <div class="adm-table-form-wrap margin-bottom-30">
            <header><strong><i class="fas fa-caret-right"></i> 별칭설정</strong></header>
            <fieldset>
                <div class="cont-text-bg">
                    <p class="bg-danger font-size-12 margin-bottom-0">
                        <i class="fas fa-info-circle"></i> 테마에 다른 별칭을 만들 수 있습니다. 웹사이트를 다국어 버전으로 제작할 경우 유용하며 1차메뉴들을 각각 다른 테마로 구성할 수도 있습니다.
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
                                <label for="tm_alias" class="label">별칭</label>
                            </th>
                            <td>
                                <div class="inline-mix">
                                    <span class="display-inline-block"><?php echo G5_URL; ?>/?theme=</span>
                                    <label class="input display-inline-block width-150px">
                                        <input type="text" name="tm_alias" id="tm_alias" value="<?php echo $this_tminfo['tm_alias']?>">
                                    </label>
                                    <?php if ($this_tminfo['tm_alias']) { ?>
                                    <span class="display-inline-block"><a href="<?php echo G5_URL; ?>/?theme=<?php echo $this_tminfo['tm_alias']?>" class="btn-e btn-e-dark btn-e-sm" target="_blank">바로가기</a></span>
                                    <?php } ?>
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
    </div>

    <?php echo $frm_submit; ?>

    <div id="anc_tcf_func">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_tcf_func'); ?>
        </div>
        <div class="adm-table-form-wrap margin-bottom-30">
            <header><strong><i class="fas fa-caret-right"></i> 기능설정</strong></header>

            <div class="table-list-eb">
                <?php if (!G5_IS_MOBILE) { ?>
                <div class="table-responsive">
                <?php } ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">회원 사이드뷰</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <label for="use_sideview1" class="radio"><input type="radio" name="use_sideview" id="use_sideview1" value="y" <?php echo $eyoom['use_sideview'] == 'y' ? 'checked':''; ?>><i></i> 사용</label>
                                    <label for="use_sideview2" class="radio"><input type="radio" name="use_sideview" id="use_sideview2" value="n" <?php echo $eyoom['use_sideview'] == 'n' ? 'checked':''; ?>><i></i> 사용하지 않음</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 회원아이디 클릭시 회원정보관련 팝업레이어의 사용 여부를 설정합니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">푸시알람 사용여부</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="push_reaction1" class="radio"><input type="radio" name="push_reaction" id="push_reaction1" value="y" <?php echo $eyoom['push_reaction'] == 'y' ? 'checked':''; ?>><i></i> 사용</label>
                                    <label for="push_reaction2" class="radio"><input type="radio" name="push_reaction" id="push_reaction2" value="n" <?php echo $eyoom['push_reaction'] == 'n' ? 'checked':''; ?>><i></i> 사용하지 않음</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 이윰빌더에서 기본으로 제공하는 실시간 알람기능의 사용여부를 설정합니다.<br>설정 시 내글반응 및 쪽지, 추천, 비추천, 팔로우등 다양한 종류의 실시간 알람을 받아보실 수 있습니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">푸시체크 반복시간</label>
                            </th>
                            <td>
                                <label for="push_time" class="input form-width-150px">
                                    <input type="input" name="push_time" id="push_time" value="<?php echo $eyoom['push_time']; ?>">
                                </label>
                                <div class="note"><strong>Note:</strong> 1000 -> 1초 단위로 알람이 있는지 여부를 체크하여 실시간으로 알람을 생성합니다.<br>숫자가 작을수록 서버에 부하를 줄 수 있습니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="level_icon_gnu" class="label">그누레벨 아이콘</label>
                            </th>
                            <td colspan="3">
                                <?php if ($icons['gnuboard']) { ?>
                                <div class="inline-group">
                                    <label class="select form-width-250px">
                                        <select name="level_icon_gnu" id="level_icon_gnu">
                                            <option value="">선택</option>
                                            <?php foreach ($icons['gnuboard'] as $gnu_icon) { ?>
                                            <option value="<?php echo $gnu_icon; ?>" <?php echo get_selected($eyoom['level_icon_gnu'], $gnu_icon); ?>><?php echo $gnu_icon; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                    <div class="inline-group">
                                        <label for="use_level_icon_gnu1" class="radio"><input type="radio" name="use_level_icon_gnu" id="use_level_icon_gnu1" value="y" <?php echo $eyoom['use_level_icon_gnu'] == 'y' ? 'checked':''; ?>><i></i> 사용</label>
                                        <label for="use_level_icon_gnu2" class="radio"><input type="radio" name="use_level_icon_gnu" id="use_level_icon_gnu2" value="n" <?php echo $eyoom['use_level_icon_gnu'] == 'n' || !$eyoom['use_level_icon_gnu'] ? 'checked':''; ?>><i></i> 사용하지 않음</label>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div>테마에 그누레벨 아이콘이 존재하지 않습니다.</div>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="level_icon_eyoom" class="label">이윰레벨 아이콘</label>
                            </th>
                            <td colspan="3">
                                <?php if ($icons['eyoom']) { ?>
                                <div class="inline-group">
                                    <label class="select form-width-250px">
                                        <select name="level_icon_eyoom" id="level_icon_eyoom">
                                            <option value="">선택</option>
                                            <?php foreach ($icons['eyoom'] as $eyoom_icon) { ?>
                                            <option value="<?php echo $eyoom_icon; ?>" <?php echo get_selected($eyoom['level_icon_eyoom'], $eyoom_icon); ?>><?php echo $eyoom_icon; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                    <div class="inline-group">
                                        <label for="use_level_icon_eyoom1" class="radio"><input type="radio" name="use_level_icon_eyoom" id="use_level_icon_eyoom1" value="y" <?php echo $eyoom['use_level_icon_eyoom'] == 'y' ? 'checked':''; ?>><i></i> 사용</label>
                                        <label for="use_level_icon_eyoom2" class="radio"><input type="radio" name="use_level_icon_eyoom" id="use_level_icon_eyoom2" value="n" <?php echo $eyoom['use_level_icon_eyoom'] == 'n' || !$eyoom['use_level_icon_eyoom'] ? 'checked':''; ?>><i></i> 사용하지 않음</label>
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div>테마에 이윰레벨 아이콘이 존재하지 않습니다.</div>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">프로필 이미지 사이즈</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <span>
                                        <label for="photo_width" class="input form-width-200px">
                                            <i class="icon-prepend">폭</i>
                                            <i class="icon-append text-width">px</i>
                                            <input type="text" name="photo_width" id="photo_width" value="<?php echo $eyoom['photo_width']; ?>" class="text-right">
                                        </label>
                                    </span>
                                    <span> X </span>
                                    <span>
                                        <label for="photo_height" class="input form-width-200px">
                                            <i class="icon-prepend text-width">높이</i>
                                            <i class="icon-append text-width">px</i>
                                            <input type="text" name="photo_height" id="photo_height" value="<?php echo $eyoom['photo_height']; ?>" class="text-right">
                                        </label>
                                    </span>
                                </div>
                                <div class="note"><strong>Note:</strong> 회원의 프로필 이미지의 사이즈를 설정합니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="cover_width" class="label">마이홈 커버사진 가로사이즈</label>
                            </th>
                            <td colspan="3">
                                <label for="cover_width" class="input form-width-200px">
                                    <i class="icon-append text-width">px</i>
                                    <input type="text" name="cover_width" id="cover_width" value="<?php echo $eyoom['cover_width']; ?>" class="text-right">
                                </label>
                                <div class="note"><strong>Note:</strong> 회원의 마이폼페이지의 상단 이미지의 가로 사이즈를 설정합니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">그룹 게시판 최신글 추출 갯수</label>
                            </th>
                            <td colspan="3">
                                <label for="group_latest_cnt" class="input form-width-200px">
                                    <i class="icon-append">개</i>
                                    <input type="text" name="group_latest_cnt" id="group_latest_cnt" value="<?php echo $eyoom['group_latest_cnt'] ? $eyoom['group_latest_cnt']: '7'; ?>" class="text-right">
                                </label>
                                <div class="note"><strong>Note:</strong> <?php echo G5_BBS_URL; ?>/group.php?gr_id=xxx 그룹페이지의 최신글의 출력 갯수를 설정합니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">전체검색 출력 페이지 이미지</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <label for="use_search_image1" class="radio"><input type="radio" name="use_search_image" id="use_search_image1" value="y" <?php echo $eyoom['use_search_image'] == 'y' ? 'checked':''; ?>><i></i> 사용</label>
                                    <label for="use_search_image2" class="radio"><input type="radio" name="use_search_image" id="use_search_image2" value="n" <?php echo $eyoom['use_search_image'] == 'n' ? 'checked':''; ?>><i></i> 사용하지 않음</label>
                                </div>
                                <div class="note"><strong>Note:</strong> 전체검색 결과 페이지에서 목록에 이미지를 출력할 것인지 여부를 설정합니다.</div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">검색결과 이미지 사이즈</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <span>
                                        <label for="search_image_width" class="input form-width-200px">
                                            <i class="icon-prepend">폭</i>
                                            <i class="icon-append text-width">px</i>
                                            <input type="text" name="search_image_width" id="search_image_width" value="<?php echo $eyoom['search_image_width']; ?>" class="text-right">
                                        </label>
                                    </span>
                                    <span> X </span>
                                    <span>
                                        <label for="search_image_height" class="input form-width-200px">
                                            <i class="icon-prepend text-width">높이</i>
                                            <i class="icon-append text-width">px</i>
                                            <input type="text" name="search_image_height" id="search_image_height" value="<?php echo $eyoom['search_image_height']; ?>" class="text-right">
                                        </label>
                                    </span>
                                </div>
                                <div class="note"><strong>Note:</strong> 검색결과 페이지에서 이미지를 사용할 경우, 출력 이미지의 사이즈를 설정합니다.</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if (!G5_IS_MOBILE) { ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    <div id="anc_tcf_skin">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_tcf_skin'); ?>
        </div>
        <div class="adm-table-form-wrap margin-bottom-30">
            <header><strong><i class="fas fa-caret-right"></i> 스킨설정</strong></header>
            <fieldset>
                <div class="cont-text-bg">
                    <p class="bg-danger font-size-12 margin-bottom-0">
                        <i class="fas fa-info-circle"></i> 각 기능별로 스킨을 선택하여 적용하실 수 있습니다.<br>
                        <i class="fas fa-info-circle"></i> 그누보드 스킨 선택시 그누보드 환경설정에서 스킨을 선택하거나 스킨파일에서 직접 설정하셔야 합니다.
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
                                <label for="outlogin_skin" class="label">아웃로그인 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_outlogin1" class="radio"><input type="radio" name="use_gnu_outlogin" id="use_gnu_outlogin1" value="n" <?php echo $eyoom['use_gnu_outlogin'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_outlogin2" class="radio"><input type="radio" name="use_gnu_outlogin" id="use_gnu_outlogin2" value="y" <?php echo $eyoom['use_gnu_outlogin'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="outlogin_skin" class="label">아웃로그인 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['outlogin']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="outlogin_skin" id="outlogin_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['outlogin']); $i++) { ?>
                                            <option value="<?php echo $skins['outlogin'][$i]; ?>" <?php echo get_selected($eyoom['outlogin_skin'], $skins['outlogin'][$i]); ?>><?php echo $skins['outlogin'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 아웃로그인 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="connect_skin" class="label">현재접속자 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_connect1" class="radio"><input type="radio" name="use_gnu_connect" id="use_gnu_connect1" value="n" <?php echo $eyoom['use_gnu_connect'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_connect2" class="radio"><input type="radio" name="use_gnu_connect" id="use_gnu_connect2" value="y" <?php echo $eyoom['use_gnu_connect'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="connect_skin" class="label">현재접속자 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['connect']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="connect_skin" id="connect_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['connect']); $i++) { ?>
                                            <option value="<?php echo $skins['connect'][$i]; ?>" <?php echo get_selected($eyoom['connect_skin'], $skins['connect'][$i]); ?>><?php echo $skins['connect'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 현재접속자 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="popular_skin" class="label">인기검색어 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_popular1" class="radio"><input type="radio" name="use_gnu_popular" id="use_gnu_popular1" value="n" <?php echo $eyoom['use_gnu_popular'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_popular2" class="radio"><input type="radio" name="use_gnu_popular" id="use_gnu_popular2" value="y" <?php echo $eyoom['use_gnu_popular'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="popular_skin" class="label">인기검색어 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['popular']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="popular_skin" id="popular_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['popular']); $i++) { ?>
                                            <option value="<?php echo $skins['popular'][$i]; ?>" <?php echo get_selected($eyoom['popular_skin'], $skins['popular'][$i]); ?>><?php echo $skins['popular'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 인기검색어 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="poll_skin" class="label">설문조사 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_poll1" class="radio"><input type="radio" name="use_gnu_poll" id="use_gnu_poll1" value="n" <?php echo $eyoom['use_gnu_poll'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_poll2" class="radio"><input type="radio" name="use_gnu_poll" id="use_gnu_poll2" value="y" <?php echo $eyoom['use_gnu_poll'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="poll_skin" class="label">설문조사 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['poll']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="poll_skin" id="poll_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['poll']); $i++) { ?>
                                            <option value="<?php echo $skins['poll'][$i]; ?>" <?php echo get_selected($eyoom['poll_skin'], $skins['poll'][$i]); ?>><?php echo $skins['poll'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 설문조사 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="visit_skin" class="label">방문자통계 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_visit1" class="radio"><input type="radio" name="use_gnu_visit" id="use_gnu_visit1" value="n" <?php echo $eyoom['use_gnu_visit'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_visit2" class="radio"><input type="radio" name="use_gnu_visit" id="use_gnu_visit2" value="y" <?php echo $eyoom['use_gnu_visit'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="visit_skin" class="label">방문자통계 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['visit']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="visit_skin" id="visit_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['visit']); $i++) { ?>
                                            <option value="<?php echo $skins['visit'][$i]; ?>" <?php echo get_selected($eyoom['visit_skin'], $skins['visit'][$i]); ?>><?php echo $skins['visit'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 방문자통계 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="new_skin" class="label">새글 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_new1" class="radio"><input type="radio" name="use_gnu_new" id="use_gnu_new1" value="n" <?php echo $eyoom['use_gnu_new'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_new2" class="radio"><input type="radio" name="use_gnu_new" id="use_gnu_new2" value="y" <?php echo $eyoom['use_gnu_new'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="new_skin" class="label">새글 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['new']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="new_skin" id="new_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['new']); $i++) { ?>
                                            <option value="<?php echo $skins['new'][$i]; ?>" <?php echo get_selected($eyoom['new_skin'], $skins['new'][$i]); ?>><?php echo $skins['new'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 새글 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="member_skin" class="label">멤버쉽(회원) 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_member1" class="radio"><input type="radio" name="use_gnu_member" id="use_gnu_member1" value="n" <?php echo $eyoom['use_gnu_member'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_member2" class="radio"><input type="radio" name="use_gnu_member" id="use_gnu_member2" value="y" <?php echo $eyoom['use_gnu_member'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="member_skin" class="label">멤버쉽(회원) 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['member']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="member_skin" id="member_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['member']); $i++) { ?>
                                            <option value="<?php echo $skins['member'][$i]; ?>" <?php echo get_selected($eyoom['member_skin'], $skins['member'][$i]); ?>><?php echo $skins['member'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 멤버쉽(회원) 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="faq_skin" class="label">FAQ 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_faq1" class="radio"><input type="radio" name="use_gnu_faq" id="use_gnu_faq1" value="n" <?php echo $eyoom['use_gnu_faq'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_faq2" class="radio"><input type="radio" name="use_gnu_faq" id="use_gnu_faq2" value="y" <?php echo $eyoom['use_gnu_faq'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="faq_skin" class="label">FAQ 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['faq']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="faq_skin" id="faq_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['faq']); $i++) { ?>
                                            <option value="<?php echo $skins['faq'][$i]; ?>" <?php echo get_selected($eyoom['faq_skin'], $skins['faq'][$i]); ?>><?php echo $skins['faq'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 FAQ 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="qa_skin" class="label">1:1문의 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_qa1" class="radio"><input type="radio" name="use_gnu_qa" id="use_gnu_qa1" value="n" <?php echo $eyoom['use_gnu_qa'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_qa2" class="radio"><input type="radio" name="use_gnu_qa" id="use_gnu_qa2" value="y" <?php echo $eyoom['use_gnu_qa'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="qa_skin" class="label">1:1문의 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['qa']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="qa_skin" id="qa_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['qa']); $i++) { ?>
                                            <option value="<?php echo $skins['qa'][$i]; ?>" <?php echo get_selected($eyoom['qa_skin'], $skins['qa'][$i]); ?>><?php echo $skins['qa'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 1:1문의 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="search_skin" class="label">검색 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_search1" class="radio"><input type="radio" name="use_gnu_search" id="use_gnu_search1" value="n" <?php echo $eyoom['use_gnu_search'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_search2" class="radio"><input type="radio" name="use_gnu_search" id="use_gnu_search2" value="y" <?php echo $eyoom['use_gnu_search'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="search_skin" class="label">검색 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['search']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="search_skin" id="search_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['search']); $i++) { ?>
                                            <option value="<?php echo $skins['search'][$i]; ?>" <?php echo get_selected($eyoom['search_skin'], $skins['search'][$i]); ?>><?php echo $skins['search'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 검색 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php if ($is_youngcart) { ?>
                        <tr>
                            <th class="table-form-th">
                                <label for="shop_skin" class="label">쇼핑몰 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_shop1" class="radio"><input type="radio" name="use_gnu_shop" id="use_gnu_shop1" value="n" <?php echo $eyoom['use_gnu_shop'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_shop2" class="radio"><input type="radio" name="use_gnu_shop" id="use_gnu_shop2" value="y" <?php echo $eyoom['use_gnu_shop'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="shop_skin" class="label">쇼핑몰 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['shop']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="shop_skin" id="shop_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['shop']); $i++) { ?>
                                            <option value="<?php echo $skins['shop'][$i]; ?>" <?php echo get_selected($eyoom['shop_skin'], $skins['shop'][$i]); ?>><?php echo $skins['shop'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 쇼핑몰 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th class="table-form-th">
                                <label for="newwin_skin" class="label">팝업 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_newwin1" class="radio"><input type="radio" name="use_gnu_newwin" id="use_gnu_newwin1" value="n" <?php echo $eyoom['use_gnu_newwin'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                    <label for="use_gnu_newwin2" class="radio"><input type="radio" name="use_gnu_newwin" id="use_gnu_newwin2" value="y" <?php echo $eyoom['use_gnu_newwin'] == 'y' ? 'checked': ''; ?>><i></i>그누보드 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="newwin_skin" class="label">팝업 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['newwin']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="newwin_skin" id="newwin_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['newwin']); $i++) { ?>
                                            <option value="<?php echo $skins['newwin'][$i]; ?>" <?php echo get_selected($eyoom['newwin_skin'], $skins['newwin'][$i]); ?>><?php echo $skins['newwin'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 팝업 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="mypage_skin" class="label">마이페이지 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_mypage1" class="radio"><input type="radio" name="use_gnu_mypage" id="use_gnu_mypage1" value="n" <?php echo $eyoom['use_gnu_mypage'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="mypage_skin" class="label">마이페이지 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['mypage']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="mypage_skin" id="mypage_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['mypage']); $i++) { ?>
                                            <option value="<?php echo $skins['mypage'][$i]; ?>" <?php echo get_selected($eyoom['mypage_skin'], $skins['mypage'][$i]); ?>><?php echo $skins['mypage'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 마이페이지 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="tag_skin" class="label">태그 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_tag1" class="radio"><input type="radio" name="use_gnu_tag" id="use_gnu_tag1" value="n" <?php echo $eyoom['use_gnu_tag'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="tag_skin" class="label">태그 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['tag']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="tag_skin" id="tag_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['tag']); $i++) { ?>
                                            <option value="<?php echo $skins['tag'][$i]; ?>" <?php echo get_selected($eyoom['tag_skin'], $skins['tag'][$i]); ?>><?php echo $skins['tag'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 태그 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label for="ranking_skin" class="label">회원랭킹 스킨</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_gnu_ranking1" class="radio"><input type="radio" name="use_gnu_ranking" id="use_gnu_ranking1" value="n" <?php echo $eyoom['use_gnu_ranking'] == 'n' ? 'checked': ''; ?>><i></i>이윰빌더 스킨</label>
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label for="ranking_skin" class="label">회원랭킹 이윰빌더 스킨선택</label>
                            </th>
                            <td>
                                <?php if ($skins['ranking']) { ?>
                                <div class="inline-mix">
                                    <label class="select form-width-250px">
                                        <select name="ranking_skin" id="ranking_skin" required="required">
                                            <option value="">선택</option>
                                            <?php for($i=0; $i<count((array)$skins['ranking']); $i++) { ?>
                                            <option value="<?php echo $skins['ranking'][$i]; ?>" <?php echo get_selected($eyoom['ranking_skin'], $skins['ranking'][$i]); ?>><?php echo $skins['ranking'][$i]; ?></option>
                                            <?php } ?>
                                        </select><i></i>
                                    </label>
                                </div>
                                <?php } else { ?>
                                <p class="padding-5"><strong><?php echo $this_theme; ?></strong> 테마에 회원랭킹 스킨이 존재하지 않습니다.</p>
                                <?php } ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php if (!G5_IS_MOBILE) { ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    <div id="anc_tcf_layout">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_tcf_layout'); ?>
        </div>
        <div class="adm-table-form-wrap margin-bottom-30">
            <header><strong><i class="fas fa-caret-right"></i> 레이아웃</strong></header>

            <div class="table-list-eb">
                <?php if (!G5_IS_MOBILE) { ?>
                <div class="table-responsive">
                <?php } ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">레이아웃 타입</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="layout1" class="radio"><input type="radio" name="layout" id="layout1" value="wide" <?php echo $eyoom['layout'] == 'wide' || !$eyoom['layout'] ? 'checked': ''; ?>><i></i> 와이드형</label>
                                    <label for="layout2" class="radio"><input type="radio" name="layout" id="layout2" value="boxed" <?php echo $eyoom['layout'] == 'boxed' ? 'checked': ''; ?>><i></i> 박스형</label>
                                </div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">상단메뉴 스크롤 고정</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="sticky1" class="radio"><input type="radio" name="sticky" id="sticky1" value="y" <?php echo $eyoom['sticky'] == 'y' || !$eyoom['sticky'] ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="sticky2" class="radio"><input type="radio" name="sticky" id="sticky2" value="n" <?php echo $eyoom['sticky'] == 'n' ? 'checked': ''; ?>><i></i> 사용안함</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">메인 사이드 레이아웃 사용</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_main_side_layout1" class="radio"><input type="radio" name="use_main_side_layout" id="use_main_side_layout1" value="y" <?php echo $eyoom['use_main_side_layout'] == 'y' ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="use_main_side_layout2" class="radio"><input type="radio" name="use_main_side_layout" id="use_main_side_layout2" value="n" <?php echo $eyoom['use_main_side_layout'] == 'n' ? 'checked': ''; ?>><i></i> 미사용</label>
                                </div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">메인 사이드 레이아웃 위치</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="pos_main_side_layout1" class="radio"><input type="radio" name="pos_main_side_layout" id="pos_main_side_layout1" value="left" <?php echo $eyoom['pos_main_side_layout'] == 'left' ? 'checked': ''; ?>><i></i> 왼쪽</label>
                                    <label for="pos_main_side_layout2" class="radio"><input type="radio" name="pos_main_side_layout" id="pos_main_side_layout2" value="right" <?php echo $eyoom['pos_main_side_layout'] == 'right' ? 'checked': ''; ?>><i></i> 오른쪽</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">서브 사이드 레이아웃 사용</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_sub_side_layout1" class="radio"><input type="radio" name="use_sub_side_layout" id="use_sub_side_layout1" value="y" <?php echo $eyoom['use_sub_side_layout'] == 'y' ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="use_sub_side_layout2" class="radio"><input type="radio" name="use_sub_side_layout" id="use_sub_side_layout2" value="n" <?php echo $eyoom['use_sub_side_layout'] == 'n' ? 'checked': ''; ?>><i></i> 미사용</label>
                                </div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">서브 사이드 레이아웃 위치</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="pos_sub_side_layout1" class="radio"><input type="radio" name="pos_sub_side_layout" id="pos_sub_side_layout1" value="left" <?php echo $eyoom['pos_sub_side_layout'] == 'left' ? 'checked': ''; ?>><i></i> 왼쪽</label>
                                    <label for="pos_sub_side_layout2" class="radio"><input type="radio" name="pos_sub_side_layout" id="pos_sub_side_layout2" value="right" <?php echo $eyoom['pos_sub_side_layout'] == 'right' ? 'checked': ''; ?>><i></i> 오른쪽</label>
                                </div>
                            </td>
                        </tr>
                        <?php if ($is_youngcart) { ?>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">쇼핑몰 메인 사이드 레이아웃 사용</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_shopmain_side_layout1" class="radio"><input type="radio" name="use_shopmain_side_layout" id="use_shopmain_side_layout1" value="y" <?php echo $eyoom['use_shopmain_side_layout'] == 'y' ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="use_shopmain_side_layout2" class="radio"><input type="radio" name="use_shopmain_side_layout" id="use_shopmain_side_layout2" value="n" <?php echo $eyoom['use_shopmain_side_layout'] == 'n' ? 'checked': ''; ?>><i></i> 미사용</label>
                                </div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">쇼핑몰 메인 사이드 레이아웃 위치</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="pos_shopmain_side_layout1" class="radio"><input type="radio" name="pos_shopmain_side_layout" id="pos_shopmain_side_layout1" value="left" <?php echo $eyoom['pos_shopmain_side_layout'] == 'left' ? 'checked': ''; ?>><i></i> 왼쪽</label>
                                    <label for="pos_shopmain_side_layout2" class="radio"><input type="radio" name="pos_shopmain_side_layout" id="pos_shopmain_side_layout2" value="right" <?php echo $eyoom['pos_shopmain_side_layout'] == 'right' ? 'checked': ''; ?>><i></i> 오른쪽</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">쇼핑몰 서브 사이드 레이아웃 사용</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="use_shopsub_side_layout1" class="radio"><input type="radio" name="use_shopsub_side_layout" id="use_shopsub_side_layout1" value="y" <?php echo $eyoom['use_shopsub_side_layout'] == 'y' ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="use_shopsub_side_layout2" class="radio"><input type="radio" name="use_shopsub_side_layout" id="use_shopsub_side_layout2" value="n" <?php echo $eyoom['use_shopsub_side_layout'] == 'n' ? 'checked': ''; ?>><i></i> 미사용</label>
                                </div>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">쇼핑몰 서브 사이드 레이아웃 위치</label>
                            </th>
                            <td>
                                <div class="inline-group">
                                    <label for="pos_shopsub_side_layout1" class="radio"><input type="radio" name="pos_shopsub_side_layout" id="pos_shopsub_side_layout1" value="left" <?php echo $eyoom['pos_shopsub_side_layout'] == 'left' ? 'checked': ''; ?>><i></i> 왼쪽</label>
                                    <label for="pos_shopsub_side_layout2" class="radio"><input type="radio" name="pos_shopsub_side_layout" id="pos_shopsub_side_layout2" value="right" <?php echo $eyoom['pos_shopsub_side_layout'] == 'right' ? 'checked': ''; ?>><i></i> 오른쪽</label>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th class="table-form-th border-left-th">
                                <label class="label">커뮤니티에 쇼핑몰 퀵메뉴 사용</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <label for="use_shop_quick_menu1" class="radio"><input type="radio" name="use_shop_quick_menu" id="use_shop_quick_menu1" value="y" <?php echo $eyoom['use_shop_quick_menu'] == 'y' ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="use_shop_quick_menu2" class="radio"><input type="radio" name="use_shop_quick_menu" id="use_shop_quick_menu2" value="n" <?php echo $eyoom['use_shop_quick_menu'] == 'n' ? 'checked': ''; ?>><i></i> 미사용</label>
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
    </div>

    <?php echo $frm_submit; ?>

    <div id="anc_tcf_tag">
        <div class="pg-anchor">
        <?php echo adm_pg_anchor('anc_tcf_tag'); ?>
        </div>
        <div class="adm-table-form-wrap margin-bottom-30">
            <header><strong><i class="fas fa-caret-right"></i> 태그기능 설정</strong></header>

            <div class="table-list-eb">
                <?php if (!G5_IS_MOBILE) { ?>
                <div class="table-responsive">
                <?php } ?>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">태그기능 사용</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <label for="use_tag1" class="radio"><input type="radio" name="use_tag" id="use_tag1" value="y" <?php echo $eyoom['use_tag'] == 'y' ? 'checked': ''; ?>><i></i> 사용</label>
                                    <label for="use_tag2" class="radio"><input type="radio" name="use_tag" id="use_tag2" value="n" <?php echo $eyoom['use_tag'] == 'n' ? 'checked': ''; ?>><i></i> 사용하지 않음</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">태그메뉴 출력 태그수</label>
                            </th>
                            <td>
                                <label for="tag_dpmenu_count" class="input form-width-250px">
                                    <i class="icon-append">건</i>
                                    <input type="text" name="tag_dpmenu_count" id="tag_dpmenu_count" value="<?php echo $eyoom['tag_dpmenu_count']; ?>" class="text-right">
                                </label>
                            </td>
                        <?php if (G5_IS_MOBILE) { ?>
                        </tr>
                        <tr>
                        <?php } ?>
                            <th class="table-form-th border-left-th">
                                <label class="label">추천태그 출력 태그수</label>
                            </th>
                            <td>
                                <label for="tag_recommend_count" class="input form-width-250px">
                                    <i class="icon-append">건</i>
                                    <input type="text" name="tag_recommend_count" id="tag_recommend_count" value="<?php echo $eyoom['tag_recommend_count']; ?>" class="text-right">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th class="table-form-th">
                                <label class="label">태그메뉴 출력방식</label>
                            </th>
                            <td colspan="3">
                                <div class="inline-group">
                                    <label for="tag_dpmenu_sort_regdt" class="radio"><input type="radio" name="tag_dpmenu_sort" id="tag_dpmenu_sort_regdt" value="regdt" <?php echo $eyoom['tag_dpmenu_sort'] == 'regdt' ? 'checked': ''; ?>><i></i> 최신등록순</label>
                                    <label for="tag_dpmenu_sort_score" class="radio"><input type="radio" name="tag_dpmenu_sort" id="tag_dpmenu_sort_score" value="score" <?php echo $eyoom['tag_dpmenu_sort'] == 'score' ? 'checked': ''; ?>><i></i> 노출점수순</label>
                                    <label for="tag_dpmenu_sort_regcnt" class="radio"><input type="radio" name="tag_dpmenu_sort" id="tag_dpmenu_sort_regcnt" value="regcnt" <?php echo $eyoom['tag_dpmenu_sort'] == 'regcnt' ? 'checked': ''; ?>><i></i> 등록건수순</label>
                                    <label for="tag_dpmenu_sort_scnt" class="radio"><input type="radio" name="tag_dpmenu_sort" id="tag_dpmenu_sort_scnt" value="scnt" <?php echo $eyoom['tag_dpmenu_sort'] == 'scnt' ? 'checked': ''; ?>><i></i> 인기검색순</label>
                                    <label for="tag_dpmenu_sort_random" class="radio"><input type="radio" name="tag_dpmenu_sort" id="tag_dpmenu_sort_random" value="random" <?php echo $eyoom['tag_dpmenu_sort'] == 'random' ? 'checked': ''; ?>><i></i> 랜덤출력</label>
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
    </div>

    <?php echo $frm_submit; ?>

    </form>

</div>

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

function fconfigform_submit(f) {
    return true;
}
</script>