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

namespace Google\Service\Dfareporting;

class CreativeClickThroughUrl extends \Google\Model
{
  /**
   * @var string
   */
  public $computedClickThroughUrl;
  /**
   * @var string
   */
  public $customClickThroughUrl;
  /**
   * @var string
   */
  public $landingPageId;

  /**
   * @param string
   */
  public function setComputedClickThroughUrl($computedClickThroughUrl)
  {
    $this->computedClickThroughUrl = $computedClickThroughUrl;
  }
  /**
   * @return string
   */
  public function getComputedClickThroughUrl()
  {
    return $this->computedClickThroughUrl;
  }
  /**
   * @param string
   */
  public function setCustomClickThroughUrl($customClickThroughUrl)
  {
    $this->customClickThroughUrl = $customClickThroughUrl;
  }
  /**
   * @return string
   */
  public function getCustomClickThroughUrl()
  {
    return $this->customClickThroughUrl;
  }
  /**
   * @param string
   */
  public function setLandingPageId($landingPageId)
  {
    $this->landingPageId = $landingPageId;
  }
  /**
   * @return string
   */
  public function getLandingPageId()
  {
    return $this->landingPageId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeClickThroughUrl::class, 'Google_Service_Dfareporting_CreativeClickThroughUrl');
