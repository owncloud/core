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
  public $ciphers;
  public $clientAuthEnabled;
  protected $commonNameType = GoogleCloudApigeeV1CommonNameConfig::class;
  protected $commonNameDataType = '';
  public $enabled;
  public $ignoreValidationErrors;
  public $keyAlias;
  protected $keyAliasReferenceType = GoogleCloudApigeeV1KeyAliasReference::class;
  protected $keyAliasReferenceDataType = '';
  public $protocols;
  public $trustStore;

  public function setCiphers($ciphers)
  {
    $this->ciphers = $ciphers;
  }
  public function getCiphers()
  {
    return $this->ciphers;
  }
  public function setClientAuthEnabled($clientAuthEnabled)
  {
    $this->clientAuthEnabled = $clientAuthEnabled;
  }
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
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  public function setIgnoreValidationErrors($ignoreValidationErrors)
  {
    $this->ignoreValidationErrors = $ignoreValidationErrors;
  }
  public function getIgnoreValidationErrors()
  {
    return $this->ignoreValidationErrors;
  }
  public function setKeyAlias($keyAlias)
  {
    $this->keyAlias = $keyAlias;
  }
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
  public function setProtocols($protocols)
  {
    $this->protocols = $protocols;
  }
  public function getProtocols()
  {
    return $this->protocols;
  }
  public function setTrustStore($trustStore)
  {
    $this->trustStore = $trustStore;
  }
  public function getTrustStore()
  {
    return $this->trustStore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1TlsInfoConfig::class, 'Google_Service_Apigee_GoogleCloudApigeeV1TlsInfoConfig');
