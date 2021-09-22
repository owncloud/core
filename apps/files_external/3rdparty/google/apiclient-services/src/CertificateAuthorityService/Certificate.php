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
  public $certificateTemplate;
  protected $configType = CertificateConfig::class;
  protected $configDataType = '';
  public $createTime;
  public $issuerCertificateAuthority;
  public $labels;
  public $lifetime;
  public $name;
  public $pemCertificate;
  public $pemCertificateChain;
  public $pemCsr;
  protected $revocationDetailsType = RevocationDetails::class;
  protected $revocationDetailsDataType = '';
  public $subjectMode;
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
  public function setCertificateTemplate($certificateTemplate)
  {
    $this->certificateTemplate = $certificateTemplate;
  }
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setIssuerCertificateAuthority($issuerCertificateAuthority)
  {
    $this->issuerCertificateAuthority = $issuerCertificateAuthority;
  }
  public function getIssuerCertificateAuthority()
  {
    return $this->issuerCertificateAuthority;
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
  public function setPemCertificate($pemCertificate)
  {
    $this->pemCertificate = $pemCertificate;
  }
  public function getPemCertificate()
  {
    return $this->pemCertificate;
  }
  public function setPemCertificateChain($pemCertificateChain)
  {
    $this->pemCertificateChain = $pemCertificateChain;
  }
  public function getPemCertificateChain()
  {
    return $this->pemCertificateChain;
  }
  public function setPemCsr($pemCsr)
  {
    $this->pemCsr = $pemCsr;
  }
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
  public function setSubjectMode($subjectMode)
  {
    $this->subjectMode = $subjectMode;
  }
  public function getSubjectMode()
  {
    return $this->subjectMode;
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
class_alias(Certificate::class, 'Google_Service_CertificateAuthorityService_Certificate');
