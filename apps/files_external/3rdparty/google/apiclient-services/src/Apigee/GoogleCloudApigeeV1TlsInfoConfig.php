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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1TlsInfoConfig extends \Google\Collection
{
  protected $collection_key = 'protocols';
  /**
   * @var string[]
   */
  public $ciphers;
  /**
   * @var bool
   */
  public $clientAuthEnabled;
  protected $commonNameType = GoogleCloudApigeeV1CommonNameConfig::class;
  protected $commonNameDataType = '';
  /**
   * @var bool
   */
  public $enabled;
  /**
   * @var bool
   */
  public $ignoreValidationErrors;
  /**
   * @var string
   */
  public $keyAlias;
  protected $keyAliasReferenceType = GoogleCloudApigeeV1KeyAliasReference::class;
  protected $keyAliasReferenceDataType = '';
  /**
   * @var string[]
   */
  public $protocols;
  /**
   * @var string
   */
  public $trustStore;

  /**
   * @param string[]
   */
  public function setCiphers($ciphers)
  {
    $this->ciphers = $ciphers;
  }
  /**
   * @return string[]
   */
  public function getCiphers()
  {
    return $this->ciphers;
  }
  /**
   * @param bool
   */
  public function setClientAuthEnabled($clientAuthEnabled)
  {
    $this->clientAuthEnabled = $clientAuthEnabled;
  }
  /**
   * @return bool
   */
  public function getClientAuthEnabled()
  {
    return $this->clientAuthEnabled;
  }
  /**
   * @param GoogleCloudApigeeV1CommonNameConfig
   */
  public function setCommonName(GoogleCloudApigeeV1CommonNameConfig $commonName)
  {
    $this->commonName = $commonName;
  }
  /**
   * @return GoogleCloudApigeeV1CommonNameConfig
   */
  public function getCommonName()
  {
    return $this->commonName;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param bool
   */
  public function setIgnoreValidationErrors($ignoreValidationErrors)
  {
    $this->ignoreValidationErrors = $ignoreValidationErrors;
  }
  /**
   * @return bool
   */
  public function getIgnoreValidationErrors()
  {
    return $this->ignoreValidationErrors;
  }
  /**
   * @param string
   */
  public function setKeyAlias($keyAlias)
  {
    $this->keyAlias = $keyAlias;
  }
  /**
   * @return string
   */
  public function getKeyAlias()
  {
    return $this->keyAlias;
  }
  /**
   * @param GoogleCloudApigeeV1KeyAliasReference
   */
  public function setKeyAliasReference(GoogleCloudApigeeV1KeyAliasReference $keyAliasReference)
  {
    $this->keyAliasReference = $keyAliasReference;
  }
  /**
   * @return GoogleCloudApigeeV1KeyAliasReference
   */
  public function getKeyAliasReference()
  {
    return $this->keyAliasReference;
  }
  /**
   * @param string[]
   */
  public function setProtocols($protocols)
  {
    $this->protocols = $protocols;
  }
  /**
   * @return string[]
   */
  public function getProtocols()
  {
    return $this->protocols;
  }
  /**
   * @param string
   */
  public function setTrustStore($trustStore)
  {
    $this->trustStore = $trustStore;
  }
  /**
   * @return string
   */
  public function getTrustStore()
  {
    return $this->trustStore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1TlsInfoConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1TlsInfoConfig');
