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

namespace Google\Service\DeploymentManager;

class DeploymentmanagerResource extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $accessControlType = ResourceAccessControl::class;
  protected $accessControlDataType = '';
  /**
   * @var string
   */
  public $finalProperties;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $insertTime;
  /**
   * @var string
   */
  public $manifest;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $properties;
  /**
   * @var string
   */
  public $type;
  protected $updateType = ResourceUpdate::class;
  protected $updateDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $url;
  protected $warningsType = DeploymentmanagerResourceWarnings::class;
  protected $warningsDataType = 'array';

  /**
   * @param ResourceAccessControl
   */
  public function setAccessControl(ResourceAccessControl $accessControl)
  {
    $this->accessControl = $accessControl;
  }
  /**
   * @return ResourceAccessControl
   */
  public function getAccessControl()
  {
    return $this->accessControl;
  }
  /**
   * @param string
   */
  public function setFinalProperties($finalProperties)
  {
    $this->finalProperties = $finalProperties;
  }
  /**
   * @return string
   */
  public function getFinalProperties()
  {
    return $this->finalProperties;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  /**
   * @return string
   */
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  /**
   * @param string
   */
  public function setManifest($manifest)
  {
    $this->manifest = $manifest;
  }
  /**
   * @return string
   */
  public function getManifest()
  {
    return $this->manifest;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setProperties($properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return string
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param ResourceUpdate
   */
  public function setUpdate(ResourceUpdate $update)
  {
    $this->update = $update;
  }
  /**
   * @return ResourceUpdate
   */
  public function getUpdate()
  {
    return $this->update;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param DeploymentmanagerResourceWarnings[]
   */
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  /**
   * @return DeploymentmanagerResourceWarnings[]
   */
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeploymentmanagerResource::class, 'Google_Service_DeploymentManager_DeploymentmanagerResource');
