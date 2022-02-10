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

namespace Google\Service\CloudRun;

class ListMeta extends \Google\Model
{
  /**
   * @var string
   */
  public $continue;
  /**
   * @var string
   */
  public $resourceVersion;
  /**
   * @var string
   */
  public $selfLink;

  /**
   * @param string
   */
  public function setContinue($continue)
  {
    $this->continue = $continue;
  }
  /**
   * @return string
   */
  public function getContinue()
  {
    return $this->continue;
  }
  /**
   * @param string
   */
  public function setResourceVersion($resourceVersion)
  {
    $this->resourceVersion = $resourceVersion;
  }
  /**
   * @return string
   */
  public function getResourceVersion()
  {
    return $this->resourceVersion;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListMeta::class, 'Google_Service_CloudRun_ListMeta');
