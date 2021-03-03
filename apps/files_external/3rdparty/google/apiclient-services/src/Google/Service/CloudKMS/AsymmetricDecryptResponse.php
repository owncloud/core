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

class Google_Service_CloudKMS_AsymmetricDecryptResponse extends Google_Model
{
  public $plaintext;
  public $plaintextCrc32c;
  public $protectionLevel;
  public $verifiedCiphertextCrc32c;

  public function setPlaintext($plaintext)
  {
    $this->plaintext = $plaintext;
  }
  public function getPlaintext()
  {
    return $this->plaintext;
  }
  public function setPlaintextCrc32c($plaintextCrc32c)
  {
    $this->plaintextCrc32c = $plaintextCrc32c;
  }
  public function getPlaintextCrc32c()
  {
    return $this->plaintextCrc32c;
  }
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  public function setVerifiedCiphertextCrc32c($verifiedCiphertextCrc32c)
  {
    $this->verifiedCiphertextCrc32c = $verifiedCiphertextCrc32c;
  }
  public function getVerifiedCiphertextCrc32c()
  {
    return $this->verifiedCiphertextCrc32c;
  }
}
