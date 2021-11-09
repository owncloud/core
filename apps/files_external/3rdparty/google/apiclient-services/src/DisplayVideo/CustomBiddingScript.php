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
  public $active;
  public $createTime;
  public $customBiddingAlgorithmId;
  public $customBiddingScriptId;
  protected $errorsType = ScriptError::class;
  protected $errorsDataType = 'array';
  public $name;
  protected $scriptType = CustomBiddingScriptRef::class;
  protected $scriptDataType = '';
  public $state;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setCustomBiddingAlgorithmId($customBiddingAlgorithmId)
  {
    $this->customBiddingAlgorithmId = $customBiddingAlgorithmId;
  }
  public function getCustomBiddingAlgorithmId()
  {
    return $this->customBiddingAlgorithmId;
  }
  public function setCustomBiddingScriptId($customBiddingScriptId)
  {
    $this->customBiddingScriptId = $customBiddingScriptId;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomBiddingScript::class, 'Google_Service_DisplayVideo_CustomBiddingScript');
