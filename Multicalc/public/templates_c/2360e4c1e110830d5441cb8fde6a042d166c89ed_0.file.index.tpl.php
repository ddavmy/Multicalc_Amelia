<?php
/* Smarty version 4.3.0, created on 2023-06-25 12:49:16
  from 'C:\xampp\htdocs\projekty\projekt\app\views\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64981bac7877a4_81328027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2360e4c1e110830d5441cb8fde6a042d166c89ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\projekt\\app\\views\\index.tpl',
      1 => 1687690118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64981bac7877a4_81328027 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_54937071464981bac77c227_67410750', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_54937071464981bac77c227_67410750 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_54937071464981bac77c227_67410750',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<!-- Main -->
				<div id="main">
					<div class="inner">
						<header>
							<h1>Oto wielozadaniowy kalkulator.</h1>
							<?php if ($_smarty_tpl->tpl_vars['user']->value->role != "guest") {?><p>Witaj <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
! Twoja rola to: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</p><?php }?>
							<p>Wybierz spośród wielu dostępnych opcji i upewnij się co do wyniku dzięki naszym niezawodnym kalkulatorom!</p>
						</header>
					</div>
					<section class="tiles">
						<article class="style1">
							<span class="image">
								<img src="images/pic01.jpg" alt="" />
							</span>
							<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
poleObwShow">
								<h2>Pole i obwód</h2>
								<div class="content">
									<p>Kwadrat Prostokąt Trójkąt Romb Trapez Równoległobok Koło</p>
								</div>
							</a>
						</article>
						<article class="style2">
							<span class="image">
								<img src="images/pic02.jpg" alt="" />
							</span>
							<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deltaShow">
								<h2>Delta</h2>
								<div class="content">
									<p>oraz jej pierwiastki</p>
								</div>
							</a>
						</article>
						<article class="style3">
							<span class="image">
								<img src="images/pic03.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
						<article class="style4">
							<span class="image">
								<img src="images/pic04.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
						<article class="style5">
							<span class="image">
								<img src="images/pic05.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
						<article class="style6">
							<span class="image">
								<img src="images/pic06.jpg" alt="" />
							</span>
							<a>
								<h2>Coming next</h2>
								<div class="content">
									<p>Kalkulator niedostępny na czas zmian.</p>
								</div>
							</a>
						</article>
					</section>
				</div>
			</div>
<?php
}
}
/* {/block 'content'} */
}
