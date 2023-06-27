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
		<link rel="stylesheet" href="{$conf->app_url}/css/main.css" />
		<noscript><link rel="stylesheet" href="{$conf->app_url}/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

                {block name=header}{/block}
				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="{$conf->action_root}" class="logo">
									<span class="symbol"><img src="{$conf->app_url}/images/logo.png" alt="" /></span><span class="title">Multicalc</span>
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
						<h4>Rola: {$user->role}</h4>
						<ul>
							<li><a href="{$conf->app_url}/siteShow">Home</a></li>
							{if $user->role != "guest"}
								<li><a href="{$conf->app_url}/usersShow">Uzytkownicy</a></li>
								<li><a href="{$conf->app_url}/logout">Wyloguj</a></li>
							{/if}
							{if $user->role == "guest"}
								<li><a href="{$conf->app_url}/loginShow">Zaloguj</a></li>
								<li><a href="{$conf->app_url}/registerShow">Rejestracja</a></li>
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
			<script type="text/javascript" src="{$conf->app_url}/js/jquery.min.js"></script>
			<script type="text/javascript" src="{$conf->app_url}/js/browser.min.js"></script>
			<script type="text/javascript" src="{$conf->app_url}/js/breakpoints.min.js"></script>
			<script type="text/javascript" src="{$conf->app_url}/js/util.js"></script>
			<script type="text/javascript" src="{$conf->app_url}/js/main.js"></script>

	</body>
</html>