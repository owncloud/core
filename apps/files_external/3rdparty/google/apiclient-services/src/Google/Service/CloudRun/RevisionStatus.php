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

class Google_Service_CloudRun_RevisionStatus extends Google_Collection
{
  protected $collection_key = 'conditions';
  protected $conditionsType = 'Google_Service_CloudRun_GoogleCloudRunV1Condition';
  protected $conditionsDataType = 'array';
  public $imageDigest;
  public $logUrl;
  public $observedGeneration;
  public $serviceName;

  /**
   * @param Google_Service_CloudRun_GoogleCloudRunV1Condition
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return Google_Service_CloudRun_GoogleCloudRunV1Condition
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setImageDigest($imageDigest)
  {
    $this->imageDigest = $imageDigest;
  }
  public function getImageDigest()
  {
    return $this->imageDigest;
  }
  public function setLogUrl($logUrl)
  {
    $this->logUrl = $logUrl;
  }
  public function getLogUrl()
  {
    return $this->logUrl;
  }
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  public function getServiceName()
  {
    return $this->serviceName;
  }
}
