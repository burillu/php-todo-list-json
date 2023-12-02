<?php
$filecontent = file_get_contents(__DIR__ . '/Model/to-do-list.json');

//var_dump($filecontent);

$list = json_decode($filecontent, true);

//var_dump($list);
$last_id = '';
foreach ($list as $key => $value) {
    $last_id = $value['id'] > $last_id ? $value['id'] : $last_id;
}
//var_dump($last_id);
//arrivano nuove task
if (isset($_POST['task'])) {
    $last_id++;
    $new_task = [
        'text' => $_POST['task'],
        'done' => false,
        'id' => $last_id
    ];

    //var_dump($_POST);
    array_push($list, $new_task);
    //var_dump($list);
    file_put_contents(__DIR__ . '/Model/to-do-list.json', json_encode($list));


}
//task da cancellare
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    //cercare elemento e poi cancellare
    $index = null;
    foreach ($list as $key => $value) {
        if ($value['id'] === $id) {
            $index = $key;
        }

    }
    //var_dump($index);
    unset($list[$id - 1]);
    //var_dump($list);
    file_put_contents(__DIR__ . '/Model/to-do-list.json', json_encode($list));

}

header('Content-Type: application/json');

echo json_encode($list);

?>