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

namespace Google\Service\CloudOSLogin\Resource;

use Google\Service\CloudOSLogin\OsloginEmpty;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $osloginService = new Google\Service\CloudOSLogin(...);
 *   $projects = $osloginService->projects;
 *  </code>
 */
class UsersProjects extends \Google\Service\Resource
{
  /**
   * Deletes a POSIX account. (projects.delete)
   *
   * @param string $name Required. A reference to the POSIX account to update.
   * POSIX accounts are identified by the project ID they are associated with. A
   * reference to the POSIX account is in format
   * `users/{user}/projects/{project}`.
   * @param array $optParams Optional parameters.
   * @return OsloginEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], OsloginEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UsersProjects::class, 'Google_Service_CloudOSLogin_Resource_UsersProjects');
