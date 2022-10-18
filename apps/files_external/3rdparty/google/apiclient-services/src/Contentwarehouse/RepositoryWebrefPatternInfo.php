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

class RepositoryWebrefPatternInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $matchProbability;
  /**
   * @var bool
   */
  public $otherSlotsMentioned;
  /**
   * @var string
   */
  public $pattern;

  /**
   * @param float
   */
  public function setMatchProbability($matchProbability)
  {
    $this->matchProbability = $matchProbability;
  }
  /**
   * @return float
   */
  public function getMatchProbability()
  {
    return $this->matchProbability;
  }
  /**
   * @param bool
   */
  public function setOtherSlotsMentioned($otherSlotsMentioned)
  {
    $this->otherSlotsMentioned = $otherSlotsMentioned;
  }
  /**
   * @return bool
   */
  public function getOtherSlotsMentioned()
  {
    return $this->otherSlotsMentioned;
  }
  /**
   * @param string
   */
  public function setPattern($pattern)
  {
    $this->pattern = $pattern;
  }
  /**
   * @return string
   */
  public function getPattern()
  {
    return $this->pattern;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefPatternInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefPatternInfo');
