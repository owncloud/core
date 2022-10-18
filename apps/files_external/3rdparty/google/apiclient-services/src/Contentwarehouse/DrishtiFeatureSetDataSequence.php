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

class DrishtiFeatureSetDataSequence extends \Google\Collection
{
  protected $collection_key = 'timestamp';
  protected $elementType = DrishtiFeatureSetData::class;
  protected $elementDataType = 'array';
  protected $extraType = DrishtiFeatureExtra::class;
  protected $extraDataType = 'array';
  protected $labelType = DrishtiLabelSetElement::class;
  protected $labelDataType = 'array';
  /**
   * @var string[]
   */
  public $timestamp;

  /**
   * @param DrishtiFeatureSetData[]
   */
  public function setElement($element)
  {
    $this->element = $element;
  }
  /**
   * @return DrishtiFeatureSetData[]
   */
  public function getElement()
  {
    return $this->element;
  }
  /**
   * @param DrishtiFeatureExtra[]
   */
  public function setExtra($extra)
  {
    $this->extra = $extra;
  }
  /**
   * @return DrishtiFeatureExtra[]
   */
  public function getExtra()
  {
    return $this->extra;
  }
  /**
   * @param DrishtiLabelSetElement[]
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return DrishtiLabelSetElement[]
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string[]
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string[]
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiFeatureSetDataSequence::class, 'Google_Service_Contentwarehouse_DrishtiFeatureSetDataSequence');
