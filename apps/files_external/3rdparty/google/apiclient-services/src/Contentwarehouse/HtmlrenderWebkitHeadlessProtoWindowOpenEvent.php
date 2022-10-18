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

class HtmlrenderWebkitHeadlessProtoWindowOpenEvent extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowed;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $windowFeatures;
  /**
   * @var string
   */
  public $windowName;

  /**
   * @param bool
   */
  public function setAllowed($allowed)
  {
    $this->allowed = $allowed;
  }
  /**
   * @return bool
   */
  public function getAllowed()
  {
    return $this->allowed;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param string
   */
  public function setWindowFeatures($windowFeatures)
  {
    $this->windowFeatures = $windowFeatures;
  }
  /**
   * @return string
   */
  public function getWindowFeatures()
  {
    return $this->windowFeatures;
  }
  /**
   * @param string
   */
  public function setWindowName($windowName)
  {
    $this->windowName = $windowName;
  }
  /**
   * @return string
   */
  public function getWindowName()
  {
    return $this->windowName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoWindowOpenEvent::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoWindowOpenEvent');
