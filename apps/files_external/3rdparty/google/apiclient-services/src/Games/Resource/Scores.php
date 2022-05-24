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

namespace Google\Service\Games\Resource;

use Google\Service\Games\LeaderboardScores;
use Google\Service\Games\PlayerLeaderboardScoreListResponse;
use Google\Service\Games\PlayerScoreListResponse;
use Google\Service\Games\PlayerScoreResponse;
use Google\Service\Games\PlayerScoreSubmissionList;

/**
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $scores = $gamesService->scores;
 *  </code>
 */
class Scores extends \Google\Service\Resource
{
  /**
   * Get high scores, and optionally ranks, in leaderboards for the currently
   * authenticated player. For a specific time span, `leaderboardId` can be set to
   * `ALL` to retrieve data for all leaderboards in a given time span. `NOTE: You
   * cannot ask for 'ALL' leaderboards and 'ALL' timeSpans in the same request;
   * only one parameter may be set to 'ALL'. (scores.get)
   *
   * @param string $playerId A player ID. A value of `me` may be used in place of
   * the authenticated player's ID.
   * @param string $leaderboardId The ID of the leaderboard. Can be set to 'ALL'
   * to retrieve data for all leaderboards for this application.
   * @param string $timeSpan The time span for the scores and ranks you're
   * requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string includeRankType The types of ranks to return. If the
   * parameter is omitted, no ranks will be returned.
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboard scores to return
   * in the response. For any response, the actual number of leaderboard scores
   * returned may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return PlayerLeaderboardScoreListResponse
   */
  public function get($playerId, $leaderboardId, $timeSpan, $optParams = [])
  {
    $params = ['playerId' => $playerId, 'leaderboardId' => $leaderboardId, 'timeSpan' => $timeSpan];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PlayerLeaderboardScoreListResponse::class);
  }
  /**
   * Lists the scores in a leaderboard, starting from the top. (scores.listScores)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param string $collection The collection of scores you're requesting.
   * @param string $timeSpan The time span for the scores and ranks you're
   * requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboard scores to return
   * in the response. For any response, the actual number of leaderboard scores
   * returned may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return LeaderboardScores
   */
  public function listScores($leaderboardId, $collection, $timeSpan, $optParams = [])
  {
    $params = ['leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], LeaderboardScores::class);
  }
  /**
   * Lists the scores in a leaderboard around (and including) a player's score.
   * (scores.listWindow)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param string $collection The collection of scores you're requesting.
   * @param string $timeSpan The time span for the scores and ranks you're
   * requesting.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of leaderboard scores to return
   * in the response. For any response, the actual number of leaderboard scores
   * returned may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param int resultsAbove The preferred number of scores to return above
   * the player's score. More scores may be returned if the player is at the
   * bottom of the leaderboard; fewer may be returned if the player is at the top.
   * Must be less than or equal to maxResults.
   * @opt_param bool returnTopIfAbsent True if the top scores should be returned
   * when the player is not in the leaderboard. Defaults to true.
   * @return LeaderboardScores
   */
  public function listWindow($leaderboardId, $collection, $timeSpan, $optParams = [])
  {
    $params = ['leaderboardId' => $leaderboardId, 'collection' => $collection, 'timeSpan' => $timeSpan];
    $params = array_merge($params, $optParams);
    return $this->call('listWindow', [$params], LeaderboardScores::class);
  }
  /**
   * Submits a score to the specified leaderboard. (scores.submit)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param string $score The score you're submitting. The submitted score is
   * ignored if it is worse than a previously submitted score, where worse depends
   * on the leaderboard sort order. The meaning of the score value depends on the
   * leaderboard format type. For fixed-point, the score represents the raw value.
   * For time, the score represents elapsed time in milliseconds. For currency,
   * the score represents a value in micro units.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param string scoreTag Additional information about the score you're
   * submitting. Values must contain no more than 64 URI-safe characters as
   * defined by section 2.3 of RFC 3986.
   * @return PlayerScoreResponse
   */
  public function submit($leaderboardId, $score, $optParams = [])
  {
    $params = ['leaderboardId' => $leaderboardId, 'score' => $score];
    $params = array_merge($params, $optParams);
    return $this->call('submit', [$params], PlayerScoreResponse::class);
  }
  /**
   * Submits multiple scores to leaderboards. (scores.submitMultiple)
   *
   * @param PlayerScoreSubmissionList $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @return PlayerScoreListResponse
   */
  public function submitMultiple(PlayerScoreSubmissionList $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('submitMultiple', [$params], PlayerScoreListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Scores::class, 'Google_Service_Games_Resource_Scores');
