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

namespace Google\Service\Dataflow;

class Snapshot extends \Google\Collection
{
  protected $collection_key = 'pubsubMetadata';
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $diskSizeBytes;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $projectId;
  protected $pubsubMetadataType = PubsubSnapshotMetadata::class;
  protected $pubsubMetadataDataType = 'array';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $sourceJobId;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $ttl;

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setDiskSizeBytes($diskSizeBytes)
  {
    $this->diskSizeBytes = $diskSizeBytes;
  }
  /**
   * @return string
   */
  public function getDiskSizeBytes()
  {
    return $this->diskSizeBytes;
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
   * @param PubsubSnapshotMetadata[]
   */
  public function setPubsubMetadata($pubsubMetadata)
  {
    $this->pubsubMetadata = $pubsubMetadata;
  }
  /**
   * @return PubsubSnapshotMetadata[]
   */
  public function getPubsubMetadata()
  {
    return $this->pubsubMetadata;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setSourceJobId($sourceJobId)
  {
    $this->sourceJobId = $sourceJobId;
  }
  /**
   * @return string
   */
  public function getSourceJobId()
  {
    return $this->sourceJobId;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  /**
   * @return string
   */
  public function getTtl()
  {
    return $this->ttl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Snapshot::class, 'Google_Service_Dataflow_Snapshot');
