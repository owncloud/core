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

namespace Google\Service\CloudRetail\Resource;

use Google\Service\CloudRetail\GoogleCloudRetailV2AddCatalogAttributeRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2AttributesConfig;
use Google\Service\CloudRetail\GoogleCloudRetailV2RemoveCatalogAttributeRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2ReplaceCatalogAttributeRequest;

/**
 * The "attributesConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google\Service\CloudRetail(...);
 *   $attributesConfig = $retailService->attributesConfig;
 *  </code>
 */
class ProjectsLocationsCatalogsAttributesConfig extends \Google\Service\Resource
{
  /**
   * Adds the specified CatalogAttribute to the AttributesConfig. If the
   * CatalogAttribute to add already exists, an ALREADY_EXISTS error is returned.
   * (attributesConfig.addCatalogAttribute)
   *
   * @param string $attributesConfig Required. Full AttributesConfig resource
   * name. Format: `projects/{project_number}/locations/{location_id}/catalogs/{ca
   * talog_id}/attributesConfig`
   * @param GoogleCloudRetailV2AddCatalogAttributeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2AttributesConfig
   */
  public function addCatalogAttribute($attributesConfig, GoogleCloudRetailV2AddCatalogAttributeRequest $postBody, $optParams = [])
  {
    $params = ['attributesConfig' => $attributesConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addCatalogAttribute', [$params], GoogleCloudRetailV2AttributesConfig::class);
  }
  /**
   * Removes the specified CatalogAttribute from the AttributesConfig. If the
   * CatalogAttribute to remove does not exist, a NOT_FOUND error is returned.
   * (attributesConfig.removeCatalogAttribute)
   *
   * @param string $attributesConfig Required. Full AttributesConfig resource
   * name. Format: `projects/{project_number}/locations/{location_id}/catalogs/{ca
   * talog_id}/attributesConfig`
   * @param GoogleCloudRetailV2RemoveCatalogAttributeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2AttributesConfig
   */
  public function removeCatalogAttribute($attributesConfig, GoogleCloudRetailV2RemoveCatalogAttributeRequest $postBody, $optParams = [])
  {
    $params = ['attributesConfig' => $attributesConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeCatalogAttribute', [$params], GoogleCloudRetailV2AttributesConfig::class);
  }
  /**
   * Replaces the specified CatalogAttribute in the AttributesConfig by updating
   * the catalog attribute with the same CatalogAttribute.key. If the
   * CatalogAttribute to replace does not exist, a NOT_FOUND error is returned.
   * (attributesConfig.replaceCatalogAttribute)
   *
   * @param string $attributesConfig Required. Full AttributesConfig resource
   * name. Format: `projects/{project_number}/locations/{location_id}/catalogs/{ca
   * talog_id}/attributesConfig`
   * @param GoogleCloudRetailV2ReplaceCatalogAttributeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2AttributesConfig
   */
  public function replaceCatalogAttribute($attributesConfig, GoogleCloudRetailV2ReplaceCatalogAttributeRequest $postBody, $optParams = [])
  {
    $params = ['attributesConfig' => $attributesConfig, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replaceCatalogAttribute', [$params], GoogleCloudRetailV2AttributesConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsAttributesConfig::class, 'Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsAttributesConfig');
