<?php

namespace OpenCloud\Tests;

use OpenCloud\OpenStack;
use OpenCloud\Common\Request\Response\Blank;

define('TESTDIR', __DIR__);

/**
 * This is a stub Connection class that bypasses the actual connections
 *
 * NOTE THAT EVERYTHING IN THIS FILE IS IN A STRICT SEQUENCE (usually)
 * Many items (e.g., /changes) must come before other patterns that also
 * match the same URL (e.g., /domains, because the full URL is
 * /domains/{id}/changes).
 *
 * Be careful where you put things.
 */
class StubConnection extends OpenStack
{

	private $testDir;

	public $async_response = <<<ENDRESPONSE
{"status":"RUNNING","verb":"GET","jobId":"852a1e4a-45b4-409b-9d46-2d6d641b27cf","callbackUrl":"https://dns.api.rackspacecloud.com/v1.0/696206/status/852a1e4a-45b4-409b-9d46-2d6d641b27cf","requestUrl":"https://dns.api.rackspacecloud.com/v1.0/696206/domains/3612932/export"}
ENDRESPONSE;

	public function __construct($url, $secret, $options = array()) 
	{
		$this->testDir = __DIR__;

		if (is_array($secret)) {
			return parent::__construct($url, $secret, $options);
		} else {
			return parent::__construct(
				$url,
				array(
					'username' => 'X', 
					'password' => 'Y'
				), 
				$options
			);
		}
	}

