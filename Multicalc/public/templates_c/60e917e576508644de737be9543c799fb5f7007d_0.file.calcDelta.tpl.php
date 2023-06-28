<?php
/* Smarty version 4.3.0, created on 2023-06-28 03:11:17
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\calcDelta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649b88b5cae282_84860334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60e917e576508644de737be9543c799fb5f7007d' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\calcDelta.tpl',
      1 => 1687914667,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649b88b5cae282_84860334 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1139379824649b88b5c92b10_50676037', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_654323874649b88b5c93532_69005335', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1886674835649b88b5c93bd2_83921655', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_1139379824649b88b5c92b10_50676037 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1139379824649b88b5c92b10_50676037',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_654323874649b88b5c93532_69005335 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_654323874649b88b5c93532_69005335',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1886674835649b88b5c93bd2_83921655 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1886674835649b88b5c93bd2_83921655',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			
	<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"deltaCompute"),$_smarty_tpl ) );?>
" method="post">
    <legend><h4>Delta oraz jej pierwiastki</h4></legend>
		<div>
			<div class="col">
				<div class="col-6 col-12-medium">
                    <input type="text" name="a" autocomplete="off" placeholder="Długość a" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->a;?>
"/>
                </div>
                <div class="col-6 col-12-medium">
					<input type="text" name="b" autocomplete="off" placeholder="Długość b" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->b;?>
"/>
                </div>
                <div class="col-6 col-12-medium">
					<input type="text" name="c" autocomplete="off" placeholder="Długość c" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->c;?>
"/>
                </div>
                <div id="submit" class="col-6">
                    <ul class="actions" >
                        <li><input type="submit" class="button" value="Oblicz" /></li>
                        <li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"deltaShow"),$_smarty_tpl ) );?>
">Odśwież</a></li>
                    </ul>
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
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>Delta</th>
            <th>x<sub>1</sub></th>
            <th>x<sub>2</sub></th>
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
    <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["a"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["b"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["c"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["delta"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["x1"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["x2"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["username"];?>
</td><td><a class="button" id="recordDelete" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"deltaDelete",'id'=>$_smarty_tpl->tpl_vars['r']->value['id']),$_smarty_tpl ) );?>
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
