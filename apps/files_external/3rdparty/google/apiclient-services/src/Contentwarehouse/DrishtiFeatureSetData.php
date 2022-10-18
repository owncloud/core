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

class DrishtiFeatureSetData extends \Google\Collection
{
  protected $collection_key = 'label';
  protected $extraType = DrishtiFeatureExtra::class;
  protected $extraDataType = 'array';
  protected $featureType = DrishtiFeatureSetDataFeatureSetElement::class;
  protected $featureDataType = 'array';
  protected $labelType = DrishtiLabelSetElement::class;
  protected $labelDataType = 'array';

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
   * @param DrishtiFeatureSetDataFeatureSetElement[]
   */
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  /**
   * @return DrishtiFeatureSetDataFeatureSetElement[]
   */
  public function getFeature()
  {
    return $this->feature;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiFeatureSetData::class, 'Google_Service_Contentwarehouse_DrishtiFeatureSetData');
