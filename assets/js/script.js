// JavaScript Document
function numberFormat(num, ext) {
        ext = (!ext) ? '  VNĐ' : ext;
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ext;
    }
function textboxChange(tb, f, sb)
{
    if (!f)
    {
        if (tb.value == "")
        {
            tb.value = sb;
        }
    }
    else
    {
        if (tb.value == sb)
        {
            tb.value = "";
        }
    }
}
function change_alias(alias)
{
	var str = alias;
	str= str.toLowerCase(); 
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ  |ặ|ẳ|ẵ/g,"a"); 
	str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
	str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ  |ợ|ở|ỡ/g,"o"); 
	str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
	str= str.replace(/đ/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	/* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
	str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
	str= str.replace(/^\-+|\-+$/g,""); 
	//cắt bỏ ký tự - ở đầu và cuối chuỗi 
	return str;
}
function doEnter(evt) {
    // IE					// Netscape/Firefox/Opera
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch(evt);
    }
}
function onSearch(evt) {

    var keyword = document.getElementById("keyword").value;
    location.href = "tim-kiem.html/keyword=" + change_alias(keyword) ;
        loadPage(document.location);
}
$(document).ready(function () {
    $("#cssmenu").menumaker({
        title: "Menu",
        format: "multitoggle"
    });
    $(".small-screen").find("ul li").each(function () {
        if ($(this).hasClass("line")) {
            $(this).remove();
        }
        if ($(this).find('a transitionAll').hasClass("icon_menu")) {
            $(this).remove();
        }
    });
})
$(document).ready(function (e) {
	$("#cssmenu li a").click(function(){
		$rel=$(this).attr("rel");
		if($rel!=''){
			$offset=$("#"+$rel).offset().top - $("header").height();
			$('html, body').animate({scrollTop:$offset},800);
			return false;
		}
	})

	$(".submit2").click(function(){ 
		$key=$("#keyword").val();
		console.log($key);
		$dist_s=$("#dist_s").val();
		console.log($dist_s);

		$street_s=$("#street_s").val();
		console.log($street_s);


		//$city=$(".dmtks #city").val();

		$ward=$("#ward_s").val();
console.log($ward);
		$dientich=$("#dientich").val();
		console.log($dientich);
		$gia=$("#giasearch").val();
		console.log($gia);

		$hang=$("#hang").val();
		console.log($hang);

		$huong=$("#huong").val();
		console.log($huong);

		location.href="tim-kiem.html/keyword="+$key+"&dist="+$dist_s+"&dientich="+$dientich+"&gia="+$gia+"&ward="+$ward+"&street="+$street_s+"&hang="+$hang+"&huong="+$huong;



	})
	$(".more_s .s_nut").click(function(){ 
		$key=$("#keyword").val();
		console.log($key);
		$dist_s=$("#dist_s").val();
		console.log($dist_s);

		$street_s=$("#street_s").val();
		console.log($street_s);


		//$city=$(".dmtks #city").val();

		$ward=$("#ward_s").val();
console.log($ward);
		$dientich=$("#dientich").val();
		console.log($dientich);
		$gia=$("#giasearch").val();
		console.log($gia);

		location.href="tim-kiem.html/keyword="+$key+"&dist="+$dist_s+"&dientich="+$dientich+"&gia="+$gia+"&ward="+$ward+"&street="+$street_s;



	})

	
	
    $('.click').click(function () {
        if ($('.left').hasClass("abc")) {
            $('.left').removeClass("abc");
            $('.left').delay('300').animate({left: 20, height: '400px'});
        }
        else {
            $('.left').addClass("abc");
            $('.left').delay('300').animate({left: -300});
        }

    })
	$('a.xem_video').click(function(){
		var link_viveo = $(this).attr('href');
		$('body').append('<div class="login-popup"><div class="close-popup"></div><iframe width="700px" height="400px" src="https://www.youtube.com/embed/'+link_viveo+'?rel=0" frameborder="0" allowfullscreen></iframe></div>');
		$('.login-popup').fadeIn(300);
					
		var chieucao = $('.login-popup').height() / 2;
		var chieurong = $('.login-popup').width() /2;
		$('.login-popup').css({'margin-top':-chieucao,'margin-left':-chieurong});
		$('body').append('<div id="baophu"></div>');
		$('#baophu').fadeIn(300);
		
		$('#baophu, .close-popup').click(function(){
			$('#baophu, .login-popup').fadeOut(300, function(){
				$('#baophu').remove();
				$('.login-popup').remove();
			});			
		});
		return false;
		
	});
	$('.addcart').on('click', function () {
		$id=$(this).data("id");
        var cart = $('#cart');
        var imgtodrag = $(this).parents('.item_product_content').find("img").eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                top: imgtodrag.offset().top,
                left: imgtodrag.offset().left
            })
                .css({
                'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
            })
                .appendTo($('body'))
                .animate({
                'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
            }, 1000, 'easeInOutExpo');
            
           /*  setTimeout(function () {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);
 */
            imgclone.animate({
                'width': 0,
                    'height': 0
            }, function () {
                $(this).detach()
            });
        }
		addtocart($id,1);
    });
    // thanh scroll left

});

