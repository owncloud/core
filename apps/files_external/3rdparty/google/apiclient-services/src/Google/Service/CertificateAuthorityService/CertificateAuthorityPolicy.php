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

class Google_Service_CertificateAuthorityService_CertificateAuthorityPolicy extends Google_Collection
{
  protected $collection_key = 'allowedLocationsAndOrganizations';
  public $allowedCommonNames;
  protected $allowedConfigListType = 'Google_Service_CertificateAuthorityService_AllowedConfigList';
  protected $allowedConfigListDataType = '';
  protected $allowedIssuanceModesType = 'Google_Service_CertificateAuthorityService_IssuanceModes';
  protected $allowedIssuanceModesDataType = '';
  protected $allowedLocationsAndOrganizationsType = 'Google_Service_CertificateAuthorityService_Subject';
  protected $allowedLocationsAndOrganizationsDataType = 'array';
  protected $allowedSansType = 'Google_Service_CertificateAuthorityService_AllowedSubjectAltNames';
  protected $allowedSansDataType = '';
  public $maximumLifetime;
  protected $overwriteConfigValuesType = 'Google_Service_CertificateAuthorityService_ReusableConfigWrapper';
  protected $overwriteConfigValuesDataType = '';

  public function setAllowedCommonNames($allowedCommonNames)
  {
    $this->allowedCommonNames = $allowedCommonNames;
  }
  public function getAllowedCommonNames()
  {
    return $this->allowedCommonNames;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_AllowedConfigList
   */
  public function setAllowedConfigList(Google_Service_CertificateAuthorityService_AllowedConfigList $allowedConfigList)
  {
    $this->allowedConfigList = $allowedConfigList;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_AllowedConfigList
   */
  public function getAllowedConfigList()
  {
    return $this->allowedConfigList;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_IssuanceModes
   */
  public function setAllowedIssuanceModes(Google_Service_CertificateAuthorityService_IssuanceModes $allowedIssuanceModes)
  {
    $this->allowedIssuanceModes = $allowedIssuanceModes;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_IssuanceModes
   */
  public function getAllowedIssuanceModes()
  {
    return $this->allowedIssuanceModes;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_Subject
   */
  public function setAllowedLocationsAndOrganizations($allowedLocationsAndOrganizations)
  {
    $this->allowedLocationsAndOrganizations = $allowedLocationsAndOrganizations;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_Subject
   */
  public function getAllowedLocationsAndOrganizations()
  {
    return $this->allowedLocationsAndOrganizations;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_AllowedSubjectAltNames
   */
  public function setAllowedSans(Google_Service_CertificateAuthorityService_AllowedSubjectAltNames $allowedSans)
  {
    $this->allowedSans = $allowedSans;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_AllowedSubjectAltNames
   */
  public function getAllowedSans()
  {
    return $this->allowedSans;
  }
  public function setMaximumLifetime($maximumLifetime)
  {
    $this->maximumLifetime = $maximumLifetime;
  }
  public function getMaximumLifetime()
  {
    return $this->maximumLifetime;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ReusableConfigWrapper
   */
  public function setOverwriteConfigValues(Google_Service_CertificateAuthorityService_ReusableConfigWrapper $overwriteConfigValues)
  {
    $this->overwriteConfigValues = $overwriteConfigValues;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ReusableConfigWrapper
   */
  public function getOverwriteConfigValues()
  {
    return $this->overwriteConfigValues;
  }
}
