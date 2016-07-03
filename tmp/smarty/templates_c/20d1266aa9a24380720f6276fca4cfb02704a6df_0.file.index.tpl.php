<?php
/* Smarty version 3.1.29, created on 2016-07-03 12:21:11
  from "D:\xampp\htdocs\myshop.local\views\default\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5778e717863828_99931163',
  'file_dependency' => 
  array (
    '20d1266aa9a24380720f6276fca4cfb02704a6df' => 
    array (
      0 => 'D:\\xampp\\htdocs\\myshop.local\\views\\default\\index.tpl',
      1 => 1467541263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5778e717863828_99931163 ($_smarty_tpl) {
?>
<html>
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
</head>

<body>

    <div id="header">
        <h1>myshop - интернет-магазин</h1>
    </div>

    <div id="leftColumn">
        <div id="leftMenu">
            <div class="menuCaption">Меню:</div>
            пункт1 <br />
            пункт2 <br />
            пункт3 <br />

        </div>
    </div>

<div id="centralColounm">centralColounm</div>


<div id="footer">footer</div>

</body>

</html><?php }
}
