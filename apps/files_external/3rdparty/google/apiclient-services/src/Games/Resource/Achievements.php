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

use Google\Service\Games\AchievementIncrementResponse;
use Google\Service\Games\AchievementRevealResponse;
use Google\Service\Games\AchievementSetStepsAtLeastResponse;
use Google\Service\Games\AchievementUnlockResponse;
use Google\Service\Games\AchievementUpdateMultipleRequest;
use Google\Service\Games\AchievementUpdateMultipleResponse;
use Google\Service\Games\PlayerAchievementListResponse;

/**
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesService = new Google\Service\Games(...);
 *   $achievements = $gamesService->achievements;
 *  </code>
 */
class Achievements extends \Google\Service\Resource
{
  /**
   * Increments the steps of the achievement with the given ID for the currently
   * authenticated player. (achievements.increment)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param int $stepsToIncrement The number of steps to increment.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId A randomly generated numeric ID for each request
   * specified by the caller. This number is used at the server to ensure that the
   * request is handled correctly across retries.
   * @return AchievementIncrementResponse
   */
  public function increment($achievementId, $stepsToIncrement, $optParams = [])
  {
    $params = ['achievementId' => $achievementId, 'stepsToIncrement' => $stepsToIncrement];
    $params = array_merge($params, $optParams);
    return $this->call('increment', [$params], AchievementIncrementResponse::class);
  }
  /**
   * Lists the progress for all your application's achievements for the currently
   * authenticated player. (achievements.listAchievements)
   *
   * @param string $playerId A player ID. A value of `me` may be used in place of
   * the authenticated player's ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The preferred language to use for strings returned
   * by this method.
   * @opt_param int maxResults The maximum number of achievement resources to
   * return in the response, used for paging. For any response, the actual number
   * of achievement resources returned may be less than the specified
   * `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string state Tells the server to return only achievements with the
   * specified state. If this parameter isn't specified, all achievements are
   * returned.
   * @return PlayerAchievementListResponse
   */
  public function listAchievements($playerId, $optParams = [])
  {
    $params = ['playerId' => $playerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PlayerAchievementListResponse::class);
  }
  /**
   * Sets the state of the achievement with the given ID to `REVEALED` for the
   * currently authenticated player. (achievements.reveal)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return AchievementRevealResponse
   */
  public function reveal($achievementId, $optParams = [])
  {
    $params = ['achievementId' => $achievementId];
    $params = array_merge($params, $optParams);
    return $this->call('reveal', [$params], AchievementRevealResponse::class);
  }
  /**
   * Sets the steps for the currently authenticated player towards unlocking an
   * achievement. If the steps parameter is less than the current number of steps
   * that the player already gained for the achievement, the achievement is not
   * modified. (achievements.setStepsAtLeast)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param int $steps The minimum value to set the steps to.
   * @param array $optParams Optional parameters.
   * @return AchievementSetStepsAtLeastResponse
   */
  public function setStepsAtLeast($achievementId, $steps, $optParams = [])
  {
    $params = ['achievementId' => $achievementId, 'steps' => $steps];
    $params = array_merge($params, $optParams);
    return $this->call('setStepsAtLeast', [$params], AchievementSetStepsAtLeastResponse::class);
  }
  /**
   * Unlocks this achievement for the currently authenticated player.
   * (achievements.unlock)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return AchievementUnlockResponse
   */
  public function unlock($achievementId, $optParams = [])
  {
    $params = ['achievementId' => $achievementId];
    $params = array_merge($params, $optParams);
    return $this->call('unlock', [$params], AchievementUnlockResponse::class);
  }
  /**
   * Updates multiple achievements for the currently authenticated player.
   * (achievements.updateMultiple)
   *
   * @param AchievementUpdateMultipleRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AchievementUpdateMultipleResponse
   */
  public function updateMultiple(AchievementUpdateMultipleRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateMultiple', [$params], AchievementUpdateMultipleResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Achievements::class, 'Google_Service_Games_Resource_Achievements');
