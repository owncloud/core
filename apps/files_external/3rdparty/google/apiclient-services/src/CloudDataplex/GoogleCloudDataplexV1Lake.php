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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Lake extends \Google\Model
{
  protected $assetStatusType = GoogleCloudDataplexV1AssetStatus::class;
  protected $assetStatusDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $labels;
  protected $metastoreType = GoogleCloudDataplexV1LakeMetastore::class;
  protected $metastoreDataType = '';
  protected $metastoreStatusType = GoogleCloudDataplexV1LakeMetastoreStatus::class;
  protected $metastoreStatusDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param GoogleCloudDataplexV1AssetStatus
   */
  public function setAssetStatus(GoogleCloudDataplexV1AssetStatus $assetStatus)
  {
    $this->assetStatus = $assetStatus;
  }
  /**
   * @return GoogleCloudDataplexV1AssetStatus
   */
  public function getAssetStatus()
  {
    return $this->assetStatus;
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
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param GoogleCloudDataplexV1LakeMetastore
   */
  public function setMetastore(GoogleCloudDataplexV1LakeMetastore $metastore)
  {
    $this->metastore = $metastore;
  }
  /**
   * @return GoogleCloudDataplexV1LakeMetastore
   */
  public function getMetastore()
  {
    return $this->metastore;
  }
  /**
   * @param GoogleCloudDataplexV1LakeMetastoreStatus
   */
  public function setMetastoreStatus(GoogleCloudDataplexV1LakeMetastoreStatus $metastoreStatus)
  {
    $this->metastoreStatus = $metastoreStatus;
  }
  /**
   * @return GoogleCloudDataplexV1LakeMetastoreStatus
   */
  public function getMetastoreStatus()
  {
    return $this->metastoreStatus;
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
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
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
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Lake::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Lake');
