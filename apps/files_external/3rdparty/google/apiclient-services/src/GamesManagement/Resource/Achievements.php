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

namespace Google\Service\GamesManagement\Resource;

use Google\Service\GamesManagement\AchievementResetAllResponse;
use Google\Service\GamesManagement\AchievementResetMultipleForAllRequest;
use Google\Service\GamesManagement\AchievementResetResponse;

/**
 * The "achievements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google\Service\GamesManagement(...);
 *   $achievements = $gamesManagementService->achievements;
 *  </code>
 */
class Achievements extends \Google\Service\Resource
{
  /**
   * Resets the achievement with the given ID for the currently authenticated
   * player. This method is only accessible to whitelisted tester accounts for
   * your application. (achievements.reset)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return AchievementResetResponse
   */
  public function reset($achievementId, $optParams = [])
  {
    $params = ['achievementId' => $achievementId];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], AchievementResetResponse::class);
  }
  /**
   * Resets all achievements for the currently authenticated player for your
   * application. This method is only accessible to whitelisted tester accounts
   * for your application. (achievements.resetAll)
   *
   * @param array $optParams Optional parameters.
   * @return AchievementResetAllResponse
   */
  public function resetAll($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', [$params], AchievementResetAllResponse::class);
  }
  /**
   * Resets all draft achievements for all players. This method is only available
   * to user accounts for your developer console.
   * (achievements.resetAllForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAllForAllPlayers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('resetAllForAllPlayers', [$params]);
  }
  /**
   * Resets the achievement with the given ID for all players. This method is only
   * available to user accounts for your developer console. Only draft
   * achievements can be reset. (achievements.resetForAllPlayers)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($achievementId, $optParams = [])
  {
    $params = ['achievementId' => $achievementId];
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', [$params]);
  }
  /**
   * Resets achievements with the given IDs for all players. This method is only
   * available to user accounts for your developer console. Only draft
   * achievements may be reset. (achievements.resetMultipleForAllPlayers)
   *
   * @param AchievementResetMultipleForAllRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function resetMultipleForAllPlayers(AchievementResetMultipleForAllRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resetMultipleForAllPlayers', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Achievements::class, 'Google_Service_GamesManagement_Resource_Achievements');
