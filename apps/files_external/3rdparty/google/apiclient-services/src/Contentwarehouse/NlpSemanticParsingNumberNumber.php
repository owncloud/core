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

namespace Google\Service\Contentwarehouse;

class NlpSemanticParsingNumberNumber extends \Google\Model
{
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  protected $fractionNumberType = NlpSemanticParsingNumberFractionNumber::class;
  protected $fractionNumberDataType = '';
  /**
   * @var bool
   */
  public $isSpelledOut;
  /**
   * @var string
   */
  public $modifier;
  /**
   * @var string
   */
  public $normalizedValue;
  /**
   * @var string
   */
  public $rawText;
  protected $simpleNumberType = NlpSemanticParsingNumberSimpleNumber::class;
  protected $simpleNumberDataType = '';
  /**
   * @var string
   */
  public $spelledOutType;

  /**
   * @param NlpSemanticParsingAnnotationEvalData
   */
  public function setEvalData(NlpSemanticParsingAnnotationEvalData $evalData)
  {
    $this->evalData = $evalData;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData
   */
  public function getEvalData()
  {
    return $this->evalData;
  }
  /**
   * @param NlpSemanticParsingNumberFractionNumber
   */
  public function setFractionNumber(NlpSemanticParsingNumberFractionNumber $fractionNumber)
  {
    $this->fractionNumber = $fractionNumber;
  }
  /**
   * @return NlpSemanticParsingNumberFractionNumber
   */
  public function getFractionNumber()
  {
    return $this->fractionNumber;
  }
  /**
   * @param bool
   */
  public function setIsSpelledOut($isSpelledOut)
  {
    $this->isSpelledOut = $isSpelledOut;
  }
  /**
   * @return bool
   */
  public function getIsSpelledOut()
  {
    return $this->isSpelledOut;
  }
  /**
   * @param string
   */
  public function setModifier($modifier)
  {
    $this->modifier = $modifier;
  }
  /**
   * @return string
   */
  public function getModifier()
  {
    return $this->modifier;
  }
  /**
   * @param string
   */
  public function setNormalizedValue($normalizedValue)
  {
    $this->normalizedValue = $normalizedValue;
  }
  /**
   * @return string
   */
  public function getNormalizedValue()
  {
    return $this->normalizedValue;
  }
  /**
   * @param string
   */
  public function setRawText($rawText)
  {
    $this->rawText = $rawText;
  }
  /**
   * @return string
   */
  public function getRawText()
  {
    return $this->rawText;
  }
  /**
   * @param NlpSemanticParsingNumberSimpleNumber
   */
  public function setSimpleNumber(NlpSemanticParsingNumberSimpleNumber $simpleNumber)
  {
    $this->simpleNumber = $simpleNumber;
  }
  /**
   * @return NlpSemanticParsingNumberSimpleNumber
   */
  public function getSimpleNumber()
  {
    return $this->simpleNumber;
  }
  /**
   * @param string
   */
  public function setSpelledOutType($spelledOutType)
  {
    $this->spelledOutType = $spelledOutType;
  }
  /**
   * @return string
   */
  public function getSpelledOutType()
  {
    return $this->spelledOutType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingNumberNumber::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingNumberNumber');
