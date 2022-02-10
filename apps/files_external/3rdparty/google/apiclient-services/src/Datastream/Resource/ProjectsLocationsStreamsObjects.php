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

namespace Google\Service\Datastream\Resource;

use Google\Service\Datastream\ListStreamObjectsResponse;
use Google\Service\Datastream\LookupStreamObjectRequest;
use Google\Service\Datastream\StartBackfillJobRequest;
use Google\Service\Datastream\StartBackfillJobResponse;
use Google\Service\Datastream\StopBackfillJobRequest;
use Google\Service\Datastream\StopBackfillJobResponse;
use Google\Service\Datastream\StreamObject;

/**
 * The "objects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastreamService = new Google\Service\Datastream(...);
 *   $objects = $datastreamService->objects;
 *  </code>
 */
class ProjectsLocationsStreamsObjects extends \Google\Service\Resource
{
  /**
   * Use this method to get details about a stream object. (objects.get)
   *
   * @param string $name Required. The name of the stream object resource to get.
   * @param array $optParams Optional parameters.
   * @return StreamObject
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], StreamObject::class);
  }
  /**
   * Use this method to list the objects of a specific stream.
   * (objects.listProjectsLocationsStreamsObjects)
   *
   * @param string $parent Required. The parent stream that owns the collection of
   * objects.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of objects to return. Default is 50.
   * The maximum value is 1000; values above 1000 will be coerced to 1000.
   * @opt_param string pageToken Page token received from a previous
   * `ListStreamObjectsRequest` call. Provide this to retrieve the subsequent
   * page. When paginating, all other parameters provided to
   * `ListStreamObjectsRequest` must match the call that provided the page token.
   * @return ListStreamObjectsResponse
   */
  public function listProjectsLocationsStreamsObjects($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListStreamObjectsResponse::class);
  }
  /**
   * Use this method to look up a stream object by its source object identifier.
   * (objects.lookup)
   *
   * @param string $parent Required. The parent stream that owns the collection of
   * objects.
   * @param LookupStreamObjectRequest $postBody
   * @param array $optParams Optional parameters.
   * @return StreamObject
   */
  public function lookup($parent, LookupStreamObjectRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('lookup', [$params], StreamObject::class);
  }
  /**
   * Starts backfill job for the specified stream object.
   * (objects.startBackfillJob)
   *
   * @param string $object Required. The name of the stream object resource to
   * start a backfill job for.
   * @param StartBackfillJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return StartBackfillJobResponse
   */
  public function startBackfillJob($object, StartBackfillJobRequest $postBody, $optParams = [])
  {
    $params = ['object' => $object, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('startBackfillJob', [$params], StartBackfillJobResponse::class);
  }
  /**
   * Stops the backfill job for the specified stream object.
   * (objects.stopBackfillJob)
   *
   * @param string $object Required. The name of the stream object resource to
   * stop the backfill job for.
   * @param StopBackfillJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return StopBackfillJobResponse
   */
  public function stopBackfillJob($object, StopBackfillJobRequest $postBody, $optParams = [])
  {
    $params = ['object' => $object, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('stopBackfillJob', [$params], StopBackfillJobResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsStreamsObjects::class, 'Google_Service_Datastream_Resource_ProjectsLocationsStreamsObjects');
