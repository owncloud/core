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

use Google\Service\Speech\CreateCustomClassRequest;
use Google\Service\Speech\CustomClass;
use Google\Service\Speech\ListCustomClassesResponse;
use Google\Service\Speech\SpeechEmpty;

/**
 * The "customClasses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $speechService = new Google\Service\Speech(...);
 *   $customClasses = $speechService->customClasses;
 *  </code>
 */
class ProjectsLocationsCustomClasses extends \Google\Service\Resource
{
  /**
   * Create a custom class. (customClasses.create)
   *
   * @param string $parent Required. The parent resource where this custom class
   * will be created. Format:
   * `projects/{project}/locations/{location}/customClasses` Speech-to-Text
   * supports three locations: `global`, `us` (US North America), and `eu`
   * (Europe). If you are calling the `speech.googleapis.com` endpoint, use the
   * `global` location. To specify a region, use a [regional endpoint](/speech-to-
   * text/docs/endpoints) with matching `us` or `eu` location value.
   * @param CreateCustomClassRequest $postBody
   * @param array $optParams Optional parameters.
   * @return CustomClass
   */
  public function create($parent, CreateCustomClassRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], CustomClass::class);
  }
  /**
   * Delete a custom class. (customClasses.delete)
   *
   * @param string $name Required. The name of the custom class to delete. Format:
   * `projects/{project}/locations/{location}/customClasses/{custom_class}`
   * Speech-to-Text supports three locations: `global`, `us` (US North America),
   * and `eu` (Europe). If you are calling the `speech.googleapis.com` endpoint,
   * use the `global` location. To specify a region, use a [regional endpoint
   * ](/speech-to-text/docs/endpoints) with matching `us` or `eu` location value.
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
   * Get a custom class. (customClasses.get)
   *
   * @param string $name Required. The name of the custom class to retrieve.
   * Format:
   * `projects/{project}/locations/{location}/customClasses/{custom_class}`
   * @param array $optParams Optional parameters.
   * @return CustomClass
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CustomClass::class);
  }
  /**
   * List custom classes. (customClasses.listProjectsLocationsCustomClasses)
   *
   * @param string $parent Required. The parent, which owns this collection of
   * custom classes. Format:
   * `projects/{project}/locations/{location}/customClasses` Speech-to-Text
   * supports three locations: `global`, `us` (US North America), and `eu`
   * (Europe). If you are calling the `speech.googleapis.com` endpoint, use the
   * `global` location. To specify a region, use a [regional endpoint](/speech-to-
   * text/docs/endpoints) with matching `us` or `eu` location value.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of custom classes to return. The
   * service may return fewer than this value. If unspecified, at most 50 custom
   * classes will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListCustomClass` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListCustomClass` must match the
   * call that provided the page token.
   * @return ListCustomClassesResponse
   */
  public function listProjectsLocationsCustomClasses($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCustomClassesResponse::class);
  }
  /**
   * Update a custom class. (customClasses.patch)
   *
   * @param string $name The resource name of the custom class.
   * @param CustomClass $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @return CustomClass
   */
  public function patch($name, CustomClass $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CustomClass::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCustomClasses::class, 'Google_Service_Speech_Resource_ProjectsLocationsCustomClasses');
