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

class Google_Service_CertificateAuthorityService_CertificateDescription extends Google_Collection
{
  protected $collection_key = 'crlDistributionPoints';
  public $aiaIssuingCertificateUrls;
  protected $authorityKeyIdType = 'Google_Service_CertificateAuthorityService_KeyId';
  protected $authorityKeyIdDataType = '';
  protected $certFingerprintType = 'Google_Service_CertificateAuthorityService_CertificateFingerprint';
  protected $certFingerprintDataType = '';
  protected $configValuesType = 'Google_Service_CertificateAuthorityService_ReusableConfigValues';
  protected $configValuesDataType = '';
  public $crlDistributionPoints;
  protected $publicKeyType = 'Google_Service_CertificateAuthorityService_PublicKey';
  protected $publicKeyDataType = '';
  protected $subjectDescriptionType = 'Google_Service_CertificateAuthorityService_SubjectDescription';
  protected $subjectDescriptionDataType = '';
  protected $subjectKeyIdType = 'Google_Service_CertificateAuthorityService_KeyId';
  protected $subjectKeyIdDataType = '';

  public function setAiaIssuingCertificateUrls($aiaIssuingCertificateUrls)
  {
    $this->aiaIssuingCertificateUrls = $aiaIssuingCertificateUrls;
  }
  public function getAiaIssuingCertificateUrls()
  {
    return $this->aiaIssuingCertificateUrls;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_KeyId
   */
  public function setAuthorityKeyId(Google_Service_CertificateAuthorityService_KeyId $authorityKeyId)
  {
    $this->authorityKeyId = $authorityKeyId;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_KeyId
   */
  public function getAuthorityKeyId()
  {
    return $this->authorityKeyId;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_CertificateFingerprint
   */
  public function setCertFingerprint(Google_Service_CertificateAuthorityService_CertificateFingerprint $certFingerprint)
  {
    $this->certFingerprint = $certFingerprint;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_CertificateFingerprint
   */
  public function getCertFingerprint()
  {
    return $this->certFingerprint;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_ReusableConfigValues
   */
  public function setConfigValues(Google_Service_CertificateAuthorityService_ReusableConfigValues $configValues)
  {
    $this->configValues = $configValues;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_ReusableConfigValues
   */
  public function getConfigValues()
  {
    return $this->configValues;
  }
  public function setCrlDistributionPoints($crlDistributionPoints)
  {
    $this->crlDistributionPoints = $crlDistributionPoints;
  }
  public function getCrlDistributionPoints()
  {
    return $this->crlDistributionPoints;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_PublicKey
   */
  public function setPublicKey(Google_Service_CertificateAuthorityService_PublicKey $publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_PublicKey
   */
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_SubjectDescription
   */
  public function setSubjectDescription(Google_Service_CertificateAuthorityService_SubjectDescription $subjectDescription)
  {
    $this->subjectDescription = $subjectDescription;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_SubjectDescription
   */
  public function getSubjectDescription()
  {
    return $this->subjectDescription;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_KeyId
   */
  public function setSubjectKeyId(Google_Service_CertificateAuthorityService_KeyId $subjectKeyId)
  {
    $this->subjectKeyId = $subjectKeyId;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_KeyId
   */
  public function getSubjectKeyId()
  {
    return $this->subjectKeyId;
  }
}
