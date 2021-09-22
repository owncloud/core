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

class EncryptResponse extends \Google\Model
{
  public $ciphertext;
  public $ciphertextCrc32c;
  public $name;
  public $protectionLevel;
  public $verifiedAdditionalAuthenticatedDataCrc32c;
  public $verifiedPlaintextCrc32c;

  public function setCiphertext($ciphertext)
  {
    $this->ciphertext = $ciphertext;
  }
  public function getCiphertext()
  {
    return $this->ciphertext;
  }
  public function setCiphertextCrc32c($ciphertextCrc32c)
  {
    $this->ciphertextCrc32c = $ciphertextCrc32c;
  }
  public function getCiphertextCrc32c()
  {
    return $this->ciphertextCrc32c;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  public function setVerifiedAdditionalAuthenticatedDataCrc32c($verifiedAdditionalAuthenticatedDataCrc32c)
  {
    $this->verifiedAdditionalAuthenticatedDataCrc32c = $verifiedAdditionalAuthenticatedDataCrc32c;
  }
  public function getVerifiedAdditionalAuthenticatedDataCrc32c()
  {
    return $this->verifiedAdditionalAuthenticatedDataCrc32c;
  }
  public function setVerifiedPlaintextCrc32c($verifiedPlaintextCrc32c)
  {
    $this->verifiedPlaintextCrc32c = $verifiedPlaintextCrc32c;
  }
  public function getVerifiedPlaintextCrc32c()
  {
    return $this->verifiedPlaintextCrc32c;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EncryptResponse::class, 'Google_Service_CloudKMS_EncryptResponse');
