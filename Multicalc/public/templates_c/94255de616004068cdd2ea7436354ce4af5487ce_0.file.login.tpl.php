<?php
/* Smarty version 4.3.0, created on 2023-07-11 16:28:12
  from 'C:\xampp\htdocs\projekty\Multicalc\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64ad66fcd41021_00608720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94255de616004068cdd2ea7436354ce4af5487ce' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\login.tpl',
      1 => 1688826208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64ad66fcd41021_00608720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104874683264ad66fcd37761_31067107', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_104874683264ad66fcd37761_31067107 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_104874683264ad66fcd37761_31067107',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


	<!-- Main -->
	<div id="main">

		<article id="login" class="panel">
			<header>
				<h2>Logowanie</h2>
			</header>
			<form action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"login"),$_smarty_tpl ) );?>
" method="post">
				<div>
					<div class="col">
						<div class="col-6 col-12-medium">
							<input type="text" name="login" autocomplete="off" maxlength="16" size="16" required autofocus placeholder="Username"/>
                        </div>
                        <div class="col-6 col-12-medium">
							<input type="password" name="pass" autocomplete="off" maxlength="24" size="24" required placeholder="Password"/>
                        </div>
                        <div id="submit" class="col-6">
                            <input type="submit" value="Zaloguj" />
                        </div>
						<div class="col-6">
						</div>
					</div>
				</div>
			</form>
				<h2>Nie masz jeszcze konta?</h2>
				<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['rel_url'][0], array( array('action'=>"registerShow"),$_smarty_tpl ) );?>
" class="button">Zarejestruj się</a>
			<div>
				<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			</div>
		</article>
	</div>

<?php
}
}
/* {/block 'content'} */
}
