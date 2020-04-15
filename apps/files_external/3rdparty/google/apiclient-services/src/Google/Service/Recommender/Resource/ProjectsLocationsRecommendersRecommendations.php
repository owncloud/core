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
 * The "recommendations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommenderService = new Google_Service_Recommender(...);
 *   $recommendations = $recommenderService->recommendations;
 *  </code>
 */
class Google_Service_Recommender_Resource_ProjectsLocationsRecommendersRecommendations extends Google_Service_Resource
{
  /**
   * Gets the requested recommendation. Requires the recommender.*.get IAM
   * permission for the specified recommender. (recommendations.get)
   *
   * @param string $name Required. Name of the recommendation.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation");
  }
  /**
   * Lists recommendations for a Cloud project. Requires the recommender.*.list
   * IAM permission for the specified recommender.
   * (recommendations.listProjectsLocationsRecommendersRecommendations)
   *
   * @param string $parent Required. The container resource on which to execute
   * the request. Acceptable formats:
   *
   * 1. "projects/[PROJECT_NUMBER]/locations/[LOCATION]/recommenders/[RECOMMENDER_
   * ID]",
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
   * @opt_param string filter Filter expression to restrict the recommendations
   * returned. Supported filter fields: state_info.state Eg:
   * `state_info.state:"DISMISSED" or state_info.state:"FAILED"
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1beta1ListRecommendationsResponse
   */
  public function listProjectsLocationsRecommendersRecommendations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1beta1ListRecommendationsResponse");
  }
  /**
   * Marks the Recommendation State as Claimed. Users can use this method to
   * indicate to the Recommender API that they are starting to apply the
   * recommendation themselves. This stops the recommendation content from being
   * updated. Associated insights are frozen and placed in the ACCEPTED state.
   *
   * MarkRecommendationClaimed can be applied to recommendations in CLAIMED or
   * ACTIVE state.
   *
   * Requires the recommender.*.update IAM permission for the specified
   * recommender. (recommendations.markClaimed)
   *
   * @param string $name Required. Name of the recommendation.
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1beta1MarkRecommendationClaimedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation
   */
  public function markClaimed($name, Google_Service_Recommender_GoogleCloudRecommenderV1beta1MarkRecommendationClaimedRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('markClaimed', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation");
  }
  /**
   * Marks the Recommendation State as Failed. Users can use this method to
   * indicate to the Recommender API that they have applied the recommendation
   * themselves, and the operation failed. This stops the recommendation content
   * from being updated. Associated insights are frozen and placed in the ACCEPTED
   * state.
   *
   * MarkRecommendationFailed can be applied to recommendations in ACTIVE,
   * CLAIMED, SUCCEEDED, or FAILED state.
   *
   * Requires the recommender.*.update IAM permission for the specified
   * recommender. (recommendations.markFailed)
   *
   * @param string $name Required. Name of the recommendation.
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1beta1MarkRecommendationFailedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation
   */
  public function markFailed($name, Google_Service_Recommender_GoogleCloudRecommenderV1beta1MarkRecommendationFailedRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('markFailed', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation");
  }
  /**
   * Marks the Recommendation State as Succeeded. Users can use this method to
   * indicate to the Recommender API that they have applied the recommendation
   * themselves, and the operation was successful. This stops the recommendation
   * content from being updated. Associated insights are frozen and placed in the
   * ACCEPTED state.
   *
   * MarkRecommendationSucceeded can be applied to recommendations in ACTIVE,
   * CLAIMED, SUCCEEDED, or FAILED state.
   *
   * Requires the recommender.*.update IAM permission for the specified
   * recommender. (recommendations.markSucceeded)
   *
   * @param string $name Required. Name of the recommendation.
   * @param Google_Service_Recommender_GoogleCloudRecommenderV1beta1MarkRecommendationSucceededRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation
   */
  public function markSucceeded($name, Google_Service_Recommender_GoogleCloudRecommenderV1beta1MarkRecommendationSucceededRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('markSucceeded', array($params), "Google_Service_Recommender_GoogleCloudRecommenderV1beta1Recommendation");
  }
}
