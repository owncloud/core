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

class SocialMetaTagInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $socialDescription;
  /**
   * @var string
   */
  public $socialImageLink;
  /**
   * @var string
   */
  public $socialTitle;

  /**
   * @param string
   */
  public function setSocialDescription($socialDescription)
  {
    $this->socialDescription = $socialDescription;
  }
  /**
   * @return string
   */
  public function getSocialDescription()
  {
    return $this->socialDescription;
  }
  /**
   * @param string
   */
  public function setSocialImageLink($socialImageLink)
  {
    $this->socialImageLink = $socialImageLink;
  }
  /**
   * @return string
   */
  public function getSocialImageLink()
  {
    return $this->socialImageLink;
  }
  /**
   * @param string
   */
  public function setSocialTitle($socialTitle)
  {
    $this->socialTitle = $socialTitle;
  }
  /**
   * @return string
   */
  public function getSocialTitle()
  {
    return $this->socialTitle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SocialMetaTagInfo::class, 'Google_Service_FirebaseDynamicLinks_SocialMetaTagInfo');
