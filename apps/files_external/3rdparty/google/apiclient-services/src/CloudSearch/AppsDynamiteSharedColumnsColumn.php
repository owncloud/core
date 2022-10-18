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

class AppsDynamiteSharedColumnsColumn extends \Google\Collection
{
  protected $collection_key = 'widgets';
  /**
   * @var string
   */
  public $horizontalAlignment;
  /**
   * @var string
   */
  public $horizontalSizeStyle;
  /**
   * @var string
   */
  public $verticalAlignment;
  protected $widgetsType = AppsDynamiteSharedColumnsColumnWidgets::class;
  protected $widgetsDataType = 'array';

  /**
   * @param string
   */
  public function setHorizontalAlignment($horizontalAlignment)
  {
    $this->horizontalAlignment = $horizontalAlignment;
  }
  /**
   * @return string
   */
  public function getHorizontalAlignment()
  {
    return $this->horizontalAlignment;
  }
  /**
   * @param string
   */
  public function setHorizontalSizeStyle($horizontalSizeStyle)
  {
    $this->horizontalSizeStyle = $horizontalSizeStyle;
  }
  /**
   * @return string
   */
  public function getHorizontalSizeStyle()
  {
    return $this->horizontalSizeStyle;
  }
  /**
   * @param string
   */
  public function setVerticalAlignment($verticalAlignment)
  {
    $this->verticalAlignment = $verticalAlignment;
  }
  /**
   * @return string
   */
  public function getVerticalAlignment()
  {
    return $this->verticalAlignment;
  }
  /**
   * @param AppsDynamiteSharedColumnsColumnWidgets[]
   */
  public function setWidgets($widgets)
  {
    $this->widgets = $widgets;
  }
  /**
   * @return AppsDynamiteSharedColumnsColumnWidgets[]
   */
  public function getWidgets()
  {
    return $this->widgets;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedColumnsColumn::class, 'Google_Service_CloudSearch_AppsDynamiteSharedColumnsColumn');
