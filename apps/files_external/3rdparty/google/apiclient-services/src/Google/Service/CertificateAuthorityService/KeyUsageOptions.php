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

class Google_Service_CertificateAuthorityService_KeyUsageOptions extends Google_Model
{
  public $certSign;
  public $contentCommitment;
  public $crlSign;
  public $dataEncipherment;
  public $decipherOnly;
  public $digitalSignature;
  public $encipherOnly;
  public $keyAgreement;
  public $keyEncipherment;

  public function setCertSign($certSign)
  {
    $this->certSign = $certSign;
  }
  public function getCertSign()
  {
    return $this->certSign;
  }
  public function setContentCommitment($contentCommitment)
  {
    $this->contentCommitment = $contentCommitment;
  }
  public function getContentCommitment()
  {
    return $this->contentCommitment;
  }
  public function setCrlSign($crlSign)
  {
    $this->crlSign = $crlSign;
  }
  public function getCrlSign()
  {
    return $this->crlSign;
  }
  public function setDataEncipherment($dataEncipherment)
  {
    $this->dataEncipherment = $dataEncipherment;
  }
  public function getDataEncipherment()
  {
    return $this->dataEncipherment;
  }
  public function setDecipherOnly($decipherOnly)
  {
    $this->decipherOnly = $decipherOnly;
  }
  public function getDecipherOnly()
  {
    return $this->decipherOnly;
  }
  public function setDigitalSignature($digitalSignature)
  {
    $this->digitalSignature = $digitalSignature;
  }
  public function getDigitalSignature()
  {
    return $this->digitalSignature;
  }
  public function setEncipherOnly($encipherOnly)
  {
    $this->encipherOnly = $encipherOnly;
  }
  public function getEncipherOnly()
  {
    return $this->encipherOnly;
  }
  public function setKeyAgreement($keyAgreement)
  {
    $this->keyAgreement = $keyAgreement;
  }
  public function getKeyAgreement()
  {
    return $this->keyAgreement;
  }
  public function setKeyEncipherment($keyEncipherment)
  {
    $this->keyEncipherment = $keyEncipherment;
  }
  public function getKeyEncipherment()
  {
    return $this->keyEncipherment;
  }
}
