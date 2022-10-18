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

namespace Google\Service\CertificateManager;

class CertificateIssuanceConfig extends \Google\Model
{
  protected $certificateAuthorityConfigType = CertificateAuthorityConfig::class;
  protected $certificateAuthorityConfigDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $keyAlgorithm;
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
   * @var int
   */
  public $rotationWindowPercentage;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param CertificateAuthorityConfig
   */
  public function setCertificateAuthorityConfig(CertificateAuthorityConfig $certificateAuthorityConfig)
  {
    $this->certificateAuthorityConfig = $certificateAuthorityConfig;
  }
  /**
   * @return CertificateAuthorityConfig
   */
  public function getCertificateAuthorityConfig()
  {
    return $this->certificateAuthorityConfig;
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setKeyAlgorithm($keyAlgorithm)
  {
    $this->keyAlgorithm = $keyAlgorithm;
  }
  /**
   * @return string
   */
  public function getKeyAlgorithm()
  {
    return $this->keyAlgorithm;
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
   * @param int
   */
  public function setRotationWindowPercentage($rotationWindowPercentage)
  {
    $this->rotationWindowPercentage = $rotationWindowPercentage;
  }
  /**
   * @return int
   */
  public function getRotationWindowPercentage()
  {
    return $this->rotationWindowPercentage;
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
class_alias(CertificateIssuanceConfig::class, 'Google_Service_CertificateManager_CertificateIssuanceConfig');
