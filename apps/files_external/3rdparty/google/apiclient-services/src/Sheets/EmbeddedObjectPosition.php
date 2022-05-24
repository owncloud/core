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

class EmbeddedObjectPosition extends \Google\Model
{
  /**
   * @var bool
   */
  public $newSheet;
  protected $overlayPositionType = OverlayPosition::class;
  protected $overlayPositionDataType = '';
  /**
   * @var int
   */
  public $sheetId;

  /**
   * @param bool
   */
  public function setNewSheet($newSheet)
  {
    $this->newSheet = $newSheet;
  }
  /**
   * @return bool
   */
  public function getNewSheet()
  {
    return $this->newSheet;
  }
  /**
   * @param OverlayPosition
   */
  public function setOverlayPosition(OverlayPosition $overlayPosition)
  {
    $this->overlayPosition = $overlayPosition;
  }
  /**
   * @return OverlayPosition
   */
  public function getOverlayPosition()
  {
    return $this->overlayPosition;
  }
  /**
   * @param int
   */
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  /**
   * @return int
   */
  public function getSheetId()
  {
    return $this->sheetId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmbeddedObjectPosition::class, 'Google_Service_Sheets_EmbeddedObjectPosition');
