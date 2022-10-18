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

class PhotosVisionObjectrecLocalDescriptor extends \Google\Model
{
  protected $affineMatrixType = PhotosVisionObjectrecMatrix2D::class;
  protected $affineMatrixDataType = '';
  /**
   * @var string
   */
  public $data;
  /**
   * @var float
   */
  public $dataFactor;
  protected $featureVectorType = PhotosVisionObjectrecFeatureVector::class;
  protected $featureVectorDataType = '';
  /**
   * @var string
   */
  public $opaqueData;
  /**
   * @var float
   */
  public $orientation;
  /**
   * @var float
   */
  public $scale;
  /**
   * @var float
   */
  public $strength;
  /**
   * @var float
   */
  public $x;
  /**
   * @var float
   */
  public $y;

  /**
   * @param PhotosVisionObjectrecMatrix2D
   */
  public function setAffineMatrix(PhotosVisionObjectrecMatrix2D $affineMatrix)
  {
    $this->affineMatrix = $affineMatrix;
  }
  /**
   * @return PhotosVisionObjectrecMatrix2D
   */
  public function getAffineMatrix()
  {
    return $this->affineMatrix;
  }
  /**
   * @param string
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return string
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * @param float
   */
  public function setDataFactor($dataFactor)
  {
    $this->dataFactor = $dataFactor;
  }
  /**
   * @return float
   */
  public function getDataFactor()
  {
    return $this->dataFactor;
  }
  /**
   * @param PhotosVisionObjectrecFeatureVector
   */
  public function setFeatureVector(PhotosVisionObjectrecFeatureVector $featureVector)
  {
    $this->featureVector = $featureVector;
  }
  /**
   * @return PhotosVisionObjectrecFeatureVector
   */
  public function getFeatureVector()
  {
    return $this->featureVector;
  }
  /**
   * @param string
   */
  public function setOpaqueData($opaqueData)
  {
    $this->opaqueData = $opaqueData;
  }
  /**
   * @return string
   */
  public function getOpaqueData()
  {
    return $this->opaqueData;
  }
  /**
   * @param float
   */
  public function setOrientation($orientation)
  {
    $this->orientation = $orientation;
  }
  /**
   * @return float
   */
  public function getOrientation()
  {
    return $this->orientation;
  }
  /**
   * @param float
   */
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  /**
   * @return float
   */
  public function getScale()
  {
    return $this->scale;
  }
  /**
   * @param float
   */
  public function setStrength($strength)
  {
    $this->strength = $strength;
  }
  /**
   * @return float
   */
  public function getStrength()
  {
    return $this->strength;
  }
  /**
   * @param float
   */
  public function setX($x)
  {
    $this->x = $x;
  }
  /**
   * @return float
   */
  public function getX()
  {
    return $this->x;
  }
  /**
   * @param float
   */
  public function setY($y)
  {
    $this->y = $y;
  }
  /**
   * @return float
   */
  public function getY()
  {
    return $this->y;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosVisionObjectrecLocalDescriptor::class, 'Google_Service_Contentwarehouse_PhotosVisionObjectrecLocalDescriptor');
