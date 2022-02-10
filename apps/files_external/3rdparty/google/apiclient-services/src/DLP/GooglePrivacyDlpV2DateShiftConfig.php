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

class GooglePrivacyDlpV2DateShiftConfig extends \Google\Model
{
  protected $contextType = GooglePrivacyDlpV2FieldId::class;
  protected $contextDataType = '';
  protected $cryptoKeyType = GooglePrivacyDlpV2CryptoKey::class;
  protected $cryptoKeyDataType = '';
  /**
   * @var int
   */
  public $lowerBoundDays;
  /**
   * @var int
   */
  public $upperBoundDays;

  /**
   * @param GooglePrivacyDlpV2FieldId
   */
  public function setContext(GooglePrivacyDlpV2FieldId $context)
  {
    $this->context = $context;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param GooglePrivacyDlpV2CryptoKey
   */
  public function setCryptoKey(GooglePrivacyDlpV2CryptoKey $cryptoKey)
  {
    $this->cryptoKey = $cryptoKey;
  }
  /**
   * @return GooglePrivacyDlpV2CryptoKey
   */
  public function getCryptoKey()
  {
    return $this->cryptoKey;
  }
  /**
   * @param int
   */
  public function setLowerBoundDays($lowerBoundDays)
  {
    $this->lowerBoundDays = $lowerBoundDays;
  }
  /**
   * @return int
   */
  public function getLowerBoundDays()
  {
    return $this->lowerBoundDays;
  }
  /**
   * @param int
   */
  public function setUpperBoundDays($upperBoundDays)
  {
    $this->upperBoundDays = $upperBoundDays;
  }
  /**
   * @return int
   */
  public function getUpperBoundDays()
  {
    return $this->upperBoundDays;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DateShiftConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2DateShiftConfig');
