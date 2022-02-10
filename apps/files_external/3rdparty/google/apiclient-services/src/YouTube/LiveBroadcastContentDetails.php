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

namespace Google\Service\YouTube;

class LiveBroadcastContentDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $boundStreamId;
  /**
   * @var string
   */
  public $boundStreamLastUpdateTimeMs;
  /**
   * @var string
   */
  public $closedCaptionsType;
  /**
   * @var bool
   */
  public $enableAutoStart;
  /**
   * @var bool
   */
  public $enableAutoStop;
  /**
   * @var bool
   */
  public $enableClosedCaptions;
  /**
   * @var bool
   */
  public $enableContentEncryption;
  /**
   * @var bool
   */
  public $enableDvr;
  /**
   * @var bool
   */
  public $enableEmbed;
  /**
   * @var bool
   */
  public $enableLowLatency;
  /**
   * @var string
   */
  public $latencyPreference;
  /**
   * @var string
   */
  public $mesh;
  protected $monitorStreamType = MonitorStreamInfo::class;
  protected $monitorStreamDataType = '';
  /**
   * @var string
   */
  public $projection;
  /**
   * @var bool
   */
  public $recordFromStart;
  /**
   * @var bool
   */
  public $startWithSlate;
  /**
   * @var string
   */
  public $stereoLayout;

  /**
   * @param string
   */
  public function setBoundStreamId($boundStreamId)
  {
    $this->boundStreamId = $boundStreamId;
  }
  /**
   * @return string
   */
  public function getBoundStreamId()
  {
    return $this->boundStreamId;
  }
  /**
   * @param string
   */
  public function setBoundStreamLastUpdateTimeMs($boundStreamLastUpdateTimeMs)
  {
    $this->boundStreamLastUpdateTimeMs = $boundStreamLastUpdateTimeMs;
  }
  /**
   * @return string
   */
  public function getBoundStreamLastUpdateTimeMs()
  {
    return $this->boundStreamLastUpdateTimeMs;
  }
  /**
   * @param string
   */
  public function setClosedCaptionsType($closedCaptionsType)
  {
    $this->closedCaptionsType = $closedCaptionsType;
  }
  /**
   * @return string
   */
  public function getClosedCaptionsType()
  {
    return $this->closedCaptionsType;
  }
  /**
   * @param bool
   */
  public function setEnableAutoStart($enableAutoStart)
  {
    $this->enableAutoStart = $enableAutoStart;
  }
  /**
   * @return bool
   */
  public function getEnableAutoStart()
  {
    return $this->enableAutoStart;
  }
  /**
   * @param bool
   */
  public function setEnableAutoStop($enableAutoStop)
  {
    $this->enableAutoStop = $enableAutoStop;
  }
  /**
   * @return bool
   */
  public function getEnableAutoStop()
  {
    return $this->enableAutoStop;
  }
  /**
   * @param bool
   */
  public function setEnableClosedCaptions($enableClosedCaptions)
  {
    $this->enableClosedCaptions = $enableClosedCaptions;
  }
  /**
   * @return bool
   */
  public function getEnableClosedCaptions()
  {
    return $this->enableClosedCaptions;
  }
  /**
   * @param bool
   */
  public function setEnableContentEncryption($enableContentEncryption)
  {
    $this->enableContentEncryption = $enableContentEncryption;
  }
  /**
   * @return bool
   */
  public function getEnableContentEncryption()
  {
    return $this->enableContentEncryption;
  }
  /**
   * @param bool
   */
  public function setEnableDvr($enableDvr)
  {
    $this->enableDvr = $enableDvr;
  }
  /**
   * @return bool
   */
  public function getEnableDvr()
  {
    return $this->enableDvr;
  }
  /**
   * @param bool
   */
  public function setEnableEmbed($enableEmbed)
  {
    $this->enableEmbed = $enableEmbed;
  }
  /**
   * @return bool
   */
  public function getEnableEmbed()
  {
    return $this->enableEmbed;
  }
  /**
   * @param bool
   */
  public function setEnableLowLatency($enableLowLatency)
  {
    $this->enableLowLatency = $enableLowLatency;
  }
  /**
   * @return bool
   */
  public function getEnableLowLatency()
  {
    return $this->enableLowLatency;
  }
  /**
   * @param string
   */
  public function setLatencyPreference($latencyPreference)
  {
    $this->latencyPreference = $latencyPreference;
  }
  /**
   * @return string
   */
  public function getLatencyPreference()
  {
    return $this->latencyPreference;
  }
  /**
   * @param string
   */
  public function setMesh($mesh)
  {
    $this->mesh = $mesh;
  }
  /**
   * @return string
   */
  public function getMesh()
  {
    return $this->mesh;
  }
  /**
   * @param MonitorStreamInfo
   */
  public function setMonitorStream(MonitorStreamInfo $monitorStream)
  {
    $this->monitorStream = $monitorStream;
  }
  /**
   * @return MonitorStreamInfo
   */
  public function getMonitorStream()
  {
    return $this->monitorStream;
  }
  /**
   * @param string
   */
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  /**
   * @return string
   */
  public function getProjection()
  {
    return $this->projection;
  }
  /**
   * @param bool
   */
  public function setRecordFromStart($recordFromStart)
  {
    $this->recordFromStart = $recordFromStart;
  }
  /**
   * @return bool
   */
  public function getRecordFromStart()
  {
    return $this->recordFromStart;
  }
  /**
   * @param bool
   */
  public function setStartWithSlate($startWithSlate)
  {
    $this->startWithSlate = $startWithSlate;
  }
  /**
   * @return bool
   */
  public function getStartWithSlate()
  {
    return $this->startWithSlate;
  }
  /**
   * @param string
   */
  public function setStereoLayout($stereoLayout)
  {
    $this->stereoLayout = $stereoLayout;
  }
  /**
   * @return string
   */
  public function getStereoLayout()
  {
    return $this->stereoLayout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveBroadcastContentDetails::class, 'Google_Service_YouTube_LiveBroadcastContentDetails');
