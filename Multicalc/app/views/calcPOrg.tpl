{extends file="main.tpl"}
		
{block name=content}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód równoległoboku</h4></legend>
			</header>
		</div>

		<section class="figuraRównoległobok">
			<form action="{rel_url action="POrgCompute#formularz"}" method="post" id="form">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="a" autocomplete="off" placeholder="Długość a" value="{$form->a}"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="b" autocomplete="off" placeholder="Długość b" value="{$form->b}"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="h" autocomplete="off" placeholder="Długość h" value="{$form->h}"/>
						</div>
						<div id="submit" class="col-6">
							<ul class="actions" >
								<li><input type="submit" class="button" value="Oblicz" /></li>
								<li><a class="button" href="{rel_url action="POrgShow"}">Odśwież</a></li>
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
					<th>Długość b</th>
					<th>Długość h</th>
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
					<td>{$r["b"]}</td>
					<td>{$r["h"]}</td>
					<td>{$r["pole"]}</td>
					<td>{$r["obwod"]}</td>
					<td>{$r["nazwa"]}</td>
					{if $user->role == "admin"}
					<td>{$r["username"]}</td>
					<td>
						<a class="button" id="recordDelete" href="{rel_url action="POrgDelete" id=$r['id']}#form">Usuń</a>
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