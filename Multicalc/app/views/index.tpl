{extends file="main.tpl"}
		
{block name=content}

				<!-- Main -->
				<div id="main">
					<div class="inner">
						<header>
							<h1>Oto 'wielozadaniowy' kalkulator.</h1>
							{if count($conf->roles)>0}<p>Witaj {$user->login}! Twoja rola to: {$user->role}</p>{/if}
							<p>Wybierz spośród wielu dostępnych opcji i upewnij się co do wyniku dzięki naszym niezawodnym kalkulatorom!</p>
							<input type="text" id="searchInput" placeholder="Szukaj...">
						</header>
					</div>
					<section id="articlesContainer" class="tiles">
						{foreach $calcs as $c}
							{strip}
								<article class="style{$c["style"]}">
								<span class="image">
									<img src="images/pic{$c["image"]}.jpg" alt="" />
								</span>
									<a {if $c["calc_id"] != 0}href="{rel_url action=$c["action"]}"{/if}>
									<h2>{$c["tytul"]}</h2>
									<div class="content">
										<p>{$c["opis"]}</p>
									</div>
								</a>
								</article>
							{/strip}
						{/foreach}
					</section>
				</div>
			</div>
{/block}