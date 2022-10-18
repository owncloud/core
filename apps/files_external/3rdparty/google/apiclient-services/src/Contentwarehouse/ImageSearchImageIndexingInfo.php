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

class ImageSearchImageIndexingInfo extends \Google\Collection
{
  protected $collection_key = 'selectedNotIndexedImageLink';
  protected $imageLinkSelectionInfoType = ImageSearchImageSelectionInfo::class;
  protected $imageLinkSelectionInfoDataType = 'array';
  protected $rejectedNotIndexedImageLinkType = ImageSearchUnindexedImageLink::class;
  protected $rejectedNotIndexedImageLinkDataType = 'array';
  protected $selectedNotIndexedImageLinkType = ImageSearchUnindexedImageLink::class;
  protected $selectedNotIndexedImageLinkDataType = 'array';

  /**
   * @param ImageSearchImageSelectionInfo[]
   */
  public function setImageLinkSelectionInfo($imageLinkSelectionInfo)
  {
    $this->imageLinkSelectionInfo = $imageLinkSelectionInfo;
  }
  /**
   * @return ImageSearchImageSelectionInfo[]
   */
  public function getImageLinkSelectionInfo()
  {
    return $this->imageLinkSelectionInfo;
  }
  /**
   * @param ImageSearchUnindexedImageLink[]
   */
  public function setRejectedNotIndexedImageLink($rejectedNotIndexedImageLink)
  {
    $this->rejectedNotIndexedImageLink = $rejectedNotIndexedImageLink;
  }
  /**
   * @return ImageSearchUnindexedImageLink[]
   */
  public function getRejectedNotIndexedImageLink()
  {
    return $this->rejectedNotIndexedImageLink;
  }
  /**
   * @param ImageSearchUnindexedImageLink[]
   */
  public function setSelectedNotIndexedImageLink($selectedNotIndexedImageLink)
  {
    $this->selectedNotIndexedImageLink = $selectedNotIndexedImageLink;
  }
  /**
   * @return ImageSearchUnindexedImageLink[]
   */
  public function getSelectedNotIndexedImageLink()
  {
    return $this->selectedNotIndexedImageLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageSearchImageIndexingInfo::class, 'Google_Service_Contentwarehouse_ImageSearchImageIndexingInfo');
