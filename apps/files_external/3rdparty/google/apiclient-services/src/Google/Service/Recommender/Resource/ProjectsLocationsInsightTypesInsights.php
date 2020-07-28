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
 * The "insights" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommenderService = new Google_Service_Recommender(...);
 *   $insights = $recommenderService->insights;
 *  </code>
 */
class Google_Service_Recommender_Resource_ProjectsLocationsInsightTypesInsights extends Google_Service_Resource
{
  /**
   * Gets the requested insight. Requires the recommender.*.get IAM permission for
   * the specified insight type. (insights.get)
   *
   * @param string $name Required. Name of the insight.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1Insight
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1Insight");
  }
  /**
   * Lists insights for a Cloud project. Requires the recommender.*.list IAM
   * permission for the specified insight type.
   * (insights.listProjectsLocationsInsightTypesInsights)
   *
   * @param string $parent Required. The container resource on which to execute
   * the request. Acceptable formats:
   *
   * 1. "projects/[PROJECT_NUMBER]/locations/[LOCATION]/insightTypes/[INSIGHT_TYPE
   * _ID]",
   *
   * LOCATION here refers to GCP Locations:
   * https://cloud.google.com/about/locations/
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. If present, retrieves the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of other
   * method parameters must be identical to those in the previous call.
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request.  Non-positive values are ignored. If not specified, the
   * server will determine the number of results to return.
   * @opt_param string filter Optional. Filter expression to restrict the insights
   * returned. Supported filter fields: state Eg: `state:"DISMISSED" or
   * state:"ACTIVE"
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1ListInsightsResponse
   */
  public function listProjectsLocationsInsightTypesInsights($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1ListInsightsResponse");
  }
  /**
   * Marks the Insight State as Accepted. Users can use this method to indicate to
   * the Recommender API that they have applied some action based on the insight.
   * This stops the insight content from being updated.
   *
   * MarkInsightAccepted can be applied to insights in ACTIVE state. Requires the
   * recommender.*.update IAM permission for the specified insight.
   * (insights.markAccepted)
   *
   * @param string $name Required. Name of the insight.
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1MarkInsightAcceptedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1Insight
   */
  public function markAccepted($name, Google_Service_Recommender_GoogleCloudRecommenderV1MarkInsightAcceptedRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('markAccepted', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1Insight");
  }
}
