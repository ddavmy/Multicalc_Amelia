<?php
/* Smarty version 4.3.0, created on 2023-06-27 14:20:20
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\personEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649ad404014990_85843284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '970231a87701e35d80172fd96a4e8cf5720e2bb8' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\personEdit.tpl',
      1 => 1687868419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649ad404014990_85843284 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_651157958649ad40400c118_71720329', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_651157958649ad40400c118_71720329 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_651157958649ad40400c118_71720329',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
personSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane osoby</legend>
		<div class="pure-control-group">
            <label for="username">imię</label>
            <input id="username" type="text" placeholder="imię" name="username" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->username;?>
">
        </div>
		<div class="pure-control-group">
            <label for="email">nazwisko</label>
            <input id="email" type="text" placeholder="nazwisko" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
usersShow">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'content'} */
}
