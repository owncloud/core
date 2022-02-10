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

namespace Google\Service\Compute;

class BfdStatus extends \Google\Collection
{
  protected $collection_key = 'controlPacketIntervals';
  /**
   * @var string
   */
  public $bfdSessionInitializationMode;
  /**
   * @var string
   */
  public $configUpdateTimestampMicros;
  protected $controlPacketCountsType = BfdStatusPacketCounts::class;
  protected $controlPacketCountsDataType = '';
  protected $controlPacketIntervalsType = PacketIntervals::class;
  protected $controlPacketIntervalsDataType = 'array';
  /**
   * @var string
   */
  public $localDiagnostic;
  /**
   * @var string
   */
  public $localState;
  /**
   * @var string
   */
  public $negotiatedLocalControlTxIntervalMs;
  protected $rxPacketType = BfdPacket::class;
  protected $rxPacketDataType = '';
  protected $txPacketType = BfdPacket::class;
  protected $txPacketDataType = '';
  /**
   * @var string
   */
  public $uptimeMs;

  /**
   * @param string
   */
  public function setBfdSessionInitializationMode($bfdSessionInitializationMode)
  {
    $this->bfdSessionInitializationMode = $bfdSessionInitializationMode;
  }
  /**
   * @return string
   */
  public function getBfdSessionInitializationMode()
  {
    return $this->bfdSessionInitializationMode;
  }
  /**
   * @param string
   */
  public function setConfigUpdateTimestampMicros($configUpdateTimestampMicros)
  {
    $this->configUpdateTimestampMicros = $configUpdateTimestampMicros;
  }
  /**
   * @return string
   */
  public function getConfigUpdateTimestampMicros()
  {
    return $this->configUpdateTimestampMicros;
  }
  /**
   * @param BfdStatusPacketCounts
   */
  public function setControlPacketCounts(BfdStatusPacketCounts $controlPacketCounts)
  {
    $this->controlPacketCounts = $controlPacketCounts;
  }
  /**
   * @return BfdStatusPacketCounts
   */
  public function getControlPacketCounts()
  {
    return $this->controlPacketCounts;
  }
  /**
   * @param PacketIntervals[]
   */
  public function setControlPacketIntervals($controlPacketIntervals)
  {
    $this->controlPacketIntervals = $controlPacketIntervals;
  }
  /**
   * @return PacketIntervals[]
   */
  public function getControlPacketIntervals()
  {
    return $this->controlPacketIntervals;
  }
  /**
   * @param string
   */
  public function setLocalDiagnostic($localDiagnostic)
  {
    $this->localDiagnostic = $localDiagnostic;
  }
  /**
   * @return string
   */
  public function getLocalDiagnostic()
  {
    return $this->localDiagnostic;
  }
  /**
   * @param string
   */
  public function setLocalState($localState)
  {
    $this->localState = $localState;
  }
  /**
   * @return string
   */
  public function getLocalState()
  {
    return $this->localState;
  }
  /**
   * @param string
   */
  public function setNegotiatedLocalControlTxIntervalMs($negotiatedLocalControlTxIntervalMs)
  {
    $this->negotiatedLocalControlTxIntervalMs = $negotiatedLocalControlTxIntervalMs;
  }
  /**
   * @return string
   */
  public function getNegotiatedLocalControlTxIntervalMs()
  {
    return $this->negotiatedLocalControlTxIntervalMs;
  }
  /**
   * @param BfdPacket
   */
  public function setRxPacket(BfdPacket $rxPacket)
  {
    $this->rxPacket = $rxPacket;
  }
  /**
   * @return BfdPacket
   */
  public function getRxPacket()
  {
    return $this->rxPacket;
  }
  /**
   * @param BfdPacket
   */
  public function setTxPacket(BfdPacket $txPacket)
  {
    $this->txPacket = $txPacket;
  }
  /**
   * @return BfdPacket
   */
  public function getTxPacket()
  {
    return $this->txPacket;
  }
  /**
   * @param string
   */
  public function setUptimeMs($uptimeMs)
  {
    $this->uptimeMs = $uptimeMs;
  }
  /**
   * @return string
   */
  public function getUptimeMs()
  {
    return $this->uptimeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BfdStatus::class, 'Google_Service_Compute_BfdStatus');
