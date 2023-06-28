<?php
/* Smarty version 4.3.0, created on 2023-06-28 03:37:52
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649b8ef04718b1_20805210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bffff77b7e68fc4754fa4807869f70f9b7902ef7' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\templates\\main.tpl',
      1 => 1687916271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649b8ef04718b1_20805210 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
	<head>
		<title>Multicalc</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"css/main.css"),$_smarty_tpl ) );?>
" />
		<noscript><link rel="stylesheet" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"css/noscript.css"),$_smarty_tpl ) );?>
" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1198829325649b8ef0462648_58186993', 'header');
?>

				<!-- Header -->
					<header id="header">
						<div class="inner">

							<!-- Logo -->
								<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array(),$_smarty_tpl ) );?>
" class="logo">
									<span class="symbol"><img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"images/logo.png"),$_smarty_tpl ) );?>
" alt="" /></span><span class="title">Multicalc</span>
								</a>

							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1706364182649b8ef0463615_20359933', 'content');
?>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2> 
						<h4>Rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</h4>
						<ul>
							<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array(),$_smarty_tpl ) );?>
">Home</a></li>
							<?php if ($_smarty_tpl->tpl_vars['user']->value->role != "guest") {?>
								<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"userShow"),$_smarty_tpl ) );?>
">Uzytkownicy</a></li>
								<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"logout"),$_smarty_tpl ) );?>
">Wyloguj</a></li>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "guest") {?>
								<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"loginShow"),$_smarty_tpl ) );?>
">Zaloguj</a></li>
								<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"registerShow"),$_smarty_tpl ) );?>
">Rejestracja</a></li>
							<?php }?>
						</ul>
					</nav>

					</div> <!-- end of main -->
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_883796173649b8ef046f778_03160347', 'footer');
?>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="https://github.com/ddavmy" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Jakub Linnert - All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"js/jquery.min.js"),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"js/browser.min.js"),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"js/breakpoints.min.js"),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"js/util.js"),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"js/main.js"),$_smarty_tpl ) );?>
"><?php echo '</script'; ?>
>

	</body>
</html><?php }
/* {block 'header'} */
class Block_1198829325649b8ef0462648_58186993 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_1198829325649b8ef0462648_58186993',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'content'} */
class Block_1706364182649b8ef0463615_20359933 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1706364182649b8ef0463615_20359933',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
/* {block 'footer'} */
class Block_883796173649b8ef046f778_03160347 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_883796173649b8ef046f778_03160347',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
}
