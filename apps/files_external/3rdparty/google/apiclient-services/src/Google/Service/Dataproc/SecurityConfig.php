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

class Google_Service_Dataproc_SecurityConfig extends Google_Model
{
  protected $identityConfigType = 'Google_Service_Dataproc_IdentityConfig';
  protected $identityConfigDataType = '';
  protected $kerberosConfigType = 'Google_Service_Dataproc_KerberosConfig';
  protected $kerberosConfigDataType = '';

  /**
   * @param Google_Service_Dataproc_IdentityConfig
   */
  public function setIdentityConfig(Google_Service_Dataproc_IdentityConfig $identityConfig)
  {
    $this->identityConfig = $identityConfig;
  }
  /**
   * @return Google_Service_Dataproc_IdentityConfig
   */
  public function getIdentityConfig()
  {
    return $this->identityConfig;
  }
  /**
   * @param Google_Service_Dataproc_KerberosConfig
   */
  public function setKerberosConfig(Google_Service_Dataproc_KerberosConfig $kerberosConfig)
  {
    $this->kerberosConfig = $kerberosConfig;
  }
  /**
   * @return Google_Service_Dataproc_KerberosConfig
   */
  public function getKerberosConfig()
  {
    return $this->kerberosConfig;
  }
}
