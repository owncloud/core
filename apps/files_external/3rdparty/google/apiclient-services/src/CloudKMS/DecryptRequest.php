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

class DecryptRequest extends \Google\Model
{
  public $additionalAuthenticatedData;
  public $additionalAuthenticatedDataCrc32c;
  public $ciphertext;
  public $ciphertextCrc32c;

  public function setAdditionalAuthenticatedData($additionalAuthenticatedData)
  {
    $this->additionalAuthenticatedData = $additionalAuthenticatedData;
  }
  public function getAdditionalAuthenticatedData()
  {
    return $this->additionalAuthenticatedData;
  }
  public function setAdditionalAuthenticatedDataCrc32c($additionalAuthenticatedDataCrc32c)
  {
    $this->additionalAuthenticatedDataCrc32c = $additionalAuthenticatedDataCrc32c;
  }
  public function getAdditionalAuthenticatedDataCrc32c()
  {
    return $this->additionalAuthenticatedDataCrc32c;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DecryptRequest::class, 'Google_Service_CloudKMS_DecryptRequest');
