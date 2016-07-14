<?php
/* Smarty version 3.1.29, created on 2016-07-14 13:50:59
  from "D:\xampp\htdocs\myshop.local\views\default\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57877ca3f1a696_83662605',
  'file_dependency' => 
  array (
    'b949259b1aebd11dd1f34fdb386b5a6d0a313991' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop.local\\views\\default\\product.tpl',
      1 => 1468496187,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57877ca3f1a696_83662605 ($_smarty_tpl) {
?>

<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>
<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575">
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a href="#" alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание<br /><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
