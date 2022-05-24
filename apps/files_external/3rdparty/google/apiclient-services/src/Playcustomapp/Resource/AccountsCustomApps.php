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

namespace Google\Service\Playcustomapp\Resource;

use Google\Service\Playcustomapp\CustomApp;

/**
 * The "customApps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $playcustomappService = new Google\Service\Playcustomapp(...);
 *   $customApps = $playcustomappService->customApps;
 *  </code>
 */
class AccountsCustomApps extends \Google\Service\Resource
{
  /**
   * Creates a new custom app. (customApps.create)
   *
   * @param string $account Developer account ID.
   * @param CustomApp $postBody
   * @param array $optParams Optional parameters.
   * @return CustomApp
   */
  public function create($account, CustomApp $postBody, $optParams = [])
  {
    $params = ['account' => $account, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], CustomApp::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsCustomApps::class, 'Google_Service_Playcustomapp_Resource_AccountsCustomApps');
