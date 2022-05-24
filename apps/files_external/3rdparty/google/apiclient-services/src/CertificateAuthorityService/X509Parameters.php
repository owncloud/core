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

class X509Parameters extends \Google\Collection
{
  protected $collection_key = 'policyIds';
  protected $additionalExtensionsType = X509Extension::class;
  protected $additionalExtensionsDataType = 'array';
  /**
   * @var string[]
   */
  public $aiaOcspServers;
  protected $caOptionsType = CaOptions::class;
  protected $caOptionsDataType = '';
  protected $keyUsageType = KeyUsage::class;
  protected $keyUsageDataType = '';
  protected $policyIdsType = ObjectId::class;
  protected $policyIdsDataType = 'array';

  /**
   * @param X509Extension[]
   */
  public function setAdditionalExtensions($additionalExtensions)
  {
    $this->additionalExtensions = $additionalExtensions;
  }
  /**
   * @return X509Extension[]
   */
  public function getAdditionalExtensions()
  {
    return $this->additionalExtensions;
  }
  /**
   * @param string[]
   */
  public function setAiaOcspServers($aiaOcspServers)
  {
    $this->aiaOcspServers = $aiaOcspServers;
  }
  /**
   * @return string[]
   */
  public function getAiaOcspServers()
  {
    return $this->aiaOcspServers;
  }
  /**
   * @param CaOptions
   */
  public function setCaOptions(CaOptions $caOptions)
  {
    $this->caOptions = $caOptions;
  }
  /**
   * @return CaOptions
   */
  public function getCaOptions()
  {
    return $this->caOptions;
  }
  /**
   * @param KeyUsage
   */
  public function setKeyUsage(KeyUsage $keyUsage)
  {
    $this->keyUsage = $keyUsage;
  }
  /**
   * @return KeyUsage
   */
  public function getKeyUsage()
  {
    return $this->keyUsage;
  }
  /**
   * @param ObjectId[]
   */
  public function setPolicyIds($policyIds)
  {
    $this->policyIds = $policyIds;
  }
  /**
   * @return ObjectId[]
   */
  public function getPolicyIds()
  {
    return $this->policyIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(X509Parameters::class, 'Google_Service_CertificateAuthorityService_X509Parameters');
