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

namespace Google\Service\CertificateAuthorityService;

class IssuancePolicy extends \Google\Collection
{
  protected $collection_key = 'allowedKeyTypes';
  protected $allowedIssuanceModesType = IssuanceModes::class;
  protected $allowedIssuanceModesDataType = '';
  protected $allowedKeyTypesType = AllowedKeyType::class;
  protected $allowedKeyTypesDataType = 'array';
  protected $baselineValuesType = X509Parameters::class;
  protected $baselineValuesDataType = '';
  protected $identityConstraintsType = CertificateIdentityConstraints::class;
  protected $identityConstraintsDataType = '';
  /**
   * @var string
   */
  public $maximumLifetime;
  protected $passthroughExtensionsType = CertificateExtensionConstraints::class;
  protected $passthroughExtensionsDataType = '';

  /**
   * @param IssuanceModes
   */
  public function setAllowedIssuanceModes(IssuanceModes $allowedIssuanceModes)
  {
    $this->allowedIssuanceModes = $allowedIssuanceModes;
  }
  /**
   * @return IssuanceModes
   */
  public function getAllowedIssuanceModes()
  {
    return $this->allowedIssuanceModes;
  }
  /**
   * @param AllowedKeyType[]
   */
  public function setAllowedKeyTypes($allowedKeyTypes)
  {
    $this->allowedKeyTypes = $allowedKeyTypes;
  }
  /**
   * @return AllowedKeyType[]
   */
  public function getAllowedKeyTypes()
  {
    return $this->allowedKeyTypes;
  }
  /**
   * @param X509Parameters
   */
  public function setBaselineValues(X509Parameters $baselineValues)
  {
    $this->baselineValues = $baselineValues;
  }
  /**
   * @return X509Parameters
   */
  public function getBaselineValues()
  {
    return $this->baselineValues;
  }
  /**
   * @param CertificateIdentityConstraints
   */
  public function setIdentityConstraints(CertificateIdentityConstraints $identityConstraints)
  {
    $this->identityConstraints = $identityConstraints;
  }
  /**
   * @return CertificateIdentityConstraints
   */
  public function getIdentityConstraints()
  {
    return $this->identityConstraints;
  }
  /**
   * @param string
   */
  public function setMaximumLifetime($maximumLifetime)
  {
    $this->maximumLifetime = $maximumLifetime;
  }
  /**
   * @return string
   */
  public function getMaximumLifetime()
  {
    return $this->maximumLifetime;
  }
  /**
   * @param CertificateExtensionConstraints
   */
  public function setPassthroughExtensions(CertificateExtensionConstraints $passthroughExtensions)
  {
    $this->passthroughExtensions = $passthroughExtensions;
  }
  /**
   * @return CertificateExtensionConstraints
   */
  public function getPassthroughExtensions()
  {
    return $this->passthroughExtensions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IssuancePolicy::class, 'Google_Service_CertificateAuthorityService_IssuancePolicy');
