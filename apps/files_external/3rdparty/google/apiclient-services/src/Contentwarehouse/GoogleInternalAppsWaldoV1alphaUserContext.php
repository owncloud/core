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

class GoogleInternalAppsWaldoV1alphaUserContext extends \Google\Model
{
  protected $localTimeType = GoogleInternalAppsWaldoV1alphaLocalTimeContext::class;
  protected $localTimeDataType = '';
  protected $upcomingOooType = GoogleInternalAppsWaldoV1alphaUpcomingOooContext::class;
  protected $upcomingOooDataType = '';
  protected $workingElsewhereType = GoogleInternalAppsWaldoV1alphaWorkingElsewhereContext::class;
  protected $workingElsewhereDataType = '';

  /**
   * @param GoogleInternalAppsWaldoV1alphaLocalTimeContext
   */
  public function setLocalTime(GoogleInternalAppsWaldoV1alphaLocalTimeContext $localTime)
  {
    $this->localTime = $localTime;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaLocalTimeContext
   */
  public function getLocalTime()
  {
    return $this->localTime;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaUpcomingOooContext
   */
  public function setUpcomingOoo(GoogleInternalAppsWaldoV1alphaUpcomingOooContext $upcomingOoo)
  {
    $this->upcomingOoo = $upcomingOoo;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaUpcomingOooContext
   */
  public function getUpcomingOoo()
  {
    return $this->upcomingOoo;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaWorkingElsewhereContext
   */
  public function setWorkingElsewhere(GoogleInternalAppsWaldoV1alphaWorkingElsewhereContext $workingElsewhere)
  {
    $this->workingElsewhere = $workingElsewhere;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaWorkingElsewhereContext
   */
  public function getWorkingElsewhere()
  {
    return $this->workingElsewhere;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaUserContext::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaUserContext');