function chuyendoi(id){
	$.ajax({
		type:'post',
		url:"xuly",
		data:{id:id,sl:$sl,act:'add'},
		//dataType:'json',
		success:function(data){
			$(".source-cart").html(data.num);
			updateCartNum();
			location.href = "thanh-toan.html";
		}
		
		
	
	})
	return false;
}
function addtocart(id,$sl){
	$.ajax({
		type:'post',
		url:"gio-hang",
		data:{id:id,sl:$sl,act:'add'},
		//dataType:'json',
		success:function(data){
			//$(".source-cart").html(data.num);
			updateCartNum();
			//location.href = "gio-hang.html";
			//swal("Thông báo", "Thêm sản phẩm vào giỏ hàng thành công!", "success");
			/* $.fancybox({
				href:base_url+"/gio-hang/fill.html",
				type:"ajax"
			}) */
		}
		
		
	
	})
	return false;
}
function addtocart1(id,$sl){
	$.ajax({
		type:'post',
		url:"gio-hang",
		data:{id:id,sl:$sl,act:'add'},
		//dataType:'json',
		success:function(data){
			$(".source-cart").html(data.num);
			updateCartNum();
			location.href = "thanh-toan.html";
		}
		
		
	
	})
	return false;
}

function updateCartNum(){
	$.get("index.php",{ajax:"number"},function(data){
		
		$("#cart span").html(data);
	})
	
	
}
//check comment
function form_step1($obj,$id){
	$($obj).parents(".danhgia").animate({height:"0"},function(){
		$("#"+$id).animate({height:$("#"+$id).data("height")});
		$("#result_comment").hide();
		
	})
	
}
function form_step2($obj,$id){
	$("#comment").animate({height:"0"},function(){
		$("."+$id).animate({height:$("."+$id).data("height")});
		
	})
	
}
function form_step3($obj,$id){
	$("#comment").animate({height:"0"},function(){
		$("."+$id).animate({height:$("."+$id).data("height")});
		
	})
	
}
function comment_check(){
	var frm=document.frm_config;
	if(frm.rating.value==0){
		alert("Bạn chưa đánh giá.");
		frm.rating.focus();
		return false;
	}
	if(frm.noidung.value==''){
		alert("Bạn chưa nhập nhận xét.");
		frm.noidung.focus();
		return false;
	}
	if(frm.hoten.value==''){
		alert("Bạn chưa nhập họ tên.");
		frm.hoten.focus();
		return false;
	}
	var currentLocation=window.location;
	$.post("ajax/xuly.php",{
		hoten:frm.hoten.value,
		noidung:frm.noidung.value,
		rating:$('#rating-input').val(),
		id_sp:$('#id_sp').val(),
		act:'comment',
	},function(response){
		$k=$.parseJSON(response);
		if($k.id==1){
			$(".result_comment1").html($k.thongbao);
			$(".result_comment1").fadeIn(500);
			frm.reset();
		}else{
			$(".result_comment1").html($k.thongbao);
			$(".result_comment1").fadeIn(500);
		}
	});
}


