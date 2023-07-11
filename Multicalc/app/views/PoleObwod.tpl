{extends file="main.tpl"}
		
{block name=content}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód</h4></legend>
				<p><input type="text" id="searchInput" placeholder="Szukaj..."></p>
			</header>
		</div>
		<section id="tilesPoleObw" class="tiles">
			{foreach $records as $r}
				{strip}
					<article class="style{$r["style"]}">
					<span class="image">
						<img src="images/pic{$r["image"]}.jpg" alt="" />
					</span>
						<a {if $r["figura_id"] != 0}href="{rel_url action=$r["param1"]}"{/if}>
						<h2>{$r["nazwa"]}</h2>
					</a>
					</article>
				{/strip}
			{/foreach}
		</section>
	</div>
{/block}