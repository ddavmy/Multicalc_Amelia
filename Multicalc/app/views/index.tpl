{extends file="main.tpl"}
		
{block name=content}
				<!-- Main -->
				<div id="main">
					<div class="inner">
						<header>
							<h1>Oto wielozadaniowy kalkulator.</h1>
							{if $user->role != "guest"}<p>Witaj {$user->login}! Twoja rola to: {$user->role}</p>{/if}
							<p>Wybierz spośród wielu dostępnych opcji i upewnij się co do wyniku dzięki naszym niezawodnym kalkulatorom!</p>
						</header>
					</div>
					<section class="tiles">
						<article class="style1">
							<span class="image">
								<img src="images/pic01.jpg" alt="" />
							</span>
							<a href="{rel_url action="poleObwShow"}">
								<h2>Pole i obwód</h2>
								<div class="content">
									<p>Kwadrat Prostokąt Trójkąt Romb Trapez Równoległobok Koło</p>
								</div>
							</a>
						</article>
						<article class="style2">
							<span class="image">
								<img src="images/pic02.jpg" alt="" />
							</span>
							<a href="{rel_url action="deltaShow"}">
								<h2>Delta</h2>
								<div class="content">
									<p>oraz jej pierwiastki</p>
								</div>
							</a>
						</article>
						<article class="style4">
							<span class="image">
								<img src="images/pic03.jpg" alt="" />
							</span>
							<a href="{rel_url action="trygShow"}">
								<h2>Funkcje tryginometryczne</h2>
								<div class="content">
									<p>kąta ostrego w trójkącie prostokątnym</p>
								</div>
							</a>
						</article>
						<article class="style3">
							<span class="image">
								<img src="images/pic04.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
						<article class="style3">
							<span class="image">
								<img src="images/pic05.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
						<article class="style3">
							<span class="image">
								<img src="images/pic06.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
					</section>
				</div>
			</div>
{/block}