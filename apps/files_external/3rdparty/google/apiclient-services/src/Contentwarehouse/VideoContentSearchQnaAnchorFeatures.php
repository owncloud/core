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

class VideoContentSearchQnaAnchorFeatures extends \Google\Model
{
  /**
   * @var string
   */
  public $answer;
  /**
   * @var float
   */
  public $descartesDotScore;
  /**
   * @var float
   */
  public $descartesRankingScore;
  /**
   * @var string
   */
  public $dolphinModelType;
  /**
   * @var float
   */
  public $dolphinScore;
  /**
   * @var float
   */
  public $editDistance;
  /**
   * @var string
   */
  public $endMs;
  /**
   * @var float
   */
  public $ensembleScore;
  /**
   * @var bool
   */
  public $isDuplicateOfTitle;
  /**
   * @var float
   */
  public $neonScore;
  /**
   * @var float
   */
  public $pointwiseNormalizedGapScore;
  /**
   * @var float
   */
  public $qbstScore;
  /**
   * @var float
   */
  public $queryCount;
  /**
   * @var float
   */
  public $queryDocCount;
  /**
   * @var string
   */
  public $question;
  /**
   * @var float
   */
  public $questionTitleSimilarity;
  /**
   * @var string
   */
  public $questionType;
  /**
   * @var string
   */
  public $startMs;
  /**
   * @var string
   */
  public $videoDurationMs;
  /**
   * @var string
   */
  public $videoTitle;
  /**
   * @var string
   */
  public $webrefMid;
  /**
   * @var float
   */
  public $webrefTopicalityScore;

  /**
   * @param string
   */
  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }
  /**
   * @return string
   */
  public function getAnswer()
  {
    return $this->answer;
  }
  /**
   * @param float
   */
  public function setDescartesDotScore($descartesDotScore)
  {
    $this->descartesDotScore = $descartesDotScore;
  }
  /**
   * @return float
   */
  public function getDescartesDotScore()
  {
    return $this->descartesDotScore;
  }
  /**
   * @param float
   */
  public function setDescartesRankingScore($descartesRankingScore)
  {
    $this->descartesRankingScore = $descartesRankingScore;
  }
  /**
   * @return float
   */
  public function getDescartesRankingScore()
  {
    return $this->descartesRankingScore;
  }
  /**
   * @param string
   */
  public function setDolphinModelType($dolphinModelType)
  {
    $this->dolphinModelType = $dolphinModelType;
  }
  /**
   * @return string
   */
  public function getDolphinModelType()
  {
    return $this->dolphinModelType;
  }
  /**
   * @param float
   */
  public function setDolphinScore($dolphinScore)
  {
    $this->dolphinScore = $dolphinScore;
  }
  /**
   * @return float
   */
  public function getDolphinScore()
  {
    return $this->dolphinScore;
  }
  /**
   * @param float
   */
  public function setEditDistance($editDistance)
  {
    $this->editDistance = $editDistance;
  }
  /**
   * @return float
   */
  public function getEditDistance()
  {
    return $this->editDistance;
  }
  /**
   * @param string
   */
  public function setEndMs($endMs)
  {
    $this->endMs = $endMs;
  }
  /**
   * @return string
   */
  public function getEndMs()
  {
    return $this->endMs;
  }
  /**
   * @param float
   */
  public function setEnsembleScore($ensembleScore)
  {
    $this->ensembleScore = $ensembleScore;
  }
  /**
   * @return float
   */
  public function getEnsembleScore()
  {
    return $this->ensembleScore;
  }
  /**
   * @param bool
   */
  public function setIsDuplicateOfTitle($isDuplicateOfTitle)
  {
    $this->isDuplicateOfTitle = $isDuplicateOfTitle;
  }
  /**
   * @return bool
   */
  public function getIsDuplicateOfTitle()
  {
    return $this->isDuplicateOfTitle;
  }
  /**
   * @param float
   */
  public function setNeonScore($neonScore)
  {
    $this->neonScore = $neonScore;
  }
  /**
   * @return float
   */
  public function getNeonScore()
  {
    return $this->neonScore;
  }
  /**
   * @param float
   */
  public function setPointwiseNormalizedGapScore($pointwiseNormalizedGapScore)
  {
    $this->pointwiseNormalizedGapScore = $pointwiseNormalizedGapScore;
  }
  /**
   * @return float
   */
  public function getPointwiseNormalizedGapScore()
  {
    return $this->pointwiseNormalizedGapScore;
  }
  /**
   * @param float
   */
  public function setQbstScore($qbstScore)
  {
    $this->qbstScore = $qbstScore;
  }
  /**
   * @return float
   */
  public function getQbstScore()
  {
    return $this->qbstScore;
  }
  /**
   * @param float
   */
  public function setQueryCount($queryCount)
  {
    $this->queryCount = $queryCount;
  }
  /**
   * @return float
   */
  public function getQueryCount()
  {
    return $this->queryCount;
  }
  /**
   * @param float
   */
  public function setQueryDocCount($queryDocCount)
  {
    $this->queryDocCount = $queryDocCount;
  }
  /**
   * @return float
   */
  public function getQueryDocCount()
  {
    return $this->queryDocCount;
  }
  /**
   * @param string
   */
  public function setQuestion($question)
  {
    $this->question = $question;
  }
  /**
   * @return string
   */
  public function getQuestion()
  {
    return $this->question;
  }
  /**
   * @param float
   */
  public function setQuestionTitleSimilarity($questionTitleSimilarity)
  {
    $this->questionTitleSimilarity = $questionTitleSimilarity;
  }
  /**
   * @return float
   */
  public function getQuestionTitleSimilarity()
  {
    return $this->questionTitleSimilarity;
  }
  /**
   * @param string
   */
  public function setQuestionType($questionType)
  {
    $this->questionType = $questionType;
  }
  /**
   * @return string
   */
  public function getQuestionType()
  {
    return $this->questionType;
  }
  /**
   * @param string
   */
  public function setStartMs($startMs)
  {
    $this->startMs = $startMs;
  }
  /**
   * @return string
   */
  public function getStartMs()
  {
    return $this->startMs;
  }
  /**
   * @param string
   */
  public function setVideoDurationMs($videoDurationMs)
  {
    $this->videoDurationMs = $videoDurationMs;
  }
  /**
   * @return string
   */
  public function getVideoDurationMs()
  {
    return $this->videoDurationMs;
  }
  /**
   * @param string
   */
  public function setVideoTitle($videoTitle)
  {
    $this->videoTitle = $videoTitle;
  }
  /**
   * @return string
   */
  public function getVideoTitle()
  {
    return $this->videoTitle;
  }
  /**
   * @param string
   */
  public function setWebrefMid($webrefMid)
  {
    $this->webrefMid = $webrefMid;
  }
  /**
   * @return string
   */
  public function getWebrefMid()
  {
    return $this->webrefMid;
  }
  /**
   * @param float
   */
  public function setWebrefTopicalityScore($webrefTopicalityScore)
  {
    $this->webrefTopicalityScore = $webrefTopicalityScore;
  }
  /**
   * @return float
   */
  public function getWebrefTopicalityScore()
  {
    return $this->webrefTopicalityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchQnaAnchorFeatures::class, 'Google_Service_Contentwarehouse_VideoContentSearchQnaAnchorFeatures');
