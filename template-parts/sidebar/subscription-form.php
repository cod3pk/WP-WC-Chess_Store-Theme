<!-- Subscription Form -->
<div class="subscription p-3">
    <img src="<?php echo get_template_directory_uri() . '/images/email-message.jpeg' ?>" alt="email" class="mb-4" width="50px">
    <p>
        <?php echo __('Subscribe to our Newsletter', 'chess-store'); ?>
    </p>
    <form action="#" class="pb-3">
        <input class="bg-white p-2 w-100 fs-5 mb-3 subscription-input" type="email" name="email" id="email" placeholder="<?php echo __('Enter your Email', 'chess-store'); ?>">
        <button class="p-2 px-5 subscription-btn">
            <?php echo __('Subscribe', 'chess-store') ?>
        </button>
    </form>
</div>