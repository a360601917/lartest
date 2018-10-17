//三联
resfn()
function resfn(){
    if($(window).width()<700){
        $('.nav_liston>li').unbind('click');
        $('.userinfo').css("display","none");
        $('.c_m_s').css("display","block");
        $('.logo_wrap>p:nth-child(2)').css("display","none");
        $('.logo_wrap>p:nth-child(1)').css("display","block");
        $('.sub_nav_wrap').css("display","none");
        bindEv();
    }else {
        $('.nav_listm>li').unbind('mouseenter').unbind('mouseleave');
        $('.userinfo').css("display", "block");
        $('.c_m_s').css("display", "none");
        $('.logo_wrap>p').css("display", "none");
        $('.sub_nav_wrap').css("display", "block");
        bindonEv();
    }




}

window.onresize=function(){
    resfn()
}

function addClassfn(){
    $(".sub_nav_content>li").each(function () {
        if($(this).css('display')=="list-item"){
            var i=$(this).index();
            $('.nav_liston>li').eq(i).addClass('special'+(i+1));
            $('.nav_liston>li').eq(i).find('span').css('color','#1CFFEA');
        }
    })
}


bindonEv();
$('.show_bnts').click(function () {
    $('.nav_liston>li').unbind('click');
    $('.userinfo').hide(2000);
    $('.c_m_s').show(1500);
    $('.logo_wrap>p').show(1500);
    $('.sub_nav_wrap').hide(2000, function () {
        bindEv();
    })
})
$('.show_bnt').click(function () {
    $('.nav_listm>li').unbind('mouseenter').unbind('mouseleave');
    $('.c_m_s').hide(2000);
    $('.logo_wrap>p').hide(2000);
    $('.userinfo').show(1500);
    addClassfn();
    $('.sub_nav_wrap').show(2500,function () {
        bindonEv()
    });

})
function bindonEv() {
    $('.nav_liston>li').click(function () {
        var i=$(this).index();
        $(this).siblings('li').removeClass();
        $(this).siblings('li').find('span').css('color','white');
        $(this).addClass('special'+(i+1));
        $(this).find('span').css('color','#1CFFEA');
        $('.sub_nav_content>li').hide();
        $('.sub_nav_content>li').eq(i).show();

    })
}
function bindEv(){
    $('.nav_listm>li').bind({
        mouseenter: function (e) {
            var i=$(this).index();
            $('.nav_listm>li').removeClass();
            $('.nav_listm>li').find('span').css('color','white');
            $(this).addClass('special'+(i+1));
            $(this).find('span').css('color','#1CFFEA');
            $(this).children('.subnavlist').css("display", "block");
        },
        mouseleave: function (e) {

            $('.nav_listm>li').removeClass();
            $('.nav_listm>li').find('span').css('color','white');
            $('.nav_listm>li').children('.subnavlist').css("display", "none");
        }
    });
}
//tab切换
$("#tablist>a").click(function () {
    var i=$(this).index();
    $(this).siblings('a').removeClass();
    $('.projectlist').css("display","none");
    $(this).addClass('specialtab');
    $('.projectlist').eq(i).css("display","block");
})

$("#newproject").click(function () {
    $(".projectlistwrap").css("display","none");
    $(".newprojectwrap").css("display","flex");
})
$(".shut").click(function () {
    $(".newprojectwrap").css('display','none');
    $(".projectlistwrap").css("display","block");
});


//折叠
$("#advanced_search").click(function () {
    $(".searchbox").hide(1000);
    $(".advsearchwrap").show(2000);
})
$("#packup").click(function () {
    $(".advsearchwrap").hide(1000);
    $(".searchbox").show(2000);
})

//查看
$(".view").click(function () {
    $(".projectlistwrap").css("display","none");
    $(".newprojectwrap").css("display","flex");
})

//文件上传
function getobjecturl(file) {
    var url=null;
    if(window.createObjectURL!=undefined){
        url=window.createObjectURL(file);
    }else if(window.URL!=undefined){
        url=window.URL.createObjectURL(file);
    }else if(window.webkitURL.createObjectURL!=undefined){
        url=window.webkitURL.createObjectURL(file);
    }
    return url;
}
$("#ID-pros").change(function () {
    var pic=getobjecturl($(this)[0].files[0]);
    $('.ID-pros-pic').attr("src",pic);
    $('.ID-pros>span').text("");


})
$("#ID-cons").change(function () {
    var pic=getobjecturl($(this)[0].files[0]);
    $('.ID-cons-pic').attr("src",pic);
    $('.ID-cons>span').text("");

})


