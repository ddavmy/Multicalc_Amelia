<?php
/* Smarty version 4.3.0, created on 2023-07-11 15:30:41
  from 'C:\xampp\htdocs\projekty\Multicalc\app\views\calcTrojkat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64ad59810247d2_02054859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c438ab6e3b6f1103ae6aea487344afc358bcaef3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\calcTrojkat.tpl',
      1 => 1689041639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64ad59810247d2_02054859 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155882029064ad5980e5cdd8_28633573', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_155882029064ad5980e5cdd8_28633573 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_155882029064ad5980e5cdd8_28633573',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód trójkąta</h4></legend>
			</header>
		</div>

		<section class="figuraTrójkąt">
			<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"Trojkat"),$_smarty_tpl ) );?>
" method="post" id="form">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscA" autocomplete="off" placeholder="Długość a" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dlugoscA;?>
"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscB" autocomplete="off" placeholder="Długość b" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dlugoscB;?>
"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscC" autocomplete="off" placeholder="Długość c" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dlugoscC;?>
"/>
						</div>
						<div class="col-6 col-12-medium">
							<input type="text" name="dlugoscD" autocomplete="off" placeholder="Długość h" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->dlugoscD;?>
"/>
						</div>
						<div id="submit" class="col-6">
							<ul class="actions" >
								<li><input type="submit" name="submit" class="button" value="Oblicz" /></li>
								<li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"Trojkat"),$_smarty_tpl ) );?>
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
			<?php if (sizeof($_smarty_tpl->tpl_vars['records']->value) > 0) {?>
			<table class="tabWynik">
			<thead>
				<tr>
					<th>Długość a</th>
					<th>Długość b</th>
					<th>Długość c</th>
					<th>Długość h</th>
					<th>Pole</th>
					<th>Obwód</th>
					<th>Figura</th>
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
			<tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["dlugoscA"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["dlugoscB"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["dlugoscC"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["dlugoscD"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["wynikA"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["wynikB"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["nazwa"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["username"];?>
</td><td><form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"Trojkat",'id'=>$_smarty_tpl->tpl_vars['r']->value['id']),$_smarty_tpl ) );?>
#form" method="post"><input type="submit" id="recordDelete" name="submit" class="button" value="Usuń" /></form></td><?php }?></tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</tbody>
			</table>
			<?php }?>
		</section>
	</div>
<?php
}
}
/* {/block 'content'} */
}
