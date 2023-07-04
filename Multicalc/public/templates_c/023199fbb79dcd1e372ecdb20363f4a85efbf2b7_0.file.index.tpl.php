<?php
/* Smarty version 4.3.0, created on 2023-07-04 07:27:41
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a3adcdf1a3e0_94804416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '023199fbb79dcd1e372ecdb20363f4a85efbf2b7' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\index.tpl',
      1 => 1688448452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64a3adcdf1a3e0_94804416 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197137353364a3adcdf05d30_42806322', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_197137353364a3adcdf05d30_42806322 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_197137353364a3adcdf05d30_42806322',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


				<!-- Main -->
				<div id="main">
					<div class="inner">
						<header>
							<h1>Oto 'wielozadaniowy' kalkulator.</h1>
							<?php if ($_smarty_tpl->tpl_vars['user']->value->role != "guest") {?><p>Witaj <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
! Twoja rola to: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</p><?php }?>
							<p>Wybierz spośród wielu dostępnych opcji i upewnij się co do wyniku dzięki naszym niezawodnym kalkulatorom!</p>
							<input type="text" id="searchInput" placeholder="Szukaj...">
						</header>
					</div>
					<section id="articlesContainer" class="tiles">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calc']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
							<article class="style<?php echo $_smarty_tpl->tpl_vars['c']->value["style"];?>
"><span class="image"><img src="images/pic<?php echo $_smarty_tpl->tpl_vars['c']->value["image"];?>
.jpg" alt="" /></span><a <?php if ($_smarty_tpl->tpl_vars['c']->value["calc_id"] != 99) {?>href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>$_smarty_tpl->tpl_vars['c']->value["action"]),$_smarty_tpl ) );?>
"<?php }?>><h2><?php echo $_smarty_tpl->tpl_vars['c']->value["tytul"];?>
</h2><div class="content"><p><?php echo $_smarty_tpl->tpl_vars['c']->value["opis"];?>
</p></div></a></article>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</section>
				</div>
			</div>
<?php
}
}
/* {/block 'content'} */
}
