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

class Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificate extends Google_Model
{
  public $certificate;
  protected $fingerprintType = 'Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificateFingerprint';
  protected $fingerprintDataType = '';
  public $issuer;
  public $message;
  public $subject;
  public $valid;
  public $validFrom;
  public $validTo;

  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  public function getCertificate()
  {
    return $this->certificate;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificateFingerprint
   */
  public function setFingerprint(Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificateFingerprint $fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1SamlCertificateFingerprint
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setIssuer($issuer)
  {
    $this->issuer = $issuer;
  }
  public function getIssuer()
  {
    return $this->issuer;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
  public function setValid($valid)
  {
    $this->valid = $valid;
  }
  public function getValid()
  {
    return $this->valid;
  }
  public function setValidFrom($validFrom)
  {
    $this->validFrom = $validFrom;
  }
  public function getValidFrom()
  {
    return $this->validFrom;
  }
  public function setValidTo($validTo)
  {
    $this->validTo = $validTo;
  }
  public function getValidTo()
  {
    return $this->validTo;
  }
}
