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

class Google_Service_Sheets_DataLabel extends Google_Model
{
  protected $customLabelDataType = 'Google_Service_Sheets_ChartData';
  protected $customLabelDataDataType = '';
  public $placement;
  protected $textFormatType = 'Google_Service_Sheets_TextFormat';
  protected $textFormatDataType = '';
  public $type;

  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setCustomLabelData(Google_Service_Sheets_ChartData $customLabelData)
  {
    $this->customLabelData = $customLabelData;
  }
  /**
   * @return Google_Service_Sheets_ChartData
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
   * @param Google_Service_Sheets_TextFormat
   */
  public function setTextFormat(Google_Service_Sheets_TextFormat $textFormat)
  {
    $this->textFormat = $textFormat;
  }
  /**
   * @return Google_Service_Sheets_TextFormat
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
