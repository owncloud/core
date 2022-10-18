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

class NlpSemanticParsingDatetimeDuration extends \Google\Model
{
  protected $evalDataType = NlpSemanticParsingAnnotationEvalData::class;
  protected $evalDataDataType = '';
  /**
   * @var string
   */
  public $modifier;
  protected $quantityType = NlpSemanticParsingDatetimeQuantity::class;
  protected $quantityDataType = '';
  protected $spanType = NlpSemanticParsingDatetimeSpan::class;
  protected $spanDataType = '';

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
   * @param NlpSemanticParsingDatetimeQuantity
   */
  public function setQuantity(NlpSemanticParsingDatetimeQuantity $quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return NlpSemanticParsingDatetimeQuantity
   */
  public function getQuantity()
  {
    return $this->quantity;
  }
  /**
   * @param NlpSemanticParsingDatetimeSpan
   */
  public function setSpan(NlpSemanticParsingDatetimeSpan $span)
  {
    $this->span = $span;
  }
  /**
   * @return NlpSemanticParsingDatetimeSpan
   */
  public function getSpan()
  {
    return $this->span;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingDatetimeDuration::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingDatetimeDuration');
