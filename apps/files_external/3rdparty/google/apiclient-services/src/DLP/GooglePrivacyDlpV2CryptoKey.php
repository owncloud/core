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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2CryptoKey extends \Google\Model
{
  protected $kmsWrappedType = GooglePrivacyDlpV2KmsWrappedCryptoKey::class;
  protected $kmsWrappedDataType = '';
  protected $transientType = GooglePrivacyDlpV2TransientCryptoKey::class;
  protected $transientDataType = '';
  protected $unwrappedType = GooglePrivacyDlpV2UnwrappedCryptoKey::class;
  protected $unwrappedDataType = '';

  /**
   * @param GooglePrivacyDlpV2KmsWrappedCryptoKey
   */
  public function setKmsWrapped(GooglePrivacyDlpV2KmsWrappedCryptoKey $kmsWrapped)
  {
    $this->kmsWrapped = $kmsWrapped;
  }
  /**
   * @return GooglePrivacyDlpV2KmsWrappedCryptoKey
   */
  public function getKmsWrapped()
  {
    return $this->kmsWrapped;
  }
  /**
   * @param GooglePrivacyDlpV2TransientCryptoKey
   */
  public function setTransient(GooglePrivacyDlpV2TransientCryptoKey $transient)
  {
    $this->transient = $transient;
  }
  /**
   * @return GooglePrivacyDlpV2TransientCryptoKey
   */
  public function getTransient()
  {
    return $this->transient;
  }
  /**
   * @param GooglePrivacyDlpV2UnwrappedCryptoKey
   */
  public function setUnwrapped(GooglePrivacyDlpV2UnwrappedCryptoKey $unwrapped)
  {
    $this->unwrapped = $unwrapped;
  }
  /**
   * @return GooglePrivacyDlpV2UnwrappedCryptoKey
   */
  public function getUnwrapped()
  {
    return $this->unwrapped;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2CryptoKey::class, 'Google_Service_DLP_GooglePrivacyDlpV2CryptoKey');
