<?php
/* Smarty version 4.3.0, created on 2023-06-25 13:05:07
  from 'C:\xampp\htdocs\projekty\projekt\app\views\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64981f63574525_75194759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77b3f9fe098b4780cefdf65e5523c38ea4d089bb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\projekt\\app\\views\\register.tpl',
      1 => 1687691102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64981f63574525_75194759 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107894200164981f635693b0_57779402', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81858722964981f6356a174_82376096', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_127149588264981f6356a919_08002512', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_107894200164981f635693b0_57779402 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_107894200164981f635693b0_57779402',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_81858722964981f6356a174_82376096 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_81858722964981f6356a174_82376096',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_127149588264981f6356a919_08002512 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_127149588264981f6356a919_08002512',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<div id="wrapper">

	<!-- Main -->
	<div id="main">

		<article id="login" class="panel">
			<header>
				<h2>Rejestracja</h2>
			</header>
			<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
register" method="post">
				<div>
					<div class="col">
						<div class="col-6 col-12-xsmall">
                            <input type="text" name="login" autocomplete="off" maxlength="16" size="16" required autofocus placeholder="Username" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
"/>
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="email" name="email" autocomplete="off" maxlength="24" size="24" required placeholder="E-mail" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
"/>
                        </div>
                        <div class="col-6 col-12-medium">
                            <input type="password" name="pass" autocomplete="off" maxlength="24" size="24" required placeholder="Password"/>
                        </div>
                        <div id="submit" class="col-6">
                            <input type="submit" value="Zarejestruj" />
                        </div>
						<div class="col-6">
						</div>
					</div>
				</div>
			</form>
			<h2>Posiadasz konto? Zaloguj się!</h2>
			<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/loginShow" class="button">Zaloguj się</a>
			<div>
				<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			</div>
		</article>
	</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
