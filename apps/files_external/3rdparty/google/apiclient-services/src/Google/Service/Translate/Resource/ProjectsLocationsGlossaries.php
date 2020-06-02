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
 * The "glossaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $translateService = new Google_Service_Translate(...);
 *   $glossaries = $translateService->glossaries;
 *  </code>
 */
class Google_Service_Translate_Resource_ProjectsLocationsGlossaries extends Google_Service_Resource
{
  /**
   * Creates a glossary and returns the long-running operation. Returns NOT_FOUND,
   * if the project doesn't exist. (glossaries.create)
   *
   * @param string $parent Required. The project name.
   * @param Google_Service_Translate_Glossary $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_Operation
   */
  public function create($parent, Google_Service_Translate_Glossary $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Translate_Operation");
  }
  /**
   * Deletes a glossary, or cancels glossary construction if the glossary isn't
   * created yet. Returns NOT_FOUND, if the glossary doesn't exist.
   * (glossaries.delete)
   *
   * @param string $name Required. The name of the glossary to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Translate_Operation");
  }
  /**
   * Gets a glossary. Returns NOT_FOUND, if the glossary doesn't exist.
   * (glossaries.get)
   *
   * @param string $name Required. The name of the glossary to retrieve.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Translate_Glossary
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Translate_Glossary");
  }
  /**
   * Lists glossaries in a project. Returns NOT_FOUND, if the project doesn't
   * exist. (glossaries.listProjectsLocationsGlossaries)
   *
   * @param string $parent Required. The name of the project from which to list
   * all of the glossaries.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Optional. A token identifying a page of results
   * the server should return. Typically, this is the value of
   * [ListGlossariesResponse.next_page_token] returned from the previous call to
   * `ListGlossaries` method. The first page is returned if `page_token`is empty
   * or missing.
   * @opt_param int pageSize Optional. Requested page size. The server may return
   * fewer glossaries than requested. If unspecified, the server picks an
   * appropriate default.
   * @opt_param string filter Optional. Filter specifying constraints of a list
   * operation. Filtering is not supported yet, and the parameter currently has no
   * effect. If missing, no filtering is performed.
   * @return Google_Service_Translate_ListGlossariesResponse
   */
  public function listProjectsLocationsGlossaries($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Translate_ListGlossariesResponse");
  }
}
