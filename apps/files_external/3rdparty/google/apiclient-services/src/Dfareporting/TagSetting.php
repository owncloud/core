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

class TagSetting extends \Google\Model
{
  /**
   * @var string
   */
  public $additionalKeyValues;
  /**
   * @var bool
   */
  public $includeClickThroughUrls;
  /**
   * @var bool
   */
  public $includeClickTracking;
  /**
   * @var string
   */
  public $keywordOption;

  /**
   * @param string
   */
  public function setAdditionalKeyValues($additionalKeyValues)
  {
    $this->additionalKeyValues = $additionalKeyValues;
  }
  /**
   * @return string
   */
  public function getAdditionalKeyValues()
  {
    return $this->additionalKeyValues;
  }
  /**
   * @param bool
   */
  public function setIncludeClickThroughUrls($includeClickThroughUrls)
  {
    $this->includeClickThroughUrls = $includeClickThroughUrls;
  }
  /**
   * @return bool
   */
  public function getIncludeClickThroughUrls()
  {
    return $this->includeClickThroughUrls;
  }
  /**
   * @param bool
   */
  public function setIncludeClickTracking($includeClickTracking)
  {
    $this->includeClickTracking = $includeClickTracking;
  }
  /**
   * @return bool
   */
  public function getIncludeClickTracking()
  {
    return $this->includeClickTracking;
  }
  /**
   * @param string
   */
  public function setKeywordOption($keywordOption)
  {
    $this->keywordOption = $keywordOption;
  }
  /**
   * @return string
   */
  public function getKeywordOption()
  {
    return $this->keywordOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TagSetting::class, 'Google_Service_Dfareporting_TagSetting');
