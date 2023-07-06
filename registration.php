<?php 
include "./app/include/header.php";
include "./app/control/users.php";
?>



<div class="container reg_form">

    <form class="row justify-content-center" method="post" action="registration.php">
        <h3>Форма регистрации</h3>
        <div class="mb-3 col-md-4 col-12 ">
            <p class="errmsg"><?=$errMessage?></p>
            <p class="assent"><?=$approve?></p>
        </div>

        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
            <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput"
                placeholder="Введите ваш логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
            <label for="exampleInputEmail1" class="form-label">Email адрес</label>
            <input name="mail" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1"
                placeholder="Введите ваш почтовый ящик">
            <div id="emailHelp" class="form-text">Мы не передаем ваши данные другим лицам</div>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password-first" type="password" class="form-control" id="exampleInputPassword1"
                placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
            <label for="exampleInputPassword1" class="form-label">Повтор пароля</label>
            <input name="password-second" type="password" class="form-control" id="exampleInputPassword2"
                placeholder="Повтор пароля">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
            <button name="button-reg" type="submit" class="btn btn-primary btn-secondary">Регистрация</button>
            <a href="autorization.php">Я уже регистрировался</a>
        </div>
        <div class="w-100"></div>

    </form>
</div>

<?php 
include "./app/include/footer.php";
?>