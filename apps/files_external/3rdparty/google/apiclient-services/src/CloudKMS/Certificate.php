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

namespace Google\Service\CloudKMS;

class Certificate extends \Google\Collection
{
  protected $collection_key = 'subjectAlternativeDnsNames';
  /**
   * @var string
   */
  public $issuer;
  /**
   * @var string
   */
  public $notAfterTime;
  /**
   * @var string
   */
  public $notBeforeTime;
  /**
   * @var bool
   */
  public $parsed;
  /**
   * @var string
   */
  public $rawDer;
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var string
   */
  public $sha256Fingerprint;
  /**
   * @var string
   */
  public $subject;
  /**
   * @var string[]
   */
  public $subjectAlternativeDnsNames;

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
  public function setNotAfterTime($notAfterTime)
  {
    $this->notAfterTime = $notAfterTime;
  }
  /**
   * @return string
   */
  public function getNotAfterTime()
  {
    return $this->notAfterTime;
  }
  /**
   * @param string
   */
  public function setNotBeforeTime($notBeforeTime)
  {
    $this->notBeforeTime = $notBeforeTime;
  }
  /**
   * @return string
   */
  public function getNotBeforeTime()
  {
    return $this->notBeforeTime;
  }
  /**
   * @param bool
   */
  public function setParsed($parsed)
  {
    $this->parsed = $parsed;
  }
  /**
   * @return bool
   */
  public function getParsed()
  {
    return $this->parsed;
  }
  /**
   * @param string
   */
  public function setRawDer($rawDer)
  {
    $this->rawDer = $rawDer;
  }
  /**
   * @return string
   */
  public function getRawDer()
  {
    return $this->rawDer;
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
  public function setSha256Fingerprint($sha256Fingerprint)
  {
    $this->sha256Fingerprint = $sha256Fingerprint;
  }
  /**
   * @return string
   */
  public function getSha256Fingerprint()
  {
    return $this->sha256Fingerprint;
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
  public function setSubjectAlternativeDnsNames($subjectAlternativeDnsNames)
  {
    $this->subjectAlternativeDnsNames = $subjectAlternativeDnsNames;
  }
  /**
   * @return string[]
   */
  public function getSubjectAlternativeDnsNames()
  {
    return $this->subjectAlternativeDnsNames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Certificate::class, 'Google_Service_CloudKMS_Certificate');
