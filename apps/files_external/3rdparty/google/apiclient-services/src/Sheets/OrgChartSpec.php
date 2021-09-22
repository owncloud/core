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

class OrgChartSpec extends \Google\Model
{
  protected $labelsType = ChartData::class;
  protected $labelsDataType = '';
  protected $nodeColorType = Color::class;
  protected $nodeColorDataType = '';
  protected $nodeColorStyleType = ColorStyle::class;
  protected $nodeColorStyleDataType = '';
  public $nodeSize;
  protected $parentLabelsType = ChartData::class;
  protected $parentLabelsDataType = '';
  protected $selectedNodeColorType = Color::class;
  protected $selectedNodeColorDataType = '';
  protected $selectedNodeColorStyleType = ColorStyle::class;
  protected $selectedNodeColorStyleDataType = '';
  protected $tooltipsType = ChartData::class;
  protected $tooltipsDataType = '';

  /**
   * @param ChartData
   */
  public function setLabels(ChartData $labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return ChartData
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Color
   */
  public function setNodeColor(Color $nodeColor)
  {
    $this->nodeColor = $nodeColor;
  }
  /**
   * @return Color
   */
  public function getNodeColor()
  {
    return $this->nodeColor;
  }
  /**
   * @param ColorStyle
   */
  public function setNodeColorStyle(ColorStyle $nodeColorStyle)
  {
    $this->nodeColorStyle = $nodeColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getNodeColorStyle()
  {
    return $this->nodeColorStyle;
  }
  public function setNodeSize($nodeSize)
  {
    $this->nodeSize = $nodeSize;
  }
  public function getNodeSize()
  {
    return $this->nodeSize;
  }
  /**
   * @param ChartData
   */
  public function setParentLabels(ChartData $parentLabels)
  {
    $this->parentLabels = $parentLabels;
  }
  /**
   * @return ChartData
   */
  public function getParentLabels()
  {
    return $this->parentLabels;
  }
  /**
   * @param Color
   */
  public function setSelectedNodeColor(Color $selectedNodeColor)
  {
    $this->selectedNodeColor = $selectedNodeColor;
  }
  /**
   * @return Color
   */
  public function getSelectedNodeColor()
  {
    return $this->selectedNodeColor;
  }
  /**
   * @param ColorStyle
   */
  public function setSelectedNodeColorStyle(ColorStyle $selectedNodeColorStyle)
  {
    $this->selectedNodeColorStyle = $selectedNodeColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getSelectedNodeColorStyle()
  {
    return $this->selectedNodeColorStyle;
  }
  /**
   * @param ChartData
   */
  public function setTooltips(ChartData $tooltips)
  {
    $this->tooltips = $tooltips;
  }
  /**
   * @return ChartData
   */
  public function getTooltips()
  {
    return $this->tooltips;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrgChartSpec::class, 'Google_Service_Sheets_OrgChartSpec');
