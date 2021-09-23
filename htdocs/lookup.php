<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Check DNS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<?php
	$recordRequest = $_POST[ "recordRequest" ];
	$domainList = $_POST[ "domainList" ];
	$domains = explode( "\r\n", $domainList );
?>

<body style="padding-top:1em;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Bulk DNS Lookup Tool</h1>
				<?php 
				if ($recordRequest === "DNS_MX") {
				?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th scope="col">Domain</th>
								<th scope="col">MX Record</th>
								<th scope="col">MX Record IP Address</th>
							</tr>
						</thead>
						<tbody class="table-striped">
							<?php
							foreach ( $domains as $domain ) {
								$result = dns_get_record( $domain, DNS_MX );
								$host = $result[ 0 ][ host ];
								$mxHostname = $result[ 0 ][ target ];
								$ip = gethostbyname( $mxHostname );

								echo '<tr><td><strong><a href="http://' . $host . '" target="_blank">' . $host . '</a></strong></td><td>' . $mxHostname . '</td><td>' . $ip . '</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
				<?php } elseif ( $recordRequest === "DNS_A" ) {
								?>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th scope="col">Domain</th>
								<th scope="col">IP Address</th>
							</tr>
						</thead>
						<tbody class="table-striped">
							<?php
							foreach ( $domains as $domain ) {
								$result = dns_get_record( $domain, DNS_A );
								//print_r($result);
								$host = $result[ 0 ][ host ];
								$ip = gethostbyname( $host );

								echo '<tr><td><strong><a href="http://' . $host . '" target="_blank">' . $host . '</a></strong></td><td>' . $ip . '</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
				<?php } ?>
                <button class="btn btn-primary" onclick="history.back(-1)">Go Back</button>
			</div>
		</div>
	</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>