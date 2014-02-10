<!DOCTYPE html>
<html>

	<head>
		<link href="/install/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="/install/src/bootstrap-wizard.css" rel="stylesheet" />
		<link href="/install/chosen/chosen.css" rel="stylesheet" />

		<style type="text/css">
			.wizard-modal p {
				margin: 0 0 10px;
				padding: 0;
			}

			#wizard-ns-detail-servers, .wizard-additional-servers {
				font-size:12px;
				margin-top:10px;
				margin-left:15px;
			}
			#wizard-ns-detail-servers > li, .wizard-additional-servers li {
				line-height:20px;
				list-style-type:none;
			}
			#wizard-ns-detail-servers > li > img {
				padding-right:5px;
			}

			.wizard-modal .chzn-container .chzn-results {
				max-height:150px;
			}
			.wizard-addl-subsection {
				margin-bottom:40px;
			}

			.checklist{}
			.checklist li{
				padding-left: 45px;
				list-style-type: none;
				margin-bottom: 20px;
			}
			li.checkmark {
				background:url("images/checkmark-icon.png") no-repeat 0 50%;

			}
			li.error {
				background:url("images/x.png") no-repeat 0 50%;
			}
		</style>
	</head>

	<body style="padding:30px;">

		<button id="open-wizard" class="btn btn-primary"> Start Install</button>
		<div class="wizard" id="cosign-setup">
			<h1>Install Cosign</h1>
			<div class="wizard-card" data-onValidated="setServerName" data-cardname="name">
				<h3>Welcome to Cosign</h3>
				<div class="wizard-input-section">
					<p>
						Welcome to Cosign this wizard will guide you through the installation and configuration.
					</p>


