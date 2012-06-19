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

namespace de\maxschuster\htmlhaamr;

/**
 * This class contains some methods to analyse file paths an extensions and get
 * the right mimetype
 *
 * @author Max Schuster
 * @package htmlhaamr
 */
class MimeAnalyser {
    /**
     * Assoc. array containing the mimetypes as values
     * and the extensions as keys
     * @var array
     */
    static protected $mimelist = array(
        'ico' => 'image/x-icon',
        'png' => 'image/png',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif'
    );
    
    /**
     * Gets the mimetype of the given file extension or returns false
     * @param string $extension The file extension
     * @return string|boolean The mimetype or false
     */
    public static function getByExtension($extension) {
        if (isset(self::$mimelist[$extension])) {
            return self::$mimelist[$extension];
        }
        return false;
    }
    
    /**
     * Gets the mimetype of the given url or returns false
     * @param string $url
     * @return string|boolean
     */
    public static function getByUrl($url) {
        $extension = pathinfo($url, PATHINFO_EXTENSION);
        if (is_string($extension) && !empty($extension)) {
            return self::getByExtension($extension);
        }
        return false;
    }
}

?>
