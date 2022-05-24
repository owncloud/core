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

namespace Google\Service\BeyondCorp;

class GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnector extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $principalInfoType = GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorPrincipalInfo::class;
  protected $principalInfoDataType = '';
  protected $resourceInfoType = GoogleCloudBeyondcorpAppconnectorsV1alphaResourceInfo::class;
  protected $resourceInfoDataType = '';
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
   * @param GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorPrincipalInfo
   */
  public function setPrincipalInfo(GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorPrincipalInfo $principalInfo)
  {
    $this->principalInfo = $principalInfo;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnectorPrincipalInfo
   */
  public function getPrincipalInfo()
  {
    return $this->principalInfo;
  }
  /**
   * @param GoogleCloudBeyondcorpAppconnectorsV1alphaResourceInfo
   */
  public function setResourceInfo(GoogleCloudBeyondcorpAppconnectorsV1alphaResourceInfo $resourceInfo)
  {
    $this->resourceInfo = $resourceInfo;
  }
  /**
   * @return GoogleCloudBeyondcorpAppconnectorsV1alphaResourceInfo
   */
  public function getResourceInfo()
  {
    return $this->resourceInfo;
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
class_alias(GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnector::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectorsV1alphaAppConnector');
