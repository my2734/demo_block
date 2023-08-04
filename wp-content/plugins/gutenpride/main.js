// $(document).ready(
//     console.log("hello ca nha yeu nha")
// )

jQuery(document).ready(function ($) {

    var mediaUploader = wp.media({
        title: "Choose Images",
        button: {
            text: "Select"
        },
        multiple: true
    });
    $('#demo_button').click(function () {
        // event.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        // mediaUploader = wp.media({
        //     title: "Choose Images",
        //     button: {
        //         text: "Select"
        //     },
        //     multiple: true
        // });
        // mediaUploader.on("select", function () {
        //     console.log("hello ca nha yeu")
        //     var attachments = mediaUploader.state().get("selection").toJSON();
        //     var imageList = "";
        //     var arr_url = [];
        //     attachments.forEach(function (attachment) {
        //         imageList += '<img width="22%" style="border-radius: 10px" class="mx-2 my-2" src="' + attachment.url + '" alt="' + attachment.title + '">';
        //         // saveAttachment(attachment.url);
        //         arr_url.push(attachment.url);
        //     });

        // console.log(arr_url);
        // $.ajax({
        //     type: "post",
        //     url: '<?php echo admin_url('admin-ajax.php'); ?>', //Đường dẫn chứa hàm xử lý dữ liệu. Mặc định của WP như vậy
        //     data: {
        //         action: "save_attachment",
        //         attachment_url: arr_url,
        //         tour_ID: '<?= $post->ID ?>'
        //     },
        //     // success: function(response) {
        //     //     //Làm gì đó khi dữ liệu đã được xử lý
        //     //     if(response.success) {
        //     //         console.log(response.data);
        //     //     }
        //     //     else {
        //     //         alert('Đã có lỗi xảy ra');
        //     //     }

        //     // },
        // })
        // document.getElementById("image-gallery").innerHTML = imageList;
        mediaUploader.open();
    });
    mediaUploader.on("select", function () {
        var attachments = mediaUploader.state().get("selection").toJSON();
        var imageList = "";
        var arr_url = [];
        let result = "";
        attachments.forEach(function (attachment) {
            // imageList += '<img width="22%" style="border-radius: 10px" class="mx-2 my-2" src="' + attachment.url + '" alt="' + attachment.title + '">';
            // saveAttachment(attachment.url);
            arr_url.push(attachment.url);
            result += '<div class="col-md-3"><img class="img-fluid" src='+attachment.url+' alt="architecture" /></div>'
        });

        // console.log(arr_url)
        $('#content_image').html('');
        $('#content_image').html(result)
    })

    // mediaUploader.on('select', function(){
    //     console.log("hello ca nha yeu")
    // })
})