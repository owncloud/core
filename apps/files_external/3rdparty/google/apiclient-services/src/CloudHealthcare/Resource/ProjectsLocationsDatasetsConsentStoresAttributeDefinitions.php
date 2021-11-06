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

use Google\Service\CloudHealthcare\AttributeDefinition;
use Google\Service\CloudHealthcare\HealthcareEmpty;
use Google\Service\CloudHealthcare\ListAttributeDefinitionsResponse;

/**
 * The "attributeDefinitions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google\Service\CloudHealthcare(...);
 *   $attributeDefinitions = $healthcareService->attributeDefinitions;
 *  </code>
 */
class ProjectsLocationsDatasetsConsentStoresAttributeDefinitions extends \Google\Service\Resource
{
  /**
   * Creates a new Attribute definition in the parent consent store.
   * (attributeDefinitions.create)
   *
   * @param string $parent Required. The name of the consent store that this
   * Attribute definition belongs to.
   * @param AttributeDefinition $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string attributeDefinitionId Required. The ID of the Attribute
   * definition to create. The string must match the following regex: `_a-
   * zA-Z{0,255}` and must not be a reserved keyword within the Common Expression
   * Language as listed on https://github.com/google/cel-
   * spec/blob/master/doc/langdef.md.
   * @return AttributeDefinition
   */
  public function create($parent, AttributeDefinition $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AttributeDefinition::class);
  }
  /**
   * Deletes the specified Attribute definition. Fails if the Attribute definition
   * is referenced by any User data mapping, or the latest revision of any
   * Consent. (attributeDefinitions.delete)
   *
   * @param string $name Required. The resource name of the Attribute definition
   * to delete. To preserve referential integrity, Attribute definitions
   * referenced by a User data mapping or the latest revision of a Consent cannot
   * be deleted.
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
   * Gets the specified Attribute definition. (attributeDefinitions.get)
   *
   * @param string $name Required. The resource name of the Attribute definition
   * to get.
   * @param array $optParams Optional parameters.
   * @return AttributeDefinition
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AttributeDefinition::class);
  }
  /**
   * Lists the Attribute definitions in the specified consent store. (attributeDef
   * initions.listProjectsLocationsDatasetsConsentStoresAttributeDefinitions)
   *
   * @param string $parent Required. Name of the consent store to retrieve
   * Attribute definitions from.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Restricts the attributes returned to those
   * matching a filter. The only field available for filtering is `category`. For
   * example, `filter=category=\"REQUEST\"`.
   * @opt_param int pageSize Optional. Limit on the number of Attribute
   * definitions to return in a single response. If not specified, 100 is used.
   * May not be larger than 1000.
   * @opt_param string pageToken Optional. Token to retrieve the next page of
   * results or empty to get the first page.
   * @return ListAttributeDefinitionsResponse
   */
  public function listProjectsLocationsDatasetsConsentStoresAttributeDefinitions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAttributeDefinitionsResponse::class);
  }
  /**
   * Updates the specified Attribute definition. (attributeDefinitions.patch)
   *
   * @param string $name Resource name of the Attribute definition, of the form `p
   * rojects/{project_id}/locations/{location_id}/datasets/{dataset_id}/consentSto
   * res/{consent_store_id}/attributeDefinitions/{attribute_definition_id}`.
   * Cannot be changed after creation.
   * @param AttributeDefinition $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask that applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `description`, `allowed_values`, `consent_default_values` and
   * `data_mapping_default_value` fields can be updated. The updated
   * `allowed_values` must contain all values from the previous `allowed_values`.
   * @return AttributeDefinition
   */
  public function patch($name, AttributeDefinition $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], AttributeDefinition::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDatasetsConsentStoresAttributeDefinitions::class, 'Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStoresAttributeDefinitions');
