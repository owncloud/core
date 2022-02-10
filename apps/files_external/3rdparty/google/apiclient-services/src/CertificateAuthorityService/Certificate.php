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

class Certificate extends \Google\Collection
{
  protected $collection_key = 'pemCertificateChain';
  protected $certificateDescriptionType = CertificateDescription::class;
  protected $certificateDescriptionDataType = '';
  /**
   * @var string
   */
  public $certificateTemplate;
  protected $configType = CertificateConfig::class;
  protected $configDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $issuerCertificateAuthority;
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
   * @var string
   */
  public $pemCertificate;
  /**
   * @var string[]
   */
  public $pemCertificateChain;
  /**
   * @var string
   */
  public $pemCsr;
  protected $revocationDetailsType = RevocationDetails::class;
  protected $revocationDetailsDataType = '';
  /**
   * @var string
   */
  public $subjectMode;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param CertificateDescription
   */
  public function setCertificateDescription(CertificateDescription $certificateDescription)
  {
    $this->certificateDescription = $certificateDescription;
  }
  /**
   * @return CertificateDescription
   */
  public function getCertificateDescription()
  {
    return $this->certificateDescription;
  }
  /**
   * @param string
   */
  public function setCertificateTemplate($certificateTemplate)
  {
    $this->certificateTemplate = $certificateTemplate;
  }
  /**
   * @return string
   */
  public function getCertificateTemplate()
  {
    return $this->certificateTemplate;
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
  public function setIssuerCertificateAuthority($issuerCertificateAuthority)
  {
    $this->issuerCertificateAuthority = $issuerCertificateAuthority;
  }
  /**
   * @return string
   */
  public function getIssuerCertificateAuthority()
  {
    return $this->issuerCertificateAuthority;
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
   * @param string
   */
  public function setPemCertificate($pemCertificate)
  {
    $this->pemCertificate = $pemCertificate;
  }
  /**
   * @return string
   */
  public function getPemCertificate()
  {
    return $this->pemCertificate;
  }
  /**
   * @param string[]
   */
  public function setPemCertificateChain($pemCertificateChain)
  {
    $this->pemCertificateChain = $pemCertificateChain;
  }
  /**
   * @return string[]
   */
  public function getPemCertificateChain()
  {
    return $this->pemCertificateChain;
  }
  /**
   * @param string
   */
  public function setPemCsr($pemCsr)
  {
    $this->pemCsr = $pemCsr;
  }
  /**
   * @return string
   */
  public function getPemCsr()
  {
    return $this->pemCsr;
  }
  /**
   * @param RevocationDetails
   */
  public function setRevocationDetails(RevocationDetails $revocationDetails)
  {
    $this->revocationDetails = $revocationDetails;
  }
  /**
   * @return RevocationDetails
   */
  public function getRevocationDetails()
  {
    return $this->revocationDetails;
  }
  /**
   * @param string
   */
  public function setSubjectMode($subjectMode)
  {
    $this->subjectMode = $subjectMode;
  }
  /**
   * @return string
   */
  public function getSubjectMode()
  {
    return $this->subjectMode;
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
class_alias(Certificate::class, 'Google_Service_CertificateAuthorityService_Certificate');
