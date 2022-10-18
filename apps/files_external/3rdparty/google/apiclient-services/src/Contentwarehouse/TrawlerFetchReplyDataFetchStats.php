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

class TrawlerFetchReplyDataFetchStats extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "botOverheadMS" => "BotOverheadMS",
        "clientControlflowStats" => "ClientControlflowStats",
        "connectTimeMs" => "ConnectTimeMs",
        "controlflowStats" => "ControlflowStats",
        "downLoadTime" => "DownLoadTime",
        "edgeEgressOverheadMs" => "EdgeEgressOverheadMs",
        "sSLConnectTimeMs" => "SSLConnectTimeMs",
        "serverResponseTimeMs" => "ServerResponseTimeMs",
        "transferTimeMs" => "TransferTimeMs",
  ];
  /**
   * @var int
   */
  public $botOverheadMS;
  protected $clientControlflowStatsType = TrawlerFetchReplyDataFetchStatsClientStateStats::class;
  protected $clientControlflowStatsDataType = '';
  /**
   * @var int
   */
  public $connectTimeMs;
  protected $controlflowStatsType = TrawlerFetchReplyDataFetchStatsStateStats::class;
  protected $controlflowStatsDataType = '';
  /**
   * @var int
   */
  public $downLoadTime;
  /**
   * @var int
   */
  public $edgeEgressOverheadMs;
  /**
   * @var int
   */
  public $sSLConnectTimeMs;
  /**
   * @var int
   */
  public $serverResponseTimeMs;
  /**
   * @var int
   */
  public $transferTimeMs;

  /**
   * @param int
   */
  public function setBotOverheadMS($botOverheadMS)
  {
    $this->botOverheadMS = $botOverheadMS;
  }
  /**
   * @return int
   */
  public function getBotOverheadMS()
  {
    return $this->botOverheadMS;
  }
  /**
   * @param TrawlerFetchReplyDataFetchStatsClientStateStats
   */
  public function setClientControlflowStats(TrawlerFetchReplyDataFetchStatsClientStateStats $clientControlflowStats)
  {
    $this->clientControlflowStats = $clientControlflowStats;
  }
  /**
   * @return TrawlerFetchReplyDataFetchStatsClientStateStats
   */
  public function getClientControlflowStats()
  {
    return $this->clientControlflowStats;
  }
  /**
   * @param int
   */
  public function setConnectTimeMs($connectTimeMs)
  {
    $this->connectTimeMs = $connectTimeMs;
  }
  /**
   * @return int
   */
  public function getConnectTimeMs()
  {
    return $this->connectTimeMs;
  }
  /**
   * @param TrawlerFetchReplyDataFetchStatsStateStats
   */
  public function setControlflowStats(TrawlerFetchReplyDataFetchStatsStateStats $controlflowStats)
  {
    $this->controlflowStats = $controlflowStats;
  }
  /**
   * @return TrawlerFetchReplyDataFetchStatsStateStats
   */
  public function getControlflowStats()
  {
    return $this->controlflowStats;
  }
  /**
   * @param int
   */
  public function setDownLoadTime($downLoadTime)
  {
    $this->downLoadTime = $downLoadTime;
  }
  /**
   * @return int
   */
  public function getDownLoadTime()
  {
    return $this->downLoadTime;
  }
  /**
   * @param int
   */
  public function setEdgeEgressOverheadMs($edgeEgressOverheadMs)
  {
    $this->edgeEgressOverheadMs = $edgeEgressOverheadMs;
  }
  /**
   * @return int
   */
  public function getEdgeEgressOverheadMs()
  {
    return $this->edgeEgressOverheadMs;
  }
  /**
   * @param int
   */
  public function setSSLConnectTimeMs($sSLConnectTimeMs)
  {
    $this->sSLConnectTimeMs = $sSLConnectTimeMs;
  }
  /**
   * @return int
   */
  public function getSSLConnectTimeMs()
  {
    return $this->sSLConnectTimeMs;
  }
  /**
   * @param int
   */
  public function setServerResponseTimeMs($serverResponseTimeMs)
  {
    $this->serverResponseTimeMs = $serverResponseTimeMs;
  }
  /**
   * @return int
   */
  public function getServerResponseTimeMs()
  {
    return $this->serverResponseTimeMs;
  }
  /**
   * @param int
   */
  public function setTransferTimeMs($transferTimeMs)
  {
    $this->transferTimeMs = $transferTimeMs;
  }
  /**
   * @return int
   */
  public function getTransferTimeMs()
  {
    return $this->transferTimeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TrawlerFetchReplyDataFetchStats::class, 'Google_Service_Contentwarehouse_TrawlerFetchReplyDataFetchStats');
