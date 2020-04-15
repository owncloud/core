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

class Google_Service_DLP_GooglePrivacyDlpV2CustomInfoType extends Google_Collection
{
  protected $collection_key = 'detectionRules';
  protected $detectionRulesType = 'Google_Service_DLP_GooglePrivacyDlpV2DetectionRule';
  protected $detectionRulesDataType = 'array';
  protected $dictionaryType = 'Google_Service_DLP_GooglePrivacyDlpV2Dictionary';
  protected $dictionaryDataType = '';
  public $exclusionType;
  protected $infoTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2InfoType';
  protected $infoTypeDataType = '';
  public $likelihood;
  protected $regexType = 'Google_Service_DLP_GooglePrivacyDlpV2Regex';
  protected $regexDataType = '';
  protected $storedTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2StoredType';
  protected $storedTypeDataType = '';
  protected $surrogateTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2SurrogateType';
  protected $surrogateTypeDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2DetectionRule
   */
  public function setDetectionRules($detectionRules)
  {
    $this->detectionRules = $detectionRules;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2DetectionRule
   */
  public function getDetectionRules()
  {
    return $this->detectionRules;
  }
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
  public function setExclusionType($exclusionType)
  {
    $this->exclusionType = $exclusionType;
  }
  public function getExclusionType()
  {
    return $this->exclusionType;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(Google_Service_DLP_GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InfoType
   */
  public function getInfoType()
  {
    return $this->infoType;
  }
  public function setLikelihood($likelihood)
  {
    $this->likelihood = $likelihood;
  }
  public function getLikelihood()
  {
    return $this->likelihood;
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
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2StoredType
   */
  public function setStoredType(Google_Service_DLP_GooglePrivacyDlpV2StoredType $storedType)
  {
    $this->storedType = $storedType;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2StoredType
   */
  public function getStoredType()
  {
    return $this->storedType;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2SurrogateType
   */
  public function setSurrogateType(Google_Service_DLP_GooglePrivacyDlpV2SurrogateType $surrogateType)
  {
    $this->surrogateType = $surrogateType;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2SurrogateType
   */
  public function getSurrogateType()
  {
    return $this->surrogateType;
  }
}
