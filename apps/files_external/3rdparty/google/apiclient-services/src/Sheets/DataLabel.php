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

class DataLabel extends \Google\Model
{
  protected $customLabelDataType = ChartData::class;
  protected $customLabelDataDataType = '';
  public $placement;
  protected $textFormatType = TextFormat::class;
  protected $textFormatDataType = '';
  public $type;

  /**
   * @param ChartData
   */
  public function setCustomLabelData(ChartData $customLabelData)
  {
    $this->customLabelData = $customLabelData;
  }
  /**
   * @return ChartData
   */
  public function getCustomLabelData()
  {
    return $this->customLabelData;
  }
  public function setPlacement($placement)
  {
    $this->placement = $placement;
  }
  public function getPlacement()
  {
    return $this->placement;
  }
  /**
   * @param TextFormat
   */
  public function setTextFormat(TextFormat $textFormat)
  {
    $this->textFormat = $textFormat;
  }
  /**
   * @return TextFormat
   */
  public function getTextFormat()
  {
    return $this->textFormat;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataLabel::class, 'Google_Service_Sheets_DataLabel');
