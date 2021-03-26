<?php
/**
 * Eyoom Admin Skin File
 * @file    ~/theme/basic/skin/member/level_config.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;
?>

<style>
.admin-level-config .min-width-80px {min-width:80px !important}
</style>

<div class="admin-level-config">
    <form name="flevelconfigform" method="post" action="<?php echo $action_url1; ?>" class="eyoom-form">
    <input type="hidden" name="token" value="">

    <div class="adm-headline">
        <h3>이윰레벨 환경설정</h3>
    </div>

    <div class="level-config">
        <div class="adm-form-wrap margin-bottom-30">
            <header>
                <strong><i class="fas fa-caret-right"></i> 기본 설정</strong>
            </header>

            <fieldset>
                <div class="row">
                    <div class="col col-6">
                        <section>
                            <label class="label">이윰레벨 사용</label>
                            <div class="inline-group">
                                <label for="levelset_use_eyoom_level1" class="radio"><input type="radio" name="levelset[use_eyoom_level]" id="levelset_use_eyoom_level1" value="y" <?php echo $levelset['use_eyoom_level'] == 'y' || !$levelset['use_eyoom_level'] ? 'checked':''; ?>><i></i> 사용</label>
                                <label for="levelset_use_eyoom_level2" class="radio"><input type="radio" name="levelset[use_eyoom_level]" id="levelset_use_eyoom_level2" value="n" <?php echo $levelset['use_eyoom_level'] == 'n' ? 'checked':''; ?>><i></i>사용 안함</label>
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-6">
                        <div class="row">
                            <div class="col col-6">
                                <section>
                                    <label for="levelset_gnu_name" class="label">그누 포인트 명칭</label>
                                    <label class="input">
                                        <input type="text" name="levelset[gnu_name]" id="levelset_gnu_name" value="<?php echo $levelset['gnu_name'] ? $levelset['gnu_name']:'포인트'; ?>">
                                    </label>
                                </section>
                            </div>
                        </div>
                        <div class="note margin-bottom-10"><strong>Note:</strong> 그누 포인트 명칭을 설정합니다. 포인트값 설정은 <a href="<?php echo G5_ADMIN_URL; ?>/?dir=config&amp;pid=config_form"><u>[환경설정 - 기본환경설정]</u></a>에서 설정해 주세요.</div>
                    </div>
                    <div class="col col-6">
                        <div class="row">
                            <div class="col col-6">
                                <section>
                                    <label for="levelset_eyoom_name" class="label">이윰레벨 포인트 명칭</label>
                                    <label class="input">
                                        <input type="text" name="levelset[eyoom_name]" id="levelset_eyoom_name" value="<?php echo $levelset['eyoom_name'] ? $levelset['eyoom_name']:'경험치'; ?>">
                                    </label>
                                </section>
                            </div>
                        </div>
                        <div class="note margin-bottom-10"><strong>Note:</strong> 이윰 레벨을 결정하는 포인트의 명칭을 설정합니다.</div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="adm-headline">
        <h3>이윰레벨 포인트 설정</h3>
    </div>

    <div class="level-config">
        <div class="adm-form-wrap margin-bottom-30">
            <header>
                <strong><i class="fas fa-caret-right"></i> 이윰레벨 포인트설정 [커뮤니티 활동]</strong>
            </header>

            <fieldset>
                <div class="cont-text-bg">
                    <p class="bg-warning font-size-12 margin-bottom-0">
                        <i class="fas fa-info-circle"></i> 이윰레벨 포인트는 사이트의 활동에 따른 경험치로서 이윰레벨를 결정하는 기준 점수입니다.
                    </p>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_login" class="label">로그인 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[login]" id="levelset_login" value="<?php echo $levelset['login'] ? $levelset['login']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_write" class="label">글쓰기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[write]" id="levelset_write" value="<?php echo $levelset['write'] ? $levelset['write']:'10'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_reply" class="label">답글쓰기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[reply]" id="levelset_reply" value="<?php echo $levelset['reply'] ? $levelset['reply']:'10'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_read" class="label">글읽기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[read]" id="levelset_read" value="<?php echo $levelset['read'] ? $levelset['read']:'1'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_cmt" class="label">댓글쓰기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[cmt]" id="levelset_cmt" value="<?php echo $levelset['cmt'] ? $levelset['cmt']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_memo" class="label">쪽지쓰기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[memo]" id="levelset_memo" value="<?php echo $levelset['memo'] ? $levelset['memo']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_rememo" class="label">쪽지받기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[rememo]" id="levelset_rememo" value="<?php echo $levelset['rememo'] ? $levelset['rememo']:'1'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_scrap" class="label">스크랩하기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[scrap]" id="levelset_scrap" value="<?php echo $levelset['scrap'] ? $levelset['scrap']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_good" class="label">추천하기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[good]" id="levelset_good" value="<?php echo $levelset['good'] ? $levelset['good']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_regood" class="label">추천받기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[regood]" id="levelset_regood" value="<?php echo $levelset['regood'] ? $levelset['regood']:'1'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_nogood" class="label">비추천하기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[nogood]" id="levelset_nogood" value="<?php echo $levelset['nogood'] ? $levelset['nogood']:'3'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_renogood" class="label">비추천받기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[renogood]" id="levelset_renogood" value="<?php echo $levelset['renogood'] ? $levelset['renogood']:'1'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_following" class="label">팔로우하기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[following]" id="levelset_following" value="<?php echo $levelset['following'] ? $levelset['following']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_follower" class="label">팔로우받기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[follower]" id="levelset_follower" value="<?php echo $levelset['follower'] ? $levelset['follower']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_banner" class="label">배너/광고클릭 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[banner]" id="levelset_banner" value="<?php echo $levelset['banner'] ? $levelset['banner']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_qa" class="label">1:1문의하기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[qa]" id="levelset_qa" value="<?php echo $levelset['qa'] ? $levelset['qa']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_star" class="label">별점주기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[star]" id="levelset_star" value="<?php echo $levelset['star'] ? $levelset['star']:'2'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_restar" class="label">별점받기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[restar]" id="levelset_restar" value="<?php echo $levelset['restar'] ? $levelset['restar']:'1'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_tag" class="label">태그작성 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[tag]" id="levelset_tag" value="<?php echo $levelset['tag'] ? $levelset['tag']:'5'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_poll" class="label">설문참여 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[poll]" id="levelset_poll" value="<?php echo $levelset['poll'] ? $levelset['poll']:'10'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="level-config">
        <div class="adm-form-wrap margin-bottom-30">
            <header>
                <strong><i class="fas fa-caret-right"></i> 이윰레벨 포인트설정 [쇼핑몰 활동]</strong>
            </header>

            <fieldset>
                <div class="cont-text-bg">
                    <p class="bg-warning font-size-12 margin-bottom-0">
                        <i class="fas fa-info-circle"></i> 쇼핑몰 활동에 따른 이윰레벨 포인트를 설정합니다.
                    </p>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_goodsview" class="label">상품보기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[goodsview]" id="levelset_goodsview" value="<?php echo $levelset['goodsview'] ? $levelset['goodsview']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_cart" class="label">장바구니담기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[cart]" id="levelset_cart" value="<?php echo $levelset['cart'] ? $levelset['cart']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_wishlist" class="label">위시리스트 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[wishlist]" id="levelset_wishlist" value="<?php echo $levelset['wishlist'] ? $levelset['wishlist']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_recommend" class="label">상품추천 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[recommend]" id="levelset_recommend" value="<?php echo $levelset['recommend'] ? $levelset['recommend']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="levelset_review" class="label">상품후기 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[review]" id="levelset_review" value="<?php echo $levelset['review'] ? $levelset['review']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_goodsqa" class="label">상품문의 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[goodsqa]" id="levelset_goodsqa" value="<?php echo $levelset['goodsqa'] ? $levelset['goodsqa']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_order" class="label">주문완료 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[order]" id="levelset_order" value="<?php echo $levelset['order'] ? $levelset['order']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="levelset_ordcancel" class="label">주문취소 <?php echo $levelset['eyoom_name']; ?></label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="levelset[ordcancel]" id="levelset_ordcancel" value="<?php echo $levelset['ordcancel'] ? $levelset['ordcancel']:'20'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    <div class="adm-headline">
        <h3>이윰레벨표 구성</h3>
    </div>

    <div class="level-config">
        <div class="adm-form-wrap margin-bottom-30">
            <header>
                <strong><i class="fas fa-caret-right"></i> 이윰레벨 규칙</strong>
            </header>

            <fieldset>
                <div class="cont-text-bg">
                    <p class="bg-warning font-size-12 margin-bottom-0">
                        <i class="fas fa-info-circle"></i> 전체적인 이윰레벨 설정을 변경하기 위해서는 이윰레벨 규칙을 변경하고, 계산하기를 실행한 후, [확인]버튼을 클릭해야만 정상적으로 적용이 됩니다.
                    </p>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col col-3">
                        <section>
                            <label for="max_use_gnu_level" class="label">이윰레벨로 활용 할 그누레벨</label>
                            <label class="select">
                                <?php echo get_member_level_select('max_use_gnu_level', 1, 9, $mgl); ?><i></i>
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section class="label-height">
                            <p class="note">설정된 그누레벨까지 이윰레벨로 활용</p>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="calc_level_point" class="label">기준포인트</label>
                            <label class="input">
                                <i class="icon-append">점</i>
                                <input type="text" name="calc_level_point" id="calc_level_point" value="<?php echo $levelset['calc_level_point'] ? $clp:'100'; ?>">
                            </label>
                        </section>
                    </div>
                    <div class="col col-3">
                        <section>
                            <label for="calc_level_ratio" class="label">포인트 증가비율</label>
                            <label class="input">
                                <i class="icon-append">%</i>
                                <input type="text" name="calc_level_ratio" id="calc_level_ratio" value="<?php echo $levelset['calc_level_ratio'] ? $clr:'200'; ?>">
                            </label>
                        </section>
                    </div>
                </div>
                <div class="margin-bottom-15"></div>

                <?php if (G5_IS_MOBILE) { ?>
                <p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! 좌우스크롤 가능 (<i class="fas fa-arrows-alt-h"></i>)</p>
                <?php } ?>

                <div class="table-list-eb">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>그누레벨</th>
                                    <th>2레벨</th>
                                    <th>3레벨</th>
                                    <th>4레벨</th>
                                    <th>5레벨</th>
                                    <th>6레벨</th>
                                    <th>7레벨</th>
                                    <th>8레벨</th>
                                    <th>9레벨</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="white-space:nowrap">구간별 이윰레벨 갯수</th>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_2" id="cnt_gnu_level_2" value="<?php echo $cgl[2] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_3" id="cnt_gnu_level_3" value="<?php echo $cgl[3] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_4" id="cnt_gnu_level_4" value="<?php echo $cgl[4] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_5" id="cnt_gnu_level_5" value="<?php echo $cgl[5] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_6" id="cnt_gnu_level_6" value="<?php echo $cgl[6] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_7" id="cnt_gnu_level_7" value="<?php echo $cgl[7] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_8" id="cnt_gnu_level_8" value="<?php echo $cgl[8] ?>" class="text-right min-width-80px"></label></td>
                                    <td><label class="input"><i class="icon-append">개</i><input type="text" name="cnt_gnu_level_9" id="cnt_gnu_level_9" value="<?php echo $cgl[9] ?>" class="text-right min-width-80px"></label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="text-center margin-top-10 margin-bottom-10">
                    <a href="javascript:;" onclick="calc_eyoom_level();" class="btn-e btn-e-lg btn-e-green">계산하기</a>
                </div>
            </fieldset>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    <div class="adm-headline">
        <h3>그누레벨 vs 이윰레벨 <?php echo $levelset['eyoom_name']; ?>설정표</h3>
    </div>

    <div class="level-config">
        <div class="adm-form-wrap margin-bottom-30">
            <header>
                <strong><i class="fas fa-caret-right"></i> 이윰레벨 규칙</strong>
            </header>

            <fieldset>
                <div class="margin-bottom-15"></div>
                <?php if (G5_IS_MOBILE) { ?>
                <p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! 좌우스크롤 가능 (<i class="fas fa-arrows-alt-h"></i>)</p>
                <?php } ?>

                <div class="table-list-eb">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>그누레벨</th>
                                    <th>그누레벨 별칭</th>
                                    <th>이윰레벨</th>
                                    <th>이윰레벨 별칭</th>
                                    <th>최소 포인트</th>
                                    <th>최대 포인트</th>
                                    <th>레벨업 포인트</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($level_table as $key => $table) {?>
                                <tr>
                                    <?php if ($table['rowspan']) { ?>
                                    <td rowspan="<?php echo $table['rowspan']; ?>"><?php echo $table['gnu_level']; ?>레벨</td>
                                    <td rowspan="<?php echo $table['rowspan']; ?>">
                                        <label for="levelset_gnu_alias_<?php echo $table['gnu_level']; ?>" class="input">
                                            <input type="text" name="levelset[gnu_alias_<?php echo $table['gnu_level']; ?>]" id="levelset_gnu_alias_<?php echo $table['gnu_level']; ?>" value="<?php echo $table['gnu_alias']; ?>">
                                        </label>
                                    </td>
                                    <?php } ?>
                                    <td>Level <?php echo $table['eyoom_level']; ?></td>
                                    <td>
                                        <label for="levelinfo_<?php echo $table['eyoom_level']; ?>_name" class="input">
                                            <input type="text" name="levelinfo[<?php echo $table['eyoom_level']; ?>][name]" id="levelinfo_<?php echo $table['eyoom_level']; ?>_name" value="<?php echo $table['eyoom_level_name']; ?>">
                                        </label>
                                    </td>
                                    <td class="text-right"><?php echo number_format($table['min']); ?><input type="hidden" name="levelinfo[<?php echo $table['eyoom_level']; ?>][min]" value="<?php echo $table['min']; ?>"></td>
                                    <td class="text-right"><?php echo number_format($table['max']); ?><input type="hidden" name="levelinfo[<?php echo $table['eyoom_level']; ?>][max]" value="<?php echo $table['max']; ?>"></td>
                                    <td class="text-right"><?php echo number_format($table['gap']); ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <?php echo $frm_submit; ?>

    </form>
</div>

<script>
function calc_eyoom_level() {
    var level = parseInt($("#max_use_gnu_level > option:selected").val());
    for(var i=2;i<=level;i++) {
        if(check_cnt_gnu_level(i)==false) {break; return false;}
    }
    if($("#calc_level_point").val() == '') {
        alert("기준포인트를 입력해 주세요.");
        $("#calc_level_point").focus();
        return false;
    }
    if($("#calc_level_ratio").val() == '') {
        alert("포인트 증가비율을 입력해 주세요.");
        $("#calc_level_ratio").focus();
        return false;
    }
    var form = document.flevelconfigform;
    form.action = '<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=level_config#calc';
    form.submit();
}

function check_cnt_gnu_level(num) {
    if($("#cnt_gnu_level_"+num).val() == '') {
        alert("그누 "+num+"레벨 구간에 이윰레벨의 갯수를 설정해 주세요.");
        $("#cnt_gnu_level_"+num).focus();
        return false;
    }
}
</script>