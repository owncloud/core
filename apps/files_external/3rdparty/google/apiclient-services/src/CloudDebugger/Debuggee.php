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

namespace Google\Service\CloudDebugger;

class Debuggee extends \Google\Collection
{
  protected $collection_key = 'sourceContexts';
  /**
   * @var string
   */
  public $agentVersion;
  /**
   * @var string
   */
  public $canaryMode;
  /**
   * @var string
   */
  public $description;
  protected $extSourceContextsType = ExtendedSourceContext::class;
  protected $extSourceContextsDataType = 'array';
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isDisabled;
  /**
   * @var bool
   */
  public $isInactive;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $project;
  protected $sourceContextsType = SourceContext::class;
  protected $sourceContextsDataType = 'array';
  protected $statusType = StatusMessage::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $uniquifier;

  /**
   * @param string
   */
  public function setAgentVersion($agentVersion)
  {
    $this->agentVersion = $agentVersion;
  }
  /**
   * @return string
   */
  public function getAgentVersion()
  {
    return $this->agentVersion;
  }
  /**
   * @param string
   */
  public function setCanaryMode($canaryMode)
  {
    $this->canaryMode = $canaryMode;
  }
  /**
   * @return string
   */
  public function getCanaryMode()
  {
    return $this->canaryMode;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param ExtendedSourceContext[]
   */
  public function setExtSourceContexts($extSourceContexts)
  {
    $this->extSourceContexts = $extSourceContexts;
  }
  /**
   * @return ExtendedSourceContext[]
   */
  public function getExtSourceContexts()
  {
    return $this->extSourceContexts;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsDisabled($isDisabled)
  {
    $this->isDisabled = $isDisabled;
  }
  /**
   * @return bool
   */
  public function getIsDisabled()
  {
    return $this->isDisabled;
  }
  /**
   * @param bool
   */
  public function setIsInactive($isInactive)
  {
    $this->isInactive = $isInactive;
  }
  /**
   * @return bool
   */
  public function getIsInactive()
  {
    return $this->isInactive;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setProject($project)
  {
    $this->project = $project;
  }
  /**
   * @return string
   */
  public function getProject()
  {
    return $this->project;
  }
  /**
   * @param SourceContext[]
   */
  public function setSourceContexts($sourceContexts)
  {
    $this->sourceContexts = $sourceContexts;
  }
  /**
   * @return SourceContext[]
   */
  public function getSourceContexts()
  {
    return $this->sourceContexts;
  }
  /**
   * @param StatusMessage
   */
  public function setStatus(StatusMessage $status)
  {
    $this->status = $status;
  }
  /**
   * @return StatusMessage
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUniquifier($uniquifier)
  {
    $this->uniquifier = $uniquifier;
  }
  /**
   * @return string
   */
  public function getUniquifier()
  {
    return $this->uniquifier;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Debuggee::class, 'Google_Service_CloudDebugger_Debuggee');
