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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\DirectoryChromeosdevicesCommand;

/**
 * The "commands" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $commands = $adminService->commands;
 *  </code>
 */
class CustomerDevicesChromeosCommands extends \Google\Service\Resource
{
  /**
   * Gets command data a specific command issued to the device. (commands.get)
   *
   * @param string $customerId Immutable. Immutable ID of the Google Workspace
   * account.
   * @param string $deviceId Immutable. Immutable ID of Chrome OS Device.
   * @param string $commandId Immutable. Immutable ID of Chrome OS Device Command.
   * @param array $optParams Optional parameters.
   * @return DirectoryChromeosdevicesCommand
   */
  public function get($customerId, $deviceId, $commandId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'deviceId' => $deviceId, 'commandId' => $commandId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DirectoryChromeosdevicesCommand::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomerDevicesChromeosCommands::class, 'Google_Service_Directory_Resource_CustomerDevicesChromeosCommands');
