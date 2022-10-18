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

class ImageUnderstandingIndexingAnnotation extends \Google\Collection
{
  protected $collection_key = 'labelGroup';
  protected $featureType = ImageUnderstandingIndexingFeature::class;
  protected $featureDataType = 'array';
  protected $labelGroupType = ImageUnderstandingIndexingLabelGroup::class;
  protected $labelGroupDataType = 'array';
  protected $roiType = ImageUnderstandingIndexingImageRegion::class;
  protected $roiDataType = '';

  /**
   * @param ImageUnderstandingIndexingFeature[]
   */
  public function setFeature($feature)
  {
    $this->feature = $feature;
  }
  /**
   * @return ImageUnderstandingIndexingFeature[]
   */
  public function getFeature()
  {
    return $this->feature;
  }
  /**
   * @param ImageUnderstandingIndexingLabelGroup[]
   */
  public function setLabelGroup($labelGroup)
  {
    $this->labelGroup = $labelGroup;
  }
  /**
   * @return ImageUnderstandingIndexingLabelGroup[]
   */
  public function getLabelGroup()
  {
    return $this->labelGroup;
  }
  /**
   * @param ImageUnderstandingIndexingImageRegion
   */
  public function setRoi(ImageUnderstandingIndexingImageRegion $roi)
  {
    $this->roi = $roi;
  }
  /**
   * @return ImageUnderstandingIndexingImageRegion
   */
  public function getRoi()
  {
    return $this->roi;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageUnderstandingIndexingAnnotation::class, 'Google_Service_Contentwarehouse_ImageUnderstandingIndexingAnnotation');
