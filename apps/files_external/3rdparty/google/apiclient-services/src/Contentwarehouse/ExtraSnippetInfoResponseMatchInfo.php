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

class ExtraSnippetInfoResponseMatchInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $titleMatches;
  /**
   * @var string
   */
  public $urlMatches;
  /**
   * @var string
   */
  public $weightedItems;

  /**
   * @param string
   */
  public function setTitleMatches($titleMatches)
  {
    $this->titleMatches = $titleMatches;
  }
  /**
   * @return string
   */
  public function getTitleMatches()
  {
    return $this->titleMatches;
  }
  /**
   * @param string
   */
  public function setUrlMatches($urlMatches)
  {
    $this->urlMatches = $urlMatches;
  }
  /**
   * @return string
   */
  public function getUrlMatches()
  {
    return $this->urlMatches;
  }
  /**
   * @param string
   */
  public function setWeightedItems($weightedItems)
  {
    $this->weightedItems = $weightedItems;
  }
  /**
   * @return string
   */
  public function getWeightedItems()
  {
    return $this->weightedItems;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtraSnippetInfoResponseMatchInfo::class, 'Google_Service_Contentwarehouse_ExtraSnippetInfoResponseMatchInfo');
