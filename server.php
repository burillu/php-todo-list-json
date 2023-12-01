<?php
$filecontent = file_get_contents(__DIR__ . '/Model/to-do-list.json');

//var_dump($filecontent);

$list = json_decode($filecontent, true);

//var_dump($list);

if (isset($_POST['task'])) {
    $new_task = [
        'text' => $_POST['task'],
        'done' => false,
        'id' => 4
    ];

    //var_dump($_POST);
    array_push($list, $new_task);
    //var_dump($list);
    file_put_contents(__DIR__ . '/Model/to-do-list.json', json_encode($list));


}

// $students = [
//     [
//         'name' => 'Mario',
//         'last_name' => 'Rossi'
//     ],
//     [
//         'name' => 'Giovanna',
//         'last_name' => 'Bianchi'
//     ],
// ];

// $list[] = 'Vue';
// $newContent = json_encode($list);
// file_put_contents('todo-list.json', $newContent);


header('Content-Type: application/json');

echo json_encode($list);

?>