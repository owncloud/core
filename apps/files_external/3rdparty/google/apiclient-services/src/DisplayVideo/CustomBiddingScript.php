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

namespace Google\Service\DisplayVideo;

class CustomBiddingScript extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var bool
   */
  public $active;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $customBiddingAlgorithmId;
  /**
   * @var string
   */
  public $customBiddingScriptId;
  protected $errorsType = ScriptError::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $name;
  protected $scriptType = CustomBiddingScriptRef::class;
  protected $scriptDataType = '';
  /**
   * @var string
   */
  public $state;

  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setCustomBiddingAlgorithmId($customBiddingAlgorithmId)
  {
    $this->customBiddingAlgorithmId = $customBiddingAlgorithmId;
  }
  /**
   * @return string
   */
  public function getCustomBiddingAlgorithmId()
  {
    return $this->customBiddingAlgorithmId;
  }
  /**
   * @param string
   */
  public function setCustomBiddingScriptId($customBiddingScriptId)
  {
    $this->customBiddingScriptId = $customBiddingScriptId;
  }
  /**
   * @return string
   */
  public function getCustomBiddingScriptId()
  {
    return $this->customBiddingScriptId;
  }
  /**
   * @param ScriptError[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return ScriptError[]
   */
  public function getErrors()
  {
    return $this->errors;
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
   * @param CustomBiddingScriptRef
   */
  public function setScript(CustomBiddingScriptRef $script)
  {
    $this->script = $script;
  }
  /**
   * @return CustomBiddingScriptRef
   */
  public function getScript()
  {
    return $this->script;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomBiddingScript::class, 'Google_Service_DisplayVideo_CustomBiddingScript');
