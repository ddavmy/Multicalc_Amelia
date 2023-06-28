<?php
/* Smarty version 4.3.0, created on 2023-06-27 14:50:45
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649adb2523a651_85865646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '779bd76a1baaf6f250e2d43f9c22c4fddd67e810' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\users.tpl',
      1 => 1687870236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649adb2523a651_85865646 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198776010649adb25221952_54805009', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1352316377649adb252225d2_52025322', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1362801502649adb25222c19_62522147', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_198776010649adb25221952_54805009 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_198776010649adb25221952_54805009',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_1352316377649adb252225d2_52025322 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1352316377649adb252225d2_52025322',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1362801502649adb25222c19_62522147 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1362801502649adb25222c19_62522147',
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
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><ul class="actions"><li><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
personEdit/<?php echo $_smarty_tpl->tpl_vars['r']->value['user_id'];?>
">Edytuj</a></li><li><a class="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['user_id'];?>
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
