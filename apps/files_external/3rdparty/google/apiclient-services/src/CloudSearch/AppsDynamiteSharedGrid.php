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

class AppsDynamiteSharedGrid extends \Google\Collection
{
  protected $collection_key = 'items';
  protected $borderStyleType = AppsDynamiteSharedBorderStyle::class;
  protected $borderStyleDataType = '';
  /**
   * @var int
   */
  public $columnCount;
  protected $itemsType = AppsDynamiteSharedGridGridItem::class;
  protected $itemsDataType = 'array';
  protected $onClickType = AppsDynamiteSharedOnClick::class;
  protected $onClickDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param AppsDynamiteSharedBorderStyle
   */
  public function setBorderStyle(AppsDynamiteSharedBorderStyle $borderStyle)
  {
    $this->borderStyle = $borderStyle;
  }
  /**
   * @return AppsDynamiteSharedBorderStyle
   */
  public function getBorderStyle()
  {
    return $this->borderStyle;
  }
  /**
   * @param int
   */
  public function setColumnCount($columnCount)
  {
    $this->columnCount = $columnCount;
  }
  /**
   * @return int
   */
  public function getColumnCount()
  {
    return $this->columnCount;
  }
  /**
   * @param AppsDynamiteSharedGridGridItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return AppsDynamiteSharedGridGridItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param AppsDynamiteSharedOnClick
   */
  public function setOnClick(AppsDynamiteSharedOnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return AppsDynamiteSharedOnClick
   */
  public function getOnClick()
  {
    return $this->onClick;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsDynamiteSharedGrid::class, 'Google_Service_CloudSearch_AppsDynamiteSharedGrid');
