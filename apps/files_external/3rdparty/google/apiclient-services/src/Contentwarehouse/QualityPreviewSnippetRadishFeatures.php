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

class QualityPreviewSnippetRadishFeatures extends \Google\Model
{
  /**
   * @var float
   */
  public $answerScore;
  /**
   * @var string
   */
  public $navboostQuery;
  /**
   * @var float
   */
  public $passageCoverage;
  /**
   * @var string
   */
  public $passageType;
  /**
   * @var string
   */
  public $queryPassageIdx;
  /**
   * @var string
   */
  public $similarityMethod;
  /**
   * @var float
   */
  public $similarityScore;
  /**
   * @var float
   */
  public $snippetCoverage;

  /**
   * @param float
   */
  public function setAnswerScore($answerScore)
  {
    $this->answerScore = $answerScore;
  }
  /**
   * @return float
   */
  public function getAnswerScore()
  {
    return $this->answerScore;
  }
  /**
   * @param string
   */
  public function setNavboostQuery($navboostQuery)
  {
    $this->navboostQuery = $navboostQuery;
  }
  /**
   * @return string
   */
  public function getNavboostQuery()
  {
    return $this->navboostQuery;
  }
  /**
   * @param float
   */
  public function setPassageCoverage($passageCoverage)
  {
    $this->passageCoverage = $passageCoverage;
  }
  /**
   * @return float
   */
  public function getPassageCoverage()
  {
    return $this->passageCoverage;
  }
  /**
   * @param string
   */
  public function setPassageType($passageType)
  {
    $this->passageType = $passageType;
  }
  /**
   * @return string
   */
  public function getPassageType()
  {
    return $this->passageType;
  }
  /**
   * @param string
   */
  public function setQueryPassageIdx($queryPassageIdx)
  {
    $this->queryPassageIdx = $queryPassageIdx;
  }
  /**
   * @return string
   */
  public function getQueryPassageIdx()
  {
    return $this->queryPassageIdx;
  }
  /**
   * @param string
   */
  public function setSimilarityMethod($similarityMethod)
  {
    $this->similarityMethod = $similarityMethod;
  }
  /**
   * @return string
   */
  public function getSimilarityMethod()
  {
    return $this->similarityMethod;
  }
  /**
   * @param float
   */
  public function setSimilarityScore($similarityScore)
  {
    $this->similarityScore = $similarityScore;
  }
  /**
   * @return float
   */
  public function getSimilarityScore()
  {
    return $this->similarityScore;
  }
  /**
   * @param float
   */
  public function setSnippetCoverage($snippetCoverage)
  {
    $this->snippetCoverage = $snippetCoverage;
  }
  /**
   * @return float
   */
  public function getSnippetCoverage()
  {
    return $this->snippetCoverage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityPreviewSnippetRadishFeatures::class, 'Google_Service_Contentwarehouse_QualityPreviewSnippetRadishFeatures');
