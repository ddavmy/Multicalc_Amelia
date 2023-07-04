<?php
/* Smarty version 4.3.0, created on 2023-07-04 07:27:43
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\poleObw.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a3adcf1e34e9_54652006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '936a094e836f737f08bf385906a6d533136abf1d' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\poleObw.tpl',
      1 => 1688448454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a3adcf1e34e9_54652006 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_33947585964a3adcf1d11d7_02112287', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_33947585964a3adcf1d11d7_02112287 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_33947585964a3adcf1d11d7_02112287',
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calcPO']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
				<article class="style<?php echo $_smarty_tpl->tpl_vars['c']->value["style"];?>
"><span class="image"><img src="images/pic<?php echo $_smarty_tpl->tpl_vars['c']->value["image"];?>
.jpg" alt="" /></span><a <?php if ($_smarty_tpl->tpl_vars['c']->value["figura_id"] != 99) {?>href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>$_smarty_tpl->tpl_vars['c']->value["action"]),$_smarty_tpl ) );?>
"<?php }?>><h2><?php echo $_smarty_tpl->tpl_vars['c']->value["nazwa"];?>
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
