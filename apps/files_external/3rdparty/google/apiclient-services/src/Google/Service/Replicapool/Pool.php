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

class Google_Service_Replicapool_Pool extends Google_Collection
{
  protected $collection_key = 'targetPools';
  public $autoRestart;
  public $baseInstanceName;
  public $currentNumReplicas;
  public $description;
  protected $healthChecksType = 'Google_Service_Replicapool_HealthCheck';
  protected $healthChecksDataType = 'array';
  public $initialNumReplicas;
  protected $labelsType = 'Google_Service_Replicapool_Label';
  protected $labelsDataType = 'array';
  public $name;
  public $numReplicas;
  public $resourceViews;
  public $selfLink;
  public $targetPool;
  public $targetPools;
  protected $templateType = 'Google_Service_Replicapool_Template';
  protected $templateDataType = '';
  public $type;

  public function setAutoRestart($autoRestart)
  {
    $this->autoRestart = $autoRestart;
  }
  public function getAutoRestart()
  {
    return $this->autoRestart;
  }
  public function setBaseInstanceName($baseInstanceName)
  {
    $this->baseInstanceName = $baseInstanceName;
  }
  public function getBaseInstanceName()
  {
    return $this->baseInstanceName;
  }
  public function setCurrentNumReplicas($currentNumReplicas)
  {
    $this->currentNumReplicas = $currentNumReplicas;
  }
  public function getCurrentNumReplicas()
  {
    return $this->currentNumReplicas;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Replicapool_HealthCheck
   */
  public function setHealthChecks($healthChecks)
  {
    $this->healthChecks = $healthChecks;
  }
  /**
   * @return Google_Service_Replicapool_HealthCheck
   */
  public function getHealthChecks()
  {
    return $this->healthChecks;
  }
  public function setInitialNumReplicas($initialNumReplicas)
  {
    $this->initialNumReplicas = $initialNumReplicas;
  }
  public function getInitialNumReplicas()
  {
    return $this->initialNumReplicas;
  }
  /**
   * @param Google_Service_Replicapool_Label
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return Google_Service_Replicapool_Label
   */
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
  public function setNumReplicas($numReplicas)
  {
    $this->numReplicas = $numReplicas;
  }
  public function getNumReplicas()
  {
    return $this->numReplicas;
  }
  public function setResourceViews($resourceViews)
  {
    $this->resourceViews = $resourceViews;
  }
  public function getResourceViews()
  {
    return $this->resourceViews;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTargetPool($targetPool)
  {
    $this->targetPool = $targetPool;
  }
  public function getTargetPool()
  {
    return $this->targetPool;
  }
  public function setTargetPools($targetPools)
  {
    $this->targetPools = $targetPools;
  }
  public function getTargetPools()
  {
    return $this->targetPools;
  }
  /**
   * @param Google_Service_Replicapool_Template
   */
  public function setTemplate(Google_Service_Replicapool_Template $template)
  {
    $this->template = $template;
  }
  /**
   * @return Google_Service_Replicapool_Template
   */
  public function getTemplate()
  {
    return $this->template;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
