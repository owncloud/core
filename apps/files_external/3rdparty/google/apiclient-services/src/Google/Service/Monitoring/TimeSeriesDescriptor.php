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

class Google_Service_Monitoring_TimeSeriesDescriptor extends Google_Collection
{
  protected $collection_key = 'pointDescriptors';
  protected $labelDescriptorsType = 'Google_Service_Monitoring_LabelDescriptor';
  protected $labelDescriptorsDataType = 'array';
  protected $pointDescriptorsType = 'Google_Service_Monitoring_ValueDescriptor';
  protected $pointDescriptorsDataType = 'array';

  /**
   * @param Google_Service_Monitoring_LabelDescriptor[]
   */
  public function setLabelDescriptors($labelDescriptors)
  {
    $this->labelDescriptors = $labelDescriptors;
  }
  /**
   * @return Google_Service_Monitoring_LabelDescriptor[]
   */
  public function getLabelDescriptors()
  {
    return $this->labelDescriptors;
  }
  /**
   * @param Google_Service_Monitoring_ValueDescriptor[]
   */
  public function setPointDescriptors($pointDescriptors)
  {
    $this->pointDescriptors = $pointDescriptors;
  }
  /**
   * @return Google_Service_Monitoring_ValueDescriptor[]
   */
  public function getPointDescriptors()
  {
    return $this->pointDescriptors;
  }
}
