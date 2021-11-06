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

use Google\Service\DataCatalog\GoogleCloudDatacatalogV1RenameTagTemplateFieldEnumValueRequest;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1TagTemplateField;

/**
 * The "enumValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $enumValues = $datacatalogService->enumValues;
 *  </code>
 */
class ProjectsLocationsTagTemplatesFieldsEnumValues extends \Google\Service\Resource
{
  /**
   * Renames an enum value in a tag template. Within a single enum field, enum
   * values must be unique. (enumValues.rename)
   *
   * @param string $name Required. The name of the enum field value.
   * @param GoogleCloudDatacatalogV1RenameTagTemplateFieldEnumValueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1TagTemplateField
   */
  public function rename($name, GoogleCloudDatacatalogV1RenameTagTemplateFieldEnumValueRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('rename', [$params], GoogleCloudDatacatalogV1TagTemplateField::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTagTemplatesFieldsEnumValues::class, 'Google_Service_DataCatalog_Resource_ProjectsLocationsTagTemplatesFieldsEnumValues');
