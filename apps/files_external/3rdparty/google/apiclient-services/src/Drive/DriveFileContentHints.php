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

namespace Google\Service\Drive;

class DriveFileContentHints extends \Google\Model
{
  /**
   * @var string
   */
  public $indexableText;
  protected $thumbnailType = DriveFileContentHintsThumbnail::class;
  protected $thumbnailDataType = '';

  /**
   * @param string
   */
  public function setIndexableText($indexableText)
  {
    $this->indexableText = $indexableText;
  }
  /**
   * @return string
   */
  public function getIndexableText()
  {
    return $this->indexableText;
  }
  /**
   * @param DriveFileContentHintsThumbnail
   */
  public function setThumbnail(DriveFileContentHintsThumbnail $thumbnail)
  {
    $this->thumbnail = $thumbnail;
  }
  /**
   * @return DriveFileContentHintsThumbnail
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFileContentHints::class, 'Google_Service_Drive_DriveFileContentHints');
