{extends file="main.tpl"}
		
{block name=content}
			
	<form action="{rel_url action="Funkcje_trygonometryczne"}" id="form" method="post">
    <legend><h4>Funkcje trygonometryczne</h4></legend>
		<div>
			<div class="col">
				<div class="col-6 col-12-medium">
                    <input type="text" name="dlugoscA" autocomplete="off" placeholder="Kąt alfa" value="{$form->dlugoscA}"/>
                </div>
                <div id="submit" class="col-6">
                    <ul class="actions" >
                        <li><input type="submit" name="submit" class="button" value="Oblicz" /></li>
                        <li><a class="button" href="{rel_url action="Funkcje_trygonometryczne"}">Odśwież</a></li>
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
            <th>Kąt alfa</th>
            <th>sin</th>
            <th>cos</th>
            <th>tg</th>
            <th>ctg</th>
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
            <td>{$r["wynikA"]}</td>
            <td>{$r["wynikB"]}</td>
            <td>{$r["wynikC"]}</td>
            <td>{$r["wynikD"]}</td>
            {if $user->role == "admin"}
            <td td>{$r["username"]}</td>
            <td>
                <form action="{rel_url action="Funkcje_trygonometryczne" id=$r['id']}#form" method="post">
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
{/block}