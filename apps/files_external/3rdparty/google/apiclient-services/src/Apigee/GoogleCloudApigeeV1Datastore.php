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

class GoogleCloudApigeeV1Datastore extends \Google\Model
{
  public $createTime;
  protected $datastoreConfigType = GoogleCloudApigeeV1DatastoreConfig::class;
  protected $datastoreConfigDataType = '';
  public $displayName;
  public $lastUpdateTime;
  public $org;
  public $self;
  public $targetType;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleCloudApigeeV1DatastoreConfig
   */
  public function setDatastoreConfig(GoogleCloudApigeeV1DatastoreConfig $datastoreConfig)
  {
    $this->datastoreConfig = $datastoreConfig;
  }
  /**
   * @return GoogleCloudApigeeV1DatastoreConfig
   */
  public function getDatastoreConfig()
  {
    return $this->datastoreConfig;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setLastUpdateTime($lastUpdateTime)
  {
    $this->lastUpdateTime = $lastUpdateTime;
  }
  public function getLastUpdateTime()
  {
    return $this->lastUpdateTime;
  }
  public function setOrg($org)
  {
    $this->org = $org;
  }
  public function getOrg()
  {
    return $this->org;
  }
  public function setSelf($self)
  {
    $this->self = $self;
  }
  public function getSelf()
  {
    return $this->self;
  }
  public function setTargetType($targetType)
  {
    $this->targetType = $targetType;
  }
  public function getTargetType()
  {
    return $this->targetType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Datastore::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Datastore');