<?php
$HTML = <<<HTML
<pre>
sudo chmod 777 app/config
sudo chmod 777 app/config/app.php
sudo chmod 777 app/storage/*
sudo chmod 777 app/storage
</pre>
HTML;


if (preg_match('/Linux/',php_uname())){
 echo $HTML;
}
 ?>

					<p>Make sure directories are writable:</p>
					<?php
					$project_root_path = realpath(dirname(dirname(dirname(__file__))));
					$app_config = realpath($project_root_path."/app/config");
					$app_config_app = realpath($project_root_path."/app/config/app.php");
					$app_storage = realpath($project_root_path."/app/storage");
					$app_storage_cache = realpath($project_root_path."/app/storage/cache");
					$app_storage_logs = realpath($project_root_path."/app/storage/logs");
					$app_storage_meta = realpath($project_root_path."/app/storage/meta");
					$app_storage_sessions = realpath($project_root_path."/app/storage/sessions");
					$app_storage_views = realpath($project_root_path."/app/storage/views");

					?>


					<ul class="checklist">
						<li class="<?php echo is_writable($app_config) ? "checkmark" : "error" ?>">app/config</li>
						<li class="<?php echo is_writable($app_config_app) ? "checkmark" : "error" ?>">app/config/app.php</li>
						<li class="<?php echo is_writable($app_storage) ? "checkmark" : "error" ?>">app/storage</li>
						<li class="<?php echo is_writable($app_storage_cache) ? "checkmark" : "error" ?>">app/storage/cache</li>
						<li class="<?php echo is_writable($app_storage_logs) ? "checkmark" : "error" ?>">app/storage/logs</li>
						<li class="<?php echo is_writable($app_storage_meta) ? "checkmark" : "error" ?>">app/storage/meta</li>
						<li class="<?php echo is_writable($app_storage_sessions) ? "checkmark" : "error" ?>">app/storage/sessions</li>
						<li class="<?php echo is_writable($app_storage_views) ? "checkmark" : "error" ?>">app/storage/views</li>
					</ul>





				</div>
			</div>

			<div class="wizard-card" data-cardname="group">
				<h3>Database</h3>

				<div class="wizard-input-section">
					<p>
						Which database would you like to use.
					</p>
					<div class="control-group">
						<select id="database-type" name='database-type' class="chzn-select">
							<option value="mysql">MySQL</option>
							<option value="sqlite">SQLite3</option>
							<option value="sqlsrv">MSSQL Server</option>
							<option value="pgsql">Postgres</option>
						</select>
						<div class="row">
							<div class="span3">
								<label><strong>Host</strong></label>
								<input type="text" name="host" value="localhost" placeholder="localhost" />
							</div>
							<div class="span1">
								<label><strong>Port</strong></label>
								<input style="width:45px;" type="text" name="port" placeholder="1234" />
							</div>
							<div class="span1">
								<label><strong>Database</strong></label>
								<input style="width:125px;" type="text" name="database" placeholder="media" value="cosign" />
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<label><strong>Username</strong></label>
								<input type="text"  name="user" placeholder="root" value="root" />
							</div>
							<div class="span2">
								<label><strong>Password</strong></label>
								<input type="password"  name="password" placeholder="password" value="root" />
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="wizard-card" data-cardname="services">
				<h3>Queue System</h3>
				<div class="wizard-input-section">

					
					<div id="queue-beanstalkd" class="control-group">
						<div class="row">
							<div class="span3">
								<label><strong>Host</strong></label>
								<input type="text" name="queue-beanstalkd-host" placeholder="localhost" value="localhost" />
							</div>
							<div class="span2">
								<label><strong>Queue</strong></label>
								<input type="text" name="queue-beanstalkd-queue" placeholder="default" value="default" />
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="wizard-card" data-onload="" data-cardname="location">
				<h3>Admin User</h3>

				<div class="wizard-input-section">
					<p>
						Please create an Admin user by filling in the following information.
					</p>
					<div class="control-group">
						<div class="row">
							<div class="span3">
								<label><strong>Username</strong></label>
								<input type="text" name="admin-username" value="admin" />
							</div>
							<div class="span2">
								<label><strong>Email</strong></label>
								<input type="text" name="admin-email" value="admin@admin.com" />
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<label><strong>Password</strong></label>
								<input type="password" name="admin-password" value="admin" />
							</div>
							<div class="span2">
								<label><strong>Confirm Password</strong></label>
								<input type="password" name="admin-c-password" value="admin" />
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="wizard-error">
				<div class="alert alert-error">
					<strong>There was a problem</strong> with your submission.
					Please correct the errors and re-submit.
				</div>
				<a class="btn wizard-close">Done</a>
			</div>

			<div class="wizard-failure">
				<div class="alert alert-error">
					<strong>There was a problem</strong> submitting the form.
					Please try again in a minute.
				</div>
				<a class="btn im-done">Done</a>
			</div>

			<div class="wizard-success">
				<div id="success" class="alert alert-success">
					<span>Install finished <strong>successfully.</strong>
				</div>
				<a class="btn im-done">Done</a>
			</div>

		</div>


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="/install/chosen/chosen.jquery.js"></script>
		<script src="/install/bootstrap/js/bootstrap.min.js"></script>
		<script src="/install/src/bootstrap-wizard.min.js"></script>


<script type="text/javascript">

	function setServerName(card) {
		var host = $("#new-server-fqdn").val();
		var name = $("#new-server-name").val();
		var displayName = host;

		if (name) {
			displayName = name + " ("+host+")";
		};

		card.wizard.setSubtitle(displayName);
		card.wizard.el.find(".create-server-name").text(displayName);
	}



	$(function() {

		$.fn.wizard.logging = false;

		var wizard = $("#cosign-setup").wizard({
			showCancel: true,
			submitUrl: "/install/install.php"
		});

		$(".chzn-select")
		.chosen()
		.change(function(e){
			// console.log(e.currentTarget.value);
			var el = e.currentTarget.value
			// // Queue
			// $('[id^=queue-]').hide();
			// $('#queue-'+el).show();

			// Authentication
			$('[id^=auth-]').hide();
			$('#auth-'+el).show();
		});

		wizard.el.find(".wizard-ns-select").change(function() {
			wizard.el.find(".wizard-ns-detail").show();
		});

		wizard.el.find(".create-server-service-list").change(function() {
			var noOption = $(this).find("option:selected").length == 0;
			wizard.getCard(this).toggleAlert(null, noOption);
		});

		wizard.on("submit",function(wizard){
			$.ajax({
				type: "POST",
				url: wizard.args.submitUrl,
				data: wizard.serialize(),
				dataType: "json",
				success: function(resp) {

					// console.log(resp,wizard.serialize());

					wizard.hideButtons();
					wizard.updateProgressBar(0);



					$.ajax({
						type: "POST",
						url: location.protocol + '//' + window.location.host + '/app/install',
						data: wizard.serialize(),
						dataType: 'json',
						success: function (data) {
							if (data) {
								
								if (data.status == 'success') {
									wizard.submitSuccess();
								} else {
									wizard.submitFailure();
								}
							};
						},
						error:function(data){
							if (data.status == 'error') {
								wizard.submitSuccess();
							} else {
								wizard.submitFailure();
							}
						}
					}).done(function() {
						wizard.submitSuccess();
					});

			},
			error: function(data) {
				wizard.submitFailure();
				wizard.hideButtons();
			},
		});
		});

		wizard.on("reset", function(wizard) {
			wizard.setSubtitle("");
			wizard.el.find("#new-server-fqdn").val("");
			wizard.el.find("#new-server-name").val("");
		});

		wizard.el.find(".im-done").click(function() {
			wizard.reset().close();
		});

		wizard.el.find(".wizard-success .im-done").click(function() {
			window.location = window.location.protocol +"//" + window.location.host;

		});


		wizard.el.find(".wizard-success .create-another-server").click(function() {
			wizard.reset();
		});

		$(".wizard-group-list").click(function() {
			alert("Disabled for demo.");
		});

		$("#open-wizard").click(function() {
			wizard.show();
		});

		wizard.show();
	});
</script>
	</body>
</html>
