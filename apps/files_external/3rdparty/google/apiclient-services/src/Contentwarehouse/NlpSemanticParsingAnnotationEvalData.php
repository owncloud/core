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

class NlpSemanticParsingAnnotationEvalData extends \Google\Collection
{
  protected $collection_key = 'additionalSpans';
  protected $additionalSpansType = NlpSemanticParsingAnnotationEvalData::class;
  protected $additionalSpansDataType = 'array';
  /**
   * @var int
   */
  public $numBytes;
  /**
   * @var int
   */
  public $numTokens;
  /**
   * @var int
   */
  public $startByte;
  /**
   * @var int
   */
  public $startToken;

  /**
   * @param NlpSemanticParsingAnnotationEvalData[]
   */
  public function setAdditionalSpans($additionalSpans)
  {
    $this->additionalSpans = $additionalSpans;
  }
  /**
   * @return NlpSemanticParsingAnnotationEvalData[]
   */
  public function getAdditionalSpans()
  {
    return $this->additionalSpans;
  }
  /**
   * @param int
   */
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  /**
   * @return int
   */
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  /**
   * @param int
   */
  public function setNumTokens($numTokens)
  {
    $this->numTokens = $numTokens;
  }
  /**
   * @return int
   */
  public function getNumTokens()
  {
    return $this->numTokens;
  }
  /**
   * @param int
   */
  public function setStartByte($startByte)
  {
    $this->startByte = $startByte;
  }
  /**
   * @return int
   */
  public function getStartByte()
  {
    return $this->startByte;
  }
  /**
   * @param int
   */
  public function setStartToken($startToken)
  {
    $this->startToken = $startToken;
  }
  /**
   * @return int
   */
  public function getStartToken()
  {
    return $this->startToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingAnnotationEvalData::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingAnnotationEvalData');
