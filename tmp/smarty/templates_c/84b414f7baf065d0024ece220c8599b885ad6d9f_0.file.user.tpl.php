<?php
/* Smarty version 3.1.29, created on 2016-07-28 23:32:21
  from "D:\xampp\htdocs\myshop.local\views\default\user.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_579a79e529ea74_00173553',
  'file_dependency' => 
  array (
    '84b414f7baf065d0024ece220c8599b885ad6d9f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop.local\\views\\default\\user.tpl',
      1 => 1469741537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_579a79e529ea74_00173553 ($_smarty_tpl) {
?>

<h1>регистрационные данные</h1>
<table border="0">
    <tr>
        <td>Логин (e-mail)</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    
    <tr>
        <td>Имя</td>
        <td><input type='text' id='newName' value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"</td>
    </tr>
    
    <tr>
        <td>Тел.</td>
        <td><input type='text' id='newPhone' value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"</td>
    </tr>
    
    <tr>
        <td>Адрес</td>
        <td><textarea id='newAddress' value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
"></textarea></td>
    </tr>
    
    <tr>
        <td>Новый пароль</td>
        <td><input type='password' id='newPwd1' value=""</td>
    </tr>
    
     <tr>
        <td>Повтор пароля</td>
        <td><input type='password' id='newPwd2' value=""</td>
    </tr>
    
    <tr>
        <td>Старый пароль для подтверждения изменений</td>
        <td><input type='password' id='curPwd' value=""</td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="Сохранить изменения" onclick="updateUserData();"/></td>
    </tr>
</table>
    <?php }
}
