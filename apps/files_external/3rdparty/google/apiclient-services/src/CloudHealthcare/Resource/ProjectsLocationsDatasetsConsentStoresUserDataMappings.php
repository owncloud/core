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

namespace Google\Service\CloudHealthcare\Resource;

use Google\Service\CloudHealthcare\ArchiveUserDataMappingRequest;
use Google\Service\CloudHealthcare\ArchiveUserDataMappingResponse;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\ListUserDataMappingsResponse;
use Google\Service\CloudHealthcare\UserDataMapping;

/**
 * The "userDataMappings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $userDataMappings = $healthcareService->userDataMappings;
 *  </code>
 */
class ProjectsLocationsDatasetsConsentStoresUserDataMappings extends \Google\Service\Resource
{
  /**
   * Archives the specified User data mapping. (userDataMappings.archive)
   *
   * @param string $name Required. The resource name of the User data mapping to
   * archive.
   * @param ArchiveUserDataMappingRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ArchiveUserDataMappingResponse
   */
  public function archive($name, ArchiveUserDataMappingRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('archive', [$params], ArchiveUserDataMappingResponse::class);
  }
  /**
   * Creates a new User data mapping in the parent consent store.
   * (userDataMappings.create)
   *
   * @param string $parent Required. Name of the consent store.
   * @param UserDataMapping $postBody
   * @param array $optParams Optional parameters.
   * @return UserDataMapping
   */
  public function create($parent, UserDataMapping $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], UserDataMapping::class);
  }
  /**
   * Deletes the specified User data mapping. (userDataMappings.delete)
   *
   * @param string $name Required. The resource name of the User data mapping to
   * delete.
   * @param array $optParams Optional parameters.
   * @return HealthcareEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], HealthcareEmpty::class);
  }
  /**
   * Gets the specified User data mapping. (userDataMappings.get)
   *
   * @param string $name Required. The resource name of the User data mapping to
   * retrieve.
   * @param array $optParams Optional parameters.
   * @return UserDataMapping
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UserDataMapping::class);
  }
  /**
   * Lists the User data mappings in the specified consent store.
   * (userDataMappings.listProjectsLocationsDatasetsConsentStoresUserDataMappings)
   *
   * @param string $parent Required. Name of the consent store to retrieve User
   * data mappings from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the User data mappings returned
   * to those matching a filter. The following syntax is available: * A string
   * field value can be written as text inside quotation marks, for example
   * `"query text"`. The only valid relational operation for text fields is
   * equality (`=`), where text is searched within the field, rather than having
   * the field be equal to the text. For example, `"Comment = great"` returns
   * messages with `great` in the comment field. * A number field value can be
   * written as an integer, a decimal, or an exponential. The valid relational
   * operators for number fields are the equality operator (`=`), along with the
   * less than/greater than operators (`<`, `<=`, `>`, `>=`). Note that there is
   * no inequality (`!=`) operator. You can prepend the `NOT` operator to an
   * expression to negate it. * A date field value must be written in `yyyy-mm-dd`
   * form. Fields with date and time use the RFC3339 time format. Leading zeros
   * are required for one-digit months and days. The valid relational operators
   * for date fields are the equality operator (`=`) , along with the less
   * than/greater than operators (`<`, `<=`, `>`, `>=`). Note that there is no
   * inequality (`!=`) operator. You can prepend the `NOT` operator to an
   * expression to negate it. * Multiple field query expressions can be combined
   * in one query by adding `AND` or `OR` operators between the expressions. If a
   * boolean operator appears within a quoted string, it is not treated as
   * special, it's just another part of the character string to be matched. You
   * can prepend the `NOT` operator to an expression to negate it. The fields
   * available for filtering are: - data_id - user_id. For example,
   * `filter=user_id=\"user123\"`. - archived - archive_time
   * @opt_param int pageSize Optional. Limit on the number of User data mappings
   * to return in a single response. If not specified, 100 is used. May not be
   * larger than 1000.
   * @opt_param string pageToken Optional. Token to retrieve the next page of
   * results, or empty to get the first page.
   * @return ListUserDataMappingsResponse
   */
  public function listProjectsLocationsDatasetsConsentStoresUserDataMappings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUserDataMappingsResponse::class);
  }
  /**
   * Updates the specified User data mapping. (userDataMappings.patch)
   *
   * @param string $name Resource name of the User data mapping, of the form `proj
   * ects/{project_id}/locations/{location_id}/datasets/{dataset_id}/consentStores
   * /{consent_store_id}/userDataMappings/{user_data_mapping_id}`.
   * @param UserDataMapping $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask that applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `data_id`, `user_id` and `resource_attributes` fields can be updated.
   * @return UserDataMapping
   */
  public function patch($name, UserDataMapping $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], UserDataMapping::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDatasetsConsentStoresUserDataMappings::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStoresUserDataMappings');
