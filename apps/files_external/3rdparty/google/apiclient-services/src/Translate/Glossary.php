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

namespace Google\Service\Translate;

class Glossary extends \Google\Model
{
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var int
   */
  public $entryCount;
  protected $inputConfigType = GlossaryInputConfig::class;
  protected $inputConfigDataType = '';
  protected $languageCodesSetType = LanguageCodesSet::class;
  protected $languageCodesSetDataType = '';
  protected $languagePairType = LanguageCodePair::class;
  protected $languagePairDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $submitTime;

  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param int
   */
  public function setEntryCount($entryCount)
  {
    $this->entryCount = $entryCount;
  }
  /**
   * @return int
   */
  public function getEntryCount()
  {
    return $this->entryCount;
  }
  /**
   * @param GlossaryInputConfig
   */
  public function setInputConfig(GlossaryInputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return GlossaryInputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param LanguageCodesSet
   */
  public function setLanguageCodesSet(LanguageCodesSet $languageCodesSet)
  {
    $this->languageCodesSet = $languageCodesSet;
  }
  /**
   * @return LanguageCodesSet
   */
  public function getLanguageCodesSet()
  {
    return $this->languageCodesSet;
  }
  /**
   * @param LanguageCodePair
   */
  public function setLanguagePair(LanguageCodePair $languagePair)
  {
    $this->languagePair = $languagePair;
  }
  /**
   * @return LanguageCodePair
   */
  public function getLanguagePair()
  {
    return $this->languagePair;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setSubmitTime($submitTime)
  {
    $this->submitTime = $submitTime;
  }
  /**
   * @return string
   */
  public function getSubmitTime()
  {
    return $this->submitTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Glossary::class, 'Google_Service_Translate_Glossary');
