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

class OpenLink extends \Google\Model
{
  /**
   * @var string
   */
  public $loadIndicator;
  /**
   * @var string
   */
  public $onClose;
  /**
   * @var string
   */
  public $openAs;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setLoadIndicator($loadIndicator)
  {
    $this->loadIndicator = $loadIndicator;
  }
  /**
   * @return string
   */
  public function getLoadIndicator()
  {
    return $this->loadIndicator;
  }
  /**
   * @param string
   */
  public function setOnClose($onClose)
  {
    $this->onClose = $onClose;
  }
  /**
   * @return string
   */
  public function getOnClose()
  {
    return $this->onClose;
  }
  /**
   * @param string
   */
  public function setOpenAs($openAs)
  {
    $this->openAs = $openAs;
  }
  /**
   * @return string
   */
  public function getOpenAs()
  {
    return $this->openAs;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OpenLink::class, 'Google_Service_CloudSearch_OpenLink');
