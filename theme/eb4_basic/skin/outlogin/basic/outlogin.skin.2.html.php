<?php
/**
 * skin file : /theme/THEME_NAME/skin/outlogin/basic/outlogin.skin.2.html.php
 */
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/scroll-tabs/scrolltabs.min.css" type="text/css" media="screen">',0);
?>

<style>
.ol-after {position:relative;margin-bottom:25px}
.ol-after .profile {position:relative}
.ol-after .profile .cover {position:relative;overflow:hidden;width:100%;height:150px;background:#fff;border:1px solid #e5e5e5}
.ol-after .profile .photo {position:absolute;overflow:hidden;top:15px;left:50%;margin-left:-35px;z-index:7;width:70px;height:70px;line-height:70px;text-align:center;background-color:#959595;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important}
.ol-after .profile .photo img {display:block;width:100% \9;max-width:100%;height:auto}
.ol-after .profile .photo .member-img i {color:#fff;font-size:36px;line-height:66px}
.ol-after .profile .info {position:absolute;bottom:10px;left:0;width:100%;text-align:center;z-index:7}
.ol-after .profile .info .name {color:#353535;font-size:15px;font-weight:bold}
.ol-after .profile .info .name .level-icon {display:inline-block;margin-left:3px}
.ol-after .profile .info .position {color:#959595;font-size:12px}
.ol-after .profile .links,.ol-after .profile .links a,.ol-after .profile .toggle {bottom:-22px;z-index:8;right:15px;width:35px;height:35px;-webkit-border-radius:50% !important;-moz-border-radius:50% !important;border-radius:50% !important;position:absolute}
.ol-after .profile .links {bottom:-16px}
.ol-after .profile .plus {display:none}
.ol-after .profile .toggle {z-index:9;background:#FF4848;cursor:pointer;-webkit-transition:all 0.2s ease-in-out 0s;transition:all 0.2s ease-in-out 0s}
.ol-after .profile .toggle:after,.ol-after .profile .toggle:before {top:50%;left:50%;content:'';background:#eee;position:inherit}
.ol-after .profile .toggle:before {width:12px;height:1px;margin-top:-0.5px;margin-left:-6px}
.ol-after .profile .toggle:after {width:1px;height:12px;margin-top:-6px;margin-left:-0.5px}
.ol-after .profile .links a {bottom:5px;z-index:8;right:5px;width:25px;height:25px;color:#fff;background:#959595;text-align:center;line-height:25px;-webkit-transform:none;-moz-transform:none;-ms-transform:none;-o-transform:none;transform:none;-webkit-transition:all 0.3s ease-in-out 0s;transition:all 0.3s ease-in-out 0s}
.ol-after .profile .links a:before {top:50%;right:30px;color:#ccc;height:20px;opacity:0;font-size:11px;min-width:70px;margin-top:-10px;line-height:20px;position:inherit;-webkit-border-radius:2px !important;-moz-border-radius:2px !important;border-radius:2px !important;content:attr(data-title);background:rgba(0,0,0,0.8);-webkit-transition:all 0.4s ease-in-out 0s;transition:all 0.4s ease-in-out 0s}
.ol-after .profile .plus:checked + .toggle {-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(1) {-webkit-transform:translate(0,-130px);-moz-transform:translate(0,-130px);-ms-transform:translate(0,-130px);-o-transform:translate(0,-130px);transform:translate(0,-130px);-webkit-transition-duration:0.4s;transition-duration:0.4s}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(2) {-webkit-transform:translate(0,-98px);-moz-transform:translate(0,-98px);-ms-transform:translate(0,-98px);-o-transform:translate(0,-98px);transform:translate(0,-98px);-webkit-transition-duration:0.3s;transition-duration:0.3s}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(3) {-webkit-transform:translate(0,-66px);-moz-transform:translate(0,-66px);-ms-transform:translate(0,-66px);-o-transform:translate(0,-66px);transform:translate(0,-66px);-webkit-transition-duration:0.3s;transition-duration:0.3s}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(4) {-webkit-transform:translate(0,-35px);-moz-transform:translate(0,-35px);-ms-transform:translate(0,-35px);-o-transform:translate(0,-35px);transform:translate(0,-35px);-webkit-transition-duration:0.2s;transition-duration:0.2s}
.ol-after .profile .plus:checked + .toggle + .links a:before {opacity:1;-webkit-transform:translate(-5px,0);-moz-transform:translate(-5px,0);-ms-transform:translate(-5px,0);-o-transform:translate(-5px,0);transform:translate(-5px,0)}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(1):before {-webkit-transition-duration:0.95s;transition-duration:0.95s}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(2):before {-webkit-transition-duration:0.85s;transition-duration:0.85s}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(3):before {-webkit-transition-duration:0.75s;transition-duration:0.75s}
.ol-after .profile .plus:checked + .toggle + .links a:nth-child(4):before {-webkit-transition-duration:0.65s;transition-duration:0.65s}
.ol-after .scroll-tabs {position:relative;overflow:hidden;height:40px;margin-top:25px}
.ol-after .scroll-tabs .scroll_tabs_container {border-radius:0 !important;border:1px solid #e5e5e5}
.ol-after .scroll-tabs .scroll_tabs_container div.scroll_tab_inner span {background:#fff}
.ol-after .scroll-tabs .scroll_tabs_container .scroll_tab_left_button {background-color:#fff}
.ol-after .scroll-tabs .scroll_tabs_container .scroll_tab_right_button {background-color:#fff}
.ol-after .scroll-tabs .scroll_tabs_container .scroll_tab_left_button_disabled {background-color:#fff}
.ol-after .scroll-tabs .scroll_tabs_container .btn-e-xs {padding:2px 7px;line-height:1}
.ol-after .scroll-tabs #tab-member-nav a {display:none}
.ol-after .member-info-wrap {position:relative}
.ol-after .member-info-wrap.community-no {margin-top:25px}
.ol-after .member-info-wrap .member-info {position:relative;border:1px solid #e5e5e5;border-top:0;background:#fff;padding:20px 10px;font-size:12px}
.ol-after .member-info-wrap.community-no .member-info {border:1px solid #e5e5e5}
.ol-after .member-info-btn {position:relative}
.ol-after .member-info-btn .info-btn {display:inline-block;width:45px;height:45px;padding:6px 0;background:#656565;color:#fff;text-align:center;-webkit-transition:all 0.2s ease;-moz-transition:all 0.2s ease;transition:all 0.2s ease}
.ol-after .member-info-btn .info-btn:hover {opacity:0.8}
.ol-after .member-info-btn .info-btn i {font-size:13px;line-height:1.4}
.ol-after .member-info-btn .info-btn span {display:block;line-height:1;font-size:11px}
.ol-after .member-info-btn .info-btn strong {font-weight:normal;font-size:10px}
.ol-after .member-info-btn .info-btn.others-btn {padding:0;line-height:45px;font-size:10px;background:#a5a5a5}
.ol-after .member-info-btn .info-btn .alarm-marker .alarm-point {left:inherit;top:-4px;right:3px}
.ol-after .member-info-btn .info-btn .alarm-marker .alarm-effect {left:inherit;top:-14px;right:-7px}
.ol-after .member-point {margin-bottom:5px}
.ol-after .member-follow {border-top:1px dotted #e5e5e5;padding-top:10px;margin-top:15px}
.ol-after .member-follow p {padding:3px 0;font-size:12px}
.ol-after .member-follow span.badge {padding:3px 10px;min-width:80px;text-align:right}
.ol-after .member-btn {border-bottom:1px solid #eee;margin-bottom:10px;padding-bottom:10px}
.ol-after .member-btn a {margin-top:2px;margin-bottom:2px;width:23%;text-align:center}
.ol-after .member-btn span {width:4px}
</style>

<div class="ol-after clearfix">
    <div class="profile">
        <div class="cover"></div>
        <div class="photo">
            <a href="#" class="member-img" data-toggle="modal" data-target=".profile-modal"><?php if ( $profile_photo ) { echo $profile_photo; } else {?><span class="ol-user-icon"><i class="fas fa-user"></i></span><?php } ?></a>
        </div>
        <div class="info">
            <div class="name">
                <?php echo $nick; ?>
                <?php if ($eyoom_level['gnu_icon']) { ?>
                <span class="level-icon"><img src="<?php echo $eyoom_level['gnu_icon']; ?>" align="absmiddle" alt="레벨"></span>
                <?php } ?>
                <?php if ($eyoom_level['eyoom_icon']) { ?>
                <span class="level-icon"><img src="<?php echo $eyoom_level['eyoom_icon']; ?>" align="absmiddle" alt="레벨"></span>
                <?php } ?>
            </div>
            <div class="position"><?php if ($is_admin || $is_auth) { ?>관리자 <?php echo $lvinfo['name']; ?><?php } ?></div>
        </div>
        <?php if (!defined('_SHOP_')) { ?>
        <input id="toggle" type="checkbox" class="plus"><label for="toggle" class="toggle"></label>
        <div class="links">
            <?php if ($eyoom['is_community_theme'] == 'y') { ?>
            <a href="<?php echo G5_URL; ?>/?<?php echo $member['mb_id']; ?>" data-title="마이홈"><i class="fas fa-home"></i></a>
            <?php } ?>
            <a href="#" data-toggle="modal" data-target=".profile-modal" data-title="프로필사진"><i class="fas fa-user-circle"></i></a>
            <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php" data-title="정보수정"><i class="fas fa-info"></i></a>
            <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="scrap_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/scrap.php" target="_blank"<?php } ?> data-title="스크랩"><i class="fas fa-clipboard"></i></a>
            <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="point_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank"<?php } ?> data-title="포인트내역"><i class="fas fa-history"></i></a>
        </div>
        <?php } ?>
    </div>

    <?php if ($eyoom['is_community_theme'] == 'y') { ?>
    <div class="scroll-tabs">
        <div id="tab-member-nav">
            <span><a href="<?php echo G5_URL; ?>/mypage/" class="btn-e btn-e-xs bg-dark lighter">마이페이지</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'timeline'); ?>" class="btn-e btn-e-xs btn-e-default">내타임라인</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'favorite'); ?>" class="btn-e btn-e-xs btn-e-default">관심게시판</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'followinggul'); ?>" class="btn-e btn-e-xs btn-e-default">팔로윙글</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'subscribe'); ?>" class="btn-e btn-e-xs btn-e-default">구독글</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'pinboard'); ?>" class="btn-e btn-e-xs btn-e-default">핀보드</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'goodpost'); ?>" class="btn-e btn-e-xs btn-e-default">추천/비추</a></span>
            <span><a href="<?php echo get_eyoom_pretty_url('mypage', 'starpost'); ?>" class="btn-e btn-e-xs btn-e-default">별점평가글</a></span>
            <span><a href="<?php echo G5_URL; ?>/mypage/activity.php" class="btn-e btn-e-xs btn-e-default">활동기록</a></span>
            <span><a href="<?php echo G5_URL; ?>/mypage/config.php" class="btn-e btn-e-xs btn-e-default">환경설정</a></span>
        </div>
    </div>
    <?php } ?>

    <div class="member-info-wrap">
        <div class="member-info">
            <div class="member-info-btn">
                <div class="widht-50 pull-left">
                    <?php if (!defined('_SHOP_')) { ?>
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="memo_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/memo.php" target="_blank"<?php } ?> class="info-btn">
                        <?php if ( $memo_not_read >= 1 ) { ?>
                        <div class="alarm-marker">
                            <span class="alarm-effect"></span>
                            <span class="alarm-point"></span>
                        </div>
                        <?php } ?>
                        <strong>쪽지</strong><span><?php echo $memo_not_read; ?></span>
                    </a>
                    <a href="<?php echo G5_URL; ?>/mypage/respond.php" class="info-btn">
                        <?php if ( $respond_not_read >= 1 ) { ?>
                        <div class="alarm-marker">
                            <span class="alarm-effect"></span>
                            <span class="alarm-point"></span>
                        </div>
                        <?php } ?>
                        <strong>내글반응</strong><span><?php echo $respond_not_read; ?></span>
                    </a>
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="scrap_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/scrap.php" target="_blank"<?php } ?> class="info-btn">
                        <?php if ( $mb_scrap_cnt >= 1 ) { ?>
                        <div class="alarm-marker">
                            <span class="alarm-effect"></span>
                            <span class="alarm-point"></span>
                        </div>
                        <?php } ?>
                        <strong>스크랩</strong><span><?php echo $mb_scrap_cnt; ?></span>
                    </a>
                    <?php } else { ?>
                    <a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php" class="info-btn others-btn bg-dark">정보수정</a>
                    <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="point_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank"<?php } ?> class="info-btn others-btn bg-dark">포인트</a>
                    <?php } ?>
                </div>
                <div class="widht-50 pull-right">
                    <?php if ($is_admin == 'super' || $is_auth) { ?>
                    <a href="<?php echo G5_ADMIN_URL; ?>" class="info-btn others-btn">관리자</a>
                    <?php } ?>
                    <a href="<?php echo G5_BBS_URL; ?>/logout.php" class="info-btn others-btn">로그아웃</a>
                </div>
                <div class="clearfix"></div>
            </div>
            
            <?php if ($eyoom['is_community_theme'] == 'y') { ?>
            <div class="margin-bottom-20"></div>
            <div class="member-point">
                <div class="width-50 pull-left">
                    <p class="margin-bottom-0"><?php echo $levelset['gnu_name']; ?> - <a <?php if ( !G5_IS_MOBILE ) { ?>href="javascript:void(0);" onclick="point_modal();"<?php } else { ?>href="<?php echo G5_BBS_URL; ?>/point.php" target="_blank"<?php } ?>><u>내역보기</u></a></p>
                    <p class="color-red font-size-12"><?php echo $point; ?></p>
                </div>
                <?php if ($levelset['use_eyoom_level'] != 'n') { ?>
                <div class="widht-50 pull-right text-right">
                    <p class="margin-bottom-0"><?php echo $levelset['eyoom_name']; ?></p>
                    <p class="color-red font-size-12"><?php echo number_format($eyoomer['level_point']); ?></p>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
            </div>

            <?php if ($levelset['use_eyoom_level'] != 'n') { ?>
            <div class="member-statistics">
                <span class="progress-info-left">[레벨 <?php echo $eyoomer['level']; ?>] - 진행률</span>
                <span class="progress-info-right"><?php echo $lvinfo['ratio']; ?>%</span>
                <div class="progress progress-e progress-xxs progress-striped active margin-top-5">
                    <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="<?php echo $lvinfo['ratio']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $lvinfo['ratio']; ?>%">
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="member-follow">
                <p><span class="pull-left color-grey">• 맞팔친구</span><a href="<?php echo G5_URL; ?>/?<?php echo $member['mb_id']; ?>&friends"><span class="badge bg-dark lighter pull-right"><?php echo number_format($eyoomer['cnt_friends']); ?>명</span></a></p>
                <div class="clearfix"></div>
                <p><span class="pull-left color-grey">• 팔로워</span><a href="<?php echo G5_URL; ?>/?<?php echo $member['mb_id']; ?>&follower"><span class="badge badge-default pull-right"><?php echo number_format($eyoomer['cnt_follower']); ?>명</span></a></p>
                <div class="clearfix"></div>
                <p><span class="pull-left color-grey">• 팔로윙</span><a href="<?php echo G5_URL; ?>/?<?php echo $member['mb_id']; ?>&following"><span class="badge badge-default pull-right"><?php echo number_format($eyoomer['cnt_following']); ?>명</span></a></p>
                <div class="clearfix"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/scroll-tabs/jquery.mousewheel.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/scroll-tabs/jquery.scrolltabs.js"></script>
<script>
$(document).ready(function(){
    $('#tab-member-nav').scrollTabs({
        scroll_distance: 150
    });
});

$(window).load(function(){
    $('#tab-member-nav a').css("display", "inline-block");
});
</script>