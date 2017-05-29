$(document).ready(function(){
    $.ajaxSetup({
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    deletePosts();
});
function add_comment(event,element){
    if(event.keyCode == 13){
       var comments = $(element).val().trim();
       var postId = parseInt($(element).siblings("input[name='post_id']").val());
       var username = $(element).siblings("input[name='username']").val();
       $.ajax({
           url:'/comments',
           type:'post',
           data:{
               comments:comments,
               post_id:postId,
           },
           success:function(data){
               console.log('success');
           },
           error:function(data){
               console.log('error');
           }
       });
       var ul = $(element).parents('.panel-footer').siblings('.panel-body').find('ul');
       ul.append("<li><a>" + username +" </a> <span>" + comments +"</span></li>");
    }
}
function deletePosts(){
    $("#deletePosts").click(function(){
        var user_id = $(this).parent().siblings("input[name='user_id']").val();
        var post_id = $(this).parent().siblings("input[name='post_id']").val();
        $.ajax({
            url:'/deletePosts',
            type:'post',
            data:{
                user_id:user_id,
                post_id:post_id,
            },
            success:function(data){
                console.log(data);
            }
        })
    });
}