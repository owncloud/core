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

class ImageMoosedogCrawlState extends \Google\Model
{
  /**
   * @var string
   */
  public $code;
  /**
   * @var int
   */
  public $detailedReason;
  protected $internalStatusType = UtilStatusProto::class;
  protected $internalStatusDataType = '';
  /**
   * @var bool
   */
  public $isTerminal;
  /**
   * @var string
   */
  public $noIndexAfterTimestamp;
  /**
   * @var string
   */
  public $notCrawledReason;
  /**
   * @var bool
   */
  public $overrodeTerminalState;
  /**
   * @var string
   */
  public $repid;
  /**
   * @var string
   */
  public $robotedAgents;
  /**
   * @var string
   */
  public $url;
  /**
   * @var bool
   */
  public $urlDeleted;

  /**
   * @param string
   */
  public function setCode($code)
  {
    $this->code = $code;
  }
  /**
   * @return string
   */
  public function getCode()
  {
    return $this->code;
  }
  /**
   * @param int
   */
  public function setDetailedReason($detailedReason)
  {
    $this->detailedReason = $detailedReason;
  }
  /**
   * @return int
   */
  public function getDetailedReason()
  {
    return $this->detailedReason;
  }
  /**
   * @param UtilStatusProto
   */
  public function setInternalStatus(UtilStatusProto $internalStatus)
  {
    $this->internalStatus = $internalStatus;
  }
  /**
   * @return UtilStatusProto
   */
  public function getInternalStatus()
  {
    return $this->internalStatus;
  }
  /**
   * @param bool
   */
  public function setIsTerminal($isTerminal)
  {
    $this->isTerminal = $isTerminal;
  }
  /**
   * @return bool
   */
  public function getIsTerminal()
  {
    return $this->isTerminal;
  }
  /**
   * @param string
   */
  public function setNoIndexAfterTimestamp($noIndexAfterTimestamp)
  {
    $this->noIndexAfterTimestamp = $noIndexAfterTimestamp;
  }
  /**
   * @return string
   */
  public function getNoIndexAfterTimestamp()
  {
    return $this->noIndexAfterTimestamp;
  }
  /**
   * @param string
   */
  public function setNotCrawledReason($notCrawledReason)
  {
    $this->notCrawledReason = $notCrawledReason;
  }
  /**
   * @return string
   */
  public function getNotCrawledReason()
  {
    return $this->notCrawledReason;
  }
  /**
   * @param bool
   */
  public function setOverrodeTerminalState($overrodeTerminalState)
  {
    $this->overrodeTerminalState = $overrodeTerminalState;
  }
  /**
   * @return bool
   */
  public function getOverrodeTerminalState()
  {
    return $this->overrodeTerminalState;
  }
  /**
   * @param string
   */
  public function setRepid($repid)
  {
    $this->repid = $repid;
  }
  /**
   * @return string
   */
  public function getRepid()
  {
    return $this->repid;
  }
  /**
   * @param string
   */
  public function setRobotedAgents($robotedAgents)
  {
    $this->robotedAgents = $robotedAgents;
  }
  /**
   * @return string
   */
  public function getRobotedAgents()
  {
    return $this->robotedAgents;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  /**
   * @param bool
   */
  public function setUrlDeleted($urlDeleted)
  {
    $this->urlDeleted = $urlDeleted;
  }
  /**
   * @return bool
   */
  public function getUrlDeleted()
  {
    return $this->urlDeleted;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageMoosedogCrawlState::class, 'Google_Service_Contentwarehouse_ImageMoosedogCrawlState');
