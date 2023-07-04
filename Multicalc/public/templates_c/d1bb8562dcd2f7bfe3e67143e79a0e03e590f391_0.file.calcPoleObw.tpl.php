<?php
/* Smarty version 4.3.0, created on 2023-07-03 21:23:39
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\calcPoleObw.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64a3203bd87f79_02353312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1bb8562dcd2f7bfe3e67143e79a0e03e590f391' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\calcPoleObw.tpl',
      1 => 1688412120,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64a3203bd87f79_02353312 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_190425117164a3203bd684b1_82433934', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_190425117164a3203bd684b1_82433934 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_190425117164a3203bd684b1_82433934',
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
.jpg" alt="" /></span><a <?php if ($_smarty_tpl->tpl_vars['c']->value["calc_id"] != 99) {?>href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>$_smarty_tpl->tpl_vars['c']->value["action"]),$_smarty_tpl ) );?>
"<?php }?>><h2><?php echo $_smarty_tpl->tpl_vars['c']->value["tytul"];?>
</h2><div class="content"><p><?php echo $_smarty_tpl->tpl_vars['c']->value["opis"];?>
</p></div></a></article>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Kwadrat</h2>
				</a>
			</article>
			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Prostokąt</h2>
				</a>
			</article>
			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Trójkąt</h2>
				</a>
			</article>
			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Romb</h2>
				</a>
			</article>
			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Trapez</h2>
				</a>
			</article>
			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Równoległobok</h2>
				</a>
			</article>
			<article class="style1">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Koło</h2>
				</a>
			</article>
			<article class="style3">
				<span class="image">
					<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic1.jpg"),$_smarty_tpl ) );?>
" alt="" />
				</span>
				<a>
					<h2>Coming next</h2>
					<div class="content">
						<p>Kalkulator niedostępny na czas zmian.</p>
					</div>
				</a>
			</article>
		</section>


		<section class="figuraProstokąt">
			<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"poleObwCompute#formularz"),$_smarty_tpl ) );?>
" method="post" id="formularz">
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
						<div id="submit" class="col-6">
							<ul class="actions" >
								<li><input type="submit" class="button" value="Oblicz" /></li>
								<li><a class="button" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"poleObwShow"),$_smarty_tpl ) );?>
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
					<th>Długość A</th>
					<th>Długość B</th>
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
			<tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["a"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["b"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["pole"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["obwod"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["nazwa"];?>
</td><?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?><td><?php echo $_smarty_tpl->tpl_vars['r']->value["username"];?>
</td><td><a class="button" id="recordDelete" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"poleObwDelete",'id'=>$_smarty_tpl->tpl_vars['r']->value['id']),$_smarty_tpl ) );?>
">Usuń</a></td><?php }?></tr>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</tbody>
			</table>
		</section>
	</div>
<?php
}
}
/* {/block 'content'} */
}
