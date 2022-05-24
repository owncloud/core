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

namespace Google\Service\Dfareporting;

class Rule extends \Google\Model
{
  /**
   * @var string
   */
  public $assetId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $targetingTemplateId;

  /**
   * @param string
   */
  public function setAssetId($assetId)
  {
    $this->assetId = $assetId;
  }
  /**
   * @return string
   */
  public function getAssetId()
  {
    return $this->assetId;
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
  public function setTargetingTemplateId($targetingTemplateId)
  {
    $this->targetingTemplateId = $targetingTemplateId;
  }
  /**
   * @return string
   */
  public function getTargetingTemplateId()
  {
    return $this->targetingTemplateId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Rule::class, 'Google_Service_Dfareporting_Rule');
