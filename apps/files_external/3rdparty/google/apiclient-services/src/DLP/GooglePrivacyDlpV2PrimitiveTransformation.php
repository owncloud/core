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

class GooglePrivacyDlpV2PrimitiveTransformation extends \Google\Model
{
  protected $bucketingConfigType = GooglePrivacyDlpV2BucketingConfig::class;
  protected $bucketingConfigDataType = '';
  protected $characterMaskConfigType = GooglePrivacyDlpV2CharacterMaskConfig::class;
  protected $characterMaskConfigDataType = '';
  protected $cryptoDeterministicConfigType = GooglePrivacyDlpV2CryptoDeterministicConfig::class;
  protected $cryptoDeterministicConfigDataType = '';
  protected $cryptoHashConfigType = GooglePrivacyDlpV2CryptoHashConfig::class;
  protected $cryptoHashConfigDataType = '';
  protected $cryptoReplaceFfxFpeConfigType = GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig::class;
  protected $cryptoReplaceFfxFpeConfigDataType = '';
  protected $dateShiftConfigType = GooglePrivacyDlpV2DateShiftConfig::class;
  protected $dateShiftConfigDataType = '';
  protected $fixedSizeBucketingConfigType = GooglePrivacyDlpV2FixedSizeBucketingConfig::class;
  protected $fixedSizeBucketingConfigDataType = '';
  protected $redactConfigType = GooglePrivacyDlpV2RedactConfig::class;
  protected $redactConfigDataType = '';
  protected $replaceConfigType = GooglePrivacyDlpV2ReplaceValueConfig::class;
  protected $replaceConfigDataType = '';
  protected $replaceDictionaryConfigType = GooglePrivacyDlpV2ReplaceDictionaryConfig::class;
  protected $replaceDictionaryConfigDataType = '';
  protected $replaceWithInfoTypeConfigType = GooglePrivacyDlpV2ReplaceWithInfoTypeConfig::class;
  protected $replaceWithInfoTypeConfigDataType = '';
  protected $timePartConfigType = GooglePrivacyDlpV2TimePartConfig::class;
  protected $timePartConfigDataType = '';

