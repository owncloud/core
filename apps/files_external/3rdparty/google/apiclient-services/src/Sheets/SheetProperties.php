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
  /**
   * @var bool
   */
  public $hidden;
  /**
   * @var int
   */
  public $index;
  /**
   * @var bool
   */
  public $rightToLeft;
  /**
   * @var int
   */
  public $sheetId;
  /**
   * @var string
   */
  public $sheetType;
  protected $tabColorType = Color::class;
  protected $tabColorDataType = '';
  protected $tabColorStyleType = ColorStyle::class;
  protected $tabColorStyleDataType = '';
  /**
   * @var string
   */
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
  /**
   * @param bool
   */
  public function setHidden($hidden)
  {
    $this->hidden = $hidden;
  }
  /**
   * @return bool
   */
  public function getHidden()
  {
    return $this->hidden;
  }
  /**
   * @param int
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return int
   */
  public function getIndex()
  {
    return $this->index;
  }
  /**
   * @param bool
   */
  public function setRightToLeft($rightToLeft)
  {
    $this->rightToLeft = $rightToLeft;
  }
  /**
   * @return bool
   */
  public function getRightToLeft()
  {
    return $this->rightToLeft;
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
  /**
   * @param string
   */
  public function setSheetType($sheetType)
  {
    $this->sheetType = $sheetType;
  }
  /**
   * @return string
   */
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
class_alias(SheetProperties::class, 'Google_Service_Sheets_SheetProperties');
