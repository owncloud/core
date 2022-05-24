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

class GoogleCloudApigeeV1ResourceStatus extends \Google\Collection
{
  protected $collection_key = 'revisions';
  /**
   * @var string
   */
  public $resource;
  protected $revisionsType = GoogleCloudApigeeV1RevisionStatus::class;
  protected $revisionsDataType = 'array';
  /**
   * @var int
   */
  public $totalReplicas;
  /**
   * @var string
   */
  public $uid;

  /**
   * @param string
   */
  public function setResource($resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return string
   */
  public function getResource()
  {
    return $this->resource;
  }
  /**
   * @param GoogleCloudApigeeV1RevisionStatus[]
   */
  public function setRevisions($revisions)
  {
    $this->revisions = $revisions;
  }
  /**
   * @return GoogleCloudApigeeV1RevisionStatus[]
   */
  public function getRevisions()
  {
    return $this->revisions;
  }
  /**
   * @param int
   */
  public function setTotalReplicas($totalReplicas)
  {
    $this->totalReplicas = $totalReplicas;
  }
  /**
   * @return int
   */
  public function getTotalReplicas()
  {
    return $this->totalReplicas;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ResourceStatus::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ResourceStatus');
