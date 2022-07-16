<?php 

if(isset($_POST['submit'])){
    addToDoList($_POST['to-do-list']);
    header('Location: index.php');
}

if(isset($_POST['remove-to-do-list'])){
    removeToDoList($_POST['remove-to-do-list']);
    header('Location: index.php');
}

function addToDoList($value){
    $stream=fopen('file/to-do-list.txt', 'a');
    $value="$value|";
    fwrite($stream, $value);
    fclose($stream);
}

function getToDoList(){
    $stream=fopen('file/to-do-list.txt', 'r');
    $listItem=fread($stream, filesize('file/to-do-list.txt'));
    fclose($stream);
    $result=explode('|', $listItem);
    array_pop($result);
    return $result;
}

function removeToDoList($text){
    $toDoList=join('|', getToDoList());
    if(str_contains($toDoList, $text)){
        $toDoList=str_replace($text, '', $toDoList);
    }
    rewriteToDoList($toDoList);
}

function rewriteToDoList($toDoList){
    $stream=fopen('file/to-do-list.txt', 'w');
    fwrite($stream, $toDoList);
    fclose($stream);
}

?>