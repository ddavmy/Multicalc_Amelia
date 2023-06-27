<?php
/* Smarty version 4.3.0, created on 2023-06-27 03:37:49
  from 'E:\dev\xampp\htdocs\projekty\projekt\app\views\calcTryg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649a3d6d40a9a1_65910746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2fd97532e227e026dc0f91c2e46a9ac90693341' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\projekt\\app\\views\\calcTryg.tpl',
      1 => 1687829694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649a3d6d40a9a1_65910746 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2009772807649a3d6d3eeec5_20852768', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_719287039649a3d6d3efb57_19050789', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1074799086649a3d6d3f0187_57208306', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_2009772807649a3d6d3eeec5_20852768 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_2009772807649a3d6d3eeec5_20852768',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_719287039649a3d6d3efb57_19050789 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_719287039649a3d6d3efb57_19050789',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1074799086649a3d6d3f0187_57208306 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1074799086649a3d6d3f0187_57208306',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
trygCompute" method="post">
		<div>
			<div class="col">
				<div class="col-6 col-12-medium">
                    <input type="text" name="alfa" autocomplete="off" placeholder="Kąt alfa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->alfa;?>
"/>
                </div>
                <div id="submit" class="col-6">
                    <input type="submit" value="Oblicz" />
                </div>
				<div class="col-6">
				</div>
			</div>
		</div>
	</form>

    <?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<table class="tabWynik">
    <thead>
        <tr>
            <th>Kąt alfa</th>
            <th>sin</th>
            <th>cos</th>
            <th>tg</th>
            <th>ctg</th>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
                <th>Użytkownik</th>
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
    <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["alfa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["sin"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["cos"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["tg"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["ctg"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td td><?php echo $_smarty_tpl->tpl_vars['r']->value["username"];?>
</td><td><a id="recordDelete" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
trygDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
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
