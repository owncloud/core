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

class GoogleCloudAssuredworkloadsV1beta1Workload extends \Google\Collection
{
  protected $collection_key = 'resources';
  /**
   * @var string
   */
  public $billingAccount;
  protected $cjisSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings::class;
  protected $cjisSettingsDataType = '';
  /**
   * @var string
   */
  public $complianceRegime;
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
  protected $fedrampHighSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings::class;
  protected $fedrampHighSettingsDataType = '';
  protected $fedrampModerateSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings::class;
  protected $fedrampModerateSettingsDataType = '';
  protected $il4SettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings::class;
  protected $il4SettingsDataType = '';
  /**
   * @var string
   */
  public $kajEnrollmentState;
  protected $kmsSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadKMSSettings::class;
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
  protected $resourceSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadResourceSettings::class;
  protected $resourceSettingsDataType = 'array';
  protected $resourcesType = GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo::class;
  protected $resourcesDataType = 'array';
  protected $saaEnrollmentResponseType = GoogleCloudAssuredworkloadsV1beta1WorkloadSaaEnrollmentResponse::class;
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
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings
   */
  public function setCjisSettings(GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings $cjisSettings)
  {
    $this->cjisSettings = $cjisSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings
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
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings
   */
  public function setFedrampHighSettings(GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings $fedrampHighSettings)
  {
    $this->fedrampHighSettings = $fedrampHighSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings
   */
  public function getFedrampHighSettings()
  {
    return $this->fedrampHighSettings;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings
   */
  public function setFedrampModerateSettings(GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings $fedrampModerateSettings)
  {
    $this->fedrampModerateSettings = $fedrampModerateSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings
   */
  public function getFedrampModerateSettings()
  {
    return $this->fedrampModerateSettings;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings
   */
  public function setIl4Settings(GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings $il4Settings)
  {
    $this->il4Settings = $il4Settings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings
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
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadKMSSettings
   */
  public function setKmsSettings(GoogleCloudAssuredworkloadsV1beta1WorkloadKMSSettings $kmsSettings)
  {
    $this->kmsSettings = $kmsSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadKMSSettings
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
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadResourceSettings[]
   */
  public function setResourceSettings($resourceSettings)
  {
    $this->resourceSettings = $resourceSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadResourceSettings[]
   */
  public function getResourceSettings()
  {
    return $this->resourceSettings;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  /**
   * @param GoogleCloudAssuredworkloadsV1beta1WorkloadSaaEnrollmentResponse
   */
  public function setSaaEnrollmentResponse(GoogleCloudAssuredworkloadsV1beta1WorkloadSaaEnrollmentResponse $saaEnrollmentResponse)
  {
    $this->saaEnrollmentResponse = $saaEnrollmentResponse;
  }
  /**
   * @return GoogleCloudAssuredworkloadsV1beta1WorkloadSaaEnrollmentResponse
   */
  public function getSaaEnrollmentResponse()
  {
    return $this->saaEnrollmentResponse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsV1beta1Workload::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1Workload');
