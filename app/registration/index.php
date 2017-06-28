<?php
	session_start();
	require_once('../../lib/app.php');

	$step = "zero";
	if (isset($_POST['step'])) {
		$step = $_POST['step'];
	}

	if (isset($_POST['stripeToken'])) {
		$step = 'paid';

		// Finalize Charge
		charge_card($_POST['stripeToken']);
		// Send Emails
		if(isset($_SESSION['registrant'])) {
			$email = $_SESSION['registrant']['email'];
			$name = $_SESSION['registrant']['first-name'] . ' ' . $_SESSION['registrant']['last-name'];
			sendMainEmail($email, $name);
			sendDisplayEmail();
		}
		// Clean up
		removeImages();
		session_unset();
		session_destroy();
	}

	if(isset($_POST)) {
		if ($step == "one") {
			savePostToSession($_POST, 'registrant');
		} elseif ($step == "two") {
			savePostToSession($_POST, 'vehicles');
			saveFilesToFolder();
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<script src="../js/jquery.min.js"></script>

	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/skeleton.css">
	<link rel="stylesheet" href="../css/reg.css">

	<title>The Little Car Show 2017 Registration | Marina Motorsports</title>
</head>
<body>
	<div class="wrapper">

		<h1>The Little Car Show 2017 Registration Form</h1>

<?php if ($step == "zero") { ?>
		<h2>Guidelines</h2>
		<p class="intro">
			The Little Car Show accepts a total of 100 micro, mini, "arcane" and alternative fuel-powered cars at least 25 years old. For example, to be eligible this year, entries must have been manufactured 1992 or earlier. Internal combustion motors must displace no more than 1601cc's. Also welcome are electric or other alternative fuel powered vehicles at least 25 years old. Entries are accepted on a first come, first served basis. Registration will close when 100 vehicles have registered.
		</p>

		<h2>Step One</h2>
		<form action="/registration/" method="post" class="group">
			<input type="hidden" name="step" value="one" />

			<div class="holster">
				<fieldset class="registration-informaion">
					<legend>Registrant Information</legend>
					<p class="required">* Required Information</p>
					<div class="row">
						<div class="field six columns">
							<label for="num-cars">Number of Vehicles to Enter <span class="required">*</span></label>
							<select name="num-cars" id="num-cars">
								<?php makeOptions($nums, 'num-cars'); ?>
							</select>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="field six columns">
							<label for="first-name">First Name <span class="required">*</span></label>
							<input type="text" id="first-name" name="first-name" required="required" value="<?=isset($_SESSION['registrant']['first-name']) ? $_SESSION['registrant']['first-name'] : ''?>" autocomplete="given-name" />
						</div>
						<div class="field six columns">
							<label for="last-name">Last Name <span class="required">*</span></label>
							<input type="text" id="last-name" name="last-name" required="required" value="<?=isset($_SESSION['registrant']['last-name']) ? $_SESSION['registrant']['last-name'] : ''?>" autocomplete="family-name" />
						</div>
					</div>
					<div class="field">
						<label for="email">Email <span class="required">*</span></label>
						<input type="email" id="email" name="email" required="required" value="<?=isset($_SESSION['registrant']['email']) ? $_SESSION['registrant']['email'] : ''?>" autocomplete="email" />
					</div>

					<div class="row">
						<div class="field six columns">
							<label for="city">City <span class="required">*</span></label>
							<input type="text" id="city" name="city" value="<?=isset($_SESSION['registrant']['city']) ? $_SESSION['registrant']['city'] : ''?>" autocomplete="shipping locality" />
						</div>
						<div class="field six columns">
							<label for="state">State <span class="required">*</span></label>
							<select id="state" name="state" required="required">
								<option value="">Select State</option>
								<?php makeOptions($states, 'state'); ?>
							</select>
						</div>
					</div>
					<div class="field">
						<label for="phone">Primary Phone <span class="required">*</span> <span class="guide">(Include area code)</span></label>
						<input type="tel" id="phone" name="phone" required="required" value="<?=isset($_SESSION['registrant']['phone']) ? $_SESSION['registrant']['phone'] : ''?>" autocomplete="tel" placeholder="e.g. (831) 555-4567" />
						<p class="help">Please provoide your cell phone number if possible. You might be contacted durring the event.</p>
					</div>
				</fieldset>
			</div>

			<fieldset class="vehicle">

			</fieldset>
			<button type="submit" value="submit" class="button-primary pull-right">Next</button>
		</form>

<?php } elseif ($step == "one") { ?>
		<h2>Step Two</h2>
		<form action="/registration/" method="post" class="group" enctype="multipart/form-data">
			<input type="hidden" name="step" value="two" />

			<?php
			$numCars = isset($_SESSION['registrant']['num-cars']) ? $_SESSION['registrant']['num-cars'] : 1;
			for($i=1; $i<=$numCars; $i++) {
			?>
			<div class="holster">
				<fieldset>
					<legend>Vehicle <?=$i?></legend>
					<p class="required">* Required Information</p>
					<input type="hidden" name="vehicle<?=$i?>_entry-number" value="<?=getEntrantCount()?>" />
					<div class="row">
						<div class="field five columns">
							<label for="vehicle<?=$i?>_make">Make <span class="required">*</span></label>
							<input type="text" id="vehicle<?=$i?>_make" name="vehicle<?=$i?>_make" required="required" value="<?=isset($_SESSION['vehicles'][$i-1]['make']) ? $_SESSION['vehicles'][$i-1]['make'] : ''?>" />
						</div>
						<div class="field five columns">
							<label for="vehicle<?=$i?>_model">Model <span class="required">*</span></label>
							<input type="text" id="vehicle<?=$i?>_model" name="vehicle<?=$i?>_model" required="required" value="<?=isset($_SESSION['vehicles'][$i-1]['model']) ? $_SESSION['vehicles'][$i-1]['model'] : ''?>" />
						</div>
						<div class="field two columns">
							<label for="vehicle<?=$i?>_year">Year <span class="required">*</span></label>
							<input type="text" id="vehicle<?=$i?>_year" name="vehicle<?=$i?>_year" required="required" value="<?=isset($_SESSION['vehicles'][$i-1]['year']) ? $_SESSION['vehicles'][$i-1]['year'] : ''?>" />
						</div>
					</div>
					<div class="row">
						<div class="field eight columns">
							<label for="vehicle<?=$i?>_color">Color <span class="required">*</span></label>
							<input type="text" id="vehicle<?=$i?>_color" name="vehicle<?=$i?>_color" required="required" value="<?=isset($_SESSION['vehicles'][$i-1]['color']) ? $_SESSION['vehicles'][$i-1]['color'] : ''?>" />
						</div>
						<div class="field four columns">
							<label for="vehicle<?=$i?>_engine">Engine Displacement <span class="required">*</span></label>
							<input type="text" id="vehicle<?=$i?>_engine" name="vehicle<?=$i?>_engine" required="required" value="<?=isset($_SESSION['vehicles'][$i-1]['engine']) ? $_SESSION['vehicles'][$i-1]['engine'] : ''?>" />
						</div>
					</div>

					<div class="field field-list">
						<h3>Category <span class="required">*</span></h3>
						<ul>
							<li>
								<label for="vehicle<?=$i?>_cat1"><input type="radio" id="vehicle<?=$i?>_cat1" name="vehicle<?=$i?>_category" required="required" value="1,000cc and Under, Sports Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == '1,000cc and Under, Sports Vehicles') { echo ' checked="checked"'; } ?>>
								1,000cc and Under, Sports Vehicles</label>
							</li>
							<li>
								<label for="vehicle<?=$i?>_cat2"><input type="radio" id="vehicle<?=$i?>_cat2" name="vehicle<?=$i?>_category" value="1,000cc and Under, Other Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == '1,000cc and Under, Other Vehicles') { echo ' checked="checked"'; } ?>>
								1,000cc and Under, Other Vehicles</label>
							</li>
							<li>
								<label for="vehicle<?=$i?>_cat3"><input type="radio" id="vehicle<?=$i?>_cat3" name="vehicle<?=$i?>_category" value="1,001cc up to 1,601cc, Sports Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == '1,001cc up to 1,601cc, Sports Vehicles') { echo ' checked="checked"'; } ?>>
								1,001cc up to 1,601cc, Sports Vehicles</label>
							</li>
							<li>
								<label for="vehicle<?=$i?>_cat4"><input type="radio" id="vehicle<?=$i?>_cat4" name="vehicle<?=$i?>_category" value="1,001cc up to 1,601cc, Other Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == '1,001cc up to 1,601cc, Other Vehicles') { echo ' checked="checked"'; } ?>>
								1,001cc up to 1,601cc, Other Vehicles</label>
							</li>
							<li>
								<label for="vehicle<?=$i?>_cat5"><input type="radio" id="vehicle<?=$i?>_cat5" name="vehicle<?=$i?>_category" value="Electric Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == 'Electric Vehicles') { echo ' checked="checked"'; } ?>>
								Electric Vehicles</label>
							</li>
							<li>
								<label for="vehicle<?=$i?>_cat6"><input type="radio" id="vehicle<?=$i?>_cat6" name="vehicle<?=$i?>_category" value="Owner-Built Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == 'Owner-Built Vehicles') { echo ' checked="checked"'; } ?>>
								Owner-Built Vehicles</label>
							</li>
							<li>
								<label for="vehicle<?=$i?>_cat7"><input type="radio" id="vehicle<?=$i?>_cat7" name="vehicle<?=$i?>_category" value="Special Interest Vehicles"<?php if(isset($_SESSION['vehicles'][$i-1]['category']) && $_SESSION['vehicles'][$i-1]['category'] == 'Special Interest Vehicles') { echo ' checked="checked"'; } ?>>
								Special Interest Vehicles <span class="important">Display Only</span><br>(Not entered in the show nor eligible for awards)</label>
							</li>
						</ul>
					</div>
					<div class="field">
						<label for="vehicle<?=$i?>_addition_info">If you have any additional or historical information about your vehicle please enter it in the box below</label>
						<textarea name="vehicle<?=$i?>_additional_info" id="vehicle<?=$i?>_additional_info" cols="30" rows="10" value="<?=isset($_SESSION['vehicles'][$i-1]['additional_info']) ? $_SESSION['vehicles'][$i-1]['additional_info'] : ''?>"></textarea>
					</div>
					<div class="row">
						<div class="field six columns">
							<label for="vehicle<?=$i?>_image">Image of your vehicle</label>
							<input type="file" name="vehicle<?=$i?>_image" id="vehicle<?=$i?>_image" />
							<p class="help">(JPG, PNG, or GIF only)</p>
						</div>
						<div class="field six columns">
							<label for="vehicle<?=$i?>_insurance">Proof of Insurance</label>
							<input type="file" name="vehicle<?=$i?>_insurance" id="vehicle<?=$i?>_insurance" />
							<p class="help">(JPG, PNG, or GIF only)</p>
						</div>
					</div>
					<div class="info">
						<p class="important">
							If you are unable to scan and upload your proof of insurance please bring proof to the registration table on the day of the event.
						</p>
					</div>
				</fieldset>
				<input type="hidden" name="end<?=$i?>" value="vehicle<?=$i?>" />
			</div>
			<?php } ?>

			<p>If you have further questions please contact us at <a href="mailto:jam@redshift.com">jam@redshift.com</a></p>

			<button type="submit" value="submit" class="button-primary pull-right">Next</button>
		</form>

<?php } elseif ($step == "two") { ?>

		<h2>Registration Review</h2>
		<?=makeOverview()?>
		<form action="/registration/" method="post" id="final-form">
			<button type="submit" value="submit" class="button-primary pull-right" id="final-pay">Pay and Complete</button>
		</form>

	</div>

	<script src="https://checkout.stripe.com/checkout.js"></script>
	<script>
		$form = $('#final-form');

		var handler = StripeCheckout.configure({
			key: '<?=$pub_key?>',
			image: '/images/logo.png',
			locale: 'auto',
			zipCode: true,
			token: function(token) {
				$form.prepend('<input type="hidden" name="stripeToken" value="'+token.id+'" />');
				$form.submit();
			}
		});

		$('#final-pay').click(function(e) {
			handler.open({
				name: "Marina Motorsports, Inc.",
				email: "<?=$_SESSION['registrant']['email']?>",
				description: "Vehicle Registration x <?=$_SESSION['registrant']['num-cars']?>",
				amount: <?=($_SESSION['registrant']['num-cars'] * 2500)?>
			});
			e.preventDefault();
		});

		window.addEventListener('popstate', function() {
			handler.close();
		});
	</script>

<?php } elseif($step == 'paid') { ?>
	<h2>Thank You!</h2>
	<p>
		You have been successfully registered for The Little Car Show 2017. We cannot wait to see you there.
	</p>
	<p>
		<a href="/events/">&lt; Return to Events Page</a><br>
		<a href="/">&lt; Return to Home Page</a><br>
	</p>
<?php } ?>

</body>
</html>