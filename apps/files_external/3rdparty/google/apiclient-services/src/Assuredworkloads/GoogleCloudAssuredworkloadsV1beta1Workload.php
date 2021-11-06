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
  public $billingAccount;
  protected $cjisSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings::class;
  protected $cjisSettingsDataType = '';
  public $complianceRegime;
  public $createTime;
  public $displayName;
  public $etag;
  protected $fedrampHighSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings::class;
  protected $fedrampHighSettingsDataType = '';
  protected $fedrampModerateSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings::class;
  protected $fedrampModerateSettingsDataType = '';
  protected $il4SettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings::class;
  protected $il4SettingsDataType = '';
  protected $kmsSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadKMSSettings::class;
  protected $kmsSettingsDataType = '';
  public $labels;
  public $name;
  public $provisionedResourcesParent;
  protected $resourceSettingsType = GoogleCloudAssuredworkloadsV1beta1WorkloadResourceSettings::class;
  protected $resourceSettingsDataType = 'array';
  protected $resourcesType = GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo::class;
  protected $resourcesDataType = 'array';

  public function setBillingAccount($billingAccount)
  {
    $this->billingAccount = $billingAccount;
  }
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
  public function setComplianceRegime($complianceRegime)
  {
    $this->complianceRegime = $complianceRegime;
  }
  public function getComplianceRegime()
  {
    return $this->complianceRegime;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
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
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProvisionedResourcesParent($provisionedResourcesParent)
  {
    $this->provisionedResourcesParent = $provisionedResourcesParent;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsV1beta1Workload::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1Workload');
