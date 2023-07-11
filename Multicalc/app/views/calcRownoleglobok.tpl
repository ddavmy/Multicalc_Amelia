{extends file="main.tpl"}
		
{block name=content}
	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód równoległoboku</h4></legend>
			</header>
		</div>

		<section class="figuraRownoleglobok">
			<form action="{rel_url action="Rownoleglobok"}" method="post" id="form">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscA" autocomplete="off" placeholder="Długość a" value="{$form->dlugoscA}"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscB" autocomplete="off" placeholder="Długość b" value="{$form->dlugoscB}"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscC" autocomplete="off" placeholder="Długość h" value="{$form->dlugoscC}"/>
						</div>
						<div id="submit" class="col-6">
							<ul class="actions" >
								<li><input type="submit" name="submit" class="button" value="Oblicz" /></li>
								<li><a class="button" href="{rel_url action="Rownoleglobok"}">Odśwież</a></li>
							</ul>
						</div>
						<div class="col-6">
						</div>
					</div>
				</div>
			</form>

			{include file="messages.tpl"}
			{if sizeof($records) > 0}
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
					<td>{$r["dlugoscA"]}</td>
					<td>{$r["dlugoscB"]}</td>
					<td>{$r["dlugoscC"]}</td>
					<td>{$r["wynikA"]}</td>
					<td>{$r["wynikB"]}</td>
					<td>{$r["nazwa"]}</td>
					{if $user->role == "admin"}
					<td>{$r["username"]}</td>
					<td>
						<form action="{rel_url action="Rownoleglobok" id=$r['id']}#form" method="post">
							<input type="submit" id="recordDelete" name="submit" class="button" value="Usuń" />
						</form>	
					</td>
					{/if}
				</tr>
			{/strip}
			{/foreach}
			</tbody>
			</table>
			{/if}
		</section>
	</div>
{/block}