<?php
/*
Template Name: About
*/

get_header();
?>

    <main class="main about-main">
        <div class="container">
            <h1 class="title"><?php the_title(); ?></h1>
        </div>

        <?php
        get_template_part('template-parts/image-text-section', null, [
            'title' => get_field('about_intro_title'),
            'description' => get_field('about_intro_text'),
            'image' => get_field('about_intro_image'),
        ]);

        $values = [
            [
                'title' => get_field('value_1_title'),
                'description' => get_field('value_1_description'),
            ],
            [
                'title' => get_field('value_2_title'),
                'description' => get_field('value_2_description'),
            ],
            [
                'title' => get_field('value_3_title'),
                'description' => get_field('value_3_description'),
            ],
        ];
        ?>

        <section class="values">
            <div class="container">
                <div class="values__grid">
                    <?php foreach ($values as $value) : ?>
                        <div class="values__item">
                            <?php if ($value['title']) : ?>
                                <h2 class="values__title"><?php echo esc_html($value['title']); ?></h2>
                            <?php endif; ?>

                            <?php if ($value['description']) : ?>
                                <p class="values__description"><?php echo esc_html($value['description']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php
        get_template_part('template-parts/image-text-section', null, [
            'title' => get_field('approach_title'),
            'description' => get_field('approach_text'),
            'image' => get_field('approach_image'),
            'reverse' => true,
        ]);
        ?>

        <?php get_template_part('template-parts/contact-cta'); ?>

    </main>

<?php get_footer(); ?>