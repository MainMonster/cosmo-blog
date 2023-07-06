<?php 
include "./app/include/header.php";
include "./app/control/users.php";

?>
<!-- end header -->
<!-- form -->
<div class="container reg_form " > 
     <form class="row justify-content-md-center" method="post" action="autorization.php">
        <h3>Авторизация</h3>
            <div class="col-md-12 col-12 errmsg">
               <!-- Вывод массива с ошибками -->
            <?php include "./app/faq/error_info.php"; ?> 
            </div>
         
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
        <label for="exampleInputEmail1" class="form-label">Email адрес</label>
        <input name="mail"  value="<?=$email?>"  type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите ваш почтовый ящик">
        
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12">
        <label for="exampleInputPassword1" class="form-label">Пароль</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="w-100"></div>
        <div class="mb-3 col-md-4 col-12 ">
        <button name="button-log" type="submit" class="btn btn-primary btn-secondary">Войти</button>
       <a href="registration.php">Зарегистрироваться</a>
    </div>
        <div class="w-100"></div>

    </form>
</div>
<!-- end form -->
<!-- footer -->
<?php 
include "./app/include/footer.php";
?>