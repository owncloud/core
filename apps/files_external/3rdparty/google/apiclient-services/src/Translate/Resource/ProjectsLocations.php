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

namespace Google\Service\Translate\Resource;

use Google\Service\Translate\BatchTranslateTextRequest;
use Google\Service\Translate\DetectLanguageRequest;
use Google\Service\Translate\DetectLanguageResponse;
use Google\Service\Translate\ListLocationsResponse;
use Google\Service\Translate\Location;
use Google\Service\Translate\Operation;
use Google\Service\Translate\SupportedLanguages;
use Google\Service\Translate\TranslateTextRequest;
use Google\Service\Translate\TranslateTextResponse;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google\Service\Translate(...);
 *   $locations = $translateService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Translates a large volume of text in asynchronous batch mode. This function
   * provides real-time output as the inputs are being processed. If caller
   * cancels a request, the partial results (for an input file, it's all or
   * nothing) may still be available on the specified output location. This call
   * returns immediately and you can use google.longrunning.Operation.name to poll
   * the status of the call. (locations.batchTranslateText)
   *
   * @param string $parent Required. Location to make a call. Must refer to a
   * caller's project. Format: `projects/{project-number-or-id}/locations
   * /{location-id}`. The `global` location is not supported for batch
   * translation. Only AutoML Translation models or glossaries within the same
   * region (have the same location-id) can be used, otherwise an INVALID_ARGUMENT
   * (400) error is returned.
   * @param BatchTranslateTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function batchTranslateText($parent, BatchTranslateTextRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchTranslateText', [$params], Operation::class);
  }
  /**
   * Detects the language of text within a request. (locations.detectLanguage)
   *
   * @param string $parent Required. Project or location to make a call. Must
   * refer to a caller's project. Format: `projects/{project-number-or-
   * id}/locations/{location-id}` or `projects/{project-number-or-id}`. For global
   * calls, use `projects/{project-number-or-id}/locations/global` or `projects
   * /{project-number-or-id}`. Only models within the same region (has same
   * location-id) can be used. Otherwise an INVALID_ARGUMENT (400) error is
   * returned.
   * @param DetectLanguageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DetectLanguageResponse
   */
  public function detectLanguage($parent, DetectLanguageRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('detectLanguage', [$params], DetectLanguageResponse::class);
  }
  /**
   * Gets information about a location. (locations.get)
   *
   * @param string $name Resource name for the location.
   * @param array $optParams Optional parameters.
   * @return Location
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Location::class);
  }
  /**
   * Returns a list of supported languages for translation.
   * (locations.getSupportedLanguages)
   *
   * @param string $parent Required. Project or location to make a call. Must
   * refer to a caller's project. Format: `projects/{project-number-or-id}` or
   * `projects/{project-number-or-id}/locations/{location-id}`. For global calls,
   * use `projects/{project-number-or-id}/locations/global` or `projects/{project-
   * number-or-id}`. Non-global location is required for AutoML models. Only
   * models within the same region (have same location-id) can be used, otherwise
   * an INVALID_ARGUMENT (400) error is returned.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string displayLanguageCode Optional. The language to use to return
   * localized, human readable names of supported languages. If missing, then
   * display names are not returned in a response.
   * @opt_param string model Optional. Get supported languages of this model. The
   * format depends on model type: - AutoML Translation models: `projects
   * /{project-number-or-id}/locations/{location-id}/models/{model-id}` - General
   * (built-in) models: `projects/{project-number-or-id}/locations/{location-
   * id}/models/general/nmt`, Returns languages supported by the specified model.
   * If missing, we get supported languages of Google general NMT model.
   * @return SupportedLanguages
   */
  public function getSupportedLanguages($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('getSupportedLanguages', [$params], SupportedLanguages::class);
  }
  /**
   * Lists information about the supported locations for this service.
   * (locations.listProjectsLocations)
   *
   * @param string $name The resource that owns the locations collection, if
   * applicable.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to narrow down results to a preferred
   * subset. The filtering language accepts strings like "displayName=tokyo", and
   * is documented in more detail in [AIP-160](https://google.aip.dev/160).
   * @opt_param int pageSize The maximum number of results to return. If not set,
   * the service selects a default.
   * @opt_param string pageToken A page token received from the `next_page_token`
   * field in the response. Send that page token to receive the subsequent page.
   * @return ListLocationsResponse
   */
  public function listProjectsLocations($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLocationsResponse::class);
  }
  /**
   * Translates input text and returns translated text. (locations.translateText)
   *
   * @param string $parent Required. Project or location to make a call. Must
   * refer to a caller's project. Format: `projects/{project-number-or-id}` or
   * `projects/{project-number-or-id}/locations/{location-id}`. For global calls,
   * use `projects/{project-number-or-id}/locations/global` or `projects/{project-
   * number-or-id}`. Non-global location is required for requests using AutoML
   * models or custom glossaries. Models and glossaries must be within the same
   * region (have same location-id), otherwise an INVALID_ARGUMENT (400) error is
   * returned.
   * @param TranslateTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TranslateTextResponse
   */
  public function translateText($parent, TranslateTextRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('translateText', [$params], TranslateTextResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_Translate_Resource_ProjectsLocations');
