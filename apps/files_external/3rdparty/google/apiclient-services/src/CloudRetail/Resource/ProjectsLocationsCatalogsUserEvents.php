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

namespace Google\Service\CloudRetail\Resource;

use Google\Service\CloudRetail\GoogleApiHttpBody;
use Google\Service\CloudRetail\GoogleCloudRetailV2ImportUserEventsRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2PurgeUserEventsRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2RejoinUserEventsRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2UserEvent;
use Google\Service\CloudRetail\GoogleLongrunningOperation;

/**
 * The "userEvents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google\Service\CloudRetail(...);
 *   $userEvents = $retailService->userEvents;
 *  </code>
 */
class ProjectsLocationsCatalogsUserEvents extends \Google\Service\Resource
{
  /**
   * Writes a single user event from the browser. This uses a GET request to due
   * to browser restriction of POST-ing to a 3rd party domain. This method is used
   * only by the Retail API JavaScript pixel and Google Tag Manager. Users should
   * not call this method directly. (userEvents.collect)
   *
   * @param string $parent Required. The parent catalog name, such as
   * `projects/1234/locations/global/catalogs/default_catalog`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ets The event timestamp in milliseconds. This prevents
   * browser caching of otherwise identical get requests. The name is abbreviated
   * to reduce the payload bytes.
   * @opt_param string uri The URL including cgi-parameters but excluding the hash
   * fragment with a length limit of 5,000 characters. This is often more useful
   * than the referer URL, because many browsers only send the domain for 3rd
   * party requests.
   * @opt_param string userEvent Required. URL encoded UserEvent proto with a
   * length limit of 2,000,000 characters.
   * @return GoogleApiHttpBody
   */
  public function collect($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('collect', [$params], GoogleApiHttpBody::class);
  }
  /**
   * Bulk import of User events. Request processing might be synchronous. Events
   * that already exist are skipped. Use this method for backfilling historical
   * user events. Operation.response is of type ImportResponse. Note that it is
   * possible for a subset of the items to be successfully inserted.
   * Operation.metadata is of type ImportMetadata. (userEvents.import)
   *
   * @param string $parent Required.
   * `projects/1234/locations/global/catalogs/default_catalog`
   * @param GoogleCloudRetailV2ImportUserEventsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function import($parent, GoogleCloudRetailV2ImportUserEventsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes permanently all user events specified by the filter provided.
   * Depending on the number of events specified by the filter, this operation
   * could take hours or days to complete. To test a filter, use the list command
   * first. (userEvents.purge)
   *
   * @param string $parent Required. The resource name of the catalog under which
   * the events are created. The format is
   * `projects/${projectId}/locations/global/catalogs/${catalogId}`
   * @param GoogleCloudRetailV2PurgeUserEventsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function purge($parent, GoogleCloudRetailV2PurgeUserEventsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('purge', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Triggers a user event rejoin operation with latest product catalog. Events
   * will not be annotated with detailed product information if product is missing
   * from the catalog at the time the user event is ingested, and these events are
   * stored as unjoined events with a limited usage on training and serving. This
   * API can be used to trigger a 'join' operation on specified events with latest
   * version of product catalog. It can also be used to correct events joined with
   * wrong product catalog. (userEvents.rejoin)
   *
   * @param string $parent Required. The parent catalog resource name, such as
   * `projects/1234/locations/global/catalogs/default_catalog`.
   * @param GoogleCloudRetailV2RejoinUserEventsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function rejoin($parent, GoogleCloudRetailV2RejoinUserEventsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rejoin', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Writes a single user event. (userEvents.write)
   *
   * @param string $parent Required. The parent catalog resource name, such as
   * `projects/1234/locations/global/catalogs/default_catalog`.
   * @param GoogleCloudRetailV2UserEvent $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2UserEvent
   */
  public function write($parent, GoogleCloudRetailV2UserEvent $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('write', [$params], GoogleCloudRetailV2UserEvent::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsUserEvents::class, 'Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsUserEvents');
