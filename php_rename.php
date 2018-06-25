<?php

system('clear');

$cwd = getcwd(); // Get the current working directory
$listFiles = array_diff(scandir($cwd), array('..','.')); // Get a list of all files but . and ..

$file_arr = array();

foreach($listFiles as $file){
    if(is_dir($file) || substr($file, 0, 1) === "."){
        // If it's a folder or a hidden file, ignore it
        continue;
    } else {
        $file_arr[]=$file;
    }
}

print_r($file_arr);

$fileCount = count($file_arr);

echo "I found " . $fileCount . " files in the directory!" . PHP_EOL;


$newName = readline("Please enter the new name the files will have: ");
$counter = 1;
foreach($file_arr as $file){
    list($filename, $extension) = explode('.', $file);
    rename($file, $newName . "-" . $counter . ".$extension");
    $counter++;
}