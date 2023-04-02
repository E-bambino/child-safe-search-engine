<?php
session_start();

require_once './includes/alert.inc.php';

if (isset($_SESSION['alertBannedSearch'])) {
	echo $alertBannedSearch;
	unset($_SESSION['alertBannedSearch']);
  }

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Child Protection</title>
	<script async src="https://cse.google.com/cse.js?cx=61627c3dee58a462f"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/trial.css">
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="/index.php">Navbar</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/about.php">About</a>
					</li>
					<?php
					if (isset($_SESSION['parentId'])) {
						echo '<li class="nav-item">
								<a class="nav-link" href="/profile.php" title="">Profile Page</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/child_signup.php" title="">Signup Child</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/search_logs.php" title="">Search Logs</a>
					</li>
					<li class="nav-item">
					<a href="#logoutModal" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
					Logout
				</a>

					</li>';
					} elseif (isset($_SESSION['childId'])) {
						echo '<li class="nav-item">
								<a class="nav-link" href="/profile.php" title="">Profile Page</a>
					</li>
					<li class="nav-item">
							<a href="#logoutModal" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
								Logout
							</a>
					</li>';
					} else {
						echo '<li class="nav-item">
						<a class="nav-link" href="/parent_login.php" title="">Parent Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/child_login.php" title="">Child Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/parent_signup.php" title="">Parent Sign Up</a>
					</li>';
					}
					?>
				</ul>
				<?php
				if (isset($_SESSION['childId'])) {
					echo '
					<form class="d-flex" role="search" action="/search_results.php" method="post">
					<input class="form-control me-2" type="search" name="q" placeholder="Toto Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit" name="submit" value="Search">Search</button>
				</form>
';
				}
				?>
			</div>
		</div>
	</nav>
	<!-- Logout Modal -->
	<div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-danger" id="logoutModalLabel">Warning</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you sure you want to logout?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<a href="includes/logout.inc.php" class="btn btn-danger" onclick="logout()">Logout</a>
				</div>
			</div>
		</div>
	</div>