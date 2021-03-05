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

/**
 * The "systempolicy" collection of methods.
 * Typical usage is:
 *  <code>
 *   $binaryauthorizationService = new Google_Service_BinaryAuthorization(...);
 *   $systempolicy = $binaryauthorizationService->systempolicy;
 *  </code>
 */
class Google_Service_BinaryAuthorization_Resource_Systempolicy extends Google_Service_Resource
{
  /**
   * Gets the current system policy in the specified location.
   * (systempolicy.getPolicy)
   *
   * @param string $name Required. The resource name, in the format
   * `locations/policy`. Note that the system policy is not associated with a
   * project.
   * @param array $optParams Optional parameters.
   * @return Google_Service_BinaryAuthorization_Policy
   */
  public function getPolicy($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getPolicy', array($params), "Google_Service_BinaryAuthorization_Policy");
  }
}
