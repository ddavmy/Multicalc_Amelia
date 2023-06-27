<?php
/* Smarty version 4.3.0, created on 2023-06-23 03:34:00
  from 'E:\dev\xampp\htdocs\projekty\projekt\app\views\wynik.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6494f688e4a2b7_81678483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '453db6dce86d2bacebb161371720a0347262ff79' => 
    array (
      0 => 'E:\\dev\\xampp\\htdocs\\projekty\\projekt\\app\\views\\wynik.tpl',
      1 => 1687436060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6494f688e4a2b7_81678483 (Smarty_Internal_Template $_smarty_tpl) {
?><table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>A</th>
            <th>B</th>
            <th>C</th>
            <th>Delta</th>
            <th>x<sub>1</sub></th>
            <th>x<sub>2</sub></th>
                            <th>Opcje</th>
                    </tr>
    </thead>
    <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['record']->value, 'r');
$_smarty_tpl->tpl_vars['r']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->do_else = false;
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['r']->value["a"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["b"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["c"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["delta"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["pierwPierwszy"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['r']->value["pierwDrugi"];?>
</td><td><a id="recordDelete" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wynikDelete/<?php echo $_smarty_tpl->tpl_vars['r']->value['idwynik'];?>
">Usuń</a></td></tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
    </table><?php }
}
