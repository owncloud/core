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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $projects = $translateService->projects;
 *  </code>
 */
class Google_Service_Translate_Resource_Projects extends Google_Service_Resource
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
   * @param Google_Service_Translate_DetectLanguageRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_DetectLanguageResponse
   */
  public function detectLanguage($parent, Google_Service_Translate_DetectLanguageRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('detectLanguage', array($params), "Google_Service_Translate_DetectLanguageResponse");
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
   * id}/models/general/nmt`, `projects/{project-number-or-id}/locations
   * /{location-id}/models/general/base` Returns languages supported by the
   * specified model. If missing, we get supported languages of Google general
   * base (PBMT) model.
   * @return Google_Service_Translate_SupportedLanguages
   */
  public function getSupportedLanguages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getSupportedLanguages', array($params), "Google_Service_Translate_SupportedLanguages");
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
   * @param Google_Service_Translate_TranslateTextRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_TranslateTextResponse
   */
  public function translateText($parent, Google_Service_Translate_TranslateTextRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('translateText', array($params), "Google_Service_Translate_TranslateTextResponse");
  }
}
