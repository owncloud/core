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

class QualityPreviewSnippetQualityFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $foreignMetaScore;
  /**
   * @var float
   */
  public $hiddenRatioScore;
  /**
   * @var float
   */
  public $numTidbitsScore;
  /**
   * @var float
   */
  public $numVisibleTokensScore;
  /**
   * @var float
   */
  public $outlinkScore;
  /**
   * @var float
   */
  public $redundancyScore;
  /**
   * @var float
   */
  public $sentenceStartScore;

  /**
   * @param float
   */
  public function setForeignMetaScore($foreignMetaScore)
  {
    $this->foreignMetaScore = $foreignMetaScore;
  }
  /**
   * @return float
   */
  public function getForeignMetaScore()
  {
    return $this->foreignMetaScore;
  }
  /**
   * @param float
   */
  public function setHiddenRatioScore($hiddenRatioScore)
  {
    $this->hiddenRatioScore = $hiddenRatioScore;
  }
  /**
   * @return float
   */
  public function getHiddenRatioScore()
  {
    return $this->hiddenRatioScore;
  }
  /**
   * @param float
   */
  public function setNumTidbitsScore($numTidbitsScore)
  {
    $this->numTidbitsScore = $numTidbitsScore;
  }
  /**
   * @return float
   */
  public function getNumTidbitsScore()
  {
    return $this->numTidbitsScore;
  }
  /**
   * @param float
   */
  public function setNumVisibleTokensScore($numVisibleTokensScore)
  {
    $this->numVisibleTokensScore = $numVisibleTokensScore;
  }
  /**
   * @return float
   */
  public function getNumVisibleTokensScore()
  {
    return $this->numVisibleTokensScore;
  }
  /**
   * @param float
   */
  public function setOutlinkScore($outlinkScore)
  {
    $this->outlinkScore = $outlinkScore;
  }
  /**
   * @return float
   */
  public function getOutlinkScore()
  {
    return $this->outlinkScore;
  }
  /**
   * @param float
   */
  public function setRedundancyScore($redundancyScore)
  {
    $this->redundancyScore = $redundancyScore;
  }
  /**
   * @return float
   */
  public function getRedundancyScore()
  {
    return $this->redundancyScore;
  }
  /**
   * @param float
   */
  public function setSentenceStartScore($sentenceStartScore)
  {
    $this->sentenceStartScore = $sentenceStartScore;
  }
  /**
   * @return float
   */
  public function getSentenceStartScore()
  {
    return $this->sentenceStartScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewSnippetQualityFeatures::class, 'Google_Service_Contentwarehouse_QualityPreviewSnippetQualityFeatures');
