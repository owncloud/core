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
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $deleteTime;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string
   */
  public $gcsBucket;
  protected $keySpecType = KeyVersionSpec::class;
  protected $keySpecDataType = '';
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $lifetime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $pemCaCertificates;
  /**
   * @var string
   */
  public $state;
  protected $subordinateConfigType = SubordinateConfig::class;
  protected $subordinateConfigDataType = '';
  /**
   * @var string
   */
  public $tier;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDeleteTime($deleteTime)
  {
    $this->deleteTime = $deleteTime;
  }
  /**
   * @return string
   */
  public function getDeleteTime()
  {
    return $this->deleteTime;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string
   */
  public function setGcsBucket($gcsBucket)
  {
    $this->gcsBucket = $gcsBucket;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setLifetime($lifetime)
  {
    $this->lifetime = $lifetime;
  }
  /**
   * @return string
   */
  public function getLifetime()
  {
    return $this->lifetime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setPemCaCertificates($pemCaCertificates)
  {
    $this->pemCaCertificates = $pemCaCertificates;
  }
  /**
   * @return string[]
   */
  public function getPemCaCertificates()
  {
    return $this->pemCaCertificates;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setTier($tier)
  {
    $this->tier = $tier;
  }
  /**
   * @return string
   */
  public function getTier()
  {
    return $this->tier;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CertificateAuthority::class, 'Google_Service_CertificateAuthorityService_CertificateAuthority');
