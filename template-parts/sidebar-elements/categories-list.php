<!-- Categories -->
<h2 class="m-0 recent-blog-title fs-5 pt-4"><?php echo __('Categories', 'chess-store') ?></h2>

<div class="row">
    <?php
    $cats = get_post_sidebar_categories();

    foreach ($cats as $cat) :
        // get the thumbnail id using the queried category term_id
        $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

        // get the image URL
        $image = wp_get_attachment_url($thumbnail_id);
    ?>
        <div class="col-4 position-relative">
            <a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>" class="text-decoration-none">
                <img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>" class="sidebar-cat-img">
                <p class="mb-0 blog-description">
                    <?php echo $cat->name ?>
                </p>
            </a>
        </div>
    <?php endforeach; ?>
</div>