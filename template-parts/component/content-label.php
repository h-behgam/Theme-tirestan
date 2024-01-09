<?php
/**
 * The default template for displaying product energy label content
 */

$gas   = ( get_the_terms( get_the_ID(), 'pa_energy' ) ) ?
    get_the_terms( get_the_ID(), 'pa_energy' )[0] : false;
$rain  = ( get_the_terms( get_the_ID(), 'pa_rain' ) ) ?
    get_the_terms( get_the_ID(), 'pa_rain' )[0] : false;
$sound = ( get_the_terms( get_the_ID(), 'pa_sound' ) ) ?
    get_the_terms( get_the_ID(), 'pa_sound' )[0] : false;

if ( $gas && $rain && $sound ) { ?>

    <?php
    $gas_lower  = strtolower( $gas->name );
    $rain_lower = strtolower( $rain->name );
    ?>

    <div class="ts-prd-label" dir="ltr">

        <span><?php echo esc_html( $sound->name ); ?>dB</span>
        <img src="<?php echo PATH ?>/image/icon/Vector3.png" alt="">
        <span>|</span>

        <span><?php echo esc_html( strtoupper( $rain->name ) ); ?></span>
        <img src="<?php echo PATH ?>/image/icon/Vector2.png" alt="">
        <span>|</span>

        <span><?php echo esc_html( strtoupper( $gas->name ) ); ?></span>
        <img src="<?php echo PATH ?>/image/icon/Vector1.png" alt="">

        <div class="ts-prd-label-preview">

            <img src="<?php echo get_theme_file_uri( 'assets/images/label.png' ); ?>" alt="label" />

            <span class="ts-prd-label-fuel ts-prd-label-<?php echo esc_attr( $gas_lower ); ?>">
                <?php echo esc_html( strtoupper( $gas->name ) ); ?>
            </span>

            <span class="ts-prd-label-rain ts-prd-label-<?php echo esc_attr( $rain_lower ); ?>">
                <?php echo esc_html( strtoupper( $rain->name ) ); ?>
            </span>

            <span class="ts-prd-label-sound">
                <?php echo esc_html( $sound->name ); ?>dB
            </span>

        </div>

    </div>

<?php }
