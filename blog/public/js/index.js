$(document).ready(function(){
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
	$(".buy .add-to-cart").click(function(){
		$('.ui.content .right').css('left','0');
		addToCart(this);
	});
	$('.buy i.done').hover(function(){
		$('.buy .cancel').css('top','0');
	},function(){
		$('.buy .cancel').css('top','100%');
	});
	$('.buy .cancel i').click(function(){
		$('.ui.content .right').css('left','100%');
	});
})
function addToCart(element){
	var details = $(element).parent().siblings('.details');
	var productName = $(details).find('h1').text();
	$.ajax({
		type:'post',
		url:'/order/'+productName,
		data:{
			productName:productName,
		},
		success:function(data){
			if(data === "success") swal('success','','success');
		}
	});	
}

