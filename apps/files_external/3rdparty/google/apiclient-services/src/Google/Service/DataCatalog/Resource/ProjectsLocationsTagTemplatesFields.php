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
 * The "fields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $fields = $datacatalogService->fields;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsTagTemplatesFields extends Google_Service_Resource
{
  /**
   * Creates a field in a tag template. The user should enable the Data Catalog
   * API in the project identified by the `parent` parameter (see [Data Catalog
   * Resource Project](https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project) for more information). (fields.create)
   *
   * @param string $parent Required. The name of the project and the template
   * location [region](https://cloud.google.com/data-
   * catalog/docs/concepts/regions).
   *
   * Example:
   *
   * * projects/{project_id}/locations/us-central1/tagTemplates/{tag_template_id}
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tagTemplateFieldId Required. The ID of the tag template
   * field to create. Field ids can contain letters (both uppercase and
   * lowercase), numbers (0-9), underscores (_) and dashes (-). Field IDs must be
   * at least 1 character long and at most 128 characters long. Field IDs must
   * also be unique within their template.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField
   */
  public function create($parent, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField");
  }
  /**
   * Deletes a field in a tag template and all uses of that field. Users should
   * enable the Data Catalog API in the project identified by the `name` parameter
   * (see [Data Catalog Resource Project] (https://cloud.google.com/data-
   * catalog/docs/concepts/resource-project) for more information).
   * (fields.delete)
   *
   * @param string $name Required. The name of the tag template field to delete.
   * Example:
   *
   * * projects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}/f
   * ields/{tag_template_field_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Required. Currently, this field must always be set to
   * `true`. This confirms the deletion of this field from any tags using this
   * field. `force = false` will be supported in the future.
   * @return Google_Service_DataCatalog_DatacatalogEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DataCatalog_DatacatalogEmpty");
  }
  /**
   * Updates a field in a tag template. This method cannot be used to update the
   * field type. Users should enable the Data Catalog API in the project
   * identified by the `name` parameter (see [Data Catalog Resource Project]
   * (https://cloud.google.com/data-catalog/docs/concepts/resource-project) for
   * more information). (fields.patch)
   *
   * @param string $name Required. The name of the tag template field. Example:
   *
   * * projects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}/f
   * ields/{tag_template_field_id}
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The field mask specifies the parts of
   * the template to be updated. Allowed fields:
   *
   *   * `display_name`   * `type.enum_type`   * `is_required`
   *
   * If `update_mask` is not set or empty, all of the allowed fields above will be
   * updated.
   *
   * When updating an enum type, the provided values will be merged with the
   * existing values. Therefore, enum values can only be added, existing enum
   * values cannot be deleted nor renamed. Updating a template field from optional
   * to required is NOT allowed.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField
   */
  public function patch($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField");
  }
  /**
   * Renames a field in a tag template. The user should enable the Data Catalog
   * API in the project identified by the `name` parameter (see [Data Catalog
   * Resource Project](https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project) for more information). (fields.rename)
   *
   * @param string $name Required. The name of the tag template. Example:
   *
   * * projects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}/f
   * ields/{tag_template_field_id}
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1RenameTagTemplateFieldRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField
   */
  public function rename($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1RenameTagTemplateFieldRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rename', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField");
  }
}
