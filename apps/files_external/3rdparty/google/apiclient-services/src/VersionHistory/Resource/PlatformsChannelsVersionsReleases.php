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

namespace Google\Service\VersionHistory\Resource;

use Google\Service\VersionHistory\ListReleasesResponse;

/**
 * The "releases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $versionhistoryService = new Google\Service\VersionHistory(...);
 *   $releases = $versionhistoryService->releases;
 *  </code>
 */
class PlatformsChannelsVersionsReleases extends \Google\Service\Resource
{
  /**
   * Returns list of releases of the given version.
   * (releases.listPlatformsChannelsVersionsReleases)
   *
   * @param string $parent Required. The version, which owns this collection of
   * releases. Format:
   * {product}/platforms/{platform}/channels/{channel}/versions/{version}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter string. Format is a comma separated
   * list of All comma separated filter clauses are conjoined with a logical
   * "and". Valid field_names are "version", "name", "platform", "channel",
   * "fraction" "starttime", and "endtime". Valid operators are "<", "<=", "=",
   * ">=", and ">". Channel comparison is done by distance from stable. must be a
   * valid channel when filtering by channel. Ex) stable < beta, beta < dev,
   * canary < canary_asan. Version comparison is done numerically. Ex) 1.0.0.8 <
   * 1.0.0.10. If version is not entirely written, the version will be appended
   * with 0 for the missing fields. Ex) version > 80 becoms version > 80.0.0.0
   * When filtering by starttime or endtime, string must be in RFC 3339 date
   * string format. Name and platform are filtered by string comparison. Ex)
   * "...?filter=channel<=beta, version >= 80 Ex) "...?filter=version > 80,
   * version < 81 Ex) "...?filter=starttime>2020-01-01T00:00:00Z
   * @opt_param string orderBy Optional. Ordering string. Valid order_by strings
   * are "version", "name", "starttime", "endtime", "platform", "channel", and
   * "fraction". Optionally, you can append "desc" or "asc" to specify the sorting
   * order. Multiple order_by strings can be used in a comma separated list.
   * Ordering by channel will sort by distance from the stable channel (not
   * alphabetically). A list of channels sorted in this order is: stable, beta,
   * dev, canary, and canary_asan. Sorting by name may cause unexpected behaviour
   * as it is a naive string sort. For example, 1.0.0.8 will be before 1.0.0.10 in
   * descending order. If order_by is not specified the response will be sorted by
   * starttime in descending order. Ex) "...?order_by=starttime asc" Ex)
   * "...?order_by=platform desc, channel, startime desc"
   * @opt_param int pageSize Optional. Optional limit on the number of releases to
   * include in the response. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListReleases` call. Provide this to retrieve the subsequent page.
   * @return ListReleasesResponse
   */
  public function listPlatformsChannelsVersionsReleases($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReleasesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlatformsChannelsVersionsReleases::class, 'Google_Service_VersionHistory_Resource_PlatformsChannelsVersionsReleases');
