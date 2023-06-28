<?php
/* Smarty version 4.3.0, created on 2023-06-28 03:15:10
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\calcTryg.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649b899e894418_89840652',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20cc9f081376710a1917526fb5fb17ed4f4f40a9' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\calcTryg.tpl',
      1 => 1687914908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649b899e894418_89840652 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_901751171649b899e8799c4_21481515', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1352235659649b899e87a3b0_37884827', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_570499962649b899e87a9e4_81708919', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_901751171649b899e8799c4_21481515 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_901751171649b899e8799c4_21481515',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_1352235659649b899e87a3b0_37884827 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_1352235659649b899e87a3b0_37884827',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_570499962649b899e87a9e4_81708919 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_570499962649b899e87a9e4_81708919',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

			
	<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
trygCompute" method="post">
    <legend><h4>Funkcje trygonometryczne</h4></legend>
		<div>
			<div class="col">
				<div class="col-6 col-12-medium">
                    <input type="text" name="alfa" autocomplete="off" placeholder="Kąt alfa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->alfa;?>
"/>
                </div>
                <div id="submit" class="col-6">
                    <ul class="actions" >
                        <li><input type="submit" class="button" value="Oblicz" /></li>
                        <li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"trygShow"),$_smarty_tpl ) );?>
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
</td><td><a class="button" id="recordDelete" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"trygDelete",'id'=>$_smarty_tpl->tpl_vars['r']->value['id']),$_smarty_tpl ) );?>
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
