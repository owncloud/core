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

class ExtendedKeyUsageOptions extends \Google\Model
{
  /**
   * @var bool
   */
  public $clientAuth;
  /**
   * @var bool
   */
  public $codeSigning;
  /**
   * @var bool
   */
  public $emailProtection;
  /**
   * @var bool
   */
  public $ocspSigning;
  /**
   * @var bool
   */
  public $serverAuth;
  /**
   * @var bool
   */
  public $timeStamping;

  /**
   * @param bool
   */
  public function setClientAuth($clientAuth)
  {
    $this->clientAuth = $clientAuth;
  }
  /**
   * @return bool
   */
  public function getClientAuth()
  {
    return $this->clientAuth;
  }
  /**
   * @param bool
   */
  public function setCodeSigning($codeSigning)
  {
    $this->codeSigning = $codeSigning;
  }
  /**
   * @return bool
   */
  public function getCodeSigning()
  {
    return $this->codeSigning;
  }
  /**
   * @param bool
   */
  public function setEmailProtection($emailProtection)
  {
    $this->emailProtection = $emailProtection;
  }
  /**
   * @return bool
   */
  public function getEmailProtection()
  {
    return $this->emailProtection;
  }
  /**
   * @param bool
   */
  public function setOcspSigning($ocspSigning)
  {
    $this->ocspSigning = $ocspSigning;
  }
  /**
   * @return bool
   */
  public function getOcspSigning()
  {
    return $this->ocspSigning;
  }
  /**
   * @param bool
   */
  public function setServerAuth($serverAuth)
  {
    $this->serverAuth = $serverAuth;
  }
  /**
   * @return bool
   */
  public function getServerAuth()
  {
    return $this->serverAuth;
  }
  /**
   * @param bool
   */
  public function setTimeStamping($timeStamping)
  {
    $this->timeStamping = $timeStamping;
  }
  /**
   * @return bool
   */
  public function getTimeStamping()
  {
    return $this->timeStamping;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtendedKeyUsageOptions::class, 'Google_Service_CertificateAuthorityService_ExtendedKeyUsageOptions');
