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

class NlpSaftLabeledSpan extends \Google\Model
{
  /**
   * @var int
   */
  public $byteEnd;
  /**
   * @var int
   */
  public $byteStart;
  /**
   * @var string
   */
  public $label;
  /**
   * @var float[]
   */
  public $labelScores;
  /**
   * @var float
   */
  public $score;
  /**
   * @var int
   */
  public $tokenEnd;
  /**
   * @var int
   */
  public $tokenStart;

  /**
   * @param int
   */
  public function setByteEnd($byteEnd)
  {
    $this->byteEnd = $byteEnd;
  }
  /**
   * @return int
   */
  public function getByteEnd()
  {
    return $this->byteEnd;
  }
  /**
   * @param int
   */
  public function setByteStart($byteStart)
  {
    $this->byteStart = $byteStart;
  }
  /**
   * @return int
   */
  public function getByteStart()
  {
    return $this->byteStart;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param float[]
   */
  public function setLabelScores($labelScores)
  {
    $this->labelScores = $labelScores;
  }
  /**
   * @return float[]
   */
  public function getLabelScores()
  {
    return $this->labelScores;
  }
  /**
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
  /**
   * @param int
   */
  public function setTokenEnd($tokenEnd)
  {
    $this->tokenEnd = $tokenEnd;
  }
  /**
   * @return int
   */
  public function getTokenEnd()
  {
    return $this->tokenEnd;
  }
  /**
   * @param int
   */
  public function setTokenStart($tokenStart)
  {
    $this->tokenStart = $tokenStart;
  }
  /**
   * @return int
   */
  public function getTokenStart()
  {
    return $this->tokenStart;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftLabeledSpan::class, 'Google_Service_Contentwarehouse_NlpSaftLabeledSpan');
