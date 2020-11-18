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

class Google_Service_CertificateAuthorityService_CertificateAuthority extends Google_Collection
{
  protected $collection_key = 'pemCaCertificates';
  protected $accessUrlsType = 'Google_Service_CertificateAuthorityService_AccessUrls';
  protected $accessUrlsDataType = '';
  protected $caCertificateDescriptionsType = 'Google_Service_CertificateAuthorityService_CertificateDescription';
  protected $caCertificateDescriptionsDataType = 'array';
  protected $certificatePolicyType = 'Google_Service_CertificateAuthorityService_CertificateAuthorityPolicy';
  protected $certificatePolicyDataType = '';
  protected $configType = 'Google_Service_CertificateAuthorityService_CertificateConfig';
  protected $configDataType = '';
  public $createTime;
  public $deleteTime;
  public $gcsBucket;
  protected $issuingOptionsType = 'Google_Service_CertificateAuthorityService_IssuingOptions';
  protected $issuingOptionsDataType = '';
  protected $keySpecType = 'Google_Service_CertificateAuthorityService_KeyVersionSpec';
  protected $keySpecDataType = '';
  public $labels;
  public $lifetime;
  public $name;
  public $pemCaCertificates;
  public $state;
  protected $subordinateConfigType = 'Google_Service_CertificateAuthorityService_SubordinateConfig';
  protected $subordinateConfigDataType = '';
  public $tier;
  public $type;
  public $updateTime;

  /**
   * @param Google_Service_CertificateAuthorityService_AccessUrls
   */
  public function setAccessUrls(Google_Service_CertificateAuthorityService_AccessUrls $accessUrls)
  {
    $this->accessUrls = $accessUrls;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_AccessUrls
   */
  public function getAccessUrls()
  {
    return $this->accessUrls;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateDescription
   */
  public function setCaCertificateDescriptions($caCertificateDescriptions)
  {
    $this->caCertificateDescriptions = $caCertificateDescriptions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateDescription
   */
  public function getCaCertificateDescriptions()
  {
    return $this->caCertificateDescriptions;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateAuthorityPolicy
   */
  public function setCertificatePolicy(Google_Service_CertificateAuthorityService_CertificateAuthorityPolicy $certificatePolicy)
  {
    $this->certificatePolicy = $certificatePolicy;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateAuthorityPolicy
   */
  public function getCertificatePolicy()
  {
    return $this->certificatePolicy;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateConfig
   */
  public function setConfig(Google_Service_CertificateAuthorityService_CertificateConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateConfig
   */
  public function getConfig()
  {
    return $this->config;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  public function setGcsBucket($gcsBucket)
  {
    $this->gcsBucket = $gcsBucket;
  }
  public function getGcsBucket()
  {
    return $this->gcsBucket;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_IssuingOptions
   */
  public function setIssuingOptions(Google_Service_CertificateAuthorityService_IssuingOptions $issuingOptions)
  {
    $this->issuingOptions = $issuingOptions;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_IssuingOptions
   */
  public function getIssuingOptions()
  {
    return $this->issuingOptions;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_KeyVersionSpec
   */
  public function setKeySpec(Google_Service_CertificateAuthorityService_KeyVersionSpec $keySpec)
  {
    $this->keySpec = $keySpec;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_KeyVersionSpec
   */
  public function getKeySpec()
  {
    return $this->keySpec;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLifetime($lifetime)
  {
    $this->lifetime = $lifetime;
  }
  public function getLifetime()
  {
    return $this->lifetime;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPemCaCertificates($pemCaCertificates)
  {
    $this->pemCaCertificates = $pemCaCertificates;
  }
  public function getPemCaCertificates()
  {
    return $this->pemCaCertificates;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_SubordinateConfig
   */
  public function setSubordinateConfig(Google_Service_CertificateAuthorityService_SubordinateConfig $subordinateConfig)
  {
    $this->subordinateConfig = $subordinateConfig;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_SubordinateConfig
   */
  public function getSubordinateConfig()
  {
    return $this->subordinateConfig;
  }
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  public function getTier()
  {
    return $this->tier;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
