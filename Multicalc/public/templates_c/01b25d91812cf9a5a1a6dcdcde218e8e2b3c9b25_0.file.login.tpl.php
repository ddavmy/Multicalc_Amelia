<?php
/* Smarty version 4.3.0, created on 2023-06-26 21:19:59
  from 'E:\dev\xampp\htdocs\projekty\projekt\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6499e4dfd6e243_07374302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01b25d91812cf9a5a1a6dcdcde218e8e2b3c9b25' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\projekt\\app\\views\\login.tpl',
      1 => 1687807174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6499e4dfd6e243_07374302 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2273734246499e4dfd57fd7_53268288', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8354658876499e4dfd58f76_34062795', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14455744596499e4dfd59780_13344525', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_2273734246499e4dfd57fd7_53268288 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_2273734246499e4dfd57fd7_53268288',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_8354658876499e4dfd58f76_34062795 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_8354658876499e4dfd58f76_34062795',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_14455744596499e4dfd59780_13344525 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14455744596499e4dfd59780_13344525',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<div id="wrapper">

	<!-- Main -->
	<div id="main">

		<article id="login" class="panel">
			<header>
				<h2>Logowanie</h2>
			</header>
			<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post">
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
				<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/registerShow" class="button">Zarejestruj się</a>
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
