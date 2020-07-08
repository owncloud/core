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
 * The "cse" collection of methods.
 * Typical usage is:
 *  <code>
 *   $customsearchService = new Google_Service_Customsearch(...);
 *   $cse = $customsearchService->cse;
 *  </code>
 */
class Google_Service_Customsearch_Resource_Cse extends Google_Service_Resource
{
  /**
   * Returns metadata about the search performed, metadata about the custom search
   * engine used for the search, and the search results. (cse.listCse)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string imgDominantColor Returns images of a specific dominant
   * color. Acceptable values are:
   *
   * * `"black"`
   *
   * * `"blue"`
   *
   * * `"brown"`
   *
   * * `"gray"`
   *
   * * `"green"`
   *
   * * `"orange"`
   *
   * * `"pink"`
   *
   * * `"purple"`
   *
   * * `"red"`
   *
   * * `"teal"`
   *
   * * `"white"`
   *
   * * `"yellow"`
   * @opt_param string rights Filters based on licensing. Supported values
   * include: `cc_publicdomain`, `cc_attribute`, `cc_sharealike`,
   * `cc_noncommercial`, `cc_nonderived` and combinations of these. See [typical
   * combinations](https://wiki.creativecommons.org/wiki/CC_Search_integration).
   * @opt_param string imgSize Returns images of a specified size. Acceptable
   * values are:
   *
   * * `"huge"`
   *
   * * `"icon"`
   *
   * * `"large"`
   *
   * * `"medium"`
   *
   * * `"small"`
   *
   * * `"xlarge"`
   *
   * * `"xxlarge"`
   * @opt_param string imgType Returns images of a type. Acceptable values are:
   *
   * * `"clipart"`
   *
   * * `"face"`
   *
   * * `"lineart"`
   *
   * * `"stock"`
   *
   * * `"photo"`
   *
   * * `"animated"`
   * @opt_param string googlehost **Deprecated**. Use the `gl` parameter for a
   * similar effect.
   *
   * The local Google domain (for example, google.com, google.de, or google.fr) to
   * use to perform the search.
   * @opt_param int num Number of search results to return.
   *
   * * Valid values are integers between 1 and 10, inclusive.
   * @opt_param string highRange Specifies the ending value for a search range.
   *
   * * Use `lowRange` and `highRange` to append an inclusive search range of
   * `lowRange...highRange` to the query.
   * @opt_param string exactTerms Identifies a phrase that all documents in the
   * search results must contain.
   * @opt_param string searchType Specifies the search type: `image`. If
   * unspecified, results are limited to webpages.
   *
   * Acceptable values are:
   *
   * * `"image"`: custom image search.
   * @opt_param string hq Appends the specified query terms to the query, as if
   * they were combined with a logical AND operator.
   * @opt_param string relatedSite Specifies that all search results should be
   * pages that are related to the specified URL.
   * @opt_param string lr Restricts the search to documents written in a
   * particular language (e.g., `lr=lang_ja`).
   *
   * Acceptable values are:
   *
   * * `"lang_ar"`: Arabic
   *
   * * `"lang_bg"`: Bulgarian
   *
   * * `"lang_ca"`: Catalan
   *
   * * `"lang_cs"`: Czech
   *
   * * `"lang_da"`: Danish
   *
   * * `"lang_de"`: German
   *
   * * `"lang_el"`: Greek
   *
   * * `"lang_en"`: English
   *
   * * `"lang_es"`: Spanish
   *
   * * `"lang_et"`: Estonian
   *
   * * `"lang_fi"`: Finnish
   *
   * * `"lang_fr"`: French
   *
   * * `"lang_hr"`: Croatian
   *
   * * `"lang_hu"`: Hungarian
   *
   * * `"lang_id"`: Indonesian
   *
   * * `"lang_is"`: Icelandic
   *
   * * `"lang_it"`: Italian
   *
   * * `"lang_iw"`: Hebrew
   *
   * * `"lang_ja"`: Japanese
   *
   * * `"lang_ko"`: Korean
   *
   * * `"lang_lt"`: Lithuanian
   *
   * * `"lang_lv"`: Latvian
   *
   * * `"lang_nl"`: Dutch
   *
   * * `"lang_no"`: Norwegian
   *
   * * `"lang_pl"`: Polish
   *
   * * `"lang_pt"`: Portuguese
   *
   * * `"lang_ro"`: Romanian
   *
   * * `"lang_ru"`: Russian
   *
   * * `"lang_sk"`: Slovak
   *
   * * `"lang_sl"`: Slovenian
   *
   * * `"lang_sr"`: Serbian
   *
   * * `"lang_sv"`: Swedish
   *
   * * `"lang_tr"`: Turkish
   *
   * * `"lang_zh-CN"`: Chinese (Simplified)
   *
   * * `"lang_zh-TW"`: Chinese (Traditional)
   * @opt_param string sort The sort expression to apply to the results.
   * @opt_param string siteSearchFilter Controls whether to include or exclude
   * results from the site named in the `siteSearch` parameter.
   *
   * Acceptable values are:
   *
   * * `"e"`: exclude
   *
   * * `"i"`: include
   * @opt_param string lowRange Specifies the starting value for a search range.
   * Use `lowRange` and `highRange` to append an inclusive search range of
   * `lowRange...highRange` to the query.
   * @opt_param string start The index of the first result to return. The default
   * number of results per page is 10, so `=11` would start at the top of the
   * second page of results. **Note**: The JSON API will never return more than
   * 100 results, even if more than 100 documents match the query, so setting the
   * sum of `start + num` to a number greater than 100 will produce an error. Also
   * note that the maximum value for `num` is 10.
   * @opt_param string cx The custom search engine ID to use for this request.
   * @opt_param string imgColorType Returns black and white, grayscale,
   * transparent, or color images. Acceptable values are:
   *
   * * `"color"`
   *
   * * `"gray"`
   *
   * * `"mono"`: black and white
   *
   * * `"trans"`: transparent background
   * @opt_param string fileType Restricts results to files of a specified
   * extension. A list of file types indexable by Google can be found in Search
   * Console [Help Center](https://support.google.com/webmasters/answer/35287).
   * @opt_param string cr Restricts search results to documents originating in a
   * particular country. You may use [Boolean
   * operators](https://developers.google.com/custom-
   * search/docs/xml_results_appendices#booleanOperators) in the cr parameter's
   * value.
   *
   * Google Search determines the country of a document by analyzing:
   *
   * * the top-level domain (TLD) of the document's URL
   *
   * * the geographic location of the Web server's IP address
   *
   * See the [Country Parameter Values](https://developers.google.com/custom-
   * search/docs/xml_results_appendices#countryCollections) page for a list of
   * valid values for this parameter.
   * @opt_param string safe Search safety level. Acceptable values are:
   *
   * * `"active"`: Enables SafeSearch filtering.
   *
   * * `"off"`: Disables SafeSearch filtering. (default)
   * @opt_param string excludeTerms Identifies a word or phrase that should not
   * appear in any documents in the search results.
   * @opt_param string orTerms Provides additional search terms to check for in a
   * document, where each document in the search results must contain at least one
   * of the additional search terms.
   * @opt_param string siteSearch Specifies a given site which should always be
   * included or excluded from results (see `siteSearchFilter` parameter, below).
   * @opt_param string linkSite Specifies that all search results should contain a
   * link to a particular URL.
   * @opt_param string hl Sets the user interface language.
   *
   * * Explicitly setting this parameter improves the performance and the quality
   * of your search results.
   *
   * * See the [Interface Languages](https://developers.google.com/custom-
   * search/docs/xml_results#wsInterfaceLanguages) section of [Internationalizing
   * Queries and Results Presentation](https://developers.google.com/custom-
   * search/docs/xml_results#wsInternationalizing) for more information, and
   * (Supported Interface Languages)[https://developers.google.com/custom-
   * search/docs/xml_results_appendices#interfaceLanguages] for a list of
   * supported languages.
   * @opt_param string q Query
   * @opt_param string c2coff Enables or disables [Simplified and Traditional
   * Chinese Search](https://developers.google.com/custom-
   * search/docs/xml_results#chineseSearch).
   *
   * The default value for this parameter is 0 (zero), meaning that the feature is
   * enabled. Supported values are:
   *
   * * `1`: Disabled
   *
   * * `0`: Enabled (default)
   * @opt_param string filter Controls turning on or off the duplicate content
   * filter.
   *
   * * See [Automatic Filtering](https://developers.google.com/custom-
   * search/docs/xml_results#automaticFiltering) for more information about
   * Google's search results filters. Note that host crowding filtering applies
   * only to multi-site searches.
   *
   * * By default, Google applies filtering to all search results to improve the
   * quality of those results.
   *
   * Acceptable values are:
   *
   * * `0`: Turns off duplicate content filter.
   *
   * * `1`: Turns on duplicate content filter.
   * @opt_param string gl Geolocation of end user.
   *
   * * The `gl` parameter value is a two-letter country code. The `gl` parameter
   * boosts search results whose country of origin matches the parameter value.
   * See the [Country Codes](https://developers.google.com/custom-
   * search/docs/xml_results_appendices#countryCodes) page for a list of valid
   * values.
   *
   * * Specifying a `gl` parameter value should lead to more relevant results.
   * This is particularly true for international customers and, even more
   * specifically, for customers in English- speaking countries other than the
   * United States.
   * @opt_param string dateRestrict Restricts results to URLs based on date.
   * Supported values include:
   *
   * * `d[number]`: requests results from the specified number of past days.
   *
   * * `w[number]`: requests results from the specified number of past weeks.
   *
   * * `m[number]`: requests results from the specified number of past months.
   *
   * * `y[number]`: requests results from the specified number of past years.
   * @return Google_Service_Customsearch_Search
   */
  public function listCse($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Customsearch_Search");
  }
}
