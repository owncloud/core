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

class BabelPlaceholderMetadata extends \Google\Model
{
  protected $deleteMetadataType = DeleteMetadata::class;
  protected $deleteMetadataDataType = '';
  protected $editMetadataType = EditMetadata::class;
  protected $editMetadataDataType = '';
  protected $hangoutVideoMetadataType = HangoutVideoEventMetadata::class;
  protected $hangoutVideoMetadataDataType = '';

  /**
   * @param DeleteMetadata
   */
  public function setDeleteMetadata(DeleteMetadata $deleteMetadata)
  {
    $this->deleteMetadata = $deleteMetadata;
  }
  /**
   * @return DeleteMetadata
   */
  public function getDeleteMetadata()
  {
    return $this->deleteMetadata;
  }
  /**
   * @param EditMetadata
   */
  public function setEditMetadata(EditMetadata $editMetadata)
  {
    $this->editMetadata = $editMetadata;
  }
  /**
   * @return EditMetadata
   */
  public function getEditMetadata()
  {
    return $this->editMetadata;
  }
  /**
   * @param HangoutVideoEventMetadata
   */
  public function setHangoutVideoMetadata(HangoutVideoEventMetadata $hangoutVideoMetadata)
  {
    $this->hangoutVideoMetadata = $hangoutVideoMetadata;
  }
  /**
   * @return HangoutVideoEventMetadata
   */
  public function getHangoutVideoMetadata()
  {
    return $this->hangoutVideoMetadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BabelPlaceholderMetadata::class, 'Google_Service_CloudSearch_BabelPlaceholderMetadata');
