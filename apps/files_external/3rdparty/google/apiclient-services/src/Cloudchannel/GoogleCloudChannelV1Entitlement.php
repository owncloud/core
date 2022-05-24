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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1Entitlement extends \Google\Collection
{
  protected $collection_key = 'suspensionReasons';
  protected $associationInfoType = GoogleCloudChannelV1AssociationInfo::class;
  protected $associationInfoDataType = '';
  protected $commitmentSettingsType = GoogleCloudChannelV1CommitmentSettings::class;
  protected $commitmentSettingsDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $offer;
  protected $parametersType = GoogleCloudChannelV1Parameter::class;
  protected $parametersDataType = 'array';
  protected $provisionedServiceType = GoogleCloudChannelV1ProvisionedService::class;
  protected $provisionedServiceDataType = '';
  /**
   * @var string
   */
  public $provisioningState;
  /**
   * @var string
   */
  public $purchaseOrderId;
  /**
   * @var string[]
   */
  public $suspensionReasons;
  protected $trialSettingsType = GoogleCloudChannelV1TrialSettings::class;
  protected $trialSettingsDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param GoogleCloudChannelV1AssociationInfo
   */
  public function setAssociationInfo(GoogleCloudChannelV1AssociationInfo $associationInfo)
  {
    $this->associationInfo = $associationInfo;
  }
  /**
   * @return GoogleCloudChannelV1AssociationInfo
   */
  public function getAssociationInfo()
  {
    return $this->associationInfo;
  }
  /**
   * @param GoogleCloudChannelV1CommitmentSettings
   */
  public function setCommitmentSettings(GoogleCloudChannelV1CommitmentSettings $commitmentSettings)
  {
    $this->commitmentSettings = $commitmentSettings;
  }
  /**
   * @return GoogleCloudChannelV1CommitmentSettings
   */
  public function getCommitmentSettings()
  {
    return $this->commitmentSettings;
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
  public function setOffer($offer)
  {
    $this->offer = $offer;
  }
  /**
   * @return string
   */
  public function getOffer()
  {
    return $this->offer;
  }
  /**
   * @param GoogleCloudChannelV1Parameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return GoogleCloudChannelV1Parameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param GoogleCloudChannelV1ProvisionedService
   */
  public function setProvisionedService(GoogleCloudChannelV1ProvisionedService $provisionedService)
  {
    $this->provisionedService = $provisionedService;
  }
  /**
   * @return GoogleCloudChannelV1ProvisionedService
   */
  public function getProvisionedService()
  {
    return $this->provisionedService;
  }
  /**
   * @param string
   */
  public function setProvisioningState($provisioningState)
  {
    $this->provisioningState = $provisioningState;
  }
  /**
   * @return string
   */
  public function getProvisioningState()
  {
    return $this->provisioningState;
  }
  /**
   * @param string
   */
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  /**
   * @return string
   */
  public function getPurchaseOrderId()
  {
    return $this->purchaseOrderId;
  }
  /**
   * @param string[]
   */
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  /**
   * @return string[]
   */
  public function getSuspensionReasons()
  {
    return $this->suspensionReasons;
  }
  /**
   * @param GoogleCloudChannelV1TrialSettings
   */
  public function setTrialSettings(GoogleCloudChannelV1TrialSettings $trialSettings)
  {
    $this->trialSettings = $trialSettings;
  }
  /**
   * @return GoogleCloudChannelV1TrialSettings
   */
  public function getTrialSettings()
  {
    return $this->trialSettings;
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
class_alias(GoogleCloudChannelV1Entitlement::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1Entitlement');
