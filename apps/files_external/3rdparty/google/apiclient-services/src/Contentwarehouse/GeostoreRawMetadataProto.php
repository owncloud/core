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

class GeostoreRawMetadataProto extends \Google\Model
{
  /**
   * @var string
   */
  public $conflationMethod;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $label;

  /**
   * @param string
   */
  public function setConflationMethod($conflationMethod)
  {
    $this->conflationMethod = $conflationMethod;
  }
  /**
   * @return string
   */
  public function getConflationMethod()
  {
    return $this->conflationMethod;
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
   * @param string
   */
  public function setKey($key)
  {
    $this->key = $key;
  }
  /**
   * @return string
   */
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreRawMetadataProto::class, 'Google_Service_Contentwarehouse_GeostoreRawMetadataProto');
