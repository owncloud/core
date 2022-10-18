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

class IndexingDocjoinerAnchorPhraseSpamInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $phraseAnchorSpamCount;
  /**
   * @var float
   */
  public $phraseAnchorSpamDays;
  /**
   * @var string
   */
  public $phraseAnchorSpamDemoted;
  /**
   * @var string
   */
  public $phraseAnchorSpamEnd;
  /**
   * @var float
   */
  public $phraseAnchorSpamFraq;
  /**
   * @var float
   */
  public $phraseAnchorSpamPenalty;
  /**
   * @var string
   */
  public $phraseAnchorSpamProcessed;
  /**
   * @var float
   */
  public $phraseAnchorSpamRate;
  /**
   * @var string
   */
  public $phraseAnchorSpamStart;

  /**
   * @param float
   */
  public function setPhraseAnchorSpamCount($phraseAnchorSpamCount)
  {
    $this->phraseAnchorSpamCount = $phraseAnchorSpamCount;
  }
  /**
   * @return float
   */
  public function getPhraseAnchorSpamCount()
  {
    return $this->phraseAnchorSpamCount;
  }
  /**
   * @param float
   */
  public function setPhraseAnchorSpamDays($phraseAnchorSpamDays)
  {
    $this->phraseAnchorSpamDays = $phraseAnchorSpamDays;
  }
  /**
   * @return float
   */
  public function getPhraseAnchorSpamDays()
  {
    return $this->phraseAnchorSpamDays;
  }
  /**
   * @param string
   */
  public function setPhraseAnchorSpamDemoted($phraseAnchorSpamDemoted)
  {
    $this->phraseAnchorSpamDemoted = $phraseAnchorSpamDemoted;
  }
  /**
   * @return string
   */
  public function getPhraseAnchorSpamDemoted()
  {
    return $this->phraseAnchorSpamDemoted;
  }
  /**
   * @param string
   */
  public function setPhraseAnchorSpamEnd($phraseAnchorSpamEnd)
  {
    $this->phraseAnchorSpamEnd = $phraseAnchorSpamEnd;
  }
  /**
   * @return string
   */
  public function getPhraseAnchorSpamEnd()
  {
    return $this->phraseAnchorSpamEnd;
  }
  /**
   * @param float
   */
  public function setPhraseAnchorSpamFraq($phraseAnchorSpamFraq)
  {
    $this->phraseAnchorSpamFraq = $phraseAnchorSpamFraq;
  }
  /**
   * @return float
   */
  public function getPhraseAnchorSpamFraq()
  {
    return $this->phraseAnchorSpamFraq;
  }
  /**
   * @param float
   */
  public function setPhraseAnchorSpamPenalty($phraseAnchorSpamPenalty)
  {
    $this->phraseAnchorSpamPenalty = $phraseAnchorSpamPenalty;
  }
  /**
   * @return float
   */
  public function getPhraseAnchorSpamPenalty()
  {
    return $this->phraseAnchorSpamPenalty;
  }
  /**
   * @param string
   */
  public function setPhraseAnchorSpamProcessed($phraseAnchorSpamProcessed)
  {
    $this->phraseAnchorSpamProcessed = $phraseAnchorSpamProcessed;
  }
  /**
   * @return string
   */
  public function getPhraseAnchorSpamProcessed()
  {
    return $this->phraseAnchorSpamProcessed;
  }
  /**
   * @param float
   */
  public function setPhraseAnchorSpamRate($phraseAnchorSpamRate)
  {
    $this->phraseAnchorSpamRate = $phraseAnchorSpamRate;
  }
  /**
   * @return float
   */
  public function getPhraseAnchorSpamRate()
  {
    return $this->phraseAnchorSpamRate;
  }
  /**
   * @param string
   */
  public function setPhraseAnchorSpamStart($phraseAnchorSpamStart)
  {
    $this->phraseAnchorSpamStart = $phraseAnchorSpamStart;
  }
  /**
   * @return string
   */
  public function getPhraseAnchorSpamStart()
  {
    return $this->phraseAnchorSpamStart;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDocjoinerAnchorPhraseSpamInfo::class, 'Google_Service_Contentwarehouse_IndexingDocjoinerAnchorPhraseSpamInfo');
