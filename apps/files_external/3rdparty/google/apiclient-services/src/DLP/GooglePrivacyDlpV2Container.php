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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2Container extends \Google\Model
{
  public $fullPath;
  public $projectId;
  public $relativePath;
  public $rootPath;
  public $type;
  public $updateTime;
  public $version;

  public function setFullPath($fullPath)
  {
    $this->fullPath = $fullPath;
  }
  public function getFullPath()
  {
    return $this->fullPath;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setRelativePath($relativePath)
  {
    $this->relativePath = $relativePath;
  }
  public function getRelativePath()
  {
    return $this->relativePath;
  }
  public function setRootPath($rootPath)
  {
    $this->rootPath = $rootPath;
  }
  public function getRootPath()
  {
    return $this->rootPath;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2Container::class, 'Google_Service_DLP_GooglePrivacyDlpV2Container');
