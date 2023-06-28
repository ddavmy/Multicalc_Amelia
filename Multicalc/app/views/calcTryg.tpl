{extends file="main.tpl"}

{block name=header}{/block}

{block name=footer}{/block}
		
{block name=content}
			
	<form action="{$conf->action_url}trygCompute" method="post">
    <legend><h4>Funkcje trygonometryczne</h4></legend>
		<div>
			<div class="col">
				<div class="col-6 col-12-medium">
                    <input type="text" name="alfa" autocomplete="off" placeholder="Kąt alfa" value="{$form->alfa}"/>
                </div>
                <div id="submit" class="col-6">
                    <ul class="actions" >
                        <li><input type="submit" class="button" value="Oblicz" /></li>
                        <li><a class="button" href="{rel_url action="trygShow"}">Odśwież</a></li>
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
            <td>{$r["alfa"]}</td>
            <td>{$r["sin"]}</td>
            <td>{$r["cos"]}</td>
            <td>{$r["tg"]}</td>
            <td>{$r["ctg"]}</td>
            {if $user->role == "admin"}
            <td td>{$r["username"]}</td>
            <td>
                <a class="button" id="recordDelete" href="{rel_url action="trygDelete" id=$r['id']}">Usuń</a>
            </td>
            {/if}
        </tr>
    {/strip}
    {/foreach}
    </tbody>
    </table>

{/block}