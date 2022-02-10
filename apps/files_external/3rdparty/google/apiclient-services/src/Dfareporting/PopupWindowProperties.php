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

class PopupWindowProperties extends \Google\Model
{
  protected $dimensionType = Size::class;
  protected $dimensionDataType = '';
  protected $offsetType = OffsetPosition::class;
  protected $offsetDataType = '';
  /**
   * @var string
   */
  public $positionType;
  /**
   * @var bool
   */
  public $showAddressBar;
  /**
   * @var bool
   */
  public $showMenuBar;
  /**
   * @var bool
   */
  public $showScrollBar;
  /**
   * @var bool
   */
  public $showStatusBar;
  /**
   * @var bool
   */
  public $showToolBar;
  /**
   * @var string
   */
  public $title;

  /**
   * @param Size
   */
  public function setDimension(Size $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return Size
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param OffsetPosition
   */
  public function setOffset(OffsetPosition $offset)
  {
    $this->offset = $offset;
  }
  /**
   * @return OffsetPosition
   */
  public function getOffset()
  {
    return $this->offset;
  }
  /**
   * @param string
   */
  public function setPositionType($positionType)
  {
    $this->positionType = $positionType;
  }
  /**
   * @return string
   */
  public function getPositionType()
  {
    return $this->positionType;
  }
  /**
   * @param bool
   */
  public function setShowAddressBar($showAddressBar)
  {
    $this->showAddressBar = $showAddressBar;
  }
  /**
   * @return bool
   */
  public function getShowAddressBar()
  {
    return $this->showAddressBar;
  }
  /**
   * @param bool
   */
  public function setShowMenuBar($showMenuBar)
  {
    $this->showMenuBar = $showMenuBar;
  }
  /**
   * @return bool
   */
  public function getShowMenuBar()
  {
    return $this->showMenuBar;
  }
  /**
   * @param bool
   */
  public function setShowScrollBar($showScrollBar)
  {
    $this->showScrollBar = $showScrollBar;
  }
  /**
   * @return bool
   */
  public function getShowScrollBar()
  {
    return $this->showScrollBar;
  }
  /**
   * @param bool
   */
  public function setShowStatusBar($showStatusBar)
  {
    $this->showStatusBar = $showStatusBar;
  }
  /**
   * @return bool
   */
  public function getShowStatusBar()
  {
    return $this->showStatusBar;
  }
  /**
   * @param bool
   */
  public function setShowToolBar($showToolBar)
  {
    $this->showToolBar = $showToolBar;
  }
  /**
   * @return bool
   */
  public function getShowToolBar()
  {
    return $this->showToolBar;
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
class_alias(PopupWindowProperties::class, 'Google_Service_Dfareporting_PopupWindowProperties');
