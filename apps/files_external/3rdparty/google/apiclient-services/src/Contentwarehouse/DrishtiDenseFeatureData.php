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

class DrishtiDenseFeatureData extends \Google\Collection
{
  protected $collection_key = 'value';
  protected $extraType = DrishtiFeatureExtra::class;
  protected $extraDataType = 'array';
  protected $generalExtraType = DrishtiFeatureExtra::class;
  protected $generalExtraDataType = '';
  /**
   * @var float[]
   */
  public $value;

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
   * @param DrishtiFeatureExtra
   */
  public function setGeneralExtra(DrishtiFeatureExtra $generalExtra)
  {
    $this->generalExtra = $generalExtra;
  }
  /**
   * @return DrishtiFeatureExtra
   */
  public function getGeneralExtra()
  {
    return $this->generalExtra;
  }
  /**
   * @param float[]
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return float[]
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiDenseFeatureData::class, 'Google_Service_Contentwarehouse_DrishtiDenseFeatureData');
