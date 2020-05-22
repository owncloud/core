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

class Google_Service_CloudHealthcare_InfoTypeTransformation extends Google_Collection
{
  protected $collection_key = 'infoTypes';
  protected $characterMaskConfigType = 'Google_Service_CloudHealthcare_CharacterMaskConfig';
  protected $characterMaskConfigDataType = '';
  protected $cryptoHashConfigType = 'Google_Service_CloudHealthcare_CryptoHashConfig';
  protected $cryptoHashConfigDataType = '';
  protected $dateShiftConfigType = 'Google_Service_CloudHealthcare_DateShiftConfig';
  protected $dateShiftConfigDataType = '';
  public $infoTypes;
  protected $redactConfigType = 'Google_Service_CloudHealthcare_RedactConfig';
  protected $redactConfigDataType = '';
  protected $replaceWithInfoTypeConfigType = 'Google_Service_CloudHealthcare_ReplaceWithInfoTypeConfig';
  protected $replaceWithInfoTypeConfigDataType = '';

  /**
   * @param Google_Service_CloudHealthcare_CharacterMaskConfig
   */
  public function setCharacterMaskConfig(Google_Service_CloudHealthcare_CharacterMaskConfig $characterMaskConfig)
  {
    $this->characterMaskConfig = $characterMaskConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_CharacterMaskConfig
   */
  public function getCharacterMaskConfig()
  {
    return $this->characterMaskConfig;
  }
  /**
   * @param Google_Service_CloudHealthcare_CryptoHashConfig
   */
  public function setCryptoHashConfig(Google_Service_CloudHealthcare_CryptoHashConfig $cryptoHashConfig)
  {
    $this->cryptoHashConfig = $cryptoHashConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_CryptoHashConfig
   */
  public function getCryptoHashConfig()
  {
    return $this->cryptoHashConfig;
  }
  /**
   * @param Google_Service_CloudHealthcare_DateShiftConfig
   */
  public function setDateShiftConfig(Google_Service_CloudHealthcare_DateShiftConfig $dateShiftConfig)
  {
    $this->dateShiftConfig = $dateShiftConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_DateShiftConfig
   */
  public function getDateShiftConfig()
  {
    return $this->dateShiftConfig;
  }
  public function setInfoTypes($infoTypes)
  {
    $this->infoTypes = $infoTypes;
  }
  public function getInfoTypes()
  {
    return $this->infoTypes;
  }
  /**
   * @param Google_Service_CloudHealthcare_RedactConfig
   */
  public function setRedactConfig(Google_Service_CloudHealthcare_RedactConfig $redactConfig)
  {
    $this->redactConfig = $redactConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_RedactConfig
   */
  public function getRedactConfig()
  {
    return $this->redactConfig;
  }
  /**
   * @param Google_Service_CloudHealthcare_ReplaceWithInfoTypeConfig
   */
  public function setReplaceWithInfoTypeConfig(Google_Service_CloudHealthcare_ReplaceWithInfoTypeConfig $replaceWithInfoTypeConfig)
  {
    $this->replaceWithInfoTypeConfig = $replaceWithInfoTypeConfig;
  }
  /**
   * @return Google_Service_CloudHealthcare_ReplaceWithInfoTypeConfig
   */
  public function getReplaceWithInfoTypeConfig()
  {
    return $this->replaceWithInfoTypeConfig;
  }
}
