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

use Google\Service\Recommender\GoogleCloudRecommenderV1ListRecommendationsResponse;
use Google\Service\Recommender\GoogleCloudRecommenderV1MarkRecommendationClaimedRequest;
use Google\Service\Recommender\GoogleCloudRecommenderV1MarkRecommendationFailedRequest;
use Google\Service\Recommender\GoogleCloudRecommenderV1MarkRecommendationSucceededRequest;
use Google\Service\Recommender\GoogleCloudRecommenderV1Recommendation;

/**
 * The "recommendations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommenderService = new Google\Service\Recommender(...);
 *   $recommendations = $recommenderService->recommendations;
 *  </code>
 */
class FoldersLocationsRecommendersRecommendations extends \Google\Service\Resource
{
  /**
   * Gets the requested recommendation. Requires the recommender.*.get IAM
   * permission for the specified recommender. (recommendations.get)
   *
   * @param string $name Required. Name of the recommendation.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1Recommendation
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRecommenderV1Recommendation::class);
  }
  /**
   * Lists recommendations for the specified Cloud Resource. Requires the
   * recommender.*.list IAM permission for the specified recommender.
   * (recommendations.listFoldersLocationsRecommendersRecommendations)
   *
   * @param string $parent Required. The container resource on which to execute
   * the request. Acceptable formats: * `projects/[PROJECT_NUMBER]/locations/[LOCA
   * TION]/recommenders/[RECOMMENDER_ID]` *
   * `projects/[PROJECT_ID]/locations/[LOCATION]/recommenders/[RECOMMENDER_ID]` *
   * `billingAccounts/[BILLING_ACCOUNT_ID]/locations/[LOCATION]/recommenders/[RECO
   * MMENDER_ID]` *
   * `folders/[FOLDER_ID]/locations/[LOCATION]/recommenders/[RECOMMENDER_ID]` * `o
   * rganizations/[ORGANIZATION_ID]/locations/[LOCATION]/recommenders/[RECOMMENDER
   * _ID]` LOCATION here refers to GCP Locations:
   * https://cloud.google.com/about/locations/ RECOMMENDER_ID refers to supported
   * recommenders: https://cloud.google.com/recommender/docs/recommenders.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter expression to restrict the recommendations
   * returned. Supported filter fields: * `state_info.state` *
   * `recommenderSubtype` * `priority` Examples: * `stateInfo.state = ACTIVE OR
   * stateInfo.state = DISMISSED` * `recommenderSubtype = REMOVE_ROLE OR
   * recommenderSubtype = REPLACE_ROLE` * `priority = P1 OR priority = P2` *
   * `stateInfo.state = ACTIVE AND (priority = P1 OR priority = P2)` (These
   * expressions are based on the filter language described at
   * https://google.aip.dev/160)
   * @opt_param int pageSize Optional. The maximum number of results to return
   * from this request. Non-positive values are ignored. If not specified, the
   * server will determine the number of results to return.
   * @opt_param string pageToken Optional. If present, retrieves the next batch of
   * results from the preceding call to this method. `page_token` must be the
   * value of `next_page_token` from the previous response. The values of other
   * method parameters must be identical to those in the previous call.
   * @return GoogleCloudRecommenderV1ListRecommendationsResponse
   */
  public function listFoldersLocationsRecommendersRecommendations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecommenderV1ListRecommendationsResponse::class);
  }
  /**
   * Marks the Recommendation State as Claimed. Users can use this method to
   * indicate to the Recommender API that they are starting to apply the
   * recommendation themselves. This stops the recommendation content from being
   * updated. Associated insights are frozen and placed in the ACCEPTED state.
   * MarkRecommendationClaimed can be applied to recommendations in CLAIMED,
   * SUCCEEDED, FAILED, or ACTIVE state. Requires the recommender.*.update IAM
   * permission for the specified recommender. (recommendations.markClaimed)
   *
   * @param string $name Required. Name of the recommendation.
   * @param GoogleCloudRecommenderV1MarkRecommendationClaimedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1Recommendation
   */
  public function markClaimed($name, GoogleCloudRecommenderV1MarkRecommendationClaimedRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('markClaimed', [$params], GoogleCloudRecommenderV1Recommendation::class);
  }
  /**
   * Marks the Recommendation State as Failed. Users can use this method to
   * indicate to the Recommender API that they have applied the recommendation
   * themselves, and the operation failed. This stops the recommendation content
   * from being updated. Associated insights are frozen and placed in the ACCEPTED
   * state. MarkRecommendationFailed can be applied to recommendations in ACTIVE,
   * CLAIMED, SUCCEEDED, or FAILED state. Requires the recommender.*.update IAM
   * permission for the specified recommender. (recommendations.markFailed)
   *
   * @param string $name Required. Name of the recommendation.
   * @param GoogleCloudRecommenderV1MarkRecommendationFailedRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1Recommendation
   */
  public function markFailed($name, GoogleCloudRecommenderV1MarkRecommendationFailedRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('markFailed', [$params], GoogleCloudRecommenderV1Recommendation::class);
  }
  /**
   * Marks the Recommendation State as Succeeded. Users can use this method to
   * indicate to the Recommender API that they have applied the recommendation
   * themselves, and the operation was successful. This stops the recommendation
   * content from being updated. Associated insights are frozen and placed in the
   * ACCEPTED state. MarkRecommendationSucceeded can be applied to recommendations
   * in ACTIVE, CLAIMED, SUCCEEDED, or FAILED state. Requires the
   * recommender.*.update IAM permission for the specified recommender.
   * (recommendations.markSucceeded)
   *
   * @param string $name Required. Name of the recommendation.
   * @param GoogleCloudRecommenderV1MarkRecommendationSucceededRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1Recommendation
   */
  public function markSucceeded($name, GoogleCloudRecommenderV1MarkRecommendationSucceededRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('markSucceeded', [$params], GoogleCloudRecommenderV1Recommendation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FoldersLocationsRecommendersRecommendations::class, 'Google_Service_Recommender_Resource_FoldersLocationsRecommendersRecommendations');
