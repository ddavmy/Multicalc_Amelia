<?php
/* Smarty version 4.3.0, created on 2023-06-27 04:11:16
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\calcDelta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649a4544380434_14217749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60e917e576508644de737be9543c799fb5f7007d' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\calcDelta.tpl',
      1 => 1687828940,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649a4544380434_14217749 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_811086883649a4544368743_54638883', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1512532136649a4544369372_04644533', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1369698206649a45443699b4_79837601', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_811086883649a4544368743_54638883 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_811086883649a4544368743_54638883',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_1512532136649a4544369372_04644533 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1512532136649a4544369372_04644533',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1369698206649a45443699b4_79837601 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1369698206649a45443699b4_79837601',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deltaCompute" method="post">
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
</td><td><a id="recordDelete" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deltaDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
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
