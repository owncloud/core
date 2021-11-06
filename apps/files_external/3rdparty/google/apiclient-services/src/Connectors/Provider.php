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

namespace Google\Service\Connectors;

class Provider extends \Google\Model
{
  public $createTime;
  public $description;
  public $displayName;
  public $documentationUri;
  public $externalUri;
  public $labels;
  public $name;
  public $updateTime;
  public $webAssetsLocation;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDocumentationUri($documentationUri)
  {
    $this->documentationUri = $documentationUri;
  }
  public function getDocumentationUri()
  {
    return $this->documentationUri;
  }
  public function setExternalUri($externalUri)
  {
    $this->externalUri = $externalUri;
  }
  public function getExternalUri()
  {
    return $this->externalUri;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setWebAssetsLocation($webAssetsLocation)
  {
    $this->webAssetsLocation = $webAssetsLocation;
  }
  public function getWebAssetsLocation()
  {
    return $this->webAssetsLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Provider::class, 'Google_Service_Connectors_Provider');
