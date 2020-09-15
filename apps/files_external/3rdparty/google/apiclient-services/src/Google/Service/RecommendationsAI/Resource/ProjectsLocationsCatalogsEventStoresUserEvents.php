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

/**
 * The "userEvents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommendationengineService = new Google_Service_RecommendationsAI(...);
 *   $userEvents = $recommendationengineService->userEvents;
 *  </code>
 */
class Google_Service_RecommendationsAI_Resource_ProjectsLocationsCatalogsEventStoresUserEvents extends Google_Service_Resource
{
  /**
   * Writes a single user event from the browser. This uses a GET request to due
   * to browser restriction of POST-ing to a 3rd party domain. This method is used
   * only by the Recommendations AI JavaScript pixel. Users should not call this
   * method directly. (userEvents.collect)
   *
   * @param string $parent Required. The parent eventStore name, such as "projects
   * /1234/locations/global/catalogs/default_catalog/eventStores/default_event_sto
   * re".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string userEvent Required. URL encoded UserEvent proto.
   * @opt_param string uri Optional. The url including cgi-parameters but
   * excluding the hash fragment. The URL must be truncated to 1.5K bytes to
   * conservatively be under the 2K bytes. This is often more useful than the
   * referer url, because many browsers only send the domain for 3rd party
   * requests.
   * @opt_param string ets Optional. The event timestamp in milliseconds. This
   * prevents browser caching of otherwise identical get requests. The name is
   * abbreviated to reduce the payload bytes.
   * @return Google_Service_RecommendationsAI_GoogleApiHttpBody
   */
  public function collect($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('collect', array($params), "Google_Service_RecommendationsAI_GoogleApiHttpBody");
  }
  /**
   * Bulk import of User events. Request processing might be synchronous. Events
   * that already exist are skipped. Use this method for backfilling historical
   * user events. Operation.response is of type ImportResponse. Note that it is
   * possible for a subset of the items to be successfully inserted.
   * Operation.metadata is of type ImportMetadata. (userEvents.import)
   *
   * @param string $parent Required. "projects/1234/locations/global/catalogs/defa
   * ult_catalog/eventStores/default_event_store"
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ImportUserEventsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleLongrunningOperation
   */
  public function import($parent, Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ImportUserEventsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('import', array($params), "Google_Service_RecommendationsAI_GoogleLongrunningOperation");
  }
  /**
   * Gets a list of user events within a time range, with potential filtering. The
   * method does not list unjoined user events. Unjoined user event definition:
   * when a user event is ingested from Recommendations AI User Event APIs, the
   * catalog item included in the user event is connected with the current
   * catalog. If a catalog item of the ingested event is not in the current
   * catalog, it could lead to degraded model quality. This is called an unjoined
   * event. (userEvents.listProjectsLocationsCatalogsEventStoresUserEvents)
   *
   * @param string $parent Required. The parent eventStore resource name, such as
   * "projects/locations/catalogs/default_catalog/eventStores/default_event_store"
   * .
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. The previous
   * ListUserEventsResponse.next_page_token.
   * @opt_param string filter Optional. Filtering expression to specify
   * restrictions over returned events. This is a sequence of terms, where each
   * term applies some kind of a restriction to the returned user events. Use this
   * expression to restrict results to a specific time range, or filter events by
   * eventType. eg: eventTime > "2012-04-23T18:25:43.511Z"
   * eventsMissingCatalogItems eventTime<"2012-04-23T18:25:43.511Z"
   * eventType=search We expect only 3 types of fields: * eventTime: this can be
   * specified a maximum of 2 times, once with a less than operator and once with
   * a greater than operator. The eventTime restrict should result in one
   * contiguous valid eventTime range. * eventType: only 1 eventType restriction
   * can be specified. * eventsMissingCatalogItems: specififying this will
   * restrict results to events for which catalog items were not found in the
   * catalog. The default behavior is to return only those events for which
   * catalog items were found. Some examples of valid filters expressions: *
   * Example 1: eventTime > "2012-04-23T18:25:43.511Z" eventTime <
   * "2012-04-23T18:30:43.511Z" * Example 2: eventTime >
   * "2012-04-23T18:25:43.511Z" eventType = detail-page-view * Example 3:
   * eventsMissingCatalogItems eventType = search eventTime <
   * "2018-04-23T18:30:43.511Z" * Example 4: eventTime >
   * "2012-04-23T18:25:43.511Z" * Example 5: eventType = search * Example 6:
   * eventsMissingCatalogItems
   * @opt_param int pageSize Optional. Maximum number of results to return per
   * page. If zero, the service will choose a reasonable default.
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ListUserEventsResponse
   */
  public function listProjectsLocationsCatalogsEventStoresUserEvents($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ListUserEventsResponse");
  }
  /**
   * Deletes permanently all user events specified by the filter provided.
   * Depending on the number of events specified by the filter, this operation
   * could take hours or days to complete. To test a filter, use the list command
   * first. (userEvents.purge)
   *
   * @param string $parent Required. The resource name of the event_store under
   * which the events are created. The format is "projects/${projectId}/locations/
   * global/catalogs/${catalogId}/eventStores/${eventStoreId}"
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PurgeUserEventsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleLongrunningOperation
   */
  public function purge($parent, Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PurgeUserEventsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('purge', array($params), "Google_Service_RecommendationsAI_GoogleLongrunningOperation");
  }
  /**
   * Triggers a user event rejoin operation with latest catalog data. Events will
   * not be annotated with detailed catalog information if catalog item is missing
   * at the time the user event is ingested, and these events are stored as
   * unjoined events with a limited usage on training and serving. This API can be
   * used to trigger a 'join' operation on specified events with latest version of
   * catalog items. It can also be used to correct events joined with wrong
   * catalog items. (userEvents.rejoin)
   *
   * @param string $parent Required. Full resource name of user event, such as "pr
   * ojects/locations/catalogs/default_catalog/eventStores/default_event_store".
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1RejoinUserEventsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleLongrunningOperation
   */
  public function rejoin($parent, Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1RejoinUserEventsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rejoin', array($params), "Google_Service_RecommendationsAI_GoogleLongrunningOperation");
  }
  /**
   * Writes a single user event. (userEvents.write)
   *
   * @param string $parent Required. The parent eventStore resource name, such as
   * "projects/1234/locations/global/catalogs/default_catalog/eventStores/default_
   * event_store".
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEvent $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEvent
   */
  public function write($parent, Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEvent $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('write', array($params), "Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEvent");
  }
}
