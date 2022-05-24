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

namespace Google\Service\Logging\Resource;

use Google\Service\Logging\CopyLogEntriesRequest;
use Google\Service\Logging\ListLogEntriesRequest;
use Google\Service\Logging\ListLogEntriesResponse;
use Google\Service\Logging\Operation;
use Google\Service\Logging\TailLogEntriesRequest;
use Google\Service\Logging\TailLogEntriesResponse;
use Google\Service\Logging\WriteLogEntriesRequest;
use Google\Service\Logging\WriteLogEntriesResponse;

/**
 * The "entries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google\Service\Logging(...);
 *   $entries = $loggingService->entries;
 *  </code>
 */
class Entries extends \Google\Service\Resource
{
  /**
   * Copies a set of log entries from a log bucket to a Cloud Storage bucket.
   * (entries.copy)
   *
   * @param CopyLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function copy(CopyLogEntriesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('copy', [$params], Operation::class);
  }
  /**
   * Lists log entries. Use this method to retrieve log entries that originated
   * from a project/folder/organization/billing account. For ways to export log
   * entries, see Exporting Logs (https://cloud.google.com/logging/docs/export).
   * (entries.listEntries)
   *
   * @param ListLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ListLogEntriesResponse
   */
  public function listEntries(ListLogEntriesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLogEntriesResponse::class);
  }
  /**
   * Streaming read of log entries as they are ingested. Until the stream is
   * terminated, it will continue reading logs. (entries.tail)
   *
   * @param TailLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TailLogEntriesResponse
   */
  public function tail(TailLogEntriesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('tail', [$params], TailLogEntriesResponse::class);
  }
  /**
   * Writes log entries to Logging. This API method is the only way to send log
   * entries to Logging. This method is used, directly or indirectly, by the
   * Logging agent (fluentd) and all logging libraries configured to use Logging.
   * A single request may contain log entries for a maximum of 1000 different
   * resources (projects, organizations, billing accounts or folders)
   * (entries.write)
   *
   * @param WriteLogEntriesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return WriteLogEntriesResponse
   */
  public function write(WriteLogEntriesRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('write', [$params], WriteLogEntriesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Entries::class, 'Google_Service_Logging_Resource_Entries');
