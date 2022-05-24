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

class CertificateDescription extends \Google\Collection
{
  protected $collection_key = 'crlDistributionPoints';
  /**
   * @var string[]
   */
  public $aiaIssuingCertificateUrls;
  protected $authorityKeyIdType = KeyId::class;
  protected $authorityKeyIdDataType = '';
  protected $certFingerprintType = CertificateFingerprint::class;
  protected $certFingerprintDataType = '';
  /**
   * @var string[]
   */
  public $crlDistributionPoints;
  protected $publicKeyType = PublicKey::class;
  protected $publicKeyDataType = '';
  protected $subjectDescriptionType = SubjectDescription::class;
  protected $subjectDescriptionDataType = '';
  protected $subjectKeyIdType = KeyId::class;
  protected $subjectKeyIdDataType = '';
  protected $x509DescriptionType = X509Parameters::class;
  protected $x509DescriptionDataType = '';

  /**
   * @param string[]
   */
  public function setAiaIssuingCertificateUrls($aiaIssuingCertificateUrls)
  {
    $this->aiaIssuingCertificateUrls = $aiaIssuingCertificateUrls;
  }
  /**
   * @return string[]
   */
  public function getAiaIssuingCertificateUrls()
  {
    return $this->aiaIssuingCertificateUrls;
  }
  /**
   * @param KeyId
   */
  public function setAuthorityKeyId(KeyId $authorityKeyId)
  {
    $this->authorityKeyId = $authorityKeyId;
  }
  /**
   * @return KeyId
   */
  public function getAuthorityKeyId()
  {
    return $this->authorityKeyId;
  }
  /**
   * @param CertificateFingerprint
   */
  public function setCertFingerprint(CertificateFingerprint $certFingerprint)
  {
    $this->certFingerprint = $certFingerprint;
  }
  /**
   * @return CertificateFingerprint
   */
  public function getCertFingerprint()
  {
    return $this->certFingerprint;
  }
  /**
   * @param string[]
   */
  public function setCrlDistributionPoints($crlDistributionPoints)
  {
    $this->crlDistributionPoints = $crlDistributionPoints;
  }
  /**
   * @return string[]
   */
  public function getCrlDistributionPoints()
  {
    return $this->crlDistributionPoints;
  }
  /**
   * @param PublicKey
   */
  public function setPublicKey(PublicKey $publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return PublicKey
   */
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  /**
   * @param SubjectDescription
   */
  public function setSubjectDescription(SubjectDescription $subjectDescription)
  {
    $this->subjectDescription = $subjectDescription;
  }
  /**
   * @return SubjectDescription
   */
  public function getSubjectDescription()
  {
    return $this->subjectDescription;
  }
  /**
   * @param KeyId
   */
  public function setSubjectKeyId(KeyId $subjectKeyId)
  {
    $this->subjectKeyId = $subjectKeyId;
  }
  /**
   * @return KeyId
   */
  public function getSubjectKeyId()
  {
    return $this->subjectKeyId;
  }
  /**
   * @param X509Parameters
   */
  public function setX509Description(X509Parameters $x509Description)
  {
    $this->x509Description = $x509Description;
  }
  /**
   * @return X509Parameters
   */
  public function getX509Description()
  {
    return $this->x509Description;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CertificateDescription::class, 'Google_Service_CertificateAuthorityService_CertificateDescription');
