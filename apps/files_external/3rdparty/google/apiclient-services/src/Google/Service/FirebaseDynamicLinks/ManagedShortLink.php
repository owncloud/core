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

class Google_Service_FirebaseDynamicLinks_ManagedShortLink extends Google_Collection
{
  protected $collection_key = 'flaggedAttribute';
  public $creationTime;
  public $flaggedAttribute;
  protected $infoType = 'Google_Service_FirebaseDynamicLinks_DynamicLinkInfo';
  protected $infoDataType = '';
  public $link;
  public $linkName;
  public $visibility;

  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setFlaggedAttribute($flaggedAttribute)
  {
    $this->flaggedAttribute = $flaggedAttribute;
  }
  public function getFlaggedAttribute()
  {
    return $this->flaggedAttribute;
  }
  /**
   * @param Google_Service_FirebaseDynamicLinks_DynamicLinkInfo
   */
  public function setInfo(Google_Service_FirebaseDynamicLinks_DynamicLinkInfo $info)
  {
    $this->info = $info;
  }
  /**
   * @return Google_Service_FirebaseDynamicLinks_DynamicLinkInfo
   */
  public function getInfo()
  {
    return $this->info;
  }
  public function setLink($link)
  {
    $this->link = $link;
  }
  public function getLink()
  {
    return $this->link;
  }
  public function setLinkName($linkName)
  {
    $this->linkName = $linkName;
  }
  public function getLinkName()
  {
    return $this->linkName;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}
