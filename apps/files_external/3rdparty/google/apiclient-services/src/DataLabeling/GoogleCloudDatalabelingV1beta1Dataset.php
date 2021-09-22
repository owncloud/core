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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1Dataset extends \Google\Collection
{
  protected $collection_key = 'inputConfigs';
  public $blockingResources;
  public $createTime;
  public $dataItemCount;
  public $description;
  public $displayName;
  protected $inputConfigsType = GoogleCloudDatalabelingV1beta1InputConfig::class;
  protected $inputConfigsDataType = 'array';
  public $lastMigrateTime;
  public $name;

  public function setBlockingResources($blockingResources)
  {
    $this->blockingResources = $blockingResources;
  }
  public function getBlockingResources()
  {
    return $this->blockingResources;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDataItemCount($dataItemCount)
  {
    $this->dataItemCount = $dataItemCount;
  }
  public function getDataItemCount()
  {
    return $this->dataItemCount;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1InputConfig[]
   */
  public function setInputConfigs($inputConfigs)
  {
    $this->inputConfigs = $inputConfigs;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1InputConfig[]
   */
  public function getInputConfigs()
  {
    return $this->inputConfigs;
  }
  public function setLastMigrateTime($lastMigrateTime)
  {
    $this->lastMigrateTime = $lastMigrateTime;
  }
  public function getLastMigrateTime()
  {
    return $this->lastMigrateTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1Dataset::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Dataset');
