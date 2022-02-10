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

namespace Google\Service\Sheets;

class OverlayPosition extends \Google\Model
{
  protected $anchorCellType = GridCoordinate::class;
  protected $anchorCellDataType = '';
  /**
   * @var int
   */
  public $heightPixels;
  /**
   * @var int
   */
  public $offsetXPixels;
  /**
   * @var int
   */
  public $offsetYPixels;
  /**
   * @var int
   */
  public $widthPixels;

  /**
   * @param GridCoordinate
   */
  public function setAnchorCell(GridCoordinate $anchorCell)
  {
    $this->anchorCell = $anchorCell;
  }
  /**
   * @return GridCoordinate
   */
  public function getAnchorCell()
  {
    return $this->anchorCell;
  }
  /**
   * @param int
   */
  public function setHeightPixels($heightPixels)
  {
    $this->heightPixels = $heightPixels;
  }
  /**
   * @return int
   */
  public function getHeightPixels()
  {
    return $this->heightPixels;
  }
  /**
   * @param int
   */
  public function setOffsetXPixels($offsetXPixels)
  {
    $this->offsetXPixels = $offsetXPixels;
  }
  /**
   * @return int
   */
  public function getOffsetXPixels()
  {
    return $this->offsetXPixels;
  }
  /**
   * @param int
   */
  public function setOffsetYPixels($offsetYPixels)
  {
    $this->offsetYPixels = $offsetYPixels;
  }
  /**
   * @return int
   */
  public function getOffsetYPixels()
  {
    return $this->offsetYPixels;
  }
  /**
   * @param int
   */
  public function setWidthPixels($widthPixels)
  {
    $this->widthPixels = $widthPixels;
  }
  /**
   * @return int
   */
  public function getWidthPixels()
  {
    return $this->widthPixels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OverlayPosition::class, 'Google_Service_Sheets_OverlayPosition');
