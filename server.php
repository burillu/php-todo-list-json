<?php
$filecontent = file_get_contents(__DIR__ . '/Model/to-do-list.json');



$list = json_decode($filecontent, true);


$last_id = '';
foreach ($list as $key => $value) {
    $last_id = $value['id'] > $last_id ? $value['id'] : $last_id;
}

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
    $index = $_POST['delete'];
    //cercare elemento e poi cancellare

    unset($list[$index]);

    file_put_contents(__DIR__ . '/Model/to-do-list.json', json_encode($list));

}
//task fatte
if (isset($_POST['done'])) {
    $index = $_POST['done'];
    $list[$index]['done'] = !$list[$index]['done'];

    file_put_contents(__DIR__ . '/Model/to-do-list.json', json_encode($list));

}

header('Content-Type: application/json');

echo json_encode($list);

?>