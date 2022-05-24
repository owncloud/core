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

namespace Google\Service\BackupforGKE;

class SubstitutionRule extends \Google\Collection
{
  protected $collection_key = 'targetNamespaces';
  /**
   * @var string
   */
  public $newValue;
  /**
   * @var string
   */
  public $originalValuePattern;
  protected $targetGroupKindsType = GroupKind::class;
  protected $targetGroupKindsDataType = 'array';
  /**
   * @var string
   */
  public $targetJsonPath;
  /**
   * @var string[]
   */
  public $targetNamespaces;

  /**
   * @param string
   */
  public function setNewValue($newValue)
  {
    $this->newValue = $newValue;
  }
  /**
   * @return string
   */
  public function getNewValue()
  {
    return $this->newValue;
  }
  /**
   * @param string
   */
  public function setOriginalValuePattern($originalValuePattern)
  {
    $this->originalValuePattern = $originalValuePattern;
  }
  /**
   * @return string
   */
  public function getOriginalValuePattern()
  {
    return $this->originalValuePattern;
  }
  /**
   * @param GroupKind[]
   */
  public function setTargetGroupKinds($targetGroupKinds)
  {
    $this->targetGroupKinds = $targetGroupKinds;
  }
  /**
   * @return GroupKind[]
   */
  public function getTargetGroupKinds()
  {
    return $this->targetGroupKinds;
  }
  /**
   * @param string
   */
  public function setTargetJsonPath($targetJsonPath)
  {
    $this->targetJsonPath = $targetJsonPath;
  }
  /**
   * @return string
   */
  public function getTargetJsonPath()
  {
    return $this->targetJsonPath;
  }
  /**
   * @param string[]
   */
  public function setTargetNamespaces($targetNamespaces)
  {
    $this->targetNamespaces = $targetNamespaces;
  }
  /**
   * @return string[]
   */
  public function getTargetNamespaces()
  {
    return $this->targetNamespaces;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubstitutionRule::class, 'Google_Service_BackupforGKE_SubstitutionRule');
