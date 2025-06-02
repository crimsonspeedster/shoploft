<?php
defined( 'ABSPATH' ) || exit;

get_header();

$per_page_array = getPerPageArray();
$per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : wc_get_default_products_per_row() * wc_get_default_product_rows_per_page();
$per_page = in_array( $per_page, $per_page_array ) ? $per_page : $per_page_array[0];
?>
    <main>
        <div class="page-name page-name-two">
            <h1 class="h1"><?php printf( esc_html__( 'Результати пошуку: "%s"', 'shoploft' ), get_search_query() ); ?></h1>
        </div>

        <?php
            $args = array(
                'post_type'      => 'product',
                's'              => get_search_query(),
                'paged'          => max( 1, get_query_var( 'paged' ) ),
                'posts_per_page' => $per_page,
            );

            $search_query = new WP_Query( $args );

            wc_set_loop_prop( 'is_search', true );
            wc_set_loop_prop( 'total', $search_query->found_posts );
        ?>

        <?php if ( $search_query->have_posts() ) : ?>

            <?php do_action( 'woocommerce_before_shop_loop' ); ?>

            <?php woocommerce_product_loop_start(); ?>

            <?php while ( $search_query->have_posts() ) : $search_query->the_post(); ?>
                <?php
                do_action( 'woocommerce_shop_loop' );

                wc_get_template_part( 'content', 'product' );
                ?>
            <?php endwhile; ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php do_action( 'woocommerce_after_shop_loop' ); ?>

        <?php else : ?>

            <?php
                do_action( 'woocommerce_no_products_found' );
            ?>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </main>
<?php
get_footer();