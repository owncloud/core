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
  public $creationTime;
  public $description;
  public $diskSizeBytes;
  public $id;
  public $projectId;
  protected $pubsubMetadataType = PubsubSnapshotMetadata::class;
  protected $pubsubMetadataDataType = 'array';
  public $region;
  public $sourceJobId;
  public $state;
  public $ttl;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDiskSizeBytes($diskSizeBytes)
  {
    $this->diskSizeBytes = $diskSizeBytes;
  }
  public function getDiskSizeBytes()
  {
    return $this->diskSizeBytes;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
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
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSourceJobId($sourceJobId)
  {
    $this->sourceJobId = $sourceJobId;
  }
  public function getSourceJobId()
  {
    return $this->sourceJobId;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTtl($ttl)
  {
    $this->ttl = $ttl;
  }
  public function getTtl()
  {
    return $this->ttl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Snapshot::class, 'Google_Service_Dataflow_Snapshot');
