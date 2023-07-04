{extends file="main.tpl"}

{block name=content}
    
<div class="bottom-margin">
<form action="{rel_url action="userSave"}" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend class="userEdit">Edytuj nazwę użytkownika, email oraz role danego użytkownika</legend>
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <input class="userEdit" id="username" type="text" placeholder="Nazwa użytkownika" name="username" value="{$form->username}">
            </div>
            <div class="col-6 col-12-xsmall">
                <input class="userEdit" id="email" type="text" placeholder="Email" name="email" value="{$form->email}">
            </div>
            <div class="col-12">
                <select class="userEdit" id="roleEdit" name="role" value="{$form->role}">
                    <option value="3" selected="selected">user</option>
                    <option value="1">admin</option>
                </select>
            </div>
        </div>
    </fieldset>
</div>
<div>
    <ul class="actions" >
        <li><input type="submit" class="button" value="Zapisz"/></li>
        <li><a class="button" href="{rel_url action="userShow"}">Powrót</a></li>
    </ul>
</div>
    <input type="hidden" name="id" value="{$form->id}">
</form>	

{include file="messages.tpl"}

{/block}
