<?php
/* Smarty version 4.3.0, created on 2023-06-22 15:55:28
  from 'E:\dev\xampp\htdocs\projekty\projekt\app\views\templates\messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_649452d000c332_85529544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '043d377bc4ae69d14f3ba0f2c2108190cb741866' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\projekt\\app\\views\\templates\\messages.tpl',
      1 => 1687435565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649452d000c332_85529544 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
        <div id="msgFound">
        <ol>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
        <li class="msg<?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }
if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }
if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
    </div>
    <?php }
}
}
