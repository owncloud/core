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

class ChartSpec extends \Google\Collection
{
  protected $collection_key = 'sortSpecs';
  /**
   * @var string
   */
  public $altText;
  protected $backgroundColorType = Color::class;
  protected $backgroundColorDataType = '';
  protected $backgroundColorStyleType = ColorStyle::class;
  protected $backgroundColorStyleDataType = '';
  protected $basicChartType = BasicChartSpec::class;
  protected $basicChartDataType = '';
  protected $bubbleChartType = BubbleChartSpec::class;
  protected $bubbleChartDataType = '';
  protected $candlestickChartType = CandlestickChartSpec::class;
  protected $candlestickChartDataType = '';
  protected $dataSourceChartPropertiesType = DataSourceChartProperties::class;
  protected $dataSourceChartPropertiesDataType = '';
  protected $filterSpecsType = FilterSpec::class;
  protected $filterSpecsDataType = 'array';
  /**
   * @var string
   */
  public $fontName;
  /**
   * @var string
   */
  public $hiddenDimensionStrategy;
  protected $histogramChartType = HistogramChartSpec::class;
  protected $histogramChartDataType = '';
  /**
   * @var bool
   */
  public $maximized;
  protected $orgChartType = OrgChartSpec::class;
  protected $orgChartDataType = '';
  protected $pieChartType = PieChartSpec::class;
  protected $pieChartDataType = '';
  protected $scorecardChartType = ScorecardChartSpec::class;
  protected $scorecardChartDataType = '';
  protected $sortSpecsType = SortSpec::class;
  protected $sortSpecsDataType = 'array';
  /**
   * @var string
   */
  public $subtitle;
  protected $subtitleTextFormatType = TextFormat::class;
  protected $subtitleTextFormatDataType = '';
  protected $subtitleTextPositionType = TextPosition::class;
  protected $subtitleTextPositionDataType = '';
  /**
   * @var string
   */
  public $title;
  protected $titleTextFormatType = TextFormat::class;
  protected $titleTextFormatDataType = '';
  protected $titleTextPositionType = TextPosition::class;
  protected $titleTextPositionDataType = '';
  protected $treemapChartType = TreemapChartSpec::class;
  protected $treemapChartDataType = '';
  protected $waterfallChartType = WaterfallChartSpec::class;
  protected $waterfallChartDataType = '';

