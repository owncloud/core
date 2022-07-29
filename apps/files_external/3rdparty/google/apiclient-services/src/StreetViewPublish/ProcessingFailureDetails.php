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

namespace Google\Service\StreetViewPublish;

class ProcessingFailureDetails extends \Google\Model
{
  protected $gpsDataGapDetailsType = GpsDataGapFailureDetails::class;
  protected $gpsDataGapDetailsDataType = '';
  protected $imuDataGapDetailsType = ImuDataGapFailureDetails::class;
  protected $imuDataGapDetailsDataType = '';
  protected $insufficientGpsDetailsType = InsufficientGpsFailureDetails::class;
  protected $insufficientGpsDetailsDataType = '';
  protected $notOutdoorsDetailsType = NotOutdoorsFailureDetails::class;
  protected $notOutdoorsDetailsDataType = '';

  /**
   * @param GpsDataGapFailureDetails
   */
  public function setGpsDataGapDetails(GpsDataGapFailureDetails $gpsDataGapDetails)
  {
    $this->gpsDataGapDetails = $gpsDataGapDetails;
  }
  /**
   * @return GpsDataGapFailureDetails
   */
  public function getGpsDataGapDetails()
  {
    return $this->gpsDataGapDetails;
  }
  /**
   * @param ImuDataGapFailureDetails
   */
  public function setImuDataGapDetails(ImuDataGapFailureDetails $imuDataGapDetails)
  {
    $this->imuDataGapDetails = $imuDataGapDetails;
  }
  /**
   * @return ImuDataGapFailureDetails
   */
  public function getImuDataGapDetails()
  {
    return $this->imuDataGapDetails;
  }
  /**
   * @param InsufficientGpsFailureDetails
   */
  public function setInsufficientGpsDetails(InsufficientGpsFailureDetails $insufficientGpsDetails)
  {
    $this->insufficientGpsDetails = $insufficientGpsDetails;
  }
  /**
   * @return InsufficientGpsFailureDetails
   */
  public function getInsufficientGpsDetails()
  {
    return $this->insufficientGpsDetails;
  }
  /**
   * @param NotOutdoorsFailureDetails
   */
  public function setNotOutdoorsDetails(NotOutdoorsFailureDetails $notOutdoorsDetails)
  {
    $this->notOutdoorsDetails = $notOutdoorsDetails;
  }
  /**
   * @return NotOutdoorsFailureDetails
   */
  public function getNotOutdoorsDetails()
  {
    return $this->notOutdoorsDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProcessingFailureDetails::class, 'Google_Service_StreetViewPublish_ProcessingFailureDetails');
