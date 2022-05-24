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

namespace Google\Service\VMMigrationService;

class DatacenterConnector extends \Google\Model
{
  /**
   * @var string
   */
  public $applianceInfrastructureVersion;
  /**
   * @var string
   */
  public $applianceSoftwareVersion;
  protected $availableVersionsType = AvailableUpdates::class;
  protected $availableVersionsDataType = '';
  /**
   * @var string
   */
  public $bucket;
  /**
   * @var string
   */
  public $createTime;
  protected $errorType = Status::class;
  protected $errorDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $registrationId;
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
  public $stateTime;
  /**
   * @var string
   */
  public $updateTime;
  protected $upgradeStatusType = UpgradeStatus::class;
  protected $upgradeStatusDataType = '';
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setApplianceInfrastructureVersion($applianceInfrastructureVersion)
  {
    $this->applianceInfrastructureVersion = $applianceInfrastructureVersion;
  }
  /**
   * @return string
   */
  public function getApplianceInfrastructureVersion()
  {
    return $this->applianceInfrastructureVersion;
  }
  /**
   * @param string
   */
  public function setApplianceSoftwareVersion($applianceSoftwareVersion)
  {
    $this->applianceSoftwareVersion = $applianceSoftwareVersion;
  }
  /**
   * @return string
   */
  public function getApplianceSoftwareVersion()
  {
    return $this->applianceSoftwareVersion;
  }
  /**
   * @param AvailableUpdates
   */
  public function setAvailableVersions(AvailableUpdates $availableVersions)
  {
    $this->availableVersions = $availableVersions;
  }
  /**
   * @return AvailableUpdates
   */
  public function getAvailableVersions()
  {
    return $this->availableVersions;
  }
  /**
   * @param string
   */
  public function setBucket($bucket)
  {
    $this->bucket = $bucket;
  }
  /**
   * @return string
   */
  public function getBucket()
  {
    return $this->bucket;
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
   * @param Status
   */
  public function setError(Status $error)
  {
    $this->error = $error;
  }
  /**
   * @return Status
   */
  public function getError()
  {
    return $this->error;
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
  public function setRegistrationId($registrationId)
  {
    $this->registrationId = $registrationId;
  }
  /**
   * @return string
   */
  public function getRegistrationId()
  {
    return $this->registrationId;
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
  public function setStateTime($stateTime)
  {
    $this->stateTime = $stateTime;
  }
  /**
   * @return string
   */
  public function getStateTime()
  {
    return $this->stateTime;
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
  /**
   * @param UpgradeStatus
   */
  public function setUpgradeStatus(UpgradeStatus $upgradeStatus)
  {
    $this->upgradeStatus = $upgradeStatus;
  }
  /**
   * @return UpgradeStatus
   */
  public function getUpgradeStatus()
  {
    return $this->upgradeStatus;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatacenterConnector::class, 'Google_Service_VMMigrationService_DatacenterConnector');
