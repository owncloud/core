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

namespace Google\Service\Contactcenterinsights\Resource;

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1ListPhraseMatchersResponse;
use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1PhraseMatcher;
use Google\Service\Contactcenterinsights\GoogleProtobufEmpty;

/**
 * The "phraseMatchers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $phraseMatchers = $contactcenterinsightsService->phraseMatchers;
 *  </code>
 */
class ProjectsLocationsPhraseMatchers extends \Google\Service\Resource
{
  /**
   * Creates a phrase matcher. (phraseMatchers.create)
   *
   * @param string $parent Required. The parent resource of the phrase matcher.
   * Required. The location to create a phrase matcher for. Format:
   * `projects//locations/` or `projects//locations/`
   * @param GoogleCloudContactcenterinsightsV1PhraseMatcher $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1PhraseMatcher
   */
  public function create($parent, GoogleCloudContactcenterinsightsV1PhraseMatcher $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudContactcenterinsightsV1PhraseMatcher::class);
  }
  /**
   * Deletes a phrase matcher. (phraseMatchers.delete)
   *
   * @param string $name Required. The name of the phrase matcher to delete.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a phrase matcher. (phraseMatchers.get)
   *
   * @param string $name Required. The name of the phrase matcher to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1PhraseMatcher
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudContactcenterinsightsV1PhraseMatcher::class);
  }
  /**
   * Lists phrase matchers. (phraseMatchers.listProjectsLocationsPhraseMatchers)
   *
   * @param string $parent Required. The parent resource of the phrase matcher.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to reduce results to a specific subset.
   * Useful for querying phrase matchers with specific properties.
   * @opt_param int pageSize The maximum number of phrase matchers to return in
   * the response. If this value is zero, the service will select a default size.
   * A call might return fewer objects than requested. A non-empty
   * `next_page_token` in the response indicates that more data is available.
   * @opt_param string pageToken The value returned by the last
   * `ListPhraseMatchersResponse`. This value indicates that this is a
   * continuation of a prior `ListPhraseMatchers` call and that the system should
   * return the next page of data.
   * @return GoogleCloudContactcenterinsightsV1ListPhraseMatchersResponse
   */
  public function listProjectsLocationsPhraseMatchers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudContactcenterinsightsV1ListPhraseMatchersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPhraseMatchers::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocationsPhraseMatchers');
