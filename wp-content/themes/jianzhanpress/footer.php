<!-- �ײ� -->
	<div id="page_foot">
<div class="box">
	<div id="foot_link_box" class="box">
	
<?php 
	$menuParameters = array(
		'theme_location' => 'primary-five',
		'container'	=> false,
		'echo'	=> false,
		'items_wrap' => '%3$s',
		'depth'	=> 0,
	);
	echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
?>



    </div>
    <div class="copyright box">Copyright &copy; 2008 - <?php the_time('Y'); ?> wWw.LouYuWu.Com All Rights Reserved </div>
<div class="copyright box">&#x672C;&#x7AD9;&#x7531;<a href="http://%77%77%77%2E%6C%6F%75%79%75%77%75%2E%6E%65%74/">&#x5317;&#x4EAC;&#x5EFA;&#x7F51;&#x7AD9;&#x516C;&#x53F8;</a><a href="http://%77%77%77%2E%6C%6F%75%79%75%77%75%2E%6E%65%74/">&#x7CBE;&#x667A;&#x79D1;&#x6280;</a>&#x63D0;&#x4F9B;&#x6280;&#x672F;&#x652F;&#x6301;</div>
    <div class="copyright box"><?php bloginfo('name'); ?> ��Ȩ���� ��ICP��27149�� <span style="display:none;"><script language="javascript" type="text/javascript" src="http://js.users.51.la/3667981.js"></script></span></div>
    <div style="display:none">
<script type="text/javascript">
$(function(){
	var win = $(window);
	var gototopHtml = '<div id="topcontrol"><a href="javascript:void(0);" class="top_stick">&nbsp;</a></div>';
	$("body").append(gototopHtml);

	$("#topcontrol").css({
		"display": "none",
		"margin-left" : "auto",
		"margin-right" : "auto",
		"width" : 1000
	});
	$("#topcontrol").find(".top_stick").css({
		"position" : "fixed",
		"bottom" : 50,
		"right": 50
	});

	win.scroll(function(){
		var scrTop = win.scrollTop();
		if( scrTop > 100 ) {
			$("#topcontrol").fadeIn();
		} else {
			$("#topcontrol").fadeOut();
		}
	});

	$("#topcontrol").click(function(){
		$('body,html').animate({scrollTop: 0}, 500);
	})
})
/**
 * ����toastor�ı����
 * @type {{success: success, error: error, info: info, warning: warning}}
 */
var toast = {
    /**
     * �ɹ���ʾ
     * @param text ����
     * @param title ����
     */
    success: function (text, title) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-center",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.success(text, title);
    },
    /**
     * ʧ����ʾ
     * @param text ����
     * @param title ����
     */
    error: function (text, title) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-center",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.error(text, title);
    },
    /**
     * ��Ϣ��ʾ
     * @param text ����
     * @param title ����
     */
    info: function (text, title) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "positionClass": "toast-center",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.info(text, title);
    },
    /**
     * ������ʾ
     * @param text ����
     * @param title ����
     */
    warning: function (text, title) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "positionClass": "toast-center",
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr.warning(text, title);
    }
}
</script>
    </div>
</div>


	<!-- /�ײ� -->
</body>
</html>

