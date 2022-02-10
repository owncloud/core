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

namespace Google\Service\TagManager;

class Variable extends \Google\Collection
{
  protected $collection_key = 'parameter';
  /**
   * @var string
   */
  public $accountId;
  /**
   * @var string
   */
  public $containerId;
  /**
   * @var string[]
   */
  public $disablingTriggerId;
  /**
   * @var string[]
   */
  public $enablingTriggerId;
  /**
   * @var string
   */
  public $fingerprint;
  protected $formatValueType = VariableFormatValue::class;
  protected $formatValueDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $notes;
  protected $parameterType = Parameter::class;
  protected $parameterDataType = 'array';
  /**
   * @var string
   */
  public $parentFolderId;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $scheduleEndMs;
  /**
   * @var string
   */
  public $scheduleStartMs;
  /**
   * @var string
   */
  public $tagManagerUrl;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $variableId;
  /**
   * @var string
   */
  public $workspaceId;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param string
   */
  public function setContainerId($containerId)
  {
    $this->containerId = $containerId;
  }
  /**
   * @return string
   */
  public function getContainerId()
  {
    return $this->containerId;
  }
  /**
   * @param string[]
   */
  public function setDisablingTriggerId($disablingTriggerId)
  {
    $this->disablingTriggerId = $disablingTriggerId;
  }
  /**
   * @return string[]
   */
  public function getDisablingTriggerId()
  {
    return $this->disablingTriggerId;
  }
  /**
   * @param string[]
   */
  public function setEnablingTriggerId($enablingTriggerId)
  {
    $this->enablingTriggerId = $enablingTriggerId;
  }
  /**
   * @return string[]
   */
  public function getEnablingTriggerId()
  {
    return $this->enablingTriggerId;
  }
  /**
   * @param string
   */
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return string
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param VariableFormatValue
   */
  public function setFormatValue(VariableFormatValue $formatValue)
  {
    $this->formatValue = $formatValue;
  }
  /**
   * @return VariableFormatValue
   */
  public function getFormatValue()
  {
    return $this->formatValue;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setNotes($notes)
  {
    $this->notes = $notes;
  }
  /**
   * @return string
   */
  public function getNotes()
  {
    return $this->notes;
  }
  /**
   * @param Parameter[]
   */
  public function setParameter($parameter)
  {
    $this->parameter = $parameter;
  }
  /**
   * @return Parameter[]
   */
  public function getParameter()
  {
    return $this->parameter;
  }
  /**
   * @param string
   */
  public function setParentFolderId($parentFolderId)
  {
    $this->parentFolderId = $parentFolderId;
  }
  /**
   * @return string
   */
  public function getParentFolderId()
  {
    return $this->parentFolderId;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setScheduleEndMs($scheduleEndMs)
  {
    $this->scheduleEndMs = $scheduleEndMs;
  }
  /**
   * @return string
   */
  public function getScheduleEndMs()
  {
    return $this->scheduleEndMs;
  }
  /**
   * @param string
   */
  public function setScheduleStartMs($scheduleStartMs)
  {
    $this->scheduleStartMs = $scheduleStartMs;
  }
  /**
   * @return string
   */
  public function getScheduleStartMs()
  {
    return $this->scheduleStartMs;
  }
  /**
   * @param string
   */
  public function setTagManagerUrl($tagManagerUrl)
  {
    $this->tagManagerUrl = $tagManagerUrl;
  }
  /**
   * @return string
   */
  public function getTagManagerUrl()
  {
    return $this->tagManagerUrl;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setVariableId($variableId)
  {
    $this->variableId = $variableId;
  }
  /**
   * @return string
   */
  public function getVariableId()
  {
    return $this->variableId;
  }
  /**
   * @param string
   */
  public function setWorkspaceId($workspaceId)
  {
    $this->workspaceId = $workspaceId;
  }
  /**
   * @return string
   */
  public function getWorkspaceId()
  {
    return $this->workspaceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Variable::class, 'Google_Service_TagManager_Variable');
