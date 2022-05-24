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

class EncryptRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $additionalAuthenticatedData;
  /**
   * @var string
   */
  public $additionalAuthenticatedDataCrc32c;
  /**
   * @var string
   */
  public $plaintext;
  /**
   * @var string
   */
  public $plaintextCrc32c;

  /**
   * @param string
   */
  public function setAdditionalAuthenticatedData($additionalAuthenticatedData)
  {
    $this->additionalAuthenticatedData = $additionalAuthenticatedData;
  }
  /**
   * @return string
   */
  public function getAdditionalAuthenticatedData()
  {
    return $this->additionalAuthenticatedData;
  }
  /**
   * @param string
   */
  public function setAdditionalAuthenticatedDataCrc32c($additionalAuthenticatedDataCrc32c)
  {
    $this->additionalAuthenticatedDataCrc32c = $additionalAuthenticatedDataCrc32c;
  }
  /**
   * @return string
   */
  public function getAdditionalAuthenticatedDataCrc32c()
  {
    return $this->additionalAuthenticatedDataCrc32c;
  }
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EncryptRequest::class, 'Google_Service_CloudKMS_EncryptRequest');
