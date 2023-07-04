{extends file="main.tpl"}
		
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
                <th class="actions">Opcje</th>
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
            <td class="opcje">
                <ul class="actions">
                {if $r["username"] != "guest"}
                    <li>
                        <a class="button" href="{rel_url action="userEdit" id=$r['user_id']}">Edytuj</a>
                    </li>
                    <li>
                        <a class="button" href="{rel_url action="userDelete" id=$r['user_id']}">Usuń</a>
                    </li>
                {/if}
                </ul>
                
            </td>
            {/if}
        </tr>
    {/strip}
    {/foreach}
    </tbody>
    </table>

{/block}