$().ready(function(){
	checkLimit();
	$(".box_content_answer").each(function(){
		$obj=$(this);
		checkLimit1($obj);
		$obj.find("#page-nav1").click(function(){
			$root=$(this).parent(".box_content_answer");
			$.ajax({
				data:$root.find("#formanswer").serialize(),
				type:"post",
				dataType:'json',
				success:function(data){
					$root.find("#current1").val(data.current);
					$root.find(".content_answer").append(data.source);
					checkLimit1($root);
					remove_answer();
				}
			})
				return false;
		})
	})
	
	$("#page-nav").click(function(){
		$.ajax({
			data:$("#formx").serialize(),
			type:"post",
			dataType:'json',
			success:function(data){
				$("#current").val(data.current);
				$(".box_result_comment").append(data.source);
				checkLimit();
			}
		})
			return false;
	})
	
	$(".answer .traloi").click(function(){
		$root=$(this).parents(".answer");
		$root.find("#frm_answer").show(500);
	})
	$(".answer .views").click(function(){
		$root=$(this).parents(".answer");
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			$(this).text("Xem trả lời");
			$root.find(".box_content_answer").hide(500);
		}else{
			$(this).addClass("active");
			$(this).text("Thu gọn");
			$root.find(".box_content_answer").show(500);
		}
		
	})
	$("#frm_answer .btn-danger").click(function(){
		$(this).parents("#frm_answer").hide(500);
	})
	$("#frm_answer").submit(function(){
		$obj=$(this);
		$root=$(this).parents(".answer");
		$.ajax({
			url:"ajax/xuly.php",
			data:$("#frm_answer").serialize(),
			type:"POST",
			success: function(data) { 
				$k=$.parseJSON(data);
				if($k.stt==1){
					//$root.find(".content_answer").prepend($k.kq);
					$root.find(".content_answer").append($k.kq);
					$obj.hide(500);
					//remove_answer();
					$root.find(".views").addClass("active");
					$root.find(".views").val("Thu gọn");
					$root.find(".box_content_answer").show(500);
					$obj.reset();
				}else{
					alert("Trả lời thất bại. Bạn vui lòng thử lại")
				}
				
			} 
		})
		return false;
	})
})
function checkLimit(){
	$tt = parseInt($("#total").val());
	$cr = parseInt($("#current").val());
	
	if($cr < $tt){
		
		$("#page-nav").removeClass("hide").find("a").html("Xem thêm "+($tt-$cr)+" bình luận <span class='caret'></span>");
	}else{
		$("#page-nav").addClass("hide");
	}


}
function checkLimit1(){
	$tt = parseInt($obj.find("#total1").val());
	$cr = parseInt($obj.find("#current1").val());
	
	if($cr < $tt){
		
		$obj.find("#page-nav1").removeClass("hide").find("a").html("Xem thêm "+($tt-$cr)+" trả lời <span class='caret'></span>");
	}else{
		$obj.find("#page-nav1").addClass("hide");
	}
}
function initAjax(options){
  var defaults = { 
    url:      '', 
    type:    'post', 
	data:null,
    dataType:  'html', 
    error:  function(e){console.log(e)},
	success:function(){return false;},
	beforeSend:function(){},
  }; 

  // Overwrite default options 
  // with user provided ones 
  // and merge them into "options". 
  var options = $.extend({}, defaults, options); 
	$.ajax({
		url:options.url,
		data:options.data,
		success:options.success,
		error:options.error,
		type:options.type,
		dataType:options.dataType,
		
	})
	

}
$(document).ready(function(){
	$('#rating-input').rating({
	  min: 0,
	  max: 5,
	  step: 1,
	  size: 'md',
	  showClear: false,
	  showCaption: false
});
	$("#owl-demo-dt1").owlCarousel({
		loop:true,
		margin:10,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:4,
			},
			1000:{
				items:6,
			},
			1200:{
				items:8,
			}
		},
		nav:false,
		autoplay: true,
		navText: false,
		dots: false,
		scrollPerPage: 1,
		slideSpeed: 500
	});
	
	$("#owl-demo-dt2").owlCarousel({
		loop:true,
		margin:10,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:3,
			},
			1000:{
				items:4,
			},
			1200:{
				items:4,
			}
		},
		nav:false,
		autoplay: false,
		navText: false,
		dots: false,
		scrollPerPage: 1,
		slideSpeed: 500
	});
	
	$(".list_vp .ct_vp").owlCarousel({
		loop:true,
		margin:5,
		responsive:{
			0:{
				items:4,
			},
			600:{
				items:6,
			},
			1000:{
				items:10,
			},
			1200:{
				items:10,
			}
		},
		nav:true,
		autoplay: false,
		navText: false,
		dots: false,
		scrollPerPage: 1,
		slideSpeed: 500
	});
	
	$(".video_lq").owlCarousel({
		loop:true,
		margin:10,
		responsive:{
			0:{
				items:3,
			},
			600:{
				items:4,
			},
			800:{
				items:5,
			},
			1000:{
				items:3,
			},
			1200:{
				items:3,
			}
		},
		nav:false,
		autoplay: false,
		navText: true,
		dots: false,
		scrollPerPage: 1,
		slideSpeed: 500
	});
	$(".quangcao").owlCarousel({
		loop:true,
		margin:10,
		items:1,
		nav:false,
		autoplay: true,
		navText: true,
		dots: false,
		scrollPerPage: 1,
		slideSpeed: 500
	});
	$('#iview').iView({
		pauseTime: 7000,
		pauseOnHover: false,
		directionNav: true,
		directionNavHide: false,
		directionNavHoverOpacity: 1,
		controlNav: false,
		nextLabel: "Nächste",
		previousLabel: "Vorherige",
		playLabel: "Spielen",
		pauseLabel: "Pause",
		timer: "false",
		timerPadding: 3,
		timerColor: "#0F0"
	});
	$(".item_question").click(function(){
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			$(".item_question").find(".cont").slideUp();
		}else{
			$(".item_question").removeClass("active");
			$(this).addClass("active");
			$(".item_question").find(".cont").slideUp();
			$(this).find(".cont").slideDown();
		}
	})
	$(".owl-demo-KH").owlCarousel({
		loop:true,
		margin:0,
		responsive:{
			0:{
				items:1,
			},
			600:{
				items:1,
			},
			800:{
				items:1,
			},
			1000:{
				items:1,
			},
			1200:{
				items:1,
			}
		},
		nav:false,
		autoplay: false,
		navText: false,
		dots: true,
		scrollPerPage: 1,
		slideSpeed: 2000,
		autoplayTimeout: 3000
	});
	$(".slick").owlCarousel({
		loop:true,
		margin:10,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:4,
			},
			800:{
				items:3,
			},
			1000:{
				items:3,
			},
			1200:{
				items:3,
			}
		},
		nav:true,
		autoplay: false,
		navText: true,
		dots: false,
		scrollPerPage: 1,
		slideSpeed: 500
	});
	
	$("#buy-now").click(function(){
		$id=$(this).data("id");
		addtocart1($id,1);
	})
	$('#info_deals #tab_content li a').click(function(){
		$rel=$(this).attr("rel");
		//$('#info_deals .content_tab').height("0");
		//$($rel).height($($rel).data("height"));
		$('#info_deals #tab_content li').removeClass("selected");
		$('#info_deals .content_tab').removeClass("selected");
		$(this).parents("li").addClass("selected");
		$($rel).addClass("selected");
	})
	
	$('.gui_email .tab').click(function(){
		$rel=$(this).attr("rel");
		
		$('.gui_email .tab').removeClass("active");
		$('.gui_email .box_mail').removeClass("active");
		$(this).addClass("active");
		$($rel).addClass("active");
	})
	
	
	$(".tab .ct_tab").click(function(){
		$rel=$(this).attr("rel");
		
		$('.tab .ct_tab').removeClass("active");
		$(this).addClass("active");
		
		if($rel!=''){
			$offset=$($rel).offset().top;
			$('html, body').animate({scrollTop:$offset - 60},800);
			return false;
		}
	})
	
	
	
	$('#select_tab').change(function(){
		$rel=$(this).val();
		$('#info_deals #tab_content li').removeClass("selected");
		$('#info_deals .content_tab').removeClass("selected");
		$(this).parents("li").addClass("selected");
		$($rel).addClass("selected");
	})
	$('#dist_s').change(function(){
		var pro = $(this).val();
		$('#box_ward_s').load("ajax/xuly.php?act=load-phuong&id="+$(this).val());
		$('#box_street_s').load("ajax/xuly.php?act=load-street&id="+$(this).val());
	})
	$(".btn-search").click(function(){
		$keyword = $("#keyword").val();
		//$city=$(".dmtks #city").val();
		$dist=$(".dmtks #dist_s").val();
		$ward=$(".dmtks #ward_s").val();
		$street=$(".dmtks #street_s").val();
		$dientich=$("#dientich").val();
		$gia=$("#giasearch").val();
		location.href="tim-kiem.html/keyword="+$keyword+"&dist="+$dist+"&dientich="+$dientich+"&gia="+$gia+"&ward="+$ward+"&street="+$street;
	})
	$(".Conditions").mCustomScrollbar({
		theme:"minimal-dark",
		setHeight: 310
	});
	$(".tiente .dropdown-menu li").click(function(){
		$id=$(this).data("id");
		var currentLocation = window.location;
	

		$.ajax({
			url:"ajax/xuly.php",
			type:"POST",
			data:{id:$id, act:"chuyendoi"},
			success: function(data){
				$k=$.parseJSON(data);
				
				if($k.stt==1){
					location.href = currentLocation;
				}else{
					alert("Trả lời thất bại. Bạn vui lòng thử lại")
				}
				
				
			}
		})
	});
	$(".btn_dateview").click(function(){
		$("#myModal1 form").attr("action","dat-lich.html");
	})
	$(".compair").click(function(){
		$id=$(this).data("id");
		$vp=$(".icon_compaire span").html();
		if($vp==3){
			alert("Bạn chỉ có thể so sánh tối đa 1 lúc 3 văn phòng.");
			return false;
		}
		$.ajax({
			url:"ajax/xuly.php",
			type:"POST",
			data:{id:$id, act:"add_compare1"},
			success: function(data){
				$(".icon_compaire span").html(data);
				$(".icon_compaire").attr("data-com",data);
			}
		})
	});
	$('#popub .allload, #popub .close').click(function(){
		$('#popub').fadeOut(300);			
	});
		$(window).scroll(function(){
		var scrollTop  = $(window).scrollTop();
		if(scrollTop > 35){
			$('.tab').addClass('fixed');
			//$("#main").css({"margin-top":$("header").height()})
		}else{
			$('.tab').removeClass('fixed');
			//$("#main").css({"margin-top":"0px"})
		}
	})
})