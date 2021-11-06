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

namespace Google\Service\Books;

class DictionaryAnnotationdata extends \Google\Model
{
  public $annotationType;
  protected $dataType = Dictlayerdata::class;
  protected $dataDataType = '';
  public $encodedData;
  public $id;
  public $kind;
  public $layerId;
  public $selfLink;
  public $updated;
  public $volumeId;

  public function setAnnotationType($annotationType)
  {
    $this->annotationType = $annotationType;
  }
  public function getAnnotationType()
  {
    return $this->annotationType;
  }
  /**
   * @param Dictlayerdata
   */
  public function setData(Dictlayerdata $data)
  {
    $this->data = $data;
  }
  /**
   * @return Dictlayerdata
   */
  public function getData()
  {
    return $this->data;
  }
  public function setEncodedData($encodedData)
  {
    $this->encodedData = $encodedData;
  }
  public function getEncodedData()
  {
    return $this->encodedData;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLayerId($layerId)
  {
    $this->layerId = $layerId;
  }
  public function getLayerId()
  {
    return $this->layerId;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  public function getUpdated()
  {
    return $this->updated;
  }
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DictionaryAnnotationdata::class, 'Google_Service_Books_DictionaryAnnotationdata');
