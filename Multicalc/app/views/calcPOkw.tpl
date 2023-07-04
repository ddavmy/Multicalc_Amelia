{extends file="main.tpl"}
		
{block name=content}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód kwadratu</h4></legend>
			</header>
		</div>

		<section class="figuraKwadrat">
			<form action="{rel_url action="POkwCompute#formularz"}" method="post" id="form">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="a" autocomplete="off" placeholder="Długość a" value="{$form->a}"/>
						</div>
						<div id="submit" class="col-6">
							<ul class="actions" >
								<li><input type="submit" class="button" value="Oblicz" /></li>
								<li><a class="button" href="{rel_url action="POkwShow"}">Odśwież</a></li>
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
					<th>Długość a</th>
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
					<td>{$r["a"]}</td>
					<td>{$r["pole"]}</td>
					<td>{$r["obwod"]}</td>
					<td>{$r["nazwa"]}</td>
					{if $user->role == "admin"}
					<td>{$r["username"]}</td>
					<td>
						<a class="button" id="recordDelete" href="{rel_url action="calcPOkwDelete" id=$r['id']}#form">Usuń</a>
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