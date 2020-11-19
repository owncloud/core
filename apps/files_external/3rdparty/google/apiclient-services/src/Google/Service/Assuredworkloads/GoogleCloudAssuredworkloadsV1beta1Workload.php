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

class Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1Workload extends Google_Collection
{
  protected $collection_key = 'resources';
  public $billingAccount;
  protected $cjisSettingsType = 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings';
  protected $cjisSettingsDataType = '';
  public $complianceRegime;
  public $createTime;
  public $displayName;
  public $etag;
  protected $fedrampHighSettingsType = 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings';
  protected $fedrampHighSettingsDataType = '';
  protected $fedrampModerateSettingsType = 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings';
  protected $fedrampModerateSettingsDataType = '';
  protected $il4SettingsType = 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings';
  protected $il4SettingsDataType = '';
  public $labels;
  public $name;
  protected $resourcesType = 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo';
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
   * @param Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings
   */
  public function setCjisSettings(Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings $cjisSettings)
  {
    $this->cjisSettings = $cjisSettings;
  }
  /**
   * @return Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadCJISSettings
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
   * @param Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings
   */
  public function setFedrampHighSettings(Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings $fedrampHighSettings)
  {
    $this->fedrampHighSettings = $fedrampHighSettings;
  }
  /**
   * @return Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampHighSettings
   */
  public function getFedrampHighSettings()
  {
    return $this->fedrampHighSettings;
  }
  /**
   * @param Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings
   */
  public function setFedrampModerateSettings(Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings $fedrampModerateSettings)
  {
    $this->fedrampModerateSettings = $fedrampModerateSettings;
  }
  /**
   * @return Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadFedrampModerateSettings
   */
  public function getFedrampModerateSettings()
  {
    return $this->fedrampModerateSettings;
  }
  /**
   * @param Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings
   */
  public function setIl4Settings(Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings $il4Settings)
  {
    $this->il4Settings = $il4Settings;
  }
  /**
   * @return Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadIL4Settings
   */
  public function getIl4Settings()
  {
    return $this->il4Settings;
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
  /**
   * @param Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsV1beta1WorkloadResourceInfo
   */
  public function getResources()
  {
    return $this->resources;
  }
}
