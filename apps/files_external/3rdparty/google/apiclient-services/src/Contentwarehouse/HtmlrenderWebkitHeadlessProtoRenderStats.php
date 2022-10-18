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

namespace Google\Service\Contentwarehouse;

class HtmlrenderWebkitHeadlessProtoRenderStats extends \Google\Collection
{
  protected $collection_key = 'counter';
  protected $anonRenderFineTimingStatsType = HtmlrenderWebkitHeadlessProtoAnonTimingStatPair::class;
  protected $anonRenderFineTimingStatsDataType = 'array';
  protected $consoleLogEntryType = HtmlrenderWebkitHeadlessProtoConsoleLogEntry::class;
  protected $consoleLogEntryDataType = 'array';
  protected $counterType = HtmlrenderWebkitHeadlessProtoRenderStatsCounter::class;
  protected $counterDataType = 'array';
  /**
   * @var int
   */
  public $documentBuildTimeMsec;
  /**
   * @var int
   */
  public $droppedLogEntryCount;
  /**
   * @var int
   */
  public $imageEncodingTimeMsec;
  /**
   * @var int
   */
  public $imageScalingTimeMsec;
  /**
   * @var int
   */
  public $layoutTimeMsec;
  /**
   * @var int
   */
  public $paintTimeMsec;
  /**
   * @var int
   */
  public $renderCostMgcu;
  /**
   * @var string
   */
  public $renderEngine;
  /**
   * @var int
   */
  public $renderRunningTimeMsec;
  /**
   * @var string
   */
  public $renderServerBaselineCl;
  /**
   * @var int
   */
  public $renderTimeMsec;
  /**
   * @var int
   */
  public $sandboxRenderTimeMsec;

  /**
   * @param HtmlrenderWebkitHeadlessProtoAnonTimingStatPair[]
   */
  public function setAnonRenderFineTimingStats($anonRenderFineTimingStats)
  {
    $this->anonRenderFineTimingStats = $anonRenderFineTimingStats;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoAnonTimingStatPair[]
   */
  public function getAnonRenderFineTimingStats()
  {
    return $this->anonRenderFineTimingStats;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoConsoleLogEntry[]
   */
  public function setConsoleLogEntry($consoleLogEntry)
  {
    $this->consoleLogEntry = $consoleLogEntry;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoConsoleLogEntry[]
   */
  public function getConsoleLogEntry()
  {
    return $this->consoleLogEntry;
  }
  /**
   * @param HtmlrenderWebkitHeadlessProtoRenderStatsCounter[]
   */
  public function setCounter($counter)
  {
    $this->counter = $counter;
  }
  /**
   * @return HtmlrenderWebkitHeadlessProtoRenderStatsCounter[]
   */
  public function getCounter()
  {
    return $this->counter;
  }
  /**
   * @param int
   */
  public function setDocumentBuildTimeMsec($documentBuildTimeMsec)
  {
    $this->documentBuildTimeMsec = $documentBuildTimeMsec;
  }
  /**
   * @return int
   */
  public function getDocumentBuildTimeMsec()
  {
    return $this->documentBuildTimeMsec;
  }
  /**
   * @param int
   */
  public function setDroppedLogEntryCount($droppedLogEntryCount)
  {
    $this->droppedLogEntryCount = $droppedLogEntryCount;
  }
  /**
   * @return int
   */
  public function getDroppedLogEntryCount()
  {
    return $this->droppedLogEntryCount;
  }
  /**
   * @param int
   */
  public function setImageEncodingTimeMsec($imageEncodingTimeMsec)
  {
    $this->imageEncodingTimeMsec = $imageEncodingTimeMsec;
  }
  /**
   * @return int
   */
  public function getImageEncodingTimeMsec()
  {
    return $this->imageEncodingTimeMsec;
  }
  /**
   * @param int
   */
  public function setImageScalingTimeMsec($imageScalingTimeMsec)
  {
    $this->imageScalingTimeMsec = $imageScalingTimeMsec;
  }
  /**
   * @return int
   */
  public function getImageScalingTimeMsec()
  {
    return $this->imageScalingTimeMsec;
  }
  /**
   * @param int
   */
  public function setLayoutTimeMsec($layoutTimeMsec)
  {
    $this->layoutTimeMsec = $layoutTimeMsec;
  }
  /**
   * @return int
   */
  public function getLayoutTimeMsec()
  {
    return $this->layoutTimeMsec;
  }
  /**
   * @param int
   */
  public function setPaintTimeMsec($paintTimeMsec)
  {
    $this->paintTimeMsec = $paintTimeMsec;
  }
  /**
   * @return int
   */
  public function getPaintTimeMsec()
  {
    return $this->paintTimeMsec;
  }
  /**
   * @param int
   */
  public function setRenderCostMgcu($renderCostMgcu)
  {
    $this->renderCostMgcu = $renderCostMgcu;
  }
  /**
   * @return int
   */
  public function getRenderCostMgcu()
  {
    return $this->renderCostMgcu;
  }
  /**
   * @param string
   */
  public function setRenderEngine($renderEngine)
  {
    $this->renderEngine = $renderEngine;
  }
  /**
   * @return string
   */
  public function getRenderEngine()
  {
    return $this->renderEngine;
  }
  /**
   * @param int
   */
  public function setRenderRunningTimeMsec($renderRunningTimeMsec)
  {
    $this->renderRunningTimeMsec = $renderRunningTimeMsec;
  }
  /**
   * @return int
   */
  public function getRenderRunningTimeMsec()
  {
    return $this->renderRunningTimeMsec;
  }
  /**
   * @param string
   */
  public function setRenderServerBaselineCl($renderServerBaselineCl)
  {
    $this->renderServerBaselineCl = $renderServerBaselineCl;
  }
  /**
   * @return string
   */
  public function getRenderServerBaselineCl()
  {
    return $this->renderServerBaselineCl;
  }
  /**
   * @param int
   */
  public function setRenderTimeMsec($renderTimeMsec)
  {
    $this->renderTimeMsec = $renderTimeMsec;
  }
  /**
   * @return int
   */
  public function getRenderTimeMsec()
  {
    return $this->renderTimeMsec;
  }
  /**
   * @param int
   */
  public function setSandboxRenderTimeMsec($sandboxRenderTimeMsec)
  {
    $this->sandboxRenderTimeMsec = $sandboxRenderTimeMsec;
  }
  /**
   * @return int
   */
  public function getSandboxRenderTimeMsec()
  {
    return $this->sandboxRenderTimeMsec;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoRenderStats::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoRenderStats');
