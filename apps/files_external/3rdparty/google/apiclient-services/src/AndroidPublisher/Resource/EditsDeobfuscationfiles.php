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

use Google\Service\AndroidPublisher\DeobfuscationFilesUploadResponse;

/**
 * The "deobfuscationfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $deobfuscationfiles = $androidpublisherService->deobfuscationfiles;
 *  </code>
 */
class EditsDeobfuscationfiles extends \Google\Service\Resource
{
  /**
   * Uploads a new deobfuscation file and attaches to the specified APK.
   * (deobfuscationfiles.upload)
   *
   * @param string $packageName Unique identifier for the Android app.
   * @param string $editId Unique identifier for this edit.
   * @param int $apkVersionCode The version code of the APK whose Deobfuscation
   * File is being uploaded.
   * @param string $deobfuscationFileType The type of the deobfuscation file.
   * @param array $optParams Optional parameters.
   * @return DeobfuscationFilesUploadResponse
   */
  public function upload($packageName, $editId, $apkVersionCode, $deobfuscationFileType, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'apkVersionCode' => $apkVersionCode, 'deobfuscationFileType' => $deobfuscationFileType];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], DeobfuscationFilesUploadResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsDeobfuscationfiles::class, 'Google_Service_AndroidPublisher_Resource_EditsDeobfuscationfiles');
