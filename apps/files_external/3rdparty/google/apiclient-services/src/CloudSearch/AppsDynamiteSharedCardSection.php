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

class AppsDynamiteSharedCardSection extends \Google\Collection
{
  protected $collection_key = 'widgets';
  /**
   * @var bool
   */
  public $collapsible;
  /**
   * @var string
   */
  public $header;
  /**
   * @var int
   */
  public $uncollapsibleWidgetsCount;
  protected $widgetsType = AppsDynamiteSharedWidget::class;
  protected $widgetsDataType = 'array';

  /**
   * @param bool
   */
  public function setCollapsible($collapsible)
  {
    $this->collapsible = $collapsible;
  }
  /**
   * @return bool
   */
  public function getCollapsible()
  {
    return $this->collapsible;
  }
  /**
   * @param string
   */
  public function setHeader($header)
  {
    $this->header = $header;
  }
  /**
   * @return string
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param int
   */
  public function setUncollapsibleWidgetsCount($uncollapsibleWidgetsCount)
  {
    $this->uncollapsibleWidgetsCount = $uncollapsibleWidgetsCount;
  }
  /**
   * @return int
   */
  public function getUncollapsibleWidgetsCount()
  {
    return $this->uncollapsibleWidgetsCount;
  }
  /**
   * @param AppsDynamiteSharedWidget[]
   */
  public function setWidgets($widgets)
  {
    $this->widgets = $widgets;
  }
  /**
   * @return AppsDynamiteSharedWidget[]
   */
  public function getWidgets()
  {
    return $this->widgets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedCardSection::class, 'Google_Service_CloudSearch_AppsDynamiteSharedCardSection');
