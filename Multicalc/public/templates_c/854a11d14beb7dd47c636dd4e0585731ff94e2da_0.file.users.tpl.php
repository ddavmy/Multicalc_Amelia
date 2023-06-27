<?php
/* Smarty version 4.3.0, created on 2023-06-25 16:21:19
  from 'E:\dev\xampp\htdocs\projekty\projekt\app\views\users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64984d5f83fe09_41245295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '854a11d14beb7dd47c636dd4e0585731ff94e2da' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\projekt\\app\\views\\users.tpl',
      1 => 1687659135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64984d5f83fe09_41245295 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_80640462564984d5f821ed0_35282607', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_35738337364984d5f8228c0_12114064', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195623789964984d5f822ef1_27692471', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_80640462564984d5f821ed0_35282607 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_80640462564984d5f821ed0_35282607',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_35738337364984d5f8228c0_12114064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_35738337364984d5f8228c0_12114064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_195623789964984d5f822ef1_27692471 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_195623789964984d5f822ef1_27692471',
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
                <th>Hasło</th>
                <th>Email</th>
            <?php }?>
            <th>Rola</th>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                <th>Opcje</th>
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
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["password"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["email"];?>
</td><?php }?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["role_name"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><a id="recordDelete" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['user_id'];?>
">Usuń</a></td><?php }?></tr>
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
