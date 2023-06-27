{extends file="main.tpl"}

{block name=header}{/block}

{block name=footer}{/block}
		
{block name=content}

    {include file="messages.tpl"}

	<table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Nazwa</th>
            {if $user->role == "admin"}
                <th>Hasło</th>
                <th>Email</th>
            {/if}
            <th>Rola</th>
            {if $user->role == "admin"}
                <th>Opcje</th>
            {/if}
        </tr>
    </thead>
    <tbody>
    {foreach $records as $r}
    {strip}
        <tr>
            <td>{$r["username"]}</td>
            {if $user->role == "admin"}
                <td>{$r["password"]}</td>
                <td>{$r["email"]}</td>
            {/if}
            <td>{$r["role_name"]}</td>
            {if $user->role == "admin"}
            <td>
                <a id="recordDelete" href="{$conf->action_url}userDelete/{$r['user_id']}">Usuń</a>
            </td>
            {/if}
        </tr>
    {/strip}
    {/foreach}
    </tbody>
    </table>

{/block}