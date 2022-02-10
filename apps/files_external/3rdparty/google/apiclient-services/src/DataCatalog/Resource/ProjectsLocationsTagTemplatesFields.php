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

namespace Google\Service\DataCatalog\Resource;

use Google\Service\DataCatalog\DatacatalogEmpty;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1RenameTagTemplateFieldRequest;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1TagTemplateField;

/**
 * The "fields" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $fields = $datacatalogService->fields;
 *  </code>
 */
class ProjectsLocationsTagTemplatesFields extends \Google\Service\Resource
{
  /**
   * Creates a field in a tag template. You must enable the Data Catalog API in
   * the project identified by the `parent` parameter. For more information, see
   * [Data Catalog resource project](https://cloud.google.com/data-
   * catalog/docs/concepts/resource-project). (fields.create)
   *
   * @param string $parent Required. The name of the project and the template
   * location [region](https://cloud.google.com/data-
   * catalog/docs/concepts/regions).
   * @param GoogleCloudDatacatalogV1TagTemplateField $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tagTemplateFieldId Required. The ID of the tag template
   * field to create. Note: Adding a required field to an existing template is
   * *not* allowed. Field IDs can contain letters (both uppercase and lowercase),
   * numbers (0-9), underscores (_) and dashes (-). Field IDs must be at least 1
   * character long and at most 128 characters long. Field IDs must also be unique
   * within their template.
   * @return GoogleCloudDatacatalogV1TagTemplateField
   */
  public function create($parent, GoogleCloudDatacatalogV1TagTemplateField $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDatacatalogV1TagTemplateField::class);
  }
  /**
   * Deletes a field in a tag template and all uses of this field from the tags
   * based on this template. You must enable the Data Catalog API in the project
   * identified by the `name` parameter. For more information, see [Data Catalog
   * resource project](https://cloud.google.com/data-catalog/docs/concepts
   * /resource-project). (fields.delete)
   *
   * @param string $name Required. The name of the tag template field to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Required. If true, deletes this field from any tags
   * that use it. Currently, `true` is the only supported value.
   * @return DatacatalogEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DatacatalogEmpty::class);
  }
  /**
   * Updates a field in a tag template. You can't update the field type with this
   * method. You must enable the Data Catalog API in the project identified by the
   * `name` parameter. For more information, see [Data Catalog resource
   * project](https://cloud.google.com/data-catalog/docs/concepts/resource-
   * project). (fields.patch)
   *
   * @param string $name Required. The name of the tag template field.
   * @param GoogleCloudDatacatalogV1TagTemplateField $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Names of fields whose values to
   * overwrite on an individual field of a tag template. The following fields are
   * modifiable: * `display_name` * `type.enum_type` * `is_required` If this
   * parameter is absent or empty, all modifiable fields are overwritten. If such
   * fields are non-required and omitted in the request body, their values are
   * emptied with one exception: when updating an enum type, the provided values
   * are merged with the existing values. Therefore, enum values can only be
   * added, existing enum values cannot be deleted or renamed. Additionally,
   * updating a template field from optional to required is *not* allowed.
   * @return GoogleCloudDatacatalogV1TagTemplateField
   */
  public function patch($name, GoogleCloudDatacatalogV1TagTemplateField $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDatacatalogV1TagTemplateField::class);
  }
  /**
   * Renames a field in a tag template. You must enable the Data Catalog API in
   * the project identified by the `name` parameter. For more information, see
   * [Data Catalog resource project] (https://cloud.google.com/data-
   * catalog/docs/concepts/resource-project). (fields.rename)
   *
   * @param string $name Required. The name of the tag template field.
   * @param GoogleCloudDatacatalogV1RenameTagTemplateFieldRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1TagTemplateField
   */
  public function rename($name, GoogleCloudDatacatalogV1RenameTagTemplateFieldRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rename', [$params], GoogleCloudDatacatalogV1TagTemplateField::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTagTemplatesFields::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsTagTemplatesFields');
