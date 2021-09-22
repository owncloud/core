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

class DomainMappingStatus extends \Google\Collection
{
  protected $collection_key = 'resourceRecords';
  protected $conditionsType = GoogleCloudRunV1Condition::class;
  protected $conditionsDataType = 'array';
  public $mappedRouteName;
  public $observedGeneration;
  protected $resourceRecordsType = ResourceRecord::class;
  protected $resourceRecordsDataType = 'array';
  public $url;

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
  public function setMappedRouteName($mappedRouteName)
  {
    $this->mappedRouteName = $mappedRouteName;
  }
  public function getMappedRouteName()
  {
    return $this->mappedRouteName;
  }
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param ResourceRecord[]
   */
  public function setResourceRecords($resourceRecords)
  {
    $this->resourceRecords = $resourceRecords;
  }
  /**
   * @return ResourceRecord[]
   */
  public function getResourceRecords()
  {
    return $this->resourceRecords;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DomainMappingStatus::class, 'Google_Service_CloudRun_DomainMappingStatus');
