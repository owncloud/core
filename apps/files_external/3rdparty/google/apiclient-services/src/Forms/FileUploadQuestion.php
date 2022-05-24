<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Forms;

class FileUploadQuestion extends \Google\Collection
{
  protected $collection_key = 'types';
  /**
   * @var string
   */
  public $folderId;
  /**
   * @var string
   */
  public $maxFileSize;
  /**
   * @var int
   */
  public $maxFiles;
  /**
   * @var string[]
   */
  public $types;

  /**
   * @param string
   */
  public function setFolderId($folderId)
  {
    $this->folderId = $folderId;
  }
  /**
   * @return string
   */
  public function getFolderId()
  {
    return $this->folderId;
  }
  /**
   * @param string
   */
  public function setMaxFileSize($maxFileSize)
  {
    $this->maxFileSize = $maxFileSize;
  }
  /**
   * @return string
   */
  public function getMaxFileSize()
  {
    return $this->maxFileSize;
  }
  /**
   * @param int
   */
  public function setMaxFiles($maxFiles)
  {
    $this->maxFiles = $maxFiles;
  }
  /**
   * @return int
   */
  public function getMaxFiles()
  {
    return $this->maxFiles;
  }
  /**
   * @param string[]
   */
  public function setTypes($types)
  {
    $this->types = $types;
  }
  /**
   * @return string[]
   */
  public function getTypes()
  {
    return $this->types;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FileUploadQuestion::class, 'Google_Service_Forms_FileUploadQuestion');
