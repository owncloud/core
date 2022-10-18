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

use Google\Service\Translate\GlossaryEntry;
use Google\Service\Translate\ListGlossaryEntriesResponse;
use Google\Service\Translate\TranslateEmpty;

/**
 * The "glossaryEntries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google\Service\Translate(...);
 *   $glossaryEntries = $translateService->glossaryEntries;
 *  </code>
 */
class ProjectsLocationsGlossariesGlossaryEntries extends \Google\Service\Resource
{
  /**
   * Creates a glossary entry. (glossaryEntries.create)
   *
   * @param string $parent Required. The resource name of the glossary to create
   * the entry under.
   * @param GlossaryEntry $postBody
   * @param array $optParams Optional parameters.
   * @return GlossaryEntry
   */
  public function create($parent, GlossaryEntry $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GlossaryEntry::class);
  }
  /**
   * Deletes a single entry from the glossary (glossaryEntries.delete)
   *
   * @param string $name Required. The resource name of the glossary entry to
   * delete
   * @param array $optParams Optional parameters.
   * @return TranslateEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], TranslateEmpty::class);
  }
  /**
   * Gets a single glossary entry by the given id. (glossaryEntries.get)
   *
   * @param string $name Required. The resource name of the glossary entry to get
   * @param array $optParams Optional parameters.
   * @return GlossaryEntry
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GlossaryEntry::class);
  }
  /**
   * List the entries for the glossary.
   * (glossaryEntries.listProjectsLocationsGlossariesGlossaryEntries)
   *
   * @param string $parent Required. The parent glossary resource name for listing
   * the glossary's entries.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Requested page size. The server may return
   * fewer glossary entries than requested. If unspecified, the server picks an
   * appropriate default.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * the server should return. Typically, this is the value of
   * [ListGlossaryEntriesResponse.next_page_token] returned from the previous
   * call. The first page is returned if `page_token`is empty or missing.
   * @return ListGlossaryEntriesResponse
   */
  public function listProjectsLocationsGlossariesGlossaryEntries($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGlossaryEntriesResponse::class);
  }
  /**
   * Updates a glossary entry. (glossaryEntries.patch)
   *
   * @param string $name Required. The resource name of the entry. Format:
   * "projects/locations/glossaries/glossaryEntries"
   * @param GlossaryEntry $postBody
   * @param array $optParams Optional parameters.
   * @return GlossaryEntry
   */
  public function patch($name, GlossaryEntry $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GlossaryEntry::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGlossariesGlossaryEntries::class, 'Google_Service_Translate_Resource_ProjectsLocationsGlossariesGlossaryEntries');
