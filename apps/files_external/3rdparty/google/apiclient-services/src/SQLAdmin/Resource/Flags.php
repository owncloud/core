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

namespace Google\Service\SQLAdmin\Resource;

use Google\Service\SQLAdmin\FlagsListResponse;

/**
 * The "flags" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sqladminService = new Google\Service\SQLAdmin(...);
 *   $flags = $sqladminService->flags;
 *  </code>
 */
class Flags extends \Google\Service\Resource
{
  /**
   * Lists all available database flags for Cloud SQL instances. (flags.listFlags)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string databaseVersion Database type and version you want to
   * retrieve flags for. By default, this method returns flags for all database
   * types and versions.
   * @return FlagsListResponse
   */
  public function listFlags($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], FlagsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Flags::class, 'Google_Service_SQLAdmin_Resource_Flags');
