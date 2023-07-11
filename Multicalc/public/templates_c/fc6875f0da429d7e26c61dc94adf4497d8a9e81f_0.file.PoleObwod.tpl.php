<?php
/* Smarty version 4.3.0, created on 2023-07-11 15:30:10
  from 'C:\xampp\htdocs\projekty\Multicalc\app\views\PoleObwod.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64ad5962bf0a64_35003227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc6875f0da429d7e26c61dc94adf4497d8a9e81f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\PoleObwod.tpl',
      1 => 1689082209,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64ad5962bf0a64_35003227 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75890384564ad59626e0ff2_37153717', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_75890384564ad59626e0ff2_37153717 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_75890384564ad59626e0ff2_37153717',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Main -->
	<div id="main">
		<div class="inner">
			<header>
				<legend><h4>Pole i obwód</h4></legend>
				<p><input type="text" id="searchInput" placeholder="Szukaj..."></p>
			</header>
		</div>
		<section id="tilesPoleObw" class="tiles">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
				<article class="style<?php echo $_smarty_tpl->tpl_vars['r']->value["style"];?>
"><span class="image"><img src="images/pic<?php echo $_smarty_tpl->tpl_vars['r']->value["image"];?>
.jpg" alt="" /></span><a <?php if ($_smarty_tpl->tpl_vars['r']->value["figura_id"] != 0) {?>href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>$_smarty_tpl->tpl_vars['r']->value["param1"]),$_smarty_tpl ) );?>
"<?php }?>><h2><?php echo $_smarty_tpl->tpl_vars['r']->value["nazwa"];?>
</h2></a></article>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</section>
	</div>
<?php
}
}
/* {/block 'content'} */
}
