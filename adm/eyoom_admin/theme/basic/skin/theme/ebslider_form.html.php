<?php
/**
 * Eyoom Admin Skin File
 * @file	~/theme/basic/skin/theme/ebslider_form.html.php
 */
if (!defined('_EYOOM_IS_ADMIN_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/jsgrid/jsgrid-theme.min.css" type="text/css" media="screen">',0);
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_ADMIN_THEME_URL.'/plugins/magnific-popup/magnific-popup.min.css" type="text/css" media="screen">',0);
?>

<style>
.eb-clipboard-box {position:relative;overflow:hidden;border:1px solid #4052B5;background:#f7f8ff;text-align:center}
.eb-clipboard-box-cont {height:26px;line-height:26px;padding:0 10px}
.eb-clipboard-box-btn {height:26px;line-height:26px;cursor:pointer;color:#fff;background:#5C6BBF}
.eb-clipboard-box-btn:hover {background:#4052B5}
.admin-ebslider-form .ebslider-image {max-width:300px;background:#fafafa}
</style>

<div class="admin-ebslider-form">
	<div class="adm-headline">
		<h3>EB슬라이더 마스터 관리</h3>
	</div>

	<?php include_once(EYOOM_ADMIN_THEME_PATH . '/skin/theme/theme_head.html.php'); ?>

	<form name="febsliderform" method="post" action="<?php echo $action_url1; ?>" onsubmit="return febsliderform_submit(this);" enctype="multipart/form-data" class="eyoom-form">
	<input type="hidden" name="w" value="<?php echo $w; ?>">
	<input type="hidden" name="theme" id="theme" value="<?php echo $this_theme ? $this_theme: $theme; ?>">
	<input type="hidden" name="es_no" id="es_no" value="<?php echo $es['es_no']; ?>">
	<input type="hidden" name="page" value="<?php echo $page; ?>">
	<input type="hidden" name="wmode" value="<?php echo $wmode; ?>">
	<input type="hidden" name="token" value="">

	<div class="adm-table-form-wrap margin-bottom-30">
		<header><strong><i class="fas fa-caret-right"></i> EB슬라이더 마스터 설정정보</strong></header>

		<div class="table-list-eb">
			<?php if (!G5_IS_MOBILE) { ?>
			<div class="table-responsive">
			<?php } ?>
			<table class="table">
				<tbody>
					<tr>
						<th class="table-form-th">
							<label class="label">코드</label>
						</th>
						<td colspan="3">
							<label for="es_code" class="input form-width-250px">
						        <input type="text" name="es_code" id="es_code" value="<?php echo $es['es_code'] ? $es['es_code']: time(); ?>" readonly required>
							</label>
							<div class="note"><strong>Note:</strong> 자동생성되며, 수정하실 수 없습니다.</div>
						</td>
					</tr>
					<tr>
						<th class="table-form-th">
							<label class="label">치환코드</label>
						</th>
						<td>
							<div class="eb-clipboard-box">
								<div id="substitution_code" class="eb-clipboard-box-cont"><strong>&lt;?php echo eb_slider('<?php echo $es['es_code'] ? $es['es_code']: time(); ?>'); ?&gt;</strong></div>
								<div class="eb-clipboard-box-btn" data-clipboard-target="#substitution_code">치환코드복사</div>
							</div>
							<div class="note"><strong>Note:</strong> 치환코드를 복사하여 출력하고자 하는 위치에 붙여넣기 하세요.</div>
						</td>
					<?php if (G5_IS_MOBILE) { ?>
					</tr>
					<tr>
					<?php } ?>
						<th class="table-form-th border-left-th">
							<label class="label">출력여부</label>
						</th>
						<td>
							<div class="inline-group">
								<label for="es_state_1" class="radio"><input type="radio" name="es_state" id="es_state_1" value="1" <?php echo $es['es_state'] == '1' || !$es['es_state'] ? 'checked':''; ?>><i></i> 보이기</label>
								<label for="es_state_2" class="radio"><input type="radio" name="es_state" id="es_state_2" value="2" <?php echo $es['es_state'] == '2' ? 'checked':''; ?>><i></i> 숨기기</label>
							</div>
							<div class="note"><strong>Note:</strong> 출력여부를 결정합니다.</div>
						</td>
					</tr>
					<tr>
						<th class="table-form-th">
							<label class="label">슬라이더마스터 제목</label>
						</th>
						<td>
							<label for="es_subject" class="input">
						        <input type="text" name="es_subject" id="es_subject" value="<?php echo get_text($es['es_subject']); ?>" required>
							</label>
							<div class="note"><strong>Note:</strong> 예) 메인 슬라이더, 메인 제품소개 슬라이더...</div>
						</td>
					<?php if (G5_IS_MOBILE) { ?>
					</tr>
					<tr>
					<?php } ?>
						<th class="table-form-th border-left-th">
							<label class="label">슬라이더마스터 스킨</label>
						</th>
						<td>
							<label for="es_skin" class="select form-width-250px">
						        <select name="es_skin" id="es_skin">
							    	<option value="">::선택::</option>
							    	<?php foreach ($ebslider_skins as $eb_skin) { ?>
							    	<option value="<?php echo $eb_skin; ?>" <?php echo get_selected($es['es_skin'], $eb_skin); ?>><?php echo $eb_skin; ?></option>
							    	<?php } ?>
						        </select><i></i>
							</label>
							<div class="note"><strong>Note:</strong> EB슬라이더 마스터에 적용할 스킨을 선택해 주세요.</div>
						</td>
					</tr>
                    <tr>
                        <th class="table-form-th">
                            <label class="label">슬라이더마스터 설명글</label>
                        </th>
                        <td colspan="3">
                            <label for="es_text" class="textarea">
                                <textarea name="es_text" id="es_text" style="height:80px;"><?php echo $es['es_text']; ?></textarea>
                            </label>
                        </td>
                    </tr>
					<tr>
						<th class="table-form-th">
							<label class="label">동영상 플레이 방식</label>
						</th>
						<td>
							<div class="inline-group">
								<label for="es_ytplay_1" class="radio"><input type="radio" name="es_ytplay" id="es_ytplay_1" value="1" <?php echo $es['es_ytplay'] == '1' || !$es['es_ytplay'] ? 'checked':''; ?>><i></i> 순차적으로 플레이</label>
								<label for="es_ytplay_2" class="radio"><input type="radio" name="es_ytplay" id="es_ytplay_2" value="2" <?php echo $es['es_ytplay'] == '2' ? 'checked':''; ?>><i></i> 랜덤하게 플레이</label>
							</div>
							<div class="note"><strong>Note:</strong> 유튜브동영상 아이템을 여러개 등록하였을 경우, 플레이 방식을 선택합니다.<br>유튜브동영상을 지원하는 EB슬라이더 스킨에서만 작동합니다.</div>
						</td>
					<?php if (G5_IS_MOBILE) { ?>
					</tr>
					<tr>
					<?php } ?>
						<th class="table-form-th border-left-th">
							<label class="label">동영상 모바일 자동플레이</label>
						</th>
						<td>
							<div class="inline-group">
								<label for="es_ytmauto_1" class="radio"><input type="radio" name="es_ytmauto" id="es_ytmauto_1" value="1" <?php echo $es['es_ytmauto'] == '1' ? 'checked':''; ?>><i></i> 자동실행</label>
								<label for="es_ytmauto_2" class="radio"><input type="radio" name="es_ytmauto" id="es_ytmauto_2" value="2" <?php echo $es['es_ytmauto'] == '2' || !$es['es_ytmauto'] ? 'checked':''; ?>><i></i> 멈춤</label>
							</div>
							<div class="note"><strong>Note:</strong> 모바일에서 페이지 로딩 후, 동영상을 바로 플레이 시킬지 멈춘 상태로 있을지 결정합니다.<br>유튜브동영상을 지원하는 EB슬라이더 스킨에서만 작동합니다.</div>
						</td>
					</tr>
					<tr>
						<th class="table-form-th">
							<label class="label">EB슬라이더 아이템 링크수</label>
						</th>
						<td>
							<label for="es_link_cnt" class="input form-width-250px">
								<i class="icon-append">개</i>
						        <input type="text" name="es_link_cnt" id="es_link_cnt" value="<?php echo $es['es_link_cnt'] ? $es['es_link_cnt']: 1; ?>" required maxlength="2">
							</label>
						</td>
					<?php if (G5_IS_MOBILE) { ?>
					</tr>
					<tr>
					<?php } ?>
						<th class="table-form-th border-left-th">
							<label class="label">EB슬라이더 아이템 이미지수</label>
						</th>
						<td>
							<label for="es_image_cnt" class="input form-width-250px">
								<i class="icon-append">개</i>
						        <input type="text" name="es_image_cnt" id="es_image_cnt" value="<?php echo $es['es_image_cnt'] ? $es['es_image_cnt']: 1; ?>" required maxlength="2">
							</label>
						</td>
					</tr>
					<tr>
						<th class="table-form-th">
							<label class="label">대표 연결주소 [링크]</label>
						</th>
						<td colspan="3">
							<div class="inline-group">
								<span>
									<label for="es_link" class="input form-width-350px">
										<i class="icon-prepend fas fa-link"></i>
								        <input type="text" name="es_link" id="es_link" value="<?php echo $es['es_link']; ?>">
									</label>
								</span>
								<span>
									<label for="es_target" class="select form-width-150px">
								        <select name="es_target" id="es_target">
									        <option value="">타겟을 선택하세요.</option>
									        <option value="_blank" <?php echo $es['es_target'] == '_blank' ? 'selected':''; ?>>새창</option>
											<option value="_self" <?php echo $es['es_target'] == '_self' || !$es['es_target'] ? 'selected':''; ?>>현재창</option>
								        </select><i></i>
									</label>
								</span>
							</div>
							<div class="note"><strong>Note:</strong> EB슬라이더 마스터에서 사용할 링크주소를 입력해 주세요. 예) <?php echo G5_URL; ?></div>
						</td>
					</tr>
					<tr>
						<th class="table-form-th">
							<label class="label">EB슬라이더 마스터 이미지</label>
						</th>
						<td colspan="3">
							<span class="input input-file form-width-350px">
								<div class="button"><input type="file" name="es_image" id="es_image" onchange="this.parentNode.nextSibling.value = this.value">이미지파일 찾기</div><input type="text" readonly="">
							</span>
							<?php if ($es['es_image']) { ?>
							<div class="es_img_info">
								<label for="es_image_del" class="checkbox"><input type="checkbox" id="es_image_del" name="es_image_del" value="1"><i></i><?php echo $es['es_image']; ?> 파일삭제</label>
								<input type="hidden" name="del_image_name" value="<?php echo $es['es_image']; ?>">
								<div class="thumbnail ebslider-image">
									<div class="thumb">
										<img src="<?php echo $es['es_img_url']; ?>">
										<div class="caption-overflow">
											<span>
												<a href="<?php echo $es['es_img_url']; ?>" class="btn-e btn-e-default btn-e-lg btn-e-brd"><i class="fas fa-plus color-white"></i></a>
											</span>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="note"><strong>Note:</strong> EB슬라이더 마스터의 이미지를 업로드해 주세요.</div>
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

	<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/clipboard/clipboard.min.js"></script>
	<script>
	function febsliderform_submit(f) {
		if (f.es_code.value == '') {
			alert("코드는 자동생성되며 빈값을 입력하실 수 없습니다.");
			document.location.reload();
			return false;
		}
		if (f.es_subject.value.length < 2) {
			alert("슬라이더 마스터의 제목을 2자이상으로 입력해 주세요.");
			f.es_subject.focus();
			return false;
		}
		if (!f.es_skin.value) {
			alert("슬라이더 마스터의 스킨을 선택해 주세요.");
			f.es_skin.focus();
			return false;
		}
	    return true;
	}

	new Clipboard('.eb-clipboard-box-btn');
	</script>

	<div class="admin-ebslider-itemlist">
		<form name="febslideritemlist" id="febslideritemlist" action="<?php echo $action_url3; ?>" method="post" onsubmit="return febslideritemlist_submit(this);" class="eyoom-form">
		<input type="hidden" name="theme" id="theme" value="<?php echo $this_theme; ?>">
		<input type="hidden" name="es_code" id="es_code" value="<?php echo $es['es_code']; ?>">
		<input type="hidden" name="page" value="<?php echo $page; ?>">
		<input type="hidden" name="wmode" value="<?php echo $wmode; ?>">
		<input type="hidden" name="token" value="<?php echo $token; ?>">

		<div class="adm-headline adm-headline-btn">
			<h3>EB 슬라이더 - 아이템 관리</h3>
			<?php if (!$wmode) { ?>
			<a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=ebslider_itemform&amp;es_code=<?php echo $es['es_code']; ?>&amp;thema=<?php echo $this_theme; ?>&amp;wmode=1" onclick="eb_modal(this.href, 'EB슬라이더 아이템'); return false;" class="btn-e btn-e-red btn-e-lg"><i class="fas fa-plus"></i> EB슬라이더 아이템 추가</a>
			<div class="clearfix"></div>
			<?php } ?>
		</div>

		<?php if (G5_IS_MOBILE) { ?>
		<p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! 좌우스크롤 가능 (<i class="fas fa-arrows-alt-h"></i>)</p>
		<?php } ?>

		<div id="ebslider-itemlist"></div>

		<div class="margin-top-20">
		    <input type="submit" name="act_button" value="선택수정" class="btn-e btn-e-xs btn-e-red" onclick="document.pressed=this.value">
		    <?php if ($is_admin == 'super') { ?>
		    <input type="submit" name="act_button" value="선택삭제" class="btn-e btn-e-xs btn-e-dark" onclick="document.pressed=this.value">
		    <?php } ?>
		</div>
		</form>
	</div>

	<div class="margin-bottom-40"></div>

	<?php if ($w == 'u' && $es_code) { ?>
	<div class="admin-ebslider-YTitemlist margin-top-40">
		<form name="febsliderytitemlist" id="febsliderytitemlist" action="<?php echo $action_url2; ?>" method="post" onsubmit="return febsliderytitemlist_submit(this);" class="eyoom-form">
		<input type="hidden" name="theme" id="theme" value="<?php echo $this_theme; ?>">
		<input type="hidden" name="es_code" id="es_code" value="<?php echo $es['es_code']; ?>">
		<input type="hidden" name="page" value="<?php echo $page; ?>">
		<input type="hidden" name="wmode" value="<?php echo $wmode; ?>">
		<input type="hidden" name="token" value="<?php echo $token; ?>">

		<div class="adm-headline adm-headline-btn">
			<h3>EB 슬라이더 - 동영상 아이템 관리</h3>
			<?php if (!$wmode) { ?>
			<a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=ebslider_ytitemform&amp;es_code=<?php echo $es['es_code']; ?>&amp;thema=<?php echo $this_theme; ?>&amp;wmode=1" onclick="eb_modal(this.href, '유튜브동영상 아이템'); return false;" class="btn-e btn-e-teal btn-e-lg"><i class="fas fa-plus"></i> 유튜브동영상 아이템 추가</a>
			<div class="clearfix"></div>
			<?php } ?>
		</div>

		<div class="alert alert-danger">
		    <p class="font-size-12 margin-bottom-0"><i class="fas fa-exclamation-circle"></i> 유튜브동영상을 지원하는 EB슬라이더 스킨에서만 작동합니다.</p>
		</div>
		<div class="margin-bottom-20"></div>

		<?php if (G5_IS_MOBILE) { ?>
		<p class="font-size-11 color-grey text-right margin-bottom-5"><i class="fas fa-info-circle"></i> Note! 좌우스크롤 가능 (<i class="fas fa-arrows-alt-h"></i>)</p>
		<?php } ?>

		<div id="ebslider-ytitemlist"></div>

		<div class="margin-top-20">
		    <input type="submit" name="act_button" value="선택수정" class="btn-e btn-e-xs btn-e-red" onclick="document.pressed=this.value">
		    <?php if ($is_admin == 'super') { ?>
		    <input type="submit" name="act_button" value="선택삭제" class="btn-e btn-e-xs btn-e-dark" onclick="document.pressed=this.value">
		    <?php } ?>
		</div>
		</form>
	</div>
</div>

<div class="modal fade admin-iframe-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"></h4>
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

<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/jsgrid/jsgrid.min.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/js/jsgrid.js"></script>
<script src="<?php echo EYOOM_ADMIN_THEME_URL; ?>/plugins/magnific-popup/magnific-popup.min.js"></script>
<script>
<?php if (!(G5_IS_MOBILE || $wmode)) { ?>
function eb_modal(href, title) {
    $('.admin-iframe-modal').modal('show').on('hidden.bs.modal', function () {
        $("#modal-iframe").attr("src", "");
        $(".modal-title").text("");
        $('html').css({overflow: ''});
    });
    $('.admin-iframe-modal').modal('show').on('shown.bs.modal', function () {
        $("#modal-iframe").attr("src", href);
        $('#modal-iframe').height(parseInt($(window).height() * 0.85));
        $(".modal-title").text(title);
        $('html').css({overflow: 'hidden'});
    });
    return false;
}

window.closeModal = function(){
    $('.admin-iframe-modal').modal('hide');
};
<?php } ?>

!function () {
	// EB슬라이더 이미지 아이템
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
                return !(filter.체크 && !(client.체크.indexOf(filter.체크) > -1)  )
            })
        },
        updateItem: function (updatingClient) {}
    };
    window.db    = db,
    db.clients   = [
	    <?php for ($i=0; $i<count((array)$list); $i++) { ?>
        {
	        체크: "<label for='chk_<?php echo $i; ?>' class='checkbox'><input type='checkbox' name='chk[]' id='chk_<?php echo $i; ?>' value='<?php echo $i; ?>'><i></i></label><input type='hidden' name='ei_no[<?php echo $i; ?>]' value='<?php echo $list[$i]['ei_no']; ?>'>",
	        관리: "<a href='<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebslider_itemform&amp;thema=<?php echo $this_theme; ?>&amp;es_code=<?php echo $list[$i]['es_code']; ?>&amp;ei_no=<?php echo $list[$i]['ei_no']; ?>&amp;w=u&amp;iw=u&amp;page=<?php echo $page; ?>&amp;wmode=1' onclick='eb_modal(this.href,\"EB슬라이더 아이템관리\"); return false;'><u>수정</u></a>",
	        이미지: "<?php echo $list[$i]['ei_image']; ?>",
	        대표타이틀: "<?php echo $list[$i]['ei_title'] ? get_text($list[$i]['ei_title']):'없음'; ?>",
	        순서: "<label for='ei_sort_<?php echo $list[$i]['index']; ?>' class='input'><input type='text' name='ei_sort[<?php echo $i; ?>]' id='ei_sort_<?php echo $i; ?>' value='<?php echo $list[$i]['ei_sort']; ?>'></label>",
	        상태: "<label for='ei_state_<?php echo $i; ?>' class='select'><select name='ei_state[<?php echo $i; ?>]' id='ei_state_<?php echo $i; ?>'><option value=''>선택</option><option value='1' <?php echo $list[$i]['ei_state'] == '1' ? 'selected':''; ?>>보이기</option><option value='2' <?php echo $list[$i]['ei_state'] == '2' ? 'selected': ''; ?>>숨기기</option></select><i></i></label>",
	        보기권한: "<label class='select'><?php echo $list[$i]['view_level']; ?><i></i></label>",
	        시작일: "<?php echo $list[$i]['ei_start'] ? date('Y-m-d',strtotime($list[$i]['ei_start'])):''; ?>",
	        종료일: "<?php echo $list[$i]['ei_end'] ? date('Y-m-d',strtotime($list[$i]['ei_end'])):''; ?>",
	        등록일: "<?php echo substr($list[$i]['ei_regdt'], 0, 10); ?>",
        },
        <?php } ?>
    ];

    // EB슬라이더 유튜브 동영상 아이템
    var ytdb = {
        deleteItem: function (deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1)
        },
        insertItem: function (insertingClient) {
            this.clients.push(insertingClient)
        },
        loadData  : function (filter) {
            return $.grep(this.clients, function (client) {
                return !(filter.체크 && !(client.체크.indexOf(filter.체크) > -1)  )
            })
        },
        updateItem: function (updatingClient) {}
    };
    window.ytdb    = ytdb,
    ytdb.clients   = [
	    <?php for ($i=0; $i<count((array)$yt_list); $i++) { ?>
        {
	        체크: "<label for='ytchk_<?php echo $i; ?>' class='checkbox'><input type='checkbox' name='ytchk[]' id='ytchk_<?php echo $i; ?>' value='<?php echo $i; ?>'><i></i></label><input type='hidden' name='ei_no[<?php echo $i; ?>]' value='<?php echo $yt_list[$i]['ei_no']; ?>'>",
	        관리: "<a href='<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebslider_ytitemform&amp;thema=<?php echo $this_theme; ?>&amp;es_code=<?php echo $yt_list[$i]['es_code']; ?>&amp;ei_no=<?php echo $yt_list[$i]['ei_no']; ?>&amp;w=u&amp;iw=u&amp;page=<?php echo $page; ?>&amp;wmode=1' onclick='eb_modal(this.href,\"유튜브동영상 설정관리\"); return false;'><u>수정</u></a>",
	        유튜브동영상_URL: "<a href='https://youtu.be/<?php echo $yt_list[$i]['ei_ytcode']; ?>' target='_blank'>https://youtu.be/<?php echo $yt_list[$i]['ei_ytcode']; ?></a>",
	        <?php if(0) { // 숨기기 시작 ?>
	        자동실행: "<label class='checkbox'><input type='checkbox' name='ei_autoplay[<?php echo $i; ?>]' value='1' <?php echo $yt_list[$i]['ei_autoplay'] == '1' ? 'checked':''; ?>><i></i></label>",
	        제어판: "<label class='checkbox'><input type='checkbox' name='ei_control[<?php echo $i; ?>]' value='1' <?php echo $yt_list[$i]['ei_control'] == '1' ? 'checked':''; ?>><i></i></label>",
	        반복재생: "<label class='checkbox'><input type='checkbox' name='ei_loop[<?php echo $i; ?>]' value='1' <?php echo $yt_list[$i]['ei_loop'] == '1' ? 'checked':''; ?>><i></i></label>",
	        음소거: "<label class='checkbox'><input type='checkbox' name='ei_mute[<?php echo $i; ?>]' value='1' <?php echo $yt_list[$i]['ei_mute'] == '1' ? 'checked':''; ?>><i></i></label>",
	        투명패턴: "<label class='checkbox'><input type='checkbox' name='ei_raster[<?php echo $i; ?>]' value='1' <?php echo $yt_list[$i]['ei_raster'] == '1' ? 'checked':''; ?>><i></i></label>",
	        <?php } // 숨기기 종료 ?>
	        순서: "<label for='ei_sort_<?php echo $yt_list[$i]['index']; ?>' class='input'><input type='text' name='ei_sort[<?php echo $i; ?>]' id='ei_sort_<?php echo $i; ?>' value='<?php echo $yt_list[$i]['ei_sort']; ?>'></label>",
	        상태: "<label for='ei_state_<?php echo $i; ?>' class='select'><select name='ei_state[<?php echo $i; ?>]' id='ei_state_<?php echo $i; ?>'><option value=''>선택</option><option value='1' <?php echo $yt_list[$i]['ei_state'] == '1' ? 'selected':''; ?>>보이기</option><option value='2' <?php echo $yt_list[$i]['ei_state'] == '2' ? 'selected':''; ?>>숨기기</option></select><i></i></label>",
	        보기권한: "<label class='select'><?php echo $yt_list[$i]['view_level']; ?><i></i></label>",
	        시작일: "<?php echo $yt_list[$i]['ei_start'] ? date('Y-m-d',strtotime($yt_list[$i]['ei_start'])):''; ?>",
	        종료일: "<?php echo $yt_list[$i]['ei_end'] ? date('Y-m-d',strtotime($yt_list[$i]['ei_end'])):''; ?>",
	        등록일: "<?php echo substr($yt_list[$i]['ei_regdt'], 0, 10); ?>",
        },
        <?php } ?>
    ];
}();

