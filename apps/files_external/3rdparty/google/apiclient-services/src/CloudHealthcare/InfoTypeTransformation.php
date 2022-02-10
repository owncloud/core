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

namespace Google\Service\CloudHealthcare;

class InfoTypeTransformation extends \Google\Collection
{
  protected $collection_key = 'infoTypes';
  protected $characterMaskConfigType = CharacterMaskConfig::class;
  protected $characterMaskConfigDataType = '';
  protected $cryptoHashConfigType = CryptoHashConfig::class;
  protected $cryptoHashConfigDataType = '';
  protected $dateShiftConfigType = DateShiftConfig::class;
  protected $dateShiftConfigDataType = '';
  /**
   * @var string[]
   */
  public $infoTypes;
  protected $redactConfigType = RedactConfig::class;
  protected $redactConfigDataType = '';
  protected $replaceWithInfoTypeConfigType = ReplaceWithInfoTypeConfig::class;
  protected $replaceWithInfoTypeConfigDataType = '';

  /**
   * @param CharacterMaskConfig
   */
  public function setCharacterMaskConfig(CharacterMaskConfig $characterMaskConfig)
  {
    $this->characterMaskConfig = $characterMaskConfig;
  }
  /**
   * @return CharacterMaskConfig
   */
  public function getCharacterMaskConfig()
  {
    return $this->characterMaskConfig;
  }
  /**
   * @param CryptoHashConfig
   */
  public function setCryptoHashConfig(CryptoHashConfig $cryptoHashConfig)
  {
    $this->cryptoHashConfig = $cryptoHashConfig;
  }
  /**
   * @return CryptoHashConfig
   */
  public function getCryptoHashConfig()
  {
    return $this->cryptoHashConfig;
  }
  /**
   * @param DateShiftConfig
   */
  public function setDateShiftConfig(DateShiftConfig $dateShiftConfig)
  {
    $this->dateShiftConfig = $dateShiftConfig;
  }
  /**
   * @return DateShiftConfig
   */
  public function getDateShiftConfig()
  {
    return $this->dateShiftConfig;
  }
  /**
   * @param string[]
   */
  public function setInfoTypes($infoTypes)
  {
    $this->infoTypes = $infoTypes;
  }
  /**
   * @return string[]
   */
  public function getInfoTypes()
  {
    return $this->infoTypes;
  }
  /**
   * @param RedactConfig
   */
  public function setRedactConfig(RedactConfig $redactConfig)
  {
    $this->redactConfig = $redactConfig;
  }
  /**
   * @return RedactConfig
   */
  public function getRedactConfig()
  {
    return $this->redactConfig;
  }
  /**
   * @param ReplaceWithInfoTypeConfig
   */
  public function setReplaceWithInfoTypeConfig(ReplaceWithInfoTypeConfig $replaceWithInfoTypeConfig)
  {
    $this->replaceWithInfoTypeConfig = $replaceWithInfoTypeConfig;
  }
  /**
   * @return ReplaceWithInfoTypeConfig
   */
  public function getReplaceWithInfoTypeConfig()
  {
    return $this->replaceWithInfoTypeConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InfoTypeTransformation::class, 'Google_Service_CloudHealthcare_InfoTypeTransformation');
