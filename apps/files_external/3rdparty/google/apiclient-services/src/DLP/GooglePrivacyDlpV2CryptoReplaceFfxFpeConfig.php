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

class GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $commonAlphabet;
  protected $contextType = GooglePrivacyDlpV2FieldId::class;
  protected $contextDataType = '';
  protected $cryptoKeyType = GooglePrivacyDlpV2CryptoKey::class;
  protected $cryptoKeyDataType = '';
  /**
   * @var string
   */
  public $customAlphabet;
  /**
   * @var int
   */
  public $radix;
  protected $surrogateInfoTypeType = GooglePrivacyDlpV2InfoType::class;
  protected $surrogateInfoTypeDataType = '';

  /**
   * @param string
   */
  public function setCommonAlphabet($commonAlphabet)
  {
    $this->commonAlphabet = $commonAlphabet;
  }
  /**
   * @return string
   */
  public function getCommonAlphabet()
  {
    return $this->commonAlphabet;
  }
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
   * @param string
   */
  public function setCustomAlphabet($customAlphabet)
  {
    $this->customAlphabet = $customAlphabet;
  }
  /**
   * @return string
   */
  public function getCustomAlphabet()
  {
    return $this->customAlphabet;
  }
  /**
   * @param int
   */
  public function setRadix($radix)
  {
    $this->radix = $radix;
  }
  /**
   * @return int
   */
  public function getRadix()
  {
    return $this->radix;
  }
  /**
   * @param GooglePrivacyDlpV2InfoType
   */
  public function setSurrogateInfoType(GooglePrivacyDlpV2InfoType $surrogateInfoType)
  {
    $this->surrogateInfoType = $surrogateInfoType;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType
   */
  public function getSurrogateInfoType()
  {
    return $this->surrogateInfoType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig');
