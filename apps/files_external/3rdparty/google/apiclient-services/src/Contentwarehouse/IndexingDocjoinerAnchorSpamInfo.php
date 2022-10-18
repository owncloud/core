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

class IndexingDocjoinerAnchorSpamInfo extends \Google\Collection
{
  protected $collection_key = 'sources';
  /**
   * @var string
   */
  public $anchorEnd;
  /**
   * @var float
   */
  public $anchorFraq;
  /**
   * @var string
   */
  public $anchorStart;
  /**
   * @var string
   */
  public $demoted;
  /**
   * @var bool
   */
  public $demotedAll;
  /**
   * @var string
   */
  public $demotedEnd;
  /**
   * @var string
   */
  public $demotedStart;
  /**
   * @var float
   */
  public $phraseCount;
  /**
   * @var float
   */
  public $phraseDays;
  /**
   * @var float
   */
  public $phraseFraq;
  /**
   * @var float
   */
  public $phraseRate;
  /**
   * @var string
   */
  public $processed;
  /**
   * @var bool
   */
  public $sampled;
  protected $sourcesType = IndexingDocjoinerAnchorTrustedInfo::class;
  protected $sourcesDataType = 'array';
  /**
   * @var string
   */
  public $spamDebugInfo;
  /**
   * @var float
   */
  public $spamPenalty;
  /**
   * @var float
   */
  public $spamProbability;
  /**
   * @var string
   */
  public $trustedDemoted;
  /**
   * @var string
   */
  public $trustedExamples;
  /**
   * @var string
   */
  public $trustedMatching;
  /**
   * @var bool
   */
  public $trustedTarget;
  /**
   * @var string
   */
  public $trustedTotal;

  /**
   * @param string
   */
  public function setAnchorEnd($anchorEnd)
  {
    $this->anchorEnd = $anchorEnd;
  }
  /**
   * @return string
   */
  public function getAnchorEnd()
  {
    return $this->anchorEnd;
  }
  /**
   * @param float
   */
  public function setAnchorFraq($anchorFraq)
  {
    $this->anchorFraq = $anchorFraq;
  }
  /**
   * @return float
   */
  public function getAnchorFraq()
  {
    return $this->anchorFraq;
  }
  /**
   * @param string
   */
  public function setAnchorStart($anchorStart)
  {
    $this->anchorStart = $anchorStart;
  }
  /**
   * @return string
   */
  public function getAnchorStart()
  {
    return $this->anchorStart;
  }
  /**
   * @param string
   */
  public function setDemoted($demoted)
  {
    $this->demoted = $demoted;
  }
  /**
   * @return string
   */
  public function getDemoted()
  {
    return $this->demoted;
  }
  /**
   * @param bool
   */
  public function setDemotedAll($demotedAll)
  {
    $this->demotedAll = $demotedAll;
  }
  /**
   * @return bool
   */
  public function getDemotedAll()
  {
    return $this->demotedAll;
  }
  /**
   * @param string
   */
  public function setDemotedEnd($demotedEnd)
  {
    $this->demotedEnd = $demotedEnd;
  }
  /**
   * @return string
   */
  public function getDemotedEnd()
  {
    return $this->demotedEnd;
  }
  /**
   * @param string
   */
  public function setDemotedStart($demotedStart)
  {
    $this->demotedStart = $demotedStart;
  }
  /**
   * @return string
   */
  public function getDemotedStart()
  {
    return $this->demotedStart;
  }
  /**
   * @param float
   */
  public function setPhraseCount($phraseCount)
  {
    $this->phraseCount = $phraseCount;
  }
  /**
   * @return float
   */
  public function getPhraseCount()
  {
    return $this->phraseCount;
  }
  /**
   * @param float
   */
  public function setPhraseDays($phraseDays)
  {
    $this->phraseDays = $phraseDays;
  }
  /**
   * @return float
   */
  public function getPhraseDays()
  {
    return $this->phraseDays;
  }
  /**
   * @param float
   */
  public function setPhraseFraq($phraseFraq)
  {
    $this->phraseFraq = $phraseFraq;
  }
  /**
   * @return float
   */
  public function getPhraseFraq()
  {
    return $this->phraseFraq;
  }
  /**
   * @param float
   */
  public function setPhraseRate($phraseRate)
  {
    $this->phraseRate = $phraseRate;
  }
  /**
   * @return float
   */
  public function getPhraseRate()
  {
    return $this->phraseRate;
  }
  /**
   * @param string
   */
  public function setProcessed($processed)
  {
    $this->processed = $processed;
  }
  /**
   * @return string
   */
  public function getProcessed()
  {
    return $this->processed;
  }
  /**
   * @param bool
   */
  public function setSampled($sampled)
  {
    $this->sampled = $sampled;
  }
  /**
   * @return bool
   */
  public function getSampled()
  {
    return $this->sampled;
  }
  /**
   * @param IndexingDocjoinerAnchorTrustedInfo[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return IndexingDocjoinerAnchorTrustedInfo[]
   */
  public function getSources()
  {
    return $this->sources;
  }
  /**
   * @param string
   */
  public function setSpamDebugInfo($spamDebugInfo)
  {
    $this->spamDebugInfo = $spamDebugInfo;
  }
  /**
   * @return string
   */
  public function getSpamDebugInfo()
  {
    return $this->spamDebugInfo;
  }
  /**
   * @param float
   */
  public function setSpamPenalty($spamPenalty)
  {
    $this->spamPenalty = $spamPenalty;
  }
  /**
   * @return float
   */
  public function getSpamPenalty()
  {
    return $this->spamPenalty;
  }
  /**
   * @param float
   */
  public function setSpamProbability($spamProbability)
  {
    $this->spamProbability = $spamProbability;
  }
  /**
   * @return float
   */
  public function getSpamProbability()
  {
    return $this->spamProbability;
  }
  /**
   * @param string
   */
  public function setTrustedDemoted($trustedDemoted)
  {
    $this->trustedDemoted = $trustedDemoted;
  }
  /**
   * @return string
   */
  public function getTrustedDemoted()
  {
    return $this->trustedDemoted;
  }
  /**
   * @param string
   */
  public function setTrustedExamples($trustedExamples)
  {
    $this->trustedExamples = $trustedExamples;
  }
  /**
   * @return string
   */
  public function getTrustedExamples()
  {
    return $this->trustedExamples;
  }
  /**
   * @param string
   */
  public function setTrustedMatching($trustedMatching)
  {
    $this->trustedMatching = $trustedMatching;
  }
  /**
   * @return string
   */
  public function getTrustedMatching()
  {
    return $this->trustedMatching;
  }
  /**
   * @param bool
   */
  public function setTrustedTarget($trustedTarget)
  {
    $this->trustedTarget = $trustedTarget;
  }
  /**
   * @return bool
   */
  public function getTrustedTarget()
  {
    return $this->trustedTarget;
  }
  /**
   * @param string
   */
  public function setTrustedTotal($trustedTotal)
  {
    $this->trustedTotal = $trustedTotal;
  }
  /**
   * @return string
   */
  public function getTrustedTotal()
  {
    return $this->trustedTotal;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDocjoinerAnchorSpamInfo::class, 'Google_Service_Contentwarehouse_IndexingDocjoinerAnchorSpamInfo');
