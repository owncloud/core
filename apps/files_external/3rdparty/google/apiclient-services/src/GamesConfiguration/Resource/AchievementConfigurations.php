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

namespace Google\Service\GamesConfiguration\Resource;

use Google\Service\GamesConfiguration\AchievementConfiguration;
use Google\Service\GamesConfiguration\AchievementConfigurationListResponse;

/**
 * The "achievementConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesConfigurationService = new Google\Service\GamesConfiguration(...);
 *   $achievementConfigurations = $gamesConfigurationService->achievementConfigurations;
 *  </code>
 */
class AchievementConfigurations extends \Google\Service\Resource
{
  /**
   * Delete the achievement configuration with the given ID.
   * (achievementConfigurations.delete)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   */
  public function delete($achievementId, $optParams = [])
  {
    $params = ['achievementId' => $achievementId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves the metadata of the achievement configuration with the given ID.
   * (achievementConfigurations.get)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param array $optParams Optional parameters.
   * @return AchievementConfiguration
   */
  public function get($achievementId, $optParams = [])
  {
    $params = ['achievementId' => $achievementId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AchievementConfiguration::class);
  }
  /**
   * Insert a new achievement configuration in this application.
   * (achievementConfigurations.insert)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param AchievementConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return AchievementConfiguration
   */
  public function insert($applicationId, AchievementConfiguration $postBody, $optParams = [])
  {
    $params = ['applicationId' => $applicationId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], AchievementConfiguration::class);
  }
  /**
   * Returns a list of the achievement configurations in this application.
   * (achievementConfigurations.listAchievementConfigurations)
   *
   * @param string $applicationId The application ID from the Google Play
   * developer console.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults The maximum number of resource configurations to
   * return in the response, used for paging. For any response, the actual number
   * of resources returned may be less than the specified `maxResults`.
   * @opt_param string pageToken The token returned by the previous request.
   * @return AchievementConfigurationListResponse
   */
  public function listAchievementConfigurations($applicationId, $optParams = [])
  {
    $params = ['applicationId' => $applicationId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AchievementConfigurationListResponse::class);
  }
  /**
   * Update the metadata of the achievement configuration with the given ID.
   * (achievementConfigurations.update)
   *
   * @param string $achievementId The ID of the achievement used by this method.
   * @param AchievementConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return AchievementConfiguration
   */
  public function update($achievementId, AchievementConfiguration $postBody, $optParams = [])
  {
    $params = ['achievementId' => $achievementId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], AchievementConfiguration::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AchievementConfigurations::class, 'Google_Service_GamesConfiguration_Resource_AchievementConfigurations');
