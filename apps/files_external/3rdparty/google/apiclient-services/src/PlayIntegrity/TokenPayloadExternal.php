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

namespace Google\Service\PlayIntegrity;

class TokenPayloadExternal extends \Google\Model
{
  protected $accountDetailsType = AccountDetails::class;
  protected $accountDetailsDataType = '';
  protected $appIntegrityType = AppIntegrity::class;
  protected $appIntegrityDataType = '';
  protected $deviceIntegrityType = DeviceIntegrity::class;
  protected $deviceIntegrityDataType = '';
  protected $requestDetailsType = RequestDetails::class;
  protected $requestDetailsDataType = '';
  protected $testingDetailsType = TestingDetails::class;
  protected $testingDetailsDataType = '';

  /**
   * @param AccountDetails
   */
  public function setAccountDetails(AccountDetails $accountDetails)
  {
    $this->accountDetails = $accountDetails;
  }
  /**
   * @return AccountDetails
   */
  public function getAccountDetails()
  {
    return $this->accountDetails;
  }
  /**
   * @param AppIntegrity
   */
  public function setAppIntegrity(AppIntegrity $appIntegrity)
  {
    $this->appIntegrity = $appIntegrity;
  }
  /**
   * @return AppIntegrity
   */
  public function getAppIntegrity()
  {
    return $this->appIntegrity;
  }
  /**
   * @param DeviceIntegrity
   */
  public function setDeviceIntegrity(DeviceIntegrity $deviceIntegrity)
  {
    $this->deviceIntegrity = $deviceIntegrity;
  }
  /**
   * @return DeviceIntegrity
   */
  public function getDeviceIntegrity()
  {
    return $this->deviceIntegrity;
  }
  /**
   * @param RequestDetails
   */
  public function setRequestDetails(RequestDetails $requestDetails)
  {
    $this->requestDetails = $requestDetails;
  }
  /**
   * @return RequestDetails
   */
  public function getRequestDetails()
  {
    return $this->requestDetails;
  }
  /**
   * @param TestingDetails
   */
  public function setTestingDetails(TestingDetails $testingDetails)
  {
    $this->testingDetails = $testingDetails;
  }
  /**
   * @return TestingDetails
   */
  public function getTestingDetails()
  {
    return $this->testingDetails;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TokenPayloadExternal::class, 'Google_Service_PlayIntegrity_TokenPayloadExternal');
