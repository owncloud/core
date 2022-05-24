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

namespace Google\Service\Dataflow;

class DisplayData extends \Google\Model
{
  /**
   * @var bool
   */
  public $boolValue;
  /**
   * @var string
   */
  public $durationValue;
  /**
   * @var float
   */
  public $floatValue;
  /**
   * @var string
   */
  public $int64Value;
  /**
   * @var string
   */
  public $javaClassValue;
  /**
   * @var string
   */
  public $key;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $namespace;
  /**
   * @var string
   */
  public $shortStrValue;
  /**
   * @var string
   */
  public $strValue;
  /**
   * @var string
   */
  public $timestampValue;
  /**
   * @var string
   */
  public $url;

  /**
   * @param bool
   */
  public function setBoolValue($boolValue)
  {
    $this->boolValue = $boolValue;
  }
  /**
   * @return bool
   */
  public function getBoolValue()
  {
    return $this->boolValue;
  }
  /**
   * @param string
   */
  public function setDurationValue($durationValue)
  {
    $this->durationValue = $durationValue;
  }
  /**
   * @return string
   */
  public function getDurationValue()
  {
    return $this->durationValue;
  }
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
  public function setInt64Value($int64Value)
  {
    $this->int64Value = $int64Value;
  }
  /**
   * @return string
   */
  public function getInt64Value()
  {
    return $this->int64Value;
  }
  /**
   * @param string
   */
  public function setJavaClassValue($javaClassValue)
  {
    $this->javaClassValue = $javaClassValue;
  }
  /**
   * @return string
   */
  public function getJavaClassValue()
  {
    return $this->javaClassValue;
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
  /**
   * @param string
   */
  public function setNamespace($namespace)
  {
    $this->namespace = $namespace;
  }
  /**
   * @return string
   */
  public function getNamespace()
  {
    return $this->namespace;
  }
  /**
   * @param string
   */
  public function setShortStrValue($shortStrValue)
  {
    $this->shortStrValue = $shortStrValue;
  }
  /**
   * @return string
   */
  public function getShortStrValue()
  {
    return $this->shortStrValue;
  }
  /**
   * @param string
   */
  public function setStrValue($strValue)
  {
    $this->strValue = $strValue;
  }
  /**
   * @return string
   */
  public function getStrValue()
  {
    return $this->strValue;
  }
  /**
   * @param string
   */
  public function setTimestampValue($timestampValue)
  {
    $this->timestampValue = $timestampValue;
  }
  /**
   * @return string
   */
  public function getTimestampValue()
  {
    return $this->timestampValue;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DisplayData::class, 'Google_Service_Dataflow_DisplayData');
