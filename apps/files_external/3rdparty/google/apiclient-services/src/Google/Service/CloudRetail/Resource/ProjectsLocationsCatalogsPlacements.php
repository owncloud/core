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
 * The "placements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google_Service_CloudRetail(...);
 *   $placements = $retailService->placements;
 *  </code>
 */
class Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsPlacements extends Google_Service_Resource
{
  /**
   * Makes a recommendation prediction. (placements.predict)
   *
   * @param string $placement Required. Full resource name of the format:
   * {name=projects/locations/global/catalogs/default_catalog/placements} The ID
   * of the Recommendations AI placement. Before you can request predictions from
   * your model, you must create at least one placement for it. For more
   * information, see [Managing placements](https://cloud.google.com/retail
   * /recommendations-ai/docs/manage-placements). The full list of available
   * placements can be seen at https://console.cloud.google.com/recommendation/cat
   * alogs/default_catalog/placements
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2PredictResponse
   */
  public function predict($placement, Google_Service_CloudRetail_GoogleCloudRetailV2PredictRequest $postBody, $optParams = array())
  {
    $params = array('placement' => $placement, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('predict', array($params), "Google_Service_CloudRetail_GoogleCloudRetailV2PredictResponse");
  }
}
