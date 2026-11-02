<?php
/*
Template Name: Contact
*/

get_header();

$contact_title = get_field('contact_title');
$contact_description = get_field('contact_description');
$contact_email = get_field('contact_email');
$contact_instagram = get_field('contact_instagram');
$contact_linkedin = get_field('contact_linkedin');
?>

    <main class="main">
        <div class="container">
            <h1 class="title"><?php the_title(); ?></h1>

            <section class="contact">
                <div class="contact__inner">
                    <div class="contact__content">
                        <?php if ($contact_title) : ?>
                            <h2 class="contact__title h2">
                                <?php echo esc_html($contact_title); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($contact_description) : ?>
                            <p class="contact__description">
                                <?php echo esc_html($contact_description); ?>
                            </p>
                        <?php endif; ?>

                        <div class="contact__links">
                            <?php if ($contact_email) : ?>
                                <a href="mailto:<?php echo esc_attr($contact_email); ?>">
                                    <?php echo esc_html($contact_email); ?>
                                </a>
                            <?php endif; ?>

                            <?php if ($contact_instagram) : ?>
                                <a href="<?php echo esc_url($contact_instagram); ?>" target="_blank" rel="noopener noreferrer">
                                    Instagram
                                </a>
                            <?php endif; ?>

                            <?php if ($contact_linkedin) : ?>
                                <a href="<?php echo esc_url($contact_linkedin); ?>" target="_blank" rel="noopener noreferrer">
                                    LinkedIn
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="contact__form">
                        <h3 class="contact__form-title h3">
                            Tell us about your project.
                        </h3>
                        <?php
                            echo do_shortcode('[contact-form-7 id="8088e85" title="Contact Inquiry"]');
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>