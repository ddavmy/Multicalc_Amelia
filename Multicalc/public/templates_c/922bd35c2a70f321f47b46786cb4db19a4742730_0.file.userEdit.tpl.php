<?php
/* Smarty version 4.3.0, created on 2023-07-04 07:00:12
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\userEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a3a75c5fc976_24674107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '922bd35c2a70f321f47b46786cb4db19a4742730' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\userEdit.tpl',
      1 => 1688446811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64a3a75c5fc976_24674107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_171977862664a3a75c5ed006_85872842', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_171977862664a3a75c5ed006_85872842 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_171977862664a3a75c5ed006_85872842',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<div class="bottom-margin">
<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"userSave"),$_smarty_tpl ) );?>
" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend class="userEdit">Edytuj nazwę użytkownika, email oraz role danego użytkownika</legend>
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <input class="userEdit" id="username" type="text" placeholder="Nazwa użytkownika" name="username" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->username;?>
">
            </div>
            <div class="col-6 col-12-xsmall">
                <input class="userEdit" id="email" type="text" placeholder="Email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
            </div>
            <div class="col-12">
                <select class="userEdit" id="roleEdit" name="role" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->role;?>
">
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
        <li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"userShow"),$_smarty_tpl ) );?>
">Powrót</a></li>
    </ul>
</div>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
}
}
/* {/block 'content'} */
}
