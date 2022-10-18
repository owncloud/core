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

class VideoPipelineViperVSIColumnData extends \Google\Collection
{
  protected $collection_key = 'vsiStats';
  protected $infoType = VideoVideoStreamInfo::class;
  protected $infoDataType = '';
  public $inputReadTime;
  /**
   * @var bool
   */
  public $partialFile;
  public $totalVsiTime;
  protected $vsiStatsType = VideoPipelineViperVSIColumnDataVsiStats::class;
  protected $vsiStatsDataType = 'array';

  /**
   * @param VideoVideoStreamInfo
   */
  public function setInfo(VideoVideoStreamInfo $info)
  {
    $this->info = $info;
  }
  /**
   * @return VideoVideoStreamInfo
   */
  public function getInfo()
  {
    return $this->info;
  }
  public function setInputReadTime($inputReadTime)
  {
    $this->inputReadTime = $inputReadTime;
  }
  public function getInputReadTime()
  {
    return $this->inputReadTime;
  }
  /**
   * @param bool
   */
  public function setPartialFile($partialFile)
  {
    $this->partialFile = $partialFile;
  }
  /**
   * @return bool
   */
  public function getPartialFile()
  {
    return $this->partialFile;
  }
  public function setTotalVsiTime($totalVsiTime)
  {
    $this->totalVsiTime = $totalVsiTime;
  }
  public function getTotalVsiTime()
  {
    return $this->totalVsiTime;
  }
  /**
   * @param VideoPipelineViperVSIColumnDataVsiStats[]
   */
  public function setVsiStats($vsiStats)
  {
    $this->vsiStats = $vsiStats;
  }
  /**
   * @return VideoPipelineViperVSIColumnDataVsiStats[]
   */
  public function getVsiStats()
  {
    return $this->vsiStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoPipelineViperVSIColumnData::class, 'Google_Service_Contentwarehouse_VideoPipelineViperVSIColumnData');
