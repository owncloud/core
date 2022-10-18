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

namespace Google\Service\CloudSearch;

class AppsDynamiteDriveMetadataLegacyUploadMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $legacyUniqueId;
  protected $uploadMetadataType = AppsDynamiteUploadMetadata::class;
  protected $uploadMetadataDataType = '';

  /**
   * @param string
   */
  public function setLegacyUniqueId($legacyUniqueId)
  {
    $this->legacyUniqueId = $legacyUniqueId;
  }
  /**
   * @return string
   */
  public function getLegacyUniqueId()
  {
    return $this->legacyUniqueId;
  }
  /**
   * @param AppsDynamiteUploadMetadata
   */
  public function setUploadMetadata(AppsDynamiteUploadMetadata $uploadMetadata)
  {
    $this->uploadMetadata = $uploadMetadata;
  }
  /**
   * @return AppsDynamiteUploadMetadata
   */
  public function getUploadMetadata()
  {
    return $this->uploadMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteDriveMetadataLegacyUploadMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteDriveMetadataLegacyUploadMetadata');
