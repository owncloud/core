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

namespace Google\Service\MyBusinessPlaceActions\Resource;

use Google\Service\MyBusinessPlaceActions\ListPlaceActionLinksResponse;
use Google\Service\MyBusinessPlaceActions\MybusinessplaceactionsEmpty;
use Google\Service\MyBusinessPlaceActions\PlaceActionLink;

/**
 * The "placeActionLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessplaceactionsService = new Google\Service\MyBusinessPlaceActions(...);
 *   $placeActionLinks = $mybusinessplaceactionsService->placeActionLinks;
 *  </code>
 */
class LocationsPlaceActionLinks extends \Google\Service\Resource
{
  /**
   * Creates a place action link associated with the specified location, and
   * returns it. The request is considered duplicate if the `parent`,
   * `place_action_link.uri` and `place_action_link.place_action_type` are the
   * same as a previous request. (placeActionLinks.create)
   *
   * @param string $parent Required. The resource name of the location where to
   * create this place action link. `locations/{location_id}`.
   * @param PlaceActionLink $postBody
   * @param array $optParams Optional parameters.
   * @return PlaceActionLink
   */
  public function create($parent, PlaceActionLink $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], PlaceActionLink::class);
  }
  /**
   * Deletes a place action link from the specified location.
   * (placeActionLinks.delete)
   *
   * @param string $name Required. The resource name of the place action link to
   * remove from the location.
   * @param array $optParams Optional parameters.
   * @return MybusinessplaceactionsEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], MybusinessplaceactionsEmpty::class);
  }
  /**
   * Gets the specified place action link. (placeActionLinks.get)
   *
   * @param string $name Required. The name of the place action link to fetch.
   * @param array $optParams Optional parameters.
   * @return PlaceActionLink
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PlaceActionLink::class);
  }
  /**
   * Lists the place action links for the specified location.
   * (placeActionLinks.listLocationsPlaceActionLinks)
   *
   * @param string $parent Required. The name of the location whose place action
   * links will be listed. `locations/{location_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter constraining the place action
   * links to return. The response includes entries that match the filter. We
   * support only the following filter: 1. place_action_type=XYZ where XYZ is a
   * valid PlaceActionType.
   * @opt_param int pageSize Optional. How many place action links to return per
   * page. Default of 10. The minimum is 1.
   * @opt_param string pageToken Optional. If specified, returns the next page of
   * place action links.
   * @return ListPlaceActionLinksResponse
   */
  public function listLocationsPlaceActionLinks($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPlaceActionLinksResponse::class);
  }
  /**
   * Updates the specified place action link and returns it.
   * (placeActionLinks.patch)
   *
   * @param string $name Optional. The resource name, in the format
   * `locations/{location_id}/placeActionLinks/{place_action_link_id}`. The name
   * field will only be considered in UpdatePlaceActionLink and
   * DeletePlaceActionLink requests for updating and deleting links respectively.
   * However, it will be ignored in CreatePlaceActionLink request, where
   * `place_action_link_id` will be assigned by the server on successful creation
   * of a new link and returned as part of the response.
   * @param PlaceActionLink $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields to update. The
   * only editable fields are `uri`, `place_action_type` and `is_preferred`. If
   * the updated link already exists at the same location with the same
   * `place_action_type` and `uri`, fails with an `ALREADY_EXISTS` error.
   * @return PlaceActionLink
   */
  public function patch($name, PlaceActionLink $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], PlaceActionLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsPlaceActionLinks::class, 'Google_Service_MyBusinessPlaceActions_Resource_LocationsPlaceActionLinks');
