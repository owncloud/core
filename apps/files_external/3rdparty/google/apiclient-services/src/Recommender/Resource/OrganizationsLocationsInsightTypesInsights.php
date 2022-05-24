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

namespace Google\Service\Recommender\Resource;

use Google\Service\Recommender\GoogleCloudRecommenderV1Insight;
use Google\Service\Recommender\GoogleCloudRecommenderV1ListInsightsResponse;
use Google\Service\Recommender\GoogleCloudRecommenderV1MarkInsightAcceptedRequest;

/**
 * The "insights" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommenderService = new Google\Service\Recommender(...);
 *   $insights = $recommenderService->insights;
 *  </code>
 */
class OrganizationsLocationsInsightTypesInsights extends \Google\Service\Resource
{
  /**
   * Gets the requested insight. Requires the recommender.*.get IAM permission for
   * the specified insight type. (insights.get)
   *
   * @param string $name Required. Name of the insight.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1Insight
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRecommenderV1Insight::class);
  }
  /**
   * Lists insights for the specified Cloud Resource. Requires the
   * recommender.*.list IAM permission for the specified insight type.
   * (insights.listOrganizationsLocationsInsightTypesInsights)
   *
   * @param string $parent Required. The container resource on which to execute
   * the request. Acceptable formats: * `projects/[PROJECT_NUMBER]/locations/[LOCA
   * TION]/insightTypes/[INSIGHT_TYPE_ID]` *
   * `projects/[PROJECT_ID]/locations/[LOCATION]/insightTypes/[INSIGHT_TYPE_ID]` *
   * `billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION]/insightTypes/[INSI
   * GHT_TYPE_ID]` *
   * `folders/[FOLDER_ID]/locations/[LOCATION]/insightTypes/[INSIGHT_TYPE_ID]` * `
   * organizations/[ORGANIZATION_ID]/locations/[LOCATION]/insightTypes/[INSIGHT_TY
   * PE_ID]` LOCATION here refers to GCP Locations:
   * https://cloud.google.com/about/locations/ INSIGHT_TYPE_ID refers to supported
   * insight types: https://cloud.google.com/recommender/docs/insights/insight-
   * types.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter expression to restrict the insights
   * returned. Supported filter fields: * `stateInfo.state` * `insightSubtype` *
   * `severity` Examples: * `stateInfo.state = ACTIVE OR stateInfo.state =
   * DISMISSED` * `insightSubtype = PERMISSIONS_USAGE` * `severity = CRITICAL OR
   * severity = HIGH` * `stateInfo.state = ACTIVE AND (severity = CRITICAL OR
   * severity = HIGH)` (These expressions are based on the filter language
   * described at https://google.aip.dev/160)
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. If not specified, the
   * server will determine the number of results to return.
   * @opt_param string pageToken Optional. If present, retrieves the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of other
   * method parameters must be identical to those in the previous call.
   * @return GoogleCloudRecommenderV1ListInsightsResponse
   */
  public function listOrganizationsLocationsInsightTypesInsights($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecommenderV1ListInsightsResponse::class);
  }
  /**
   * Marks the Insight State as Accepted. Users can use this method to indicate to
   * the Recommender API that they have applied some action based on the insight.
   * This stops the insight content from being updated. MarkInsightAccepted can be
   * applied to insights in ACTIVE state. Requires the recommender.*.update IAM
   * permission for the specified insight. (insights.markAccepted)
   *
   * @param string $name Required. Name of the insight.
   * @param GoogleCloudRecommenderV1MarkInsightAcceptedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1Insight
   */
  public function markAccepted($name, GoogleCloudRecommenderV1MarkInsightAcceptedRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('markAccepted', [$params], GoogleCloudRecommenderV1Insight::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsLocationsInsightTypesInsights::class, 'Google_Service_Recommender_Resource_OrganizationsLocationsInsightTypesInsights');
