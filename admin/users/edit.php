<?php
include("./../../app/include/header-admin.php");
include ("./../../app/control/users.php");
?>

<body>
    <div class="container">
        <?php include './../../app/include/sidebar.php'; ?>

        <div class="posts col-9">
            <div class=" button row">
                <a href="<?= BASE_URL . "./admin/users/create.php" ;?>" class="col-3 btn btn-secondary"">Добавить</a>
                   <span class=" col-1"></span>
                    <a href="<?= BASE_URL . "./admin/users/index.php" ;?>" class="col-3 btn btn-primary">Управление</a>
            </div>
            <div class="row ">
                <h3>Редактирование пользователя</h3>
                <!-- <div class="created col-2">Дата публикации</div> -->
                <div class="col-md-12 col-12 errmsg">
               <!-- Вывод массива с ошибками -->
               <?php include "../../app/faq/error_info.php"; ?> 
               </div>
            </div>
            <div class="row add-post">
                <form action="edit.php" method="post">
                    <div class="col">
                        <input type="hidden" name="id" value="<?=$id;?>">
                    </div>
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Логин</label>
                        <input name="login" value="<?=$login;?>" type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Введите ваш логин">
                    </div>
                    
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email адрес</label>
                        <input readonly name="email" value="<?=$mail;?>" type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="Введите ваш почтовый ящик">
                    </div>
                   
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Новый пароль</label>
                        <input name="password-first" type="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Введите ваш пароль">
                    </div>
                    
                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Повтор пароля</label>
                        <input name="password-second" type="password" class="form-control" id="exampleInputPassword2"
                            placeholder="Повтор пароля">
                    </div>
                   
                    <div class="form-check mb-3">
                       <label class="form-check-label" for="status">Админ </label>
                       <input class="form-check-input" type="checkbox" name="admin" id="status" value="1">
                       
                    </div>

                    <div class="col-6 mb-3">
                        <button name="user-edit" class="btn btn-primary" type="submit">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>


    </div>
</body>

<?php
include("./../../app/include/footer.php");
?>