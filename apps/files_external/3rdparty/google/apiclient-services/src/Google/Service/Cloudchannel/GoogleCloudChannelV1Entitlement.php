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

class Google_Service_Cloudchannel_GoogleCloudChannelV1Entitlement extends Google_Collection
{
  protected $collection_key = 'suspensionReasons';
  protected $associationInfoType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1AssociationInfo';
  protected $associationInfoDataType = '';
  protected $commitmentSettingsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1CommitmentSettings';
  protected $commitmentSettingsDataType = '';
  public $createTime;
  public $name;
  public $offer;
  protected $parametersType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Parameter';
  protected $parametersDataType = 'array';
  protected $provisionedServiceType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionedService';
  protected $provisionedServiceDataType = '';
  public $provisioningState;
  public $purchaseOrderId;
  public $suspensionReasons;
  protected $trialSettingsType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1TrialSettings';
  protected $trialSettingsDataType = '';
  public $updateTime;

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1AssociationInfo
   */
  public function setAssociationInfo(Google_Service_Cloudchannel_GoogleCloudChannelV1AssociationInfo $associationInfo)
  {
    $this->associationInfo = $associationInfo;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1AssociationInfo
   */
  public function getAssociationInfo()
  {
    return $this->associationInfo;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1CommitmentSettings
   */
  public function setCommitmentSettings(Google_Service_Cloudchannel_GoogleCloudChannelV1CommitmentSettings $commitmentSettings)
  {
    $this->commitmentSettings = $commitmentSettings;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1CommitmentSettings
   */
  public function getCommitmentSettings()
  {
    return $this->commitmentSettings;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOffer($offer)
  {
    $this->offer = $offer;
  }
  public function getOffer()
  {
    return $this->offer;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Parameter[]
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Parameter[]
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionedService
   */
  public function setProvisionedService(Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionedService $provisionedService)
  {
    $this->provisionedService = $provisionedService;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ProvisionedService
   */
  public function getProvisionedService()
  {
    return $this->provisionedService;
  }
  public function setProvisioningState($provisioningState)
  {
    $this->provisioningState = $provisioningState;
  }
  public function getProvisioningState()
  {
    return $this->provisioningState;
  }
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  public function getPurchaseOrderId()
  {
    return $this->purchaseOrderId;
  }
  public function setSuspensionReasons($suspensionReasons)
  {
    $this->suspensionReasons = $suspensionReasons;
  }
  public function getSuspensionReasons()
  {
    return $this->suspensionReasons;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1TrialSettings
   */
  public function setTrialSettings(Google_Service_Cloudchannel_GoogleCloudChannelV1TrialSettings $trialSettings)
  {
    $this->trialSettings = $trialSettings;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1TrialSettings
   */
  public function getTrialSettings()
  {
    return $this->trialSettings;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
