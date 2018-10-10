<?php
/*
 Template Name: Arch test
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<link rel='stylesheet' id='dashicons-css'  href='<?php echo get_theme_file_uri('svgs/style.css')?>' type='text/css' media='all' />

<?php get_header(); ?>

<div id="content" class="main-content">

    <div id="inner-content" class="wrap cf">

		<?php // get_sidebar() ?>

        <main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage"
              itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope
                         itemtype="http://schema.org/BlogPosting">

                    <header class="article-header">

                        <h1 class="page-title"><?php the_title(); ?></h1>

                    </header>

                    <section class="entry-content cf" itemprop="articleBody">

                        <div id="canvas">
                            <div class="intro">
                                <span class="intro__number">01</span>
                                <div class="intro__container">
                                    <h1 class="intro__title">Static page and blog architecture</h1>
                                    <p class="intro__text">Reverse Proxy & Web Server (Nginx) :: App Server (Python Simple HTTP Server) :: Asset Media Delivery (S3)</p>
                                </div>
                            </div>
                            <div class="proxy">
                                <h1 class="proxy__title">Reverse Proxy</h1>
                                <span class="proxy__text">Nginx works as a reverse proxy to handle requests depending on the URL</span>
                                <blockquote>location / { proxy_pass http://index; }</blockquote><blockquote>location /articles { proxy_pass http://articles; };</blockquote>
                            </div>
                            <div class="container">
                                <h1 class="container__title">App Server</h1>
                                <span class="container__text">A Python Simple HTTP service or any sort of quick and dirty app server that can deliver static files</span>
                                <span class="container__text">Both services must be able to handle relative paths, so requests can be redirected if one service fails.</span>
                                <blockquote>python -m SimpleHTTPServer 8080</blockquote>
                            </div><div class="static">
                                <h1 class="static__title">Compiled static page</h1>
                                <span class="static__text">The landing page can be done  with a HTML/CSS framework like Bootstrap and post-processed with a tool chain like Gulp or Grunt</span>
                                <span class="static__text">The blog can be generated through some static generator engine like Jekyll, Octopress, Hugo or Hexo.</span>
                                <blockquote>hexo generate</blockquote>
                                <blockquote>go build -o hugo main.go</blockquote>
                            </div>
                            <div class="bucket">
                                <h1 class="bucket__title">Amazon S3 Bucket</h1>
                                <span class="bucket__text">Versioned assets like images can be stored on S3 Buckets in order to benefit from its CDN and to reduce the project footprint.</span> <blockquote>http://s3.amazon.com/image.png</blockquote>
                            </div>
                            <div id="thisdiv"></div>
                        </div>

                        <script src='<?php echo get_theme_file_uri('svgs/snap.js')?>' type="text/javascript"></script>
                        <script src='<?php echo get_theme_file_uri('svgs/vivus.js')?>' type="text/javascript"></script>
                        <script  src='<?php echo get_theme_file_uri('svgs/index.js')?>' type="text/javascript"></script>
                    </section>


                    <footer class="article-footer">

						<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                    </footer>

					<?php comments_template(); ?>

                </article>

			<?php endwhile; else : ?>

                <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
                    </footer>
                </article>

			<?php endif; ?>

        </main>

		<?php // get_sidebar(); ?>

    </div>

</div>


<?php get_footer(); ?>
