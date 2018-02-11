<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/26/2018
 * Time: 9:36 PM
 */
get_header(); ?>

<section class="banner-section d-table" style="background: url(<?php echo get_theme_mod('banner-section'); ?>;) no-repeat center/cover">
    <div class="d-cell">
        <div class="container container-default">
            <div class="heading-banner">
                <h1><?php echo get_theme_mod('heading-banner'); ?></h1>
                <p><?php echo get_theme_mod('banner-text'); ?></p>
            </div>
            <div class="cards-container">
                <ul>
                    <?php if (have_posts()) : ?>
                        <?php  while (have_posts()) : the_post(); ?>
                            <li class="card">
                                <div class="box-img">
                                    <?php the_post_thumbnail('full', 'class=round-img'); ?>
                                </div>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <a href="#" class="btn btn-banner-section">Read more</a>
        </div>
    </div>
</section>

<section class="section-news">
    <div class="container container-default clearfix">
        <h2><?php echo get_theme_mod('title-section'); ?></h2>
        <div class="post-list">
            <ul>
                <?php $args = array('post_type' => 'our_news', 'posts_per_page' => 3);
                $news = new WP_Query($args);
                while ($news->have_posts()) : $news->the_post(); ?>

                  <?php get_template_part('template-parts/content-news', 'our_news'); ?>

                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</section>

<section class="inform-section">
    <div class="bg-inform-section" style="background: url(<?php echo get_theme_mod('bg-img-section'); ?>;) no-repeat center/cover">
        <div class="container container-default">
            <h2><?php echo get_theme_mod('title-section-newsletter'); ?></h2>
            <p><?php echo get_theme_mod('text-section-newsletter'); ?></p>
            <form action="#" method="post" class="form-inline">
                <div class="form-group">
                    <input type="text" name="email" placeholder="email adress">
                    <button class="btn btn-inform-section" type="submit">Sign up</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="product-details">
    <div class="container">
        <ul class="list-product-item">
            <?php $args = array('post_type' => 'inform_post', 'posts_per_page' => 2,);
            $inform = new WP_Query($args);
            while ($inform->have_posts()) : $inform->the_post(); ?>

              <?php  get_template_part('template-parts/content-information', 'inform_post'); ?>

            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        </ul>
    </div>
</section>

<section class="team">
    <div class="container container-default">
        <h2>Our team</h2>
        <div class="post-list-team">
            <ul class="team-list">
                <?php $args = array('post_type' => ' our_team', 'posts_per_page' => 4,);
                $team = new WP_Query($args);
                while ($team->have_posts()) : $team->the_post(); ?>

                       <?php get_template_part('template-parts/content-our-team', 'our_team'); ?>

                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</section>

<?php get_footer(); ?>
