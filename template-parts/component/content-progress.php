<div class="progress">
    <div>
        <img src="<?php echo PATH . '/image/icon/boxtick.png' ?>" alt="">
        <p>موجودی</p>
    </div>
    <div class="progress-percentage-bar-wrap">
        <div class="progress-percentage-bar ts-tooltip-wrap">
            <?php
            $stock = (int) get_post_meta($post->ID, '_stock', true);

            switch ($stock) {
                case 0:
                    echo '<span style="width:2%" class="progress-percentage orange"></span>
                    <span class="ts-tooltip">
                        ' . esc_html($stock) . '  حلقه در انبار موجود است
                    </span>
                ';
                    break;
                case 1:
                    echo '<span style="width:25%" class="progress-percentage orange"></span>
                    <span class="ts-tooltip">
                        ' . esc_html($stock) . '  حلقه در انبار موجود است
                    </span>
                ';
                    break;
                case 2:
                    echo '<span style="width:50%" class="progress-percentage orange"></span>
                    <span class="ts-tooltip">
                        ' . esc_html($stock) . '  حلقه در انبار موجود است
                    </span>
                ';
                    break;
                case 3:
                    echo '<span style="width:75%" class="progress-percentage green"></span>
                    <span class="ts-tooltip">
                        ' . esc_html($stock) . '  حلقه در انبار موجود است
                    </span>
                ';
                    break;
                case 4:
                    echo '<span style="width:99%" class="progress-percentage green"></span>
                    <span class="ts-tooltip">
                        ' . esc_html($stock) . '  حلقه در انبار موجود است
                    </span>
                ';
                    break;

                default:
                    echo '<span style="width:99%" class="progress-percentage green"></span>
            <span class="ts-tooltip">
                ' . esc_html($stock) . '  حلقه در انبار موجود است
            </span>
        ';
                    break;
            }
            ?>

        </div>
    </div>
</div>