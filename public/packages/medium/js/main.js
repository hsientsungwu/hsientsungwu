// initializing editors
var titleEditor = new MediumEditor('.title-editable', {
    buttonLabels: 'fontawesome'
});
var bodyEditor = new MediumEditor('.body-editable', {
    buttonLabels: 'fontawesome'
});

$(function () {
    $('.body-editable').mediumInsert({
        editor: bodyEditor,
        images: true,
        imagesUploadScript: "{{ URL::to('upload') }}"
    });
    if ($('#hideEditor').length) {
        $('.body-editable').mediumInsert('disable');
        bodyEditor.deactivate();
        titleEditor.deactivate();
    }
});

// hiding messages
$('.error').hide().empty();
$('.success').hide().empty();

// create post
$('body').on('click', '#form-submit', function(e){
    e.preventDefault();
    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url : "/admin/posts",
        data: { title: postTitle['post-title']['value'], content: postContent['post-content']['value'] },
        success: function(data) {
            if(data.success === false)
            {
                $('.error').append(data.message);
                $('.error').show();
            } else {
                $('.success').append(data.message);
                $('.success').show();
                setTimeout(function() {
                    window.location.href = "/admin/posts";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, thrownError) {
            alert('Something went wrong. Please Try again later...');
        }
    });
    return false;
});

// update post
$('body').on('click', '#form-update', function(e){
    e.preventDefault();
    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();
    var postId = $('#post-id').val();

    $.ajax({
        type: 'PUT',
        dataType: 'json',
        url : "/admin/posts/" + postId,
        data: { title: postTitle['post-title']['value'], content: postContent['post-content']['value'] },
        success: function(data) {
            if(data.success === false)
            {
                $('.error').append(data.message);
                $('.error').show();
            } else {
                $('.success').append(data.message);
                $('.success').show();
                setTimeout(function() {
                    window.location.href = "/admin/posts/";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, thrownError) {
            alert('Something went wrong. Please Try again later...');
        }
    });
    return false;
});