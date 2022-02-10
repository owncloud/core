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

namespace Google\Service\Books;

class VolumeVolumeInfoPanelizationSummary extends \Google\Model
{
  /**
   * @var bool
   */
  public $containsEpubBubbles;
  /**
   * @var bool
   */
  public $containsImageBubbles;
  /**
   * @var string
   */
  public $epubBubbleVersion;
  /**
   * @var string
   */
  public $imageBubbleVersion;

  /**
   * @param bool
   */
  public function setContainsEpubBubbles($containsEpubBubbles)
  {
    $this->containsEpubBubbles = $containsEpubBubbles;
  }
  /**
   * @return bool
   */
  public function getContainsEpubBubbles()
  {
    return $this->containsEpubBubbles;
  }
  /**
   * @param bool
   */
  public function setContainsImageBubbles($containsImageBubbles)
  {
    $this->containsImageBubbles = $containsImageBubbles;
  }
  /**
   * @return bool
   */
  public function getContainsImageBubbles()
  {
    return $this->containsImageBubbles;
  }
  /**
   * @param string
   */
  public function setEpubBubbleVersion($epubBubbleVersion)
  {
    $this->epubBubbleVersion = $epubBubbleVersion;
  }
  /**
   * @return string
   */
  public function getEpubBubbleVersion()
  {
    return $this->epubBubbleVersion;
  }
  /**
   * @param string
   */
  public function setImageBubbleVersion($imageBubbleVersion)
  {
    $this->imageBubbleVersion = $imageBubbleVersion;
  }
  /**
   * @return string
   */
  public function getImageBubbleVersion()
  {
    return $this->imageBubbleVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeVolumeInfoPanelizationSummary::class, 'Google_Service_Books_VolumeVolumeInfoPanelizationSummary');