  /**
   * @param string
   */
  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  /**
   * @return string
   */
  public function getAltText()
  {
    return $this->altText;
  }
  /**
   * @param Color
   */
  public function setBackgroundColor(Color $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return Color
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param ColorStyle
   */
  public function setBackgroundColorStyle(ColorStyle $backgroundColorStyle)
  {
    $this->backgroundColorStyle = $backgroundColorStyle;
  }
  /**
   * @return ColorStyle
   */
  public function getBackgroundColorStyle()
  {
    return $this->backgroundColorStyle;
  }
  /**
   * @param BasicChartSpec
   */
  public function setBasicChart(BasicChartSpec $basicChart)
  {
    $this->basicChart = $basicChart;
  }
  /**
   * @return BasicChartSpec
   */
  public function getBasicChart()
  {
    return $this->basicChart;
  }
  /**
   * @param BubbleChartSpec
   */
  public function setBubbleChart(BubbleChartSpec $bubbleChart)
  {
    $this->bubbleChart = $bubbleChart;
  }
  /**
   * @return BubbleChartSpec
   */
  public function getBubbleChart()
  {
    return $this->bubbleChart;
  }
  /**
   * @param CandlestickChartSpec
   */
  public function setCandlestickChart(CandlestickChartSpec $candlestickChart)
  {
    $this->candlestickChart = $candlestickChart;
  }
  /**
   * @return CandlestickChartSpec
   */
  public function getCandlestickChart()
  {
    return $this->candlestickChart;
  }
  /**
   * @param DataSourceChartProperties
   */
  public function setDataSourceChartProperties(DataSourceChartProperties $dataSourceChartProperties)
  {
    $this->dataSourceChartProperties = $dataSourceChartProperties;
  }
  /**
   * @return DataSourceChartProperties
   */
  public function getDataSourceChartProperties()
  {
    return $this->dataSourceChartProperties;
  }
  /**
   * @param FilterSpec[]
   */
  public function setFilterSpecs($filterSpecs)
  {
    $this->filterSpecs = $filterSpecs;
  }
  /**
   * @return FilterSpec[]
   */
  public function getFilterSpecs()
  {
    return $this->filterSpecs;
  }
  /**
   * @param string
   */
  public function setFontName($fontName)
  {
    $this->fontName = $fontName;
  }
  /**
   * @return string
   */
  public function getFontName()
  {
    return $this->fontName;
  }
  /**
   * @param string
   */
  public function setHiddenDimensionStrategy($hiddenDimensionStrategy)
  {
    $this->hiddenDimensionStrategy = $hiddenDimensionStrategy;
  }
  /**
   * @return string
   */
  public function getHiddenDimensionStrategy()
  {
    return $this->hiddenDimensionStrategy;
  }
  /**
   * @param HistogramChartSpec
   */
  public function setHistogramChart(HistogramChartSpec $histogramChart)
  {
    $this->histogramChart = $histogramChart;
  }
  /**
   * @return HistogramChartSpec
   */
  public function getHistogramChart()
  {
    return $this->histogramChart;
  }
  /**
   * @param bool
   */
  public function setMaximized($maximized)
  {
    $this->maximized = $maximized;
  }
  /**
   * @return bool
   */
  public function getMaximized()
  {
    return $this->maximized;
  }
  /**
   * @param OrgChartSpec
   */
  public function setOrgChart(OrgChartSpec $orgChart)
  {
    $this->orgChart = $orgChart;
  }
  /**
   * @return OrgChartSpec
   */
  public function getOrgChart()
  {
    return $this->orgChart;
  }
  /**
   * @param PieChartSpec
   */
  public function setPieChart(PieChartSpec $pieChart)
  {
    $this->pieChart = $pieChart;
  }
  /**
   * @return PieChartSpec
   */
  public function getPieChart()
  {
    return $this->pieChart;
  }
  /**
   * @param ScorecardChartSpec
   */
  public function setScorecardChart(ScorecardChartSpec $scorecardChart)
  {
    $this->scorecardChart = $scorecardChart;
  }
  /**
   * @return ScorecardChartSpec
   */
  public function getScorecardChart()
  {
    return $this->scorecardChart;
  }
  /**
   * @param SortSpec[]
   */
  public function setSortSpecs($sortSpecs)
  {
    $this->sortSpecs = $sortSpecs;
  }
  /**
   * @return SortSpec[]
   */
  public function getSortSpecs()
  {
    return $this->sortSpecs;
  }
  /**
   * @param string
   */
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  /**
   * @return string
   */
  public function getSubtitle()
  {
    return $this->subtitle;
  }
  /**
   * @param TextFormat
   */
  public function setSubtitleTextFormat(TextFormat $subtitleTextFormat)
  {
    $this->subtitleTextFormat = $subtitleTextFormat;
  }
  /**
   * @return TextFormat
   */
  public function getSubtitleTextFormat()
  {
    return $this->subtitleTextFormat;
  }
  /**
   * @param TextPosition
   */
  public function setSubtitleTextPosition(TextPosition $subtitleTextPosition)
  {
    $this->subtitleTextPosition = $subtitleTextPosition;
  }
  /**
   * @return TextPosition
   */
  public function getSubtitleTextPosition()
  {
    return $this->subtitleTextPosition;
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
  /**
   * @param TextFormat
   */
  public function setTitleTextFormat(TextFormat $titleTextFormat)
  {
    $this->titleTextFormat = $titleTextFormat;
  }
  /**
   * @return TextFormat
   */
  public function getTitleTextFormat()
  {
    return $this->titleTextFormat;
  }
  /**
   * @param TextPosition
   */
  public function setTitleTextPosition(TextPosition $titleTextPosition)
  {
    $this->titleTextPosition = $titleTextPosition;
  }
  /**
   * @return TextPosition
   */
  public function getTitleTextPosition()
  {
    return $this->titleTextPosition;
  }
  /**
   * @param TreemapChartSpec
   */
  public function setTreemapChart(TreemapChartSpec $treemapChart)
  {
    $this->treemapChart = $treemapChart;
  }
  /**
   * @return TreemapChartSpec
   */
  public function getTreemapChart()
  {
    return $this->treemapChart;
  }
  /**
   * @param WaterfallChartSpec
   */
  public function setWaterfallChart(WaterfallChartSpec $waterfallChart)
  {
    $this->waterfallChart = $waterfallChart;
  }
  /**
   * @return WaterfallChartSpec
   */
  public function getWaterfallChart()
  {
    return $this->waterfallChart;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChartSpec::class, 'Google_Service_Sheets_ChartSpec');
