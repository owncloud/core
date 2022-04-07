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

namespace Google\Service\Forms\Resource;

use Google\Service\Forms\CreateWatchRequest;
use Google\Service\Forms\FormsEmpty;
use Google\Service\Forms\ListWatchesResponse;
use Google\Service\Forms\RenewWatchRequest;
use Google\Service\Forms\Watch;

/**
 * The "watches" collection of methods.
 * Typical usage is:
 *  <code>
 *   $formsService = new Google\Service\Forms(...);
 *   $watches = $formsService->watches;
 *  </code>
 */
class FormsWatches extends \Google\Service\Resource
{
  /**
   * Create a new watch. If a watch ID is provided, it must be unused. For each
   * invoking project, the per form limit is one watch per Watch.EventType. A
   * watch expires seven days after it is created (see Watch.expire_time).
   * (watches.create)
   *
   * @param string $formId Required. ID of the Form to watch.
   * @param CreateWatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Watch
   */
  public function create($formId, CreateWatchRequest $postBody, $optParams = [])
  {
    $params = ['formId' => $formId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Watch::class);
  }
  /**
   * Delete a watch. (watches.delete)
   *
   * @param string $formId Required. The ID of the Form.
   * @param string $watchId Required. The ID of the Watch to delete.
   * @param array $optParams Optional parameters.
   * @return FormsEmpty
   */
  public function delete($formId, $watchId, $optParams = [])
  {
    $params = ['formId' => $formId, 'watchId' => $watchId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], FormsEmpty::class);
  }
  /**
   * Return a list of the watches owned by the invoking project. The maximum
   * number of watches is two: For each invoker, the limit is one for each event
   * type per form. (watches.listFormsWatches)
   *
   * @param string $formId Required. ID of the Form whose watches to list.
   * @param array $optParams Optional parameters.
   * @return ListWatchesResponse
   */
  public function listFormsWatches($formId, $optParams = [])
  {
    $params = ['formId' => $formId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWatchesResponse::class);
  }
  /**
   * Renew an existing watch for seven days. The state of the watch after renewal
   * is `ACTIVE`, and the `expire_time` is seven days from the renewal. Renewing a
   * watch in an error state (e.g. `SUSPENDED`) succeeds if the error is no longer
   * present, but fail otherwise. After a watch has expired, RenewWatch returns
   * `NOT_FOUND`. (watches.renew)
   *
   * @param string $formId Required. The ID of the Form.
   * @param string $watchId Required. The ID of the Watch to renew.
   * @param RenewWatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Watch
   */
  public function renew($formId, $watchId, RenewWatchRequest $postBody, $optParams = [])
  {
    $params = ['formId' => $formId, 'watchId' => $watchId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('renew', [$params], Watch::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FormsWatches::class, 'Google_Service_Forms_Resource_FormsWatches');
