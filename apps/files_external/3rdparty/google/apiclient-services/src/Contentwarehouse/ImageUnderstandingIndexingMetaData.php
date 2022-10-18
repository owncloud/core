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

class ImageUnderstandingIndexingMetaData extends \Google\Model
{
  /**
   * @var float
   */
  public $floatValue;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $stringValue;

  /**
   * @param float
   */
  public function setFloatValue($floatValue)
  {
    $this->floatValue = $floatValue;
  }
  /**
   * @return float
   */
  public function getFloatValue()
  {
    return $this->floatValue;
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
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  /**
   * @return string
   */
  public function getStringValue()
  {
    return $this->stringValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageUnderstandingIndexingMetaData::class, 'Google_Service_Contentwarehouse_ImageUnderstandingIndexingMetaData');