	public function Request($url, $method = "GET", $headers = array(), $body = null) 
	{
		$resp = new Blank;
		$resp->headers = array(
			'Content-Length' => '999'
		);

		if ($method == 'POST') {
			$resp->status = 200;
			if (strpos($url, '/action')) {
			    if ('{"rescue' == substr($body, 0, 8)) {
			        $resp->body = file_get_contents($this->testDir.'/server-create.json');
			    } else {
    				$resp->body = '';
    			}
			} elseif (strpos($url, '/token')) {
				$resp->body = file_get_contents($this->testDir.'/connection.json');
			} elseif (preg_match('/root$/', $url)) {
				$resp->body = '{"user":{"name":"root","password":"foo"}}';
			} elseif (strpos($url, '/databases')) {
				$resp->body = '{to be filled in}';
				$resp->status = 202;
			} elseif (strpos($url, '/loadbalancers')) {
				$resp->body = <<<ENDLB
{"loadBalancer":{
  "id":"123",
  "name":"NONAME"
}}
ENDLB;
				$resp->status = 202;
			}
			elseif (strpos($url, 'network'))
				$resp->body = <<<ENDNW
{"network":{"id":"1","cidr":"192.168.0.0/24","label":"foo"}}
ENDNW;
			elseif (strpos($url, '/instances'))
				$resp->body = file_get_contents($this->testDir.'/dbinstance-create.json');
			elseif (strpos($url, '/import')) { // domain import
				$resp->body = $this->async_response;
				$resp->status = 202;
			}
			elseif (strpos($url, '/domains')) { // domain create
				$resp->body = $this->async_response;
				$resp->status = 202;
			}
			elseif (strpos($url, '/rdns')) {
				$resp->body = $this->async_response;
				$resp->status = 202;
			}
			elseif (strpos($url, '/servers')) {
				$resp->body = file_get_contents($this->testDir.'/server-create.json');
			}
			else
				die("No stub data for URL $url\n");
		}
		elseif ($method == 'DELETE') {
			$resp->status = 202;
		}
		elseif (($method=='PUT') && strpos($url, '/domains')) {
			$resp->body = $this->async_response;
			$resp->status = 202;
		}
		elseif (strpos($url, '/os-volume_attachments/')) {
			$resp->body = <<<ENDATT
{"volumeAttachment":{"volumeId":"FOO"}}
ENDATT;
			$resp->status = 200;
		}
		elseif (strpos($url, '/os-volume_attachments')) {
		    $resp->body = <<<ENDATTLIST
{"volumeAttachments": []}
ENDATTLIST;
            $resp->status = 200;
		}
		elseif (strpos($url, 'os-networksv2')) {
			$resp->body = NULL;
			$resp->status = 200;
		}
		elseif (preg_match('/loadbalancers\/.*\/stats$/', $url)) {
			$resp->body = <<<ENDLBSTATS
{"connectTimeOut":10,"connectError":20,"connectFailure":30,"dataTimedOut":40,
"keepAliveTimedOut":50,"maxConn":60}
ENDLBSTATS;
		}
		elseif (strpos($url, 'ignore')) {
			$resp->status = 200;
			$resp->body = '{"ignore":{}}';
		}
		elseif (strpos($url, '/loadbalancers/')) {
			$resp->status = 200;
			if (strpos($url, '/virtualips'))
				$resp->body = '{}';
			elseif (strpos($url, '/nodes'))
				$resp->body = '{}';
			elseif (strpos($url, '/billable'))
				$resp->body = '{}';
			elseif (strpos($url, '/algorithms'))
				$resp->body = '{}';
			elseif (strpos($url, '/sessionpersistence'))
				$resp->body = '{}';
			elseif (strpos($url, '/errorpage'))
				$resp->body = '{}';
			elseif (strpos($url, '/healthmonitor'))
				$resp->body = '{}';
			elseif (strpos($url, '/usage'))
				$resp->body = '{}';
			elseif (strpos($url, '/accesslist'))
				$resp->body = '{}';
			elseif (strpos($url, '/connectionthrottle'))
				$resp->body = '{}';
			elseif (strpos($url, '/connectionlogging'))
				$resp->body = '{}';
			elseif (strpos($url, '/contentcaching'))
				$resp->body = '{}';
			elseif (strpos($url, '/alloweddomains'))
				$resp->body = '{}';
			elseif (strpos($url, '/protocols'))
				$resp->body = '{}';
			elseif (strpos($url, '/ssltermination'))
				$resp->body = '{}';
			elseif (strpos($url, '/metadata'))
				$resp->body = '{}';
			else
				die("NEED TO DEFINE RESPONSE FOR $url\n");
		}
		elseif (strpos($url, '/loadbalancers')) {
			$resp->body = <<<ENDLB
{"loadBalancers":[{"name":"one","id":1,"protocol":"HTTP","port":80}]}
ENDLB;
			$resp->status = 200;
		}
		elseif (preg_match('/metadata$/', $url)) {
			$resp->body = '{"metadata":{"foo":"bar","a":"1"}}';
			$resp->status = 200;
		}
		elseif (strpos($url, '/export')) { // domain export
			$resp->body = $this->async_response;
			$resp->status = 202;
		}
		elseif (strpos($url, 'limits/types')) {
			$resp->body = <<<ENDTYPES
{"limitTypes":["RATE_LIMIT","DOMAIN_LIMIT","DOMAIN_RECORD_LIMIT"]}
ENDTYPES;
			$resp->status = 202;
		}
		elseif (strpos($url, '/limits/DOMAIN_LIMIT')) { // individual limit
			$resp->status = 202;
			$resp->body = <<<ENDDOMLIMIT
{"absolute":{"limits":[{"name":"domains","value":500}]}}
ENDDOMLIMIT;
		}
		elseif (preg_match('/dns.*\/limits/', $url)) { // all limits
			$resp->status = 202;
			$resp->body = file_get_contents(__DIR__.'/dnslimits.json');
		}
		elseif (strpos($url, '/changes')) {
			$resp->body = <<<ENDCHANGES
{"changes":[],"from":"2013-02-20T00:00:00.000+0000","to":"2013-02-20T16:12:08.000+0000","totalEntries":0}
ENDCHANGES;
			$resp->status = 202;
		}
		elseif (strpos($url, '/domain/')) {
			$resp->body = $this->async_response;
			$resp->status = 202;
		}
		elseif (strpos($url, '/domains')) {
			$resp->body = <<<ENDDOM
{"domains":[{"name":"raxdrg.info","id":999919,"accountId":"TENANT-ID","emailAddress":"noname@dontuseemail.com","updated":"2013-02-15T16:30:28.000+0000","created":"2013-02-15T16:30:27.000+0000"}]}
ENDDOM;
			$resp->status = 200;
		}
		elseif (strpos($url, '/rdns/')) {
			$resp->body = <<<ENDRDNS
{"records":[{"name":"foobar.raxdrg.info","id":"PTR-548486","type":"PTR","data":"2001:4800:7811:513:199e:7e1e:ff04:be3f","ttl":900,"updated":"2013-02-18T20:24:50.000+0000","created":"2013-02-18T20:24:50.000+0000"},{"name":"foobar.raxdrg.info","id":"PTR-548485","type":"PTR","data":"166.78.48.90","ttl":900,"updated":"2013-02-18T20:24:34.000+0000","created":"2013-02-18T20:24:34.000+0000"}]}
ENDRDNS;
			$resp->status = 200;
		}
		elseif (strpos($url, '/metadata')) {
			$resp->body = NULL;
			$resp->status = 200;
		}
		elseif (strpos($url, '/extensions')) {
		    $resp->body = file_get_contents($this->testDir.'/extensions.json');
		    $resp->status = 200;
		}
		elseif (preg_match('/flavors\/[0-9a-f-]+$/', $url)) {
			$resp->body = file_get_contents($this->testDir.'/flavor.json');
			$resp->status = 200;
		}
		elseif (strpos($url, '/flavors')) {
			$resp->body = file_get_contents($this->testDir.'/flavors.json');
			$resp->status = 200;
		}
		elseif (strpos($url, '/instances/')) {
			$resp->body = file_get_contents($this->testDir.'/dbinstance.json');
			$resp->status = 200;
		}
		elseif (strpos($url, '/instances')) {
			$resp->body = '{"instances":[]}';
			$resp->status = 200;
		}
		elseif (strpos($url, '/volumes/')) {
			$resp->body = <<<ENDVOL
{"volume":[]}
ENDVOL;
			$resp->status = 200;
		}
		elseif (strpos($url, '/servers/')) {
			$resp->body = file_get_contents($this->testDir.'/server.json');
			$resp->status = 200;
		}
		elseif (strpos($url, 'EMPTY')) {
			$resp->body = NULL;
			$resp->status = 200;
		}
		elseif (strpos($url, 'BADJSON')) {
			$resp->body = '{"bad jjson';
			$resp->status = 200;
		}
		elseif (strpos($url, '/rdns')) {
			$resp->body = $this->async_response;
			$resp->status = 200;
		}
		else
			$resp->status = 404;

		return $resp;
	}
}
