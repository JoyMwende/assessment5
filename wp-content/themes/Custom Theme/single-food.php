<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <article id="post-<?php the_ID() ?>" <?php post_class(); ?>>
            <header>

                <div class="card" style="width: 40vw;">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title();
                                                if (current_user_can('manage_options')) {
                                                    echo ' || ';
                                                    edit_post_link();
                                                } ?></h5>
                        <p class="card-text"><?php the_content(); ?></p>
                        <p class="card-text"><?php echo 'Categories: ';
                                                the_category(); ?></p>
                        <p class="card-text"><?php
                                                echo 'Groups: ';

                                                echo customterm_get_terms($post->ID, 'groups');

                                                ?></p>

                        <p class="card-text"><?php
                                                echo 'Fibre: ';

                                                echo customterm_get_terms($post->ID, 'Fibre');

                                                ?></p>
                        <h6 href="#" class="card-link"><?php previous_post_link('<< Previous Page'); ?></h6>
                        <h6 href="#" class="card-link"> <?php next_post_link('Next Page >>') ?></h6>
                    </div>
                </div>
                <header>
            <?php
        endwhile;
    endif;
            ?>
        </article>

        <?php get_footer(); ?>