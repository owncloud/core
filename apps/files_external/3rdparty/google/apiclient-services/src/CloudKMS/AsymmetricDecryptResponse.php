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

class AsymmetricDecryptResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $plaintext;
  /**
   * @var string
   */
  public $plaintextCrc32c;
  /**
   * @var string
   */
  public $protectionLevel;
  /**
   * @var bool
   */
  public $verifiedCiphertextCrc32c;

  /**
   * @param string
   */
  public function setPlaintext($plaintext)
  {
    $this->plaintext = $plaintext;
  }
  /**
   * @return string
   */
  public function getPlaintext()
  {
    return $this->plaintext;
  }
  /**
   * @param string
   */
  public function setPlaintextCrc32c($plaintextCrc32c)
  {
    $this->plaintextCrc32c = $plaintextCrc32c;
  }
  /**
   * @return string
   */
  public function getPlaintextCrc32c()
  {
    return $this->plaintextCrc32c;
  }
  /**
   * @param string
   */
  public function setProtectionLevel($protectionLevel)
  {
    $this->protectionLevel = $protectionLevel;
  }
  /**
   * @return string
   */
  public function getProtectionLevel()
  {
    return $this->protectionLevel;
  }
  /**
   * @param bool
   */
  public function setVerifiedCiphertextCrc32c($verifiedCiphertextCrc32c)
  {
    $this->verifiedCiphertextCrc32c = $verifiedCiphertextCrc32c;
  }
  /**
   * @return bool
   */
  public function getVerifiedCiphertextCrc32c()
  {
    return $this->verifiedCiphertextCrc32c;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AsymmetricDecryptResponse::class, 'Google_Service_CloudKMS_AsymmetricDecryptResponse');
