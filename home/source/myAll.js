/*妹的，『代码写的烂不要紧，注释要加上』 @Flying_ICE */
$(document).ready(function(){
/*成功案例successList滚动栏操作start*/ 
	//tagNumber记录点击次数，用来计算移动的距离
	var tagNumber=0;
	$("#arrowRight").click(function(){
		//每次移动115px
		var distance = (++tagNumber * -920) + "px";
		$(".logoList").animate({ left: distance}, 400);
	});

	$("#arrowLeft").click(function(){
		//判断，如果到了最左，则不移动
		if( tagNumber == 0 ) return;
		var distance = (--tagNumber * -920) + "px";
		$(".logoList").animate({ left: distance}, 400);
	});
/*滚动栏操作结束*/

/* 大图滚动播放*/
	var flag = 0;
	var timer = setInterval( function(){
		flag = ++flag % 3;
			$(".galleryContainer").animate({left: flag*-1028 + "px"}, 500);
	}, 5000);

});
