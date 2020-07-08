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
 * The "aliases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $aliases = $apigeeService->aliases;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsKeystoresAliases extends Google_Service_Resource
{
  /**
   * Creates an alias from a key, certificate pair. The structure of the request
   * is controlled by the `format` query parameter: `keycertfile` - Separate PEM-
   * encoded key and certificate files are  uploaded. The request must have
   * `Content-Type: multipart/form-data` and  include fields `keyFile` and
   * `certFile`. If uploading to a truststore,  omit `keyFile`. * `pkcs12` - A
   * PKCS12 file is uploaded. The request must have `Content-Type: multipart/form-
   * data` with the file provided in the only field. * `selfsignedcert` - A new
   * private key and certificate are generated. The request must have `Content-
   * Type: application/json` and a body of CertificateGenerationSpec.
   * (aliases.create)
   *
   * @param string $parent Required. The name of the keystore. Must be of the form
   * `organizations/{organization}/environments/{environment}/keystores/{keystore}
   * `.
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string format Required. The format of the data. Must be either
   * `selfsignedcert`, `keycertfile`, or `pkcs12`.
   * @opt_param string _password The password for the private key file, if it
   * exists.
   * @opt_param string alias The alias for the key, certificate pair. Values must
   * match regular expression `[\w\s-.]{1,255}`. This must be provided for all
   * formats except 'selfsignedcert'; self-signed certs may specify the alias in
   * either this parameter or the JSON body.
   * @opt_param bool ignoreExpiryValidation If `true`, no expiry validation will
   * be performed.
   * @opt_param bool ignoreNewlineValidation If `true`, do not throw an error when
   * the file contains a chain with no newline between each certificate. By
   * default, a newline is needed between each certificate in a chain.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Alias
   */
  public function create($parent, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Alias");
  }
  /**
   * Generates a PKCS #10 Certificate Signing Request for the private key in an
   * alias. (aliases.csr)
   *
   * @param string $name Required. The name of the alias. Must be of the form `org
   * anizations/{organization}/environments/{environment}/keystores/{keystore}/ali
   * ases/{alias}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleApiHttpBody
   */
  public function csr($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('csr', array($params), "Google_Service_Apigee_GoogleApiHttpBody");
  }
  /**
   * Deletes an alias. (aliases.delete)
   *
   * @param string $name Required. The name of the alias. Must be of the form `org
   * anizations/{organization}/environments/{environment}/keystores/{keystore}/ali
   * ases/{alias}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Alias
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Alias");
  }
  /**
   * Gets an alias. (aliases.get)
   *
   * @param string $name Required. The name of the alias. Must be of the form `org
   * anizations/{organization}/environments/{environment}/keystores/{keystore}/ali
   * ases/{alias}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Alias
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Alias");
  }
  /**
   * Gets the certificate from an alias in PEM-encoded form.
   * (aliases.getCertificate)
   *
   * @param string $name Required. The name of the alias. Must be of the form `org
   * anizations/{organization}/environments/{environment}/keystores/{keystore}/ali
   * ases/{alias}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleApiHttpBody
   */
  public function getCertificate($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getCertificate', array($params), "Google_Service_Apigee_GoogleApiHttpBody");
  }
  /**
   * Updates the certificate in an alias. (aliases.update)
   *
   * @param string $name Required. The name of the alias. Must be of the form `org
   * anizations/{organization}/environments/{environment}/keystores/{keystore}/ali
   * ases/{alias}`.
   * @param Google_Service_Apigee_GoogleApiHttpBody $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool ignoreExpiryValidation Required. If `true`, no expiry
   * validation will be performed.
   * @opt_param bool ignoreNewlineValidation If `true`, do not throw an error when
   * the file contains a chain with no newline between each certificate. By
   * default, a newline is needed between each certificate in a chain.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Alias
   */
  public function update($name, Google_Service_Apigee_GoogleApiHttpBody $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1Alias");
  }
}
