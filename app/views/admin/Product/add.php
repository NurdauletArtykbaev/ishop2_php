<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Добавить новый товар
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/product"><i class="fa fa-dashboard"></i>Список
                            товаров</a></li>
                    <li class="breadcrumb-item active">Новый товар</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-md 12">
            <div class="box">
                <form action="<?= ADMIN; ?>/product/add" method="post" data-toggle="validator">
                    <div class="box-body">

                        <div class="form-group has-feedback">
                            <label for="title">Наименование товара</label>
                            <input type="text" name="title"
                                   class="form-control" id="title"
                                   placeholder="Наименование товара"
                                   value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null;?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Родительская категория</label>

                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'category_id',
                                    'id' => 'category_id',
                                ],
                                'prepend' => '<option>Выберите категорию</option>'

                            ]);?>
                        </div>

                        <div class="form-group">
                            <label for="keywords">Ключевые слова</label>
                            <input type="text" name="keywords"
                                   class="form-control" id="keywords"
                                   placeholder="Ключевые слова"
                                   value="<?php isset($_SESSION['form_data']['keywords']) ? h($_SESSION['form_data']['keywords']) : null;?>"
                            >
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" name="description"
                                   class="form-control" id="description"
                                   placeholder="Описание"
                                   value="<?php isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null;?>"
                            >
                        </div>

                        <div class="form-group has-feedback">
                            <label for="price">Цена товара</label>
                            <input type="text" name="price"
                                   class="form-control" id="price"
                                   placeholder="Цена товара"
                                   pattern="^[0-9.]{1,}$"
                                   value="<?php isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : null;?>"
                                   required data-error="Допускаются цифры и десятичная точка">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="old_price">Старая цена товара</label>
                            <input type="text" name="old_price"
                                   class="form-control" id="old_price"
                                   placeholder="Старая цена товара"
                                   pattern="^[0-9.]{1,}$"
                                   value="<?php isset($_SESSION['form_data']['old_price']) ? h($_SESSION['form_data']['old_price']) : null;?>"
                                   data-error="Допускаются цифры и десятичная точка">
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="content">Контент</label>
                            <textarea name="content" id="editor1" cols="80" rows="10" >
                                <?php isset($_SESSION['form_data']['content']) ? h($_SESSION['form_data']['content']) : null;?>
                            </textarea>
                        </div>

                        <div class="form-control">
                            <label>
                                <input type="checkbox" name="status" checked> Статус
                            </label>
                        </div>

                        <div class="form-control">
                            <label>
                                <input type="checkbox" name="hit" checked> Хит
                            </label>
                        </div>

                        <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php');?>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class=" btn btn-success">Добавить</button>
                    </div>
                </form>
                <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
            </div>

        </div>
    </div>
</section>