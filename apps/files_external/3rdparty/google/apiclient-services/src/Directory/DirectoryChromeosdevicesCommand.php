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

namespace Google\Service\Directory;

class DirectoryChromeosdevicesCommand extends \Google\Model
{
  public $commandExpireTime;
  public $commandId;
  protected $commandResultType = DirectoryChromeosdevicesCommandResult::class;
  protected $commandResultDataType = '';
  public $issueTime;
  public $payload;
  public $state;
  public $type;

  public function setCommandExpireTime($commandExpireTime)
  {
    $this->commandExpireTime = $commandExpireTime;
  }
  public function getCommandExpireTime()
  {
    return $this->commandExpireTime;
  }
  public function setCommandId($commandId)
  {
    $this->commandId = $commandId;
  }
  public function getCommandId()
  {
    return $this->commandId;
  }
  /**
   * @param DirectoryChromeosdevicesCommandResult
   */
  public function setCommandResult(DirectoryChromeosdevicesCommandResult $commandResult)
  {
    $this->commandResult = $commandResult;
  }
  /**
   * @return DirectoryChromeosdevicesCommandResult
   */
  public function getCommandResult()
  {
    return $this->commandResult;
  }
  public function setIssueTime($issueTime)
  {
    $this->issueTime = $issueTime;
  }
  public function getIssueTime()
  {
    return $this->issueTime;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DirectoryChromeosdevicesCommand::class, 'Google_Service_Directory_DirectoryChromeosdevicesCommand');
