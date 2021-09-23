<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Check DNS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Bulk DNS Lookup Tool</h1>
				<form class="form-horizontal" action="/lookup.php" method="post">
					<fieldset>
						<div class="form-group">
							<label class="control-label" for="recordRequest">Record Type: </label>
							<select id="recordRequest" name="recordRequest" class="form-control" required>
								<option value="" selected disabled>-- Select --</option>
								<option value="DNS_A">A</option>
								<option value="DNS_MX">MX</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label" for="domainList">Domains (Enter the domain name(s) to query, one per line): </label>
							<textarea class="form-control" rows="3" id="domainList" name="domainList" placeholder="Domains" required></textarea>
						</div>
						<button class="btn btn-primary" type="submit">Submit</button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>