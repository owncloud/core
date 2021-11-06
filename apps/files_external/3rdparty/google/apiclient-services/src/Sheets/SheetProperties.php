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

class SheetProperties extends \Google\Model
{
  protected $dataSourceSheetPropertiesType = DataSourceSheetProperties::class;
  protected $dataSourceSheetPropertiesDataType = '';
  protected $gridPropertiesType = GridProperties::class;
  protected $gridPropertiesDataType = '';
  public $hidden;
  public $index;
  public $rightToLeft;
  public $sheetId;
  public $sheetType;
  protected $tabColorType = Color::class;
  protected $tabColorDataType = '';
  protected $tabColorStyleType = ColorStyle::class;
  protected $tabColorStyleDataType = '';
  public $title;

  /**
   * @param DataSourceSheetProperties
   */
  public function setDataSourceSheetProperties(DataSourceSheetProperties $dataSourceSheetProperties)
  {
    $this->dataSourceSheetProperties = $dataSourceSheetProperties;
  }
  /**
   * @return DataSourceSheetProperties
   */
  public function getDataSourceSheetProperties()
  {
    return $this->dataSourceSheetProperties;
  }
  /**
   * @param GridProperties
   */
  public function setGridProperties(GridProperties $gridProperties)
  {
    $this->gridProperties = $gridProperties;
  }
  /**
   * @return GridProperties
   */
  public function getGridProperties()
  {
    return $this->gridProperties;
  }
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  public function getHidden()
  {
    return $this->hidden;
  }
  public function setIndex($index)
  {
    $this->index = $index;
  }
  public function getIndex()
  {
    return $this->index;
  }
  public function setRightToLeft($rightToLeft)
  {
    $this->rightToLeft = $rightToLeft;
  }
  public function getRightToLeft()
  {
    return $this->rightToLeft;
  }
  public function setSheetId($sheetId)
  {
    $this->sheetId = $sheetId;
  }
  public function getSheetId()
  {
    return $this->sheetId;
  }
  public function setSheetType($sheetType)
  {
    $this->sheetType = $sheetType;
  }
  public function getSheetType()
  {
    return $this->sheetType;
  }
  /**
   * @param Color
   */
  public function setTabColor(Color $tabColor)
  {
    $this->tabColor = $tabColor;
  }
  /**
   * @return Color
   */
  public function getTabColor()
  {
    return $this->tabColor;
  }
  /**
   * @param ColorStyle
   */
  public function setTabColorStyle(ColorStyle $tabColorStyle)
  {
    $this->tabColorStyle = $tabColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getTabColorStyle()
  {
    return $this->tabColorStyle;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SheetProperties::class, 'Google_Service_Sheets_SheetProperties');
