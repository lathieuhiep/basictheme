<?php
global $basictheme_options;

$limit = $basictheme_options ['basictheme_opt_single_related_limit'] ?? 3;
$list_cate = get_the_terms(get_the_ID(), 'category');

if (!empty($list_cate)):

    $list_cate_ids = array();

    foreach ($list_cate as $item) $list_cate_ids[] = $item->term_id;

    $arg = array(
        'post_type' => 'post',
        'cat' => $list_cate_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => $limit,
    );

    $query = new WP_Query($arg);

    if ($query->have_posts()) :
        ?>

        <div class="site-single-post-related">
            <h3 class="title">
                <?php esc_html_e('Related Post', 'basictheme'); ?>
            </h3>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
                    ?>

                    <div class="col item">
                        <div class="related-post-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <figure class="post-image mb-2">
                                    <?php the_post_thumbnail('large'); ?>
                                </figure>
                            <?php endif; ?>

                            <h4 class="title-post">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h4>

                            <div class="excerpt-post">
                                <p>
                                    <?php
                                    if (has_excerpt()) :
                                        echo wp_trim_words(get_the_excerpt(), 15, '...');
                                    else:
                                        echo wp_trim_words(get_the_content(), 15, '...');
                                    endif;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>

    <?php
    endif;
endif;