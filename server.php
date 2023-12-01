<?php
$filecontent = file_get_contents(__DIR__ . '/Model/to-do-list.json');

//var_dump($filecontent);

$list = json_decode($filecontent, true);

//var_dump($list);

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