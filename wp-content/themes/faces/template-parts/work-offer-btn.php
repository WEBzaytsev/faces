<?php
$additional_classes = $args['classes'];
$classes = sprintf('border50 pointer text-center flex-center font-tenor uppercase %s', $additional_classes);

$btn_text = $args['text'];
?>

<div class="pos-a z-1 border50 flex-center round-animate-btn"
     data-modal="work-offer">
    <span class="<?php esc_attr_e($classes, 'faces'); ?>"><?php echo __($btn_text, 'faces'); ?></span>
</div>
