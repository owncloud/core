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

class Google_Service_CommentAnalyzer_AttributeScores extends Google_Collection
{
  protected $collection_key = 'spanScores';
  protected $spanScoresType = 'Google_Service_CommentAnalyzer_SpanScore';
  protected $spanScoresDataType = 'array';
  protected $summaryScoreType = 'Google_Service_CommentAnalyzer_Score';
  protected $summaryScoreDataType = '';

  /**
   * @param Google_Service_CommentAnalyzer_SpanScore
   */
  public function setSpanScores($spanScores)
  {
    $this->spanScores = $spanScores;
  }
  /**
   * @return Google_Service_CommentAnalyzer_SpanScore
   */
  public function getSpanScores()
  {
    return $this->spanScores;
  }
  /**
   * @param Google_Service_CommentAnalyzer_Score
   */
  public function setSummaryScore(Google_Service_CommentAnalyzer_Score $summaryScore)
  {
    $this->summaryScore = $summaryScore;
  }
  /**
   * @return Google_Service_CommentAnalyzer_Score
   */
  public function getSummaryScore()
  {
    return $this->summaryScore;
  }
}
