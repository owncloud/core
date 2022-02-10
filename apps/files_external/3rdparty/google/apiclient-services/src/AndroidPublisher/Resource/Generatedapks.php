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

use Google\Service\AndroidPublisher\GeneratedApksListResponse;

/**
 * The "generatedapks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $generatedapks = $androidpublisherService->generatedapks;
 *  </code>
 */
class Generatedapks extends \Google\Service\Resource
{
  /**
   * Downloads a single signed APK generated from an app bundle.
   * (generatedapks.download)
   *
   * @param string $packageName Package name of the app.
   * @param int $versionCode Version code of the app bundle.
   * @param string $downloadId Download ID, which uniquely identifies the APK to
   * download. Can be obtained from the response of `generatedapks.list` method.
   * @param array $optParams Optional parameters.
   */
  public function download($packageName, $versionCode, $downloadId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'versionCode' => $versionCode, 'downloadId' => $downloadId];
    $params = array_merge($params, $optParams);
    return $this->call('download', [$params]);
  }
  /**
   * Returns download metadata for all APKs that were generated from a given app
   * bundle. (generatedapks.listGeneratedapks)
   *
   * @param string $packageName Package name of the app.
   * @param int $versionCode Version code of the app bundle.
   * @param array $optParams Optional parameters.
   * @return GeneratedApksListResponse
   */
  public function listGeneratedapks($packageName, $versionCode, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'versionCode' => $versionCode];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GeneratedApksListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Generatedapks::class, 'Google_Service_AndroidPublisher_Resource_Generatedapks');
