<?php
/*
Template Name: Staff List
*/
?>
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">

        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post();

            // Include the post format-specific content template.
            get_template_part( 'content', 'page' );
          endwhile;
        ?>

			<div class="table-responsive hidden-xs" >
				<table class="table table-striped table-bordered table-fixed-head">
					<thead>
					<tr>
						<th class="text-left">Name</th>
						<th class="text-left">Role</th>
						<th class="text-left">Voicemail</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$url = home_url();
						$parsedUrl = parse_url($url);
						$host = explode('.', $parsedUrl['host']);
						$subdomain = $host[0];
						$json = file_get_contents('http://ec-iappsrv1.wrdsb.ca/api/person/'.$subdomain);
						// deserialize data from JSON
						$contacts = json_decode($json);
						global $phone_num;

						foreach($contacts as $cont) {
					        if ($cont->job_desc == "Head Custodian") {
			                    $phone_num = $cont->phone_no;
			                };
					    };

						foreach($contacts as $contact) {
					?>
						<tr>
							<td><?php // if ($contact->website_active == "t") { ?>
				                <a href="http://teachers.wrdsb.ca/<?php echo $contact->username ?>" target="_blank"><?php echo $contact->Name ?>
				              <?php // } else {
				                // echo $contact->Name;
				              // } ?>
				            </a></strong>
							</td>
							<td><em><?php echo $contact->job_desc ?></em></td>
							<td><?php echo $contact->extension ?></td>
						</tr>
					<?php	
						}
					?>
				</tbody>
				</table>
			</div>

			<div class="visible-xs">
				<ul class="table-list">
					<?php
						foreach($contacts as $contact) {
					?>
					<li>
						<p><?php // if ($contact->website_active == "t") { ?>
				                <a href="http://teachers.wrdsb.ca/<?php echo $contact->username ?>" target="_blank"><?php echo $contact->Name ?>
				              <?php // } else {
				                // echo $contact->Name;
				              // } ?>
				            </a></strong>
							<br />
							<em><?php echo $contact->job_desc ?></em><br />
							<td>Ext: <?php echo $contact->extension ?></p>
					</li>
					<?php	
						}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
