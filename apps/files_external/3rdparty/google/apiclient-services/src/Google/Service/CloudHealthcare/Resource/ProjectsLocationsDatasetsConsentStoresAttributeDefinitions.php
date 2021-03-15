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
 * The "attributeDefinitions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $attributeDefinitions = $healthcareService->attributeDefinitions;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsConsentStoresAttributeDefinitions extends Google_Service_Resource
{
  /**
   * Creates a new Attribute definition in the parent consent store.
   * (attributeDefinitions.create)
   *
   * @param string $parent Required. The name of the consent store that this
   * Attribute definition belongs to.
   * @param Google_Service_CloudHealthcare_AttributeDefinition $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string attributeDefinitionId Required. The ID of the Attribute
   * definition to create. The string must match the following regex: `_a-
   * zA-Z{0,255}` and must not be a reserved keyword within the Common Expression
   * Language as listed on https://github.com/google/cel-
   * spec/blob/master/doc/langdef.md.
   * @return Google_Service_CloudHealthcare_AttributeDefinition
   */
  public function create($parent, Google_Service_CloudHealthcare_AttributeDefinition $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudHealthcare_AttributeDefinition");
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
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * Gets the specified Attribute definition. (attributeDefinitions.get)
   *
   * @param string $name Required. The resource name of the Attribute definition
   * to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_AttributeDefinition
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudHealthcare_AttributeDefinition");
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
   * @return Google_Service_CloudHealthcare_ListAttributeDefinitionsResponse
   */
  public function listProjectsLocationsDatasetsConsentStoresAttributeDefinitions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudHealthcare_ListAttributeDefinitionsResponse");
  }
  /**
   * Updates the specified Attribute definition. (attributeDefinitions.patch)
   *
   * @param string $name Resource name of the Attribute definition, of the form `p
   * rojects/{project_id}/locations/{location_id}/datasets/{dataset_id}/consentSto
   * res/{consent_store_id}/attributeDefinitions/{attribute_definition_id}`.
   * Cannot be changed after creation.
   * @param Google_Service_CloudHealthcare_AttributeDefinition $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The update mask that applies to the
   * resource. For the `FieldMask` definition, see https://developers.google.com
   * /protocol-buffers/docs/reference/google.protobuf#fieldmask. Only the
   * `description`, `allowed_values`, `consent_default_values` and
   * `data_mapping_default_value` fields can be updated. The updated
   * `allowed_values` must contain all values from the previous `allowed_values`.
   * @return Google_Service_CloudHealthcare_AttributeDefinition
   */
  public function patch($name, Google_Service_CloudHealthcare_AttributeDefinition $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudHealthcare_AttributeDefinition");
  }
}
