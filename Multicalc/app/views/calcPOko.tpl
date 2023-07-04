{extends file="main.tpl"}
		
{block name=content}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód koła</h4></legend>
			</header>
		</div>

		<section class="figuraKoło">
			<form action="{rel_url action="POkoCompute#formularz"}" method="post" id="form">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="r" autocomplete="off" placeholder="Długość r" value="{$form->r}"/>
						</div>
						<div id="submit" class="col-6">
							<ul class="actions" >
								<li><input type="submit" class="button" value="Oblicz" /></li>
								<li><a class="button" href="{rel_url action="POkoShow"}">Odśwież</a></li>
							</ul>
						</div>
						<div class="col-6">
						</div>
					</div>
				</div>
			</form>

			{include file="messages.tpl"}

			<table class="tabWynik">
			<thead>
				<tr>
					<th>Długość r</th>
					<th>Pole</th>
					<th>Obwód</th>
					<th>Figura</th>
					{if $user->role == "admin"}
						<th>Użytkownik</th>
						<th>Opcje</th>
					{/if}
				</tr>
			</thead>
			<tbody>
			{foreach $records as $r}
			{strip}
				<tr>
					<td>{$r["r"]}</td>
					<td>{$r["pole"]}</td>
					<td>{$r["obwod"]}</td>
					<td>{$r["nazwa"]}</td>
					{if $user->role == "admin"}
					<td>{$r["username"]}</td>
					<td>
						<a class="button" id="recordDelete" href="{rel_url action="POkoDelete" id=$r['id']}#form">Usuń</a>
					</td>
					{/if}
				</tr>
			{/strip}
			{/foreach}
			</tbody>
			</table>
		</section>
	</div>
{/block}