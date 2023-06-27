<?php
/* Smarty version 4.3.0, created on 2023-06-25 16:22:24
  from 'E:\dev\xampp\htdocs\projekty\projekt\app\views\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64984da0681125_06536425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d1319f00668cba704085c875ed6a0c6b5acdb10' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\projekt\\app\\views\\register.tpl',
      1 => 1687691102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_64984da0681125_06536425 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_76118212964984da0675926_72282153', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192750489964984da06762b9_10352698', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15270186264984da06768d0_37610594', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_76118212964984da0675926_72282153 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_76118212964984da0675926_72282153',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_192750489964984da06762b9_10352698 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_192750489964984da06762b9_10352698',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_15270186264984da06768d0_37610594 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15270186264984da06768d0_37610594',
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
