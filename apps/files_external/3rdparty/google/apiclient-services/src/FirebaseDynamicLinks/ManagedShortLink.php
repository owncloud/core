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

namespace Google\Service\FirebaseDynamicLinks;

class ManagedShortLink extends \Google\Collection
{
  protected $collection_key = 'flaggedAttribute';
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string[]
   */
  public $flaggedAttribute;
  protected $infoType = DynamicLinkInfo::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $link;
  /**
   * @var string
   */
  public $linkName;
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string[]
   */
  public function setFlaggedAttribute($flaggedAttribute)
  {
    $this->flaggedAttribute = $flaggedAttribute;
  }
  /**
   * @return string[]
   */
  public function getFlaggedAttribute()
  {
    return $this->flaggedAttribute;
  }
  /**
   * @param DynamicLinkInfo
   */
  public function setInfo(DynamicLinkInfo $info)
  {
    $this->info = $info;
  }
  /**
   * @return DynamicLinkInfo
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param string
   */
  public function setLink($link)
  {
    $this->link = $link;
  }
  /**
   * @return string
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param string
   */
  public function setLinkName($linkName)
  {
    $this->linkName = $linkName;
  }
  /**
   * @return string
   */
  public function getLinkName()
  {
    return $this->linkName;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedShortLink::class, 'Google_Service_FirebaseDynamicLinks_ManagedShortLink');
