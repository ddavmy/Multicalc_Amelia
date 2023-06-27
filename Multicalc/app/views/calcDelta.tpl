{extends file="main.tpl"}

{block name=header}{/block}

{block name=footer}{/block}
		
{block name=content}
			
	<form action="{$conf->action_url}deltaCompute" method="post">
		<div>
			<div class="col">
				<div class="col-6 col-12-medium">
                    <input type="text" name="a" autocomplete="off" placeholder="Długość a" value="{$form->a}"/>
                </div>
                <div class="col-6 col-12-medium">
					<input type="text" name="b" autocomplete="off" placeholder="Długość b" value="{$form->b}"/>
                </div>
                <div class="col-6 col-12-medium">
					<input type="text" name="c" autocomplete="off" placeholder="Długość c" value="{$form->c}"/>
                </div>
                <div id="submit" class="col-6">
                    <input type="submit" value="Oblicz" />
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
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>Delta</th>
            <th>x<sub>1</sub></th>
            <th>x<sub>2</sub></th>
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
            <td>{$r["c"]}</td>
            <td>{$r["delta"]}</td>
            <td>{$r["x1"]}</td>
            <td>{$r["x2"]}</td>
            {if $user->role == "admin"}
            <td>{$r["username"]}</td>
            <td>
                <a id="recordDelete" href="{$conf->action_url}deltaDelete/{$r['id']}">Usuń</a>
            </td>
            {/if}
        </tr>
    {/strip}
    {/foreach}
    </tbody>
    </table>

{/block}