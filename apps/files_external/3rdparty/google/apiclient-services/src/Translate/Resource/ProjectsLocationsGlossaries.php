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

use Google\Service\Translate\Glossary;
use Google\Service\Translate\ListGlossariesResponse;
use Google\Service\Translate\Operation;

/**
 * The "glossaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google\Service\Translate(...);
 *   $glossaries = $translateService->glossaries;
 *  </code>
 */
class ProjectsLocationsGlossaries extends \Google\Service\Resource
{
  /**
   * Creates a glossary and returns the long-running operation. Returns NOT_FOUND,
   * if the project doesn't exist. (glossaries.create)
   *
   * @param string $parent Required. The project name.
   * @param Glossary $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, Glossary $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a glossary, or cancels glossary construction if the glossary isn't
   * created yet. Returns NOT_FOUND, if the glossary doesn't exist.
   * (glossaries.delete)
   *
   * @param string $name Required. The name of the glossary to delete.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets a glossary. Returns NOT_FOUND, if the glossary doesn't exist.
   * (glossaries.get)
   *
   * @param string $name Required. The name of the glossary to retrieve.
   * @param array $optParams Optional parameters.
   * @return Glossary
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Glossary::class);
  }
  /**
   * Lists glossaries in a project. Returns NOT_FOUND, if the project doesn't
   * exist. (glossaries.listProjectsLocationsGlossaries)
   *
   * @param string $parent Required. The name of the project from which to list
   * all of the glossaries.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter specifying constraints of a list
   * operation. Specify the constraint by the format of "key=value", where key
   * must be "src" or "tgt", and the value must be a valid language code. For
   * multiple restrictions, concatenate them by "AND" (uppercase only), such as:
   * "src=en-US AND tgt=zh-CN". Notice that the exact match is used here, which
   * means using 'en-US' and 'en' can lead to different results, which depends on
   * the language code you used when you create the glossary. For the
   * unidirectional glossaries, the "src" and "tgt" add restrictions on the source
   * and target language code separately. For the equivalent term set glossaries,
   * the "src" and/or "tgt" add restrictions on the term set. For example: "src
   * =en-US AND tgt=zh-CN" will only pick the unidirectional glossaries which
   * exactly match the source language code as "en-US" and the target language
   * code "zh-CN", but all equivalent term set glossaries which contain "en-US"
   * and "zh-CN" in their language set will be picked. If missing, no filtering is
   * performed.
   * @opt_param int pageSize Optional. Requested page size. The server may return
   * fewer glossaries than requested. If unspecified, the server picks an
   * appropriate default.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * the server should return. Typically, this is the value of
   * [ListGlossariesResponse.next_page_token] returned from the previous call to
   * `ListGlossaries` method. The first page is returned if `page_token`is empty
   * or missing.
   * @return ListGlossariesResponse
   */
  public function listProjectsLocationsGlossaries($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGlossariesResponse::class);
  }
  /**
   * Updates a glossary. A LRO is used since the update can be async if the
   * glossary's entry file is updated. (glossaries.patch)
   *
   * @param string $name Required. The resource name of the glossary. Glossary
   * names have the form `projects/{project-number-or-id}/locations/{location-
   * id}/glossaries/{glossary-id}`.
   * @param Glossary $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. Currently only
   * `display_name` and 'input_config'
   * @return Operation
   */
  public function patch($name, Glossary $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGlossaries::class, 'Google_Service_Translate_Resource_ProjectsLocationsGlossaries');
