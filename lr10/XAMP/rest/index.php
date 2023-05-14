<?php
require_once '../vendor/autoload.php';
require_once "../classes/types.php";
require_once "../classes/works.php";
$app = new Silex\Application();
header("Access-Control-Allow-Origin: *");
//для групп:
$app->get('/types/list.json', function () use ($app){
	$cur_type = new Types;
	$list = $cur_type->read();
	return $app->json($list);
});
$app->post('/types/add-item', function () use ($app){
	if (strlen($_POST['type'])) {
        $input = json_decode($_POST['type'],true);
		$type = $input['type_name'];
        $cur_type = new Types;
		try {
            $cur_type->create(array("type_name" => $type));
			$lastid = $cur_type->lastID();
			return $app->json(array("create-group" => "yes", "create-id" => $lastid));
		} catch (PDOException $e) {
			return $app->json(array("error" => $e->getMessage(), "create-group" => "no"));
		}
	} else {
		return $app->json(array("create-group" => "no"));
	}
});
$app->post('/types/update-item', function ()use ($app) {
    $cur_type = new Types;
    $input = json_decode($_POST['type'],true);
	$typeName = $input['type_name'];
    $id = $input['type_id'];
	if ($cur_type->exists($id) && strlen($typeName)) {
		try {
            $cur_type->update(array("type_id" => $id, "type_name" => $typeName));
			return $app->json(array("update-group" => "yes", "id_update" => $id));
		} catch (PDOException $e) {
			return $app->json(array("error" => $e->getMessage(), "update-group" => "no"));
		}
	} else {
		return $app->json(array("update-group" => "no"));
	}
});

$app->post('/types/delete-item', function ()use ($app) {
    $cur_type = new Types;
    $input = json_decode($_POST['type'],true);
    $id = $input['id'];
	if ($cur_type->exists($id)) {
		try {
            $cur_type->delete($id);
			return $app->json(array("delete-group" => "yes", "id_delete" => $id));
		} catch (PDOException $e) {
			return $app->json(array("error" => $e->getMessage(), "delete-group" => "no"));
		}
	} else {
		return $app->json(array("delete-group" => "no"));
	}
});

//для студентов:

$app->get('/works/list.json', function () use ($app){
	$cur_work = new Works;
	$list = $cur_work->read();
	return $app->json($list);
});
$app->post('/works/add-item', function () use ($app) {
    $input = json_decode($_POST['work'],true);
	$name = $input["name"];
    $description = $input["description"];
    $cost = $input["cost"];
    $type_id = $input["type_name"];
    $cur_type = new Types;
	if (strlen($name) && $cur_type->exists($type_id)) {
        $cur_work = new Works;
		try {
            $cur_work->create(array('name' => $name, "description" => $description, "cost" => $cost, "id_repair" => $type_id));
			$lastid = $cur_work->lastID();
			return $app->json(array("create-student" => "yes", "create-id" => $lastid));
		} catch (PDOException $e) {
			return $app->json(array("error" => $e->getMessage(), "create-student" => "no"));
		}
	} else {
		return $app->json(array("create-student" => "no"));
	}
});
$app->post('/works/update-item', function () use ($app){
    $input = json_decode($_POST['work'],true);
	$id = $input["id"];
    $name = $input["name"];
    $description = $input["description"];
    $cost = $input["cost"];
    $type_id = $input["type_name"];
    $cur_work = new Works;
	if ($cur_work->exists($id) && strlen($name)) {
		try {
            $cur_work->update(array("id" => $id, "name" => $name, "description" => $description, "cost" => $cost, "id_repair" => $type_id    ));
			return $app->json(array("update-student" => "yes", "id_update" => $id));
		} catch (PDOException $e) {
			return $app->json(array("error" => $e->getMessage(), "update-student" => "no"));
		}
	} else {
		return $app->json(array("update-student" => "no"));
	}
});

$app->post('/works/delete-item', function () use ($app) {
	$id = intval($_POST['id']);
    $cur_work = new Works;
	if ($cur_work->exists($id)) {
		try {
            $cur_work->delete($id);
			return $app->json(array("delete-student" => "yes", "id_delete" => $id));
		} catch (PDOException $e) {
			return $app->json(array("error" => $e->getMessage(), "delete-student" => "no"));
		}
	} else {
		return $app->json(array("delete-student" => "no"));
	}
});

$app->post('/works/list-filtred.json', function () use ($app){
    $cur_work = new Works();
    $id = intval($_POST['id']);
    $list = $cur_work->filter($id);
    return $app->json($list);
});

$app->run();