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

namespace Google\Service\Speech\Resource;

use Google\Service\Speech\CreatePhraseSetRequest;
use Google\Service\Speech\ListPhraseSetResponse;
use Google\Service\Speech\PhraseSet;
use Google\Service\Speech\SpeechEmpty;

/**
 * The "phraseSets" collection of methods.
 * Typical usage is:
 *  <code>
 *   $speechService = new Google\Service\Speech(...);
 *   $phraseSets = $speechService->phraseSets;
 *  </code>
 */
class ProjectsLocationsPhraseSets extends \Google\Service\Resource
{
  /**
   * Create a set of phrase hints. Each item in the set can be a single word or a
   * multi-word phrase. The items in the PhraseSet are favored by the recognition
   * model when you send a call that includes the PhraseSet. (phraseSets.create)
   *
   * @param string $parent Required. The parent resource where this phrase set
   * will be created. Format: `projects/{project}/locations/{location}/phraseSets`
   * Speech-to-Text supports three locations: `global`, `us` (US North America),
   * and `eu` (Europe). If you are calling the `speech.googleapis.com` endpoint,
   * use the `global` location. To specify a region, use a [regional endpoint
   * ](/speech-to-text/docs/endpoints) with matching `us` or `eu` location value.
   * @param CreatePhraseSetRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PhraseSet
   */
  public function create($parent, CreatePhraseSetRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], PhraseSet::class);
  }
  /**
   * Delete a phrase set. (phraseSets.delete)
   *
   * @param string $name Required. The name of the phrase set to delete. Format:
   * `projects/{project}/locations/{location}/phraseSets/{phrase_set}`
   * @param array $optParams Optional parameters.
   * @return SpeechEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SpeechEmpty::class);
  }
  /**
   * Get a phrase set. (phraseSets.get)
   *
   * @param string $name Required. The name of the phrase set to retrieve. Format:
   * `projects/{project}/locations/{location}/phraseSets/{phrase_set}` Speech-to-
   * Text supports three locations: `global`, `us` (US North America), and `eu`
   * (Europe). If you are calling the `speech.googleapis.com` endpoint, use the
   * `global` location. To specify a region, use a [regional endpoint](/speech-to-
   * text/docs/endpoints) with matching `us` or `eu` location value.
   * @param array $optParams Optional parameters.
   * @return PhraseSet
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PhraseSet::class);
  }
  /**
   * List phrase sets. (phraseSets.listProjectsLocationsPhraseSets)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * phrase set. Format: `projects/{project}/locations/{location}` Speech-to-Text
   * supports three locations: `global`, `us` (US North America), and `eu`
   * (Europe). If you are calling the `speech.googleapis.com` endpoint, use the
   * `global` location. To specify a region, use a [regional endpoint](/speech-to-
   * text/docs/endpoints) with matching `us` or `eu` location value.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of phrase sets to return. The
   * service may return fewer than this value. If unspecified, at most 50 phrase
   * sets will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListPhraseSet` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListPhraseSet` must match the
   * call that provided the page token.
   * @return ListPhraseSetResponse
   */
  public function listProjectsLocationsPhraseSets($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPhraseSetResponse::class);
  }
  /**
   * Update a phrase set. (phraseSets.patch)
   *
   * @param string $name The resource name of the phrase set.
   * @param PhraseSet $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return PhraseSet
   */
  public function patch($name, PhraseSet $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], PhraseSet::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPhraseSets::class, 'Google_Service_Speech_Resource_ProjectsLocationsPhraseSets');
