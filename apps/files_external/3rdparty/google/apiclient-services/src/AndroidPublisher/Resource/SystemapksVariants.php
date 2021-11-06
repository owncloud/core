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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\SystemApksListResponse;
use Google\Service\AndroidPublisher\Variant;

/**
 * The "variants" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $variants = $androidpublisherService->variants;
 *  </code>
 */
class SystemapksVariants extends \Google\Service\Resource
{
  /**
   * Creates an APK which is suitable for inclusion in a system image from an
   * already uploaded Android App Bundle. (variants.create)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param Variant $postBody
   * @param array $optParams Optional parameters.
   * @return Variant
   */
  public function create($packageName, $versionCode, Variant $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'versionCode' => $versionCode, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Variant::class);
  }
  /**
   * Downloads a previously created system APK which is suitable for inclusion in
   * a system image. (variants.download)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param string $variantId The ID of a previously created system APK variant.
   * @param array $optParams Optional parameters.
   */
  public function download($packageName, $versionCode, $variantId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'versionCode' => $versionCode, 'variantId' => $variantId];
    $params = array_merge($params, $optParams);
    return $this->call('download', [$params]);
  }
  /**
   * Returns a previously created system APK variant. (variants.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param string $variantId The ID of a previously created system APK variant.
   * @param array $optParams Optional parameters.
   * @return Variant
   */
  public function get($packageName, $versionCode, $variantId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'versionCode' => $versionCode, 'variantId' => $variantId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Variant::class);
  }
  /**
   * Returns the list of previously created system APK variants.
   * (variants.listSystemapksVariants)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param array $optParams Optional parameters.
   * @return SystemApksListResponse
   */
  public function listSystemapksVariants($packageName, $versionCode, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'versionCode' => $versionCode];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SystemApksListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SystemapksVariants::class, 'Google_Service_AndroidPublisher_Resource_SystemapksVariants');