$(function() {
    $("#ebslider-itemlist").jsGrid({
        filtering      : false,
        editing        : false,
        sorting        : false,
        paging         : true,
        autoload       : true,
        controller     : db,
        deleteConfirm  : "정말로 삭제하시겠습니까?\n한번 삭제된 데이터는 복구할수 없습니다.",
        pageButtonCount: 5,
        pageSize       : <?php echo $config['cf_page_rows']; ?>,
        width          : "100%",
        height         : "auto",
        fields         : [
            { name: "체크", type: "text", width: 40 },
            { name: "관리", type: "text", align: "center", width: 60, headercss: "set-btn-header", css: "set-btn-field" },
            { name: "이미지", type: "text", align: "center", width: 100 },
            { name: "대표타이틀", type: "text", width: 250 },
            { name: "순서", type: "number",width: 60 },
            { name: "상태", type: "text", align: "center", width: 120 },
            { name: "보기권한", type: "text", align: "center", width: 80 },
            { name: "시작일", type: "text", align: "center", width: 80 },
            { name: "종료일", type: "text", align: "center", width: 80 },
            { name: "등록일", type: "text", align: "center", width: 80 },
        ]
    });

    $("#ebslider-ytitemlist").jsGrid({
        filtering      : false,
        editing        : false,
        sorting        : false,
        paging         : true,
        autoload       : true,
        controller     : ytdb,
        deleteConfirm  : "정말로 삭제하시겠습니까?\n한번 삭제된 데이터는 복구할수 없습니다.",
        pageButtonCount: 5,
        pageSize       : <?php echo $config['cf_page_rows']; ?>,
        width          : "100%",
        height         : "auto",
        fields         : [
            { name: "체크", type: "text", width: 40 },
            { name: "관리", type: "text", align: "center", width: 60, headercss: "set-btn-header", css: "set-btn-field" },
            { name: "유튜브동영상_URL", type: "text", align: "center", width: 230 },
            <?php if(0) { // 숨기기 시작 ?>
            { name: "자동실행", type: "text", align: "center", width: 60 },
            { name: "제어판", type: "text", align: "center", width: 60 },
            { name: "반복재생", type: "text", align: "center", width: 60 },
            { name: "음소거", type: "text", align: "center", width: 60 },
            { name: "투명패턴", type: "text", align: "center", width: 60 },
            <?php } // 숨기기 종료 ?>
            { name: "순서", type: "number",width: 60 },
            { name: "상태", type: "text", align: "center", width: 110 },
            { name: "보기권한", type: "text", align: "center", width: 90 },
            { name: "시작일", type: "text", align: "center", width: 80 },
            { name: "종료일", type: "text", align: "center", width: 80 },
            { name: "등록일", type: "text", align: "center", width: 80 },
        ]
    });

    var $chk = $("#ebslider-itemlist .jsgrid-table th:first-child");
	if ($chk.text() == '체크') {
		var html = '<label for="chkall" class="checkbox"><input type="checkbox" name="chkall" id="chkall" value="1" onclick="check_all_img(this.form)"><i></i></label>';
		$chk.html(html);
	}

    var $ytchk = $("#ebslider-ytitemlist .jsgrid-table th:first-child");
	if ($ytchk.text() == '체크') {
		var html = '<label for="ytchkall" class="checkbox"><input type="checkbox" name="chkall" id="ytchkall" value="1" onclick="check_all_yt(this.form)"><i></i></label>';
		$ytchk.html(html);
	}
});

function febslideritemlist_submit(f) {
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}

function febsliderytitemlist_submit(f) {
    if (!is_checked("ytchk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}

function del_confirm() {
	if (confirm('슬라이더를 삭제하시겠습니까?')) {
		return true;
	} else {
		return false;
	}
}

function check_all_img(f) {
    var chk = document.getElementsByName("chk[]");

    for (i=0; i<chk.length; i++)
        chk[i].checked = f.chkall.checked;
}

function check_all_yt(f) {
    var chk = document.getElementsByName("ytchk[]");

    for (i=0; i<chk.length; i++)
        chk[i].checked = f.chkall.checked;
}

function close_modal_and_reload() {
	window.closeModal = function(){
	    $('.admin-iframe-modal').modal('hide');
	};
	document.location.reload();
}

$(document).ready(function() {
	$('.ebslider-image').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: '로딩중...',
		mainClass: 'mfp-img-mobile',
		image: {
			tError: '이미지를 불러올수 없습니다.'
		}
	});
});
</script>
<?php } ?>