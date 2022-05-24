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

class VolumeLayerInfo extends \Google\Collection
{
  protected $collection_key = 'layers';
  protected $layersType = VolumeLayerInfoLayers::class;
  protected $layersDataType = 'array';

  /**
   * @param VolumeLayerInfoLayers[]
   */
  public function setLayers($layers)
  {
    $this->layers = $layers;
  }
  /**
   * @return VolumeLayerInfoLayers[]
   */
  public function getLayers()
  {
    return $this->layers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VolumeLayerInfo::class, 'Google_Service_Books_VolumeLayerInfo');
