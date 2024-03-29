<?php
/**
 * @var string $title
 * @var string $table
 * @var array $columns
 * @var array-key $values
 */
include($_SERVER['DOCUMENT_ROOT'] . '/src/header/doctype.php');
echo "<title><?= $title ?></title></head><body>";
include($_SERVER['DOCUMENT_ROOT'] . '/src/header/header.php');

?>
<div class="wrapper">
    <div class="container">
        <div class="bg-secondary mt-5 d-flex align-items-center">
            <a href="../../pages/<?= $table ?>" class="nav-link text-white link-hover"><?= $title ?></a>
            <span class="text-white">/</span>
            <a href="#"
               class="text-white nav-link link-hover"><?= isset($_GET['item_id']) ? $_GET['item_id'] : "Новая запись" ?></a>
        </div>
        <form action="#" class="form mt-5 d-flex flex-column shadow-lg p-5 text-start" method="post"
              enctype="multipart/form-data">
            <h3 class="text-black" >Форма <?= isset($_GET['item_id']) ? ' редактирования' : " добавления" ?></h3>
            <?php if (isset($_GET['item_id'])) : ?>
                <input type="number" class="d-none" name="item_id" value="<?= $_GET['item_id'] ?>">
            <?php endif ?>
            <?php if(isset($errors) && $errors != 1) echo $errors?>
            <?php foreach ($columns as $i => $column) : if ($column == 'id') continue; ?>
                <?php if (is_int(strpos($column, 'id_')) === true) : ?>
                    <select name="item_<?= $column ?>" id="" class="form-select w-50 m-3">
                        <option value="">Выбор</option>
                        <?php foreach ($items = TypesTable::getItems() as $item) : ?>
                            <?php if ($values !== '' && $values[0]['id_repair'] == $item['id']) : ?>
                                <option selected value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php else : ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                <?php else : ?>
                    <div class="d-flex col-4 mb-3">
                        <input type="<?=is_int(strpos($column, "image_path")) ? "file" : "text" ?>"
                               class="form-control  m-3" placeholder="<?= $column ?>"
                               name="item_<?= $column ?>"
                               value="<?= !empty($values[0][$column]) ? $values[0][$column] : '' ?>"/>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <button class="btn btn-success col-4"><?= isset($_GET['item_id']) ? 'Редактировать' : "Добавить" ?></button>
        </form>
    </div>
</div>
</body>
</html>
