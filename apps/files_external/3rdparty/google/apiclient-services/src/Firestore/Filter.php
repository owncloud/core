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

namespace Google\Service\Firestore;

class Filter extends \Google\Model
{
  protected $compositeFilterType = CompositeFilter::class;
  protected $compositeFilterDataType = '';
  protected $fieldFilterType = FieldFilter::class;
  protected $fieldFilterDataType = '';
  protected $unaryFilterType = UnaryFilter::class;
  protected $unaryFilterDataType = '';

  /**
   * @param CompositeFilter
   */
  public function setCompositeFilter(CompositeFilter $compositeFilter)
  {
    $this->compositeFilter = $compositeFilter;
  }
  /**
   * @return CompositeFilter
   */
  public function getCompositeFilter()
  {
    return $this->compositeFilter;
  }
  /**
   * @param FieldFilter
   */
  public function setFieldFilter(FieldFilter $fieldFilter)
  {
    $this->fieldFilter = $fieldFilter;
  }
  /**
   * @return FieldFilter
   */
  public function getFieldFilter()
  {
    return $this->fieldFilter;
  }
  /**
   * @param UnaryFilter
   */
  public function setUnaryFilter(UnaryFilter $unaryFilter)
  {
    $this->unaryFilter = $unaryFilter;
  }
  /**
   * @return UnaryFilter
   */
  public function getUnaryFilter()
  {
    return $this->unaryFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Filter::class, 'Google_Service_Firestore_Filter');
