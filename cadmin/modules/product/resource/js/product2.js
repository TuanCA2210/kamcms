$('input[name="meta_keyword"]').tagsInput({
    width: 'auto',
    height: '100px',
    'onAddTag': function () {
        //alert(1);
    },
});


$('body').on('click', '.collapse', function(event) {
    event.preventDefault();
    var portlet = $(this).parents('.portlet');
    if ($(this).attr('data-status')=='true') {
        $(this).attr('data-status','false');
        portlet.find('.portlet-body').fadeOut("slow");
    }else{
        $(this).attr('data-status','true');
        portlet.find('.portlet-body').fadeIn("slow");
    }
    
});
$('body').on('click', '.remove', function(event) {
    event.preventDefault();
    var portlet = $(this).parents('.portlet');
    portlet.fadeOut("slow",function(){
        $(this).remove();
    });
    
});


$('body').on('click', '.add_info', function(event) {
    event.preventDefault();
    var me = $(this);
    onLoading();
    $.ajax({
        url: baseUrl+'product/product/addInfo',
        type: 'POST',
        dataType: 'html',
        data: {status: true},
    })
    .done(function(data) {
        if (data) {
            $('.info_other').append(data);
            me.html('<i class="fa fa-minus"></i>');
            me.addClass('delete_info').removeClass('add_info');
        }
        offLoading();
    });
    
});

$('body').on('click', '.delete_info', function(event) {
    event.preventDefault();
    $(this).parents('.element-info').fadeOut("slow",function(){
        $(this).remove();
    });
});


$(".ui-sortable").sortable({
  handle : '.handle',
  update : function () {
      //var order = $('.ui-sortable').sortable('serialize');
     //$("#info").load("process-sortable.php?"+order);
  }
});






$('body').on('click', '.choose_img_list', function(event) {
    event.preventDefault();
    var body_img = $(this).parents('.modal-image-choose').find('.modal-body');
    var list = new Array();
    body_img.find('.img-active').each(function(){
        list.push($(this).attr('data-src'));
    });
    //console.log(list);
    if (list.length == 0) {
        toastr["error"](body_img.attr('data-mess-one'));
    }else{
        onLoading();
        body_img.find('.img-load-folder').each(function(){
            $(this).removeClass('img-active');
        });
        $(this).parents('.modal-image-choose').find('.modal').modal('hide');
        $.ajax({
            url: baseUrl+'product/product/addImagesProduct',
            type: 'POST',
            dataType: 'json',
            data: {list: list},
        })
        .done(function(data) {
            if (data.status==true) {
                //toastr["success"](data.mess);
                $('#sortable').fadeOut(100, function(){
                    $('#sortable').html(data.html).fadeIn();
                });
            }
            offLoading();
        });
    }
});
$('body').on('click', '.delete_image', function(event) {
    event.preventDefault();
    var img = $(this).parents('li').find('.green').attr('data-img');
    if ($('#avatar').val()!="" && $('#avatar').val()== img ){
        $('#avatar').val('');
    }
     $(this).parents('li').fadeOut("slow",function(){
        $(this).remove();
    });
});


$('body').on('click', '.select_avatar', function(event) {
    event.preventDefault();
    var avatar = $(this).attr('data-img');
    $('#avatar').val(avatar);
    eachLi();



    $(this).addClass('checked_avatar');
    $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i> '+$(this).attr('data-message'));
    $(this).removeClass('select_avatar');
});


function eachLi(){
    $('.list-image').each(function(index, el) {
        var mess = $(this).find('li a.green').attr('data-choose-avatar');
        $(this).find('li a.green').removeClass('checked_avatar').addClass('select_avatar').html(mess);
    });
}