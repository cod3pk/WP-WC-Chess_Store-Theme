jQuery(document).ready(function ($) {

    function LoadMoreCategories() {

        var offset = 8;

        $.ajax({
            type: "POST",
            url: ajax_posts.ajaxUrl,
            data: '&offset=' + offset + '&action=load_more_categories',

            success: (response) => {

                var data = response;
                if (data.length) {
                    $("#loadmore-categories").append(data);
                    $("#cat_load_more_btn").hide();
                } else {
                    $("#cat_load_more_btn").show();
                }
            },
            error: (response) => {
                console.log('No Categories found')
            }
        })

    }

    $("#cat_load_more_btn").on("click", function () {
        $("#cat_load_more_btn").hide()
        LoadMoreCategories();
    });
})
