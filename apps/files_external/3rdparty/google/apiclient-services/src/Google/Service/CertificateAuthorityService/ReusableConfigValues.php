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

class Google_Service_CertificateAuthorityService_ReusableConfigValues extends Google_Collection
{
  protected $collection_key = 'policyIds';
  protected $additionalExtensionsType = 'Google_Service_CertificateAuthorityService_X509Extension';
  protected $additionalExtensionsDataType = 'array';
  public $aiaOcspServers;
  protected $caOptionsType = 'Google_Service_CertificateAuthorityService_CaOptions';
  protected $caOptionsDataType = '';
  protected $keyUsageType = 'Google_Service_CertificateAuthorityService_KeyUsage';
  protected $keyUsageDataType = '';
  protected $policyIdsType = 'Google_Service_CertificateAuthorityService_ObjectId';
  protected $policyIdsDataType = 'array';

  /**
   * @param Google_Service_CertificateAuthorityService_X509Extension
   */
  public function setAdditionalExtensions($additionalExtensions)
  {
    $this->additionalExtensions = $additionalExtensions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_X509Extension
   */
  public function getAdditionalExtensions()
  {
    return $this->additionalExtensions;
  }
  public function setAiaOcspServers($aiaOcspServers)
  {
    $this->aiaOcspServers = $aiaOcspServers;
  }
  public function getAiaOcspServers()
  {
    return $this->aiaOcspServers;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CaOptions
   */
  public function setCaOptions(Google_Service_CertificateAuthorityService_CaOptions $caOptions)
  {
    $this->caOptions = $caOptions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CaOptions
   */
  public function getCaOptions()
  {
    return $this->caOptions;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_KeyUsage
   */
  public function setKeyUsage(Google_Service_CertificateAuthorityService_KeyUsage $keyUsage)
  {
    $this->keyUsage = $keyUsage;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_KeyUsage
   */
  public function getKeyUsage()
  {
    return $this->keyUsage;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ObjectId
   */
  public function setPolicyIds($policyIds)
  {
    $this->policyIds = $policyIds;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ObjectId
   */
  public function getPolicyIds()
  {
    return $this->policyIds;
  }
}
