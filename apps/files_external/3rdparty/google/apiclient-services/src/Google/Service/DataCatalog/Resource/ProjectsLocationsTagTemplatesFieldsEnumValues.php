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
 * The "enumValues" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $enumValues = $datacatalogService->enumValues;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_ProjectsLocationsTagTemplatesFieldsEnumValues extends Google_Service_Resource
{
  /**
   * Renames an enum value in a tag template. The enum values have to be unique
   * within one enum field. Thus, an enum value cannot be renamed with a name used
   * in any other enum value within the same enum field. (enumValues.rename)
   *
   * @param string $name Required. The name of the enum field value. Example: * pr
   * ojects/{project_id}/locations/{location}/tagTemplates/{tag_template_id}/field
   * s/{tag_template_field_id}/enumValues/{enum_value_display_name}
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1RenameTagTemplateFieldEnumValueRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField
   */
  public function rename($name, Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1RenameTagTemplateFieldEnumValueRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('rename', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1TagTemplateField");
  }
}
