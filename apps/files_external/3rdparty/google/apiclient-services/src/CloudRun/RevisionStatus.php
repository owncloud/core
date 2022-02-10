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

namespace Google\Service\CloudRun;

class RevisionStatus extends \Google\Collection
{
  protected $collection_key = 'conditions';
  protected $conditionsType = GoogleCloudRunV1Condition::class;
  protected $conditionsDataType = 'array';
  /**
   * @var string
   */
  public $imageDigest;
  /**
   * @var string
   */
  public $logUrl;
  /**
   * @var int
   */
  public $observedGeneration;
  /**
   * @var string
   */
  public $serviceName;

  /**
   * @param GoogleCloudRunV1Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return GoogleCloudRunV1Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  /**
   * @param string
   */
  public function setImageDigest($imageDigest)
  {
    $this->imageDigest = $imageDigest;
  }
  /**
   * @return string
   */
  public function getImageDigest()
  {
    return $this->imageDigest;
  }
  /**
   * @param string
   */
  public function setLogUrl($logUrl)
  {
    $this->logUrl = $logUrl;
  }
  /**
   * @return string
   */
  public function getLogUrl()
  {
    return $this->logUrl;
  }
  /**
   * @param int
   */
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  /**
   * @return int
   */
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param string
   */
  public function setServiceName($serviceName)
  {
    $this->serviceName = $serviceName;
  }
  /**
   * @return string
   */
  public function getServiceName()
  {
    return $this->serviceName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RevisionStatus::class, 'Google_Service_CloudRun_RevisionStatus');
