<?php

/*
 * Copyright 2012 Max Schuster 
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

define('EXPORT_DIR', './phar');
define('EXPORT_FILE', EXPORT_DIR . '/htmlhaamr.phar');
define('INPUT_FOLDER', 'de/maxschuster/htmlhaamr');

if (file_exists(EXPORT_FILE)) {
    Phar::unlinkArchive(EXPORT_FILE);
}

echo "Building htmlhaamr...<br />\n";

if (!is_dir(EXPORT_DIR))
    mkdir(EXPORT_DIR);
$p = new Phar(EXPORT_FILE, 0);
$p->compressFiles(Phar::GZ);
$p->setSignatureAlgorithm(Phar::SHA1);
$p->addFile('stub.php');
if (is_dir(INPUT_FOLDER)) {
    echo "Targetfolder exisits<br />\n";
} else {
    die("Targetfolder (".INPUT_FOLDER.") does not exisit!<br />\n");
}
echo "Adding files:<br />\n";
$rd = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(INPUT_FOLDER));
$files = array();
foreach ($rd as $file) {
    $filename = $file->getFilename();
    if ($filename{0} != '.' && !isInHiddenFolder($file->getPath())) {
        $files[$file->getPath() . "/" . $file->getFilename()] = $file->getPath() . DIRECTORY_SEPARATOR . $file->getFilename();
        echo $filePath = str_replace('\\', '/', $file->getPath() . "/" . $file->getFilename());
        echo '<br />';
    }
}

$p->startBuffering();
$p->buildFromIterator(new ArrayIterator($files));
$p->stopBuffering();
//echo $p->createDefaultStub('stub.php');
$p->setStub($p->createDefaultStub('stub.php'));
$p = null;

echo "Building HTML Haamr...Finished<br />\n";

if (isset($_GET['download'])) {
    echo '<p>Download will start shortly...</p>';
    echo '<meta http-equiv="refresh" content="1; URL=download.php">';
}

function isInHiddenFolder($folder) {
    $folderArr = explode(DIRECTORY_SEPARATOR, $folder);

    foreach ($folderArr as $f) {
        if ($f{0} == '.') {
            return true;
        }
    }

    return false;
}

?>