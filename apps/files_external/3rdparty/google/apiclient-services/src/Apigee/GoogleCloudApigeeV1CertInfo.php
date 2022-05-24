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

class GoogleCloudApigeeV1CertInfo extends \Google\Collection
{
  protected $collection_key = 'subjectAlternativeNames';
  /**
   * @var string
   */
  public $basicConstraints;
  /**
   * @var string
   */
  public $expiryDate;
  /**
   * @var string
   */
  public $isValid;
  /**
   * @var string
   */
  public $issuer;
  /**
   * @var string
   */
  public $publicKey;
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var string
   */
  public $sigAlgName;
  /**
   * @var string
   */
  public $subject;
  /**
   * @var string[]
   */
  public $subjectAlternativeNames;
  /**
   * @var string
   */
  public $validFrom;
  /**
   * @var int
   */
  public $version;

  /**
   * @param string
   */
  public function setBasicConstraints($basicConstraints)
  {
    $this->basicConstraints = $basicConstraints;
  }
  /**
   * @return string
   */
  public function getBasicConstraints()
  {
    return $this->basicConstraints;
  }
  /**
   * @param string
   */
  public function setExpiryDate($expiryDate)
  {
    $this->expiryDate = $expiryDate;
  }
  /**
   * @return string
   */
  public function getExpiryDate()
  {
    return $this->expiryDate;
  }
  /**
   * @param string
   */
  public function setIsValid($isValid)
  {
    $this->isValid = $isValid;
  }
  /**
   * @return string
   */
  public function getIsValid()
  {
    return $this->isValid;
  }
  /**
   * @param string
   */
  public function setIssuer($issuer)
  {
    $this->issuer = $issuer;
  }
  /**
   * @return string
   */
  public function getIssuer()
  {
    return $this->issuer;
  }
  /**
   * @param string
   */
  public function setPublicKey($publicKey)
  {
    $this->publicKey = $publicKey;
  }
  /**
   * @return string
   */
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  /**
   * @param string
   */
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  /**
   * @return string
   */
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  /**
   * @param string
   */
  public function setSigAlgName($sigAlgName)
  {
    $this->sigAlgName = $sigAlgName;
  }
  /**
   * @return string
   */
  public function getSigAlgName()
  {
    return $this->sigAlgName;
  }
  /**
   * @param string
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return string
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param string[]
   */
  public function setSubjectAlternativeNames($subjectAlternativeNames)
  {
    $this->subjectAlternativeNames = $subjectAlternativeNames;
  }
  /**
   * @return string[]
   */
  public function getSubjectAlternativeNames()
  {
    return $this->subjectAlternativeNames;
  }
  /**
   * @param string
   */
  public function setValidFrom($validFrom)
  {
    $this->validFrom = $validFrom;
  }
  /**
   * @return string
   */
  public function getValidFrom()
  {
    return $this->validFrom;
  }
  /**
   * @param int
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return int
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1CertInfo::class, 'Google_Service_Apigee_GoogleCloudApigeeV1CertInfo');
