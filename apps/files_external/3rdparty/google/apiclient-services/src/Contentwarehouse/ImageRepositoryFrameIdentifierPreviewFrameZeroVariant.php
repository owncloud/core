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

namespace Google\Service\Contentwarehouse;

class ImageRepositoryFrameIdentifierPreviewFrameZeroVariant extends \Google\Model
{
  /**
   * @var string
   */
  public $previewLength;
  protected $xtagListType = ImageRepositoryApiXtagList::class;
  protected $xtagListDataType = '';

  /**
   * @param string
   */
  public function setPreviewLength($previewLength)
  {
    $this->previewLength = $previewLength;
  }
  /**
   * @return string
   */
  public function getPreviewLength()
  {
    return $this->previewLength;
  }
  /**
   * @param ImageRepositoryApiXtagList
   */
  public function setXtagList(ImageRepositoryApiXtagList $xtagList)
  {
    $this->xtagList = $xtagList;
  }
  /**
   * @return ImageRepositoryApiXtagList
   */
  public function getXtagList()
  {
    return $this->xtagList;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageRepositoryFrameIdentifierPreviewFrameZeroVariant::class, 'Google_Service_Contentwarehouse_ImageRepositoryFrameIdentifierPreviewFrameZeroVariant');
