<script type="text/javascript">
	$(document).ready(function(){
		$('#select').change(function(){
			var selTable = $(this).val();	// selected name from dropdown #table
			if (selTable != '') {
				$.ajax({
					url: "resources/generate_table",		// url to fetch data
					async: false,
					type: "POST",					// post
					data: "table="+selTable,		// variable send
					dataType: "html",				// return type
					success: function(data) {		// callback function
						$('#table').html(data);
					}
				})
			}
		});
	});
</script>

<!-- CONTENT -->
<div id="content">
	<!-- PAGE WRAPPER -->
	<div id="page-wrapper">
		<h3>Download Resources</h3><br />
		<div id="resources">
			<?php echo form_open(''); ?>
			<p>
				<?php
					$options = array(
							''=>'Select a table',
							'vehicle_numbers' => 'Number of Vehicles',
							'road_accidents_trends' => 'Road Accidents Trends',
							'road_accidents_user_group' => 'Road Accidents User Group - 2010 A.D.',
							'road_length_districts' => 'Road Length (District) - 2004 A.D.',
							'road_length_regions' => 'Road Length (Development Region) - 2004 A.D.',
							'road_growth' => 'Road Growth'
						); 
					echo form_dropdown('table', $options, '', 'id="select"');
				?>
				<?php echo form_submit('csv', 'CSV', 'onClick=this.form.action="resources/csv"'); ?>
				<?php echo form_submit('json', 'JSON', 'onClick=this.form.action="resources/json"'); ?>
				<?php echo form_submit('xml', 'XML', 'onClick=this.form.action="resources/xml"'); ?>
			</p>
			<?php echo form_close(); ?>
			<br />
			<div id="table"></div>
			<?php  
				if ($this->uri->segment(1) === 'resources') { 
					echo "<br />";
					echo ("<p><em> These data are made available under the Public Domain Dedication and License version v1.0 whose full text can be found at <a href='http://opendatacommons.org/licenses/pddl/'>http://opendatacommons.org/licenses/pddl/ </a></em></p>"); 
				}
			?>
		<!-- END OF RESOURCES -->
		</div>
	<!-- END OF PAGE WRAPPER -->
	</div>
<!-- END OF CONTENT -->
</div>