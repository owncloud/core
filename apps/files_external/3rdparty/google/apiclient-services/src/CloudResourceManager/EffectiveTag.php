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

namespace Google\Service\CloudResourceManager;

class EffectiveTag extends \Google\Model
{
  /**
   * @var bool
   */
  public $inherited;
  /**
   * @var string
   */
  public $namespacedTagKey;
  /**
   * @var string
   */
  public $namespacedTagValue;
  /**
   * @var string
   */
  public $tagKey;
  /**
   * @var string
   */
  public $tagValue;

  /**
   * @param bool
   */
  public function setInherited($inherited)
  {
    $this->inherited = $inherited;
  }
  /**
   * @return bool
   */
  public function getInherited()
  {
    return $this->inherited;
  }
  /**
   * @param string
   */
  public function setNamespacedTagKey($namespacedTagKey)
  {
    $this->namespacedTagKey = $namespacedTagKey;
  }
  /**
   * @return string
   */
  public function getNamespacedTagKey()
  {
    return $this->namespacedTagKey;
  }
  /**
   * @param string
   */
  public function setNamespacedTagValue($namespacedTagValue)
  {
    $this->namespacedTagValue = $namespacedTagValue;
  }
  /**
   * @return string
   */
  public function getNamespacedTagValue()
  {
    return $this->namespacedTagValue;
  }
  /**
   * @param string
   */
  public function setTagKey($tagKey)
  {
    $this->tagKey = $tagKey;
  }
  /**
   * @return string
   */
  public function getTagKey()
  {
    return $this->tagKey;
  }
  /**
   * @param string
   */
  public function setTagValue($tagValue)
  {
    $this->tagValue = $tagValue;
  }
  /**
   * @return string
   */
  public function getTagValue()
  {
    return $this->tagValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EffectiveTag::class, 'Google_Service_CloudResourceManager_EffectiveTag');
