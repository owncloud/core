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

/**
 * The "comments" collection of methods.
 * Typical usage is:
 *  <code>
 *   $commentanalyzerService = new Google_Service_CommentAnalyzer(...);
 *   $comments = $commentanalyzerService->comments;
 *  </code>
 */
class Google_Service_CommentAnalyzer_Resource_Comments extends Google_Service_Resource
{
  /**
   * Analyzes the provided text and returns scores for requested attributes.
   * (comments.analyze)
   *
   * @param Google_Service_CommentAnalyzer_AnalyzeCommentRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CommentAnalyzer_AnalyzeCommentResponse
   */
  public function analyze(Google_Service_CommentAnalyzer_AnalyzeCommentRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('analyze', array($params), "Google_Service_CommentAnalyzer_AnalyzeCommentResponse");
  }
  /**
   * Suggest comment scores as training data. (comments.suggestscore)
   *
   * @param Google_Service_CommentAnalyzer_SuggestCommentScoreRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CommentAnalyzer_SuggestCommentScoreResponse
   */
  public function suggestscore(Google_Service_CommentAnalyzer_SuggestCommentScoreRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('suggestscore', array($params), "Google_Service_CommentAnalyzer_SuggestCommentScoreResponse");
  }
}
