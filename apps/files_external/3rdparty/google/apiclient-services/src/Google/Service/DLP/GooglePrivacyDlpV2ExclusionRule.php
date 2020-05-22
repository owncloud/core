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

class Google_Service_DLP_GooglePrivacyDlpV2ExclusionRule extends Google_Model
{
  protected $dictionaryType = 'Google_Service_DLP_GooglePrivacyDlpV2Dictionary';
  protected $dictionaryDataType = '';
  protected $excludeInfoTypesType = 'Google_Service_DLP_GooglePrivacyDlpV2ExcludeInfoTypes';
  protected $excludeInfoTypesDataType = '';
  public $matchingType;
  protected $regexType = 'Google_Service_DLP_GooglePrivacyDlpV2Regex';
  protected $regexDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Dictionary
   */
  public function setDictionary(Google_Service_DLP_GooglePrivacyDlpV2Dictionary $dictionary)
  {
    $this->dictionary = $dictionary;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Dictionary
   */
  public function getDictionary()
  {
    return $this->dictionary;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2ExcludeInfoTypes
   */
  public function setExcludeInfoTypes(Google_Service_DLP_GooglePrivacyDlpV2ExcludeInfoTypes $excludeInfoTypes)
  {
    $this->excludeInfoTypes = $excludeInfoTypes;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2ExcludeInfoTypes
   */
  public function getExcludeInfoTypes()
  {
    return $this->excludeInfoTypes;
  }
  public function setMatchingType($matchingType)
  {
    $this->matchingType = $matchingType;
  }
  public function getMatchingType()
  {
    return $this->matchingType;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Regex
   */
  public function setRegex(Google_Service_DLP_GooglePrivacyDlpV2Regex $regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Regex
   */
  public function getRegex()
  {
    return $this->regex;
  }
}