  /**
   * @param GooglePrivacyDlpV2BucketingConfig
   */
  public function setBucketingConfig(GooglePrivacyDlpV2BucketingConfig $bucketingConfig)
  {
    $this->bucketingConfig = $bucketingConfig;
  }
  /**
   * @return GooglePrivacyDlpV2BucketingConfig
   */
  public function getBucketingConfig()
  {
    return $this->bucketingConfig;
  }
  /**
   * @param GooglePrivacyDlpV2CharacterMaskConfig
   */
  public function setCharacterMaskConfig(GooglePrivacyDlpV2CharacterMaskConfig $characterMaskConfig)
  {
    $this->characterMaskConfig = $characterMaskConfig;
  }
  /**
   * @return GooglePrivacyDlpV2CharacterMaskConfig
   */
  public function getCharacterMaskConfig()
  {
    return $this->characterMaskConfig;
  }
  /**
   * @param GooglePrivacyDlpV2CryptoDeterministicConfig
   */
  public function setCryptoDeterministicConfig(GooglePrivacyDlpV2CryptoDeterministicConfig $cryptoDeterministicConfig)
  {
    $this->cryptoDeterministicConfig = $cryptoDeterministicConfig;
  }
  /**
   * @return GooglePrivacyDlpV2CryptoDeterministicConfig
   */
  public function getCryptoDeterministicConfig()
  {
    return $this->cryptoDeterministicConfig;
  }
  /**
   * @param GooglePrivacyDlpV2CryptoHashConfig
   */
  public function setCryptoHashConfig(GooglePrivacyDlpV2CryptoHashConfig $cryptoHashConfig)
  {
    $this->cryptoHashConfig = $cryptoHashConfig;
  }
  /**
   * @return GooglePrivacyDlpV2CryptoHashConfig
   */
  public function getCryptoHashConfig()
  {
    return $this->cryptoHashConfig;
  }
  /**
   * @param GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig
   */
  public function setCryptoReplaceFfxFpeConfig(GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig $cryptoReplaceFfxFpeConfig)
  {
    $this->cryptoReplaceFfxFpeConfig = $cryptoReplaceFfxFpeConfig;
  }
  /**
   * @return GooglePrivacyDlpV2CryptoReplaceFfxFpeConfig
   */
  public function getCryptoReplaceFfxFpeConfig()
  {
    return $this->cryptoReplaceFfxFpeConfig;
  }
  /**
   * @param GooglePrivacyDlpV2DateShiftConfig
   */
  public function setDateShiftConfig(GooglePrivacyDlpV2DateShiftConfig $dateShiftConfig)
  {
    $this->dateShiftConfig = $dateShiftConfig;
  }
  /**
   * @return GooglePrivacyDlpV2DateShiftConfig
   */
  public function getDateShiftConfig()
  {
    return $this->dateShiftConfig;
  }
  /**
   * @param GooglePrivacyDlpV2FixedSizeBucketingConfig
   */
  public function setFixedSizeBucketingConfig(GooglePrivacyDlpV2FixedSizeBucketingConfig $fixedSizeBucketingConfig)
  {
    $this->fixedSizeBucketingConfig = $fixedSizeBucketingConfig;
  }
  /**
   * @return GooglePrivacyDlpV2FixedSizeBucketingConfig
   */
  public function getFixedSizeBucketingConfig()
  {
    return $this->fixedSizeBucketingConfig;
  }
  /**
   * @param GooglePrivacyDlpV2RedactConfig
   */
  public function setRedactConfig(GooglePrivacyDlpV2RedactConfig $redactConfig)
  {
    $this->redactConfig = $redactConfig;
  }
  /**
   * @return GooglePrivacyDlpV2RedactConfig
   */
  public function getRedactConfig()
  {
    return $this->redactConfig;
  }
  /**
   * @param GooglePrivacyDlpV2ReplaceValueConfig
   */
  public function setReplaceConfig(GooglePrivacyDlpV2ReplaceValueConfig $replaceConfig)
  {
    $this->replaceConfig = $replaceConfig;
  }
  /**
   * @return GooglePrivacyDlpV2ReplaceValueConfig
   */
  public function getReplaceConfig()
  {
    return $this->replaceConfig;
  }
  /**
   * @param GooglePrivacyDlpV2ReplaceDictionaryConfig
   */
  public function setReplaceDictionaryConfig(GooglePrivacyDlpV2ReplaceDictionaryConfig $replaceDictionaryConfig)
  {
    $this->replaceDictionaryConfig = $replaceDictionaryConfig;
  }
  /**
   * @return GooglePrivacyDlpV2ReplaceDictionaryConfig
   */
  public function getReplaceDictionaryConfig()
  {
    return $this->replaceDictionaryConfig;
  }
  /**
   * @param GooglePrivacyDlpV2ReplaceWithInfoTypeConfig
   */
  public function setReplaceWithInfoTypeConfig(GooglePrivacyDlpV2ReplaceWithInfoTypeConfig $replaceWithInfoTypeConfig)
  {
    $this->replaceWithInfoTypeConfig = $replaceWithInfoTypeConfig;
  }
  /**
   * @return GooglePrivacyDlpV2ReplaceWithInfoTypeConfig
   */
  public function getReplaceWithInfoTypeConfig()
  {
    return $this->replaceWithInfoTypeConfig;
  }
  /**
   * @param GooglePrivacyDlpV2TimePartConfig
   */
  public function setTimePartConfig(GooglePrivacyDlpV2TimePartConfig $timePartConfig)
  {
    $this->timePartConfig = $timePartConfig;
  }
  /**
   * @return GooglePrivacyDlpV2TimePartConfig
   */
  public function getTimePartConfig()
  {
    return $this->timePartConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2PrimitiveTransformation::class, 'Google_Service_DLP_GooglePrivacyDlpV2PrimitiveTransformation');
