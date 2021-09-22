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

namespace Google\Service\Digitalassetlinks\Resource;

use Google\Service\Digitalassetlinks\CheckResponse;

/**
 * The "assetlinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $digitalassetlinksService = new Google\Service\Digitalassetlinks(...);
 *   $assetlinks = $digitalassetlinksService->assetlinks;
 *  </code>
 */
class Assetlinks extends \Google\Service\Resource
{
  /**
   * Determines whether the specified (directional) relationship exists between
   * the specified source and target assets. The relation describes the intent of
   * the link between the two assets as claimed by the source asset. An example
   * for such relationships is the delegation of privileges or permissions. This
   * command is most often used by infrastructure systems to check preconditions
   * for an action. For example, a client may want to know if it is OK to send a
   * web URL to a particular mobile app instead. The client can check for the
   * relevant asset link from the website to the mobile app to decide if the
   * operation should be allowed. A note about security: if you specify a secure
   * asset as the source, such as an HTTPS website or an Android app, the API will
   * ensure that any statements used to generate the response have been made in a
   * secure way by the owner of that asset. Conversely, if the source asset is an
   * insecure HTTP website (that is, the URL starts with `http://` instead of
   * `https://`), the API cannot verify its statements securely, and it is not
   * possible to ensure that the website's statements have not been altered by a
   * third party. For more information, see the [Digital Asset Links technical
   * design specification](https://github.com/google/digitalassetlinks/blob/master
   * /well-known/details.md). (assetlinks.check)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string relation Query string for the relation. We identify
   * relations with strings of the format `/`, where `` must be one of a set of
   * pre-defined purpose categories, and `` is a free-form lowercase alphanumeric
   * string that describes the specific use case of the statement. Refer to [our
   * API documentation](/digital-asset-links/v1/relation-strings) for the current
   * list of supported relations. For a query to match an asset link, both the
   * query's and the asset link's relation strings must match exactly. Example: A
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
   * @opt_param string target.androidApp.certificate.sha256Fingerprint The
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
   * @opt_param string target.androidApp.packageName Android App assets are
   * naturally identified by their Java package name. For example, the Google Maps
   * app uses the package name `com.google.android.apps.maps`. REQUIRED
   * @opt_param string target.web.site Web assets are identified by a URL that
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
   * @return CheckResponse
   */
  public function check($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('check', [$params], CheckResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Assetlinks::class, 'Google_Service_Digitalassetlinks_Resource_Assetlinks');
