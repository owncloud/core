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

class Google_Service_DataprocMetastore_KerberosConfig extends Google_Model
{
  protected $keytabType = 'Google_Service_DataprocMetastore_Secret';
  protected $keytabDataType = '';
  public $krb5ConfigGcsUri;
  public $principal;

  /**
   * @param Google_Service_DataprocMetastore_Secret
   */
  public function setKeytab(Google_Service_DataprocMetastore_Secret $keytab)
  {
    $this->keytab = $keytab;
  }
  /**
   * @return Google_Service_DataprocMetastore_Secret
   */
  public function getKeytab()
  {
    return $this->keytab;
  }
  public function setKrb5ConfigGcsUri($krb5ConfigGcsUri)
  {
    $this->krb5ConfigGcsUri = $krb5ConfigGcsUri;
  }
  public function getKrb5ConfigGcsUri()
  {
    return $this->krb5ConfigGcsUri;
  }
  public function setPrincipal($principal)
  {
    $this->principal = $principal;
  }
  public function getPrincipal()
  {
    return $this->principal;
  }
}
