<?php
/* Smarty version 4.3.0, created on 2023-06-23 18:45:44
  from 'C:\xampp\htdocs\projekty\projekt\app\views\templates\messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6495cc388efc59_13422615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3203f0335e64c68a5933bed4c6956b544cedac26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekty\\projekt\\app\\views\\templates\\messages.tpl',
      1 => 1687435565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6495cc388efc59_13422615 (Smarty_Internal_Template $_smarty_tpl) {
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
