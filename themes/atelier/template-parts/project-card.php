<?php $terms = get_the_terms(get_the_ID(), 'project_type'); ?>

<article class="project-card">
    <a class="project-card__link" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <div class="project-card__image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="project-card__info">
            <div class="project-card__details">
                <h2 class="project-card__title"><?php the_title(); ?></h2>
                <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
                    <span class="project-card__category">
                        <?php echo esc_html($terms[0]->name); ?>
                    </span>
                <?php endif; ?>
            </div>
            <span class="project-card__arrow" aria-hidden="true">→</span>
        </div>
    </a>
</article>