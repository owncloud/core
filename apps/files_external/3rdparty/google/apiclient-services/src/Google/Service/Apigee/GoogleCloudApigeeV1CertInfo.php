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

class Google_Service_Apigee_GoogleCloudApigeeV1CertInfo extends Google_Collection
{
  protected $collection_key = 'subjectAlternativeNames';
  public $basicConstraints;
  public $expiryDate;
  public $isValid;
  public $issuer;
  public $publicKey;
  public $serialNumber;
  public $sigAlgName;
  public $subject;
  public $subjectAlternativeNames;
  public $validFrom;
  public $version;

  public function setBasicConstraints($basicConstraints)
  {
    $this->basicConstraints = $basicConstraints;
  }
  public function getBasicConstraints()
  {
    return $this->basicConstraints;
  }
  public function setExpiryDate($expiryDate)
  {
    $this->expiryDate = $expiryDate;
  }
  public function getExpiryDate()
  {
    return $this->expiryDate;
  }
  public function setIsValid($isValid)
  {
    $this->isValid = $isValid;
  }
  public function getIsValid()
  {
    return $this->isValid;
  }
  public function setIssuer($issuer)
  {
    $this->issuer = $issuer;
  }
  public function getIssuer()
  {
    return $this->issuer;
  }
  public function setPublicKey($publicKey)
  {
    $this->publicKey = $publicKey;
  }
  public function getPublicKey()
  {
    return $this->publicKey;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setSigAlgName($sigAlgName)
  {
    $this->sigAlgName = $sigAlgName;
  }
  public function getSigAlgName()
  {
    return $this->sigAlgName;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
  public function setSubjectAlternativeNames($subjectAlternativeNames)
  {
    $this->subjectAlternativeNames = $subjectAlternativeNames;
  }
  public function getSubjectAlternativeNames()
  {
    return $this->subjectAlternativeNames;
  }
  public function setValidFrom($validFrom)
  {
    $this->validFrom = $validFrom;
  }
  public function getValidFrom()
  {
    return $this->validFrom;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}
