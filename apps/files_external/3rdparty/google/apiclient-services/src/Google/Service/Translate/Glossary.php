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

class Google_Service_Translate_Glossary extends Google_Model
{
  public $endTime;
  public $entryCount;
  protected $inputConfigType = 'Google_Service_Translate_GlossaryInputConfig';
  protected $inputConfigDataType = '';
  protected $languageCodesSetType = 'Google_Service_Translate_LanguageCodesSet';
  protected $languageCodesSetDataType = '';
  protected $languagePairType = 'Google_Service_Translate_LanguageCodePair';
  protected $languagePairDataType = '';
  public $name;
  public $submitTime;

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setEntryCount($entryCount)
  {
    $this->entryCount = $entryCount;
  }
  public function getEntryCount()
  {
    return $this->entryCount;
  }
  /**
   * @param Google_Service_Translate_GlossaryInputConfig
   */
  public function setInputConfig(Google_Service_Translate_GlossaryInputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return Google_Service_Translate_GlossaryInputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param Google_Service_Translate_LanguageCodesSet
   */
  public function setLanguageCodesSet(Google_Service_Translate_LanguageCodesSet $languageCodesSet)
  {
    $this->languageCodesSet = $languageCodesSet;
  }
  /**
   * @return Google_Service_Translate_LanguageCodesSet
   */
  public function getLanguageCodesSet()
  {
    return $this->languageCodesSet;
  }
  /**
   * @param Google_Service_Translate_LanguageCodePair
   */
  public function setLanguagePair(Google_Service_Translate_LanguageCodePair $languagePair)
  {
    $this->languagePair = $languagePair;
  }
  /**
   * @return Google_Service_Translate_LanguageCodePair
   */
  public function getLanguagePair()
  {
    return $this->languagePair;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSubmitTime($submitTime)
  {
    $this->submitTime = $submitTime;
  }
  public function getSubmitTime()
  {
    return $this->submitTime;
  }
}
