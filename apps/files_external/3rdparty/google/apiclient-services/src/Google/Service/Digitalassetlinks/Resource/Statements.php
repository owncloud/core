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
 * The "statements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $digitalassetlinksService = new Google_Service_Digitalassetlinks(...);
 *   $statements = $digitalassetlinksService->statements;
 *  </code>
 */
class Google_Service_Digitalassetlinks_Resource_Statements extends Google_Service_Resource
{
  /**
   * Retrieves a list of all statements from a given source that match the
   * specified target and statement string. The API guarantees that all statements
   * with secure source assets, such as HTTPS websites or Android apps, have been
   * made in a secure way by the owner of those assets, as described in the
   * [Digital Asset Links technical design
   * specification](https://github.com/google/digitalassetlinks/blob/master/well-
   * known/details.md). Specifically, you should consider that for insecure
   * websites (that is, where the URL starts with `http://` instead of
   * `https://`), this guarantee cannot be made. The `List` command is most useful
   * in cases where the API client wants to know all the ways in which two assets
   * are related, or enumerate all the relationships from a particular source
   * asset. Example: a feature that helps users navigate to related items. When a
   * mobile app is running on a device, the feature would make it easy to navigate
   * to the corresponding web site or Google+ profile. (statements.listStatements)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string relation Use only associations that match the specified
   * relation. See the [`Statement`](#Statement) message for a detailed definition
   * of relation strings. For a query to match a statement, one of the following
   * must be true: * both the query's and the statement's relation strings match
   * exactly, or * the query's relation string is empty or missing. Example: A
   * query with relation `delegate_permission/common.handle_all_urls` matches an
   * asset link with relation `delegate_permission/common.handle_all_urls`.
   * @opt_param string source.androidApp.certificate.sha256Fingerprint The
   * uppercase SHA-265 fingerprint of the certificate. From the PEM certificate,
   * it can be acquired like this: $ keytool -printcert -file $CERTFILE | grep
   * SHA256: SHA256: 14:6D:E9:83:C5:73:06:50:D8:EE:B9:95:2F:34:FC:64:16:A0:83: \
   * 42:E6:1D:BE:A8:8A:04:96:B2:3F:CF:44:E5 or like this: $ openssl x509 -in
   * $CERTFILE -noout -fingerprint -sha256 SHA256
   * Fingerprint=14:6D:E9:83:C5:73:06:50:D8:EE:B9:95:2F:34:FC:64: \
   * 16:A0:83:42:E6:1D:BE:A8:8A:04:96:B2:3F:CF:44:E5 In this example, the contents
   * of this field would be `14:6D:E9:83:C5:73:
   * 06:50:D8:EE:B9:95:2F:34:FC:64:16:A0:83:42:E6:1D:BE:A8:8A:04:96:B2:3F:CF:
   * 44:E5`. If these tools are not available to you, you can convert the PEM
   * certificate into the DER format, compute the SHA-256 hash of that string and
   * represent the result as a hexstring (that is, uppercase hexadecimal
   * representations of each octet, separated by colons).
   * @opt_param string source.androidApp.packageName Android App assets are
   * naturally identified by their Java package name. For example, the Google Maps
   * app uses the package name `com.google.android.apps.maps`. REQUIRED
   * @opt_param string source.web.site Web assets are identified by a URL that
   * contains only the scheme, hostname and port parts. The format is
   * http[s]://[:] Hostnames must be fully qualified: they must end in a single
   * period ("`.`"). Only the schemes "http" and "https" are currently allowed.
   * Port numbers are given as a decimal number, and they must be omitted if the
   * standard port numbers are used: 80 for http and 443 for https. We call this
   * limited URL the "site". All URLs that share the same scheme, hostname and
   * port are considered to be a part of the site and thus belong to the web
   * asset. Example: the asset with the site `https://www.google.com` contains all
   * these URLs: * `https://www.google.com/` * `https://www.google.com:443/` *
   * `https://www.google.com/foo` * `https://www.google.com/foo?bar` *
   * `https://www.google.com/foo#bar` * `https://user@password:www.google.com/`
   * But it does not contain these URLs: * `http://www.google.com/` (wrong scheme)
   * * `https://google.com/` (hostname does not match) *
   * `https://www.google.com:444/` (port does not match) REQUIRED
   * @return Google_Service_Digitalassetlinks_ListResponse
   */
  public function listStatements($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Digitalassetlinks_ListResponse");
  }
}
