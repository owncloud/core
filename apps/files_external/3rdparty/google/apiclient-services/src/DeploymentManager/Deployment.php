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

class Deployment extends \Google\Collection
{
  protected $collection_key = 'labels';
  public $description;
  public $fingerprint;
  public $id;
  public $insertTime;
  protected $labelsType = DeploymentLabelEntry::class;
  protected $labelsDataType = 'array';
  public $manifest;
  public $name;
  protected $operationType = Operation::class;
  protected $operationDataType = '';
  public $selfLink;
  protected $targetType = TargetConfiguration::class;
  protected $targetDataType = '';
  protected $updateType = DeploymentUpdate::class;
  protected $updateDataType = '';
  public $updateTime;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setInsertTime($insertTime)
  {
    $this->insertTime = $insertTime;
  }
  public function getInsertTime()
  {
    return $this->insertTime;
  }
  /**
   * @param DeploymentLabelEntry[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return DeploymentLabelEntry[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  public function setManifest($manifest)
  {
    $this->manifest = $manifest;
  }
  public function getManifest()
  {
    return $this->manifest;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Operation
   */
  public function setOperation(Operation $operation)
  {
    $this->operation = $operation;
  }
  /**
   * @return Operation
   */
  public function getOperation()
  {
    return $this->operation;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param TargetConfiguration
   */
  public function setTarget(TargetConfiguration $target)
  {
    $this->target = $target;
  }
  /**
   * @return TargetConfiguration
   */
  public function getTarget()
  {
    return $this->target;
  }
  /**
   * @param DeploymentUpdate
   */
  public function setUpdate(DeploymentUpdate $update)
  {
    $this->update = $update;
  }
  /**
   * @return DeploymentUpdate
   */
  public function getUpdate()
  {
    return $this->update;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Deployment::class, 'Google_Service_DeploymentManager_Deployment');
