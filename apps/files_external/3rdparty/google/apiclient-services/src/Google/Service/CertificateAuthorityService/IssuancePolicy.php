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

class Google_Service_CertificateAuthorityService_IssuancePolicy extends Google_Collection
{
  protected $collection_key = 'allowedKeyTypes';
  protected $allowedIssuanceModesType = 'Google_Service_CertificateAuthorityService_IssuanceModes';
  protected $allowedIssuanceModesDataType = '';
  protected $allowedKeyTypesType = 'Google_Service_CertificateAuthorityService_AllowedKeyType';
  protected $allowedKeyTypesDataType = 'array';
  protected $baselineValuesType = 'Google_Service_CertificateAuthorityService_X509Parameters';
  protected $baselineValuesDataType = '';
  protected $identityConstraintsType = 'Google_Service_CertificateAuthorityService_CertificateIdentityConstraints';
  protected $identityConstraintsDataType = '';
  public $maximumLifetime;
  protected $passthroughExtensionsType = 'Google_Service_CertificateAuthorityService_CertificateExtensionConstraints';
  protected $passthroughExtensionsDataType = '';

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
   * @param Google_Service_CertificateAuthorityService_AllowedKeyType[]
   */
  public function setAllowedKeyTypes($allowedKeyTypes)
  {
    $this->allowedKeyTypes = $allowedKeyTypes;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_AllowedKeyType[]
   */
  public function getAllowedKeyTypes()
  {
    return $this->allowedKeyTypes;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_X509Parameters
   */
  public function setBaselineValues(Google_Service_CertificateAuthorityService_X509Parameters $baselineValues)
  {
    $this->baselineValues = $baselineValues;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_X509Parameters
   */
  public function getBaselineValues()
  {
    return $this->baselineValues;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateIdentityConstraints
   */
  public function setIdentityConstraints(Google_Service_CertificateAuthorityService_CertificateIdentityConstraints $identityConstraints)
  {
    $this->identityConstraints = $identityConstraints;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateIdentityConstraints
   */
  public function getIdentityConstraints()
  {
    return $this->identityConstraints;
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
   * @param Google_Service_CertificateAuthorityService_CertificateExtensionConstraints
   */
  public function setPassthroughExtensions(Google_Service_CertificateAuthorityService_CertificateExtensionConstraints $passthroughExtensions)
  {
    $this->passthroughExtensions = $passthroughExtensions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateExtensionConstraints
   */
  public function getPassthroughExtensions()
  {
    return $this->passthroughExtensions;
  }
}
