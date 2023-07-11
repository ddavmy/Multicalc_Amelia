<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
	<head>
		<title>Multicalc</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{rel_url action="css/main.css"}" />
		<noscript><link rel="stylesheet" href="{rel_url action="css/noscript.css"}" /></noscript>
		</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

                {block name=header}{/block}
				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="{rel_url }" class="logo">
									<span class="symbol"><img src="{rel_url action="images/logo.png"}" alt="" /></span><span class="title">Multicalc</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>
							{block name=content} Domyślna treść zawartości .... {/block}
						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2> 
							<h6>Jesteś {$user->login}{if count($conf->roles)>0}, {$user->role}, Twoje ID to: {$user->user_id}{/if}</h6>
						<ul>
							<li><a href="{rel_url }">Home</a></li>
							{if count($conf->roles)>0}
								<li><a href="{rel_url action="userShow"}">Uzytkownicy</a></li>
								<li><a href="{rel_url action="logout"}">Wyloguj</a></li>
							{/if}
							{if count($conf->roles)==0}
								<li><a href="{rel_url action="loginShow"}">Zaloguj</a></li>
								<li><a href="{rel_url action="registerShow"}">Rejestracja</a></li>
							{/if}
						</ul>
					</nav>

					</div> <!-- end of main -->
                {block name=footer}{/block}
				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="https://github.com/ddavmy" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Jakub Linnert - All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script type="text/javascript" src="{rel_url action="js/search.js"}"></script>
			<script type="text/javascript" src="{rel_url action="js/jquery.min.js"}"></script>
			<script type="text/javascript" src="{rel_url action="js/browser.min.js"}"></script>
			<script type="text/javascript" src="{rel_url action="js/breakpoints.min.js"}"></script>
			<script type="text/javascript" src="{rel_url action="js/util.js"}"></script>
			<script type="text/javascript" src="{rel_url action="js/main.js"}"></script>
			
	</body>
</html>