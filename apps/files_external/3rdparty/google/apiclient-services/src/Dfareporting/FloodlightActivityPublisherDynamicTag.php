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

class FloodlightActivityPublisherDynamicTag extends \Google\Model
{
  /**
   * @var bool
   */
  public $clickThrough;
  /**
   * @var string
   */
  public $directorySiteId;
  protected $dynamicTagType = FloodlightActivityDynamicTag::class;
  protected $dynamicTagDataType = '';
  /**
   * @var string
   */
  public $siteId;
  protected $siteIdDimensionValueType = DimensionValue::class;
  protected $siteIdDimensionValueDataType = '';
  /**
   * @var bool
   */
  public $viewThrough;

  /**
   * @param bool
   */
  public function setClickThrough($clickThrough)
  {
    $this->clickThrough = $clickThrough;
  }
  /**
   * @return bool
   */
  public function getClickThrough()
  {
    return $this->clickThrough;
  }
  /**
   * @param string
   */
  public function setDirectorySiteId($directorySiteId)
  {
    $this->directorySiteId = $directorySiteId;
  }
  /**
   * @return string
   */
  public function getDirectorySiteId()
  {
    return $this->directorySiteId;
  }
  /**
   * @param FloodlightActivityDynamicTag
   */
  public function setDynamicTag(FloodlightActivityDynamicTag $dynamicTag)
  {
    $this->dynamicTag = $dynamicTag;
  }
  /**
   * @return FloodlightActivityDynamicTag
   */
  public function getDynamicTag()
  {
    return $this->dynamicTag;
  }
  /**
   * @param string
   */
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  /**
   * @return string
   */
  public function getSiteId()
  {
    return $this->siteId;
  }
  /**
   * @param DimensionValue
   */
  public function setSiteIdDimensionValue(DimensionValue $siteIdDimensionValue)
  {
    $this->siteIdDimensionValue = $siteIdDimensionValue;
  }
  /**
   * @return DimensionValue
   */
  public function getSiteIdDimensionValue()
  {
    return $this->siteIdDimensionValue;
  }
  /**
   * @param bool
   */
  public function setViewThrough($viewThrough)
  {
    $this->viewThrough = $viewThrough;
  }
  /**
   * @return bool
   */
  public function getViewThrough()
  {
    return $this->viewThrough;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightActivityPublisherDynamicTag::class, 'Google_Service_Dfareporting_FloodlightActivityPublisherDynamicTag');
