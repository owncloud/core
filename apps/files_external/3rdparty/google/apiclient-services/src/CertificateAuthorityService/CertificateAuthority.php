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

class CertificateAuthority extends \Google\Collection
{
  protected $collection_key = 'pemCaCertificates';
  protected $accessUrlsType = AccessUrls::class;
  protected $accessUrlsDataType = '';
  protected $caCertificateDescriptionsType = CertificateDescription::class;
  protected $caCertificateDescriptionsDataType = 'array';
  protected $configType = CertificateConfig::class;
  protected $configDataType = '';
  public $createTime;
  public $deleteTime;
  public $expireTime;
  public $gcsBucket;
  protected $keySpecType = KeyVersionSpec::class;
  protected $keySpecDataType = '';
  public $labels;
  public $lifetime;
  public $name;
  public $pemCaCertificates;
  public $state;
  protected $subordinateConfigType = SubordinateConfig::class;
  protected $subordinateConfigDataType = '';
  public $tier;
  public $type;
  public $updateTime;

  /**
   * @param AccessUrls
   */
  public function setAccessUrls(AccessUrls $accessUrls)
  {
    $this->accessUrls = $accessUrls;
  }
  /**
   * @return AccessUrls
   */
  public function getAccessUrls()
  {
    return $this->accessUrls;
  }
  /**
   * @param CertificateDescription[]
   */
  public function setCaCertificateDescriptions($caCertificateDescriptions)
  {
    $this->caCertificateDescriptions = $caCertificateDescriptions;
  }
  /**
   * @return CertificateDescription[]
   */
  public function getCaCertificateDescriptions()
  {
    return $this->caCertificateDescriptions;
  }
  /**
   * @param CertificateConfig
   */
  public function setConfig(CertificateConfig $config)
  {
    $this->config = $config;
  }
  /**
   * @return CertificateConfig
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
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
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
   * @param KeyVersionSpec
   */
  public function setKeySpec(KeyVersionSpec $keySpec)
  {
    $this->keySpec = $keySpec;
  }
  /**
   * @return KeyVersionSpec
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
   * @param SubordinateConfig
   */
  public function setSubordinateConfig(SubordinateConfig $subordinateConfig)
  {
    $this->subordinateConfig = $subordinateConfig;
  }
  /**
   * @return SubordinateConfig
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CertificateAuthority::class, 'Google_Service_CertificateAuthorityService_CertificateAuthority');
