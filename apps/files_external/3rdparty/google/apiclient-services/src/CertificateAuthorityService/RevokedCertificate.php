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

class RevokedCertificate extends \Google\Model
{
  /**
   * @var string
   */
  public $certificate;
  /**
   * @var string
   */
  public $hexSerialNumber;
  /**
   * @var string
   */
  public $revocationReason;

  /**
   * @param string
   */
  public function setCertificate($certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return string
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  /**
   * @param string
   */
  public function setHexSerialNumber($hexSerialNumber)
  {
    $this->hexSerialNumber = $hexSerialNumber;
  }
  /**
   * @return string
   */
  public function getHexSerialNumber()
  {
    return $this->hexSerialNumber;
  }
  /**
   * @param string
   */
  public function setRevocationReason($revocationReason)
  {
    $this->revocationReason = $revocationReason;
  }
  /**
   * @return string
   */
  public function getRevocationReason()
  {
    return $this->revocationReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RevokedCertificate::class, 'Google_Service_CertificateAuthorityService_RevokedCertificate');
