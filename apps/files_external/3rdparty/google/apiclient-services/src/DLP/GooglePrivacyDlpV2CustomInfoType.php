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

class GooglePrivacyDlpV2CustomInfoType extends \Google\Collection
{
  protected $collection_key = 'detectionRules';
  protected $detectionRulesType = GooglePrivacyDlpV2DetectionRule::class;
  protected $detectionRulesDataType = 'array';
  protected $dictionaryType = GooglePrivacyDlpV2Dictionary::class;
  protected $dictionaryDataType = '';
  public $exclusionType;
  protected $infoTypeType = GooglePrivacyDlpV2InfoType::class;
  protected $infoTypeDataType = '';
  public $likelihood;
  protected $regexType = GooglePrivacyDlpV2Regex::class;
  protected $regexDataType = '';
  protected $storedTypeType = GooglePrivacyDlpV2StoredType::class;
  protected $storedTypeDataType = '';
  protected $surrogateTypeType = GooglePrivacyDlpV2SurrogateType::class;
  protected $surrogateTypeDataType = '';

  /**
   * @param GooglePrivacyDlpV2DetectionRule[]
   */
  public function setDetectionRules($detectionRules)
  {
    $this->detectionRules = $detectionRules;
  }
  /**
   * @return GooglePrivacyDlpV2DetectionRule[]
   */
  public function getDetectionRules()
  {
    return $this->detectionRules;
  }
  /**
   * @param GooglePrivacyDlpV2Dictionary
   */
  public function setDictionary(GooglePrivacyDlpV2Dictionary $dictionary)
  {
    $this->dictionary = $dictionary;
  }
  /**
   * @return GooglePrivacyDlpV2Dictionary
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
   * @param GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType
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
   * @param GooglePrivacyDlpV2Regex
   */
  public function setRegex(GooglePrivacyDlpV2Regex $regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return GooglePrivacyDlpV2Regex
   */
  public function getRegex()
  {
    return $this->regex;
  }
  /**
   * @param GooglePrivacyDlpV2StoredType
   */
  public function setStoredType(GooglePrivacyDlpV2StoredType $storedType)
  {
    $this->storedType = $storedType;
  }
  /**
   * @return GooglePrivacyDlpV2StoredType
   */
  public function getStoredType()
  {
    return $this->storedType;
  }
  /**
   * @param GooglePrivacyDlpV2SurrogateType
   */
  public function setSurrogateType(GooglePrivacyDlpV2SurrogateType $surrogateType)
  {
    $this->surrogateType = $surrogateType;
  }
  /**
   * @return GooglePrivacyDlpV2SurrogateType
   */
  public function getSurrogateType()
  {
    return $this->surrogateType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2CustomInfoType::class, 'Google_Service_DLP_GooglePrivacyDlpV2CustomInfoType');
