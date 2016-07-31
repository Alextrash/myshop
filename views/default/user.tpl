{*Страница кабинета авторизованного пользователя*}
<h1>регистрационные данные</h1>

<div id="userDataBox">
<table border="0">
    <tr>
        <td>Логин (e-mail)</td>
        <td>{$arUser['email']}</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" id="newName" name="newName" value="{$arUser['name']}"/></td>
    </tr>
    <tr>
        <td>Тел.</td>
        <td><input type="text" id="newPhone" name="newPhone" value="{$arUser['phone']}"/></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAddress" name="newAddress" value="{$arUser['address']}"></textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPwd1" name="newPwd1" value=""/></td>
    </tr>
     <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPwd2" name="newPwd2" value=""/></td>
    </tr>
    <tr>
        <td>Старый пароль для подтверждения изменений</td>
        <td><input type="password" id="curPwd" name="curPwd" value=""/></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" onclick="updateUserData();" value="Сохранить изменения"/></td>
    </tr>
</table>    
</div>