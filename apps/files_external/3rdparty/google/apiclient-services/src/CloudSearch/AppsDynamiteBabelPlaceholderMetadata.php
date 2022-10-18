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

class AppsDynamiteBabelPlaceholderMetadata extends \Google\Model
{
  protected $deleteMetadataType = AppsDynamiteBabelPlaceholderMetadataDeleteMetadata::class;
  protected $deleteMetadataDataType = '';
  protected $editMetadataType = AppsDynamiteBabelPlaceholderMetadataEditMetadata::class;
  protected $editMetadataDataType = '';
  protected $hangoutVideoMetadataType = AppsDynamiteBabelPlaceholderMetadataHangoutVideoEventMetadata::class;
  protected $hangoutVideoMetadataDataType = '';

  /**
   * @param AppsDynamiteBabelPlaceholderMetadataDeleteMetadata
   */
  public function setDeleteMetadata(AppsDynamiteBabelPlaceholderMetadataDeleteMetadata $deleteMetadata)
  {
    $this->deleteMetadata = $deleteMetadata;
  }
  /**
   * @return AppsDynamiteBabelPlaceholderMetadataDeleteMetadata
   */
  public function getDeleteMetadata()
  {
    return $this->deleteMetadata;
  }
  /**
   * @param AppsDynamiteBabelPlaceholderMetadataEditMetadata
   */
  public function setEditMetadata(AppsDynamiteBabelPlaceholderMetadataEditMetadata $editMetadata)
  {
    $this->editMetadata = $editMetadata;
  }
  /**
   * @return AppsDynamiteBabelPlaceholderMetadataEditMetadata
   */
  public function getEditMetadata()
  {
    return $this->editMetadata;
  }
  /**
   * @param AppsDynamiteBabelPlaceholderMetadataHangoutVideoEventMetadata
   */
  public function setHangoutVideoMetadata(AppsDynamiteBabelPlaceholderMetadataHangoutVideoEventMetadata $hangoutVideoMetadata)
  {
    $this->hangoutVideoMetadata = $hangoutVideoMetadata;
  }
  /**
   * @return AppsDynamiteBabelPlaceholderMetadataHangoutVideoEventMetadata
   */
  public function getHangoutVideoMetadata()
  {
    return $this->hangoutVideoMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteBabelPlaceholderMetadata::class, 'Google_Service_CloudSearch_AppsDynamiteBabelPlaceholderMetadata');
