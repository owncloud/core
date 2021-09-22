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

use Google\Service\MyBusinessPlaceActions\ListPlaceActionTypeMetadataResponse;

/**
 * The "placeActionTypeMetadata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessplaceactionsService = new Google\Service\MyBusinessPlaceActions(...);
 *   $placeActionTypeMetadata = $mybusinessplaceactionsService->placeActionTypeMetadata;
 *  </code>
 */
class PlaceActionTypeMetadata extends \Google\Service\Resource
{
  /**
   * Returns the list of available place action types for a location or country.
   * (placeActionTypeMetadata.listPlaceActionTypeMetadata)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter constraining the place action
   * types to return metadata for. The response includes entries that match the
   * filter. We support only the following filters: 1. location=XYZ where XYZ is a
   * string indicating the resource name of a location, in the format
   * `locations/{location_id}`. 2. region_code=XYZ where XYZ is a Unicode CLDR
   * region code to find available action types. If no filter is provided, all
   * place action types are returned.
   * @opt_param string languageCode Optional. The IETF BCP-47 code of language to
   * get display names in. If this language is not available, they will be
   * provided in English.
   * @opt_param int pageSize Optional. How many action types to include per page.
   * Default is 10, minimum is 1.
   * @opt_param string pageToken Optional. If specified, the next page of place
   * action type metadata is retrieved. The `pageToken` is returned when a call to
   * `placeActionTypeMetadata.list` returns more results than can fit into the
   * requested page size.
   * @return ListPlaceActionTypeMetadataResponse
   */
  public function listPlaceActionTypeMetadata($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPlaceActionTypeMetadataResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlaceActionTypeMetadata::class, 'Google_Service_MyBusinessPlaceActions_Resource_PlaceActionTypeMetadata');
