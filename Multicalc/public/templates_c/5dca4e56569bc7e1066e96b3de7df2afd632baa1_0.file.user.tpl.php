<?php
/* Smarty version 4.3.0, created on 2023-06-27 18:53:05
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649b13f183e227_64893627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5dca4e56569bc7e1066e96b3de7df2afd632baa1' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\user.tpl',
      1 => 1687884621,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649b13f183e227_64893627 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1359257464649b13f1819755_65724134', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_249579479649b13f181a420_51098756', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_501062959649b13f181ab82_53523466', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_1359257464649b13f1819755_65724134 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1359257464649b13f1819755_65724134',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_249579479649b13f181a420_51098756 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_249579479649b13f181a420_51098756',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_501062959649b13f181ab82_53523466 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_501062959649b13f181ab82_53523466',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Nazwa</th>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                                <th>Email</th>
            <?php }?>
            <th>Rola</th>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                <th class="actions">Opcje</th>
            <?php }?>
        </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["username"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["email"];?>
</td><?php }?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["role_name"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td class="opcje"><ul class="actions"><li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"userEdit",'id'=>$_smarty_tpl->tpl_vars['r']->value['user_id']),$_smarty_tpl ) );?>
">Edytuj</a></li><li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"userDelete",'id'=>$_smarty_tpl->tpl_vars['r']->value['user_id']),$_smarty_tpl ) );?>
">Usuń</a></li></ul></td><?php }?></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
    </table>

<?php
}
}
/* {/block 'content'} */
}
