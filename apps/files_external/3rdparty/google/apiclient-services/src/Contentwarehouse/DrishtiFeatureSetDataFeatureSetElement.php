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

class DrishtiFeatureSetDataFeatureSetElement extends \Google\Model
{
  protected $denseType = DrishtiDenseFeatureData::class;
  protected $denseDataType = '';
  protected $indexedType = DrishtiIndexedFeatureData::class;
  protected $indexedDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $quantizedType = DrishtiQuantizedDenseFeatureData::class;
  protected $quantizedDataType = '';
  protected $sparseType = DrishtiSparseFeatureData::class;
  protected $sparseDataType = '';

  /**
   * @param DrishtiDenseFeatureData
   */
  public function setDense(DrishtiDenseFeatureData $dense)
  {
    $this->dense = $dense;
  }
  /**
   * @return DrishtiDenseFeatureData
   */
  public function getDense()
  {
    return $this->dense;
  }
  /**
   * @param DrishtiIndexedFeatureData
   */
  public function setIndexed(DrishtiIndexedFeatureData $indexed)
  {
    $this->indexed = $indexed;
  }
  /**
   * @return DrishtiIndexedFeatureData
   */
  public function getIndexed()
  {
    return $this->indexed;
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
   * @param DrishtiQuantizedDenseFeatureData
   */
  public function setQuantized(DrishtiQuantizedDenseFeatureData $quantized)
  {
    $this->quantized = $quantized;
  }
  /**
   * @return DrishtiQuantizedDenseFeatureData
   */
  public function getQuantized()
  {
    return $this->quantized;
  }
  /**
   * @param DrishtiSparseFeatureData
   */
  public function setSparse(DrishtiSparseFeatureData $sparse)
  {
    $this->sparse = $sparse;
  }
  /**
   * @return DrishtiSparseFeatureData
   */
  public function getSparse()
  {
    return $this->sparse;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DrishtiFeatureSetDataFeatureSetElement::class, 'Google_Service_Contentwarehouse_DrishtiFeatureSetDataFeatureSetElement');
