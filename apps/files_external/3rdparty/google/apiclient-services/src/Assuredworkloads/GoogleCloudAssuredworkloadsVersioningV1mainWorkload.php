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

namespace Google\Service\Assuredworkloads;

class GoogleCloudAssuredworkloadsVersioningV1mainWorkload extends \Google\Collection
{
  protected $collection_key = 'resources';
  /**
   * @var string
   */
  public $billingAccount;
  protected $cjisSettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadCJISSettings::class;
  protected $cjisSettingsDataType = '';
  /**
   * @var string
   */
  public $complianceRegime;
  protected $complianceStatusType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadComplianceStatus::class;
  protected $complianceStatusDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var bool
   */
  public $enableSovereignControls;
  /**
   * @var string
   */
  public $etag;
  protected $fedrampHighSettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampHighSettings::class;
  protected $fedrampHighSettingsDataType = '';
  protected $fedrampModerateSettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampModerateSettings::class;
  protected $fedrampModerateSettingsDataType = '';
  protected $il4SettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings::class;
  protected $il4SettingsDataType = '';
  /**
   * @var string
   */
  public $kajEnrollmentState;
  protected $kmsSettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings::class;
  protected $kmsSettingsDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $provisionedResourcesParent;
  protected $resourceSettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadResourceSettings::class;
  protected $resourceSettingsDataType = 'array';
  protected $resourcesType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadResourceInfo::class;
  protected $resourcesDataType = 'array';
  protected $saaEnrollmentResponseType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadSaaEnrollmentResponse::class;
  protected $saaEnrollmentResponseDataType = '';

  /**
   * @param string
   */
  public function setBillingAccount($billingAccount)
  {
    $this->billingAccount = $billingAccount;
  }
  /**
   * @return string
   */
  public function getBillingAccount()
  {
    return $this->billingAccount;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadCJISSettings
   */
  public function setCjisSettings(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadCJISSettings $cjisSettings)
  {
    $this->cjisSettings = $cjisSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadCJISSettings
   */
  public function getCjisSettings()
  {
    return $this->cjisSettings;
  }
  /**
   * @param string
   */
  public function setComplianceRegime($complianceRegime)
  {
    $this->complianceRegime = $complianceRegime;
  }
  /**
   * @return string
   */
  public function getComplianceRegime()
  {
    return $this->complianceRegime;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadComplianceStatus
   */
  public function setComplianceStatus(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadComplianceStatus $complianceStatus)
  {
    $this->complianceStatus = $complianceStatus;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadComplianceStatus
   */
  public function getComplianceStatus()
  {
    return $this->complianceStatus;
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
   * @param bool
   */
  public function setEnableSovereignControls($enableSovereignControls)
  {
    $this->enableSovereignControls = $enableSovereignControls;
  }
  /**
   * @return bool
   */
  public function getEnableSovereignControls()
  {
    return $this->enableSovereignControls;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampHighSettings
   */
  public function setFedrampHighSettings(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampHighSettings $fedrampHighSettings)
  {
    $this->fedrampHighSettings = $fedrampHighSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampHighSettings
   */
  public function getFedrampHighSettings()
  {
    return $this->fedrampHighSettings;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampModerateSettings
   */
  public function setFedrampModerateSettings(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampModerateSettings $fedrampModerateSettings)
  {
    $this->fedrampModerateSettings = $fedrampModerateSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadFedrampModerateSettings
   */
  public function getFedrampModerateSettings()
  {
    return $this->fedrampModerateSettings;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings
   */
  public function setIl4Settings(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings $il4Settings)
  {
    $this->il4Settings = $il4Settings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings
   */
  public function getIl4Settings()
  {
    return $this->il4Settings;
  }
  /**
   * @param string
   */
  public function setKajEnrollmentState($kajEnrollmentState)
  {
    $this->kajEnrollmentState = $kajEnrollmentState;
  }
  /**
   * @return string
   */
  public function getKajEnrollmentState()
  {
    return $this->kajEnrollmentState;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings
   */
  public function setKmsSettings(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings $kmsSettings)
  {
    $this->kmsSettings = $kmsSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings
   */
  public function getKmsSettings()
  {
    return $this->kmsSettings;
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
   * @param string
   */
  public function setProvisionedResourcesParent($provisionedResourcesParent)
  {
    $this->provisionedResourcesParent = $provisionedResourcesParent;
  }
  /**
   * @return string
   */
  public function getProvisionedResourcesParent()
  {
    return $this->provisionedResourcesParent;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadResourceSettings[]
   */
  public function setResourceSettings($resourceSettings)
  {
    $this->resourceSettings = $resourceSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadResourceSettings[]
   */
  public function getResourceSettings()
  {
    return $this->resourceSettings;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadResourceInfo[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadResourceInfo[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadSaaEnrollmentResponse
   */
  public function setSaaEnrollmentResponse(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadSaaEnrollmentResponse $saaEnrollmentResponse)
  {
    $this->saaEnrollmentResponse = $saaEnrollmentResponse;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadSaaEnrollmentResponse
   */
  public function getSaaEnrollmentResponse()
  {
    return $this->saaEnrollmentResponse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsVersioningV1mainWorkload::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsVersioningV1mainWorkload');
