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
			{foreach $calcPO as $c}
				{strip}
					<article class="style{$c["style"]}">
					<span class="image">
						<img src="images/pic{$c["image"]}.jpg" alt="" />
					</span>
						<a {if $c["figura_id"] != 99}href="{rel_url action=$c["action"]}"{/if}>
						<h2>{$c["nazwa"]}</h2>
					</a>
					</article>
				{/strip}
			{/foreach}
		</section>
	</div>
{/block}