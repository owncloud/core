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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1OrganizationProjectMapping extends \Google\Collection
{
  protected $collection_key = 'projectIds';
  /**
   * @var string
   */
  public $location;
  /**
   * @var string
   */
  public $organization;
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string[]
   */
  public $projectIds;

  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param string
   */
  public function setOrganization($organization)
  {
    $this->organization = $organization;
  }
  /**
   * @return string
   */
  public function getOrganization()
  {
    return $this->organization;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string[]
   */
  public function setProjectIds($projectIds)
  {
    $this->projectIds = $projectIds;
  }
  /**
   * @return string[]
   */
  public function getProjectIds()
  {
    return $this->projectIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1OrganizationProjectMapping::class, 'Google_Service_Apigee_GoogleCloudApigeeV1OrganizationProjectMapping');
