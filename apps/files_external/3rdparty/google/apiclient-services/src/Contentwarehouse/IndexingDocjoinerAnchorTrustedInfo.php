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

class IndexingDocjoinerAnchorTrustedInfo extends \Google\Collection
{
  protected $collection_key = 'text';
  /**
   * @var float
   */
  public $matchedScore;
  /**
   * @var string[]
   */
  public $matchedScoreInfo;
  /**
   * @var float
   */
  public $phrasesScore;
  /**
   * @var string
   */
  public $site;
  /**
   * @var string[]
   */
  public $text;
  /**
   * @var float
   */
  public $trustedScore;

  /**
   * @param float
   */
  public function setMatchedScore($matchedScore)
  {
    $this->matchedScore = $matchedScore;
  }
  /**
   * @return float
   */
  public function getMatchedScore()
  {
    return $this->matchedScore;
  }
  /**
   * @param string[]
   */
  public function setMatchedScoreInfo($matchedScoreInfo)
  {
    $this->matchedScoreInfo = $matchedScoreInfo;
  }
  /**
   * @return string[]
   */
  public function getMatchedScoreInfo()
  {
    return $this->matchedScoreInfo;
  }
  /**
   * @param float
   */
  public function setPhrasesScore($phrasesScore)
  {
    $this->phrasesScore = $phrasesScore;
  }
  /**
   * @return float
   */
  public function getPhrasesScore()
  {
    return $this->phrasesScore;
  }
  /**
   * @param string
   */
  public function setSite($site)
  {
    $this->site = $site;
  }
  /**
   * @return string
   */
  public function getSite()
  {
    return $this->site;
  }
  /**
   * @param string[]
   */
  public function setText($text)
  {
    $this->text = $text;
  }
  /**
   * @return string[]
   */
  public function getText()
  {
    return $this->text;
  }
  /**
   * @param float
   */
  public function setTrustedScore($trustedScore)
  {
    $this->trustedScore = $trustedScore;
  }
  /**
   * @return float
   */
  public function getTrustedScore()
  {
    return $this->trustedScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingDocjoinerAnchorTrustedInfo::class, 'Google_Service_Contentwarehouse_IndexingDocjoinerAnchorTrustedInfo');
