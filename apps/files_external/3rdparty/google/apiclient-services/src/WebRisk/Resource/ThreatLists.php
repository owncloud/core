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

namespace Google\Service\WebRisk\Resource;

use Google\Service\WebRisk\GoogleCloudWebriskV1ComputeThreatListDiffResponse;

/**
 * The "threatLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $webriskService = new Google\Service\WebRisk(...);
 *   $threatLists = $webriskService->threatLists;
 *  </code>
 */
class ThreatLists extends \Google\Service\Resource
{
  /**
   * Gets the most recent threat list diffs. These diffs should be applied to a
   * local database of hashes to keep it up-to-date. If the local database is
   * empty or excessively out-of-date, a complete snapshot of the database will be
   * returned. This Method only updates a single ThreatList at a time. To update
   * multiple ThreatList databases, this method needs to be called once for each
   * list. (threatLists.computeDiff)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int constraints.maxDatabaseEntries Sets the maximum number of
   * entries that the client is willing to have in the local database. This should
   * be a power of 2 between 2**10 and 2**20. If zero, no database size limit is
   * set.
   * @opt_param int constraints.maxDiffEntries The maximum size in number of
   * entries. The diff will not contain more entries than this value. This should
   * be a power of 2 between 2**10 and 2**20. If zero, no diff size limit is set.
   * @opt_param string constraints.supportedCompressions The compression types
   * supported by the client.
   * @opt_param string threatType Required. The threat list to update. Only a
   * single ThreatType should be specified per request. If you want to handle
   * multiple ThreatTypes, you must make one request per ThreatType.
   * @opt_param string versionToken The current version token of the client for
   * the requested list (the client version that was received from the last
   * successful diff). If the client does not have a version token (this is the
   * first time calling ComputeThreatListDiff), this may be left empty and a full
   * database snapshot will be returned.
   * @return GoogleCloudWebriskV1ComputeThreatListDiffResponse
   */
  public function computeDiff($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('computeDiff', [$params], GoogleCloudWebriskV1ComputeThreatListDiffResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ThreatLists::class, 'Google_Service_WebRisk_Resource_ThreatLists');
