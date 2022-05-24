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

class KeyUsageOptions extends \Google\Model
{
  /**
   * @var bool
   */
  public $certSign;
  /**
   * @var bool
   */
  public $contentCommitment;
  /**
   * @var bool
   */
  public $crlSign;
  /**
   * @var bool
   */
  public $dataEncipherment;
  /**
   * @var bool
   */
  public $decipherOnly;
  /**
   * @var bool
   */
  public $digitalSignature;
  /**
   * @var bool
   */
  public $encipherOnly;
  /**
   * @var bool
   */
  public $keyAgreement;
  /**
   * @var bool
   */
  public $keyEncipherment;

  /**
   * @param bool
   */
  public function setCertSign($certSign)
  {
    $this->certSign = $certSign;
  }
  /**
   * @return bool
   */
  public function getCertSign()
  {
    return $this->certSign;
  }
  /**
   * @param bool
   */
  public function setContentCommitment($contentCommitment)
  {
    $this->contentCommitment = $contentCommitment;
  }
  /**
   * @return bool
   */
  public function getContentCommitment()
  {
    return $this->contentCommitment;
  }
  /**
   * @param bool
   */
  public function setCrlSign($crlSign)
  {
    $this->crlSign = $crlSign;
  }
  /**
   * @return bool
   */
  public function getCrlSign()
  {
    return $this->crlSign;
  }
  /**
   * @param bool
   */
  public function setDataEncipherment($dataEncipherment)
  {
    $this->dataEncipherment = $dataEncipherment;
  }
  /**
   * @return bool
   */
  public function getDataEncipherment()
  {
    return $this->dataEncipherment;
  }
  /**
   * @param bool
   */
  public function setDecipherOnly($decipherOnly)
  {
    $this->decipherOnly = $decipherOnly;
  }
  /**
   * @return bool
   */
  public function getDecipherOnly()
  {
    return $this->decipherOnly;
  }
  /**
   * @param bool
   */
  public function setDigitalSignature($digitalSignature)
  {
    $this->digitalSignature = $digitalSignature;
  }
  /**
   * @return bool
   */
  public function getDigitalSignature()
  {
    return $this->digitalSignature;
  }
  /**
   * @param bool
   */
  public function setEncipherOnly($encipherOnly)
  {
    $this->encipherOnly = $encipherOnly;
  }
  /**
   * @return bool
   */
  public function getEncipherOnly()
  {
    return $this->encipherOnly;
  }
  /**
   * @param bool
   */
  public function setKeyAgreement($keyAgreement)
  {
    $this->keyAgreement = $keyAgreement;
  }
  /**
   * @return bool
   */
  public function getKeyAgreement()
  {
    return $this->keyAgreement;
  }
  /**
   * @param bool
   */
  public function setKeyEncipherment($keyEncipherment)
  {
    $this->keyEncipherment = $keyEncipherment;
  }
  /**
   * @return bool
   */
  public function getKeyEncipherment()
  {
    return $this->keyEncipherment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KeyUsageOptions::class, 'Google_Service_CertificateAuthorityService_KeyUsageOptions');
