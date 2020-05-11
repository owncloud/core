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
 * The "icons" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudprivatecatalogproducerService = new Google_Service_CloudPrivateCatalogProducer(...);
 *   $icons = $cloudprivatecatalogproducerService->icons;
 *  </code>
 */
class Google_Service_CloudPrivateCatalogProducer_Resource_CatalogsProductsIcons extends Google_Service_Resource
{
  /**
   * Creates an Icon instance under a given Product. If Product only has a default
   * icon, a new Icon instance is created and associated with the given Product.
   * If Product already has a non-default icon, the action creates a new Icon
   * instance, associates the newly created Icon with the given Product and
   * deletes the old icon. (icons.upload)
   *
   * @param string $product The resource name of the product.
   * @param Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1UploadIconRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudPrivateCatalogProducer_GoogleProtobufEmpty
   */
  public function upload($product, Google_Service_CloudPrivateCatalogProducer_GoogleCloudPrivatecatalogproducerV1beta1UploadIconRequest $postBody, $optParams = array())
  {
    $params = array('product' => $product, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('upload', array($params), "Google_Service_CloudPrivateCatalogProducer_GoogleProtobufEmpty");
  }
}
