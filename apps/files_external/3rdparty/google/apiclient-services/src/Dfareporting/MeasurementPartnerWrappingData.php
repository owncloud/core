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

namespace Google\Service\Dfareporting;

class MeasurementPartnerWrappingData extends \Google\Model
{
  public $linkStatus;
  public $measurementPartner;
  public $tagWrappingMode;
  public $wrappedTag;

  public function setLinkStatus($linkStatus)
  {
    $this->linkStatus = $linkStatus;
  }
  public function getLinkStatus()
  {
    return $this->linkStatus;
  }
  public function setMeasurementPartner($measurementPartner)
  {
    $this->measurementPartner = $measurementPartner;
  }
  public function getMeasurementPartner()
  {
    return $this->measurementPartner;
  }
  public function setTagWrappingMode($tagWrappingMode)
  {
    $this->tagWrappingMode = $tagWrappingMode;
  }
  public function getTagWrappingMode()
  {
    return $this->tagWrappingMode;
  }
  public function setWrappedTag($wrappedTag)
  {
    $this->wrappedTag = $wrappedTag;
  }
  public function getWrappedTag()
  {
    return $this->wrappedTag;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MeasurementPartnerWrappingData::class, 'Google_Service_Dfareporting_MeasurementPartnerWrappingData');
