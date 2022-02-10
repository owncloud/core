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
  /**
   * @var string[]
   */
  public $blockingResources;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $dataItemCount;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $inputConfigsType = GoogleCloudDatalabelingV1beta1InputConfig::class;
  protected $inputConfigsDataType = 'array';
  /**
   * @var string
   */
  public $lastMigrateTime;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string[]
   */
  public function setBlockingResources($blockingResources)
  {
    $this->blockingResources = $blockingResources;
  }
  /**
   * @return string[]
   */
  public function getBlockingResources()
  {
    return $this->blockingResources;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDataItemCount($dataItemCount)
  {
    $this->dataItemCount = $dataItemCount;
  }
  /**
   * @return string
   */
  public function getDataItemCount()
  {
    return $this->dataItemCount;
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
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setLastMigrateTime($lastMigrateTime)
  {
    $this->lastMigrateTime = $lastMigrateTime;
  }
  /**
   * @return string
   */
  public function getLastMigrateTime()
  {
    return $this->lastMigrateTime;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1Dataset::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1Dataset');
