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

use Google\Service\Translate\DetectLanguageRequest;
use Google\Service\Translate\DetectLanguageResponse;
use Google\Service\Translate\SupportedLanguages;
use Google\Service\Translate\TranslateTextRequest;
use Google\Service\Translate\TranslateTextResponse;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google\Service\Translate(...);
 *   $projects = $translateService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Detects the language of text within a request. (projects.detectLanguage)
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
   * Returns a list of supported languages for translation.
   * (projects.getSupportedLanguages)
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
   * Translates input text and returns translated text. (projects.translateText)
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
class_alias(Projects::class, 'Google_Service_Translate_Resource_Projects');
