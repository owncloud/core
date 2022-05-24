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

namespace Google\Service\ServiceManagement;

class ConfigFile extends \Google\Model
{
  /**
   * @var string
   */
  public $fileContents;
  /**
   * @var string
   */
  public $filePath;
  /**
   * @var string
   */
  public $fileType;

  /**
   * @param string
   */
  public function setFileContents($fileContents)
  {
    $this->fileContents = $fileContents;
  }
  /**
   * @return string
   */
  public function getFileContents()
  {
    return $this->fileContents;
  }
  /**
   * @param string
   */
  public function setFilePath($filePath)
  {
    $this->filePath = $filePath;
  }
  /**
   * @return string
   */
  public function getFilePath()
  {
    return $this->filePath;
  }
  /**
   * @param string
   */
  public function setFileType($fileType)
  {
    $this->fileType = $fileType;
  }
  /**
   * @return string
   */
  public function getFileType()
  {
    return $this->fileType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigFile::class, 'Google_Service_ServiceManagement_ConfigFile');
