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
  public $bfdSessionInitializationMode;
  public $configUpdateTimestampMicros;
  protected $controlPacketCountsType = BfdStatusPacketCounts::class;
  protected $controlPacketCountsDataType = '';
  protected $controlPacketIntervalsType = PacketIntervals::class;
  protected $controlPacketIntervalsDataType = 'array';
  public $localDiagnostic;
  public $localState;
  public $negotiatedLocalControlTxIntervalMs;
  protected $rxPacketType = BfdPacket::class;
  protected $rxPacketDataType = '';
  protected $txPacketType = BfdPacket::class;
  protected $txPacketDataType = '';
  public $uptimeMs;

  public function setBfdSessionInitializationMode($bfdSessionInitializationMode)
  {
    $this->bfdSessionInitializationMode = $bfdSessionInitializationMode;
  }
  public function getBfdSessionInitializationMode()
  {
    return $this->bfdSessionInitializationMode;
  }
  public function setConfigUpdateTimestampMicros($configUpdateTimestampMicros)
  {
    $this->configUpdateTimestampMicros = $configUpdateTimestampMicros;
  }
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
  public function setLocalDiagnostic($localDiagnostic)
  {
    $this->localDiagnostic = $localDiagnostic;
  }
  public function getLocalDiagnostic()
  {
    return $this->localDiagnostic;
  }
  public function setLocalState($localState)
  {
    $this->localState = $localState;
  }
  public function getLocalState()
  {
    return $this->localState;
  }
  public function setNegotiatedLocalControlTxIntervalMs($negotiatedLocalControlTxIntervalMs)
  {
    $this->negotiatedLocalControlTxIntervalMs = $negotiatedLocalControlTxIntervalMs;
  }
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
  public function setUptimeMs($uptimeMs)
  {
    $this->uptimeMs = $uptimeMs;
  }
  public function getUptimeMs()
  {
    return $this->uptimeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BfdStatus::class, 'Google_Service_Compute_BfdStatus');
