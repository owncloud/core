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

namespace Google\Service\SecurityCommandCenter;

class GoogleCloudSecuritycenterV1ExternalSystem extends \Google\Collection
{
  protected $collection_key = 'assignees';
  /**
   * @var string[]
   */
  public $assignees;
  /**
   * @var string
   */
  public $externalSystemUpdateTime;
  /**
   * @var string
   */
  public $externalUid;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $status;

  /**
   * @param string[]
   */
  public function setAssignees($assignees)
  {
    $this->assignees = $assignees;
  }
  /**
   * @return string[]
   */
  public function getAssignees()
  {
    return $this->assignees;
  }
  /**
   * @param string
   */
  public function setExternalSystemUpdateTime($externalSystemUpdateTime)
  {
    $this->externalSystemUpdateTime = $externalSystemUpdateTime;
  }
  /**
   * @return string
   */
  public function getExternalSystemUpdateTime()
  {
    return $this->externalSystemUpdateTime;
  }
  /**
   * @param string
   */
  public function setExternalUid($externalUid)
  {
    $this->externalUid = $externalUid;
  }
  /**
   * @return string
   */
  public function getExternalUid()
  {
    return $this->externalUid;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudSecuritycenterV1ExternalSystem::class, 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1ExternalSystem');
