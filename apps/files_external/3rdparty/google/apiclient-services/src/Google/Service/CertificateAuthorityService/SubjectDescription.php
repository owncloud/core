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

class Google_Service_CertificateAuthorityService_SubjectDescription extends Google_Model
{
  public $commonName;
  public $hexSerialNumber;
  public $lifetime;
  public $notAfterTime;
  public $notBeforeTime;
  protected $subjectType = 'Google_Service_CertificateAuthorityService_Subject';
  protected $subjectDataType = '';
  protected $subjectAltNameType = 'Google_Service_CertificateAuthorityService_SubjectAltNames';
  protected $subjectAltNameDataType = '';

  public function setCommonName($commonName)
  {
    $this->commonName = $commonName;
  }
  public function getCommonName()
  {
    return $this->commonName;
  }
  public function setHexSerialNumber($hexSerialNumber)
  {
    $this->hexSerialNumber = $hexSerialNumber;
  }
  public function getHexSerialNumber()
  {
    return $this->hexSerialNumber;
  }
  public function setLifetime($lifetime)
  {
    $this->lifetime = $lifetime;
  }
  public function getLifetime()
  {
    return $this->lifetime;
  }
  public function setNotAfterTime($notAfterTime)
  {
    $this->notAfterTime = $notAfterTime;
  }
  public function getNotAfterTime()
  {
    return $this->notAfterTime;
  }
  public function setNotBeforeTime($notBeforeTime)
  {
    $this->notBeforeTime = $notBeforeTime;
  }
  public function getNotBeforeTime()
  {
    return $this->notBeforeTime;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_Subject
   */
  public function setSubject(Google_Service_CertificateAuthorityService_Subject $subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_Subject
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param Google_Service_CertificateAuthorityService_SubjectAltNames
   */
  public function setSubjectAltName(Google_Service_CertificateAuthorityService_SubjectAltNames $subjectAltName)
  {
    $this->subjectAltName = $subjectAltName;
  }
  /**
   * @return Google_Service_CertificateAuthorityService_SubjectAltNames
   */
  public function getSubjectAltName()
  {
    return $this->subjectAltName;
  }
}
