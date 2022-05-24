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

namespace Google\Service\CloudAsset\Resource;

use Google\Service\CloudAsset\CloudassetEmpty;
use Google\Service\CloudAsset\ListSavedQueriesResponse;
use Google\Service\CloudAsset\SavedQuery;

/**
 * The "savedQueries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudassetService = new Google\Service\CloudAsset(...);
 *   $savedQueries = $cloudassetService->savedQueries;
 *  </code>
 */
class SavedQueries extends \Google\Service\Resource
{
  /**
   * Creates a saved query in a parent project/folder/organization.
   * (savedQueries.create)
   *
   * @param string $parent Required. The name of the project/folder/organization
   * where this saved_query should be created in. It can only be an organization
   * number (such as "organizations/123"), a folder number (such as
   * "folders/123"), a project ID (such as "projects/my-project-id")", or a
   * project number (such as "projects/12345").
   * @param SavedQuery $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string savedQueryId Required. The ID to use for the saved query,
   * which must be unique in the specified parent. It will become the final
   * component of the saved query's resource name. This value should be 4-63
   * characters, and valid characters are /a-z-/. Notice that this field is
   * required in the saved query creation, and the `name` field of the
   * `saved_query` will be ignored.
   * @return SavedQuery
   */
  public function create($parent, SavedQuery $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], SavedQuery::class);
  }
  /**
   * Deletes a saved query. (savedQueries.delete)
   *
   * @param string $name Required. The name of the saved query to delete. It must
   * be in the format of: * projects/project_number/savedQueries/saved_query_id *
   * folders/folder_number/savedQueries/saved_query_id *
   * organizations/organization_number/savedQueries/saved_query_id
   * @param array $optParams Optional parameters.
   * @return CloudassetEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], CloudassetEmpty::class);
  }
  /**
   * Gets details about a saved query. (savedQueries.get)
   *
   * @param string $name Required. The name of the saved query and it must be in
   * the format of: * projects/project_number/savedQueries/saved_query_id *
   * folders/folder_number/savedQueries/saved_query_id *
   * organizations/organization_number/savedQueries/saved_query_id
   * @param array $optParams Optional parameters.
   * @return SavedQuery
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SavedQuery::class);
  }
  /**
   * Lists all saved queries in a parent project/folder/organization.
   * (savedQueries.listSavedQueries)
   *
   * @param string $parent Required. The parent project/folder/organization whose
   * savedQueries are to be listed. It can only be using
   * project/folder/organization number (such as "folders/12345")", or a project
   * ID (such as "projects/my-project-id").
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The expression to filter resources. The
   * expression is a list of zero or more restrictions combined via logical
   * operators `AND` and `OR`. When `AND` and `OR` are both used in the
   * expression, parentheses must be appropriately used to group the combinations.
   * The expression may also contain regular expressions. See
   * https://google.aip.dev/160 for more information on the grammar.
   * @opt_param int pageSize Optional. The maximum number of saved queries to
   * return per page. The service may return fewer than this value. If
   * unspecified, at most 50 will be returned. The maximum value is 1000; values
   * above 1000 will be coerced to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListSavedQueries` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSavedQueries` must match
   * the call that provided the page token.
   * @return ListSavedQueriesResponse
   */
  public function listSavedQueries($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSavedQueriesResponse::class);
  }
  /**
   * Updates a saved query. (savedQueries.patch)
   *
   * @param string $name The resource name of the saved query. The format must be:
   * * projects/project_number/savedQueries/saved_query_id *
   * folders/folder_number/savedQueries/saved_query_id *
   * organizations/organization_number/savedQueries/saved_query_id
   * @param SavedQuery $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to update.
   * @return SavedQuery
   */
  public function patch($name, SavedQuery $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], SavedQuery::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SavedQueries::class, 'Google_Service_CloudAsset_Resource_SavedQueries');
