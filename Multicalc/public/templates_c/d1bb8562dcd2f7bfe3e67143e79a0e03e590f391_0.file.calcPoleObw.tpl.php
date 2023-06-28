<?php
/* Smarty version 4.3.0, created on 2023-06-28 03:33:20
  from 'E:\dev\xampp\htdocs\projekty\Multicalc\app\views\calcPoleObw.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649b8de0ac5038_35057157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1bb8562dcd2f7bfe3e67143e79a0e03e590f391' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\Multicalc\\app\\views\\calcPoleObw.tpl',
      1 => 1687914835,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_649b8de0ac5038_35057157 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_548930038649b8de0a9f279_29537295', 'header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_360954341649b8de0a9fe02_77111642', 'footer');
?>

		
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_194476525649b8de0aa0452_48407106', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'header'} */
class Block_548930038649b8de0a9f279_29537295 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'header' => 
  array (
    0 => 'Block_548930038649b8de0a9f279_29537295',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'header'} */
/* {block 'footer'} */
class Block_360954341649b8de0a9fe02_77111642 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'footer' => 
  array (
    0 => 'Block_360954341649b8de0a9fe02_77111642',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_194476525649b8de0aa0452_48407106 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_194476525649b8de0aa0452_48407106',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	
    <section id="tilesPoleObw" class="tiles">
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Kwadrat</h2>
			</a>
		</article>
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Prostokąt</h2>
			</a>
		</article>
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Trójkąt</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Romb</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Trapez</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Równoległobok</h2>
			</a>
        </article>
		<article class="style1">
			<span class="image">
				<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
" alt="" />
			</span>
			<a>
				<h2>Koło</h2>
			</a>
        </article>
		<article class="style3">
	    	<span class="image">
	    		<img src="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('action'=>"images/pic01.jpg"),$_smarty_tpl ) );?>
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
<?php
}
}
/* {/block 'content'} */
}
