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

class SnippetExtraInfoSnippetScoringInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $brainNg3Score;
  /**
   * @var float
   */
  public $brainScore;
  protected $featuresType = QualityPreviewRanklabSnippet::class;
  protected $featuresDataType = '';
  /**
   * @var float
   */
  public $finalScore;
  /**
   * @var int
   */
  public $rankBySnippetFlow;

  /**
   * @param float
   */
  public function setBrainNg3Score($brainNg3Score)
  {
    $this->brainNg3Score = $brainNg3Score;
  }
  /**
   * @return float
   */
  public function getBrainNg3Score()
  {
    return $this->brainNg3Score;
  }
  /**
   * @param float
   */
  public function setBrainScore($brainScore)
  {
    $this->brainScore = $brainScore;
  }
  /**
   * @return float
   */
  public function getBrainScore()
  {
    return $this->brainScore;
  }
  /**
   * @param QualityPreviewRanklabSnippet
   */
  public function setFeatures(QualityPreviewRanklabSnippet $features)
  {
    $this->features = $features;
  }
  /**
   * @return QualityPreviewRanklabSnippet
   */
  public function getFeatures()
  {
    return $this->features;
  }
  /**
   * @param float
   */
  public function setFinalScore($finalScore)
  {
    $this->finalScore = $finalScore;
  }
  /**
   * @return float
   */
  public function getFinalScore()
  {
    return $this->finalScore;
  }
  /**
   * @param int
   */
  public function setRankBySnippetFlow($rankBySnippetFlow)
  {
    $this->rankBySnippetFlow = $rankBySnippetFlow;
  }
  /**
   * @return int
   */
  public function getRankBySnippetFlow()
  {
    return $this->rankBySnippetFlow;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SnippetExtraInfoSnippetScoringInfo::class, 'Google_Service_Contentwarehouse_SnippetExtraInfoSnippetScoringInfo');
