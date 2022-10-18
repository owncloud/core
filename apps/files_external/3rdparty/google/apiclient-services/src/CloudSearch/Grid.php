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

class Grid extends \Google\Collection
{
  protected $collection_key = 'items';
  protected $borderStyleType = BorderStyle::class;
  protected $borderStyleDataType = '';
  protected $itemsType = GridItem::class;
  protected $itemsDataType = 'array';
  /**
   * @var int
   */
  public $numColumns;
  protected $onClickType = OnClick::class;
  protected $onClickDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param BorderStyle
   */
  public function setBorderStyle(BorderStyle $borderStyle)
  {
    $this->borderStyle = $borderStyle;
  }
  /**
   * @return BorderStyle
   */
  public function getBorderStyle()
  {
    return $this->borderStyle;
  }
  /**
   * @param GridItem[]
   */
  public function setItems($items)
  {
    $this->items = $items;
  }
  /**
   * @return GridItem[]
   */
  public function getItems()
  {
    return $this->items;
  }
  /**
   * @param int
   */
  public function setNumColumns($numColumns)
  {
    $this->numColumns = $numColumns;
  }
  /**
   * @return int
   */
  public function getNumColumns()
  {
    return $this->numColumns;
  }
  /**
   * @param OnClick
   */
  public function setOnClick(OnClick $onClick)
  {
    $this->onClick = $onClick;
  }
  /**
   * @return OnClick
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
class_alias(Grid::class, 'Google_Service_CloudSearch_Grid');
