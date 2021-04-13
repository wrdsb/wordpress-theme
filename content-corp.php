<?php
/**
 * The default template for displaying content
 *
 * Used for home corp site only
 *
 * @package WordPress
 * @subpackage WRDSB
 * @since WRDSB 1.0
 */
?>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" role="complementary">

        	<style type="text/css">

        		html {
					scroll-behavior: smooth;
					font-family: helvetica neue, sans-serif !important;
				}

				h2.newcorp {
					text-transform: uppercase;
					text-align: left;
					color: #131212;
					font-weight: bold;
					font-family: helvetica neue, sans-serif;
					font-size: 24px;
					margin-top: 0 !important;
					padding-top: 15px;
					/*padding: 0 0 0 1.25rem;*/
				}

        		.seeall {
        			margin: .5rem auto 1.5rem auto;
        			text-align: center;
        			width: 50%;
        			background-color: #005fae;
        			padding: 15px;
        		}

        		.seeall a {
        			color: #fff;
        			background-color: #005fae;
        		}

        		#featuredarea {
        			background-color: #e1e1e1; 
        			margin-bottom: 25px;
        		}
        		#featuredvideoarea {
        			background-color: #e1e1e1; 
           			/*width: 34%; 
        			float: left; */
        			margin-bottom: 25px;
       			}
        		#featureditemsarea {
        			background-color: #e1e1e1; 
        			/* width: 64%; 
        			float: left; */ 
        			margin-bottom: 25px;
        		}

        		#twitterzone {
					margin-bottom: 25px;"
        		}

        		#fbzone {
					margin-bottom: 25px;"
        		}

        		/* news */

				.corp-news-central {
					background-color: #005fae;
				}

				.corp-news-community {
					background-color: #62bb46;
				}

				.corp-news-urgent {
					background-color: #ee3350;
				}

				.corp-news-feature {
					background-color: #4f758b;
				}

				.news-corp-container {
					padding: .5rem .5rem .5rem 0;
				}

				.news-corp-container > ul {
					display: grid;
					grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
					grid-gap: .5rem;
					padding-left: 0;
					margin-left: 0;
				}

				.news-corp-container > ul > li {
				  border: 5px solid #ededed;
				  list-style-type: none;
				  background-color: #fdfdfd;
				}

				.news-corp-container > ul > li:hover {
				  border: 5px solid #62bb46;
				  list-style-type: none;
				}

				.news-corp-container > ul > li > figure {
				  max-height: 220px;
				  overflow: hidden;
				  position: relative;
				}

				.news-corp-container > ul > li > figure > img {
				  width: 100%;
				  vertical-align: middle;
				  object-fit: cover;
				}

				.news-corp-container > ul > li > figure > figcaption {
				  position: absolute;
				  bottom: 0;
				  width: 65%;
				  color: white;
				}

				.news-corp-container > ul > li > figure > figcaption > h2 {
				  color: white !important;
				  padding: 1.5rem;
				  margin: 0;
				  font-size: 1.5rem;
				  font-weight: bold;
				  text-transform: uppercase;
				}

				.news-corp-container > ul > li > figure > a {
				  color: white !important;
				}

        		h2.news-corp {
        			margin-top: 1rem;
        			margin-left: .75rem;
        			margin-bottom: 0;
        		}

        		h2.news-corp a {
        			font-weight: bold;
        			font-size: .7em;
        			padding-top: 10px;
        			margin-top: 10px;
        			color: #131212;
        		}

				.news-corp-container > ul > li > p {
				  font-size: 1.5rem;
				  line-height: 1.5;
				  padding: 0 .75rem;
				  /* color: #131212; */
				  color: #444;
				}

				.news-corp-container > ul > li > a {
				  padding: .5rem 1rem;
				  margin: .5rem;
				  color: white;
				}

				.news-corp-container > ul > li > p.postdate {
					font-size: 1.25rem;
					margin-top: 0;
					margin-bottom: 0;
				}

				@media (min-width: 768px) {
					.item {
						float: left;
						max-width: 233px;
						max-height: 163px;
						margin: 5px;
						border: 5px solid #e1e1e1;
					}
				}

				@media (max-width: 767px) {
					.item {
						float: left;
						min-width: 233px;
						min-height: 163px;
						margin: 5px;
						border: 5px solid #e1e1e1;
					}
				}

				.item:hover {
					border: 5px solid #62bb46;
				}

				.item h3 {
					font-size: 14px;
					background-color: #005fae;
					color: white;
					margin-top: 0;
					padding: 7px;
					font-weight: bold;
					text-align: center;
				}

        		#quicklinksarea {
        			background-color: #f8f8f8;
        			text-align: center;
        			padding: 0 15px 10px 15px;
        			min-height: 250px;
        		}

        		.quicklinks {
        			margin: auto;
        			padding-bottom: 15px;
        		}

				@media (min-width: 501px) {
					.quicklink {
						float: left;
						width: 210px;
						margin: 5px;
						padding: 15px;
						text-align: center;
						vertical-align: middle;
						border: 5px solid #f8f8f8;
					}
				}

				@media (max-width: 500px) {
					.quicklink {
						width: 210px;
						margin: auto;
						padding: 15px;
						text-align: center;
						vertical-align: middle;
						border: 5px solid #f8f8f8;
					}
				}

				.quicklink:hover {
					border: 5px solid #005fae;
				}

				.quicklink figure {
					text-align: center;
					height: 100px;
					width: 180px;
				}

				.quicklink figure img {
					text-align: center;
					padding: bottom: 15px;
					margin: 5px auto;
				}

				.quicklink figurecaption {
					margin-top: 10px;
					font-weight: bold;
					text-decoration: none;
				}

        	</style>

        	<section class="news-corp-container" id="news">
   				<ul>

	        	<!-- news items (4) -->

				<?php 
			      	// Start the Loop.
			      	while ( have_posts() ) : the_post();
			        // Include the post format-specific content template.
			        get_template_part( 'content-corp-news', get_post_format() );
			      	endwhile;
			        // Previous/next post navigation.
  					// wrdsb_paging_nav();    
				?>

				</ul>
			</section>

			<div class="seeall"><a href="https://www.wrdsb.ca/news-and-announcements/">See All</a></div>

			<?php // Quick Links Area ?>

			<?php if ( is_active_sidebar( 'quicklinkscorp' ) ) : ?>
			<div class="quicklinks-corp-container" id="quicklinksarea">
				<h2 class="newcorp">Quicklinks</h2>	
			  	<div class="quicklinks" role="complementary">
			    	<?php dynamic_sidebar( 'quicklinkscorp' ); ?>
				</div>
			  	<div class="clearfix"></div>
			</div>
			<?php endif; ?>

			<!-- featured video and items (2) -->

			<div id="featuredarea">

				<?php // Featured Video ?>

				<?php if ( is_active_sidebar( 'featvideocorp' ) ) : ?>
				<div class="featuredvideo-corp-container col-lg-4 col-md-4 col-sm-6" id="featuredvideoarea">
					<h2 class="newcorp">Featured Video</h2>	
				    <?php dynamic_sidebar( 'featvideocorp' ); ?>
				</div>
				<?php endif; ?>

				<?php // Featured Items ?>

				<?php if ( is_active_sidebar( 'featitemscorp' ) ) : ?>
				<div class="featureditems-corp-container col-lg-8 col-md-8 col-sm-6" id="featureditemsarea">
					<h2 class="newcorp" style="padding-left: 11px;">Featured Items</h2>	
				    <?php dynamic_sidebar( 'featitemscorp' ); ?>
					<div class="clearfix"></div>
				</div>
				<?php endif; ?>

			<div class="clearfix"></div>

			</div>

			<div id="socialmedia">

			<!-- twitter -->

			<div id="twitterzone" class="col-lg-6 col-md-6 col-sm-12">
				<a class="twitter-timeline" data-width="450" data-height="300" data-theme="light" href="https://twitter.com/wrdsb?ref_src=twsrc%5Etfw">Tweets by wrdsb</a>
				<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>

			<!-- facebook -->

			<div id="fbzone" class="col-lg-6 col-md-6 col-sm-12">
				<div class="fb-page" data-href="https://www.facebook.com/wrdsb" data-tabs="timeline" data-width="400px" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/wrdsb" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/wrdsb">Waterloo Region District School Board (WRDSB)</a></blockquote></div>
			</div>

			</div>

			<div class="clearfix"></div>

			<!-- Google Calendar -->

			<h2 class="newcorp">Upcoming Events</h2>

			<iframe src="https://calendar.google.com/calendar/embed?
			showTitle=0
			&amp;showTz=0
			&amp;src=pp2nfhd2jnee8dfvvgqhmfd374%40group.calendar.google.com
			&amp;src=googleapps.wrdsb.ca_8vcbnsnqpr9frj95jshoh47bvk%40group.calendar.google.com
			&amp;src=oerihuqbvr58ajakvcvi6meqq8%40group.calendar.google.com&amp;src=col0r844ggoqm9nvgrl0lr43vk%40group.calendar.google.com
			&amp;src=g5ibshq9uj6lrs97rq8l9mhprk%40group.calendar.google.com
			&amp;showNav=0
			&amp;showDate=0
			&amp;showPrint=0
			&amp;showTabs=0
			&amp;showCalendars=0
			&amp;mode=AGENDA
			&amp;height=300
			&amp;wkst=1
			&amp;bgcolor=%23FFFFFF
			&amp;ctz=America%2FToronto" 
			style="border: 0" width="100%" height="300" frameborder="0" scrolling="no"></iframe>

			<div class="seeall"><a href="https://www.wrdsb.ca/about-the-wrdsb/calendar/">See All</a></div>

        </div>
</div>