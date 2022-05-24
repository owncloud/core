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

namespace Google\Service\Gmail\Resource;

use Google\Service\Gmail\AutoForwarding;
use Google\Service\Gmail\ImapSettings;
use Google\Service\Gmail\LanguageSettings;
use Google\Service\Gmail\PopSettings;
use Google\Service\Gmail\VacationSettings;

/**
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gmailService = new Google\Service\Gmail(...);
 *   $settings = $gmailService->settings;
 *  </code>
 */
class UsersSettings extends \Google\Service\Resource
{
  /**
   * Gets the auto-forwarding setting for the specified account.
   * (settings.getAutoForwarding)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return AutoForwarding
   */
  public function getAutoForwarding($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getAutoForwarding', [$params], AutoForwarding::class);
  }
  /**
   * Gets IMAP settings. (settings.getImap)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return ImapSettings
   */
  public function getImap($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getImap', [$params], ImapSettings::class);
  }
  /**
   * Gets language settings. (settings.getLanguage)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return LanguageSettings
   */
  public function getLanguage($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getLanguage', [$params], LanguageSettings::class);
  }
  /**
   * Gets POP settings. (settings.getPop)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return PopSettings
   */
  public function getPop($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getPop', [$params], PopSettings::class);
  }
  /**
   * Gets vacation responder settings. (settings.getVacation)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param array $optParams Optional parameters.
   * @return VacationSettings
   */
  public function getVacation($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getVacation', [$params], VacationSettings::class);
  }
  /**
   * Updates the auto-forwarding setting for the specified account. A verified
   * forwarding address must be specified when auto-forwarding is enabled. This
   * method is only available to service account clients that have been delegated
   * domain-wide authority. (settings.updateAutoForwarding)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param AutoForwarding $postBody
   * @param array $optParams Optional parameters.
   * @return AutoForwarding
   */
  public function updateAutoForwarding($userId, AutoForwarding $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateAutoForwarding', [$params], AutoForwarding::class);
  }
  /**
   * Updates IMAP settings. (settings.updateImap)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param ImapSettings $postBody
   * @param array $optParams Optional parameters.
   * @return ImapSettings
   */
  public function updateImap($userId, ImapSettings $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateImap', [$params], ImapSettings::class);
  }
  /**
   * Updates language settings. If successful, the return object contains the
   * `displayLanguage` that was saved for the user, which may differ from the
   * value passed into the request. This is because the requested
   * `displayLanguage` may not be directly supported by Gmail but have a close
   * variant that is, and so the variant may be chosen and saved instead.
   * (settings.updateLanguage)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param LanguageSettings $postBody
   * @param array $optParams Optional parameters.
   * @return LanguageSettings
   */
  public function updateLanguage($userId, LanguageSettings $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateLanguage', [$params], LanguageSettings::class);
  }
  /**
   * Updates POP settings. (settings.updatePop)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param PopSettings $postBody
   * @param array $optParams Optional parameters.
   * @return PopSettings
   */
  public function updatePop($userId, PopSettings $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatePop', [$params], PopSettings::class);
  }
  /**
   * Updates vacation responder settings. (settings.updateVacation)
   *
   * @param string $userId User's email address. The special value "me" can be
   * used to indicate the authenticated user.
   * @param VacationSettings $postBody
   * @param array $optParams Optional parameters.
   * @return VacationSettings
   */
  public function updateVacation($userId, VacationSettings $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateVacation', [$params], VacationSettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersSettings::class, 'Google_Service_Gmail_Resource_UsersSettings');
