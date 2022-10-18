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

class VideoLegosLegosAnnotationsSet extends \Google\Model
{
  /**
   * @var string
   */
  public $featureSetName;
  protected $legosAnnotationsType = YoutubeDiscoveryLegosLegosAnnotations::class;
  protected $legosAnnotationsDataType = '';

  /**
   * @param string
   */
  public function setFeatureSetName($featureSetName)
  {
    $this->featureSetName = $featureSetName;
  }
  /**
   * @return string
   */
  public function getFeatureSetName()
  {
    return $this->featureSetName;
  }
  /**
   * @param YoutubeDiscoveryLegosLegosAnnotations
   */
  public function setLegosAnnotations(YoutubeDiscoveryLegosLegosAnnotations $legosAnnotations)
  {
    $this->legosAnnotations = $legosAnnotations;
  }
  /**
   * @return YoutubeDiscoveryLegosLegosAnnotations
   */
  public function getLegosAnnotations()
  {
    return $this->legosAnnotations;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoLegosLegosAnnotationsSet::class, 'Google_Service_Contentwarehouse_VideoLegosLegosAnnotationsSet');
